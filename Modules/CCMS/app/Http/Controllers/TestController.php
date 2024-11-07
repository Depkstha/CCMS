<?php

namespace Modules\CCMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\CCMS\Models\Test;
use Yajra\DataTables\Facades\DataTables;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $model = Test::query()->orderBy('order');
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->setRowClass('tableRow')
                ->editColumn('image', function (Test $test) {
                    return "<img src='{$test->image}' alt='{$test->title}' class='rounded avatar-sm material-shadow ms-2 img-thumbnail'>";
                })
                ->editColumn('status', function (Test $test) {
                    $status = $test->status ? 'Published' : 'Draft';
                    $color = $test->status ? 'text-success' : 'text-danger';
                    return "<p class='{$color}'>{$status}</p>";
                })
                ->addColumn('action', 'ccms::test.datatable.action')
                ->rawColumns(['image', 'status', 'action'])
                ->toJson();
        }

        return view('ccms::test.index', [
            'title' => 'Test List',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ccms::test.create', [
            'title' => 'Create Test',
            'editable' => false,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $maxOrder = Test::max('order');
        $order = $maxOrder ? ++$maxOrder : 1;

        $request->mergeIfMissing([
            'slug' => Str::slug($request->title),
            'order' => $order,
        ]);

        try {

            $validated = $request->validate([
                'title' => 'required',
            ]);

            Test::create($request->all());
            flash()->success("Test has been created!");
            return redirect()->route('test.index');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('ccms::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $test = Test::findOrFail($id);
        return view('ccms::test.edit', [
            'title' => 'Edit Test',
            'editable' => true,
            'test' => $test,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([]);
        $test = Test::findOrFail($id);
        $test->update($request->all());
        flash()->success("Test has been updated.");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $test = Test::findOrFail($id);
        $test->delete();
        return response()->json(['status' => 200, 'message' => "Test has been deleted."], 200);
    }

    public function reorder(Request $request)
    {
        $tests = Test::all();
        foreach ($tests as $test) {
            foreach ($request->order as $order) {
                if ($order['id'] == $test->id) {
                    $test->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => true, 'message' => 'Reordered successfully'], 200);
    }

    public function toggle($id)
    {
        $test = Test::findOrFail($id);
        $test->update(['status' => !$test->status]);
        return response(['status' => 200, 'message' => 'Toggled successfully'], 200);
    }
}
