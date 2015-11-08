<?php


namespace App\Http\Controllers;

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
		return view ( 'pages.category' );
	}
	public function training() {
		return view ( 'pages.training' );
	}
	public function tasks() {
		return view ( 'pages.tasks' );
	}
}
