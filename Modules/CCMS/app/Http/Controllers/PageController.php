<?php

namespace Modules\CCMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Modules\CCMS\Models\Page;
use Yajra\DataTables\Facades\DataTables;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $model = Page::query()->orderBy('order');
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->setRowClass('tableRow')
                ->editColumn('type', '{!! config("constants.page_type_options")[$type] !!}')
                ->editColumn('date', '{!! getFormatted(date:$date) ?? "N/A" !!}')
                ->editColumn('parent_id', function (Page $page) {
                    return $page->parent?->title ?? '-';
                })
                ->editColumn('status', function (Page $page) {
                    $status = $page->status ? 'Published' : 'Draft';
                    $color = $page->status ? 'text-success' : 'text-danger';
                    return "<p class='{$color}'>{$status}</p>";
                })
                ->addColumn('action', 'ccms::page.datatable.action')
                ->rawColumns(['status', 'action'])
                ->toJson();
        }

        return view('ccms::page.index', [
            'title' => 'Page List',
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

        if ($isEditing) {
            $page = Page::findOrFail($request->id);
        } else {
            $maxOrder = Page::max('order');
            $order = $maxOrder ? ++$maxOrder : 1;
            $request->merge([
                'order' => $order,
                'status' => 0,
                'slug' => $request->title == 'Homepage' ? '/' : Str::slug($request->title),
            ]);
        }

        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('pages', 'title')->ignore($isEditing ? $request->id : null),
            ],
            'type' => ['required', 'string'],
            'order' => ['nullable', 'integer'],
            'section' => ['nullable', 'array'],
            'slug' => ['nullable', 'string'],
            'status' => ['nullable', 'integer'],
        ], [
            'title.unique' => 'Page already exists!',
        ]);

        if ($isEditing) {
            $page->update($validated);
        } else {
            $page = Page::create($validated);
        }

        $message = $isEditing ? "Page setting for {$page->title} has been updated." : "Page setting for {$page->title} has been created.";
        flash()->success($message);

        return redirect()->back();
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('ccms::page.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('ccms::page.partials._form', [
            'editable' => true,
            'page' => $page,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function editContent($id)
    {
        $page = Page::findOrFail($id);
        return view('ccms::page.content', [
            'title' => 'Update Page Content',
            'page' => $page,
            'editable' => true,
        ]);
    }

    public function updateContent(Request $request, $id)
    {
        $validated = $request->validate([]);
        $page = Page::findOrFail($id);
        $page->update($request->all());
        flash()->success("Page content for {$page->title} has been updated.");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        return response()->json(['status' => 200, 'message' => "Page has been deleted."], 200);
    }

    public function reorder(Request $request)
    {
        $pages = Page::all();
        foreach ($pages as $page) {
            foreach ($request->order as $order) {
                if ($order['id'] == $page->id) {
                    $page->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => true, 'message' => 'Reordered successfully'], 200);
    }

    public function toggle($id)
    {
        $page = Page::findOrFail($id);
        $page->update(['status' => !$page->status]);
        return response(['status' => 200, 'message' => 'Toggled successfully'], 200);
    }
}
