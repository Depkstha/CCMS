<?php

namespace Modules\CCMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\CCMS\Models\Country;
use Yajra\DataTables\Facades\DataTables;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $model = Country::query()->orderBy('order');
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->setRowClass('tableRow')
                ->editColumn('image', function (Country $country) {
                    return "<img src='{$country->image}' alt='{$country->title}' class='rounded avatar-sm material-shadow ms-2 img-thumbnail'>";
                })
                ->editColumn('status', function (Country $country) {
                    $status = $country->status ? 'Published' : 'Draft';
                    $color = $country->status ? 'text-success' : 'text-danger';
                    return "<p class='{$color}'>{$status}</p>";
                })
                ->addColumn('action', 'ccms::country.datatable.action')
                ->rawColumns(['image', 'status', 'action'])
                ->toJson();
        }

        return view('ccms::country.index', [
            'title' => 'Country List',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ccms::country.create', [
            'title' => 'Create Country',
            'editable' => false,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $maxOrder = Country::max('order');
        $order = $maxOrder ? ++$maxOrder : 1;

        $request->mergeIfMissing([
            'slug' => Str::slug($request->title),
            'order' => $order,
        ]);

        try {

            $validated = $request->validate([
                'title' => 'required',
            ]);

            Country::create($request->all());
            flash()->success("Country has been created!");
            return redirect()->route('country.index');

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
        $country = Country::findOrFail($id);
        return view('ccms::country.edit', [
            'title' => 'Edit Country',
            'editable' => true,
            'country' => $country,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([]);
        $country = Country::findOrFail($id);
        $country->update($request->all());
        flash()->success("Country has been updated.");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return response()->json(['status' => 200, 'message' => "Country has been deleted."], 200);
    }

    public function reorder(Request $request)
    {
        $countrys = Country::all();
        foreach ($countrys as $country) {
            foreach ($request->order as $order) {
                if ($order['id'] == $country->id) {
                    $country->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => true, 'message' => 'Reordered successfully'], 200);
    }

    public function toggle($id)
    {
        $country = Country::findOrFail($id);
        $country->update(['status' => !$country->status]);
        return response(['status' => 200, 'message' => 'Toggled successfully'], 200);
    }
}
