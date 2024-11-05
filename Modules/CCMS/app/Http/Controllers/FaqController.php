<?php

namespace Modules\CCMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\CCMS\Models\Faq;
use Modules\CCMS\Models\FaqCategory;
use Modules\CCMS\Services\FaqService;
use Yajra\DataTables\Facades\DataTables;

class FaqController extends Controller
{
    protected $faqService;

    public function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(?int $id = null)
    {
        $isEditing = !is_null($id);
        $faq = $isEditing ? $this->faqService->getFaqById($id) : null;
        $categoryOptions = FaqCategory::pluck('title', 'id');


        if (request()->ajax()) {
            $model = Faq::query()->orderBy('order');

            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->setRowClass('tableRow')
                ->editColumn('category_id', function (Faq $faq) {
                    return $faq->category?->title ?? '-';
                })
                ->editColumn('status', function (Faq $faq) {
                    $status = $faq->status ? 'Published' : 'Draft';
                    $color = $faq->status ? 'text-success' : 'text-danger';
                    return "<p class='{$color}'>{$status}</p>";
                })
                ->addColumn('action', 'ccms::faq.datatable.action')
                ->rawColumns(['action', 'status'])
                ->toJson();
        }

        return view('ccms::faq.index', [
            'faq' => $faq,
            'editable' => $isEditing ? true : false,
            'title' => $isEditing ? 'Edit Faq' : 'Add Faq',
            'categoryOptions' => $categoryOptions,
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
                'title' => ['required', 'string', 'max:255', 'unique:faqs,title,' . $request->id],
                'slug' => ['required', 'string'],
                'description' => ['required', 'string'],
            ]);

            $faq = $this->faqService->updateFaq($request->id, faqData: $validated);
            flash()->success("Faq for {$faq->title} has been updated.");
            return to_route('faq.index');
        }

        $maxOrder = Faq::max('order');
        $order = $maxOrder ? ++$maxOrder : 1;

        $request->mergeIfMissing([
            'order' => $order,
        ]);

        $validated = $request->validate([
            'title' => ['required', 'string', 'unique:faqs,title'],
            'slug' => ['required', 'string'],
            'description' => ['required', 'string'],
            'order' => ['integer'],
        ]);

        $faq = $this->faqService->storeFaq($validated);
        flash()->success("Faq for {$faq->title} has been created.");
        return to_route('faq.index');
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
        //
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
        $faq = $this->faqService->deleteFaq($id);
        return response()->json(['status' => 200, 'message' => "Faq for {$faq->title} has been deleted."], 200);
    }

    public function reorder(Request $request)
    {
        $faqs = $this->faqService->getAllCategories();

        foreach ($faqs as $faq) {
            foreach ($request->order as $order) {
                if ($order['id'] == $faq->id) {
                    $faq->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => true, 'message' => 'Reordered successfully'], 200);
    }
}
