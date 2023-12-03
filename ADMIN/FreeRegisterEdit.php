<?php

$PageTitle = '';
include '../MAIN/Dbconfig.php';

if (isset($_COOKIE['custidcookie']) && isset($_COOKIE['custtypecookie'])) {
    if (!empty($_COOKIE['custtoken'])) {
        if ($_COOKIE['custtypecookie'] == 1 || $_COOKIE['custtypecookie'] == 2) {
            $Token = $_COOKIE['custtoken'];
            $EmpID = $_COOKIE['custidcookie'];
        } else {
            header('location:../login.php');
        }
    } else {
        header('location:../login.php');
    }
} else {
    header('location:../login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Header include -->
    <?php include('../MAIN/Header.php'); ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <link rel="stylesheet" href="../assets/dist/virtual-select.min.css">

    <script src="../assets/dist/virtual-select.min.js"></script>


    <style>
        /* --------  Laptop Profile View And Edit Start-------- */
        .profileEditMain {
            background-color: #00ccfd;
            text-align: center;
            min-height: 10px !important;
        }

        .profileEditfirst {
            border-radius: 10px 0 0 10px;
            background-color: #00ccfd;
            text-align: center;
            min-height: 10px !important;
        }

        .profileEditlast {
            background-color: #00ccfd;
            text-align: center;
            min-height: 10px !important;
            border-radius: 0 10px 10px 0;
        }

        @media screen and (max-width:991px) {
            .profileEditfirst {
                border-radius: 10px;

            }

            .profileEditlast {
                border-radius: 10px;
            }
        }

        .editContent {
            font-size: 20px;
            border-right: 2px solid black;
        }

        .lastEditContent {
            font-size: 20px;
        }

        .editHeading {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            color: #078bd7;
            font-size: 20px;
        }

        .packagedetails {
            background-color: rgb(215, 214, 211);
            border-color: rgb(215, 214, 211);
        }

        .editPage {
            border: 1px solid rgb(244, 243, 243);
            border-radius: 10px;
            padding: 0;

        }

        @media screen and (max-width:991px) {
            .profileEditMain {
                background-color: #00ccfd;
                border-radius: 10px;
                text-align: center;
                min-height: 10px !important;

            }

            .editContent {
                font-size: 20px;
                border-right: none;
            }
        }

        .preferenceEditPage {
            border: 1px solid rgb(244, 243, 243) !important;
            border-radius: 10px !important;
            color: rgb(241, 20, 152) !important;
            background-color: #fee7f8 !important;
            font-size: 25px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .editBg {
            background-color: #fee7f8;
        }

        .selectBorder {
            border: none;
            font-family: Arial, Helvetica, sans-serif;
            padding: 0px 8px;
        }

        .selectBdr {
            padding: 0%;
            margin: 3%;
            border-radius: 10px;
            border-color: #06b7fb;
        }

        @media screen and (max-width:480px) {
            .editHeading {
                font-size: medium;
                margin-top: 15px;
            }
        }

        .btnlightgreen {
            border-radius: 6px;
            padding: 2px 12px;
            background-color: #08f03e;
            box-shadow: -2px 2px 2px rgb(155, 155, 155);
            border: none;
            color: white;
            font-size: 18px;
            font-family: "Averia Serif Libre";
            margin-right: 0;
        }

        .form-select {
            /* background-image: url("data:image/svg+xml;utf8,<svg fill='black' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/><path d='M0 0h24v24H0z' fill='none'/></svg>"); */
            background-image: url("../IMAGES/DownArrow.png");
        }

        #SaveCustomer input,
        #SaveCustomer select {
            box-shadow: none !important;
        }

        .RegisterForm input,
        .RegisterForm select,
        .RegisterForm textarea {
            box-shadow: none !important;
            border: 1px solid transparent;
        }

        .RegisterForm input:focus {
            border: 1px solid darkgray;
        }


        .RegisterForm .Newselect .vscomp-value,
        .RegisterForm .ExtendedSelect .vscomp-value {
            color: black !important;
            opacity: 1 !important;
        }


        .RegisterForm .vscomp-wrapper {
            font-family: "Nunito", sans-serif;
            font-weight: 500;
            /* width: 120% !important; */
            /* border-radius: 20px !important;  */
        }

        /* .RegisterForm .PartnerPreferenceSection .vscomp-wrapper {
            width: 120% !important;
        } */

        @media only screen and (min-width:1500px) {
            .RegisterForm .PartnerPreferenceSection .vscomp-wrapper {
                width: 120% !important;
            }
        }

        .RegisterForm .PartnerPreferenceSection .vscomp-toggle-button {
            background-color: #FEE7F8;
        }

        .RegisterForm .vscomp-wrapper.has-clear-button .vscomp-toggle-button {
            padding: 2px 8px;
            font-size: 15px;
            border: 0px;
        }

        .RegisterForm .vscomp-wrapper .vscomp-toggle-button .vscomp-arrow.vscomp-arrow::after {
            border-width: 2px;
            border-bottom-color: #e6e6e6;
            border-right-color: #e6e6e6;
            /* border: 2px solid rgba(0, 0, 0, 0); */
            height: 12px;
            width: 12px;
        }

        .RegisterForm .vscomp-ele {
            border-radius: 30px !important;
            padding: 0 !important;
        }

        .RegisterForm .vscomp-option-text {
            font-weight: 400 !important;
            font-size: 12px !important;
        }

        .RegisterForm .PartnerPreferenceSection .vscomp-option.focused {
            background-color: #afebed !important;
        }

        .RegisterForm .vscomp-option {
            max-height: 30px !important;
        }

        .HoroscopeSection label {
            font-weight: 700;
        }

        /* --------  Laptop Profile View And Edit End-------- */
    </style>

    <style>
        .ViewMemberImagesEdit {
            overflow-x: scroll;
            overflow-y: hidden;
            white-space: nowrap;
        }

        .ViewMemberImagesEdit .card {
            display: inline-block;
            height: 300px;
            width: 300px;
            margin-right: 30px;
            box-shadow: none;
        }

        .ViewMemberImagesEdit .card img {
            height: 300px;
            width: 300px;
        }

        .BtnEditPage {
            /* width: 110px; */
        }

        .BtnEditPage .EditPageBtnText {
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            color: white;
        }

        .BtnEditPage .EditPageBtnText {
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            color: white;
        }

        .BtnEditPage i {
            color: white;
        }

        .BtnEditPage.Restore .EditPageBtnText {
            background-color: #07e07b;
        }

        .BtnEditPage.Restore i {
            color: #07e07b;
        }

        .BtnEditPage.Delete .EditPageBtnText {
            background-color: red;
        }

        .BtnEditPage.Delete i {
            color: red;
        }

        .BtnEditPage.Suspend .EditPageBtnText {
            background-color: gray;
        }

        .BtnEditPage.Suspend i {
            color: gray;
        }

        .BtnEditPage.Disgrade .EditPageBtnText {
            background-color: #00bdfa;
        }

        .BtnEditPage.Disgrade i {
            color: #00bdfa;
        }

        .BtnEditPage.Upgrade .EditPageBtnText {
            background-color: blue;
        }

        .BtnEditPage.Upgrade i {
            color: blue;
        }

        .BtnEditPage.Deactive .EditPageBtnText {
            background-color: #fc8bf7;
        }

        .BtnEditPage.Deactive i {
            color: #fc8bf7;
        }

        .BtnEditPage.Active .EditPageBtnText {
            background-color: #ff00d0;
        }

        .BtnEditPage.Active i {
            color: #ff00d0;
        }

        .BtnUnApprove {
            background-color: red;
            color: white;
        }

        .BtnApprove {
            background-color: green;
            color: white;
        }
    </style>

</head>

<body>




    <!-- Delete Modal -->
    <div class="modal fade" id="delModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="exampleModalLabel">Delete Confirmation</h5>
                </div>
                <div class="modal-body">
                    <h4 class="text-center">Do you want to delete this agency?</h4>
                    <div class="text-center mt-3">
                        <button type="button" id="confirmYes" class="btn btn-primary me-5">Yes</button>
                        <button type="button" id="confirmNo" class="btn btn-secondary ms-5" data-bs-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Add Image Modal -->
    <div class="modal fade" id="AddImagesModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">

                    <h5 class="">Add Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="ImageUploadForm">
                        <input type="text" name="CustomerProfileId" class="" id="customer_profile_id" value="" hidden>
                        <input type="text" name="RegistrationUploadImageFolder" value="" id="customer_folder" hidden>
                        <input type="file" class="form-control" id="add_customer_image" name="AddCustomerImage[]" multiple accept=".jpg,.png">

                        <div class="d-flex justify-content-center col-12">
                            <button type="submit" class="btn  btn-info">UPLOAD</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <!-- Modal include -->
    <?php include('../MAIN/Modals.php'); ?>



    <!-- Navbar include -->
    <?php include('../MAIN/Navbar.php'); ?>


    <!-- Sidebar include -->
    <?php include('../MAIN/Sidebar.php'); ?>




    <main id="main" class="main">

        <!-- <div class="pagetitle">
            <h1>Agency Master</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Agency Master</li>
                </ol>
            </nav>
        </div> -->

        <section class="section dashboard">

            <!--CONTENTS-->
            <div class="container-fluid mainContents">

                <h5 class="text-center m-0 p-0" style="color: #F11498;border-radius:30px;background-color:#FFCCF5;">Edit Profile</h5>

                <?php

                if (isset($_GET['ProfileEditId'])) {
                    $ProfileId  = $_GET['ProfileEditId'];
                    $DataType = $_GET['DataType'];

                    $FindProfileDetails = mysqli_query($con, "SELECT * FROM custdata WHERE custId = '$ProfileId'");
                    foreach ($FindProfileDetails as $ProfileResult) {

                        $profileId = $ProfileResult['profileId'];
                        $gender = $ProfileResult['gender'];
                        $fullName = $ProfileResult['fullName'];
                        $package = $ProfileResult['package'];
                        //$status = $ProfileResult['motherTongue']; 
                        $dob = $ProfileResult['dob'];
                        //$age = $ProfileResult['motherTongue']; 
                        $height = $ProfileResult['height'];
                        $weight = $ProfileResult['weight'];
                        $complexion = $ProfileResult['complexion'];
                        $bodyType = $ProfileResult['bodyType'];
                        $maritalStatus = $ProfileResult['maritalStatus'];
                        $physicalStatus = $ProfileResult['physicalStatus'];
                        $nativePlace = $ProfileResult['nativePlace'];
                        // $religion = $ProfileResult['religion']; 
                        // $caste = $ProfileResult['caste']; 
                        // $subCaste = $ProfileResult['subCaste']; 
                        $email = $ProfileResult['email'];
                        //$star = $ProfileResult['motherTongue']; 
                        $chovvaDosham = $ProfileResult['chovvaDosham'];
                        $jathakamType = $ProfileResult['jathakamType'];
                        // $educationCat = $ProfileResult['educationCat']; 
                        // $educationType = $ProfileResult['motherTongue']; 
                        // $jobCat = $ProfileResult['motherTongue']; 
                        // $jobType = $ProfileResult['motherTongue']; 
                        // $jobLocCountry = $ProfileResult['motherTongue']; 
                        // $jobLocState = $ProfileResult['motherTongue'];
                        // $jobLocDistrict = $ProfileResult['motherTongue']; 
                        // $jobLocCity = $ProfileResult['motherTongue']; 
                        $monthlyIncome = $ProfileResult['monthlyIncome'];
                        $financialStatus = $ProfileResult['financialStatus'];
                        $registeredNumber = $ProfileResult['registeredNumber'];
                        $whatsappNumber = $ProfileResult['whatsappNumber'];
                        $residencePhoneNumber = $ProfileResult['residencePhoneNumber'];
                        $contactPerson = $ProfileResult['residencePhoneNumber'];
                        $noofChild = $ProfileResult['noofChild'];
                        $casteNoBar = $ProfileResult['casteNoBar'];
                        $eduDetails = $ProfileResult['eduDetails'];
                        $jobDetails = $ProfileResult['jobDetails'];
                        $motherTongue = $ProfileResult['motherTongue'];
                        $profileFor = $ProfileResult['profileFor'];
                        $bloodGroup = $ProfileResult['bloodGroup'];
                        $ParishEdavakaSNDPNSSMahal = $ProfileResult['ParishEdavakaSNDPNSSMahal'];
                        $hopingToMarry = $ProfileResult['hopingToMarry'];
                        $communicationAddress = $ProfileResult['communicationAddress'];
                        $address = $ProfileResult['address'];
                        $permanentAddress = $ProfileResult['address'];
                        $serviceCharge = $ProfileResult['serviceCharge'];
                        // $country = $ProfileResult['motherTongue']; 
                        // $state = $ProfileResult['motherTongue']; 
                        // $district = $ProfileResult['motherTongue']; 
                        // $city = $ProfileResult['motherTongue']; 
                        $residentialStatus = $ProfileResult['residentialStatus'];
                        $timeToCall = $ProfileResult['timeToCall'];
                        $yearlyIncome = $ProfileResult['yearlyIncome'];
                        $groomLocation = $ProfileResult['groomLocation'];
                        $prefferedContactNumber = $ProfileResult['prefferedContactNumber'];
                        $relationshipCandidate = $ProfileResult['relationshipCandidate'];
                        $fatherName = $ProfileResult['fatherName'];
                        // $fatherEducation = $ProfileResult['fatherEducation']; 
                        // $fatherJob = $ProfileResult['fatherJob'];
                        $fatherJobDetail = $ProfileResult['fatherJobDetail'];
                        $motherName = $ProfileResult['motherName'];
                        $motherEducation = $ProfileResult['motherEducation'];
                        $motherJob = $ProfileResult['motherJob'];
                        $motherJobDetail = $ProfileResult['motherJobDetail'];
                        $marriedBro = $ProfileResult['marriedBro'];
                        $unmarriedBro = $ProfileResult['unmarriedBro'];
                        $marriedSis = $ProfileResult['marriedSis'];
                        $unmarriedSis = $ProfileResult['unmarriedSis'];
                        $siblingJobProfile = $ProfileResult['siblingJobProfile'];
                        $guardian = $ProfileResult['guardian'];
                        $familyOrigin = $ProfileResult['familyOrigin'];
                        $familyType = $ProfileResult['familyType'];
                        $homeType = $ProfileResult['homeType'];
                        $candidateShare = $ProfileResult['candidateShare'];
                        $familyValues = $ProfileResult['familyValues'];
                        $youOwn = $ProfileResult['youOwn'];
                        $eatingHabits = $ProfileResult['eatingHabits'];
                        $drinkingHabits = $ProfileResult['drinkingHabits'];
                        $smokingHabits = $ProfileResult['smokingHabits'];
                        $languagesKnown = $ProfileResult['languagesKnown'];
                        $Hobbies = $ProfileResult['Hobbies'];
                        $interests = $ProfileResult['interests'];
                        $blog = $ProfileResult['blog'];
                        $socialMediaLink = $ProfileResult['socialMediaLink'];
                        $horoscopeDetails = $ProfileResult['horoscopeDetails'];
                        $birthHour = $ProfileResult['birthHour'];
                        $birthMinute = $ProfileResult['birthMinute'];
                        $birthPlace = $ProfileResult['birthPlace'];
                        $malayalamDob = $ProfileResult['malayalamDob'];
                        $janmaSistaDasa = $ProfileResult['janmaSistaDasa'];
                        $janmaSistaDasaEnd = $ProfileResult['janmaSistaDasaEnd'];
                        $horoscopeFile = $ProfileResult['horoscopeFile'];
                        $MotherTongue = $ProfileResult['motherTongue'];
                        $Religion = $ProfileResult['religion'];
                        $Caste = $ProfileResult['caste'];
                        $SubCaste = $ProfileResult['subCaste'];
                        $Star = $ProfileResult['star'];
                        $EducationCategory = $ProfileResult['educationCat'];
                        $EducationType = $ProfileResult['educationType'];
                        $JobCategory = $ProfileResult['jobCat'];
                        $JobType = $ProfileResult['jobType'];
                        $JobCountry = $ProfileResult['jobLocCountry'];
                        $JobState = $ProfileResult['jobLocState'];
                        $JobDistrict = $ProfileResult['jobLocDistrict'];
                        $JobCity = $ProfileResult['jobLocCity'];
                        $FatherEducation = $ProfileResult['fatherEducation'];
                        $FatherJob = $ProfileResult['fatherJob'];
                        $MotherEducation = $ProfileResult['motherEducation'];
                        $MotherJob = $ProfileResult['motherJob'];
                        $Country = $ProfileResult['country'];
                        $State = $ProfileResult['state'];
                        $District = $ProfileResult['district'];
                        $City = $ProfileResult['city'];
                        $PartnerHeightFrom = $ProfileResult['partnerHeightFrom'];
                        $PartnerAgeFrom = $ProfileResult['partnerAgeFrom'];
                        $PartnerHeightTo = $ProfileResult['partnerHeightTo'];
                        $PartnerAgeTo = $ProfileResult['partnerAgeTo'];
                        $PartnerReligion = $ProfileResult['partnerReligion'];
                        $PartnerStar = $ProfileResult['matchingStars'];
                        $PartnerCaste = $ProfileResult['partnerCaste'];
                        $PartnerEdCat = $ProfileResult['partnerEduCat'];
                        $PartnerEdType = $ProfileResult['partnerEduType'];
                        $PartnerJobCat = $ProfileResult['partnerJobCat'];
                        $PartnerJobType = $ProfileResult['partnerJobType'];
                        $PartnerCountry = $ProfileResult['partnerCountry'];
                        $PartnerState = $ProfileResult['partnerState'];
                        $PartnerDistrict = $ProfileResult['partnerDistrict'];
                        $PartnerCity = $ProfileResult['partnerCity'];
                        $PartnerJathakam = $ProfileResult['partnerJathakam'];
                        $PartnerComplexion = $ProfileResult['partnerComplexion'];
                        $PartnerBodyType = $ProfileResult['partnerBodyType'];
                        $PartnerMaritalStatus = $ProfileResult['partnerMaritalStatus'];
                    }
                }

                ?>

                <form id="UpdateCustomer" class="RegisterForm">

                    <div class="row">
                        <!-- Section 1 -->
                        <div class="col-xl-4 col-lg-4 col-12 ps-4 ">

                            <div class="row ">
                                <div class="col-6 col-xl-6">
                                    <h4 class="editHeading ps-2">BASIC DETAILS</h4>
                                </div>
                                <!-- <div class="col-6 text-end pe-0">
                                    <button class="btnLightblue p-0 px-2 mb-2"><i class="ri-edit-box-line p-0"></i>&nbsp;&nbsp; Edit</button>
                                </div> -->
                            </div>
                            <div class="row editPage ">
                                <div class="col-6">
                                    <p class="mb-0 ">Package</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select selectBorder ShowPackage" id="package" name="Package">
                                        <option selected value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage ">
                                <div class="col-6 ">
                                    <p class="mb-0">Create Date</p>
                                </div>
                                <div class="col-6 ">
                                    <p class="mb-0">30-10-2021</p>
                                </div>
                            </div>
                            <div class="row editPage ">
                                <div class="col-6">
                                    <p class="mb-0">Last Log Date</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0">30-4-2022</p>
                                </div>
                            </div>
                            <div class="row editPage ">
                                <div class="col-6 ">
                                    <p class="mb-0">Expiry Date</p>
                                </div>
                                <div class="col-6 ">
                                    <p class="mb-0">30-10-2022</p>
                                </div>
                            </div>




                            <div class="row editPage ">
                                <div class="col-6 ">
                                    <p class="mb-0">Profile ID</p>
                                </div>
                                <div class="col-6 ">
                                    <input class="form-control selectBorder" id="profile_id" value="<?= $ProfileResult['profileId'] ?>" name="ProfileId" type="text" readonly>
                                </div>
                            </div>

                            <div class="row editPage ">
                                <div class="col-6 ">
                                    <p class="mb-0 ">Bride/Groom Name</p>
                                </div>
                                <div class="col-6 ">
                                    <input class="form-control selectBorder" id="profile_name" value="<?= $ProfileResult['fullName'] ?>" name="ProfileName" type="text" placeholder="" required onkeypress="return isAlfa(event)">
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 ">Gender</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="gender" name="Gender">
                                        <option value="">Choose</option>
                                        <option value="Male"> Male</option>
                                        <option value="Female"> Female</option>
                                        <option value="Other"> Others</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 ">Age & Date of Birth</p>
                                </div>
                                <div class="col-6">
                                    <input class="form-control selectBorder" id="dob" name="DOB" value="<?= date("Y-m-d", strtotime($ProfileResult['dob'])) ?>" type="date" required>
                                </div>
                            </div>

                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">Profile Created by</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="profile_created" name="ProfileCreated">
                                        <option value="">Choose</option>
                                        <option value="Self"> Self</option>
                                        <option value="Father"> Father</option>
                                        <option value="Mother"> Mother</option>
                                        <option value="Brother"> Brother</option>
                                        <option value="Sister"> Sister</option>
                                        <option value="Uncle"> Uncle</option>
                                        <option value="Aunty"> Aunty</option>
                                        <option value="Grand Father"> Grand Father</option>
                                        <option value="Grand Mother"> Grand Mother</option>
                                    </select>
                                    <!-- <input class="form-control selectBorder" id="profile_created" value="Self" name="ProfileCreated" type="text" placeholder=""> -->

                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 ">Height</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="height" name="Height">
                                        <option value="  ">Choose</option>
                                        <option value="3 Ft 11 in - 120 cm">3 Ft 11 in - 120 cm</option>
                                        <option value="3 Ft 12 in - 121 cm">3 Ft 12 in - 121 cm</option>
                                        <option value="4 Ft 00 in - 122 cm">4 Ft 0 in - 122 cm</option>
                                        <option value="4 Ft 00 in - 123 cm">4 Ft 0 in - 123 cm</option>
                                        <option value="4 Ft 01 in - 124 cm">4 Ft 1 in - 124 cm</option>
                                        <option value="4 Ft 01 in - 125 cm">4 Ft 1 in - 125 cm</option>
                                        <option value="4 Ft 02 in - 126 cm">4 Ft 2 in - 126 cm</option>
                                        <option value="4 Ft 02 in - 127 cm">4 Ft 2 in - 127 cm</option>
                                        <option value="4 Ft 02 in - 128 cm">4 Ft 2 in - 128 cm</option>
                                        <option value="4 Ft 03 in - 129 cm">4 Ft 3 in - 129 cm</option>
                                        <option value="4 Ft 03 in - 130 cm">4 Ft 3 in - 130 cm</option>
                                        <option value="4 Ft 04 in - 131 cm">4 Ft 4 in - 131 cm</option>
                                        <option value="4 Ft 04 in - 132 cm">4 Ft 4 in - 132 cm</option>
                                        <option value="4 Ft 04 in - 133 cm">4 Ft 4 in - 133 cm</option>
                                        <option value="4 Ft 05 in - 134 cm">4 Ft 5 in - 134 cm</option>
                                        <option value="4 Ft 05 in - 135 cm">4 Ft 5 in - 135 cm</option>
                                        <option value="4 Ft 06 in - 136 cm">4 Ft 6 in - 136 cm</option>
                                        <option value="4 Ft 06 in - 137 cm">4 Ft 6 in - 137 cm</option>
                                        <option value="4 Ft 06 in - 138 cm">4 Ft 6 in - 138 cm</option>
                                        <option value="4 Ft 07 in - 139 cm">4 Ft 7 in - 139 cm</option>
                                        <option value="4 Ft 07 in - 140 cm">4 Ft 7 in - 140 cm</option>
                                        <option value="4 Ft 08 in - 141 cm">4 Ft 8 in - 141 cm</option>
                                        <option value="4 Ft 08 in - 142 cm">4 Ft 8 in - 142 cm</option>
                                        <option value="4 Ft 08 in - 143 cm">4 Ft 8 in - 143 cm</option>
                                        <option value="4 Ft 09 in - 144 cm">4 Ft 9 in - 144 cm</option>
                                        <option value="4 Ft 09 in - 145 cm">4 Ft 9 in - 145 cm</option>
                                        <option value="4 Ft 09 in - 146 cm">4 Ft 9 in - 146 cm</option>
                                        <option value="4 Ft 10 in - 147 cm">4 Ft 10 in - 147 cm</option>
                                        <option value="4 Ft 10 in - 148 cm">4 Ft 10 in - 148 cm</option>
                                        <option value="4 Ft 11 in - 149 cm">4 Ft 11 in - 149 cm</option>
                                        <option value="4 Ft 11 in - 150 cm">4 Ft 11 in - 150 cm</option>
                                        <option value="4 Ft 11 in - 151 cm">4 Ft 11 in - 151 cm</option>
                                        <option value="5 Ft 00 in - 152 cm">5 Ft 0 in - 152 cm</option>
                                        <option value="5 Ft 00 in - 153 cm">5 Ft 0 in - 153 cm</option>
                                        <option value="5 Ft 01 in - 154 cm">5 Ft 1 in - 154 cm</option>
                                        <option value="5 Ft 01 in - 155 cm">5 Ft 1 in - 155 cm</option>
                                        <option value="5 Ft 01 in - 156 cm">5 Ft 1 in - 156 cm</option>
                                        <option value="5 Ft 02 in - 157 cm">5 Ft 2 in - 157 cm</option>
                                        <option value="5 Ft 02 in - 158 cm">5 Ft 2 in - 158 cm</option>
                                        <option value="5 Ft 03 in - 159 cm">5 Ft 3 in - 159 cm</option>
                                        <option value="5 Ft 03 in - 160 cm">5 Ft 3 in - 160 cm</option>
                                        <option value="5 Ft 03 in - 161 cm">5 Ft 3 in - 161 cm</option>
                                        <option value="5 Ft 04 in - 162 cm">5 Ft 4 in - 162 cm</option>
                                        <option value="5 Ft 04 in - 163 cm">5 Ft 4 in - 163 cm</option>
                                        <option value="5 Ft 05 in - 164 cm">5 Ft 5 in - 164 cm</option>
                                        <option value="5 Ft 05 in - 165 cm">5 Ft 5 in - 165 cm</option>
                                        <option value="5 Ft 05 in - 166 cm">5 Ft 5 in - 166 cm</option>
                                        <option value="5 Ft 06 in - 167 cm">5 Ft 6 in - 167 cm</option>
                                        <option value="5 Ft 06 in - 168 cm">5 Ft 6 in - 168 cm</option>
                                        <option value="5 Ft 07 in - 169 cm">5 Ft 7 in - 169 cm</option>
                                        <option value="5 Ft 07 in - 170 cm">5 Ft 7 in - 170 cm</option>
                                        <option value="5 Ft 07 in - 171 cm">5 Ft 7 in - 171 cm</option>
                                        <option value="5 Ft 08 in - 172 cm">5 Ft 8 in - 172 cm</option>
                                        <option value="5 Ft 08 in - 173 cm">5 Ft 8 in - 173 cm</option>
                                        <option value="5 Ft 09 in - 174 cm">5 Ft 9 in - 174 cm</option>
                                        <option value="5 Ft 09 in - 175 cm">5 Ft 9 in - 175 cm</option>
                                        <option value="5 Ft 09 in - 176 cm">5 Ft 9 in - 176 cm</option>
                                        <option value="5 Ft 10 in - 177 cm">5 Ft 10 in - 177 cm</option>
                                        <option value="5 Ft 10 in - 178 cm">5 Ft 10 in - 178 cm</option>
                                        <option value="5 Ft 10 in - 179 cm">5 Ft 10 in - 179 cm</option>
                                        <option value="5 Ft 11 in - 180 cm">5 Ft 11 in - 180 cm</option>
                                        <option value="5 Ft 11 in - 181 cm">5 Ft 11 in - 181 cm</option>
                                        <option value="6 Ft 00 in - 182 cm">6 Ft 0 in - 182 cm</option>
                                        <option value="6 Ft 00 in - 183 cm">6 Ft 0 in - 183 cm</option>
                                        <option value="6 Ft 00 in - 184 cm">6 Ft 0 in - 184 cm</option>
                                        <option value="6 Ft 01 in - 185 cm">6 Ft 1 in - 185 cm</option>
                                        <option value="6 Ft 01 in - 186 cm">6 Ft 1 in - 186 cm</option>
                                        <option value="6 Ft 02 in - 187 cm">6 Ft 2 in - 187 cm</option>
                                        <option value="6 Ft 02 in - 188 cm">6 Ft 2 in - 188 cm</option>
                                        <option value="6 Ft 02 in - 189 cm">6 Ft 2 in - 189 cm</option>
                                        <option value="6 Ft 03 in - 190 cm">6 Ft 3 in - 190 cm</option>
                                        <option value="6 Ft 03 in - 191 cm">6 Ft 3 in - 191 cm</option>
                                        <option value="6 Ft 04 in - 192 cm">6 Ft 4 in - 192 cm</option>
                                        <option value="6 Ft 04 in - 193 cm">6 Ft 4 in - 193 cm</option>
                                        <option value="6 Ft 04 in - 194 cm">6 Ft 4 in - 194 cm</option>
                                        <option value="6 Ft 05 in - 195 cm">6 Ft 5 in - 195 cm</option>
                                        <option value="6 Ft 05 in - 196 cm">6 Ft 5 in - 196 cm</option>
                                        <option value="6 Ft 06 in - 197 cm">6 Ft 6 in - 197 cm</option>
                                        <option value="6 Ft 06 in - 198 cm">6 Ft 6 in - 198 cm</option>
                                        <option value="6 Ft 06 in - 199 cm">6 Ft 6 in - 199 cm</option>
                                        <option value="6 Ft 07 in - 200 cm">6 Ft 7 in - 200 cm</option>
                                        <option value="6 Ft 07 in - 201 cm">6 Ft 7 in - 201 cm</option>
                                        <option value="6 Ft 08 in - 202 cm">6 Ft 8 in - 202 cm</option>
                                        <option value="6 Ft 08 in - 203 cm">6 Ft 8 in - 203 cm</option>
                                        <option value="6 Ft 08 in - 204 cm">6 Ft 8 in - 204 cm</option>
                                        <option value="6 Ft 09 in - 205 cm">6 Ft 9 in - 205 cm</option>
                                        <option value="6 Ft 09 in - 206 cm">6 Ft 9 in - 206 cm</option>
                                        <option value="6 Ft 09 in - 207 cm">6 Ft 9 in - 207 cm</option>
                                        <option value="6 Ft 10 in - 208 cm">6 Ft 10 in - 208 cm</option>
                                        <option value="6 Ft 10 in - 209 cm">6 Ft 10 in - 209 cm</option>
                                        <option value="6 Ft 11 in - 210 cm">6 Ft 11 in - 210 cm</option>
                                        <option value="6 Ft 11 in - 211 cm">6 Ft 11 in - 211 cm</option>
                                        <option value="6 Ft 11 in - 212 cm">6 Ft 11 in - 212 cm</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 ">Weight</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="weight" name="Weight">
                                        <option value="  ">Choose</option>
                                        <option value="40 Kg">40 kg</option>
                                        <option value="41 Kg">41 kg</option>
                                        <option value="42 Kg">42 kg</option>
                                        <option value="43 Kg">43 kg</option>
                                        <option value="44 Kg">44 kg</option>
                                        <option value="45 Kg">45 kg</option>
                                        <option value="46 Kg">46 kg</option>
                                        <option value="47 Kg">47 kg</option>
                                        <option value="48 Kg">48 kg</option>
                                        <option value="49 Kg">49 kg</option>
                                        <option value="50 Kg">50 kg</option>
                                        <option value="51 Kg">51 kg</option>
                                        <option value="52 Kg">52 kg</option>
                                        <option value="53 Kg">53 kg</option>
                                        <option value="54 Kg">54 kg</option>
                                        <option value="55 Kg">55 kg</option>
                                        <option value="56 Kg">56 kg</option>
                                        <option value="57 Kg">57 kg</option>
                                        <option value="58 Kg">58 kg</option>
                                        <option value="59 Kg">59 kg</option>
                                        <option value="60 Kg">60 kg</option>
                                        <option value="61 Kg">61 kg</option>
                                        <option value="62 Kg">62 kg</option>
                                        <option value="63 Kg">63 kg</option>
                                        <option value="64 Kg">64 kg</option>
                                        <option value="65 Kg">65 kg</option>
                                        <option value="66 Kg">66 kg</option>
                                        <option value="67 Kg">67 kg</option>
                                        <option value="68 Kg">68 kg</option>
                                        <option value="69 Kg">69 kg</option>
                                        <option value="70 Kg">70 kg</option>
                                        <option value="71 Kg">71 kg</option>
                                        <option value="72 Kg">72 kg</option>
                                        <option value="73 Kg">73 kg</option>
                                        <option value="74 Kg">74 kg</option>
                                        <option value="75 Kg">75 kg</option>
                                        <option value="76 Kg">76 kg</option>
                                        <option value="77 Kg">77 kg</option>
                                        <option value="78 Kg">78 kg</option>
                                        <option value="79 Kg">79 kg</option>
                                        <option value="80 Kg">80 kg</option>
                                        <option value="81 Kg">81 kg</option>
                                        <option value="82 Kg">82 kg</option>
                                        <option value="83 Kg">83 kg</option>
                                        <option value="84 Kg">84 kg</option>
                                        <option value="85 Kg">85 kg</option>
                                        <option value="86 Kg">86 kg</option>
                                        <option value="87 Kg">87 kg</option>
                                        <option value="88 Kg">88 kg</option>
                                        <option value="89 Kg">89 kg</option>
                                        <option value="90 Kg">90 kg</option>
                                        <option value="91 Kg">91 kg</option>
                                        <option value="92 Kg">92 kg</option>
                                        <option value="93 Kg">93 kg</option>
                                        <option value="94 Kg">94 kg</option>
                                        <option value="95 Kg">95 kg</option>
                                        <option value="96 Kg">96 kg</option>
                                        <option value="97 Kg">97 kg</option>
                                        <option value="98 Kg">98 kg</option>
                                        <option value="99 Kg">99 kg</option>
                                        <option value="100 Kg">100 Kg</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 ">Complexion</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="complexion" name="Complexion">
                                        <option value="  ">Choose</option>
                                        <option value="Dark">Dark</option>
                                        <option value="Fair">Fair</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Very Fair">Very Fair</option>
                                        <option value="Wheatish">Wheatish</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">Body Type</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="body_type" name="BodyType">
                                        <option value="  ">Choose</option>
                                        <option value="Slim">Slim</option>
                                        <option value="Average">Average</option>
                                        <option value="Athletic">Athletic</option>
                                        <option value="Heavy">Heavy</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">Marital Status</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="matrial_status" name="MatrialStatus">
                                        <option value="  ">Choose</option>
                                        <option value="Unmarried">Unmarried</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Widow/Widower">Widow/ Widower</option>
                                        <option value="Awaiting Divorce">Awaiting Divorce</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">No of Child</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="no_of_child" name="NoOfChild">
                                        <option value="0">Choose</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">Phys Status</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="phys_status" name="PhysStatus">
                                        <option value="  ">Choose</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Blind">Blind</option>
                                        <option value="Deaf/Dump">Deaf/Dump</option>
                                        <option value="Handicapped">Handicapped</option>
                                        <option value="Mentally Challenged">Mentally Challenged</option>
                                        <option value="Physically Challenged">Physically Challenged</option>
                                        <option value="With other Disability">With other Disability</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">Native Place</p>
                                </div>
                                <div class="col-6">
                                    <input class="form-control selectBorder" id="native_place" value="<?= $ProfileResult['nativePlace'] ?>" name="NativePlace" type="text" placeholder="">
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">Mother Tongue</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select ShowMothertongue selectBorder" id="mother_tongue" name="MotherTongue">
                                        <option value="">Mother Tongue</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">Blood Group</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="blood_group" name="BloodGroup">
                                        <option value="  ">Choose</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">Marriage Plan</p>
                                </div>
                                <div class="col-6">
                                    <input class="form-control selectBorder" id="marriage_plan" name="MarriagePlan" value="<?= $ProfileResult['hopingToMarry'] ?>" type="text" placeholder="">
                                </div>
                            </div>

                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">About Myself</p>
                                </div>
                                <div class="col-6">
                                    <textarea class="form-control selectBorder" id="about_myself" value="<?= $ProfileResult['aboutCandidate'] ?>" rows="1"></textarea>
                                </div>
                            </div>
                            <!-- <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">Upload Id Proof</p>
                                </div>
                                <div class="col-6">
                                    <input class="form-control selectBorder" id="upload_idproof" name="UploadIdProof" type="file">
                                </div>
                            </div> -->
                        </div>


                        <div class="col-12 col-lg-8 px-4">
                            <div class="row">

                                <!-- Section 2 -->
                                <div class="col-xl-6 col-lg-6 col-12 ">
                                    <h4 class="editHeading ps-4">RELIGIOUS DETAILS</h4>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Religion</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select ShowReligion selectBorder" id="religion" name="Religion">
                                                <option value="">Choose</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Caste</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select ShowCaste selectBorder" id="cast" name="Cast">
                                                <option value="0">Choose</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Sub Caste</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select ShowSubCaste selectBorder" id="sub_caste" name="SubCaste">
                                                <option>Choose</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Caste No Bar</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select  selectBorder" id="caste_no_bar" name="CasteNoBar">
                                                <option value="">Choose</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0"> Star</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select ShowAllStar selectBorder" id="star" name="Star">

                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Chovva Dosham</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select  selectBorder" id="chovva_dosham" name="ChovvaDosham">
                                                <option value="">Choose</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Dont Know">Don't Know</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Type of Jathakam</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select  selectBorder" id="type_jathakam" name="TypeJathakam">
                                                <option value="  ">Choose</option>
                                                <option value="Normal Jadhakam">Normal Jadhakam</option>
                                                <option value="Sudha Jadhakam">Sudha Jadhakam</option>
                                                <option value="Paapa Jadhakam">Paapa Jadhakam</option>
                                                <option value="Dont Know">Don't Know</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Parish/SNDP/NSS/Mahal</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="parish_mahal" value="<?= $ProfileResult['ParishEdavakaSNDPNSSMahal'] ?>" name="ParishMahal" type="text" placeholder="" onkeypress="return isAlfa(event)">
                                        </div>
                                    </div>

                                    <h4 class="editHeading ps-4">PROFESSION DETAILS</h4>


                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Education Category</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select selectBorder ShowEduCat" id="education_category" name="EducationCategory">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Education Type</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select selectBorder ShowEduType" id="education_type" name="EducationType">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Education Details</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="education_details" value="<?= $ProfileResult['eduDetails'] ?>" name="EducationDetails" type="text" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Job Category</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select selectBorder ShowJobCategory" id="job_category" name="JobCategory">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Job Type</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select selectBorder JobTypes ShowJobType" id="job_type" name="JobType">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Job Detail and Official Address </p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="job_detail" value="<?= $ProfileResult['jobDetails'] ?>" name="JobDetail" type="text" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Job Location Country</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select selectBorder Country JobCountry" id="job_location_country" name="JobLocationCountry">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Job Location State</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select selectBorder JobState" id="job_location_state" name="JobLocationState">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Job Location District</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select selectBorder JobDistrict" id="job_location_district" name="JobLocationDistrict">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Job Location City</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select selectBorder JobCity" id="job_location_city" name="JobLocationCity">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Monthly Income</p>
                                        </div>
                                        <div class="col-6">
                                            <!-- <input class="form-control selectBorder" id="monthly_income" name="MonthlyIncome" value="<?= $ProfileResult['monthlyIncome'] ?>" type="text" placeholder=""> -->
                                            <select class="form-select selectBorder" id="monthly_income" name="MonthlyIncome" >
                                                <option selected value="">Choose</option>
                                                <option value="1000">Below Rs.1000</option>
                                                <option value="1000 - 3000">Rs.1000 - Rs.3000</option>
                                                <option value="3000 - 5000">Rs.3000 - Rs.5000</option>
                                                <option value="5000 - 8000">Rs.5000 - Rs.8000</option>
                                                <option value="8000 - 10000">Rs.8000 - Rs.10000</option>
                                                <option value="10000 - 15000">Rs.10000 - Rs.15000</option>
                                                <option value="15000 - 25000">Rs.15000 - Rs.25000</option>
                                                <option value="25000 - 50000">Rs.25000 - Rs.50000</option>
                                                <option value="50000 - 75000">Rs.50000 - Rs.75000</option>
                                                <option value="75000 - 100000">Rs.75000 - Rs.100000</option>
                                                <option value="100000 - 200000">Rs.100000 - Rs.200000</option>
                                                <option value="200000">Above Rs. 200000</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Section 3 -->
                                <div class="col-xl-6 col-lg-6 col-12 ps-4">
                                    <h4 class="editHeading ps-4">FAMILY DETAILS</h4>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Father's Name</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="father_name" value="<?= $ProfileResult['fatherName'] ?>" name="FatherName" type="text" placeholder="" onkeypress="return isAlfa(event)">
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Father's Education</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select FatherEducation selectBorder AllEduTypes" id="father_education" name="FatherEducation">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Father's Job</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select selectBorder FatherJobType ShowJobType" id="father_job" name="FatherJob">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Father's Job Details</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="father_job_details" value="<?= $ProfileResult['fatherJobDetail'] ?>" name="FatherJobDetails" type="text" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Mother's Name</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="mother_name" name="MotherName" value="<?= $ProfileResult['motherName'] ?>" type="text" placeholder="" onkeypress="return isAlfa(event)">
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Mother's Education</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select selectBorder MotherEducation AllEduTypes" id="mother_education" name="MotherEducation">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Mother's Job </p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select selectBorder MotherJobType ShowJobType" id="mother_job" name="MotherJob">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Mother's Job Detail </p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="mother_job_detail" value="<?= $ProfileResult['motherJobDetail'] ?>" name="MotherJobDetail" type="text" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Married Brothers</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select  selectBorder" id="married_brothers" name="MarriedBrothers">
                                                <option value="0">Choose</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Married Sisters</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select  selectBorder" id="married_sister" name="MarriedSister">
                                                <option value="0">Choose</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Unmarried Brothers</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select  selectBorder" id="unmarried_brothers" name="UnmarriedBrothers">

                                                <option value="0">Choose</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Unmarried Sisters </p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select  selectBorder" id="unmarried_sisters" name="UnmarriedSisters">
                                                <option value="0">Choose</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Job Profile Of Sibling</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="job_sibling" value="<?= $ProfileResult['siblingJobProfile'] ?>" name="JobSibling" type="text" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Guardian (If Any)</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="guardian" value="<?= $ProfileResult['guardian'] ?>" name="Guardian" type="text" placeholder="" onkeypress="return isAlfa(event)">
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Ancestral / Family Orgin</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="family_orgin" value="<?= $ProfileResult['familyOrigin'] ?>" name="FamilyOrgin" type="text" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Family Values</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select  selectBorder" id="family_values" name="FamilyValues">
                                                <option value="  ">Choose</option>
                                                <option value="Traditional">Traditional</option>
                                                <option value="Moderate">Moderate</option>
                                                <option value="Liberal">Liberal</option>
                                                <option value="Orthodox">Orthodox</option>
                                            </select>
                                            <!-- <input class="form-control selectBorder" id="family_values" value="<?= $ProfileResult['familyValues'] ?>" name="FamilyValues" type="text" placeholder=""> -->
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Family Type </p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select  selectBorder" id="family_type" name="FamilyType">
                                                <option value="  ">Choose</option>
                                                <option value="Nuclear">Nuclear</option>
                                                <option value="Joint">Joint</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Financial Status</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select  selectBorder" id="financial_status" name="FinancialStatus">
                                                <option value="  ">Choose</option>
                                                <option value="Middle class">Middle class</option>
                                                <option value="Upper middle class">Upper middle class</option>
                                                <option value="Lower class">Lower class</option>
                                                <option value="Rich">Rich</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Home Type</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select  selectBorder" id="home_type" name="HomeType">
                                                <option value="  ">Choose</option>
                                                <option value="Own House">Own House</option>
                                                <option value="Own Flat">Own Flat</option>
                                                <option value="Rent House">Rent House</option>
                                                <option value="Rent Flat">Rent Flat</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Candidates Share Details</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="candidates_share" value="<?= $ProfileResult['candidateShare'] ?>" name="CandidatesShare" type="text" placeholder="">
                                        </div>
                                    </div>
                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">About Family</p>
                                        </div>
                                        <div class="col-6">
                                            <textarea class="form-control selectBorder" id="about_family" rows="1"><?= $ProfileResult['aboutFamily'] ?></textarea>
                                        </div>
                                    </div>
                                    <!-- <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Upload Home Images</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="upload_home_image" name="UploadHomeImage" type="file">
                                        </div>
                                    </div> -->
                                </div>

                            </div>
                        </div>



                    </div>


                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-12 px-4">
                            <h4 class="editHeading ps-4 my-3">LIFE STYLE</h4>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">Eating Habits</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="eating_habits" name="EatingHabits">
                                        <option value="  ">Choose</option>
                                        <option value="Eggetaria">Eggetarian</option>
                                        <option value="Non Veg">Non Veg</option>
                                        <option value="Veg">Veg</option>
                                        <option value="Occasionally Non - Veg">Occasionally Non - Veg</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 py-1">Drinking Habits</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="drinking_habits" name="DrinkingHabits">
                                        <option value="  ">Choose</option>
                                        <option value="Daily">Daily</option>
                                        <option value="Never">Never</option>
                                        <option value="Occasionally">Occasionally</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 py-1">Smoking Habits</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="smoking_habits" name="SmokingHabits">
                                        <option value="  ">Choose</option>
                                        <option value="Daily">Daily</option>
                                        <option value="Never">Never</option>
                                        <option value="Occasionally">Occasionally</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 py-1">Language Known</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select Newselect selectBorder" id="language_known" name="LanguageKnown" placeholder="Choose" multiple>

                                        <option value="Arabic">Arabic</option>
                                        <option value="English">English</option>
                                        <option value="French">French</option>
                                        <option value="Gujarati">Gujarati</option>
                                        <option value="Hindi">Hindi</option>
                                        <option value="Kannada">Kannada</option>
                                        <option value="Konkani">Konkani</option>
                                        <option value="Malayalam">Malayalam</option>
                                        <option value="Punjabi">Punjabi</option>
                                        <option value="Tamil">Tamil</option>
                                        <option value="Telugu">Telugu</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 py-1">Hobbies</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select Newselect selectBorder" id="hobbies" name="Hobbies" placeholder="Choose" multiple>

                                        <option value="Art and handicraft">Art and handicraft</option>
                                        <option value="Billiards">Billiards</option>
                                        <option value="Coin Collection">Coin Collection</option>
                                        <option value="Cricket">Cricket</option>
                                        <option value="Cycling">Cycling</option>
                                        <option value="Dancing">Dancing</option>
                                        <option value="Drawing and painting">Drawing and painting</option>
                                        <option value="Dress designing">Dress designing</option>
                                        <option value="Gardening">Gardening</option>
                                        <option value="Internet surfing">Internet surfing</option>
                                        <option value="Pool">Pool</option>
                                        <option value="Reading">Reading</option>
                                        <option value="Singing">Singing</option>
                                        <option value="Snooker">Snooker</option>
                                        <option value="Writing">Writing</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 py-1">Interests</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select Newselect selectBorder" id="interests" name="Interests" placeholder="Choose" multiple>

                                        <option value="Browsing internet">Browsing internet</option>
                                        <option value="Chess">Chess</option>
                                        <option value="Cooking">Cooking</option>
                                        <option value="Dance">Dance</option>
                                        <option value="Dancing">Dancing</option>
                                        <option value="Designing">Designing</option>
                                        <option value="Driving">Driving</option>
                                        <option value="Games and puzzles">Games and puzzles</option>
                                        <option value="Movies">Movies</option>
                                        <option value="Music">Music</option>
                                        <option value="Nature">Nature</option>
                                        <option value="Pets">Pets</option>
                                        <option value="Photography">Photography</option>
                                        <option value="Playing musical instruments">Playing musical instruments</option>
                                        <option value="Shopping">Shopping</option>
                                        <option value="Singing">Singing</option>
                                        <option value="Sports">Sports</option>
                                        <option value="Travelling">Travelling</option>
                                        <option value="Watching movies">Watching movies</option>
                                        <option value="Others">Others</option>

                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 py-1">Blog</p>
                                </div>
                                <div class="col-6">
                                    <input class="form-control selectBorder" id="blog" name="Blog" value="<?= $ProfileResult['blog'] ?>" type="text" placeholder="">
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 py-1">Link Social Network</p>
                                </div>
                                <div class="col-6">
                                    <input class="form-control selectBorder" id="link_social" name="LinkSocial" value="<?= $ProfileResult['socialMediaLink'] ?>" type="text" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-12  ">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class=" editHeading ps-4 my-3">LOCATION AND CONTACT DETAILS</h4>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 px-4">

                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">Communication Address</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <textarea cols="30" rows="4" class="form-control selectBorder" id="communication_address" name="CommunicationAddress" placeholder=""><?= $ProfileResult['communicationAddress'] ?></textarea>
                                            <!-- <input type="textarea" row="3" class="selectBorder " value="Chirayil House, Karshaka Road, Near Church, 4th House " > -->
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">Permanent Address Country</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <select class="form-select CandidateCountry selectBorder" id="country" name="Country" required>
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">State</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <select class="form-select CandidateState selectBorder" id="state" name="State" required>
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">District</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <select class="form-select CandidateDistrict selectBorder" id="district" name="District" required>
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">City</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <select class="form-select CandidateCity selectBorder" id="city" name="City">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">Residential Status</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <select class="form-select  selectBorder" id="residential_status" name="ResidentialStatus">
                                                <option value="  ">Choose</option>
                                                <option value="Resident">Resident</option>
                                                <option value="Non Resident">Non Resident</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 px-4">
                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">Whatsapp</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class=" form-control  selectBorder" id="whatsapp" name="Whatsapp" value="<?= $ProfileResult['whatsappNumber'] ?>">
                                        </div>
                                    </div>
                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">Residence Phone Number</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class=" form-control selectBorder" id="residence_phone" name="ResidencePhone" value="<?= $ProfileResult['residencePhoneNumber'] ?>">
                                        </div>
                                    </div>
                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">Preferred Contact Number</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <select class="form-select selectBorder" id="preferred_contact" name="PreferredContact">
                                                <option selected value="0">Choose</option>
                                                <option hidden id="whatsapp_prefer" value=""></option>
                                                <option hidden id="residence_prefer" value=""></option>
                                            </select>
                                            <!-- <input type="text" class=" form-control selectBorder" id="preferred_contact" name="PreferredContact" value="<?= $ProfileResult['prefferedContactNumber'] ?>"> -->
                                        </div>
                                    </div>
                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">Contact Person Name</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class=" form-control selectBorder" id="contact_person" name="ContactPerson" value="<?= $ProfileResult['contactPerson'] ?>" onkeypress="return isAlfa(event)">
                                        </div>
                                    </div>
                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">Relationship with Candidate</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <select class="form-select  selectBorder" id="relationshipcandidate" name="RelationshipCandidate">
                                                <option value="  ">Choose</option>
                                                <option value="Self"> Self</option>
                                                <option value="Father"> Father</option>
                                                <option value="Mother"> Mother</option>
                                                <option value="Brother"> Brother</option>
                                                <option value="Sister"> Sister</option>
                                                <option value="Uncle"> Uncle</option>
                                                <option value="Aunty"> Aunty</option>
                                                <option value="Grand Father"> Grand Father</option>
                                                <option value="Grand Mother"> Grand Mother</option>
                                            </select>
                                            <!-- <input type="text" class=" form-control  selectBorder" id="relationshipcandidate" name="RelationshipCandidate" value="<?= $ProfileResult['relationshipCandidate'] ?>"> -->
                                        </div>
                                    </div>
                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">Preferred Time to Call</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <select class="form-select  selectBorder" id="preferred_time" name="PreferredTime">
                                                <option value="">Choose</option>
                                                <option value="Any Time">Any Time</option>
                                                <option value="Morning">Morning</option>
                                                <option value="Afternoon">Afternoon</option>
                                                <option value="Evening">Evening</option>
                                                <option value="Night">Night</option>
                                                <option value="6 am - 9 am">6 am - 9 am</option>
                                                <option value="6 am - 1 pm">6 am - 1 pm</option>
                                                <option value="9 am - 1 pm">9 am - 1 pm</option>
                                                <option value="10 am - 5 pm">10 am - 5 pm</option>
                                                <option value="1 pm - 4 pm">1 pm - 4 pm</option>
                                                <option value="4 pm - 7 pm">4 pm - 7 pm</option>
                                                <option value="7 pm - 11 pm">7 pm - 11 pm</option>
                                                <option value="11 pm - 6 am">11 pm - 6 am</option>
                                            </select>

                                            <!-- <input type="text" class="form-control selectBorder" id="preferred_time" name="PreferredTime" value="<?= $ProfileResult['timeToCall'] ?>"> -->
                                        </div>
                                    </div>
                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">Email</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control selectBorder" id="email" name="Email" value="<?= $ProfileResult['email'] ?>">
                                        </div>
                                    </div>
                                    <div class="row editPage">
                                        <div class="col-lg-6 py-1">
                                            <p class="mb-0 py-1">Service Charge Will Pay</p>
                                        </div>
                                        <div class="col-lg-6 py-1">
                                            <!-- <input type="number" class="form-control selectBorder" id="service_charge" name="ServiceCharge" value="<?= $ProfileResult['serviceCharge'] ?>"> -->
                                            <select class="form-select  selectBorder" id="service_charge" name="ServiceCharge">
                                                <option value="0">Choose</option>
                                                <option value="15000">Rs.15000</option>
                                                <option value="20000">Rs.20000</option>
                                                <option value="30000">Rs.30000</option>
                                                <option value="40000">Rs.40000</option>
                                                <option value="50000">Rs.50000</option>
                                                <option value="70000">Rs.70000</option>
                                                <option value="90000">Rs.90000</option>
                                                <option value="100000">Rs.100000</option>
                                                <option value="200000">Rs.200000</option>
                                                <option value="300000">Rs.300000</option>
                                                <option value="400000">Rs.400000</option>
                                                <option value="500000">Rs.500000</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="HoroscopeSection">
                        <!-- HOROSCOPE SECTION -->
                        <div class="row d-md-none ">
                            <div class="col-lg-4 col-xl-4 col-12">
                                <h4 class="editHeading ps-4 text-center text-lg-start">HOROSCOPE DETAILS</h4>
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label">Time Of Birth</label>
                                    </div>
                                    <div class="col-6">
                                        <select class="form-select p-2 selectBorder" id="birth_hour" name="BirthHour">
                                            <option value="">Hour</option>
                                            <?php
                                            for ($i = 1; $i <= 12; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <select class="form-select p-2 selectBorder" id="birth_minute" name="BirthMinute">
                                            <option value="">Minute</option>
                                            <?php
                                            for ($i = 0; $i <= 59; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label">Date Of Birth (Malayalam)</label>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-select p-2 selectBorder" id="birth_day" name="BirthDay">
                                            <option value="">Day</option>
                                            <?php
                                            for ($i = 1; $i <= 31; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <!-- <input class="form-control" type="text" id="" name="" placeholder="Day"> -->
                                    </div>
                                    <div class="col-4">
                                        <select class="form-select p-2 selectBorder" id="birth_month" name="BirthMonth">
                                            <option value="">Month</option>
                                            <?php
                                            for ($i = 1; $i <= 12; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <!-- <input class="form-control" type="text" id="" name="" placeholder="Month"> -->
                                    </div>
                                    <div class="col-4">
                                        <select class="form-select p-2 selectBorder" id="birth_year" name="BirthYear">
                                            <option value="">Year</option>
                                            <?php
                                            for ($i = 1970; $i <= 2002; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <!-- <input class="form-control" type="text" id="" name="" placeholder="Year"> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label">Place Of Birth</label>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-select selectBorder p-2 Country JobCountry" id="place_of_birth" name="PlaceOfBirth">
                                            <option value="0">Country</option>
                                        </select>
                                        <!-- <input class="form-control" type="text" id="" name="" placeholder="Country"> -->
                                    </div>
                                    <div class="col-4">
                                        <input class="form-control" type="text" id="" name="" placeholder="Region">
                                    </div>
                                    <div class="col-4">
                                        <input class="form-control" type="text" id="" name="" placeholder="Place">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-1">
                                        <label class="form-label">Janma Sista Dasa Details</label>
                                    </div>
                                    <div class="col-lg-3 col-6 mt-2">
                                        <input class="form-control" type="text" id="" name="" placeholder="Janma Sista Dasa">
                                    </div>
                                    <div class="col-lg-3 col-6 mt-2">
                                        <input class="form-control" type="text" id="" name="" placeholder="End Day">
                                    </div>
                                    <div class="col-lg-3 col-6 mt-2">
                                        <input class="form-control" type="text" id="" name="" placeholder="End Month">
                                    </div>
                                    <div class="col-lg-3 col-6 mt-2">
                                        <input class="form-control" type="text" id="" name="" placeholder="End Year">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <!-- <div class="col-xl-2 col-lg-2 col-12 text-center">
                                    <label class="mb-3">Upload Horoscope</label>
                                    <button class="btnUpload mb-3">UPLOAD</button> <br>
                                    <label>Horo.jpg</label>
                                </div> -->
                                </div>
                            </div>

                        </div>

                        <div class="row mt-2">
                            <div class="col-12 d-none d-md-block mt-2">
                                <h4 class="editHeading ps-4  text-center text-lg-start">HOROSCOPE DETAILS</h4>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <div class="col-12 d-none d-md-block ">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label">Time Of Birth</label>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select p-2 selectBorder" id="birth_hour" name="BirthHour">
                                                <option value="">Hour</option>
                                                <?php
                                                for ($i = 1; $i <= 12; $i++) {
                                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <!-- <input class="form-control" type="text" id="" name="" placeholder="Hour"> -->
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select p-2 selectBorder" id="birth_minute" name="BirthMinute">
                                                <option value="">Minute</option>
                                                <?php
                                                for ($i = 0; $i <= 59; $i++) {
                                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <!-- <input class="form-control" type="text" id="" name="" placeholder="Minute"> -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label">Date Of Birth (Malayalam)</label>
                                        </div>
                                        <div class="col-4">
                                            <select class="form-select p-2 selectBorder" id="birth_day" name="BirthDay">
                                                <option value="">Day</option>
                                                <?php
                                                for ($i = 1; $i <= 31; $i++) {
                                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <!-- <input class="form-control" type="text" id="" name="" placeholder="Day"> -->
                                        </div>
                                        <div class="col-4">
                                            <select class="form-select p-2 selectBorder" id="birth_month" name="BirthMonth">
                                                <option value="">Month</option>
                                                <?php
                                                for ($i = 1; $i <= 12; $i++) {
                                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <!-- <input class="form-control" type="text" id="" name="" placeholder="Month"> -->
                                        </div>
                                        <div class="col-4">
                                            <select class="form-select p-2 selectBorder" id="birth_year" name="BirthYear">
                                                <option value="">Year</option>
                                                <?php
                                                for ($i = 1970; $i <= 2002; $i++) {
                                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <!-- <input class="form-control" type="text" id="" name="" placeholder="Year"> -->
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="col-xl-8 col-lg-8 col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label">Place Of Birth</label>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-select py-1 selectBorder Country JobCountry" id="place_of_birth" name="PlaceOfBirth">
                                            <option value="0">Country</option>
                                        </select>
                                        <!-- <input class="form-control" type="text" id="" name="" placeholder="Country"> -->
                                    </div>
                                    <div class="col-4">
                                        <input class="form-control" type="text" id="" name="" placeholder="Region">
                                    </div>
                                    <div class="col-4">
                                        <input class="form-control" type="text" id="" name="" placeholder="Place">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-1 mt-2 mt-md-0">
                                        <label class="form-label">Janma Sista Dasa Details</label>
                                    </div>
                                    <div class="col-lg-6 col-12 mt-2">
                                        <input class="form-control" type="text" id="" name="" placeholder="Janma Sista Dasa">
                                    </div>
                                    <div class="col-lg-2 col-4 mt-2">
                                        <input class="form-control" type="text" id="" name="" placeholder="End Day">
                                    </div>
                                    <div class="col-lg-2 col-4 mt-2">
                                        <input class="form-control" type="text" id="" name="" placeholder="End Month">
                                    </div>
                                    <div class="col-lg-2 col-4 mt-2">
                                        <input class="form-control" type="text" id="" name="" placeholder="End Year">
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-xl-2 col-lg-2 col-12 text-center d-none d-md-block">
                                <label class="mb-3">Upload Horoscope</label>
                                <button class="btnUpload mb-3">UPLOAD</button> <br>
                                <label>Horo.jpg</label>
                            </div> -->
                        </div>

                        <!-- HOROSCOPE SECTION -->
                        <div class="row mt-2">
                            <div class="col-xl-6 col-12">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-12 my-3">
                                        <select class="form-select selectBdr" aria-label="Default select example">
                                            <option>Choose</option>
                                        </select>
                                        <select class="form-select selectBdr" aria-label="Default select example">
                                            <option>Choose</option>
                                        </select>
                                        <select class="form-select selectBdr" aria-label="Default select example">
                                            <option>Choose</option>
                                        </select>
                                        <select class="form-select selectBdr" aria-label="Default select example">
                                            <option>Choose</option>
                                        </select>
                                        <select class="form-select selectBdr" aria-label="Default select example">
                                            <option>Choose</option>
                                        </select>
                                        <select class="form-select selectBdr" aria-label="Default select example">
                                            <option>Choose</option>
                                        </select>
                                        <select class="form-select selectBdr" aria-label="Default select example">
                                            <option>Choose</option>
                                        </select>
                                        <select class="form-select selectBdr" aria-label="Default select example">
                                            <option>Choose</option>
                                        </select>
                                        <select class="form-select selectBdr" aria-label="Default select example">
                                            <option>Choose</option>
                                        </select>
                                        <select class="form-select selectBdr" aria-label="Default select example">
                                            <option>Choose</option>
                                        </select>
                                        <select class="form-select selectBdr" aria-label="Default select example">
                                            <option>Choose</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-8 col-lg-6 col-12">
                                        <div class="row mx-5 my-3">
                                            <div class="col-3 horoscopeBox">12</div>
                                            <div class="col-3 horoscopeBox border-start-0">1</div>
                                            <div class="col-3 horoscopeBox border-start-0 border-end-0">2</div>
                                            <div class="col-3 horoscopeBox">3</div>
                                            <div class="col-3 horoscopeBox border-top-0">11</div>
                                            <div class="col-3"></div>
                                            <div class="col-3"></div>
                                            <div class="col-3 horoscopeBox border-top-0">4</div>
                                            <div class="col-3 horoscopeBox border-top-0 border-bottom-0">10</div>
                                            <div class="col-3"></div>
                                            <div class="col-3"></div>
                                            <div class="col-3 horoscopeBox border-top-0 border-bottom-0">5</div>
                                            <div class="col-3 horoscopeBox">9</div>
                                            <div class="col-3 horoscopeBox border-start-0">8</div>
                                            <div class="col-3 horoscopeBox border-start-0 border-end-0">7</div>
                                            <div class="col-3 horoscopeBox">6</div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-6 col-12">
                                <div class="row">
                                    <div class="  col-xl-4 col-lg-6 col-12 my-3">
                                        <select class=" form-select selectBdr" aria-label="Default select example">
                                            <option>Choose</option>
                                        </select>
                                        <select class="form-select selectBdr" aria-label="Default select example">
                                            <option>Choose</option>
                                        </select>
                                        <select class="form-select selectBdr" aria-label="Default select example">
                                            <option>Choose</option>
                                        </select>
                                        <select class="form-select selectBdr" aria-label="Default select example">
                                            <option>Choose</option>
                                        </select>
                                        <select class="form-select selectBdr" aria-label="Default select example">
                                            <option>Choose</option>
                                        </select>
                                        <select class="form-select selectBdr" aria-label="Default select example">
                                            <option>Choose</option>
                                        </select>
                                        <select class="form-select selectBdr" aria-label="Default select example">
                                            <option>Choose</option>
                                        </select>
                                        <select class="form-select selectBdr" aria-label="Default select example">
                                            <option>Choose</option>
                                        </select>
                                        <select class="form-select selectBdr" aria-label="Default select example">
                                            <option>Choose</option>
                                        </select>
                                        <select class="form-select selectBdr" aria-label="Default select example">
                                            <option>Choose</option>
                                        </select>
                                        <select class="form-select selectBdr" aria-label="Default select example">
                                            <option>Choose</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-8 col-lg-6 col-12">
                                        <div class="row mx-5 my-3">
                                            <div class="col-3 horoscopeBox">12</div>
                                            <div class="col-3 horoscopeBox border-start-0">1</div>
                                            <div class="col-3 horoscopeBox border-start-0 border-end-0">2</div>
                                            <div class="col-3 horoscopeBox">3</div>
                                            <div class="col-3 horoscopeBox border-top-0">11</div>
                                            <div class="col-3"></div>
                                            <div class="col-3"></div>
                                            <div class="col-3 horoscopeBox border-top-0">4</div>
                                            <div class="col-3 horoscopeBox border-top-0 border-bottom-0">10</div>
                                            <div class="col-3"></div>
                                            <div class="col-3"></div>
                                            <div class="col-3 horoscopeBox border-top-0 border-bottom-0">5</div>
                                            <div class="col-3 horoscopeBox">9</div>
                                            <div class="col-3 horoscopeBox border-start-0">8</div>
                                            <div class="col-3 horoscopeBox border-start-0 border-end-0">7</div>
                                            <div class="col-3 horoscopeBox">6</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>






                    <div class="row mt-4 preferenceEditPage">
                        <div class="col-12">
                            <p class="mb-0 py-1">PARTNER PREFERENCE</p>
                        </div>
                    </div>
                    <div class="row editBg mt-4 PartnerPreferenceSection">
                        <div class="col-12 col-xl-6 col-lg-6">
                            <div class="row editPage">
                                <div class="col-4">
                                    <p class="mb-0 py-1">Age </p>
                                </div>
                                <div class="col-4">
                                    <select id="partner_age_from" class="form-select editBg selectBorder">
                                        <option value="0">From</option>
                                        <?php
                                        for ($i = 18; $i <= 80; $i++) {
                                            echo '<option value="' . $i . '">' . $i . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select id="partner_age_to" class="form-select editBg selectBorder">
                                        <option value="0">To</option>
                                        <?php
                                        for ($i = 18; $i <= 80; $i++) {
                                            echo '<option value="' . $i . '">' . $i . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-4">
                                    <p class="mb-0 py-1">Height </p>
                                </div>
                                <div class="col-4">
                                    <select id="partner_height_from" class="form-select editBg selectBorder">
                                        <option value="  ">From</option>
                                        <option value="3 Ft 11 in - 120 cm">3 Ft 11 in - 120 cm</option>
                                        <option value="3 Ft 12 in - 121 cm">3 Ft 12 in - 121 cm</option>
                                        <option value="4 Ft 00 in - 122 cm">4 Ft 0 in - 122 cm</option>
                                        <option value="4 Ft 00 in - 123 cm">4 Ft 0 in - 123 cm</option>
                                        <option value="4 Ft 01 in - 124 cm">4 Ft 1 in - 124 cm</option>
                                        <option value="4 Ft 01 in - 125 cm">4 Ft 1 in - 125 cm</option>
                                        <option value="4 Ft 02 in - 126 cm">4 Ft 2 in - 126 cm</option>
                                        <option value="4 Ft 02 in - 127 cm">4 Ft 2 in - 127 cm</option>
                                        <option value="4 Ft 02 in - 128 cm">4 Ft 2 in - 128 cm</option>
                                        <option value="4 Ft 03 in - 129 cm">4 Ft 3 in - 129 cm</option>
                                        <option value="4 Ft 03 in - 130 cm">4 Ft 3 in - 130 cm</option>
                                        <option value="4 Ft 04 in - 131 cm">4 Ft 4 in - 131 cm</option>
                                        <option value="4 Ft 04 in - 132 cm">4 Ft 4 in - 132 cm</option>
                                        <option value="4 Ft 04 in - 133 cm">4 Ft 4 in - 133 cm</option>
                                        <option value="4 Ft 05 in - 134 cm">4 Ft 5 in - 134 cm</option>
                                        <option value="4 Ft 05 in - 135 cm">4 Ft 5 in - 135 cm</option>
                                        <option value="4 Ft 06 in - 136 cm">4 Ft 6 in - 136 cm</option>
                                        <option value="4 Ft 06 in - 137 cm">4 Ft 6 in - 137 cm</option>
                                        <option value="4 Ft 06 in - 138 cm">4 Ft 6 in - 138 cm</option>
                                        <option value="4 Ft 07 in - 139 cm">4 Ft 7 in - 139 cm</option>
                                        <option value="4 Ft 07 in - 140 cm">4 Ft 7 in - 140 cm</option>
                                        <option value="4 Ft 08 in - 141 cm">4 Ft 8 in - 141 cm</option>
                                        <option value="4 Ft 08 in - 142 cm">4 Ft 8 in - 142 cm</option>
                                        <option value="4 Ft 08 in - 143 cm">4 Ft 8 in - 143 cm</option>
                                        <option value="4 Ft 09 in - 144 cm">4 Ft 9 in - 144 cm</option>
                                        <option value="4 Ft 09 in - 145 cm">4 Ft 9 in - 145 cm</option>
                                        <option value="4 Ft 09 in - 146 cm">4 Ft 9 in - 146 cm</option>
                                        <option value="4 Ft 10 in - 147 cm">4 Ft 10 in - 147 cm</option>
                                        <option value="4 Ft 10 in - 148 cm">4 Ft 10 in - 148 cm</option>
                                        <option value="4 Ft 11 in - 149 cm">4 Ft 11 in - 149 cm</option>
                                        <option value="4 Ft 11 in - 150 cm">4 Ft 11 in - 150 cm</option>
                                        <option value="4 Ft 11 in - 151 cm">4 Ft 11 in - 151 cm</option>
                                        <option value="5 Ft 00 in - 152 cm">5 Ft 0 in - 152 cm</option>
                                        <option value="5 Ft 00 in - 153 cm">5 Ft 0 in - 153 cm</option>
                                        <option value="5 Ft 01 in - 154 cm">5 Ft 1 in - 154 cm</option>
                                        <option value="5 Ft 01 in - 155 cm">5 Ft 1 in - 155 cm</option>
                                        <option value="5 Ft 01 in - 156 cm">5 Ft 1 in - 156 cm</option>
                                        <option value="5 Ft 02 in - 157 cm">5 Ft 2 in - 157 cm</option>
                                        <option value="5 Ft 02 in - 158 cm">5 Ft 2 in - 158 cm</option>
                                        <option value="5 Ft 03 in - 159 cm">5 Ft 3 in - 159 cm</option>
                                        <option value="5 Ft 03 in - 160 cm">5 Ft 3 in - 160 cm</option>
                                        <option value="5 Ft 03 in - 161 cm">5 Ft 3 in - 161 cm</option>
                                        <option value="5 Ft 04 in - 162 cm">5 Ft 4 in - 162 cm</option>
                                        <option value="5 Ft 04 in - 163 cm">5 Ft 4 in - 163 cm</option>
                                        <option value="5 Ft 05 in - 164 cm">5 Ft 5 in - 164 cm</option>
                                        <option value="5 Ft 05 in - 165 cm">5 Ft 5 in - 165 cm</option>
                                        <option value="5 Ft 05 in - 166 cm">5 Ft 5 in - 166 cm</option>
                                        <option value="5 Ft 06 in - 167 cm">5 Ft 6 in - 167 cm</option>
                                        <option value="5 Ft 06 in - 168 cm">5 Ft 6 in - 168 cm</option>
                                        <option value="5 Ft 07 in - 169 cm">5 Ft 7 in - 169 cm</option>
                                        <option value="5 Ft 07 in - 170 cm">5 Ft 7 in - 170 cm</option>
                                        <option value="5 Ft 07 in - 171 cm">5 Ft 7 in - 171 cm</option>
                                        <option value="5 Ft 08 in - 172 cm">5 Ft 8 in - 172 cm</option>
                                        <option value="5 Ft 08 in - 173 cm">5 Ft 8 in - 173 cm</option>
                                        <option value="5 Ft 09 in - 174 cm">5 Ft 9 in - 174 cm</option>
                                        <option value="5 Ft 09 in - 175 cm">5 Ft 9 in - 175 cm</option>
                                        <option value="5 Ft 09 in - 176 cm">5 Ft 9 in - 176 cm</option>
                                        <option value="5 Ft 10 in - 177 cm">5 Ft 10 in - 177 cm</option>
                                        <option value="5 Ft 10 in - 178 cm">5 Ft 10 in - 178 cm</option>
                                        <option value="5 Ft 10 in - 179 cm">5 Ft 10 in - 179 cm</option>
                                        <option value="5 Ft 11 in - 180 cm">5 Ft 11 in - 180 cm</option>
                                        <option value="5 Ft 11 in - 181 cm">5 Ft 11 in - 181 cm</option>
                                        <option value="6 Ft 00 in - 182 cm">6 Ft 0 in - 182 cm</option>
                                        <option value="6 Ft 00 in - 183 cm">6 Ft 0 in - 183 cm</option>
                                        <option value="6 Ft 00 in - 184 cm">6 Ft 0 in - 184 cm</option>
                                        <option value="6 Ft 01 in - 185 cm">6 Ft 1 in - 185 cm</option>
                                        <option value="6 Ft 01 in - 186 cm">6 Ft 1 in - 186 cm</option>
                                        <option value="6 Ft 02 in - 187 cm">6 Ft 2 in - 187 cm</option>
                                        <option value="6 Ft 02 in - 188 cm">6 Ft 2 in - 188 cm</option>
                                        <option value="6 Ft 02 in - 189 cm">6 Ft 2 in - 189 cm</option>
                                        <option value="6 Ft 03 in - 190 cm">6 Ft 3 in - 190 cm</option>
                                        <option value="6 Ft 03 in - 191 cm">6 Ft 3 in - 191 cm</option>
                                        <option value="6 Ft 04 in - 192 cm">6 Ft 4 in - 192 cm</option>
                                        <option value="6 Ft 04 in - 193 cm">6 Ft 4 in - 193 cm</option>
                                        <option value="6 Ft 04 in - 194 cm">6 Ft 4 in - 194 cm</option>
                                        <option value="6 Ft 05 in - 195 cm">6 Ft 5 in - 195 cm</option>
                                        <option value="6 Ft 05 in - 196 cm">6 Ft 5 in - 196 cm</option>
                                        <option value="6 Ft 06 in - 197 cm">6 Ft 6 in - 197 cm</option>
                                        <option value="6 Ft 06 in - 198 cm">6 Ft 6 in - 198 cm</option>
                                        <option value="6 Ft 06 in - 199 cm">6 Ft 6 in - 199 cm</option>
                                        <option value="6 Ft 07 in - 200 cm">6 Ft 7 in - 200 cm</option>
                                        <option value="6 Ft 07 in - 201 cm">6 Ft 7 in - 201 cm</option>
                                        <option value="6 Ft 08 in - 202 cm">6 Ft 8 in - 202 cm</option>
                                        <option value="6 Ft 08 in - 203 cm">6 Ft 8 in - 203 cm</option>
                                        <option value="6 Ft 08 in - 204 cm">6 Ft 8 in - 204 cm</option>
                                        <option value="6 Ft 09 in - 205 cm">6 Ft 9 in - 205 cm</option>
                                        <option value="6 Ft 09 in - 206 cm">6 Ft 9 in - 206 cm</option>
                                        <option value="6 Ft 09 in - 207 cm">6 Ft 9 in - 207 cm</option>
                                        <option value="6 Ft 10 in - 208 cm">6 Ft 10 in - 208 cm</option>
                                        <option value="6 Ft 10 in - 209 cm">6 Ft 10 in - 209 cm</option>
                                        <option value="6 Ft 11 in - 210 cm">6 Ft 11 in - 210 cm</option>
                                        <option value="6 Ft 11 in - 211 cm">6 Ft 11 in - 211 cm</option>
                                        <option value="6 Ft 11 in - 212 cm">6 Ft 11 in - 212 cm</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select id="partner_height_to" class="form-select editBg selectBorder">
                                        <option value="  ">To</option>
                                        <option value="3 Ft 11 in - 120 cm">3 Ft 11 in - 120 cm</option>
                                        <option value="3 Ft 12 in - 121 cm">3 Ft 12 in - 121 cm</option>
                                        <option value="4 Ft 00 in - 122 cm">4 Ft 0 in - 122 cm</option>
                                        <option value="4 Ft 00 in - 123 cm">4 Ft 0 in - 123 cm</option>
                                        <option value="4 Ft 01 in - 124 cm">4 Ft 1 in - 124 cm</option>
                                        <option value="4 Ft 01 in - 125 cm">4 Ft 1 in - 125 cm</option>
                                        <option value="4 Ft 02 in - 126 cm">4 Ft 2 in - 126 cm</option>
                                        <option value="4 Ft 02 in - 127 cm">4 Ft 2 in - 127 cm</option>
                                        <option value="4 Ft 02 in - 128 cm">4 Ft 2 in - 128 cm</option>
                                        <option value="4 Ft 03 in - 129 cm">4 Ft 3 in - 129 cm</option>
                                        <option value="4 Ft 03 in - 130 cm">4 Ft 3 in - 130 cm</option>
                                        <option value="4 Ft 04 in - 131 cm">4 Ft 4 in - 131 cm</option>
                                        <option value="4 Ft 04 in - 132 cm">4 Ft 4 in - 132 cm</option>
                                        <option value="4 Ft 04 in - 133 cm">4 Ft 4 in - 133 cm</option>
                                        <option value="4 Ft 05 in - 134 cm">4 Ft 5 in - 134 cm</option>
                                        <option value="4 Ft 05 in - 135 cm">4 Ft 5 in - 135 cm</option>
                                        <option value="4 Ft 06 in - 136 cm">4 Ft 6 in - 136 cm</option>
                                        <option value="4 Ft 06 in - 137 cm">4 Ft 6 in - 137 cm</option>
                                        <option value="4 Ft 06 in - 138 cm">4 Ft 6 in - 138 cm</option>
                                        <option value="4 Ft 07 in - 139 cm">4 Ft 7 in - 139 cm</option>
                                        <option value="4 Ft 07 in - 140 cm">4 Ft 7 in - 140 cm</option>
                                        <option value="4 Ft 08 in - 141 cm">4 Ft 8 in - 141 cm</option>
                                        <option value="4 Ft 08 in - 142 cm">4 Ft 8 in - 142 cm</option>
                                        <option value="4 Ft 08 in - 143 cm">4 Ft 8 in - 143 cm</option>
                                        <option value="4 Ft 09 in - 144 cm">4 Ft 9 in - 144 cm</option>
                                        <option value="4 Ft 09 in - 145 cm">4 Ft 9 in - 145 cm</option>
                                        <option value="4 Ft 09 in - 146 cm">4 Ft 9 in - 146 cm</option>
                                        <option value="4 Ft 10 in - 147 cm">4 Ft 10 in - 147 cm</option>
                                        <option value="4 Ft 10 in - 148 cm">4 Ft 10 in - 148 cm</option>
                                        <option value="4 Ft 11 in - 149 cm">4 Ft 11 in - 149 cm</option>
                                        <option value="4 Ft 11 in - 150 cm">4 Ft 11 in - 150 cm</option>
                                        <option value="4 Ft 11 in - 151 cm">4 Ft 11 in - 151 cm</option>
                                        <option value="5 Ft 00 in - 152 cm">5 Ft 0 in - 152 cm</option>
                                        <option value="5 Ft 00 in - 153 cm">5 Ft 0 in - 153 cm</option>
                                        <option value="5 Ft 01 in - 154 cm">5 Ft 1 in - 154 cm</option>
                                        <option value="5 Ft 01 in - 155 cm">5 Ft 1 in - 155 cm</option>
                                        <option value="5 Ft 01 in - 156 cm">5 Ft 1 in - 156 cm</option>
                                        <option value="5 Ft 02 in - 157 cm">5 Ft 2 in - 157 cm</option>
                                        <option value="5 Ft 02 in - 158 cm">5 Ft 2 in - 158 cm</option>
                                        <option value="5 Ft 03 in - 159 cm">5 Ft 3 in - 159 cm</option>
                                        <option value="5 Ft 03 in - 160 cm">5 Ft 3 in - 160 cm</option>
                                        <option value="5 Ft 03 in - 161 cm">5 Ft 3 in - 161 cm</option>
                                        <option value="5 Ft 04 in - 162 cm">5 Ft 4 in - 162 cm</option>
                                        <option value="5 Ft 04 in - 163 cm">5 Ft 4 in - 163 cm</option>
                                        <option value="5 Ft 05 in - 164 cm">5 Ft 5 in - 164 cm</option>
                                        <option value="5 Ft 05 in - 165 cm">5 Ft 5 in - 165 cm</option>
                                        <option value="5 Ft 05 in - 166 cm">5 Ft 5 in - 166 cm</option>
                                        <option value="5 Ft 06 in - 167 cm">5 Ft 6 in - 167 cm</option>
                                        <option value="5 Ft 06 in - 168 cm">5 Ft 6 in - 168 cm</option>
                                        <option value="5 Ft 07 in - 169 cm">5 Ft 7 in - 169 cm</option>
                                        <option value="5 Ft 07 in - 170 cm">5 Ft 7 in - 170 cm</option>
                                        <option value="5 Ft 07 in - 171 cm">5 Ft 7 in - 171 cm</option>
                                        <option value="5 Ft 08 in - 172 cm">5 Ft 8 in - 172 cm</option>
                                        <option value="5 Ft 08 in - 173 cm">5 Ft 8 in - 173 cm</option>
                                        <option value="5 Ft 09 in - 174 cm">5 Ft 9 in - 174 cm</option>
                                        <option value="5 Ft 09 in - 175 cm">5 Ft 9 in - 175 cm</option>
                                        <option value="5 Ft 09 in - 176 cm">5 Ft 9 in - 176 cm</option>
                                        <option value="5 Ft 10 in - 177 cm">5 Ft 10 in - 177 cm</option>
                                        <option value="5 Ft 10 in - 178 cm">5 Ft 10 in - 178 cm</option>
                                        <option value="5 Ft 10 in - 179 cm">5 Ft 10 in - 179 cm</option>
                                        <option value="5 Ft 11 in - 180 cm">5 Ft 11 in - 180 cm</option>
                                        <option value="5 Ft 11 in - 181 cm">5 Ft 11 in - 181 cm</option>
                                        <option value="6 Ft 00 in - 182 cm">6 Ft 0 in - 182 cm</option>
                                        <option value="6 Ft 00 in - 183 cm">6 Ft 0 in - 183 cm</option>
                                        <option value="6 Ft 00 in - 184 cm">6 Ft 0 in - 184 cm</option>
                                        <option value="6 Ft 01 in - 185 cm">6 Ft 1 in - 185 cm</option>
                                        <option value="6 Ft 01 in - 186 cm">6 Ft 1 in - 186 cm</option>
                                        <option value="6 Ft 02 in - 187 cm">6 Ft 2 in - 187 cm</option>
                                        <option value="6 Ft 02 in - 188 cm">6 Ft 2 in - 188 cm</option>
                                        <option value="6 Ft 02 in - 189 cm">6 Ft 2 in - 189 cm</option>
                                        <option value="6 Ft 03 in - 190 cm">6 Ft 3 in - 190 cm</option>
                                        <option value="6 Ft 03 in - 191 cm">6 Ft 3 in - 191 cm</option>
                                        <option value="6 Ft 04 in - 192 cm">6 Ft 4 in - 192 cm</option>
                                        <option value="6 Ft 04 in - 193 cm">6 Ft 4 in - 193 cm</option>
                                        <option value="6 Ft 04 in - 194 cm">6 Ft 4 in - 194 cm</option>
                                        <option value="6 Ft 05 in - 195 cm">6 Ft 5 in - 195 cm</option>
                                        <option value="6 Ft 05 in - 196 cm">6 Ft 5 in - 196 cm</option>
                                        <option value="6 Ft 06 in - 197 cm">6 Ft 6 in - 197 cm</option>
                                        <option value="6 Ft 06 in - 198 cm">6 Ft 6 in - 198 cm</option>
                                        <option value="6 Ft 06 in - 199 cm">6 Ft 6 in - 199 cm</option>
                                        <option value="6 Ft 07 in - 200 cm">6 Ft 7 in - 200 cm</option>
                                        <option value="6 Ft 07 in - 201 cm">6 Ft 7 in - 201 cm</option>
                                        <option value="6 Ft 08 in - 202 cm">6 Ft 8 in - 202 cm</option>
                                        <option value="6 Ft 08 in - 203 cm">6 Ft 8 in - 203 cm</option>
                                        <option value="6 Ft 08 in - 204 cm">6 Ft 8 in - 204 cm</option>
                                        <option value="6 Ft 09 in - 205 cm">6 Ft 9 in - 205 cm</option>
                                        <option value="6 Ft 09 in - 206 cm">6 Ft 9 in - 206 cm</option>
                                        <option value="6 Ft 09 in - 207 cm">6 Ft 9 in - 207 cm</option>
                                        <option value="6 Ft 10 in - 208 cm">6 Ft 10 in - 208 cm</option>
                                        <option value="6 Ft 10 in - 209 cm">6 Ft 10 in - 209 cm</option>
                                        <option value="6 Ft 11 in - 210 cm">6 Ft 11 in - 210 cm</option>
                                        <option value="6 Ft 11 in - 211 cm">6 Ft 11 in - 211 cm</option>
                                        <option value="6 Ft 11 in - 212 cm">6 Ft 11 in - 212 cm</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-4">
                                    <p class="mb-0 py-1">Complexion</p>
                                </div>
                                <div class="col-8">
                                    <select id="partner_complexion" class="form-select editBg selectBorder Newselect" placeholder="Choose" multiple>
                                        <option value="Dark">Dark</option>
                                        <option value="Fair">Fair</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Very Fair">Very Fair</option>
                                        <option value="Wheatish">Wheatish</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-4">
                                    <p class="mb-0 py-1">Body Type</p>
                                </div>
                                <div class="col-8">
                                    <select id="partner_body_type" class="form-select editBg selectBorder Newselect" placeholder="Choose" multiple>
                                        <option value="Slim">Slim</option>
                                        <option value="Average">Average</option>
                                        <option value="Athletic">Athletic</option>
                                        <option value="Heavy">Heavy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-4">
                                    <p class="mb-0 py-1">Marital Status</p>
                                </div>
                                <div class="col-8">
                                    <select id="partner_marital_status" class="form-select editBg selectBorder Newselect" placeholder="Choose" multiple>
                                        <option value="Unmarried">Unmarried</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Widow/Widower">Widow/ Widower</option>
                                        <option value="Awaiting Divorce">Awaiting Divorce</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-4">
                                    <p class="mb-0 py-1">Religion</p>
                                </div>
                                <div class="col-8">
                                    <select id="partner_religion" class="form-select editBg selectBorder SelectReligion Newselect" placeholder="Choose" multiple>

                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-4">
                                    <p class="mb-0 py-1">Caste</p>
                                </div>
                                <div class="col-8">
                                    <select id="partner_caste" class="form-select editBg selectBorder SelectCaste Newselect" placeholder="Choose" multiple>

                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-4">
                                    <p class="mb-0 py-1">Caste No Bar</p>
                                </div>
                                <div class="col-5">
                                    <select id="partner_caste_nobar" class="form-select editBg selectBorder">
                                        <option value="">Choose</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-4">
                                    <p class="mb-0 py-1">Type of Jathakam</p>
                                </div>
                                <div class="col-8">
                                    <select id="partner_jathakam" class="form-select editBg selectBorder Newselect" placeholder="Choose" multiple>
                                        <option value="Normal Jadhakam">Normal Jadhakam</option>
                                        <option value="Sudha Jadhakam">Sudha Jadhakam</option>
                                        <option value="Paapa Jadhakam">Paapa Jadhakam</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row preferenceEditPage">
                                <div class="col-12">
                                    <p class="mb-0 py-1">I am Looking For</p>
                                </div>
                            </div>


                        </div>
                        <div class="col-12 col-xl-6 col-lg-6">
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">Matching Stars</p>
                                </div>
                                <div class="col-5">
                                    <select id="matching_stars" class="form-select editBg selectBorder Newselect SelectStar" placeholder="Choose" multiple>

                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">Education Category</p>
                                </div>
                                <div class="col-5">
                                    <select id="partner_edu_category" class="form-select editBg selectBorder ExtendedSelect SelectEdCat" placeholder="Choose" multiple>

                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">Education Type</p>
                                </div>
                                <div class="col-5">
                                    <select id="partner_edu_type" class="form-select editBg selectBorder ExtendedSelect SelectEdType" placeholder="Choose" multiple>

                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">Job Category</p>
                                </div>
                                <div class="col-5">
                                    <select id="partner_job_category" class="form-select editBg selectBorder SelectJobCat ExtendedSelect" placeholder="Choose" multiple>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">Job Type</p>
                                </div>
                                <div class="col-5">
                                    <select id="partner_job_type" class="form-select editBg selectBorder SelectJobType ExtendedSelect" placeholder="Choose" multiple>

                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">Country</p>
                                </div>
                                <div class="col-5">
                                    <select id="partner_country" class="form-select editBg selectBorder Newselect SelectCountry" placeholder="Choose" multiple>

                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">State</p>
                                </div>
                                <div class="col-5">
                                    <select id="partner_state" class="form-select editBg selectBorder Newselect SelectState" placeholder="Choose" multiple>

                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">District</p>
                                </div>
                                <div class="col-5">
                                    <select id="partner_district" class="form-select editBg selectBorder Newselect SelectDistrict" placeholder="Choose" multiple>

                                    </select>
                                </div>
                            </div>
                            <!-- <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">City</p>
                                </div>
                                <div class="col-5">
                                    <select class="form-select editBg selectBorder Newselect" multiple>
                                        
                                    </select>
                                </div>
                            </div> -->
                            <div class="row editPage">
                                <div class="row my-2">

                                    <div class="col-xl-12 col-lg-12 col-12  text-end">
                                        <button type="submit" class="btnlightgreen  px-5 py-1 ms-3 ">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Approve Buttons Section -->
                    <div class="row mb-4 mt-2 justify-content-end">
                        <div class="col-lg-5 col-md-6 col-12">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn BtnUnApprove me-4 ProfileActionBtn" value="2"> <i class="material-icons me-3" style="vertical-align: middle;">thumb_down</i> Un Approve </button>
                                <button type="button" class="btn BtnApprove me-4 ProfileActionBtn" value="1"> <i class="material-icons me-3" style="vertical-align: middle;">thumb_up</i> &nbsp;&nbsp;&nbsp;Approve </button>
                                <div>
                                    <select class="form-select">
                                        <option value="5">5</option>
                                        <option value="4">4</option>
                                        <option value="3">3</option>
                                        <option value="2">2</option>
                                        <option value="1">1</option>
                                        <option value="0">0</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-3 text-start mb-4 mt-4">
                            <button class="btnLightblue me-3 px-4 py-1 AddImagesButton" type="button" value="PROFILE">+ Add Photo</button>
                        </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-4"><button type="button" class="btn BtnEditPage Restore"> <i class="material-icons">restore</i> </br> &nbsp; <span class="EditPageBtnText"> &nbsp;Restore&nbsp;&nbsp; </span> </button></div>
                                        <div class="col-4"><button type="button" class="btn BtnEditPage Delete"> <i class="material-icons">delete</i> </br> &nbsp; <span class="EditPageBtnText"> &nbsp;Delete&nbsp;&nbsp; </span> </button></div>
                                        <div class="col-4"><button type="button" class="btn BtnEditPage Suspend"> <i class="material-icons">power_settings_new</i> </br> &nbsp; <span class="EditPageBtnText"> &nbsp;Suspend&nbsp;&nbsp; </span> </button></div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row justify-content-center">
                                        <div class="col-4"><button type="button" class="btn BtnEditPage Disgrade"> <i class="material-icons ">arrow_circle_down</i> </br> &nbsp; <span class="EditPageBtnText"> Dis&nbsp;Grade </span> </button></div>
                                        <div class="col-4"><button type="button" class="btn BtnEditPage Upgrade"> <i class="material-icons ">arrow_circle_up</i> </br> &nbsp; <span class="EditPageBtnText"> &nbsp;UpGrade&nbsp;&nbsp; </span> </button></div>
                                    </div>
                                </div>
                                <div class="col-4 justify-content-end">
                                    <div class="row justify-content-end">
                                        <div class="col-4"><button type="button" class="btn BtnEditPage Deactive"> <i class="material-icons ">arrow_circle_left</i> </br> &nbsp; <span class="EditPageBtnText"> De&nbsp;Active </span> </button></div>
                                        <div class="col-4"><button type="button" class="btn BtnEditPage Active"> <i class="material-icons ">arrow_circle_right</i> </br> &nbsp; <span class="EditPageBtnText"> &nbsp;&nbsp;Active&nbsp;&nbsp; </span> </button></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="ViewMemberImagesEdit mt-3" id="show_profile_images"></div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-start mb-4 mt-4">
                            <button class="btnLightblue  me-3 px-4 py-1 AddImagesButton" type="button" value="HOROSCOPE">+ Add Horoscope</button>
                        </div>
                        <div class="ViewMemberImagesEdit" id="show_horoscope_images"></div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-start mb-4 mt-4">
                            <button class="btnLightblue  me-3 px-4 py-1 AddImagesButton" type="button" value="IDPROOF">+ Add ID Proof</button>
                        </div>
                        <div class="ViewMemberImagesEdit" id="show_idproof_images"></div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-start mb-4 mt-4">
                            <button class="btnLightblue  me-3 px-4 py-1 AddImagesButton" type="button" value="HOME">+ Add House Photo</button>
                        </div>
                        <div class="ViewMemberImagesEdit" id="show_home_images"></div>
                    </div>








                </form>

                <div class="loader" style="display: none;">
                    <div class="">
                        <img class="img-fluid" src="../IMAGES/matrimony.gif">
                        <h4 class="text-center">LOADING</h4>
                    </div>
                </div>

            </div>

            <!-- <div class="loader">
                <div class="">
                    <img class="img-fluid" src="../IMAGES/matrimony.gif">
                    <h4 class="text-center">LOADING</h4>
                </div>
            </div> -->

        </section>




    </main>

    <!-- <div class="d-flex overflow-scroll w-75">

        <div class="bg-success me-2" style="height:400px;width:400px;"></div>
        <div class="bg-success me-2" style="height:400px;width:400px;"></div>
        <div class="bg-success me-2" style="height:400px;width:400px;"></div>
        <div class="bg-success me-2" style="height:400px;width:400px;"></div>
        <div class="bg-success me-2" style="height:400px;width:400px;"></div>
        <div class="bg-success me-2" style="height:400px;width:400px;"></div>
        <div class="bg-success me-2" style="height:400px;width:400px;"></div>

    </div> -->



    <!-- Footer include -->
    <?php include('../MAIN/Footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- <script src="../JS/LoadData.js"></script> -->

    <script>

        // Initialize flat picker
        $("#dob").flatpickr({
            dateFormat: "Y-m-d",
		    //defaultDate: "today"
        });


        
        // Change number in preferred contact number dropdown
        $(document).on('change', '#whatsapp', function() {
            console.log($(this).val());
            if ($(this).val() != '' || $(this).val() != 0) {
                $('#whatsapp_prefer').prop("hidden", false);
                $('#whatsapp_prefer').text($(this).val()).attr("value", $(this).val());
            } else {
                $('#whatsapp_prefer').prop("hidden", true);
            }
        });


        // Change number in preferred contact number dropdown
        $(document).on('change', '#residence_phone', function() {
            console.log($(this).val());
            if ($(this).val() != '' || $(this).val() != 0) {
                $('#residence_prefer').prop("hidden", false);
                $('#residence_prefer').text($(this).val()).attr("value", $(this).val());
            } else {
                $('#residence_prefer').prop("hidden", true);
            }
        });



        ////////////////// Base Operations /////////////////////

        //Enable virtual select
        VirtualSelect.init({
            ele: '.Newselect',
            //dropboxWidth:'500px',
            //multiple: true
        });

        VirtualSelect.init({
            ele: '.ExtendedSelect',
            dropboxWidth: '500px',
            //multiple: true
        });

        // Function To Only Enter Alphabets
        function isAlfa(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode !== 46 && charCode !== 32) {
                return false;
            }
            return true;
        }


        // Function To Return 0 if value is empty
        function EmptyReturnZero(Value) {
            if (Value == null) {
                Value = 0;
            }
            return Value;
        }


        // Function To Calculate Age
        function CalculateAge() {

            var userDateinput = document.getElementById("dob").value;
            //console.log(userDateinput);

            // convert user input value into date object
            var birthDate = new Date(userDateinput);
            //console.log(" birthDate"+ birthDate);

            // get difference from current date;
            var difference = Date.now() - birthDate.getTime();

            var ageDate = new Date(difference);
            var calculatedAge = Math.abs(ageDate.getUTCFullYear() - 1970);

            return calculatedAge;

            // alert(calculatedAge);
        }


        // Get Current Time In yyyy-mm-dd h:i:s Format
        function getCurrentTime() {

            const currentDate = new Date();
            const year = currentDate.getFullYear();
            const month = String(currentDate.getMonth() + 1).padStart(2, '0');
            const day = String(currentDate.getDate()).padStart(2, '0');
            const hours = String(currentDate.getHours()).padStart(2, '0');
            const minutes = String(currentDate.getMinutes()).padStart(2, '0');
            const seconds = String(currentDate.getSeconds()).padStart(2, '0');

            const formattedDate = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
            return formattedDate;
        }



        //Function To Check Age To and Age From
        function AgeFromToValidation() {
            let FromAge = parseInt($('#partner_age_from').val());
            let AgeTo = parseInt($('#partner_age_to').val());
            if (FromAge > AgeTo) {
                return false;
            } else {
                return true;
            }
        }


        //Function To Check Height To and Height From
        function HeightFromToValidation() {
            let FromHeight = parseInt($('#partner_height_from').val().slice(12, 16));
            let HeightTo = parseInt($('#partner_height_to').val().slice(12, 16));
            // console.log(FromHeight);
            // console.log(HeightTo);
            if (FromHeight > HeightTo) {
                return false;
            } else {
                return true;
            }
        }


        ////////////////// Base Operations /////////////////////



        ///////////////// variable Section /////////////////////

        var Token = '<?= $Token ?>';
        var ApiLink = '<?= $ApiBaseUrl ?>';
        let EmpID = '<?= $EmpID ?>';
        var UpdateId = '<?= $ProfileId ?>';
        var DataType = '<?= $DataType ?>';
        var Package = '<?= $package ?>';
        var Gender = '<?= $gender ?>';
        var ProfileCreated = '<?= $profileFor ?>';
        var Weight = '<?= $weight ?>';
        var Height = '<?= $height ?>';
        var Complexion = '<?= $complexion ?>';
        var BodyType = '<?= $bodyType ?>';
        var MaritalStatus = '<?= $maritalStatus ?>';
        var NoOfChild = '<?= $noofChild ?>';
        var PhysicalStatus = '<?= $physicalStatus ?>';
        var ChovvaDosham = '<?= $chovvaDosham ?>';
        var JathakamType = '<?= $jathakamType ?>';
        var FinancialStatus = '<?= $financialStatus ?>';
        var ResidentialStatus = '<?= $residentialStatus ?>';
        var TimeToCall = '<?= $timeToCall ?>';
        var MonthlyIncome = '<?= $monthlyIncome ?>';
        var GroomLocation = '<?= $groomLocation ?>';
        var PrefferedContactNumber = '<?= $prefferedContactNumber ?>';
        var RelationshipCandidate = '<?= $relationshipCandidate ?>';
        var MarriedBro = '<?= $marriedBro ?>';
        var UnmarriedBro = '<?= $unmarriedBro ?>';
        var MarriedSis = '<?= $marriedSis ?>';
        var UnmarriedSis = '<?= $unmarriedSis ?>';
        var SiblingJobProfile = '<?= $siblingJobProfile ?>';
        var Guardian = '<?= $guardian ?>';
        var FamilyOrigin = '<?= $familyOrigin ?>';
        var FamilyType = '<?= $familyType ?>';
        var HomeType = '<?= $homeType ?>';
        var CandidateShare = '<?= $candidateShare ?>';
        var FamilyValues = '<?= $familyValues ?>';
        var YouOwn = '<?= $youOwn ?>';
        var EatingHabits = "<?= $eatingHabits ?>";
        var DrinkingHabits = "<?= $drinkingHabits ?>";
        var SmokingHabits = "<?= $smokingHabits ?>";
        var ServiceCharge = "<?= $serviceCharge ?>";
        // var LanguagesKnown = "<?= $languagesKnown ?>";
        // var Hobbies = "<?= $Hobbies ?>";
        // var Interests = "<?= $interests ?>";

        var WhatsappNumber = '<?= $whatsappNumber ?>';
        var ResidenceNumber = '<?= $residencePhoneNumber ?>';
        var PrefferedContactNumber = '<?= $prefferedContactNumber ?>';
        var MotherTongue = '<?= $MotherTongue ?>';
        var Religion = '<?= $Religion ?>';
        var Caste = '<?= $Caste ?>';
        var SubCaste = '<?= $SubCaste ?>';
        var Star = '<?= $Star ?>';
        var EducationCategory = '<?= $EducationCategory ?>';
        var EducationType = '<?= $EducationType ?>';
        var JobCategory = '<?= $JobCategory ?>';
        var JobType = '<?= $JobType ?>';
        var JobCountry = '<?= $JobCountry ?>';
        var JobState = '<?= $JobState ?>';
        var JobDistrict = '<?= $JobDistrict ?>';
        var JobCity = '<?= $JobCity ?>';
        var FatherEducation = '<?= $FatherEducation ?>';
        var FatherJob = '<?= $FatherJob ?>';
        var MotherEducation = '<?= $MotherEducation ?>';
        var MotherJob = '<?= $MotherJob ?>';
        var Country = '<?= $Country ?>';
        var State = '<?= $State ?>';
        var District = '<?= $District ?>';
        var City = '<?= $City ?>';
        var Hobbies = '<?= $Hobbies ?>';
        var HobbiesArray = Hobbies.split(",");
        var Languages = '<?= $languagesKnown ?>';
        var LanguagesArray = Languages.split(",");
        var Interests = '<?= $interests ?>';
        var InterestsArray = Interests.split(",");

        var PartnerHeightFrom = '<?= $PartnerHeightFrom ?>';
        var PartnerAgeFrom = '<?= $PartnerAgeFrom ?>';
        var PartnerHeightTo = '<?= $PartnerHeightTo ?>';
        var PartnerAgeTo = '<?= $PartnerAgeTo ?>';
        var PartnerReligion = '<?= $PartnerReligion ?>';
        var PartnerReligionArray = PartnerReligion.split(",");
        var PartnerStar = '<?= $PartnerStar ?>';
        var PartnerStarArray = PartnerStar.split(",");
        var PartnerEdCat = '<?= $PartnerEdCat ?>';
        var PartnerEdCatArray = PartnerEdCat.split(",");
        var PartnerJobCat = '<?= $PartnerJobCat ?>';
        var PartnerJobCatArray = PartnerJobCat.split(",");
        var PartnerJobType = '<?= $PartnerJobType ?>';
        var PartnerJobTypeArray = PartnerJobType.split(",");
        var PartnerCountry = '<?= $PartnerCountry ?>';
        var PartnerCountryArray = PartnerCountry.split(",");
        var PartnerCaste = '<?= $PartnerCaste ?>';
        var PartnerCasteArray = PartnerCaste.split(",");
        var PartnerEdType = '<?= $PartnerEdType ?>';
        var PartnerEdTypeArray = PartnerEdType.split(",");
        var PartnerState = '<?= $PartnerState ?>';
        var PartnerStateArray = PartnerState.split(",");
        var PartnerDistrict = '<?= $PartnerDistrict ?>';
        var PartnerDistrictArray = PartnerDistrict.split(",");
        var PartnerJathakam = '<?= $PartnerJathakam ?>';
        var PartnerJathakamArray = PartnerJathakam.split(",");
        var PartnerComplexion = '<?= $PartnerComplexion ?>';
        var PartnerComplexionArray = PartnerComplexion.split(",");
        var PartnerBodyType = '<?= $PartnerBodyType ?>';
        var PartnerBodyTypeArray = PartnerBodyType.split(",");
        var PartnerMaritalStatus = '<?= $PartnerMaritalStatus ?>';
        var PartnerMaritalStatusArray = PartnerMaritalStatus.split(",");



        ///////////////// variable Section /////////////////////



        //////////////////// Show Data in multiple select fields   ///////////////////////////     


        ShowStar(PartnerStarArray);
        ShowReligion(PartnerReligionArray);
        ShowEducationCat(PartnerEdCatArray);
        ShowJobCat(PartnerJobCatArray);
        ShowCountry(PartnerCountryArray);
        ShowJobType(PartnerJobTypeArray);

        console.log(NoOfChild,"helloo");
        $("#gender").val(Gender).change();
        $("#profile_created").val(ProfileCreated).change();
        $("#height").val(Height).change();
        $("#weight").val(Weight).change();
        $("#complexion").val(Complexion).change();
        $("#body_type").val(BodyType).change();
        $("#no_of_child").val(NoOfChild).change();
        $("#matrial_status").val(MaritalStatus).change();
        $("#phys_status").val(PhysicalStatus).change();
        $("#chovva_dosham").val(ChovvaDosham).change();
        $("#type_jathakam").val(JathakamType).change();
        $("#financial_status").val(FinancialStatus).change();
        $("#residential_status").val(ResidentialStatus).change();
        $("#preferred_time").val(TimeToCall).change();
        $("#monthly_income").val(MonthlyIncome).change();
        $("#service_charge").val(ServiceCharge).change();
        
        // $("#financial_status").val(GroomLocation).change();
        // $("#financial_status").val(PrefferedContactNumber).change(); 
        $("#relationshipcandidate").val(RelationshipCandidate).change();
        $("#married_brothers").val(MarriedBro).change();
        $("#unmarried_brothers").val(UnmarriedBro).change();
        $("#married_sister").val(MarriedSis).change();
        $("#unmarried_sisters").val(UnmarriedSis).change();
        // $("#financial_status").val(SiblingJobProfile).change();
        // $("#financial_status").val(Guardian).change();
        //$("#financial_status").val(FamilyOrigin).change();
        $("#family_type").val(FamilyType).change();
        $("#home_type").val(HomeType).change();
        // $("#financial_status").val(CandidateShare).change();
        $("#family_values").val(FamilyValues).change();
        // $("#financial_status").val(YouOwn).change();
        $("#eating_habits").val(EatingHabits).change();
        $("#drinking_habits").val(DrinkingHabits).change();
        $("#smoking_habits").val(SmokingHabits).change();
        // $("#language_known").val(LanguagesKnown).change();
        // $("#hobbies").val(Hobbies).change();
        // $("#interests").val(Interests).change();


        $("#partner_age_from").val(PartnerAgeFrom).change();
        $("#partner_age_to").val(PartnerAgeTo).change();
        $("#partner_height_from").val(PartnerHeightFrom).change();
        $("#partner_height_to").val(PartnerHeightTo).change();
        document.querySelector("#partner_jathakam").setValue(PartnerJathakamArray);
        document.querySelector("#partner_complexion").setValue(PartnerComplexionArray);
        document.querySelector("#partner_body_type").setValue(PartnerBodyTypeArray);
        document.querySelector("#partner_marital_status").setValue(PartnerMaritalStatusArray);
        document.querySelector("#language_known").setValue(LanguagesArray);
        document.querySelector("#hobbies").setValue(HobbiesArray);
        document.querySelector("#interests").setValue(InterestsArray);

        if (WhatsappNumber != 0) {
            $('#whatsapp_prefer').prop("hidden", false);
            $('#whatsapp_prefer').text(WhatsappNumber).attr("value", WhatsappNumber);
        } else {
            $('#whatsapp_prefer').prop("hidden", true);
        }

        if (ResidenceNumber != 0) {
            $('#residence_prefer').prop("hidden", false);
            $('#residence_prefer').text(ResidenceNumber).attr("value", ResidenceNumber);
        } else {
            $('#residence_prefer').prop("hidden", true);
        }


        $('#preferred_contact').val(PrefferedContactNumber).change();







        // Get all religion
        function ShowReligion(SelectedReligions = [0]) {
            var GetReligion = "FetchReligion";
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetReligion: GetReligion
                },
                success: function(data) {
                    //console.log('Religion');
                    //console.log(SelectedReligions);
                    var ResultReligionData = JSON.parse(data);
                    document.querySelector(".SelectReligion").setOptions(ResultReligionData);
                    document.querySelector(".SelectReligion").setValue(SelectedReligions);
                    ShowMultipleCastes(SelectedReligions, PartnerCasteArray);
                },
            });
        }


        //Get all star
        function ShowStar(SelectedStarsArray = [0]) {
            var GetStar = "FetchStar";
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetStar: GetStar,
                },
                success: function(data) {
                    //console.log('star');
                    //console.log(data);
                    var ResultStarData = JSON.parse(data);
                    document.querySelector(".SelectStar").setOptions(ResultStarData);
                    document.querySelector(".SelectStar").setValue(SelectedStarsArray);
                },
            });
        }


        //Get all education categories
        function ShowEducationCat(SelectedEduCatArray = [0]) {
            var GetEducationCat = "FetchEducationCat";
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetEducationCat: GetEducationCat,
                },
                success: function(data) {
                    //console.log(data);
                    var ResultEducationCatData = JSON.parse(data);
                    document.querySelector(".SelectEdCat").setOptions(ResultEducationCatData);
                    document.querySelector(".SelectEdCat").setValue(SelectedEduCatArray);
                    ShowMultipleEduType(SelectedEduCatArray, PartnerEdTypeArray);
                },
            });
        }


        //Get all job categories
        function ShowJobCat(SelectedJobCatArray = [0]) {
            var GetJobCat = "FetchJobCat";
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetJobCat: GetJobCat,
                },
                success: function(data) {
                    //console.log('Job cat');
                    //console.log(data);
                    var ResultJobCatData = JSON.parse(data);
                    document.querySelector(".SelectJobCat").setOptions(ResultJobCatData);
                    document.querySelector(".SelectJobCat").setValue(SelectedJobCatArray);
                },
            });
        }


        //Get all job types
        function ShowJobType(SelectedJobTypeArray = [0]) {
            var GetJobTypes = "FetchJobType";
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetJobTypes: GetJobTypes,
                },
                success: function(data) {
                    //console.log('Job cat');
                    //console.log(data);
                    var ResultJobTypeData = JSON.parse(data);
                    document.querySelector(".SelectJobType").setOptions(ResultJobTypeData);
                    document.querySelector(".SelectJobType").setValue(SelectedJobTypeArray);
                },
            });
        }


        //Get all country
        function ShowCountry(PartnerCountryArray = [0]) {
            var GetCountry = "FetchCountry";
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetCountry: GetCountry,
                },
                success: function(data) {
                    //console.log('country');
                    //console.log(data);
                    var ResultCountryData = JSON.parse(data);
                    document.querySelector(".SelectCountry").setOptions(ResultCountryData);
                    document.querySelector(".SelectCountry").setValue(PartnerCountryArray);
                    ShowMultipleStates(PartnerCountryArray, PartnerStateArray);
                },
            });
        }


        //Show All Castes
        function ShowMultipleCastes(ReligionId, SelectedCastesArray = [0]) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    ReligionId: ReligionId,
                },
                success: function(data) {
                    //console.log(data);
                    var ResultCasteData = JSON.parse(data);
                    document.querySelector(".SelectCaste").setOptions(ResultCasteData);
                    document.querySelector(".SelectCaste").setValue(SelectedCastesArray);
                },
            });
        }


        //Show All Education Types
        function ShowMultipleEduType(EdCatId, SelectedEdTypesArray = [0]) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    EdCatId: EdCatId,
                },
                success: function(data) {
                    //console.log(data);
                    var ResultEdTypeData = JSON.parse(data);
                    document.querySelector(".SelectEdType").setOptions(ResultEdTypeData);
                    document.querySelector(".SelectEdType").setValue(SelectedEdTypesArray);
                },
            });
        }


        //Show All States
        function ShowMultipleStates(CountryId, SelectedStatesArray = [0]) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    CountryId: CountryId
                },
                success: function(data) {
                    //console.log(data);
                    var ResultStateData = JSON.parse(data);
                    document.querySelector('.SelectState').setOptions(ResultStateData);
                    document.querySelector(".SelectState").setValue(SelectedStatesArray);
                    ShowMultipleDistricts(SelectedStatesArray, PartnerDistrictArray);
                }
            });
        }


        //Show All Districts
        function ShowMultipleDistricts(StateId, SelectedDistrictsArray = [0]) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    StateId: StateId
                },
                success: function(data) {
                    //console.log(data);
                    var ResultDistrictData = JSON.parse(data);
                    document.querySelector('.SelectDistrict').setOptions(ResultDistrictData);
                    document.querySelector(".SelectDistrict").setValue(SelectedDistrictsArray);
                }
            });
        }


        //Select caste based on religion
        $(document).on("click", ".SelectReligion", function() {
            $(this).change(function() {
                var ReligionId = $(this).val();
                if (ReligionId == "") {
                    ReligionId = 0;
                }
                ShowMultipleCastes(ReligionId);
            });
        });



        //Select education type based on education category
        $(document).on("click", ".SelectEdCat", function() {
            $(this).change(function() {
                var EdCatId = $(this).val();
                if (EdCatId.length === 0) {
                    EdCatId.push(0);
                } else {
                    //EdCatId.pop(0);
                }
                ShowMultipleEduType(EdCatId);
            });
        });


        //Select State based on country
        $(document).on("click", ".SelectCountry", function() {
            $(this).change(function() {
                var CountryId = $(this).val();
                if (CountryId.length === 0) {
                    CountryId.push(0);
                }
                //console.log(CountryId);
                ShowMultipleStates(CountryId);
            });
        });


        //Select District based on State
        $(document).on("click", ".SelectState", function() {
            $(this).change(function() {
                var StateId = $(this).val();
                if (StateId.length === 0) {
                    StateId.push(0);
                }
                // console.log(StateId);
                ShowMultipleDistricts(StateId);
            });
        });



        //////////////////// Show Data in multiple select fields   ///////////////////////////     



        /////////////////  Calling Functions   //////////////////

        ShowPackage(Package);
        ShowMothertongue(MotherTongue);
        ShowAllReligion(Religion);
        ShowAllStar(Star);
        ShowAllEducationCat(EducationCategory);
        ShowAllJobCat(JobCategory);
        ShowAllCountry(JobCountry, 'JobCountry');
        ShowAllJobType(JobType, 'JobTypes');
        ShowAllJobType(FatherJob, 'FatherJobType');
        ShowAllJobType(MotherJob, 'MotherJobType');
        ShowAllEduTypes('FatherEducation', FatherEducation);
        ShowAllEduTypes('MotherEducation', MotherEducation);
        ShowAllCountry(Country, 'CandidateCountry');
        ViewImages('Profile', 'show_profile_images', UpdateId, DataType);
        ViewImages('Horoscope', 'show_horoscope_images', UpdateId, DataType);
        ViewImages('IdProof', 'show_idproof_images', UpdateId, DataType);
        ViewImages('Home', 'show_home_images', UpdateId, DataType);


        /////////////////  Calling Functions   //////////////////



        ///////////////// Profile update operations  ////////////


        //List Package
        function ShowPackage(Package) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetPackage: 'fetch_package'
                },
                success: function(data) {
                    console.log(data);
                    $('.ShowPackage').html(data);
                    $('.ShowPackage').val(Package).change();
                }
            });
        }


        //List Mothertongue
        function ShowMothertongue(MotherTongue) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetMothertongue: 'fetch_motherTongue'
                },
                success: function(data) {
                    //console.log(data);
                    $('.ShowMothertongue').html(data);
                    $('.ShowMothertongue').val(MotherTongue).change();
                }
            });
        }


        //List Religion
        function ShowAllReligion(Religion) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllReligion: 'fetch_all_religion'
                },
                success: function(data) {
                    //console.log(data);
                    $('.ShowReligion').html(data);
                    $('.ShowReligion').val(Religion).change();
                }
            });
        }



        //List Education Category
        function ShowAllEducationCat(EducationCategory) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllEducationCat: 'fetch_all_education_cat'
                },
                success: function(data) {
                    //console.log(data);
                    $('.ShowEduCat').html(data);
                    $('.ShowEduCat').val(EducationCategory).change();
                }
            });
        }


        //List Star
        function ShowAllStar(Star) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllStar: 'fetch_AllStar'
                },
                success: function(data) {
                    //console.log(data);
                    $('.ShowAllStar').html(data);
                    $('.ShowAllStar').val(Star).change();
                }
            });
        }


        //List Job Category
        function ShowAllJobCat(JobCategory) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllJobCat: 'fetch_AllJobCat'
                },
                success: function(data) {
                    //console.log(data);
                    $('.ShowJobCategory').html(data);
                    $('.ShowJobCategory').val(JobCategory).change();
                }
            });
        }



        //List Job Type
        function ShowAllJobType(JobType, ClassName) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllJobType: 'fetch_AllJobType'
                },
                success: function(data) {
                    //console.log(data);
                    $('.' + ClassName).html(data);
                    $('.' + ClassName).val(JobType).change();
                }
            });
        }


        //List Country
        function ShowAllCountry(Country, ClassName) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllCountry: 'fetch_AllCountry'
                },
                success: function(data) {
                    //console.log(data);
                    $('.' + ClassName).html(data);
                    $('.' + ClassName).val(Country).change();
                }
            });
        }


        //List Caste by Religion
        function ShowAllCaste(Religion, Caste) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllCaste: Religion
                },
                success: function(data) {
                    //console.log(data);
                    $('.ShowCaste').html(data);
                    $('.ShowCaste').val(Caste).change();
                }
            });
        }


        //Show Subcaste by Caste
        function ShowAllSubCaste(Caste, SubCaste) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllSubCaste: Caste
                },
                success: function(data) {
                    //console.log(data);
                    $('.ShowSubCaste').html(data);
                    $('.ShowSubCaste').val(SubCaste).change();
                }
            });
        }


        //Show Education Type By Education Category
        function ShowAllEduType(EduCat, EducationType) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllEduType: EduCat
                },
                success: function(data) {
                    console.log(EducationType);
                    $('.ShowEduType').html(data);
                    $('.ShowEduType').val(EducationType).change();
                }
            });
        }


        //Show Education Type 
        function ShowAllEduTypes(ClassName, EducationType) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllEduTypes: 'fetch_AllEduType'
                },
                success: function(data) {
                    //console.log(data);
                    $('.' + ClassName).html(data);
                    $('.' + ClassName).val(EducationType).change();
                }
            });
        }


        //List State By Country 
        function ShowAllState(Country, ClassName, State) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllState: Country
                },
                success: function(data) {
                    //console.log(data);
                    $('.' + ClassName).html(data);
                    $('.' + ClassName).val(State).change();
                }
            });
        }


        //List District By State
        function ShowAllDistrict(State, ClassName, District) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllDistrict: State
                },
                success: function(data) {
                    //console.log(data);
                    $('.' + ClassName).html(data);
                    $('.' + ClassName).val(District).change();
                }
            });
        }


        //List City By District By City
        function ShowAllCity(District, ClassName, City) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllCity: District
                },
                success: function(data) {
                    //console.log(data);
                    $('.' + ClassName).html(data);
                    $('.' + ClassName).val(City).change();
                }
            });
        }



        //Change Caste By Religion
        $('.ShowReligion').change(function() {
            var ReligionId = $(this).val();
            ShowAllCaste(ReligionId, Caste);
        });


        //Change Subcaste By Caste
        $('.ShowCaste').change(function() {
            var CasteId = $(this).val();
            ShowAllSubCaste(CasteId, SubCaste);
        });


        //Change Education Type By Education Category
        $('.ShowEduCat').change(function() {
            var EduCatId = $(this).val();
            ShowAllEduType(EduCatId, EducationType);
        });



        //Change Job State By Country
        $('.JobCountry').change(function() {
            var CountryId = $(this).val();
            ShowAllState(CountryId, 'JobState', JobState);
        });



        //Change Job District By State
        $('.JobState').change(function() {
            var StateId = $(this).val();
            ShowAllDistrict(StateId, 'JobDistrict', JobDistrict);
        });



        //Change Job City By District
        $('.JobDistrict').change(function() {
            var DistrictId = $(this).val();
            console.log(DistrictId);
            ShowAllCity(DistrictId, 'JobCity', JobCity);
        });



        //Change  State By Country
        $('.CandidateCountry').change(function() {
            var CountryId = $(this).val();
            ShowAllState(CountryId, 'CandidateState', State);
        });



        //Change  District By State
        $('.CandidateState').change(function() {
            var StateId = $(this).val();
            ShowAllDistrict(StateId, 'CandidateDistrict', District);
        });



        //Change  City By District
        $('.CandidateDistrict').change(function() {
            var DistrictId = $(this).val();
            console.log(DistrictId);
            ShowAllCity(DistrictId, 'CandidateCity', City);
        });


        ///////////////// Profile Update operations  ////////////



        //////////////// Profile  Update  /////////////////////


        //Free Register Customer
        $('#UpdateCustomer').submit(function(e) {
            e.preventDefault();

            $('.loader').show();
            $('.RegisterForm').hide();

            //console.log($('#partner_height_to').val());

            if (isNaN(CalculateAge()) == true) {
                toastr.error("Please Choose Age!");
                return false;
            } else if (CalculateAge() < 18) {
                toastr.error("Age Should Be Greater Than 18 !");
                return false;
            }


            if ($('#partner_age_to').val() != 0 && $('#partner_age_from').val() != 0) {
                console.log(AgeFromToValidation());
                if (AgeFromToValidation() == false) {
                    toastr.error("Age To Cannot be Less Than Age From !");
                    return false;
                }
            }

            if ($('#partner_height_to').val() != 0 && $('#partner_height_from').val() != 0 && $('#partner_height_to').val() != null && $('#partner_height_from').val() != null) {
                console.log(HeightFromToValidation());
                if (HeightFromToValidation() == false) {
                    toastr.error("Height To Cannot be Less Than Height From !");
                    return false;
                }
            }


            var UpdateRoute = '';

            switch (DataType) {
                case 'FD':
                    UpdateRoute = "customer";
                    break;
                case 'PD':
                    UpdateRoute = "paidcustomer";
                    break;
                case 'WD':
                    UpdateRoute = "weddingcustomer";
                    break;
                case 'MD':
                    UpdateRoute = "marriagecustomer";
                    break;
            }

            var UpdateUrl = ApiLink + "/api/" + UpdateRoute + "/update/" + UpdateId;

            //console.log(EmptyReturnZero($('#cast').val()));

            $.ajax({
                url: UpdateUrl,
                method: "PUT",
                async: true,
                crossDomain: true,
                headers: {
                    "Accept": "application/json",
                    "Authorization": "Bearer " + Token,
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                data: {
                    "profileId": $('#profile_id').val(),
                    "gender": $('#gender').val(),
                    "fullName": $('#profile_name').val(),
                    "package": $('#package').val(),
                    "status": 0,
                    "dob": $('#dob').val(),
                    "age": 0,
                    "height": $('#height').val(),
                    "weight": $('#weight').val(),
                    "complexion": $('#complexion').val(),
                    "bodyType": $('#body_type').val(),
                    "maritalStatus": $('#matrial_status').val(),
                    "physicalStatus": $('#phys_status').val(),
                    "nativePlace": $('#native_place').val(),
                    "religion": EmptyReturnZero($('#religion').val()),
                    "caste": EmptyReturnZero($('#cast').val()),
                    "subCaste": EmptyReturnZero($('#sub_caste').val()),
                    "email": $('#email').val(),
                    "star": EmptyReturnZero($('#star').val()),
                    "chovvaDosham": $('#chovva_dosham').val(),
                    "jathakamType": $('#type_jathakam').val(),
                    "educationCat": EmptyReturnZero($('#education_category').val()),
                    "educationType": EmptyReturnZero($('#education_type').val()),
                    "jobCat": EmptyReturnZero($('#job_category').val()),
                    "jobType": EmptyReturnZero($('#job_type').val()),
                    "jobLocCountry": EmptyReturnZero($('#job_location_country').val()),
                    "jobLocState": EmptyReturnZero($('#job_location_state').val()),
                    "jobLocDistrict": EmptyReturnZero($('#job_location_district').val()),
                    "jobLocCity": EmptyReturnZero($('#job_location_city').val()),
                    "monthlyIncome": $('#monthly_income').val(),
                    "financialStatus": $('#financial_status').val(),
                    "registeredNumber": 0,
                    "whatsappNumber": EmptyReturnZero($('#whatsapp').val()),
                    "residencePhoneNumber": EmptyReturnZero($('#residence_phone').val()),
                    "contactPerson": $('#contact_person').val(),
                    "noofChild": $('#no_of_child').val(),
                    "casteNoBar": $('#caste_no_bar').val(),
                    "eduDetails": $('#education_details').val(),
                    "jobDetails": $('#job_detail').val(),
                    "motherTongue": $('#mother_tongue').val(),
                    "profileFor": $('#profile_created').val(),
                    "bloodGroup": $('#blood_group').val(),
                    "ParishEdavakaSNDPNSSMahal": $('#parish_mahal').val(),
                    "hopingToMarry": $('#marriage_plan').val(),
                    "communicationAddress": $('#communication_address').val(),
                    "address": $('#profile_created').val(),
                    "permanentAddress": $('#communication_address').val(),
                    "country": EmptyReturnZero($('#country').val()),
                    "state": EmptyReturnZero($('#state').val()),
                    "district": EmptyReturnZero($('#district').val()),
                    "city": EmptyReturnZero($('#city').val()),
                    "residentialStatus": $('#residential_status').val(),
                    "timeToCall": $('#preferred_time').val(),
                    "yearlyIncome": "",
                    "groomLocation": EmptyReturnZero($('#city').val()),
                    "prefferedContactNumber": EmptyReturnZero($('#preferred_contact').val()),
                    "relationshipCandidate": $('#relationshipcandidate').val(),
                    "fatherName": $('#father_name').val(),
                    "fatherEducation": EmptyReturnZero($('#father_education').val()),
                    "fatherJob": EmptyReturnZero($('#father_job').val()),
                    "fatherJobDetail": $('#father_job_details').val(),
                    "motherName": $('#mother_name').val(),
                    "motherEducation": EmptyReturnZero($('#mother_education').val()),
                    "motherJob": EmptyReturnZero($('#mother_job').val()),
                    "motherJobDetail": $('#mother_job_detail').val(),
                    "marriedBro": $('#married_brothers').val(),
                    "unmarriedBro": $('#unmarried_brothers').val(),
                    "marriedSis": $('#married_sister').val(),
                    "unmarriedSis": $('#unmarried_sisters').val(),
                    "siblingJobProfile": $('#job_sibling').val(),
                    "guardian": $('#guardian').val(),
                    "familyOrigin": $('#family_orgin').val(),
                    "familyType": $('#family_type').val(),
                    "homeType": $('#home_type').val(),
                    "candidateShare": $('#candidates_share').val(),
                    "familyValues": $('#family_values').val(),
                    "youOwn": $('#candidates_share').val(),
                    "eatingHabits": $('#eating_habits').val(),
                    "drinkingHabits": $('#drinking_habits').val(),
                    "smokingHabits": $('#smoking_habits').val(),
                    "languagesKnown": $('#language_known').val().join(),
                    "Hobbies": $('#hobbies').val().join(),
                    "interests": $('#interests').val().join(),
                    "blog": $('#blog').val(),
                    "socialMediaLink": $('#link_social').val(),
                    "horoscopeDetails": "",
                    "birthHour": "",
                    "birthMinute": "",
                    "birthPlace": "",
                    "malayalamDob": "",
                    "janmaSistaDasa": "",
                    "janmaSistaDasaEnd": "",
                    "horoscopeFile": "",
                    "partnerAgeFrom": $('#partner_age_from').val(),
                    "partnerAgeTo": $('#partner_age_to').val(),
                    "partnerHeightFrom": $('#partner_height_from').val(),
                    "partnerHeightTo": $('#partner_height_to').val(),
                    "partnerComplexion": $('#partner_complexion').val().join(),
                    "partnerBodyType": $('#partner_body_type').val().join(),
                    "partnerMaritalStatus": $('#partner_marital_status').val().join(),
                    "partnerPhysicalStatus": "",
                    "partnerFamilyStatus": "",
                    "partnerReligion": $('#partner_religion').val().join(),
                    "partnerCaste": $('#partner_caste').val().join(),
                    "partnerCasteNoBar": $('#partner_caste_nobar').val(),
                    "matchingStars": $('#matching_stars').val().join(),
                    "partnerEduCat": $('#partner_edu_category').val().join(),
                    "partnerEduType": $('#partner_edu_type').val().join(),
                    "partnerJathakam": $('#partner_jathakam').val().join(),
                    "partnerJobCat": $('#partner_job_category').val().join(),
                    "partnerJobType": $('#partner_job_type').val().join(),
                    "annualIncome": "",
                    "partnerCountry": $('#partner_country').val().join(),
                    "partnerState": $('#partner_state').val().join(),
                    "partnerDistrict": $('#partner_district').val().join(),
                    "partnerCity": "",
                    "lookingFor": "",
                    "aboutCandidate": $('#about_myself').val(),
                    "photo1": "",
                    "photo2": "",
                    "photo3": "",
                    "photo4": "",
                    "photo5": "",
                    "photo6": "",
                    "photo7": "",
                    "photo8": "",
                    "photo9": "",
                    "photo10": "",
                    "horoscope1": "",
                    "horoscope2": "",
                    "horoscope3": "",
                    "horoscope4": "",
                    "horoscope5": "",
                    "idProof1": "",
                    "idProof2": "",
                    "idProof3": "",
                    "idProof4": "",
                    "idProof5": "",
                    "home1": "",
                    "home2": "",
                    "home3": "",
                    "home4": "",
                    "home5": "",
                    "updatedBy": EmpID,
                    "updatedDate": getCurrentTime(),
                    "aboutFamily": $('#about_family').val(),
                    "serviceCharge": $('#service_charge').val(),
                },

                beforeSend: function() {
                    //$('#SaveCustomer')[0].reset();
                    $('.loader').show();
                    $('.RegisterForm').hide();
                },
                success: function(data) {
                    console.log(data);
                    $('.RegisterForm').show();
                    $('.loader').hide();
                    var FreeCustomerResponse = data;
                    if (FreeCustomerResponse.Status == true) {
                        // toastr.success('Successfully Updated Customer');
                        // location.replace('Lapview.php');
                        $('#btnClose').hide();
                        $('#btnConfirm').show();
                        $('#ResponseImage').html('<img src="./success.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                        $('#ResponseText').text('Profile Updated Successfully');
                        $('#confirmModal').modal('show');
                    } else if (FreeCustomerResponse.Status == false) {
                        toastr.error(FreeCustomerResponse.message);
                    } else {
                        toastr.error('Failed Adding Customer');
                    }
                },
                // cache: false,
                // processData: false,
                // contentType: false,
            });

        });


        // Click To Refresh Page
        $(document).on('click', '#btnConfirm', function() {
            location.replace('Lapview.php');
        });

        //////////////// Profile  Update  /////////////////////



        ///////////////// Profile Actions //////////////////////

        // Profile Approval Actions
        $(document).on('click', '.ProfileActionBtn', function() {
            var ProfileChangeDataType = DataType;
            var ProfileAction = $(this).val();
            var ProfileList = [];
            ProfileList.push(UpdateId);
            console.log(ProfileList.length);
            if (ProfileList.length == 0) {
                toastr.warning("Please try again!");
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    url: "FilterExtras.php",
                    data: {
                        ProfileAction: ProfileAction,
                        ProfileList: ProfileList,
                        StatusChangeData: ProfileChangeDataType
                    },
                    success: function(data) {
                        console.log(data);
                        //$("#member_receive").val('');
                        var ProfileActionResponse = JSON.parse(data);
                        if (ProfileActionResponse.ProfileAction == 1) {
                            location.reload();
                            if (ProfileAction == 1) {
                                toastr.success("Approved this profile");
                            } else if (ProfileAction == 2) {
                                toastr.success("Un Approved this profiles");
                            }
                        } else if (ProfileActionResponse.ProfileAction == 0) {
                            toastr.warning("Please try again!");
                        } else {
                            if (ProfileAction == 1) {
                                toastr.error("Failed approving profile , please try again!");
                            } else if (ProfileAction == 2) {
                                toastr.error("Failed un approving profile , please try again!");
                            }

                        }
                    }
                });
            }
        });

        ///////////////// Profile Actions //////////////////////




        //////////////////////  Image Operations  /////////////////////

        //View Images
        function ViewImages(Imagetype, ElementId, ProfileId, DataType) {
            $.ajax({
                url: "FilterExtras.php",
                type: "POST",
                data: {
                    ViewImagesProfileId: ProfileId,
                    Imagetype: Imagetype,
                    DataType: DataType
                },
                beforeSend: function() {
                    //$('#SmallLoaderViewImages').show();
                    //$('#ViewImages').hide();
                },
                success: function(data) {
                    //console.log(data);
                    //$('#ViewImages').show();
                    //$('#SmallLoaderViewImages').hide();
                    $('#' + ElementId).html(data);
                },
            });
        }


        // Add Images Button
        $(document).on('click', '.AddImagesButton', function() {
            ImageFolder = $(this).val();
            $('#customer_folder').val(ImageFolder);
            $('#customer_profile_id').val($('#profile_id').val());
            $('#AddImagesModal').modal('show');
        });


        // Upload Images
        $(document).on('submit', '#ImageUploadForm', function(e) {
            e.preventDefault();
            AddImageData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "MasterOperations.php",
                data: AddImageData,
                success: function(data) {
                    console.log(data);
                    //$("#member_receive").val('');
                    var AddImageResponse = JSON.parse(data);
                    if (AddImageResponse.ImageUpload == true) {
                        location.reload();
                    } else {
                        toastr.error("Failed uploading images , please try again!");
                    }
                },
                cache: false,
                processData: false,
                contentType: false
            });
        });

        //////////////////////  Image Operations   /////////////////////
    </script>








</body>

</html>