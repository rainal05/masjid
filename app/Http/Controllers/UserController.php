<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('Role', '0')->get();
        return view('akun.index', compact('user'));
    }

    public function store(Request $request)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];

        $this->validate($request, [
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ], $massage);
        $usr = User::create([
            'role'      => '0',
            'name'      => $request->name,
            'email'      => $request->email,
            'password'  => bcrypt($request->password),
            'remember_token' => str_random(60),
        ]);
        return redirect()->back()->with(['notif' => 'Akun <strong>' . $usr->name . '</strong> Ditambah']);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('akun.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            // 'password' => 'required',
        ], $massage);
        $user = \App\User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/data/akun')->with(['notif' => 'Data <strong>' . $user->name . '</strong> Diupdate']);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with(['notif' => 'Akun </strong>' . $user->name . '</strong> Dihapus']);
    }
}
