<?php

namespace Modules\Menu\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Modules\CCMS\Models\Page;
use Modules\Menu\Interfaces\MenuInterface;
use Modules\Menu\Models\Menu;
use Yajra\DataTables\Facades\DataTables;

class MenuController extends Controller
{
    private $menu;

    public function __construct(MenuInterface $menu)
    {
        $this->menu = $menu;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $model = Menu::query()->orderBy('order');
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->setRowClass('tableRow')
                ->addColumn('parent', function (Menu $menu) {
                    return $menu->parent?->title ?? '-';
                })
                ->addColumn('parameter', function (Menu $menu) {
                    return $menu->url_parameter;
                })
                ->editColumn('type', '{!! config("constants.menu_type_options")[$type] !!}')
                ->editColumn('status', function (Menu $menu) {
                    $status = $menu->status ? 'Published' : 'Draft';
                    $color = $menu->status ? 'text-success' : 'text-danger';
                    return "<p class='{$color}'>{$status}</p>";
                })
                ->addColumn('action', 'menu::menu.datatable.action')
                ->rawColumns(['status', 'action'])
                ->toJson();
        }

        return view('menu::menu.index', [
            'title' => 'Menu List',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Create Menu';
        $data['editable'] = false;
        $data['menuOptions'] = $this->menu->pluck();
        $data['menuTypes'] = config('constants.menu_type_options');
        return view('menu::menu.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $maxOrder = Menu::max('order');
        $order = $maxOrder ? ++$maxOrder : 1;

        $request->mergeIfMissing([
            'alias' => Str::slug($request->title),
            'parent_id' => $request->parent_id,
            'order' => $order,
        ]);

        try {

            $validated = $request->validate([
                'menu_location_id' => 'required',
                'title' => 'required',
                'type' => 'required',
                'parameter' => 'required',
            ]);

            $menu = $this->menu->create($validated);
            flash()->success("Menu for {$menu->title} has been created!");
            return redirect()->route('menu.index');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }

    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('cms::menu.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['title'] = 'Edit Menu';
        $data['editable'] = true;
        $data['menu'] = $this->menu->findOne($id);
        $data['menuOptions'] = $this->menu->pluck();
        $data['menuTypes'] = config('constants.menu_type_options');
        return view('menu::menu.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->merge([
            'alias' => Str::slug('title'),
        ]);

        try {

            $validated = $request->validate([
                'menu_location_id' => 'required',
                'title' => 'required',
                'type' => 'required',
                'parameter' => 'required',
            ]);

            $this->menu->update($id, $request->except('_method', '_token'));

            return redirect()->route('menus.index')->with('success', 'Menu has been updated!');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {

            $this->menu->delete($id);
            $higherOrders = Menu::where('id', '>', $id)->get();

            if ($higherOrders) {
                foreach ($higherOrders as $higherOrder) {
                    $higherOrder->order--;
                    $higherOrder->saveQuietly();
                }
            }

            DB::commit();

            return response()->json(['status' => 200, 'message' => 'Menu has been deleted!']);

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function getMenuTypeOptions(Request $request)
    {
        $tableName = $request->tableName;

        switch ($tableName) {

            case 'pages':
                $menuTypeOptions = Page::where('type', 'page')->pluck('title', 'id');
                break;

            case 'posts':
                // $menuTypeOptions = $this->post->pluck();
                break;

            default:
                $menuTypeOptions = [];

        }

        return response()->json(['status' => 200, 'data' => $menuTypeOptions], 200);
    }

    public function reorder(Request $request)
    {

        $menus = $this->menu->findAll();

        foreach ($menus as $menu) {
            foreach ($request->order as $order) {
                if ($order['id'] == $menu->id) {
                    $menu->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => 200, 'message' => 'Reordered successfully'], 200);
    }
}
