<?php
	include "config/Config.php";
	include "config/Model.php";
	include "config/Controller.php";
	class GetCS extends Controller{
		public function __construct(){
			parent::__construct();
			
   $data = $this->Model->fetch("SELECT DISTINCT * FROM `album` ORDER BY rand(" . date("Ymd") . ") LIMIT 8");
 $casi_array =[];
			$casi_array = [];
		
		foreach($data as $value){
				
			$casi_item = array(
				"id" => $value["Alb_ID"],
				"name" => $value["Alb_Name"],
				"singer" => $value["Alb_Singer"],
				"img" => $value["Alb_Img"]
				);	
				array_push($casi_array,$casi_item);
		}
			echo json_encode($casi_array);
		}	
	}
	new GetCS();

?>