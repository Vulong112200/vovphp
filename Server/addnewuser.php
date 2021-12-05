<?php
    require "connectdb.php";

    
    class User
    {
        function User($Use_ID, $Use_Name, $Use_Email, $Use_Img, $Use_Isdark, $Use_Isenglish)
        {
            $this->id = $Use_ID;
            $this->name = $Use_Name;
            $this->email = $Use_Email;
            $this->img = $Use_Img;
            $this->isDark = $Use_Isdark;
            $this->isEnglish = $Use_Isenglish;
        }
    }

    $User = array();
    if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['img']) && isset($_POST['isDark']) && isset($_POST['isEnglish']))
    {
        $Use_ID = $_POST['id'];
        $Use_Name = $_POST['name'];
        $Use_Email = $_POST['email'];
        $Use_Img = $_POST['img'];
        $Use_Isdark = $_POST['isDark'];
        $Use_Isenglish = $_POST['isEnglish'];

        $SQLUser = "SELECT * FROM `user` WHERE `Use_ID` = '$Use_ID'";
        $CheckUser = mysqli_query($con, $SQLUser);
        $row = $CheckUser->fetch_array();

        if(!empty($row))
        {
            $SQLUpdate = "UPDATE `user` SET `Use_Name`= '$Use_Name', `Use_Email`= '$Use_Email', `Use_Img`= '$Use_Img', `Use_Isdark`= '$Use_Isdark', `Use_Isenglish`= '$Use_Isenglish' WHERE `Use_ID` = '$Use_ID'";
            $Update = mysqli_query($con, $SQLUpdate);

            if($Update == true)
            {
                array_push($User, new User($row['Use_ID'], $row['Use_Name'], $row['Use_Email'], $row['Use_Img'], $row['Use_Isdark'], $row['Use_Isenglish']));
            }
        }
        else 
        {
            $SQLInsert = "INSERT INTO user(Use_ID, Use_Name, Use_Email, Use_Img, Use_Isdark, Use_Isenglish) VALUES ('$Use_ID', '$Use_Name', '$Use_Email', '$Use_Img', '$Use_Isdark', '$Use_Isenglish')";
            $Insert = mysqli_query($con, $SQLInsert);

            if($Insert == true)
            {
                array_push($User, new User($row['Use_ID'], $row['Use_Name'], $row['Use_Email'], $row['Use_Img'], $row['Use_Isdark'], $row['Use_Isenglish']));
            }
        }

        echo json_encode($User);
    }
?>