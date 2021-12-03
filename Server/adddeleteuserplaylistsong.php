<?php
    require "connectdb.php";


    class Status
    {
        function Status($status)
        {
            $this->status = $status;
        }
    }

    $Status = array();
    if(isset($_POST['action']) && isset($_POST['userID']) && isset($_POST['playlistID']) && isset($_POST['songID']))
    {
        $action = $_POST['action']; // insert, delete, deleteall

        $Use_ID = $_POST['userID']; // User ID
        $You_ID = $_POST['playlistID']; // YourPlaylist ID
        $Son_ID = $_POST['songID']; // Song ID
        
        if($action == 'insert')
        {
            $SQLSongPlaylist = "SELECT * FROM `user_yourplaylist` WHERE `user_yourplaylist`.`You_ID` = '$You_ID' AND `user_yourplaylist`.`Use_ID` = '$Use_ID' AND `user_yourplaylist`.`Son_ID` = '$Son_ID';";
            $CheckSongPlaylist = mysqli_query($con, $SQLSongPlaylist);
            $row = $CheckSongPlaylist->fetch_array();

            if(empty($row))
            {
                $SQLInsert = "INSERT INTO `user_yourplaylist` (`You_ID`, `Use_ID`, `Son_ID`) VALUES ('$You_ID', '$Use_ID', '$Son_ID');";
                $Insert = mysqli_query($con, $SQLInsert);

                if($Insert == true)
                {
                    array_push($Status, new Status(1)); // Insert Success
                }
                else
                {
                    array_push($Status, new Status(2)); // Insert fail
                }
            }
            else
            {
                array_push($Status, new Status(3)); // The Song already exists
            }

            echo json_encode($Status);
        }
        else if($action == 'delete')
        {
            $SQLDelete = "DELETE FROM `user_yourplaylist` WHERE `user_yourplaylist`.`You_ID` = '$You_ID' AND `user_yourplaylist`.`Use_ID` = '$Use_ID' AND `user_yourplaylist`.`Son_ID` = '$Son_ID';";
            $Delete = mysqli_query($con, $SQLDelete);

            if($Delete == true)
            {
                array_push($Status, new Status(1)); // Delete Success
            }
            else
            {
                array_push($Status, new Status(2));  // Delete fail
            }

            echo json_encode($Status);
        }
        else if($action == 'deleteall')
        {
            $SQLDeleteAll = "DELETE FROM `user_yourplaylist` WHERE `user_yourplaylist`.`You_ID` = '$You_ID' AND `user_yourplaylist`.`Use_ID` = '$Use_ID';";
            $DeleteAll = mysqli_query($con, $SQLDeleteAll);

            if($DeleteAll == true)
            {
                array_push($Status, new Status(1)); // Delete All Success
            }
            else
            {
                array_push($Status, new Status(2));  // Delete All fail
            }

            echo json_encode($Status);
        }
        else
        {
            array_push($Status, new Status(4));  // Fail
            echo json_encode($Status);
        }
    } 
    else 
    {
        array_push($Status, new Status(5));  // Fail All
        echo json_encode($Status);
    }
?>