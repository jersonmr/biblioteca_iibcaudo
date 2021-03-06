<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::orderBy('user_id', 'DESC')->paginate(30);

        return view('admin.users.list', compact('users'));
    }

    public function createUser()
    {   
        return view('admin.users.create');
    }

    public function storeUser(UserRequest $request)
    {        
        $user = new User;

        $data = $request->all();

        $user->password = $data['dni'];

        $user->fill($data)->save();

        return redirect()->route('users');
    }

    public function editUser($user_id)
    {
        $user = User::findOrFail($user_id);

        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(UserRequest $request, $user_id)
    {
        $user = User::findOrFail($user_id);

        $data = $request->all();
        
        $user->fill($data)->save();

        return redirect()->route('users');
    }

    public function deleteUser($user_id)
    {
        $user =  User::findOrFail($user_id);

        $user->delete();

        return back();
    }

    public function changeKey()
    {
        return view('admin.users.change-key');
    }

    public function updateKey(UserRequest $request)
    {     
        if (Hash::check($request->oldpassword, Auth::user()->password))
        {
            $user = new User;
            $user->where('email', Auth::user()->email)
                ->update(['password' => bcrypt($request->newpassword)]);
            return redirect()->back()->with(['type' => 'success', 'status' => 'Contraseña cambiada con éxito']); 
        } else {
            return redirect()->back()->with(['type' => 'danger', 'status' => 'Las credenciales son incorrectas']);
        }

    }
}
