<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public $user;

    public function __construct(\App\Repositories\IUserRepository $user)
    {
        $this->user = $user;
    }

    public function showUsers()
    {
        $users = $this->user->find();
        return View::make('user.index', compact('users'));
    }

    public function createUser()
    {
        return View::make('user.edit');
    }

    public function find($id)
    {
        $user = $this->user->findById($id);
        return View::make('user.edit', compact('user'));
    }

    public function update(Request $request, $id = null)
    {
        $collection = $request->except(['_token', '_method']);

        if (!is_null($id)) {
            $this->user->createOrUpdate($id, $collection);
        } else {
            $this->user->createOrUpdate($id = null, $collection);
        }

        return redirect()->route('user.list');
    }

    public function deleteUser($id)
    {
        $this->user->delete($id);

        return redirect()->route('user.list');
    }
}
