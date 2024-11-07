<?php

namespace Modules\CCMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\CCMS\Models\Counter;
use Modules\CCMS\Services\CounterService;
use Yajra\DataTables\Facades\DataTables;

class CounterController extends Controller
{
    protected $counterService;

    public function __construct(CounterService $counterService)
    {
        $this->counterService = $counterService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(?int $id = null)
    {
        $isEditing = !is_null($id);
        $counter = $isEditing ? $this->counterService->getCounterById($id) : null;

        if (request()->ajax()) {
            $model = Counter::query()->orderBy('order');

            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->setRowClass('tableRow')
                ->editColumn('image', function (Counter $counter) {
                    $html = $counter->getRawOriginal('image') ? "<img src='{$counter->image}' alt='{$counter->title}' class='rounded avatar-sm material-shadow ms-2 img-thumbnail'>" : '-';
                    return $html;
                })
                ->editColumn('icon', function (Counter $counter) {
                    return $counter->icon ?? '-';
                })
                ->editColumn('status', function (Counter $counter) {
                    $status = $counter->status ? 'Published' : 'Draft';
                    $color = $counter->status ? 'text-success' : 'text-danger';
                    return "<p class='{$color}'>{$status}</p>";
                })
                ->addColumn('action', 'ccms::counter.datatable.action')
                ->rawColumns(['image', 'action', 'status'])
                ->toJson();
        }

        return view('ccms::counter.index', [
            'counter' => $counter,
            'editable' => $isEditing ? true : false,
            'title' => $isEditing ? 'Edit Counter' : 'Add Counter',
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
                'title' => ['required', 'string', 'max:255', 'unique:counters,title,' . $request->id],
                'slug' => ['required', 'string'],
                'counter' => ['nullable'],
                'icon' => ['nullable'],
                'image' => ['nullable', 'string'],
            ]);

            $counter = $this->counterService->updateCounter($request->id, counterData: $validated);
            flash()->success("Counter for {$counter->title} has been updated.");
            return to_route('counter.index');
        }

        $maxOrder = Counter::max('order');
        $order = $maxOrder ? ++$maxOrder : 1;

        $request->mergeIfMissing([
            'order' => $order,
        ]);

        $validated = $request->validate([
            'title' => ['required', 'string', 'unique:counters,title'],
            'slug' => ['required', 'string'],
            'icon' => ['nullable'],
            'counter' => ['nullable'],
            'image' => ['nullable', 'string'],
            'order' => ['integer'],
        ]);

        $counter = $this->counterService->storeCounter($validated);
        flash()->success("Counter for {$counter->title} has been created.");
        return to_route('counter.index');
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
        $counter = $this->counterService->deleteCounter($id);
        return response()->json(['status' => 200, 'message' => "Counter has been deleted."], 200);
    }

    public function reorder(Request $request)
    {
        $counters = $this->counterService->getAllCategories();

        foreach ($counters as $counter) {
            foreach ($request->order as $order) {
                if ($order['id'] == $counter->id) {
                    $counter->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => true, 'message' => 'Reordered successfully'], 200);
    }

    public function toggle($id)
    {
        $counter = Counter::findOrFail($id);
        $counter->update(['status' => !$counter->status]);
        return response(['status' => 200, 'message' => 'Toggled successfully'], 200);
    }
}
