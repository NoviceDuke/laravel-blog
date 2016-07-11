<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HchsController extends Controller
{
	public function __construct()
	{
	
	}
    //
    public function index(){

    	return view('hchs.index');

    }
}
