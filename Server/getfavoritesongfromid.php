<?php
	include "config/Config.php";
	include "config/Model.php";
	include "config/Controller.php";
	class GetCS extends Controller{
		public function __construct(){
			parent::__construct();

    $Song = array();
    if(isset($_POST['id']))
    {
        $Use_ID = $_POST['id'];
       $data = $this->Model->fetch( "SELECT `song`.`Son_ID`, `song`.`Son_Name`, `song`.`Son_Img`, `song`.`Son_Singer`, `song`.`Son_Link`, `song`.`Son_Like`, `song`.`Son_Lyric`, `song`.`Son_MVCode`
                  FROM `user_songlove`, `user`, `song`
                  WHERE `user_songlove`.`Use_ID` = `user`.`Use_ID` AND `user_songlove`.`Son_ID` = `song`.`Son_ID` AND `user_songlove`.`Use_ID` = '$Use_ID';");
      	
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
	}
	new GetCS();

?>