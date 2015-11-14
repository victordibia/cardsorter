<?php


namespace App\Http\Controllers;

use App\Category;
use App\train_item;
use App\project;
use Auth;
use App\permission;
use App\train_response;
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
		/* $categories = category::select('categories.*')
            ->join('permissions', 'permissions.userid', '=', Auth::user ()->id )
            ->join('projects', 'projects.id', '=', 'permissions.projectid')
            ->join('categories', 'categories.projectid', '=', 'projects.id') 
            ->get(); */
		$projects = permission::select('projects.*')
		->where('permissions.userid','=',Auth::user ()->id)
		 ->join('projects', 'permissions.projectid', '=', 'projects.id')
		 ->get();
		
		$categories = permission::select('projects.title as projecttitle', 'categories.*')
		->where('permissions.userid','=',Auth::user ()->id)
		 ->join('projects', 'permissions.projectid', '=', 'projects.id')
		 ->orderBy('projects.created_at', 'desc')
		 ->join('categories', 'categories.projectid', '=', 'projects.id') 
		 ->orderBy('categories.codegroup', 'desc')
		 ->orderBy('projecttitle', 'desc')
		->get();
		//$projects = project::where ( 'responsetype', '=', "train" )->where ( 'userid', '=', Auth::user ()->id )->get ();
		//return $projects  ;
		$data = array('categories' =>  $categories, 'projects' =>  $projects);
		return view ( 'pages.category')->with($data);
	}
	public function training() {
		$train_items = train_item::all();
		$train_responses = train_response::all();
		$categories = permission::select('projects.title as projecttitle', 'categories.*')
		->where('permissions.userid','=',Auth::user ()->id)
		 ->join('projects', 'permissions.projectid', '=', 'projects.id')
		 ->orderBy('projects.created_at', 'desc')
		 ->join('categories', 'categories.projectid', '=', 'projects.id') 
		 ->orderBy('categories.codegroup', 'desc')
		 ->orderBy('projecttitle', 'desc')
		->get();
		
		$data = array('categories' =>  $categories, 'train' =>  $train_items, 'train_responses' => $train_responses);		
		return view ( 'pages.training')->with($data);
	}
	public function tasks() {
		return view ( 'pages.tasks' );
	}
}
