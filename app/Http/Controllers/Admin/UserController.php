<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//下記use 5月2日追記
use admin\User;
use admin\userbirth;

class UserController extends Controller
{
    protected $redirectTo = '/home';
     
    //5月3日追記
    public function add()
    {
        //Log::warning("test");
        
        return view('admin.user.create');
    }
    
    //5月3日追記
    public function create(Request $request)
    {
        //Varidationを行う
        //Log::warning($request);
        
        $this->varidate($request, User::$rules);
        
        $user = new User;
        $form = $request->all();
        
        //admin/users/createにリダイレクトする
        
        Log::warning($user->title);
        
        //フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        //データベースに保存する
        $user->fill($form);
        $user->save();
        
         \Debugbar::ERROR("テスト");
         
         return redirect('admin/user/create');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            //検索されたら検索結果を取得する
            $posts = User::were('title', $cond_title)->get();
        } else {
            //それ以外はすべての内容を取得する
            $posts = User::all();
        } 
        return view('admin.user.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit()
    {
        $user = User::find($request->{user_id});
        if (empty($user)) {
          abort(404);
        }
        return view('admin.user.edit', ['user_form' => $user]);
    }
    
    public function store(UserRequest $request)
    {
        $user = User::create($request->all());

        if (!$user->birth) {
            $user->birth = null;
        }

        $user->save();
        return view('users.store');
    }
    
    public function update()
    {
        return view('admin/user/egit');
    }
    
    public function delete(Request $request)
    {
   //
   $user = User::find($request->user_id);
   //削除する
   $user->lete();
   return redirect('admin/user/');
  }
}