<?php
require("../../config/functions.php");

if ($_POST["options"] == '1') {

    $eventID = $_POST['eventID'];
    if ($eventID == null) {
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
                email,
                field1,
                event_id,
                bill_upload
        FROM events_registered
    ";
    } else {
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
            email,
            field1,
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
    <td>
            No
    </td>
    <td>
            Name
    </td>
    <td>
            Number
    </td>
    <td>
        Email
    </td>
    <td>
            Event
    </td>
    <td>
            Bill Name
    </td>
    <td>
        IDEA Title
    </td>
    <td>
            Referal Code
    </td>
    <td>
    College
</td>
    <td>
            Date
    </td>
    <td>
        Time
    </td>
</tr>
    
    ';
    foreach ($details as $detail) :
        $pos++;
        echo "<tr><td>" . $pos . "</td>";
        echo "<td>" . $detail['name'] . "</td>";
        echo "<td>" . $detail['whatsapp'] . "</td>";
        echo "<td>" . $detail['email'] . "</td>";
        echo "<td>" . $detail['event_name'] . "</td>";
        echo "<td>" . $detail['bill_upload'] . "</td>";
        echo "<td>" . $detail['field1'] . "</td>";
        echo "<td>" . $detail['referal_Code'] . "</td>";
        echo "<td class='college_list'>" . $detail['college'] . "</td>";
        echo "<td>" . $detail['date'] . "</td>";
        echo "<td>" . $detail['time'] . "</td></tr>";
    endforeach;

}else if ($_POST["options"] == '2') {

        $query = " 
        SELECT
                id,
                name,
                whatsapp,
                referal_Code,
                college,
                date

        FROM ambassador
    ";
    


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
    <td>
            No
    </td>
    <td>
            Name
    </td>
    <td>
            Number
    </td>
    <td>
            College
    </td>
    <td>
            Referal Code
    </td>
    <td>
            Date
    </td>

</tr>
    
    ';
    foreach ($details as $detail) :
        $pos++;
        echo "<tr><td>" . $pos . "</td>";
        echo "<td>" . $detail['name'] . "</td>";
        echo "<td>" . $detail['whatsapp'] . "</td>";
        echo "<td>" . $detail['college'] . "</td>";
        echo "<td>" . $detail['referal_Code'] . "</td>";
        echo "<td>" . $detail['date'] . "</td></tr>";
    endforeach;
}

