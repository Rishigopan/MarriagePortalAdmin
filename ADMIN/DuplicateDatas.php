<?php


include '../MAIN/Dbconfig.php';


//View Bulk Duplicates
if (isset($_GET['BulkDuplicate'])) {
    $find_data = mysqli_query($con, "SELECT * FROM bulkduplicate WHERE convertStatus = 'NO' ORDER BY GREATEST(COALESCE(updatedDate, '0000:00:00'),COALESCE(createdDate,'0000:00:00')) DESC");
    if (mysqli_num_rows($find_data) > 0) {
        while ($dataRow = mysqli_fetch_assoc($find_data)) {
            $rows[] = $dataRow;
        }
    } else {
        $rows = array();
    }

    $dataset = array(
        "data" => $rows
    );

    echo json_encode($dataset);
}


//View Free Duplicates
if (isset($_GET['FreeDuplicate'])) {

    $find_data = mysqli_query($con, "SELECT * FROM freeregduplicate WHERE convertStatus = 'NO' ORDER BY GREATEST(COALESCE(updatedDate, '0000:00:00'),COALESCE(createdDate,'0000:00:00')) DESC");
    if (mysqli_num_rows($find_data) > 0) {
        while ($dataRow = mysqli_fetch_assoc($find_data)) {
            $rows[] = $dataRow;
        }
    } else {
        $rows = array();
    }

    $dataset = array(
        "data" => $rows
    );

    echo json_encode($dataset);
}
