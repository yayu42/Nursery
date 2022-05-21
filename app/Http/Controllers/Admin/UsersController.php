<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//下記use 5月2日追記
use App\Users;

class UsersController extends Controller
{
    protected $redirectTo = '/home';
     
    //5月3日追記
    public function add()
    {
        Log::warning("test");
        
        return view('admin.users.create');
    }
    
    //5月3日追記
    public function create(Request $request)
    {
        //Varidationを行う
        Log::warning($request);
        
        $this->varidate($request, Users::$rules);
        
        $users = new Users;
        $form = $request->all();
        
        //admin/users/createにリダイレクトする
        
        Log::warning($users->title);
        
        //フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        //データベースに保存する
        $users->fill($form);
        $users->save();
        
         \Debugbar::ERROR("テスト");
         
         return redirect('admin/users/create');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            //検索されたら検索結果を取得する
            $posts = Users::were('title', $cond_title)->get();
        } else {
            //それ以外はすべての内容を取得する
            $posts = Users::all();
        } 
        return view('admin.users.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit()
    {
        $users = Users::find($request->id);
        if (empty($users)) {
          abort(404);
        }
        return view('admin.users.edit', ['users_form' => $users]);
    }
    
    public function update()
    {
        return view('admin/users/egit');
    }
    
    public function delete(Request $request)
    {
   //
   $users = Users::find($request->id);
   //削除する
   $users->lete();
   return redirect('admin/users/');
  }
}
