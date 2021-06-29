<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Validator;


class ContentController extends Controller
{

    public function contentdb()
    {
        if(Session()->get('level') == 'admin'){
            $halaman = 'content';
            $content_list = Content::orderBy('id', 'asc')->paginate(5);
            $content_count = Content::count(); 
            return view ('adminpage.content_db', compact('halaman', 'content_list', 'content_count'));
        }else{
            return abort(404);
        }
    }

    public function content()
    {
        if(Session()->get('level') == 'member' || Session()->get('level') == 'premium'){
            $halaman = 'content';
            $content_list = Content::where('user_id', Session()->get('id'))->orderBy('id', 'asc')->paginate(5);
            $content_count = Content::count(); 
            return view ('memberpage.content', compact('halaman', 'content_list', 'content_count'));
        }else{
            return abort(404);
        }
    }

    public function upload_video(){
        if(Session()->get('level') == 'member' || Session()->get('level') == 'premium' ){
            $halaman = 'content';
            $content = Content::all();
            return view('memberpage.upload_video', compact('halaman', 'content'));
        }else{
            return abort(404);
        }
        }

    public function upload_photo(){
        if(Session()->get('level') == 'member' || Session()->get('level') == 'premium' ){
            $halaman = 'content';
            $content = Content::all();
            return view('memberpage.upload_photo', compact('halaman', 'content'));
        }else{
            return abort(404);
        }
        }

    public function upload_story(){
        if(Session()->get('level') == 'member' || Session()->get('level') == 'premium' ){            
            $halaman = 'content';
            $content = Content::all();
            return view('memberpage.upload_story', compact('halaman', 'content'));
        }else{
            return abort(404);
        }
        }

    public function upload1(Request $request){
        if(Session()->get('level') == 'member' || Session()->get('level') == 'premium' ){
            if(Session()->get('level') == 'member'){
            Content::create([
                'user_id' => Session()->get('id'),
                'type' => 'video',
                'category' => 'regular',
                'title' => $request->title,
                'description' => $request->description,
                'summary' => $request->summary,
                'source' => $request->source,
            ]);
            }else{
                Content::create([
                    'user_id' => Session()->get('id'),
                    'type' => 'video',
                    'category' => $request->category,
                    'title' => $request->title,
                    'description' => $request->description,
                    'summary' => $request->summary,
                    'source' => $request->source,
                ]);
            }
            return redirect('memberpage');
        }else{
            return abort(404);
        }
    }

    public function upload3(Request $request){
        if(Session()->get('level') == 'member' || Session()->get('level') == 'premium' ){
            if(Session()->get('level') == 'member'){
            Content::create([
                'user_id' => Session()->get('id'),
                'type' => 'story',
                'category' => 'regular',
                'title' => $request->title,
                'description' => $request->description,
                'summary' => $request->summary,
                'source' => '-',
            ]);
            }else{
                Content::create([
                    'user_id' => Session()->get('id'),
                    'type' => 'story',
                    'category' => $request->category,
                    'title' => $request->title,
                    'description' => $request->description,
                    'summary' => $request->summary,
                    'source' => '-',
                ]);
            }
            return redirect('memberpage');
        }else{
            return abort(404);
        }
    }

    public function upload2(Request $request){
        if(Session()->get('level') == 'member' || Session()->get('level') == 'premium' ){
            $source = $request->file('source');
            $file_name = time()."_".$source->getClientOriginalName();
            $tujuan_upload = 'photo';
            $source->move($tujuan_upload,$file_name);
            if(Session()->get('level') == 'member'){
            Content::create([
                'user_id' => Session()->get('id'),
                'type' => 'photo',
                'category' => 'regular',
                'title' => $request->title,
                'description' => $request->description,
                'summary' => $request->summary,
                'source' => $file_name,
            ]);
        }else{
            Content::create([
                'user_id' => Session()->get('id'),
                'type' => 'photo',
                'category' => $request->category,
                'title' => $request->title,
                'description' => $request->description,
                'summary' => $request->summary,
                'source' => $file_name,
            ]);
        }
            return redirect('memberpage');
        }else{
            return abort(404);
        }
    }

    public function detail($id){
        if(Session()->get('level') == 'admin'){
            $halaman = 'content';
            $content = Content::findOrFail($id);
            return view('contentdb.detail', compact('halaman', 'content'));
        }else{
            return abort(404);
        }
    }
    
    public function delete($id){
        if(Session()->get('level') == 'admin'){
            $content = Content::findOrFail($id);
            $content->delete();
            return redirect('contentdb');
        }else{
            return abort(404);
        }
    }


}
