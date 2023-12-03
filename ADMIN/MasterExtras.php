<?php



require '../MAIN/Dbconfig.php';


$dateToday = date('Y-m-d');


//branch selection staff
if (isset($_POST['SelectBranch'])) {
    $BranchId = $_POST['SelectBranch'];
    $fetchAgency = mysqli_query($con, "SELECT * FROM agency WHERE branchId = '$BranchId'");
    echo '<option hidden value="" > Agency </option>';
    foreach ($fetchAgency as $fetchAgencyResult) {
        echo '<option value="' . $fetchAgencyResult["aId"] . '" > ' . $fetchAgencyResult["agencyName"] . ' </option>';
    }
}



//Select Agency staff
if (isset($_POST['SelectAgency'])) {
    $StaffId = $_POST['SelectAgency'];
    $fetchStaff = mysqli_query($con, "SELECT * FROM staff WHERE staffAgency = '$StaffId'");
    echo '<option hidden value="" > Staff </option>';
    foreach ($fetchStaff as $fetchStaffResult) {
        echo '<option value="' . $fetchStaffResult["sId"] . '" > ' . $fetchStaffResult["staffName"] . ' </option>';
    }
}


//Branch without staff
if (isset($_POST['StaffWithoutBranch'])) {
    $fetchStaff = mysqli_query($con, "SELECT * FROM staff WHERE staffAgency = '0' ");
    echo '<option hidden value="" > Staff </option>';
    foreach ($fetchStaff as $fetchStaffResult) {
        echo '<option value="' . $fetchStaffResult["sId"] . '" > ' . $fetchStaffResult["staffName"] . ' </option>';
    }
}


//Show Agency on Branch
if (isset($_POST['ListAgency'])) {
    $BranchId = $_POST['ListAgency'];
    $FormName = $_POST['FormName'];
    $FetchAgencyOnBranch = mysqli_query($con, "SELECT aId,agencyName FROM agency WHERE branchId = '$BranchId'");
    if ($FormName == 'Navbar') {
        echo '<option hidden value="" >Agency </option>';
        if (mysqli_num_rows($FetchAgencyOnBranch) > 0) {
            foreach ($FetchAgencyOnBranch as $FetchAgencyOnBranchResult) {
                echo '<option value="' . $FetchAgencyOnBranchResult["aId"] . '" > ' . $FetchAgencyOnBranchResult["agencyName"] . ' </option>';
            }
        } else {
            echo '<option hidden value="" >Agency </option>';
        }
    } else {
        echo '<option hidden value="" >Select Agency </option>';
        if (mysqli_num_rows($FetchAgencyOnBranch) > 0) {
            foreach ($FetchAgencyOnBranch as $FetchAgencyOnBranchResult) {
                echo '<option value="' . $FetchAgencyOnBranchResult["aId"] . '" > ' . $FetchAgencyOnBranchResult["agencyName"] . ' </option>';
            }
        } else {
            echo '<option hidden value="" >Select Agency </option>';
        }
    }
}


//Select District
if (isset($_POST['SelectedState'])) {

    $StateId = $_POST['SelectedState'];
    $fetchDistrict = mysqli_query($con, "SELECT * FROM district WHERE stateId = '$StateId'");
    echo '<option hidden value="" > Select District </option>';
    foreach ($fetchDistrict as $fetchDistrictResult) {
        echo '<option value="' . $fetchDistrictResult["dId"] . '" > ' . $fetchDistrictResult["districtName"] . ' </option>';
    }
}


//Select City
if (isset($_POST['SelectedDistrict'])) {

    $Districtd = $_POST['SelectedDistrict'];
    $fetchCity = mysqli_query($con, "SELECT * FROM city WHERE districtId = '$Districtd'");
    echo '<option hidden value="" > Select City </option>';
    foreach ($fetchCity as $fetchCityResult) {
        echo '<option value="' . $fetchCityResult["citId"] . '" > ' . $fetchCityResult["cityName"] . ' </option>';
    }
}






