<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Nursery;
use Storage;

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
      $nursery = new Nursery;
      $form = $request->all();
      
      // フォームから送信されてきた_tokenを削除する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $nursery->image_path = basename($path);
      } else {
          $nursery->image_path = null;
      }

      unset($form['_token']);
      unset($form['image']);
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
            $posts = Nursery::where('', $cond_title)->get();
        } else {
            //それ以外はすべてプロフィールを取得する
            $posts = Nursery::all();
        }
        return view('admin.nursery.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit()
    {
        return view('admin.nursery.edit', ['nursery_form' => $nursery]);
    }
    
    public function ledger()
    {
        return view('admin.nursery.ledger');
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
