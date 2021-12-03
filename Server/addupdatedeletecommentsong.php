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
    if(isset($_POST['action']) && isset($_POST['commentID']) && isset($_POST['songID']) && isset($_POST['userID']) && isset($_POST['content']) && isset($_POST['date']))
    {
        $action = $_POST['action']; // insert, update, delete

        $Com_ID = $_POST['commentID'];
        $Son_ID = $_POST['songID'];
        $Use_ID = $_POST['userID'];
        $Com_Content = $_POST['content'];
        $Com_Date = $_POST['date'];

        $current_date = date("Y-m-d H:i:s");
    
        if($action == 'insert')
        {
            $SQLInsert = "INSERT INTO `comment` (`Com_ID`, `Son_ID`, `Use_ID`, `Com_Content`, `Com_Date`) VALUES (NULL, '$Son_ID', '$Use_ID', '$Com_Content', '$Com_Date');";
            $Insert = mysqli_query($con, $SQLInsert);

            if($Insert == true)
            {
                array_push($Status, new Status(1)); // Insert Success
            }
            else
            {
                array_push($Status, new Status(2)); // Insert fail
            }

            echo json_encode($Status);
        }
        else if($action == 'update')
        {
            $SQLUpdate = "UPDATE `comment` SET `Com_Content` = '$Com_Content' WHERE `comment`.`Com_ID` = '$Com_ID';";
            $Update = mysqli_query($con, $SQLUpdate);

            if($Update == true)
            {
                array_push($Status, new Status(1)); // Update Success
            }
            else
            {
                array_push($Status, new Status(2)); // Update fail
            }

            echo json_encode($Status);
        }
        else if($action == 'delete')
        {
            $SQLDelete = "DELETE FROM `comment` WHERE `comment`.`Com_ID` = '$Com_ID';";
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