//Display All Images
if (isset($_POST['ViewImagesMasterId']) && !empty($_POST['FormName'])) {

    $MasterId = $_POST['ViewImagesMasterId'];
    $FormName = $_POST['FormName'];
    $DataType = $_POST['DataType'];

    switch ($FormName) {
        case ('BRANCH'):
            $Folder = '../STAFFIMAGES/IDPROOF/';
            break;
        case ('AGENCY'):
            $Folder = '../STAFFIMAGES/IDPROOF/';
            break;
        case ('STAFF'):
            $Folder = '../STAFFIMAGES/IDPROOF/';
            break;
        case ('CUSTOMER'):
            $Folder = '../STAFFIMAGES/IDPROOF/';
            break;
    }

    switch ($DataType) {
        case ('FD'):
            $TableName = 'custdata';
            break;
        case ('PD'):
            $TableName = 'paiddata';
            break;
        case ('MD'):
            $TableName = 'marriagedata';
            break;
        case ('WD'):
            $TableName = 'weddingdata';
            break;
    }

    if ($FormName == 'CUSTOMER') {
        $FindAllImages = mysqli_query($con, "SELECT CONCAT(photo1,',',photo2,',',photo3,',',photo4,',',photo5,',',photo6,',',photo7,',',photo8,',',photo9) AS PROFILE, CONCAT(horoscope1,',',horoscope2,',',horoscope3,',',horoscope4,',',horoscope5) AS HOROSCOPE, CONCAT(idProof1,',',idProof2,',',idProof3,',',idProof4,',',idProof5) AS IDPROOF , CONCAT(home1,',',home2,',',home3,',',home4,',',home5) AS HOME,mainImage FROM $TableName WHERE custId = '$MasterId'");

        foreach ($FindAllImages as $FindAllImagesResult) {
            $ProfileImageString = explode(",", $FindAllImagesResult['PROFILE']);
            $HoroscopeImageString = explode(",", $FindAllImagesResult['HOROSCOPE']);
            $IdProofImageString = explode(",", $FindAllImagesResult['IDPROOF']);
            $HomeImageString = explode(",", $FindAllImagesResult['HOME']);
            $ActiveVar = $FindAllImagesResult['mainImage'];
        }

        //print_r($HoroscopeImageString);


    ?>
        <div id="ViewAllImagesCarousel" class="carousel slide" data-bs-ride="false">
            <div class="carousel-inner">
                <?php
                foreach ($ProfileImageString as $ProfileImageStringResult) {
                    $ProfileImageSrc = "../CUSTOMERIMAGES/PROFILE/" . $ProfileImageStringResult . "";
                    if (file_exists($ProfileImageSrc) == 1) {
                ?>
                        <div class="carousel-item <?= ($ActiveVar == $ProfileImageStringResult) ? "active" : '' ?>">
                            <img src="<?= $ProfileImageSrc ?>" class="d-block w-100" alt="...">
                            <div class="carousel-caption mt-4">
                                <button type="button" data-masterid="<?= $MasterId ?>" data-datatype="<?= $DataType ?>" value="<?= $ProfileImageStringResult ?>" class="btn btn-success rounded-pill px-4 py-2 MakeMainImageBtn">Make Main</button>
                            </div>
                        </div>
                    <?php
                    } else {
                    }
                    clearstatcache();
                }
                foreach ($HoroscopeImageString as $HoroscopeImageStringResult) {
                    //$ActiveVar = $ImageStringResult['imageActive'];
                    $HoroscopeImageSrc = "../CUSTOMERIMAGES/HOROSCOPE/" . $HoroscopeImageStringResult . "";
                    if (file_exists($HoroscopeImageSrc) == 1) {
                    ?>
                        <div class="carousel-item">
                            <img src="<?= $HoroscopeImageSrc ?>" class="d-block w-100" alt="...">
                        </div>
                    <?php
                    } else {
                    }
                    clearstatcache();
                }
                foreach ($IdProofImageString as $IdProofImageStringResult) {
                    //$ActiveVar = $ImageStringResult['imageActive'];
                    $IdProofImageSrc = "../CUSTOMERIMAGES/IDPROOF/" . $IdProofImageStringResult . "";
                    if (file_exists($IdProofImageSrc) == 1) {
                    ?>
                        <div class="carousel-item">
                            <img src="<?= $IdProofImageSrc ?>" class="d-block w-100" alt="...">
                        </div>
                    <?php
                    } else {
                    }
                    clearstatcache();
                }
                foreach ($HomeImageString as $HomeImageStringResult) {
                    //$ActiveVar = $ImageStringResult['imageActive'];
                    $HomeImageSrc = "../CUSTOMERIMAGES/HOME/" . $HomeImageStringResult . "";
                    if (file_exists($HomeImageSrc) == 1) {
                    ?>
                        <div class="carousel-item">
                            <img src="<?= $HomeImageSrc ?>" class="d-block w-100" alt="...">
                        </div>
                <?php
                    } else {
                    }
                    clearstatcache();
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#ViewAllImagesCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#ViewAllImagesCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    <?php
    } else {
        $FindAllImages = mysqli_query($con, "SELECT * FROM masterimages WHERE masterId = '$MasterId' AND masterForm = '$FormName' ORDER BY imageId ASC");
        ?>
        <div id="ViewAllImagesCarousel" class="carousel slide" data-bs-ride="false">
            <!-- <div class="carousel-indicators">
                        <button type="button" data-bs-target="#ViewAllImagesCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#ViewAllImagesCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#ViewAllImagesCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div> -->
            <div class="carousel-inner">
                <?php
                foreach ($FindAllImages as $FindAllImagesResult) {
                    $ActiveVar = $FindAllImagesResult['imageActive'];
                ?>
                    <div class="carousel-item <?= ($ActiveVar == 'YES') ? "active" : "" ?>  ">
                        <img src="<?= $Folder . $FindAllImagesResult["imageName"] ?>" class="d-block w-100" alt="...">
                        <div class="carousel-caption mt-4">
                            <button type="button" data-masterid="<?= $MasterId ?>" value="<?= $FindAllImagesResult["imageId"] ?>" class="btn btn-success rounded-pill px-4 py-2 MakeMainImageBtn">Make Main</button>
                            <button type="button" data-masterid="<?= $MasterId ?>" value="<?= $FindAllImagesResult["imageId"] ?>" class="btn btn-danger rounded-pill px-4 py-2 DeleteImageBtn">Delete</button>
                        </div>
                    </div>';
                <?php
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#ViewAllImagesCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#ViewAllImagesCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <?php
    }
}




//show Caste
if (isset($_POST['fetchCaste'])) {
    $ReligionId = $_POST['fetchCaste'];
    $FindCaste = mysqli_query($con, "SELECT casId,casteName FROM caste WHERE religionId = '$ReligionId'");
    if (mysqli_num_rows($FindCaste) > 0) {
        echo '<option value="">Select Caste</option>';
        foreach ($FindCaste as $FindCasteResult) {
            echo '<option value="' . $FindCasteResult["casId"] . '">' . $FindCasteResult["casteName"] . '</option>';
        }
    } else {
        echo '<option value="">No Caste Found</option>';
    }
}



//show State
if (isset($_POST['fetchState'])) {
    $CountryId = $_POST['fetchState'];
    $FindState = mysqli_query($con, "SELECT sId,stateName FROM state WHERE countryId = '$CountryId'");
    if (mysqli_num_rows($FindState) > 0) {
        echo '<option value="">Select State</option>';
        foreach ($FindState as $FindStateResult) {
            echo '<option value="' . $FindStateResult["sId"] . '">' . $FindStateResult["stateName"] . '</option>';
        }
    } else {
        echo '<option value="">No State Found</option>';
    }
}

//show District
if (isset($_POST['fetchDistrict'])) {
    $StateId = $_POST['fetchDistrict'];
    $FindDistrict = mysqli_query($con, "SELECT dId,districtName FROM district WHERE stateId = '$StateId'");
    if (mysqli_num_rows($FindDistrict) > 0) {
        echo '<option value="">Select District</option>';
        foreach ($FindDistrict as $FindDistrictResult) {
            echo '<option value="' . $FindDistrictResult["dId"] . '">' . $FindDistrictResult["districtName"] . '</option>';
        }
    } else {
        echo '<option value="">No District Found</option>';
    }
}


?>