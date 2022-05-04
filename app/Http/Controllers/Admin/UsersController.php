<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//下記use 5月2日追記
use App\Users;

class UsersController extends Controller
{
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
        
        //admin/nursery/createにリダイレクトする
        
        Log::warning($users->title);
        
        //フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        //データベースに保存する
        $users->fill($form);
        $users->save();
        
         \Debugbar::ERROR("テスト");
         
         return redirect('admin/users/create');
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
