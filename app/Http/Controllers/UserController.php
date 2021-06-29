<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function userdb()
    {
        if(Session()->get('level') == 'admin'){
            $halaman = 'user';
            $user_list = Users::orderBy('id', 'asc')->paginate(5);
            $user_count = Users::count(); 
            return view ('adminpage.user_db', compact('halaman', 'user_list', 'user_count'));
        }else{
            return abort(404);
        }
    }

    public function add_admin(){
        if(Session()->get('level') == 'admin'){
            $halaman = 'content';
            $user = Users::all();
            return view('adminpage.add_admin', compact('halaman', 'user'));
        }else{
            return abort(404);
        }
        }

    public function add(Request $request){
        if(Session()->get('level') == 'admin'){
            Users::create([
                'email' => $request->email,
                'phone' => $request->phone,
                'level' => 'admin',
                'username' => $request->username,
                'password' => md5($request->password),
            ]);
            return redirect('userdb');
        }else{
            return abort(404);
        }
    }

    public function delete($id){
        if(Session()->get('level') == 'admin'){
            $user = Users::findOrFail($id);
            $user->delete();
            return redirect('userdb');
        }else{
            return abort(404);
        }
    }

    public function edit($id){
        if(Session()->get('level') == 'admin'){
            $halaman = 'user';
            $user = Users::findOrFail($id);
            return view('userdb.edit', compact('halaman', 'user'));
        }else{
            return abort(404);
        }
    }

    public function update($id, Request $request){
        if(Session()->get('level') == 'admin'){
            $user = Users::findOrFail($id);
            $user->update([
                'email' => $request->email,
                'phone' => $request->phone,
                'username' => $request->username,
                'password' => md5($request->password),
            ]);
            return redirect('userdb');
        }else{
            return abort(404);
        }
        }

        public function downgrade($id)
    {
        if(Session()->get('level') == 'admin'){
            $user = Users::findOrFail($id);
            $user->update([
                'level' => 'member',
            ]);
            return redirect('userdb');
        }else{
            return abort(404);
        }
    }
}
