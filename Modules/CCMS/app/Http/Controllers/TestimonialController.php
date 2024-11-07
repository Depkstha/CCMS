<?php

namespace Modules\CCMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\CCMS\Models\Branch;
use Modules\CCMS\Models\Testimonial;
use Yajra\DataTables\Facades\DataTables;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $model = Testimonial::query()->orderBy('order');
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->setRowClass('tableRow')
                ->editColumn('image', function (Testimonial $testimonial) {
                    return "<img src='{$testimonial->image}' alt='{$testimonial->title}' class='rounded avatar-sm material-shadow ms-2 img-thumbnail'>";
                })
                ->editColumn('status', function (Testimonial $testimonial) {
                    $status = $testimonial->status ? 'Published' : 'Draft';
                    $color = $testimonial->status ? 'text-success' : 'text-danger';
                    return "<p class='{$color}'>{$status}</p>";
                })
                ->addColumn('action', 'ccms::testimonial.datatable.action')
                ->rawColumns(['status', 'image', 'action'])
                ->toJson();
        }

        return view('ccms::testimonial.index', [
            'title' => 'Testimonial List',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branchOptions = Branch::where('status', 1)->pluck('title', 'id');
        return view('ccms::testimonial.create', [
            'title' => 'Create Testimonial',
            'editable' => false,
            'branchOptions' => $branchOptions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $maxOrder = Testimonial::max('order');
        $order = $maxOrder ? ++$maxOrder : 1;

        $request->mergeIfMissing([
            'slug' => Str::slug($request->title),
            'order' => $order,
        ]);

        try {

            $validated = $request->validate([
                'title' => 'required',
            ]);

            Testimonial::create($request->all());
            flash()->success("Testimonial has been created!");
            return redirect()->route('testimonial.index');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('ccms::testimonial.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $branchOptions = Branch::where('status', 1)->pluck('title', 'id');
        $testimonial = Testimonial::findOrFail($id);
        return view('ccms::testimonial.edit', [
            'title' => 'Edit Testimonial',
            'editable' => true,
            'testimonial' => $testimonial,
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

            $testimonial = Testimonial::findOrFail($id);
            $testimonial->update($request->all());

            flash()->success("Testimonial has been updated!");
            return redirect()->route('testimonial.index');

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
                $testimonial = Testimonial::findOrFail($id);
                $testimonial->delete();

                $higherOrders = Testimonial::where('id', '>', $id)->get();

                if ($higherOrders) {
                    foreach ($higherOrders as $higherOrder) {
                        $higherOrder->order--;
                        $higherOrder->saveQuietly();
                    }
                }

                return response()->json(['status' => 200, 'message' => 'Testimonial has been deleted!']);
            });

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function reorder(Request $request)
    {

        $testimonials = Testimonial::all();

        foreach ($testimonials as $testimonial) {
            foreach ($request->order as $order) {
                if ($order['id'] == $testimonial->id) {
                    $testimonial->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => 200, 'message' => 'Reordered successfully'], 200);
    }

    public function toggle($id)
    {
        $menu = Testimonial::findOrFail($id);
        $menu->update(['status' => !$menu->status]);
        return response(['status' => 200, 'message' => 'Toggled successfully'], 200);
    }
}
