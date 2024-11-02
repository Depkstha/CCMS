<?php

namespace Modules\CCMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\CCMS\Models\Service;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $model = Service::query()->orderBy('order');
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->setRowClass('tableRow')
                ->editColumn('image', function (Service $service) {
                    return "<img src='{$service->image}' alt='{$service->title}' class='rounded avatar-sm material-shadow ms-2 img-thumbnail'>";
                })
                ->editColumn('date', '{!! getFormatted(date:$date) ?? "N/A" !!}')
                ->editColumn('status', function (Service $service) {
                    $status = $service->status ? 'Published' : 'Draft';
                    $color = $service->status ? 'text-success' : 'text-danger';
                    return "<p class='{$color}'>{$status}</p>";
                })
                ->addColumn('action', 'ccms::service.datatable.action')
                ->rawColumns(['image', 'status', 'action'])
                ->toJson();
        }

        return view('ccms::service.index', [
            'title' => 'Service List',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ccms::service.create', [
            'title' => 'Create Service',
            'editable' => false,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $maxOrder = Service::max('order');
        $order = $maxOrder ? ++$maxOrder : 1;

        $request->mergeIfMissing([
            'slug' => Str::slug($request->title),
            'order' => $order,
        ]);

        try {

            $validated = $request->validate([
                'title' => 'required',
            ]);

            Service::create($request->all());
            flash()->success("Service has been created!");
            return redirect()->route('service.index');

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
        $service = Service::findOrFail($id);
        return view('ccms::service.edit', [
            'title' => 'Edit Service',
            'editable' => true,
            'service' => $service,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([]);
        $service = Service::findOrFail($id);
        $service->update($request->all());
        flash()->success("Service has been updated.");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return response()->json(['status' => 200, 'message' => "Service has been deleted."], 200);
    }

    public function reorder(Request $request)
    {
        $services = Service::all();
        foreach ($services as $service) {
            foreach ($request->order as $order) {
                if ($order['id'] == $service->id) {
                    $service->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => true, 'message' => 'Reordered successfully'], 200);
    }
}
