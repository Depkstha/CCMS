<?php

namespace Modules\CCMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\CCMS\Models\Branch;
use Modules\CCMS\Models\Team;
use Yajra\DataTables\Facades\DataTables;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $model = Team::query()->orderBy('order');
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->setRowClass('tableRow')
                ->editColumn('image', function (Team $team) {
                    return "<img src='{$team->image}' alt='{$team->title}' class='rounded avatar-sm material-shadow ms-2 img-thumbnail'>";
                })
                ->editColumn('status', function (Team $team) {
                    $status = $team->status ? 'Published' : 'Draft';
                    $color = $team->status ? 'text-success' : 'text-danger';
                    return "<p class='{$color}'>{$status}</p>";
                })
                ->addColumn('action', 'ccms::team.datatable.action')
                ->rawColumns(['status', 'image', 'action'])
                ->toJson();
        }

        return view('ccms::team.index', [
            'title' => 'Team List',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branchOptions = Branch::where('status', 1)->pluck('title', 'id');
        return view('ccms::team.create', [
            'title' => 'Create Team',
            'editable' => false,
            'branchOptions' => $branchOptions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $maxOrder = Team::max('order');
        $order = $maxOrder ? ++$maxOrder : 1;

        $request->mergeIfMissing([
            'slug' => Str::slug($request->title),
            'order' => $order,
        ]);

        try {

            $validated = $request->validate([
                'title' => 'required',
            ]);

            Team::create($request->all());
            flash()->success("Team has been created!");
            return redirect()->route('team.index');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('ccms::team.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $branchOptions = Branch::where('status', 1)->pluck('title', 'id');
        $team = Team::findOrFail($id);
        return view('ccms::team.edit', [
            'title' => 'Edit Team',
            'editable' => true,
            'team' => $team,
            'branchOptions' => $branchOptions
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->mergeIfMissing([
            'slug' => Str::slug($request->title),
        ]);

        try {

            $request->validate([
                'title' => 'required',
            ]);

            $team = Team::findOrFail($id);
            $team->update($request->all());

            flash()->success("Team has been updated!");
            return redirect()->route('team.index');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        try {

            DB::transaction(function () use ($id) {
                $team = Team::findOrFail($id);
                $team->delete();

                $higherOrders = Team::where('id', '>', $id)->get();

                if ($higherOrders) {
                    foreach ($higherOrders as $higherOrder) {
                        $higherOrder->order--;
                        $higherOrder->saveQuietly();
                    }
                }

                return response()->json(['status' => 200, 'message' => 'Team has been deleted!']);
            });

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function reorder(Request $request)
    {

        $teams = Team::all();

        foreach ($teams as $team) {
            foreach ($request->order as $order) {
                if ($order['id'] == $team->id) {
                    $team->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => 200, 'message' => 'Reordered successfully'], 200);
    }

    public function toggle($id)
    {
        $team = Team::findOrFail($id);
        $team->update(['status' => !$team->status]);
        return response(['status' => 200, 'message' => 'Toggled successfully'], 200);
    }
}
