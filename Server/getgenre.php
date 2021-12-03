<?php
	include "config/Config.php";
	include "config/Model.php";
	include "config/Controller.php";
	class GetCS extends Controller{
		public function __construct(){
			parent::__construct();

    $Genre = array();
    if(isset($_POST['id']))
    {
        $The_ID = $_POST['id'];
        $query = "SELECT * FROM `genre` WHERE `genre`.`The_ID` = '$The_ID';";
       
	     	$casi_array =[];
			$casi_array = [];
		
		foreach($data as $value){
				
			$casi_item = array(
				"idGenre" => $value["Gen_ID"],
				"idTheme" => $value["The_ID"],
				"name" => $value["Gen_Name"],
				"img" => $value["Gen_Img"]
			);	
				array_push($casi_array,$casi_item);
		}
			echo json_encode($casi_array);
		}	
		}
	}
	new GetCS();

?>