<?php
require("config/functions.php");
if ($_POST["options"] == '2' && !empty($_POST["whatsapp"]) && !empty($_POST["college"])) {
    $query = " 
                            INSERT INTO ambassador ( 
                                name,
                                whatsapp,
                                referal_Code,
                                college,
                                date
                            ) VALUES ( 
                                :name,
                                :whatsapp,
                                :referal_Code,
                                :college,
                                :date
                            ) 
                        ";

    $query_params = array(
        ':name' => $_POST['name'],
        ':whatsapp' => $_POST['whatsapp'],
        ':referal_Code' => $_POST['referal_Code'],
        ':college' => $_POST['college'],
        ':date' => date("Y-m-d")
    );

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch (PDOException $ex) {
        die("error");
    }
    $whatsapp = $_POST['whatsapp'];
    $query = " 
    SELECT
            id,
            name,
            college,
            referal_Code,
            whatsapp

    FROM ambassador
    WHERE whatsapp = '$whatsapp'
";

    try {

        $stmt = $db->prepare($query);
        $stmt->execute();
    } catch (PDOException $ex) {
        die("error");
    }
    $details = $stmt->fetch();
    echo $details['referal_Code'];

}else if($_POST["options"] == '1'){
    $whatsapp = $_POST['whatsapp'];
    $query = " 
    SELECT
            id,
            name,
            college,
            referal_Code,
            whatsapp

    FROM ambassador
    WHERE whatsapp = '$whatsapp'
";

    try {

        $stmt = $db->prepare($query);
        $stmt->execute();
    } catch (PDOException $ex) {
        die("Failed to run query: " . $ex->getMessage());
    }
    $details = $stmt->fetch();
    echo $details['referal_Code'];
}else if($_POST["options"] == '3'){

    $referalCode = $_POST['referalCode'];
    $query = " 
    SELECT
            id,
            name,
            event_name,
            referal_Code

    FROM events_registered
    WHERE referal_Code = '$referalCode'
";

    try {

        $stmt = $db->prepare($query);
        $stmt->execute();
    } catch (PDOException $ex) {
        die("Failed to run query: " . $ex->getMessage());
    }
    $details = $stmt->fetchAll();
    $pos = 0;
    foreach ($details as $detail) :
        $pos++; 
        echo "<td>". $pos ."</td>";
        echo "<td>". $detail['name'] ."</td>";
        echo "<td>". $detail['event_name'] ."</td>";
    endforeach;

}

?>