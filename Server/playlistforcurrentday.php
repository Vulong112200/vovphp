<?php
   	include "config/Config.php";
	include "config/Model.php";
	include "config/Controller.php";
	class GetCS extends Controller{
		public function __construct(){
			parent::__construct();
			
    $data = $this->Model->fetch( "SELECT DISTINCT * FROM `playlist` ORDER BY rand(" . date("Ymd") . ") LIMIT 3");

			$casi_array =[];
			$casi_array = []; 
		foreach($data as $value){
			
			$casi_item = array(
				"id" => $value["Pla_ID"],
				"name" => $value["Pla_Name"],
				"img" => $value["Pla_Img"],
				);	
				array_push($casi_array,$casi_item);
		}
			echo json_encode($casi_array);
		}	
	}
	new GetCS();

?>