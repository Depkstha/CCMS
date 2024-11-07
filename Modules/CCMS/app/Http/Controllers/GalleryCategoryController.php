<?php

namespace Modules\CCMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\CCMS\Models\GalleryCategory;
use Modules\CCMS\Services\GalleryCategoryService;
use Yajra\DataTables\Facades\DataTables;

class GalleryCategoryController extends Controller
{
    protected $galleryCategoryService;

    public function __construct(GalleryCategoryService $galleryCategoryService)
    {
        $this->galleryCategoryService = $galleryCategoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(?int $id = null)
    {
        $isEditing = !is_null($id);
        $galleryCategory = $isEditing ? $this->galleryCategoryService->getGalleryCategoryById($id) : null;

        if (request()->ajax()) {
            $model = GalleryCategory::query()->orderBy('order');

            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->setRowClass('tableRow')
                ->editColumn('status', function (GalleryCategory $galleryCategory) {
                    $status = $galleryCategory->status ? 'Published' : 'Draft';
                    $color = $galleryCategory->status ? 'text-success' : 'text-danger';
                    return "<p class='{$color}'>{$status}</p>";
                })
                ->addColumn('action', 'ccms::galleryCategory.datatable.action')
                ->rawColumns(['action', 'status'])
                ->toJson();
        }

        return view('ccms::galleryCategory.index', [
            'galleryCategory' => $galleryCategory,
            'title' => $isEditing ? 'Edit Gallery Category' : 'Add Gallery Category',
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
                'title' => ['required', 'string', 'max:255','unique:gallery_categories,title,'.$request->id],
                'slug' => ['required', 'string'],
            ]);

            $galleryCategory = $this->galleryCategoryService->updateGalleryCategory($request->id, galleryCategoryData: $validated);
            flash()->success("GalleryCategory for {$galleryCategory->title} has been updated.");
            return to_route('galleryCategory.index');
        }

        $maxOrder = GalleryCategory::max('order');
        $order = $maxOrder ? ++$maxOrder : 1;

        $request->mergeIfMissing([
            'order' => $order
        ]);

        $validated = $request->validate([
            'title' => ['required', 'string','unique:gallery_categories,title'],
            'slug' => ['required', 'string'],
            'order' => ['integer'],
        ]);

        $galleryCategory = $this->galleryCategoryService->storeGalleryCategory($validated);
        flash()->success("GalleryCategory for {$galleryCategory->title} has been created.");
        return to_route('galleryCategory.index');
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
        $galleryCategory = $this->galleryCategoryService->getGalleryCategoryById($id);
        return view('ccms::galleryCategory.edit', [
            'galleryCategory' => $galleryCategory,
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
        $galleryCategory = $this->galleryCategoryService->deleteGalleryCategory($id);
        return response()->json(['status' => 200, 'message' => "Gallery Category has been deleted."], 200);
    }

    public function reorder(Request $request)
    {
        $galleryCategories = $this->galleryCategoryService->getAllgalleryCategories();

        foreach ($galleryCategories as $galleryCategory) {
            foreach ($request->order as $order) {
                if ($order['id'] == $galleryCategory->id) {
                    $galleryCategory->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => true, 'message' => 'Reordered successfully'], 200);
    }

    public function toggle($id)
    {
        $galleryCategory = GalleryCategory::findOrFail($id);
        $galleryCategory->update(['status' => !$galleryCategory->status]);
        return response(['status' => 200, 'message' => 'Toggled successfully'], 200);
    }
}
