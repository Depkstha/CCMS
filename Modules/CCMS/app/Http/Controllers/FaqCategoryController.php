<?php

namespace Modules\CCMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\CCMS\Models\FaqCategory;
use Modules\CCMS\Services\FaqCategoryService;
use Yajra\DataTables\Facades\DataTables;

class FaqCategoryController extends Controller
{
    protected $faqCategoryService;

    public function __construct(FaqCategoryService $faqCategoryService)
    {
        $this->faqCategoryService = $faqCategoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(?int $id = null)
    {
        $isEditing = !is_null($id);
        $faqCategory = $isEditing ? $this->faqCategoryService->getFaqCategoryById($id) : null;

        if (request()->ajax()) {
            $model = FaqCategory::query()->orderBy('order');

            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->setRowClass('tableRow')
                ->editColumn('status', function (FaqCategory $faqCategory) {
                    $status = $faqCategory->status ? 'Published' : 'Draft';
                    $color = $faqCategory->status ? 'text-success' : 'text-danger';
                    return "<p class='{$color}'>{$status}</p>";
                })
                ->addColumn('action', 'ccms::faqCategory.datatable.action')
                ->rawColumns(['action', 'status'])
                ->toJson();
        }

        return view('ccms::faqCategory.index', [
            'faqCategory' => $faqCategory,
            'title' => $isEditing ? 'Edit Faq Category' : 'Add Faq Category',
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
                'title' => ['required', 'string', 'max:255','unique:faq_categories,title,'.$request->id],
                'slug' => ['required', 'string'],
            ]);

            $faqCategory = $this->faqCategoryService->updateFaqCategory($request->id, faqCategoryData: $validated);
            flash()->success("FaqCategory for {$faqCategory->title} has been updated.");
            return to_route('faqCategory.index');
        }

        $maxOrder = FaqCategory::max('order');
        $order = $maxOrder ? ++$maxOrder : 1;

        $request->mergeIfMissing([
            'order' => $order
        ]);

        $validated = $request->validate([
            'title' => ['required', 'string','unique:faq_categories,title'],
            'slug' => ['required', 'string'],
            'order' => ['integer'],
        ]);

        $faqCategory = $this->faqCategoryService->storeFaqCategory($validated);
        flash()->success("FaqCategory for {$faqCategory->title} has been created.");
        return to_route('faqCategory.index');
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
        $faqCategory = $this->faqCategoryService->getFaqCategoryById($id);
        return view('ccms::faqCategory.edit', [
            'faqCategory' => $faqCategory,
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
        $faqCategory = $this->faqCategoryService->deleteFaqCategory($id);
        return response()->json(['status' => 200, 'message' => "Faq Category has been deleted."], 200);
    }

    public function reorder(Request $request)
    {
        $faqCategories = $this->faqCategoryService->getAllfaqCategories();

        foreach ($faqCategories as $faqCategory) {
            foreach ($request->order as $order) {
                if ($order['id'] == $faqCategory->id) {
                    $faqCategory->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => true, 'message' => 'Reordered successfully'], 200);
    }
}
