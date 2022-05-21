<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Nursery;

class NurseryController extends Controller
{
    //4月25日追記
    public function add()
    {
        return view('admin.nursery.create');
    }
    
    public function create()
    {
        // Varidationを行う
      $this->validate($request, Nursery::$rules);
​　 　$nursery = new Nursery();
      $form = $request->all();
​
      // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $nursery->image_path = basename($path);
      } else {
          $nursery->image_path = null;
      }
​
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
​
      // データベースに保存する
      $nursery->fill($form);
      $nursery->save();

      return redirect('admin/nursery/create');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            //検索されたら検索結果を取得する
            $posts = Nursery::were('title', $cond_title)->get();
        } else {
            //それ以外はすべての内容を取得する
            $posts = Nursery::all();
        } 
        return view('admin.nursery.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit()
    {
        return view('admin.nursery.edit');
    }
    
    public function update()
    {
        return redirect('admin/nursery/edit');
    }
    
     public function delete(Request $request)
    {
   //
   $nursery = Nursery::find($request->id);
   //削除する
   $nursery->lete();
   return redirect('admin/nursery/');
    }
}
