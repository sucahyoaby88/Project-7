<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Comment;
use App\Users;
use Session;
use App\Premium;
use App\Message;

class PageController extends Controller
{
    public function adminpage()
    {
        if(Session()->get('level') == 'admin'){
            return view ('adminpage.main');
        }else{
            return abort(404);
        }
    }

    public function show($id)
    {
        $content = Content::findOrFail($id);
        $comment = Comment::where('content_id', $id)->get();
        $comment_count = Comment::where('content_id', $id)->count();
        return view ('pinkbike.show', compact('content', 'comment', 'comment_count'));
    }

    public function main()
    {
        $content_list = Content::orderBy('date_content', 'asc')->paginate(5);
        $content_count = Content::count(); 
        return view ('pinkbike.index', compact('content_list', 'content_count'));
    }

    public function video()
    {
        $content_list = Content::where('type','video')->orderBy('date_content', 'asc')->paginate(5);
        $content_count = Content::where('type','video')->count(); 
        return view ('pinkbike.video', compact('content_list', 'content_count'));
    }

    public function photo()
    {
        $content_list = Content::where('type','photo')->orderBy('date_content', 'asc')->paginate(5);
        $content_count = Content::where('type','photo')->count(); 
        return view ('pinkbike.photo', compact('content_list', 'content_count'));
    }

    public function story()
    {
        $content_list = Content::where('type','story')->orderBy('date_content', 'asc')->paginate(5);
        $content_count = Content::where('type','story')->count(); 
        return view ('pinkbike.index', compact('content_list', 'content_count'));
    }

    public function memberpage()
    {
        if(Session()->get('level') == 'member' || Session()->get('level') == 'premium' ){
            return view ('memberpage.main');
        }else{
            return abort(404);
        }
    }

    public function confirm()
    {
        if(Session()->get('level') == 'member'){
            Premium::create([
                'user_id' => Session()->get('id'),
                'message' => 'I want to join premium member',
            ]);
            return redirect('memberpage');
        }else{
            return abort(404);
        }
    }

    public function premiumdb()
    {
        if(Session()->get('level') == 'admin'){
            $halaman = 'premium';
            $premium_list = Premium::orderBy('id', 'asc')->paginate(5);
            $premium_count = Premium::count(); 
            return view ('adminpage.premium_db', compact('halaman', 'premium_list', 'premium_count'));
        }else{
            return abort(404);
        }
    }

    public function accept($user_id)
    {
        if(Session()->get('level') == 'admin'){
            $user = Users::findOrFail($user_id);
            $user->update([
                'level' => 'premium',
            ]);
            $premium = Premium::where('user_id', $user_id);
            $premium->delete();
            return redirect('premiumdb');
        }else{
            return abort(404);
        }
    }

    public function refuse($user_id)
    {
        if(Session()->get('level') == 'admin'){
            $premium = Premium::where('user_id', $user_id);
            $premium->delete();
            return redirect('premiumdb');
        }else{
            return abort(404);
        }
    }

    public function dashboard()
    {
        $user_count = Users::count();
        $user_count1 = Users::where('level', 'admin')->count();
        $user_count2 = Users::where('level', 'member')->count();
        $user_count3 = Users::where('level', 'premium')->count();

        $content_count = Content::count(); 
        $content_count1 = Content::where('type', 'video')->count(); 
        $content_count2 = Content::where('type', 'photo')->count(); 
        $content_count3 = Content::where('type', 'story')->count(); 

        $message_count = Message::count();
        $premium_count = Premium::count();
        return view('adminpage.dashboard', compact('user_count', 'user_count1', 'user_count2', 'user_count3', 'content_count', 'content_count1', 'content_count2', 'content_count3', 'message_count', 'premium_count'));
    }

    public function editProfile()
    {
        if(Session()->get('level') == 'admin'){
            $user = Users::findOrFail(Session()->get('id'));
            return view ('adminpage.edit_profile', compact('user'));
        }else{
            return abort(404);
        }
    }

    public function updateProfile(Request $request){
        if(Session()->get('level') == 'admin'){
            $user = Users::findOrFail(Session()->get('id'));
            $user->update([
                'email' => $request->email,
                'phone' => $request->phone,
                'username' => $request->username,
                'password' => md5($request->password),
            ]);
            return redirect('profile');
        }else{
            return abort(404);
        }
        }

    public function profile()
    {
        if(Session()->get('level') == 'admin'){
            $user = Users::findOrFail(Session()->get('id'));
            return view ('adminpage.profile', compact('user'));
        }else{
            return abort(404);
        }
    }

    public function profile2()
    {
        if(Session()->get('level') == 'member' || Session()->get('level') == 'premium'){
            $user = Users::findOrFail(Session()->get('id'));
            return view ('memberpage.profile', compact('user'));
        }else{
            return abort(404);
        }
    }

    public function editProfile2()
    {
        if(Session()->get('level') == 'member' || Session()->get('level') == 'premium'){
            $user = Users::findOrFail(Session()->get('id'));
            return view ('memberpage.edit_profile', compact('user'));
        }else{
            return abort(404);
        }
    }

    public function updateProfile2(Request $request){
        if(Session()->get('level') == 'member' || Session()->get('level') == 'premium'){
            $user = Users::findOrFail(Session()->get('id'));
            $user->update([
                'email' => $request->email,
                'phone' => $request->phone,
                'username' => $request->username,
                'password' => md5($request->password),
            ]);
            return redirect('profile2');
        }else{
            return abort(404);
        }
        }
}
