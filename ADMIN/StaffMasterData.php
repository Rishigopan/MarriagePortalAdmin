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



$find_data = mysqli_query($con, "SELECT *,(select Image.imageName from masterimages Image where S.sId = Image.masterId AND Image.masterForm = 'STAFF' AND Image.imageActive = 'YES') AS imageName FROM staff S LEFT JOIN users U ON S.sId = U.empId LEFT JOIN religion R ON S.staffReligion = R.rId LEFT JOIN branch B ON S.staffBranch = B.bId LEFT JOIN agency A ON S.staffAgency = A.aId");
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


