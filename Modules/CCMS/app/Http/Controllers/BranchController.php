<?php

namespace Modules\CCMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\CCMS\Models\Branch;
use Yajra\DataTables\Facades\DataTables;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $model = Branch::query()->orderBy('order');
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->setRowClass('tableRow')
                ->editColumn('image', function (Branch $branch) {
                    return "<img src='{$branch->image}' alt='{$branch->title}' class='rounded avatar-sm material-shadow ms-2 img-thumbnail'>";
                })
                ->editColumn('date', '{!! getFormatted(date:$date) ?? "N/A" !!}')
                ->editColumn('status', function (Branch $branch) {
                    $status = $branch->status ? 'Published' : 'Draft';
                    $color = $branch->status ? 'text-success' : 'text-danger';
                    return "<p class='{$color}'>{$status}</p>";
                })
                ->addColumn('action', 'ccms::branch.datatable.action')
                ->rawColumns(['image', 'status', 'action'])
                ->toJson();
        }

        return view('ccms::branch.index', [
            'title' => 'Branch List',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ccms::branch.create', [
            'title' => 'Create Branch',
            'editable' => false,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $maxOrder = Branch::max('order');
        $order = $maxOrder ? ++$maxOrder : 1;

        $request->mergeIfMissing([
            'slug' => Str::slug($request->title),
            'order' => $order,
        ]);

        try {

            $validated = $request->validate([
                'title' => 'required',
            ]);

            Branch::create($request->all());
            flash()->success("Branch has been created!");
            return redirect()->route('branch.index');

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
        $branch = Branch::findOrFail($id);
        return view('ccms::branch.edit', [
            'title' => 'Edit Branch',
            'editable' => true,
            'branch' => $branch,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([]);
        $branch = Branch::findOrFail($id);
        $branch->update($request->all());
        flash()->success("Branch has been updated.");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();
        return response()->json(['status' => 200, 'message' => "Branch has been deleted."], 200);
    }

    public function reorder(Request $request)
    {
        $branchs = Branch::all();
        foreach ($branchs as $branch) {
            foreach ($request->order as $order) {
                if ($order['id'] == $branch->id) {
                    $branch->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => true, 'message' => 'Reordered successfully'], 200);
    }

    public function toggle($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->update(['status' => !$branch->status]);
        return response(['status' => 200, 'message' => 'Toggled successfully'], 200);
    }
}
