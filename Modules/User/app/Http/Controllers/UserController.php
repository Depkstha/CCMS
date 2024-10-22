<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Modules\User\Services\UserService;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(?int $id = null)
    {
        $isEditing = !is_null($id);
        $title = $isEditing ? 'Edit User' : 'Add User';
        $user = $isEditing ? $this->userService->getUserById($id) : null;

        if (request()->ajax()) {
            $model = user::query()->orderBy('order');

            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->setRowClass('tableRow')
                ->editColumn('is_admin', function (User $user) {
                    return $user->is_admin ? 'Yes' : 'No';
                })
                ->addColumn('action', 'user::user.datatable.action')
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('user::user.index', [
            'user' => $user,
            'title' => $title,
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

        if ($isEditing) {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'lowercase',
                    'email',
                    'max:255',
                    Rule::unique(User::class)->ignore($request->id),
                ],
                'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
                'is_admin' => ['nullable'],
            ]);

            $user = $this->userService->updateUser($request->id, $validated);
            flash()->success("User for {$user->name} has been updated.");
            return to_route('user.index');
        }

        $maxOrder = User::max('order');
        $order = $maxOrder ? ++$maxOrder : 1;

        $request->mergeIfMissing([
            'order' => $order
        ]);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'is_admin' => ['nullable'],
            'order' => ['integer'],
        ]);

        $user = $this->userService->storeUser($validated);
        flash()->success("User for {$user->name} has been created.");
        return to_route('user.index');
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
        $user = $this->userService->getUserById($id);
        return view('user::user.edit', [
            'user' => $user,
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
        $user = $this->userService->deleteUser($id);
        return response()->json(['status' => 200, 'message' => "User for {$user->name} has been deleted."], 200);
    }

    public function reorder(Request $request)
    {
        $users = $this->userService->getAllUsers();

        foreach ($users as $user) {
            foreach ($request->order as $order) {
                if ($order['id'] == $user->id) {
                    $user->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => true, 'message' => 'Reordered successfully'], 200);
    }
}
