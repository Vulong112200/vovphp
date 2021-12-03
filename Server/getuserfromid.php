<?php
   	include "config/Config.php";
	include "config/Model.php";
	include "config/Controller.php";
	class GetCS extends Controller{
		public function __construct(){
			parent::__construct();

    $User = array();
    if(isset($_POST['id']))
    {
        $ID = $_POST['id'];
        $data = $this->Model->fetch("SELECT * FROM `user` WHERE `Use_ID` = '$ID'");

			$casi_array =[];
			$casi_array = [];
		
		foreach( $data as $value){
			$casi_item = array(
				"id" => $value["Use_ID"],
				"name" => $value["Use_Name"],
				"email" => $value["Use_Email"],
				"img" => $value["Use_Img"],
				"isDark" => $value["Use_Isdark"],
				"isEnglish" => $value["Use_Isenglish"],
				);	
				array_push($casi_array,$casi_item);
		}
			echo json_encode($casi_array);
		}	
	}
	}
	new GetCS();

?>