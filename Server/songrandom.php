<?php
   	include "config/Config.php";
	include "config/Model.php";
	include "config/Controller.php";
	class GetCS extends Controller{
		public function __construct(){
			parent::__construct();
			

    $data =$this->Model->fetch("SELECT DISTINCT * FROM `song` ORDER BY rand(" . date("Ymd") . ") LIMIT 20");

			$casi_array =[];
			$casi_array = []; 
		foreach($data as $value){
				
			$casi_item = array(
				"id" => $value["Son_ID"],
				"name" => $value["Son_Name"],
				"img" => $value["Son_Img"],
				"singer" => $value["Son_Singer"],
				"link" => $value["Son_Link"],
				"like" => $value["Son_Like"],
				"lyric" => $value["Son_Lyric"],
				"mvcode" => $value["Son_MVCode"],
				);	
				array_push($casi_array,$casi_item);
		}
			echo json_encode($casi_array);
		}	
	}
	new GetCS();

?>