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
    if(isset($_POST['userID']) && isset($_POST['star']) && isset($_POST['content']) && isset($_POST['date']))
    {
        $Use_ID = $_POST['userID'];
        $Fee_Star = $_POST['star'];
        $Fee_Content = $_POST['content'];
        $Fee_Date = $_POST['date'];

        $SQLInsert = "INSERT INTO `feedback` (`Fee_ID`, `Use_ID`, `Fee_Star`, `Fee_Content`, `Fee_Date`) VALUES (NULL, '$Use_ID', '$Fee_Star', '$Fee_Content', '$Fee_Date');";
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
?>