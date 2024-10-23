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
            'title' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string'],
            'order' => ['integer'],
            'section' => ['nullable', 'array'],
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
        return view('ccms::page.edit', [
            'editable' => true,
            'page' => $page,
            'title' => 'Update Page Content',
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
        //
    }
}
