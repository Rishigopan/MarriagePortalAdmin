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



$find_data = mysqli_query($con, "SELECT *,(select Image.imageName from masterimages Image where A.aId = Image.masterId AND Image.masterForm = 'AGENCY' AND Image.imageActive = 'YES') as imageName FROM agency A LEFT JOIN state S ON A.agencyState = S.sId LEFT JOIN district D ON A.agencyDistrict = D.dId LEFT JOIN city C ON A.agencyCity = C.citId LEFT JOIN branch B ON A.branchId = B.bId");
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


// SELECT B.bId,B.branchName,B.branchPrefix,B.email,B.phoneNumber,B.branchPan,B.address,S.stateName,D.districtName,C.cityName,(select Image.imageName from masterimages Image where B.bId = Image.masterId AND Image.masterForm = 'BRANCH' limit 1) as imageName FROM branch B LEFT JOIN state S ON B.state = S.sId LEFT JOIN district D ON B.district = D.dId LEFT JOIN city C ON B.city = C.citId


