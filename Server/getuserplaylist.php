<?php
   	include "config/Config.php";
	include "config/Model.php";
	include "config/Controller.php";
	class GetCS extends Controller{
		public function __construct(){
			parent::__construct();

    $YourPlaylist = array();
    if(isset($_POST['userID'])) 
    {
        $Use_ID = $_POST['userID'];
       $data =$this->Model->fetch( "SELECT `your_playlist`.`You_ID`, `your_playlist`.`Use_ID`, `your_playlist`.`You_Name`
                  FROM `your_playlist`
                  WHERE  `your_playlist`.`Use_ID` = '$Use_ID';");
			$casi_array = [];
		
			foreach( $data as $value){
			$casi_item = array(
				"youID" => $value["You_ID"],
				"useID" => $value["Use_ID"],
				"name" => $value["You_Name"],
				);	
				array_push($casi_array,$casi_item);
		}
			echo json_encode($casi_array);
		}	
	}
	}
	new GetCS();

?>