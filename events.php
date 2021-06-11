<?php
date_default_timezone_set("Asia/Kolkata");
require("config/functions.php");
if (!empty($_FILES["fileToUpload"]["name"])) {
    $_POST['get'] = "";
    if(empty($_POST['referal_Code'])){
        $_POST['referal_Code'] = "";
    }
    $eventsID = $_POST['event_id'];
    $query = " 
    SELECT
            id,
            name,
            tag

    FROM events
    WHERE id = '$eventsID'
";

    try {

        $stmt = $db->prepare($query);
        $stmt->execute();
    } catch (PDOException $ex) {
        die();
    }
    $events = $stmt->fetch();
    if($events == null){

        die("7");
    }
    define('KB', 1024);
    define('MB', 1048576);
    define('GB', 1073741824);
    define('TB', 1099511627776);
    $target_dir = "uploads/";
    $target_name = uniqid() . "_" . basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $target_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {

        $uploadOk = 1;
    } else {
        echo "6";
        $uploadOk = 0;
    }
    if (file_exists($target_file)) {
        echo "5"; // file already exist
        $uploadOk = 0;
    }
    if ($_FILES["fileToUpload"]["size"] >= 1*MB) {
        echo "4"; // file size should be below 1mb
        $uploadOk = 0;
    }
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "3"; // wrong image type
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "1"; // upload failed
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        if(isset($_POST['email'])){
            $email = $_POST['email'];
        }else {
            $email = null;
        }
        if(isset($_POST['field1'])){
            $field1 = $_POST['field1'];
        }else {
            $field1 = null;
        }

            $query = " 
          INSERT INTO events_registered ( 
              name,
              whatsapp,
              email,
              referal_Code,
              college,
              event_id,
              bill_upload,
              event_name,
              field1,
              date,
              time
          ) VALUES ( 
              :name,
              :whatsapp,
              :email,
              :referal_Code,
              :college,
              :event_id,
              :bill_upload,
              :event_name,
              :field1,
              :date,
              :time
          ) 
      ";

            $query_params = array(
                ':name' => $_POST['name'],
                ':whatsapp' => $_POST['whatsapp'],
                ':referal_Code' => $_POST['referal_Code'],
                ':college' => $_POST['college'],
                ':email' => $email,
                ':field1' => $field1,
                ':bill_upload' => $target_name,
                ':event_id' => $eventsID,
                ':event_name' => $events['name'],
                ':date' => date("Y-m-d"),
                ':time' => date("H:i:sa")
            );

            try {
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
            } catch (PDOException $ex) {
                die("Failed to run query: " . $ex->getMessage());
            }
            echo "0"; // success upload and details
        } else {
            echo "2"; // there was some error
        }
    }
} else if ($_POST["get"] == '2') {
    $eventsID = $_POST['eventsID'];
    $query = " 
    SELECT
            id,
            name,
            tag

    FROM events
    WHERE id = '$eventsID'
";

    try {

        $stmt = $db->prepare($query);
        $stmt->execute();
    } catch (PDOException $ex) {
        echo "2"; 
    }
    $details = $stmt->fetch();
    echo $details['tag'];
}
