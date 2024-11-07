<?php

namespace Modules\CCMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\CCMS\Models\Slider;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $model = Slider::query()->orderBy('order');
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->setRowClass('tableRow')
                ->editColumn('images', function (Slider $slider) {
                    $html = '<div clas="h-stack">';
                    foreach ($slider->images as $image) {
                        $html .= "<img src='{$image}' alt='{$slider->title}' class='rounded avatar-sm material-shadow ms-2 img-thumbnail'>";
                    }
                    $html .= "</div>";
                    return $html;
                })
                ->editColumn('status', function (Slider $slider) {
                    $status = $slider->status ? 'Published' : 'Draft';
                    $color = $slider->status ? 'text-success' : 'text-danger';
                    return "<p class='{$color}'>{$status}</p>";
                })
                ->addColumn('action', 'ccms::slider.datatable.action')
                ->rawColumns(['status', 'images', 'action'])
                ->toJson();
        }

        return view('ccms::slider.index', [
            'title' => 'Slider List',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ccms::slider.create', [
            'title' => 'Create Slider',
            'editable' => false,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $maxOrder = Slider::max('order');
        $order = $maxOrder ? ++$maxOrder : 1;

        $request->mergeIfMissing([
            'slug' => Str::slug($request->title),
            'order' => $order,
        ]);

        try {

            $validated = $request->validate([
                'title' => 'required',
            ]);

            Slider::create($request->all());
            flash()->success("Slider has been created!");
            return redirect()->route('slider.index');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('ccms::slider.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('ccms::slider.edit', [
            'title' => 'Edit Slider',
            'editable' => true,
            'slider' => $slider,
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

            $slider = Slider::findOrFail($id);
            $slider->update($request->all());

            flash()->success("Slider has been updated!");
            return redirect()->route('slider.index');

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
                $slider = Slider::findOrFail($id);
                $slider->delete();

                $higherOrders = Slider::where('id', '>', $id)->get();

                if ($higherOrders) {
                    foreach ($higherOrders as $higherOrder) {
                        $higherOrder->order--;
                        $higherOrder->saveQuietly();
                    }
                }

                return response()->json(['status' => 200, 'message' => 'Slider has been deleted!']);
            });

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function reorder(Request $request)
    {

        $sliders = Slider::all();

        foreach ($sliders as $slider) {
            foreach ($request->order as $order) {
                if ($order['id'] == $slider->id) {
                    $slider->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => 200, 'message' => 'Reordered successfully'], 200);
    }

    public function toggle($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->update(['status' => !$slider->status]);
        return response(['status' => 200, 'message' => 'Toggled successfully'], 200);
    }
}
