<?php

namespace Modules\CCMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
                ->editColumn('date', '{!! getFormatted(date:$date) !!}')
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
        $maxOrder = Page::max('order');
        $order = $maxOrder ? ++$maxOrder : 1;

        $request->mergeIfMissing([
            'order' => $order,
        ]);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:pages,title'],
            'type' => ['required', 'string'],
            'order' => ['integer'],
            'section' => ['nullable', 'array'],
        ],[
            'page.unique' => 'Page already exists!'
        ]);

        $page = Page::create($validated);
        flash()->success("Page for {$page->title} has been created.");
        return to_route('page.index');
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

        $pageOptions = Page::where([
            ['type', '=', 'page'],
            ['id', '!=', $page->id]
        ])->pluck('title', 'id');

        return view('ccms::page.edit', [
            'editable' => true,
            'page' => $page,
            'pageOptions' => $pageOptions,
            'title' => 'Update Page Content',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:pages,title,' . $id],
            'type' => ['required', 'string'],
            'order' => ['integer'],
            'section' => ['nullable', 'array'],
        ]);

        $page = Page::findOrFail($id);
        $page->update($validated);
        flash()->success("Page for {$page->title} has been created.");
        return to_route('page.index');
    }


    public function updateContent(Request $request, $id)
    {
        $validated = $request->validate([
        ]);

        $page = Page::findOrFail($id);
        $page->update($validated);
        flash()->success("Content for {$page->title} has been updated.");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
