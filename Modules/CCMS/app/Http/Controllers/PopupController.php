<?php

namespace Modules\CCMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\CCMS\Models\Popup;
use Yajra\DataTables\Facades\DataTables;

class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $model = Popup::query()->orderBy('order');
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->setRowClass('tableRow')
                ->editColumn('images', function (Popup $popup) {
                    $html = '<div clas="h-stack">';
                    foreach ($popup->images as $image) {
                        $html .= "<img src='{$image}' alt='{$popup->title}' class='rounded avatar-sm material-shadow ms-2 img-thumbnail'>";
                    }
                    $html .= "</div>";
                    return $html;
                })
                ->editColumn('status', function (Popup $popup) {
                    $status = $popup->status ? 'Published' : 'Draft';
                    $color = $popup->status ? 'text-success' : 'text-danger';
                    return "<p class='{$color}'>{$status}</p>";
                })
                ->addColumn('action', 'ccms::popup.datatable.action')
                ->rawColumns(['status', 'images', 'action'])
                ->toJson();
        }

        return view('ccms::popup.index', [
            'title' => 'Popup List',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ccms::popup.create', [
            'title' => 'Create Popup',
            'editable' => false,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $maxOrder = Popup::max('order');
        $order = $maxOrder ? ++$maxOrder : 1;

        $request->mergeIfMissing([
            'slug' => Str::slug($request->title),
            'order' => $order,
        ]);

        try {

            $validated = $request->validate([
                'title' => 'required',
            ]);

            Popup::create($request->all());
            flash()->success("Popup has been created!");
            return redirect()->route('popup.index');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('ccms::popup.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $popup = Popup::findOrFail($id);
        return view('ccms::popup.edit', [
            'title' => 'Edit Popup',
            'editable' => true,
            'popup' => $popup,
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

            $popup = Popup::findOrFail($id);
            $popup->update($request->all());

            flash()->success("Popup has been updated!");
            return redirect()->route('popup.index');

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
                $popup = Popup::findOrFail($id);
                $popup->delete();

                $higherOrders = Popup::where('id', '>', $id)->get();

                if ($higherOrders) {
                    foreach ($higherOrders as $higherOrder) {
                        $higherOrder->order--;
                        $higherOrder->saveQuietly();
                    }
                }

                return response()->json(['status' => 200, 'message' => 'Popup has been deleted!']);
            });

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function reorder(Request $request)
    {

        $popups = Popup::all();

        foreach ($popups as $popup) {
            foreach ($request->order as $order) {
                if ($order['id'] == $popup->id) {
                    $popup->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => 200, 'message' => 'Reordered successfully'], 200);
    }

    public function toggle($id)
    {
        $popup = Popup::findOrFail($id);
        $popup->update(['status' => !$popup->status]);
        return response(['status' => 200, 'message' => 'Toggled successfully'], 200);
    }
}
