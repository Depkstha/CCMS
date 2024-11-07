<?php

namespace Modules\CCMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\CCMS\Models\Partner;
use Modules\CCMS\Services\PartnerService;
use Yajra\DataTables\Facades\DataTables;

class PartnerController extends Controller
{
    protected $partnerService;

    public function __construct(PartnerService $partnerService)
    {
        $this->partnerService = $partnerService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(?int $id = null)
    {
        $isEditing = !is_null($id);
        $partner = $isEditing ? $this->partnerService->getPartnerById($id) : null;

        if (request()->ajax()) {
            $model = Partner::query()->orderBy('order');

            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->setRowClass('tableRow')
                ->editColumn('image', function (Partner $partner) {
                    return "<img src='{$partner->image}' alt='{$partner->title}' class='rounded avatar-sm material-shadow ms-2 img-thumbnail'>";
                })
                ->editColumn('status', function (Partner $partner) {
                    $status = $partner->status ? 'Published' : 'Draft';
                    $color = $partner->status ? 'text-success' : 'text-danger';
                    return "<p class='{$color}'>{$status}</p>";
                })
                ->addColumn('action', 'ccms::partner.datatable.action')
                ->rawColumns(['image', 'action', 'status'])
                ->toJson();
        }

        return view('ccms::partner.index', [
            'partner' => $partner,
            'editable' => $isEditing ? true : false,
            'title' => $isEditing ? 'Edit Partner' : 'Add Partner',
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
                'title' => ['required', 'string', 'max:255', 'unique:partners,title,' . $request->id],
                'slug' => ['required', 'string'],
                'url' => ['nullable'],
                'image' => ['nullable', 'string'],
            ]);

            $partner = $this->partnerService->updatePartner($request->id, partnerData: $validated);
            flash()->success("Partner for {$partner->title} has been updated.");
            return to_route('partner.index');
        }

        $maxOrder = Partner::max('order');
        $order = $maxOrder ? ++$maxOrder : 1;

        $request->mergeIfMissing([
            'order' => $order,
        ]);

        $validated = $request->validate([
            'title' => ['required', 'string', 'unique:partners,title'],
            'slug' => ['required', 'string'],
            'url' => ['nullable'],
            'image' => ['nullable', 'string'],
            'order' => ['integer'],
        ]);

        $partner = $this->partnerService->storePartner($validated);
        flash()->success("Partner for {$partner->title} has been created.");
        return to_route('partner.index');
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
        $partner = $this->partnerService->deletePartner($id);
        return response()->json(['status' => 200, 'message' => "Partner has been deleted."], 200);
    }

    public function reorder(Request $request)
    {
        $partners = $this->partnerService->getAllCategories();

        foreach ($partners as $partner) {
            foreach ($request->order as $order) {
                if ($order['id'] == $partner->id) {
                    $partner->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => true, 'message' => 'Reordered successfully'], 200);
    }

    public function toggle($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->update(['status' => !$partner->status]);
        return response(['status' => 200, 'message' => 'Toggled successfully'], 200);
    }
}
