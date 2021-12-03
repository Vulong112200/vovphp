<?php
	include "config/Config.php";
	include "config/Model.php";
	include "config/Controller.php";
	class GetCS extends Controller{
		public function __construct(){
			parent::__construct();

    $Song = array();
    if(isset($_POST['userID']) && isset($_POST['playlistID']))
    {
        $Use_ID = $_POST['userID'];
        $You_ID = $_POST['playlistID'];

        $data = $this->Model->fetch( "SELECT `song`.`Son_ID`, `song`.`Son_Name`, `song`.`Son_Img`, `song`.`Son_Singer`, `song`.`Son_Link`, `song`.`Son_Like`, `song`.`Son_Lyric`, `song`.`Son_MVCode`
                  FROM `your_playlist`, `user_yourplaylist`, `song`
                  WHERE `user_yourplaylist`.`Use_ID` = `your_playlist`.`Use_ID` AND `user_yourplaylist`.`You_ID` = `your_playlist`.`You_ID` AND `user_yourplaylist`.`Son_ID` = `song`.`Son_ID`
                  AND `user_yourplaylist`.`Use_ID` = '$Use_ID' AND `user_yourplaylist`.`You_ID` = '$You_ID';");
     				
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