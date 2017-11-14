<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return $users;
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->save();

    }

    public function show($id)
    {
        return User::find($id);
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);

        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = Hash::make($request->input('password'));
        $users->save();

        return User::find($id);
    }

    public function edit(Request $request, User $users)
    {
        //
    }

    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();

        return "Contato #" . $id . " excluído com sucesso.";
    }
}
