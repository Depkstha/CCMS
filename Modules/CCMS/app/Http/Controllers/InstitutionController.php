<?php

namespace Modules\CCMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\CCMS\Models\Country;
use Modules\CCMS\Models\Institution;
use Modules\CCMS\Services\InstitutionService;
use Yajra\DataTables\Facades\DataTables;

class InstitutionController extends Controller
{
    protected $institutionService;

    public function __construct(InstitutionService $institutionService)
    {
        $this->institutionService = $institutionService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(?int $id = null)
    {
        $countryOptions = Country::where('status', 1)->pluck('title', 'id');
        $isEditing = !is_null($id);
        $institution = $isEditing ? $this->institutionService->getInstitutionById($id) : null;

        if (request()->ajax()) {
            $model = Institution::query()->orderBy('order');

            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->setRowClass('tableRow')
                ->editColumn('image', function (Institution $institution) {
                    return "<img src='{$institution->image}' alt='{$institution->title}' class='rounded avatar-sm material-shadow ms-2 img-thumbnail'>";
                })
                ->editColumn('status', function (Institution $institution) {
                    $status = $institution->status ? 'Published' : 'Draft';
                    $color = $institution->status ? 'text-success' : 'text-danger';
                    return "<p class='{$color}'>{$status}</p>";
                })
                ->addColumn('action', 'ccms::institution.datatable.action')
                ->rawColumns(['image', 'action', 'status'])
                ->toJson();
        }

        return view('ccms::institution.index', [
            'institution' => $institution,
            'editable' => $isEditing ? true : false,
            'title' => $isEditing ? 'Edit Institution' : 'Add Institution',
            'countryOptions' => $countryOptions,
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
                'title' => ['required', 'string', 'max:255', 'unique:institutions,title,' . $request->id],
                'slug' => ['required', 'string'],
                'url' => ['nullable'],
                'image' => ['nullable', 'string'],
            ]);

            $institution = $this->institutionService->updateInstitution($request->id, institutionData: $validated);
            flash()->success("Institution for {$institution->title} has been updated.");
            return to_route('institution.index');
        }

        $maxOrder = Institution::max('order');
        $order = $maxOrder ? ++$maxOrder : 1;

        $request->mergeIfMissing([
            'order' => $order,
        ]);

        $validated = $request->validate([
            'title' => ['required', 'string', 'unique:institutions,title'],
            'slug' => ['required', 'string'],
            'url' => ['nullable'],
            'image' => ['nullable', 'string'],
            'order' => ['integer'],
        ]);

        $institution = $this->institutionService->storeInstitution($validated);
        flash()->success("Institution for {$institution->title} has been created.");
        return to_route('institution.index');
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
        $institution = $this->institutionService->deleteInstitution($id);
        return response()->json(['status' => 200, 'message' => "Institution has been deleted."], 200);
    }

    public function reorder(Request $request)
    {
        $institutions = $this->institutionService->getAllCategories();

        foreach ($institutions as $institution) {
            foreach ($request->order as $order) {
                if ($order['id'] == $institution->id) {
                    $institution->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => true, 'message' => 'Reordered successfully'], 200);
    }
}
