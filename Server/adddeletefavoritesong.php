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
    if(isset($_POST['userID']) && isset($_POST['songID']))
    {
        $Use_ID = $_POST['userID'];
        $Son_ID = $_POST['songID'];

        $SQLFavoriteSong = "SELECT * FROM `user_songlove` WHERE `Use_ID` = '$Use_ID' AND `Son_ID` = '$Son_ID';";
        $CheckSong = mysqli_query($con, $SQLFavoriteSong);
        $row = $CheckSong->fetch_array();

        if(empty($row))
        {
            $SQLInsert = "INSERT INTO `user_songlove` (`Use_ID`, `Son_ID`) VALUES ('$Use_ID', '$Son_ID');";
            $Insert = mysqli_query($con, $SQLInsert);
    
            if($Insert == true)
            {
                array_push($Status, new Status(1));
            }
            else
            {
                array_push($Status, new Status(2));
            }
            
            echo json_encode($Status);
        }
        else
        {
            $SQLDelete = "DELETE FROM `user_songlove` WHERE `Use_ID` = '$Use_ID' AND `Son_ID` = '$Son_ID';";
            $Delete = mysqli_query($con, $SQLDelete);

            if($Delete == true)
            {
                array_push($Status, new Status(3));
            }
            else
            {
                array_push($Status, new Status(4));
            }

            echo json_encode($Status);
        }
    }
?>