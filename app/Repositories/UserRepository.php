<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;


class UserRepository implements IUserRepository
{
    protected $user = null;

    public function find()
    {
        return User::all();
    }

    public function findById($id)
    {
        return User::find($id);
    }

    public function createOrUpdate( $id = null, $collection = [] )
    {
        if(is_null($id)) {
            $user = new User;
            $user->name = $collection['name'];
            $user->email = $collection['email'];
            $user->password = Hash::make('password');
            return $user->save();
        }
        $user = User::find($id);
        $user->name = $collection['name'];
        $user->email = $collection['email'];
        return $user->save();
    }

    public function delete($id)
    {
        return User::find($id)->delete();
    }
}
