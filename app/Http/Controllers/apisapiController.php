<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class apisapiController extends Controller
{
	public allBooks()
	{
		$books=DB::table('books')->all();
		return view('hello');
	}
}
