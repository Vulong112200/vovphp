<?php
   	include "config/Config.php";
	include "config/Model.php";
	include "config/Controller.php";
	class GetCS extends Controller{
		public function __construct(){
			parent::__construct();

    $data = $this->Model->fetch( "SELECT DISTINCT * FROM `theme` ORDER BY rand(" . date("Ymd") . ") LIMIT 4");

			$casi_array =[];
			$casi_array = []; 
		foreach($data as $value){
			
			$casi_item = array(
				"idTheme" => $value["The_ID"],
				"name" => $value["The_Name"],
				"img" => $value["The_Img"],
				);	
				array_push($casi_array,$casi_item);
		}
			echo json_encode($casi_array);
		}	
	}
	new GetCS();

?>