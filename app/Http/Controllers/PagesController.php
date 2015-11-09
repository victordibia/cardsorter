<?php


namespace App\Http\Controllers;

use App\Category;
use App\train_item;
class PagesController extends Controller {
	
	/*
	 * This controller renders your the important pages within our application. 
	 * Index, Categories, Training and Main Task. |
	 */
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}
	
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index() {
		return view ( 'pages.home' );
	}
	public function category() {
		$categories = category::all();
		return view ( 'pages.category',  ['categories' => $categories] );
	}
	public function training() {
		$train_items = train_item::all();
		$categories = category::all();
		$data = array('categories' =>  $categories, 'train' =>  $train_items);		
		return view ( 'pages.training')->with($data);;
	}
	public function tasks() {
		return view ( 'pages.tasks' );
	}
}
