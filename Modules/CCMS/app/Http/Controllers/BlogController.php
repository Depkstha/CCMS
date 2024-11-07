<?php

namespace Modules\CCMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\CCMS\Models\Blog;
use Modules\CCMS\Models\Category;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $model = Blog::query()->orderBy('order');
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->setRowClass('tableRow')
                ->editColumn('image', function (Blog $blog) {
                    return "<img src='{$blog->image}' alt='{$blog->title}' class='rounded avatar-sm material-shadow ms-2 img-thumbnail'>";
                })
                ->editColumn('date', '{!! getFormatted(date:$date) ?? "N/A" !!}')
                ->editColumn('status', function (Blog $blog) {
                    $status = $blog->status ? 'Published' : 'Draft';
                    $color = $blog->status ? 'text-success' : 'text-danger';
                    return "<p class='{$color}'>{$status}</p>";
                })
                ->addColumn('action', 'ccms::blog.datatable.action')
                ->rawColumns(['image', 'status', 'action'])
                ->toJson();
        }

        return view('ccms::blog.index', [
            'title' => 'Blog List',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryOptions = Category::pluck('title', 'id');
        return view('ccms::blog.create', [
            'title' => 'Create Blog',
            'editable' => false,
            'categoryOptions' => $categoryOptions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $maxOrder = Blog::max('order');
        $order = $maxOrder ? ++$maxOrder : 1;

        $request->mergeIfMissing([
            'slug' => Str::slug($request->title),
            'order' => $order,
        ]);

        try {

            $validated = $request->validate([
                'title' => 'required',
            ]);

            Blog::create($request->all());
            flash()->success("Blog has been created!");
            return redirect()->route('blog.index');

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
        $categoryOptions = Category::pluck('title', 'id');
        $blog = Blog::findOrFail($id);
        return view('ccms::blog.edit', [
            'title' => 'Edit Blog',
            'editable' => true,
            'blog' => $blog,
            'categoryOptions' => $categoryOptions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([]);
        $blog = Blog::findOrFail($id);
        $blog->update($request->all());
        flash()->success("Blog has been updated.");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return response()->json(['status' => 200, 'message' => "Blog has been deleted."], 200);
    }

    public function reorder(Request $request)
    {
        $blogs = Blog::all();
        foreach ($blogs as $blog) {
            foreach ($request->order as $order) {
                if ($order['id'] == $blog->id) {
                    $blog->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => true, 'message' => 'Reordered successfully'], 200);
    }

    public function toggle($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->update(['status' => !$blog->status]);
        return response(['status' => 200, 'message' => 'Toggled successfully'], 200);
    }
}
