<?php

include '../MAIN/Dbconfig.php';

if (isset($_COOKIE['custidcookie']) && isset($_COOKIE['custtypecookie'])) {

    if (!empty($_COOKIE['custtoken'])) {

        $Token = $_COOKIE['custtoken'];

    } else {
        $Token = 0;
    }

} else {
    //header('location:../login.php');
}



$find_data = mysqli_query($con, "SELECT D.dId,D.districtName,D.districtPrefix,S.stateName,C.countryName FROM district D INNER JOIN state S ON D.stateId = S.sId INNER JOIN country C ON D.countryId = C.cId;");
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
