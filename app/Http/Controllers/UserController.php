<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function create()
    {
        $data = new User();
        return view('users.form', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->level = $request->level;
        $data->save();

        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);

        return view('users.form', compact(['data']));
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->level = $request->level;
        $user->email = $request->email;
        if ($request->password != null)
            $user->password = $request->password;
        $user->save();

        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        if ($user->delete()) {
            return 1;
        }

        return 0;
    }
}
