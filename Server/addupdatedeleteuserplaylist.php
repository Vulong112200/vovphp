<?php
	include "config/Config.php";
	include "config/Model.php";
	include "config/Controller.php";
	class GetCS extends Controller{
		public function __construct(){
			parent::__construct();

    if(isset($_POST['action']) && isset($_POST['playlistID']) && isset($_POST['userID']) && isset($_POST['playlistName']))
    {
        $action = $_POST['action']; // insert, update, delete, deleteall

        $You_ID = $_POST['playlistID']; // YourPlaylist ID
        $Use_ID = $_POST['userID']; // User ID
        $You_Name = $_POST['playlistName']; // YourPlaylist Name
    
        if($action == 'insert')
        {
          $data = $this->Model->fetch("SELECT * FROM `your_playlist` WHERE `your_playlist`.`Use_ID` = '$Use_ID' AND `your_playlist`.`You_Name` = BINARY '$You_Name';");
            

            if(empty($data))
            {
           		$this->Model->execute("INSERT INTO `your_playlist` (`You_ID`, `Use_ID`, `You_Name`) VALUES (NULL, '$Use_ID', '$You_Name');");
				 echo "Insert Success";
            }
            else
            {
               echo "Insert Fail";// The playlist name already exists
            }

           
        }
        else if($action == 'update')
        {
            $data=$this->Model->fetch ("SELECT * FROM `your_playlist` WHERE `your_playlist`.`Use_ID` = '$Use_ID' AND `your_playlist`.`You_Name` = BINARY '$You_Name';");

            if(empty($data))
            {
               $this->Model->execute("UPDATE `your_playlist` SET `You_Name` = '$You_Name' WHERE `your_playlist`.`You_ID` = '$You_ID' AND `your_playlist`.`Use_ID` = '$Use_ID';");
				echo "Insert Success";
            }
            else
            {
                echo "Insert Fail";// The playlist name already exists

            }

        }
        else if($action == 'delete')
        {
            $this->Model->execute("DELETE FROM `your_playlist` WHERE `your_playlist`.`You_ID` = '$You_ID' AND `your_playlist`.`Use_ID` = '$Use_ID';");
        }
		
        else if($action == 'deleteall')
        {
            $this->Model->execute( "DELETE FROM `your_playlist` WHERE `your_playlist`.`Use_ID` = '$Use_ID';");
        }
    } 
else 
    {
       echo "Khong nhan duoc gi ca";
    }
		}
	}

?>