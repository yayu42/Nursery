<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WeightGraphController extends Controller
{
    function show(Request $request){
		//体重ログデータを取り出す
		//今年の体重データを取り出す
		$log_list = WeightLog::where("date_key","like",date("Y") . "%")->get();
		
		//Viewにログデータを渡す
		return view("weight_graph",[
			"log_list" => $log_list
		]);
	}
}
