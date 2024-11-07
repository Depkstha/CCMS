<?php

namespace Modules\CCMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\CCMS\Models\Gallery;
use Modules\CCMS\Models\GalleryCategory;
use Modules\CCMS\Services\GalleryService;
use Yajra\DataTables\Facades\DataTables;

class GalleryController extends Controller
{
    protected $galleryService;

    public function __construct(GalleryService $galleryService)
    {
        $this->galleryService = $galleryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(?int $id = null)
    {
        $isEditing = !is_null($id);
        $gallery = $isEditing ? $this->galleryService->getGalleryById($id) : null;
        $categoryOptions = GalleryCategory::pluck('title', 'id');

        if (request()->ajax()) {
            $model = Gallery::query()->orderBy('order');
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->setRowClass('tableRow')
                ->editColumn('status', function (Gallery $gallery) {
                    $status = $gallery->status ? 'Published' : 'Draft';
                    $color = $gallery->status ? 'text-success' : 'text-danger';
                    return "<p class='{$color}'>{$status}</p>";
                })
                ->addColumn('action', 'ccms::gallery.datatable.action')
                ->rawColumns(['action', 'status'])
                ->toJson();
        }

        return view('ccms::gallery.index', [
            'gallery' => $gallery,
            'title' => $isEditing ? 'Edit Gallery' : 'Add Gallery',
            'editable' => $isEditing ? true : false,
            'categoryOptions' => $categoryOptions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $isEditing = $request->has('id');

        $request->merge([
            'slug' => Str::slug($request->title),
        ]);

        if ($isEditing) {
            $validated = $request->validate([
                'title' => ['required', 'string', 'max:255', 'unique:categories,title,' . $request->id],
                'slug' => ['required', 'string'],
                'link' => ['nullable', 'string'],
                'images' => ['nullable', 'string'],
                'category_id' => ['nullable', 'integer'],
            ]);

            $gallery = $this->galleryService->updateGallery($request->id, galleryData: $validated);
            flash()->success("Gallery for {$gallery->title} has been updated.");
            return to_route('gallery.index');
        }

        $maxOrder = Gallery::max('order');
        $order = $maxOrder ? ++$maxOrder : 1;

        $request->mergeIfMissing([
            'order' => $order,
        ]);

        $validated = $request->validate([
            'title' => ['required', 'string', 'unique:galleries,title'],
            'slug' => ['required', 'string'],
            'link' => ['nullable', 'string'],
            'images' => ['nullable', 'string'],
            'category_id' => ['nullable', 'integer'],
            'order' => ['integer'],
        ]);

        $gallery = $this->galleryService->storeGallery($validated);
        flash()->success("Gallery for {$gallery->title} has been created.");
        return to_route('gallery.index');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gallery = $this->galleryService->getGalleryById($id);
        return view('ccms::gallery.edit', [
            'gallery' => $gallery,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gallery = $this->galleryService->deleteGallery($id);
        return response()->json(['status' => 200, 'message' => "Gallery has been deleted."], 200);
    }

    public function reorder(Request $request)
    {
        $galleries = $this->galleryService->getAllGalleries();

        foreach ($galleries as $gallery) {
            foreach ($request->order as $order) {
                if ($order['id'] == $gallery->id) {
                    $gallery->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => true, 'message' => 'Reordered successfully'], 200);
    }

    public function toggle($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->update(['status' => !$gallery->status]);
        return response(['status' => 200, 'message' => 'Toggled successfully'], 200);
    }
}
