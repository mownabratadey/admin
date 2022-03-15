<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Field;

class FormController extends Controller
{
   	public function index(){
   		$fields = Field::get();
        return view('welcome')->with(compact('fields'));
   	}
}
