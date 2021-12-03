<?php
	include "config/Config.php";
	include "config/Model.php";
	include "config/Controller.php";
	class GetCS extends Controller{
		public function __construct(){
			parent::__construct();

    $Comment = array();
    if(isset($_POST['id']))
    {
        $Son_ID = $_POST['id'];
        $data = $this->Model->fetch( "SELECT * FROM `comment`, `user` WHERE `comment`.`Use_ID` = `user`.`Use_ID` AND `comment`.`Son_ID` = '$Son_ID' ORDER BY `Com_Date` ASC;");
   
			$casi_array =[];
			$casi_array = [];
		
		foreach($data as $value){
				
			$casi_item = array(
				"idComment" => $value["Com_ID"],
				"idSong" => $value["Son_ID"],
				"idUser" => $value["Use_ID"],
				"content" => $value["Com_Content"],
				"date" => $value["Com_Date"],
				"userName" => $value["Use_Name"],
				"userImage" => $value["Use_Img"]
				);	
				array_push($casi_array,$casi_item);
		}
			echo json_encode($casi_array);
		}	
		}
	}
	new GetCS();

?>