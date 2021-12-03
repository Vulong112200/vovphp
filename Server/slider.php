<?php
	include "config/Config.php";
	include "config/Model.php";
	include "config/Controller.php";
	class GetCS extends Controller{
		public function __construct(){
			parent::__construct();
			$id = isset($_GET["id"])?$_GET["id"]:"";
			
			if(isset($_GET["id"]))
			{
				$data = $this->Model->fetch("select * from slider where Son_ID='$id'");
			}
			
			else{
				
				$data = $this->Model->fetch("select * from slider");
			}
			
			$casi_array =[];
			$casi_array = []; 
		foreach($data as $value){
			
			$casi_item = array(
				"sliderID" => $value["Sli_ID"],
				"image" => $value["Sli_Img"],
				"songID" => $value["Son_ID"]
				);	
				array_push($casi_array,$casi_item);
		}
			echo json_encode($casi_array);
		}	
	}
	new GetCS();

?>