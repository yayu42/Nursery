<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NurseryController extends Controller
{
    //4月25日追記
    public function add()
    {
        return view('admin.nursery.create');
    }
    
    public function create()
    {
        return redirect('admin/nursery/create');
    }
    
    public function edit()
    {
        return view('admin.nursery.edit');
    }
    
    public function update()
    {
        return redirect('admin/nursery/edit');
    }
    
}
