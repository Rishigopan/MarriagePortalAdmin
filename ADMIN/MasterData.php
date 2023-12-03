
<?php

include '../MAIN/Dbconfig.php';


if(isset($_GET['Type'])){

    $find_data = mysqli_query($con, "SELECT * FROM types");
    if(mysqli_num_rows($find_data) > 0){
        while ($dataRow = mysqli_fetch_assoc($find_data)) {
            $rows[] = $dataRow;
        }
    }
    else{
        $rows = array();
    }
    $dataset = array(
        "data" => $rows
    );
    
    echo json_encode($dataset);
}



if(isset($_GET['Package'])){

    $find_data = mysqli_query($con, "SELECT * FROM package");
    if(mysqli_num_rows($find_data) > 0){
        while ($dataRow = mysqli_fetch_assoc($find_data)) {
            $rows[] = $dataRow;
        }
    }
    else{
        $rows = array();
    }
    $dataset = array(
        "data" => $rows
    );
    
    echo json_encode($dataset);
}



