<?php 
require("../../config/functions.php");

if($_POST["options"] == '1'){

    $eventID = $_POST['eventID'];
    if($eventID == null){
        $query = " 
        SELECT
                id,
                name,
                event_name,
                referal_Code,
                college,
                whatsapp,
                date,
                time,
                event_id,
                bill_upload
        FROM events_registered
    ";
    }else{
        $query = " 
    SELECT
            id,
            name,
            event_name,
            referal_Code,
            college,
            whatsapp,
            date,
            time,
            event_id,
            bill_upload

    FROM events_registered
    WHERE event_id = '$eventID'
";
    }
    

    try {

        $stmt = $db->prepare($query);
        $stmt->execute();
    } catch (PDOException $ex) {
        die("Failed to run query: " . $ex->getMessage());
    }
    $details = $stmt->fetchAll();
    $pos = 0;
    echo '
    <tr>
    <th>
        No
    </th>
    <th>
        Name
    </th>
    <th>
        Number
    </th>
    <th>
        Event
    </th>
    <th>
        Bill Name
    </th>
    <th>
        Referal Code
    </th>
    <th>
        Date
    </th>
    <th>
        Time
    </th>
</tr>
    
    ';
    foreach ($details as $detail) :
        $pos++; 
        echo "<tr><td>". $pos ."</td>";
        echo "<td>". $detail['name'] ."</td>";
        echo "<td>". $detail['whatsapp'] ."</td>";
        echo "<td>". $detail['event_name'] ."</td>";
        echo "<td>". $detail['bill_upload'] ."</td>";
        echo "<td>". $detail['referal_Code'] ."</td>";
        echo "<td>". $detail['date'] ."</td>";
        echo "<td>". $detail['time'] ."</td></tr>";
    endforeach;

}

?>