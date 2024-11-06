<?php

namespace Modules\CCMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\CCMS\Models\Category;
use Modules\CCMS\Services\CategoryService;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(?int $id = null)
    {
        $isEditing = !is_null($id);
        $category = $isEditing ? $this->categoryService->getCategoryById($id) : null;

        if (request()->ajax()) {
            $model = Category::query()->orderBy('order');

            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->setRowClass('tableRow')
                ->editColumn('status', function (Category $category) {
                    $status = $category->status ? 'Published' : 'Draft';
                    $color = $category->status ? 'text-success' : 'text-danger';
                    return "<p class='{$color}'>{$status}</p>";
                })
                ->addColumn('action', 'ccms::category.datatable.action')
                ->rawColumns(['action', 'status'])
                ->toJson();
        }

        return view('ccms::category.index', [
            'category' => $category,
            'title' => $isEditing ? 'Edit Category' : 'Add Category',
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
        $isEditing = $request->has('id');

        $request->merge([
            'slug' => Str::slug($request->title),
        ]);

        if ($isEditing) {
            $validated = $request->validate([
                'title' => ['required', 'string', 'max:255','unique:categories,title,'.$request->id],
                'slug' => ['required', 'string'],
            ]);

            $category = $this->categoryService->updateCategory($request->id, categoryData: $validated);
            flash()->success("Category for {$category->title} has been updated.");
            return to_route('category.index');
        }

        $maxOrder = Category::max('order');
        $order = $maxOrder ? ++$maxOrder : 1;

        $request->mergeIfMissing([
            'order' => $order
        ]);

        $validated = $request->validate([
            'title' => ['required', 'string','unique:categories,title'],
            'slug' => ['required', 'string'],
            'order' => ['integer'],
        ]);

        $category = $this->categoryService->storeCategory($validated);
        flash()->success("Category for {$category->title} has been created.");
        return to_route('category.index');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = $this->categoryService->getCategoryById($id);
        return view('ccms::category.edit', [
            'category' => $category,
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
        $category = $this->categoryService->deleteCategory($id);
        return response()->json(['status' => 200, 'message' => "Category has been deleted."], 200);
    }

    public function reorder(Request $request)
    {
        $categorys = $this->categoryService->getAllCategories();

        foreach ($categorys as $category) {
            foreach ($request->order as $order) {
                if ($order['id'] == $category->id) {
                    $category->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => true, 'message' => 'Reordered successfully'], 200);
    }
}
