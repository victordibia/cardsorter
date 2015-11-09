<?php

namespace App\Http\Controllers;

use App\Category;
use App\train_item;
use App\response;
use Auth;
use stdClass;

class DataController extends Controller {
	
	/*
	 * This controller renders your the important pages within our application. Index, Categories, Training and Main Task. |
	 */
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware ( 'auth' );
	}
	
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index() {
		return view ( 'pages.home' );
	}
	public function loaddata() {
		$rowarray =  new stdClass();
		$statearray = array ();
		// $rowholder = $row_rsdata['itemid'] ;
		$responses = response::where ( 'responsetype', '=', "train" )->where ( 'userid', '=', Auth::user ()->id )->get ();
		$itemholder = $responses->first ()->itemid;
		 
		foreach ( $responses as $response ) {
			//echo $response;
			if ($itemholder == $response->itemid) {
				$arr = array (
						'id' =>$response->categoryid,
						'state' => $response->responsestatus 
				);
				array_push ( $statearray, $arr );
			} else {
				// echo "<br/>======= " . $row_rsdata['itemid'] . "===============" ;
				// array_push($arrbb, array( $rowholder => $arrb));
				$rowarray->$itemholder = $statearray;
				// ==============
				$statearray = array ();
				$arr = array (
						'id' =>$response->categoryid,
						'state' => $response->responsestatus 
				);
				array_push ( $statearray, $arr );
				// echo $row_rsdata['constructid'];
				$itemholder = $response->itemid;
			}
		}
		$rowarray-> $itemholder = $statearray ;
		echo json_encode($rowarray);
		return "";
	}
	public function test() {
		$rowarray =  new stdClass();
		$statearray = array ();
		// $rowholder = $row_rsdata['itemid'] ;
		$responses = response::where ( 'responsetype', '=', "train" )->where ( 'userid', '=', Auth::user ()->id )->get ();
		$itemholder = $responses->first ()->itemid;
		 
		foreach ( $responses as $response ) {
			//echo $response;
			if ($itemholder == $response->itemid) {
				$arr = array (
						'id' =>$response->categoryid,
						'state' => $response->responsestatus 
				);
				array_push ( $statearray, $arr );
			} else {
				// echo "<br/>======= " . $row_rsdata['itemid'] . "===============" ;
				// array_push($arrbb, array( $rowholder => $arrb));
				$rowarray->$itemholder = $statearray;
				// ==============
				$statearray = array ();
				$arr = array (
						'id' =>$response->categoryid,
						'state' => $response->responsestatus 
				);
				array_push ( $statearray, $arr );
				// echo $row_rsdata['constructid'];
				$itemholder = $response->itemid;
			}
		}
		$rowarray-> $itemholder = $statearray ;
		echo json_encode($rowarray);
		return "";
	}
	public function savedata() {
		$result = "";
		if (isset ( $_POST ['responsedata'] )) {
			$result = $_POST ['responsedata'];
			$json = json_decode ( $_POST ['responsedata'], true );
			$responsetype = $_POST ['responsetype'];
			// print_r($json) ;
			foreach ( $json as $itemid => $content ) {
				// in here you have the key in $keyName and the value in $value
				// echo $rowid ; //= $value;
				foreach ( $content as $value ) {
					// if it exists, we update it else we insert it.
					$categoryid = $value ["id"];
					$exists = response::where ( 'categoryid', '=', $categoryid )->where ( 'itemid', '=', $itemid )->where ( 'userid', '=', Auth::user ()->id )->count () > 0;
					
					if ($exists) {
						response::where ( 'userid', Auth::user ()->id )->where ( 'categoryid', $categoryid )->where ( 'itemid', $itemid )->update ( [ 
								'responsestatus' => $value ["state"],
								'responsetype' => $responsetype 
						] );
					} else {
						$newresponse = new response ();
						$newresponse->itemid = $itemid;
						$newresponse->categoryid = $categoryid;
						$newresponse->userid = Auth::user ()->id;
						$newresponse->responsetype = $responsetype;
						$newresponse->responsestatus = $value ["state"];
						$newresponse->save ();
					}
				}
				echo "\n";
			}
		}
		return $result;
	}
}
