<?php

namespace Modules\User\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public function getAllUsers(array $filters = [])
    {
        $query = User::query();

        if (isset($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        if (isset($filters['email'])) {
            $query->where('email', 'like', '%' . $filters['email'] . '%');
        }

        return $query->get();
    }

    public function storeUser(array $userData): User
    {
        return DB::transaction(function () use ($userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make($userData['password']),
                'is_admin' => $userData['is_admin'] ?? false,
            ]);

            return $user;
        });
    }

    public function getUserById(int $id)
    {
        return User::findOrFail($id);
    }

    public function updateUser(int $id, array $userData)
    {
        $user = $this->getUserById($id);

        return DB::transaction(function () use ($user, $userData) {
            $user->name = $userData['name'];
            $user->email = $userData['email'];
            $user->is_admin = !empty($userData['is_admin']);

            if (isset($userData['password'])) {
                $user->password = Hash::make($userData['password']);
            }

            $user->save();
            return $user;
        });
    }

    public function deleteUser(int $id)
    {
        return DB::transaction(function () use ($id) {
            $user = $this->getUserById($id);
            $user->delete();
            return true;
        });
    }
}
