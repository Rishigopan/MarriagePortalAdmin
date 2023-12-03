<?php $PageTitle = 'ViewData';
include '../MAIN/Dbconfig.php';

if (isset($_COOKIE['custidcookie']) && isset($_COOKIE['custtypecookie'])) {
    if (!empty($_COOKIE['custtoken'])) {
        if ($_COOKIE['custtypecookie'] == 1 || $_COOKIE['custtypecookie'] == 2) {
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

    <link rel="stylesheet" href="../assets/dist/virtual-select.min.css">

    <script src="../assets/dist/virtual-select.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js"></script>

    <script src="../assets/js/html2canvas.js" type="text/javascript"></script>



    <style>
        .Newselect .vscomp-value {
            color: black !important;
            opacity: 1 !important;
        }

        .ExtendedSelect .vscomp-value {
            color: black !important;
            opacity: 1 !important;
        }

        .vscomp-wrapper {
            font-family: "Nunito", sans-serif;
            width: 100% !important;
            /* border-radius: 20px !important;  */
        }

        .vscomp-wrapper.has-clear-button .vscomp-toggle-button {
            padding: 2px 10px;
        }

        .vscomp-ele {
            border-radius: 30px !important;
            padding: 0 !important;
        }

        .vscomp-option-text {
            font-weight: 400 !important;
            font-size: 12px !important;
        }

        .vscomp-option.focused {
            background-color: #afebed !important;
        }

        .vscomp-option {
            max-height: 30px !important;
        }

        .dropDnGreen {
            background-image: none !important;
        }

        .MobileDisplay {
            height: 100vh;
        }

        .MobileDisplay .ImageBox {
            border-radius: 20px;
            border: 2px solid #e81a81;
            height: 40vh;
        }

        .MobileDisplay .ImageBox .custmobileimg {
            border-radius: 18px 18px 18px 18px;
            height: 39.5vh;
        }

        .MobileDisplay .ViewDetailsContainer {
            height: 55vh;
            margin: 1vh;
        }

        .MobileDisplay .ViewDetails p {
            background-color: #e4e4e4;
            border-radius: 10px;
            font-size: 15px;
            padding: 2px 8px;
            margin: 0px;
        }

        .MobileDisplay .ViewDetails .CustomerNameField {
            background-color: #e81a81;
            color: white;
        }

        .MobileDisplay .ViewDetails .CustomerIdField {
            background-color: #3dadf3;
            color: white;
        }

        .MobileDisplay .SideMiniMenu li {
            padding: 7px 5px;
        }

        .MobileDisplay .SideMiniMenu li input {
            height: 25px;
            width: 25px;
            border-radius: 50%;
        }

        .MobileDisplay .SideMiniMenu li button {
            height: 25px;
            width: 25px;
        }

        .MobileDisplay .SideMiniMenu li button i {
            color: #e81a81;
            font-size: 20px;
            font-weight: 700;
        }


        @media only screen and (max-width:480px) {
            .lapView {
                display: none;
            }
        }

        @media only screen and (min-width:480px) {
            .MobileDisplay {
                display: none;
            }
        }

        .SwitchScreenContent .ScreenCheck+label {
            background-color: #6fc9fc;
            color: rgb(255, 255, 255);
            padding: 5px 5px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 600;
            z-index: 99;
            border-radius: 50%;
        }

        .SwitchScreenContent .ScreenCheck+label:hover,
        .SwitchScreenContent .ScreenCheck+label:focus {
            background-color: #c0c2c3;
            color: rgb(110, 109, 109);
        }

        .SwitchScreenContent .ScreenCheck:checked+label:hover {
            background-color: #c0c2c3 !important;
            color: rgb(110, 109, 109);
            border: none !important;
        }

        .SwitchScreenContent .ScreenCheck:checked+label {
            background-color: #c0c2c3 !important;
            color: rgb(110, 109, 109);
            border: none !important;
        }

        .ScreenShotViewMobile {
            height: 100vh;
        }

        .ScreenShotViewMobile .ImageBox {
            /* border-radius: 20px; */
            /* border: 2px solid #e81a81; */
            height: 50vh;
        }

        .ScreenShotViewMobile .ImageBox .custmobileimg {
            border-radius: 20px;
            border: 2px solid #e81a81;
        }

        .ScreenShotViewMobile .ImageBox .custmobileimg {
            border-radius: 18px 18px 18px 18px;
            height: 49.5vh;
        }

        .ScreenShotViewMobile .ViewDetailsContainer {
            height: 45vh;
            margin: 1vh;
        }

        .ScreenShotViewMobile .ViewDetails p {
            background-color: #e4e4e4;
            border-radius: 10px;
            font-size: 15px;
            padding: 2px 8px;
            margin: 0px;
        }

        .ScreenShotViewMobile .ViewDetails .CustomerNameField {
            background-color: #e81a81;
            color: white;
        }

        .ScreenShotViewMobile .ViewDetails .CustomerIdField {
            background-color: #3dadf3;
            color: white;
        }


        .feedbackmodal .FeedbackCheckboxClass+label {
            color: white;
            border: 2px solid transparent;
            /* background-color: #ff0185; */
        }

        .feedbackmodal .FeedbackCheckboxClass {
            display: none;
        }

        .feedbackmodal .FeedbackCheckboxClass+label:hover,
        .feedbackmodal .FeedbackCheckboxClass+label:focus {
            /* background-color: #ff0185; */
            text-decoration: underline;
            text-decoration-thickness: 0.3rem;
            color: white;
            border: 2px solid transparent;
        }

        .feedbackmodal .FeedbackCheckboxClass:checked+label:hover {
            /* background-color: #05cbfc !important; */
            text-decoration: underline;
            text-decoration-thickness: 0.3rem;
            color: white;
            border: 2px solid black;
        }

        .feedbackmodal .FeedbackCheckboxClass:checked+label {
            /* background-color: #05cbfc !important; */
            text-decoration: underline;
            text-decoration-thickness: 0.3rem;
            color: white;
            border: 2px solid black;
        }

        .bulkdatasection .FeedbackCheckboxClass+label {
            color: white;
            border: 2px solid transparent;
            /* background-color: #ff0185; */
        }

        .bulkdatasection .FeedbackCheckboxClass {
            display: none;
        }

        .bulkdatasection .FeedbackCheckboxClass+label:hover,
        .bulkdatasection .FeedbackCheckboxClass+label:focus {
            /* background-color: #ff0185; */
            text-decoration: underline;
            text-decoration-thickness: 0.3rem;
            color: white;
            border: 2px solid black;
        }

        .bulkdatasection .FeedbackCheckboxClass:checked+label:hover {
            /* background-color: #05cbfc !important; */
           
            text-decoration: underline;
            text-decoration-thickness: 0.3rem;
            color: white;
            border: 2px solid black;
        }

        .bulkdatasection .FeedbackCheckboxClass:checked+label {
            /* background-color: #05cbfc !important; */
            text-decoration: underline;
            text-decoration-thickness: 0.3rem;
            color: white;
            border: 2px solid black;
        }

        #ViewData .VerifiedIcon {
            color: #05cbfc;
            position: absolute;
            background-color: white;
            font-size: 15px;
        }


        #CompanyIdModal #view_company_id {
            color: red;
        }

        .SendingImage {
            height: 1200px;
            width: 650px;
            background-color: white;
            border: 2px solid black;
        }

        .SendingImage .SendImageDisplayDiv .SendImageDisplay {
            width: 100%;
            height: 100%;
            border: 5px solid #ff0185;
            border-radius: 30px;
        }

        .SendingImage .SendImageDisplayDiv {
            width: 100%;
            height: 55%;
        }

        .SendingImage .ColName {
            background-color: #ff0185;
            border-radius: 10px;
            padding: 10px 10px;
            color: white;
        }

        .SendingImage .ColId {
            background-color: #148ad0;
            border-radius: 10px;
            padding: 10px 10px;
            color: white;
        }

        .SendingImage .ColOthers {
            background-color: lightgray;
            border-radius: 10px;
            padding: 10px 10px;
            color: black;
        }

        .MatcherView {
            position: sticky;
            top: 47px;
            z-index: 99;
        }

        .MatcherView table {
            background-color: #faf7f7;
        }

        .filterButtons {
            border-radius: 50%;
            padding: 1px 5px;
            background-color: white;
        }
        .filterrefreshbtn{
            border-radius: 50%;
            padding: 1px 6px;
            background-color: white;
        }
        .refreshIcon{
            vertical-align:middle;  
        }
        .DeleteProfile {
            background-color: white;
            color: #ff4797;
        }

        .DeleteProfile:hover {
            background-color: white;
            color: #ff4797;
        }

        .ApproveButton {
            background-color: green;
            color: white;
        }

        .ApproveButton:hover {
            background-color: green;
            color: white;
        }

        .DisapproveButton {
            background-color: red;
            color: white;
        }

        .DisapproveButton:hover {
            background-color: red;
            color: white;
        }

        .CheckStar {
            color: #ebeb09;
        }

        .CheckStar:hover {
            color: #ebeb09;
        }

        .ViewCustomerImages {
            cursor: pointer;
        }

        #ViewAllImagesCarousel img {
            max-height: 500px;
        }

        .carousel-control-prev .carousel-control-prev-icon {
            background-color: grey;
            border-radius: 50%;
            padding: 20px;
        }

        .carousel-control-next .carousel-control-next-icon {
            background-color: grey;
            border-radius: 50%;
            padding: 20px;
        }

        .FeedbackSection{
            position: sticky;
            top: 38px;
        }

        /* .MatcherView .table tr:first-child td {
            border-top: 2px solid black;

        }

        .MatcherView .table tr:last-child td {
            border-bottom: 2px solid black;
        }

        .MatcherView .table tr td:first-child {
            border-left: 2px solid black;
        }

        .MatcherView .table tr td:last-child {
            border-right: 2px solid black;
        } */
    </style>

    <style>
        .NavbarItem {
            border: none;
            border-right: 3px solid #ff0185;
            border-radius: 0px;
            color: #ff0185;
        }

        .NavbarItem:focus {
            border-right: 3px solid #ff0185;
        }

        .NavbarItem.NavbarButton:hover {
            border-right: 3px solid #ff0185;
            color: #ff0185;
        }
    </style>

</head>

<body>


    <?php  

        if(isset($_GET['FindMember'])){
            $FromDuplicateSearchValue = $_GET['FindMember'];
        }else{
            $FromDuplicateSearchValue = '';
        }
    
    ?>


    <!-- CompanyId Modal -->
    <div class="modal fade" id="CompanyIdModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center p-0">
                    <h5 class="modal-title">Company Id</h5>
                </div>
                <div class="modal-body p-0 pb-2">
                    <div class="text-center" id="SmallLoader">
                        <img src="../IMAGES/miniloader.gif">
                    </div>
                    <div class="p-2 border-2 bg-light" id="ViewCompanyIdCont">
                        <div class="d-flex justify-content-between">
                            <i class="material-icons" id="clipboardIcon" style="visibility: hidden;">content_paste</i>
                            <h4 class="m-0 p-0"> <strong id="view_company_id"> </strong> </h4>
                            <button class="btn p-1 border-0 shadow-none modalPopover" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Copied"> <i class="material-icons" id="clipboardIcon" data-clipboard-target="#view_company_id">content_paste</i> </button>
                        </div>
                    </div>
                    <div class="text-center mt-1">
                        <button type="button" class="btn btn-secondary mt-1" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Feedback Modal -->
    <div class="modal fade feedbackmodal" id="FeedBackModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body mx-4">
                    <div class="col-12">

                        <form action="" method="" id="FreeFeedbackForm" class="">
                            <div class="row mt-3 modalForm">
                                
                                <!-- Free data feedbacks -->
                                <div class="row" id="FreeDataFeedbacks">
                                    <div class="col-12">
                                        <h6 class="btnSubmit py-0" style="background-color:#05cbfc;">FREE REGISTER FEEDBACK & PAGES</h6>
                                    </div>
                                    <div class="col-md-6 form-group mt-1">
                                        <input type="radio" name="FreeFeedBack" class="FeedbackCheckboxClass " value="0" id="FeedbackId0">
                                        <label class="btnSubmit form-control" style="background-color: #ff0185;" for="FeedbackId0"> Default </label>
                                    </div>
                                    <?php
                                        $GetFeedbacks = mysqli_query($con, "SELECT * FROM feedback WHERE feedbackData = 'Free Data'");
                                        foreach ($GetFeedbacks as $GetFeedbacksResult) {
                                        ?>
                                            <div class="col-md-6 form-group mt-1">
                                                <input type="radio" name="FreeFeedBack" class="FeedbackCheckboxClass " value="<?= $GetFeedbacksResult['fdId'] ?>" id="FeedbackId<?= $GetFeedbacksResult['fdId']  ?>">
                                                <label class="btnSubmit form-control" style="background-color: <?= ($GetFeedbacksResult['feedbackColor'] != '') ?  $GetFeedbacksResult['feedbackColor'] :  '#ff0185' ?>;" for="FeedbackId<?= $GetFeedbacksResult['fdId'] ?>"> <?= $GetFeedbacksResult['feedback'] ?> </label>
                                            </div>
                                        <?php
                                        }
                                    ?>
                                </div>


                                <!-- Paid data feedbacks -->
                                <div class="row" id="PaidDataFeedbacks">
                                    <div class="col-12">
                                        <h6 class="btnSubmit py-2" style="background-color:#05cbfc;">PAID REGISTER FEEDBACK & PAGES</h6>
                                    </div>
                                    <div class="col-md-6 form-group mt-1">
                                        <input type="radio" name="PaidFeedBack" class="FeedbackCheckboxClass " value="0" id="PaidFeedbackId0" >
                                        <label class="btnSubmit form-control" style="background-color: #ff0185;" for="PaidFeedbackId0"> Default </label>
                                    </div>
                                    <?php
                                    $GetPaidFeedbacks = mysqli_query($con, "SELECT * FROM feedback WHERE feedbackData = 'Paid Data'");
                                    foreach ($GetPaidFeedbacks as $GetPaidFeedbacksResult) {
                                    ?>
                                        <div class="col-md-6 form-group mt-1">
                                            <input type="radio" name="FreeFeedBack" class="FeedbackCheckboxClass" value="<?= $GetPaidFeedbacksResult['fdId'] ?>" id="PaidFeedbackId<?= $GetPaidFeedbacksResult['fdId'] ?>" >
                                            <label class="btnSubmit form-control" for="PaidFeedbackId<?= $GetPaidFeedbacksResult['fdId'] ?>"> <?= $GetPaidFeedbacksResult['feedback'] ?> </label>
                                        </div>

                                    <?php
                                    }

                                    ?>
                                </div>


                                <!-- Marriage data feedbacks -->
                                <div class="row" id="MarriageDataFeedbacks">
                                    <div class="col-12">
                                        <h6 class="btnSubmit py-2" style="background-color:#05cbfc;">MARRIAGE REGISTER FEEDBACK & PAGES</h6>
                                    </div>
                                    <div class="col-md-6 form-group mt-1">
                                        <input type="radio" name="MarriageFeedBack" class="FeedbackCheckboxClass " value="0" id="MarriageFeedbackId0" >
                                        <label class="btnSubmit form-control" style="background-color: #ff0185;" for="MarriageFeedbackId0"> Default </label>
                                    </div>
                                    <?php
                                    $GetMarriageFeedbacks = mysqli_query($con, "SELECT * FROM feedback WHERE feedbackData = 'Marriage Data'");
                                    foreach ($GetMarriageFeedbacks as $GetMarriageFeedbacksResult) {
                                    ?>
                                        <div class="col-md-6 form-group mt-1">
                                            <input type="radio" name="FreeFeedBack" class="FeedbackCheckboxClass" value="<?= $GetMarriageFeedbacksResult['fdId'] ?>" id="MarriageFeedbackId<?= $GetMarriageFeedbacksResult['fdId'] ?>" >
                                            <label class="btnSubmit form-control" for="MarriageFeedbackId<?= $GetMarriageFeedbacksResult['fdId'] ?>"> <?= $GetMarriageFeedbacksResult['feedback'] ?> </label>
                                        </div>

                                    <?php
                                    }

                                    ?>
                                </div>


                                <!-- Wedding data feedbacks -->
                                <div class="row" id="WeddingDataFeedbacks">
                                    <div class="col-12">
                                        <h6 class="btnSubmit py-2" style="background-color:#05cbfc;">WEDDING REGISTER FEEDBACK & PAGES</h6>
                                    </div>
                                    <div class="col-md-6 form-group mt-1">
                                        <input type="radio" name="WeddingFeedBack" class="FeedbackCheckboxClass " value="0" id="WeddingFeedbackId0" >
                                        <label class="btnSubmit form-control" style="background-color: #ff0185;" for="WeddingFeedbackId0"> Default </label>
                                    </div>
                                    <?php
                                    $GetWeddingFeedbacks = mysqli_query($con, "SELECT * FROM feedback WHERE feedbackData = 'Wedding Data'");
                                    foreach ($GetWeddingFeedbacks as $GetWeddingFeedbacksResult) {
                                    ?>
                                        <div class="col-md-6 form-group mt-1">
                                            <input type="radio" name="FreeFeedBack" class="FeedbackCheckboxClass" value="<?= $GetWeddingFeedbacksResult['fdId'] ?>" id="WeddingFeedbackId<?= $GetWeddingFeedbacksResult['fdId'] ?>" >
                                            <label class="btnSubmit form-control" for="WeddingFeedbackId<?= $GetWeddingFeedbacksResult['fdId'] ?>"> <?= $GetWeddingFeedbacksResult['feedback'] ?> </label>
                                        </div>

                                    <?php
                                    }

                                    ?>
                                </div>
                                

                                <input type="text" name="FeedbackCustomerId" id="feed_customer_id" class="form-control" hidden>
                                <input type="text" name="FeedbackType" id="feedback_type" value="" class="form-control" hidden>
                                <div class="col-12 form-group mt-2">
                                    <label for="" class="ms-2">Partner Preference</label>
                                    <input type="text" name="PartnerPrefer" class="form-control PartPreference">
                                </div>
                                <div class="col-12 form-group mt-2">
                                    <label for="" class="ms-2">Remarks</label>
                                    <input type="text" name="FeedbackRemark" class="form-control FeedbackRemarks">
                                </div>
                                <div class="row">
                                    <div class="col-md-10 form-group mt-2">
                                        <label for="" class="ms-2">&nbsp;</label>
                                        <input type="datetime-local" name="FeedbackDate" class="form-control">
                                    </div>
                                    <div class="col-md-2 form-group mt-3">
                                        <h6 class="reminder text-white text-center">Reminder</h6>
                                    </div>
                                </div>

                                <!-- <div class="col-md-6 form-group mt-3">
                                    <input type="time" name="FeedbackTime" class="form-control">
                                </div> -->
                            </div>
                            <div class="text-center mt-4 mb-3">
                                <button type="submit" class="btnLightblue px-4 py-1 my-2" id="btn_submit" name="BtnSubmit">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- View Image Modal -->
    <div class="modal fade" id="ViewImagesModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">

                    <h5 class="">View Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- <input type="number" class="MasterImageStoreId" hidden> -->
                    <div class="tab-pane fade show active" id="pills-image" role="tabpanel" aria-labelledby="pills-image-tab" tabindex="0">
                        <div class="text-center" id="SmallLoaderViewImages">
                            <img src="../IMAGES/miniloader.gif">
                        </div>
                        <div class="mt-3" id="ViewImages">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Navbar include -->
    <?php include('../MAIN/Navbar.php'); ?>


    <!-- Sidebar include -->
    <?php include('../MAIN/Sidebar.php'); ?>



    <main id="main" class="main">

        <!-- <div class="pagetitle">
            <h1>View Data</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">View Data</li>
                </ol>
            </nav>
        </div> -->

        <section class="section dashboard">



            <div class="container-fluid pb-2">

                <form id="FilterData">


                    <input type="text" name="Search" value="1" hidden>


                    <div class="row collapse show" id="collapseExample">
                        <div class="col-xl-2 col-lg-3 col-6 mt-2">
                            <select class="Newselect select choose" id="member_bride" placeholder="Bride/Groom" name="MemberBride" multiple="no">
                                <!-- <option hidden value="">Bride/Groom</option> -->
                                <option value="Female">Bride</option>
                                <option value="Male">Groom</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-2">
                            <select class="Newselect select dropColor choose" placeholder="Phys Status" id="member_phystatus" name="MemberPhystatus[]" multiple>
                                <!-- <option hidden value="">Phys Status</option> -->
                                <option value="'Normal'">Normal</option>
                                <option value="'Blind'">Blind</option>
                                <option value="'Deaf/Dump'">Deaf/Dump</option>
                                <option value="'Handicapped'">Handicapped</option>
                                <option value="'Mentally Challenged'">Mentally Challenged</option>
                                <option value="'Physically Challenged'">Physically Challenged</option>
                                <option value="'With other Disability'">With other Disability</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-2">
                            <select class="Newselect select choose" id="member_agefrom" placeholder="Age From" name="MemberAgefrom" multiple="no">
                                <!-- <option hidden value="">Age From</option> -->
                                <?php
                                for ($Age = 18; $Age <= 80; $Age++) {
                                    echo '<option value="' . $Age . '">' . $Age . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-2">
                            <select class="Newselect select choose" id="member_ageto" placeholder="Age To" name="MemberAgeto" multiple="no">
                                <!-- <option hidden value="">Age To</option> -->
                                <?php
                                for ($Age = 18; $Age <= 80; $Age++) {
                                    echo '<option value="' . $Age . '">' . $Age . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-xl-2 col-lg-3 col-6 mt-2">
                            <select class="Newselect select choose" id="member_heightfrom" placeholder="Height From" name="MemberHeightfrom" multiple="no">
                                <!-- <option hidden value="">Height From</option> -->
                                <option value="120">3 Ft 11 in - 120 cm</option>
                                <option value="121">3 Ft 12 in - 121 cm</option>
                                <option value="122">4 Ft 0 in - 122 cm</option>
                                <option value="123">4 Ft 0 in - 123 cm</option>
                                <option value="124">4 Ft 1 in - 124 cm</option>
                                <option value="125">4 Ft 1 in - 125 cm</option>
                                <option value="126">4 Ft 2 in - 126 cm</option>
                                <option value="127">4 Ft 2 in - 127 cm</option>
                                <option value="128">4 Ft 2 in - 128 cm</option>
                                <option value="129">4 Ft 3 in - 129 cm</option>
                                <option value="130">4 Ft 3 in - 130 cm</option>
                                <option value="131">4 Ft 4 in - 131 cm</option>
                                <option value="132">4 Ft 4 in - 132 cm</option>
                                <option value="133">4 Ft 4 in - 133 cm</option>
                                <option value="134">4 Ft 5 in - 134 cm</option>
                                <option value="135">4 Ft 5 in - 135 cm</option>
                                <option value="136">4 Ft 6 in - 136 cm</option>
                                <option value="137">4 Ft 6 in - 137 cm</option>
                                <option value="138">4 Ft 6 in - 138 cm</option>
                                <option value="139">4 Ft 7 in - 139 cm</option>
                                <option value="140">4 Ft 7 in - 140 cm</option>
                                <option value="141">4 Ft 8 in - 141 cm</option>
                                <option value="142">4 Ft 8 in - 142 cm</option>
                                <option value="143">4 Ft 8 in - 143 cm</option>
                                <option value="144">4 Ft 9 in - 144 cm</option>
                                <option value="145">4 Ft 9 in - 145 cm</option>
                                <option value="146">4 Ft 9 in - 146 cm</option>
                                <option value="147">4 Ft 10 in - 147 cm</option>
                                <option value="148">4 Ft 10 in - 148 cm</option>
                                <option value="149">4 Ft 11 in - 149 cm</option>
                                <option value="150">4 Ft 11 in - 150 cm</option>
                                <option value="151">4 Ft 11 in - 151 cm</option>
                                <option value="152">5 Ft 0 in - 152 cm</option>
                                <option value="153">5 Ft 0 in - 153 cm</option>
                                <option value="154">5 Ft 1 in - 154 cm</option>
                                <option value="155">5 Ft 1 in - 155 cm</option>
                                <option value="156">5 Ft 1 in - 156 cm</option>
                                <option value="157">5 Ft 2 in - 157 cm</option>
                                <option value="158">5 Ft 2 in - 158 cm</option>
                                <option value="159">5 Ft 3 in - 159 cm</option>
                                <option value="160">5 Ft 3 in - 160 cm</option>
                                <option value="161">5 Ft 3 in - 161 cm</option>
                                <option value="162">5 Ft 4 in - 162 cm</option>
                                <option value="163">5 Ft 4 in - 163 cm</option>
                                <option value="164">5 Ft 5 in - 164 cm</option>
                                <option value="165">5 Ft 5 in - 165 cm</option>
                                <option value="166">5 Ft 5 in - 166 cm</option>
                                <option value="167">5 Ft 6 in - 167 cm</option>
                                <option value="168">5 Ft 6 in - 168 cm</option>
                                <option value="169">5 Ft 7 in - 169 cm</option>
                                <option value="170">5 Ft 7 in - 170 cm</option>
                                <option value="171">5 Ft 7 in - 171 cm</option>
                                <option value="172">5 Ft 8 in - 172 cm</option>
                                <option value="173">5 Ft 8 in - 173 cm</option>
                                <option value="174">5 Ft 9 in - 174 cm</option>
                                <option value="175">5 Ft 9 in - 175 cm</option>
                                <option value="176">5 Ft 9 in - 176 cm</option>
                                <option value="177">5 Ft 10 in - 177 cm</option>
                                <option value="178">5 Ft 10 in - 178 cm</option>
                                <option value="179">5 Ft 10 in - 179 cm</option>
                                <option value="180">5 Ft 11 in - 180 cm</option>
                                <option value="181">5 Ft 11 in - 181 cm</option>
                                <option value="182">6 Ft 0 in - 182 cm</option>
                                <option value="183">6 Ft 0 in - 183 cm</option>
                                <option value="184">6 Ft 0 in - 184 cm</option>
                                <option value="185">6 Ft 1 in - 185 cm</option>
                                <option value="186">6 Ft 1 in - 186 cm</option>
                                <option value="187">6 Ft 2 in - 187 cm</option>
                                <option value="188">6 Ft 2 in - 188 cm</option>
                                <option value="189">6 Ft 2 in - 189 cm</option>
                                <option value="190">6 Ft 3 in - 190 cm</option>
                                <option value="191">6 Ft 3 in - 191 cm</option>
                                <option value="192">6 Ft 4 in - 192 cm</option>
                                <option value="193">6 Ft 4 in - 193 cm</option>
                                <option value="194">6 Ft 4 in - 194 cm</option>
                                <option value="195">6 Ft 5 in - 195 cm</option>
                                <option value="196">6 Ft 5 in - 196 cm</option>
                                <option value="197">6 Ft 6 in - 197 cm</option>
                                <option value="198">6 Ft 6 in - 198 cm</option>
                                <option value="199">6 Ft 6 in - 199 cm</option>
                                <option value="200">6 Ft 7 in - 200 cm</option>
                                <option value="201">6 Ft 7 in - 201 cm</option>
                                <option value="202">6 Ft 8 in - 202 cm</option>
                                <option value="203">6 Ft 8 in - 203 cm</option>
                                <option value="204">6 Ft 8 in - 204 cm</option>
                                <option value="205">6 Ft 9 in - 205 cm</option>
                                <option value="206">6 Ft 9 in - 206 cm</option>
                                <option value="207">6 Ft 9 in - 207 cm</option>
                                <option value="208">6 Ft 10 in - 208 cm</option>
                                <option value="209">6 Ft 10 in - 209 cm</option>
                                <option value="210">6 Ft 11 in - 210 cm</option>
                                <option value="211">6 Ft 11 in - 211 cm</option>
                                <option value="212">6 Ft 11 in - 212 cm</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-2">
                            <select class="Newselect select choose" id="member_heightto" placeholder="Height To" name="MemberHeightto" multiple="no">
                                <!-- <option hidden value="">Height To</option> -->
                                <option value="120">3 Ft 11 in - 120 cm</option>
                                <option value="121">3 Ft 12 in - 121 cm</option>
                                <option value="122">4 Ft 0 in - 122 cm</option>
                                <option value="123">4 Ft 0 in - 123 cm</option>
                                <option value="124">4 Ft 1 in - 124 cm</option>
                                <option value="125">4 Ft 1 in - 125 cm</option>
                                <option value="126">4 Ft 2 in - 126 cm</option>
                                <option value="127">4 Ft 2 in - 127 cm</option>
                                <option value="128">4 Ft 2 in - 128 cm</option>
                                <option value="129">4 Ft 3 in - 129 cm</option>
                                <option value="130">4 Ft 3 in - 130 cm</option>
                                <option value="131">4 Ft 4 in - 131 cm</option>
                                <option value="132">4 Ft 4 in - 132 cm</option>
                                <option value="133">4 Ft 4 in - 133 cm</option>
                                <option value="134">4 Ft 5 in - 134 cm</option>
                                <option value="135">4 Ft 5 in - 135 cm</option>
                                <option value="136">4 Ft 6 in - 136 cm</option>
                                <option value="137">4 Ft 6 in - 137 cm</option>
                                <option value="138">4 Ft 6 in - 138 cm</option>
                                <option value="139">4 Ft 7 in - 139 cm</option>
                                <option value="140">4 Ft 7 in - 140 cm</option>
                                <option value="141">4 Ft 8 in - 141 cm</option>
                                <option value="142">4 Ft 8 in - 142 cm</option>
                                <option value="143">4 Ft 8 in - 143 cm</option>
                                <option value="144">4 Ft 9 in - 144 cm</option>
                                <option value="145">4 Ft 9 in - 145 cm</option>
                                <option value="146">4 Ft 9 in - 146 cm</option>
                                <option value="147">4 Ft 10 in - 147 cm</option>
                                <option value="148">4 Ft 10 in - 148 cm</option>
                                <option value="149">4 Ft 11 in - 149 cm</option>
                                <option value="150">4 Ft 11 in - 150 cm</option>
                                <option value="151">4 Ft 11 in - 151 cm</option>
                                <option value="152">5 Ft 0 in - 152 cm</option>
                                <option value="153">5 Ft 0 in - 153 cm</option>
                                <option value="154">5 Ft 1 in - 154 cm</option>
                                <option value="155">5 Ft 1 in - 155 cm</option>
                                <option value="156">5 Ft 1 in - 156 cm</option>
                                <option value="157">5 Ft 2 in - 157 cm</option>
                                <option value="158">5 Ft 2 in - 158 cm</option>
                                <option value="159">5 Ft 3 in - 159 cm</option>
                                <option value="160">5 Ft 3 in - 160 cm</option>
                                <option value="161">5 Ft 3 in - 161 cm</option>
                                <option value="162">5 Ft 4 in - 162 cm</option>
                                <option value="163">5 Ft 4 in - 163 cm</option>
                                <option value="164">5 Ft 5 in - 164 cm</option>
                                <option value="165">5 Ft 5 in - 165 cm</option>
                                <option value="166">5 Ft 5 in - 166 cm</option>
                                <option value="167">5 Ft 6 in - 167 cm</option>
                                <option value="168">5 Ft 6 in - 168 cm</option>
                                <option value="169">5 Ft 7 in - 169 cm</option>
                                <option value="170">5 Ft 7 in - 170 cm</option>
                                <option value="171">5 Ft 7 in - 171 cm</option>
                                <option value="172">5 Ft 8 in - 172 cm</option>
                                <option value="173">5 Ft 8 in - 173 cm</option>
                                <option value="174">5 Ft 9 in - 174 cm</option>
                                <option value="175">5 Ft 9 in - 175 cm</option>
                                <option value="176">5 Ft 9 in - 176 cm</option>
                                <option value="177">5 Ft 10 in - 177 cm</option>
                                <option value="178">5 Ft 10 in - 178 cm</option>
                                <option value="179">5 Ft 10 in - 179 cm</option>
                                <option value="180">5 Ft 11 in - 180 cm</option>
                                <option value="181">5 Ft 11 in - 181 cm</option>
                                <option value="182">6 Ft 0 in - 182 cm</option>
                                <option value="183">6 Ft 0 in - 183 cm</option>
                                <option value="184">6 Ft 0 in - 184 cm</option>
                                <option value="185">6 Ft 1 in - 185 cm</option>
                                <option value="186">6 Ft 1 in - 186 cm</option>
                                <option value="187">6 Ft 2 in - 187 cm</option>
                                <option value="188">6 Ft 2 in - 188 cm</option>
                                <option value="189">6 Ft 2 in - 189 cm</option>
                                <option value="190">6 Ft 3 in - 190 cm</option>
                                <option value="191">6 Ft 3 in - 191 cm</option>
                                <option value="192">6 Ft 4 in - 192 cm</option>
                                <option value="193">6 Ft 4 in - 193 cm</option>
                                <option value="194">6 Ft 4 in - 194 cm</option>
                                <option value="195">6 Ft 5 in - 195 cm</option>
                                <option value="196">6 Ft 5 in - 196 cm</option>
                                <option value="197">6 Ft 6 in - 197 cm</option>
                                <option value="198">6 Ft 6 in - 198 cm</option>
                                <option value="199">6 Ft 6 in - 199 cm</option>
                                <option value="200">6 Ft 7 in - 200 cm</option>
                                <option value="201">6 Ft 7 in - 201 cm</option>
                                <option value="202">6 Ft 8 in - 202 cm</option>
                                <option value="203">6 Ft 8 in - 203 cm</option>
                                <option value="204">6 Ft 8 in - 204 cm</option>
                                <option value="205">6 Ft 9 in - 205 cm</option>
                                <option value="206">6 Ft 9 in - 206 cm</option>
                                <option value="207">6 Ft 9 in - 207 cm</option>
                                <option value="208">6 Ft 10 in - 208 cm</option>
                                <option value="209">6 Ft 10 in - 209 cm</option>
                                <option value="210">6 Ft 11 in - 210 cm</option>
                                <option value="211">6 Ft 11 in - 211 cm</option>
                                <option value="212">6 Ft 11 in - 212 cm</option>

                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect" placeholder="Marital Status" id="member_marstatus" name="MemberMarstatus[]" multiple>
                                <!-- <option disabled selected value="">Marital Status</option> -->
                                <option value="'Unmarried'">Unmarried</option>
                                <option value="'Divorced'">Divorced</option>
                                <option value="'Separated'">Separated</option>
                                <option value="'Widow/ Widower'">Widow/Widower</option>
                                <option value="'Awaiting Divorce'">Awaiting Divorce</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect" placeholder="No of Child" id="member_child" name="MemberChild[]" multiple>
                                <!-- <option hidden value="">No of Child</option> -->
                                <option value="'0'">0</option>
                                <option value="'1'">1</option>
                                <option value="'2'">2</option>
                                <option value="'3'">3</option>
                                <option value="'4'">4</option>
                                <option value="'5'">5</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="Newselect select choose SelectReligion" id="member_religion" name="MemberReligion[]" placeholder="Religion" multiple>

                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose SelectCaste Newselect" placeholder="Caste" id="member_caste" name="MemberCaste[]" multiple>
                                <!-- <option value="">Caste</option> -->

                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose ExtendedSelect SelectEdCat" placeholder="Education Category" id="member_education" name="MemberEducationCategory[]" multiple>

                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose ExtendedSelect SelectEdType" placeholder="Education Type" id="member_edutype" name="MemberEduType[]" multiple>
                                <!-- <option hidden value="">Education Type</option> -->

                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose ExtendedSelect SelectJobCat" placeholder="Job Category" id="member_jobcategory" name="MemberJobcategory[]" multiple>

                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose ExtendedSelect SelectJobType" placeholder="Job Type" id="member_jobdetail" name="MemberJobType[]" multiple>

                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect SelectDistrict" placeholder="District" id="member_district" name="MemberDistrict[]" multiple>

                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect" placeholder="Financial Status" id="member_finstatus" name="MemberFinstatus[]" multiple>
                                <!-- <option hidden value="">Financial Status</option> -->
                                <option value="'Middle class'">Middle class</option>
                                <option value="'Upper middle class'">Upper middle class</option>
                                <option value="'Lower class'">Lower class</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect" placeholder="Complexion" id="member_complexion" name="MemberComplexion[]" multiple>
                                <!-- <option hidden value="">Complexion</option> -->
                                <option value="'Dark'">Dark</option>
                                <option value="'Fair'">Fair</option>
                                <option value="'Medium'">Medium</option>
                                <option value="'Very Fair'">Very Fair</option>
                                <option value="'Wheatish'">Wheatish</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect" placeholder="Body" id="member_bodytype" name="MemberBodyType[]" multiple>
                                <!-- <option hidden value="">Body</option> -->
                                <option value="'Slim'">Slim</option>
                                <option value="'Average'">Average</option>
                                <option value="'Athletic'">Athletic</option>
                                <option value="'Heavy'">Heavy</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect SelectCountry" placeholder="Job Country" id="member_country" name="MemberCountry[]" multiple>

                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect SelectState" placeholder="Job State" id="member_state" name="MemberState[]" multiple>

                            </select>
                        </div>

                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect" placeholder="Monthly Income" id="member_income" name="MemberIncome[]" multiple>
                                <!-- <option hidden value="">Monthly Income</option> -->
                                <option value="'1000'">Below Rs.1000</option>
                                <option value="'1000 - 3000'">Rs.1000 - Rs.3000</option>
                                <option value="'3000 - 5000'">Rs.3000 - Rs.5000</option>
                                <option value="'5000 - 8000'">Rs.5000 - Rs.8000</option>
                                <option value="'8000 - 10000'">Rs.8000 - Rs.10000</option>
                                <option value="'10000 - 15000'">Rs.10000 - Rs.15000</option>
                                <option value="'15000 - 25000'">Rs.15000 - Rs.25000</option>
                                <option value="'25000 - 50000'">Rs.25000 - Rs.50000</option>
                                <option value="'50000 - 75000'">Rs.50000 - Rs.75000</option>
                                <option value="'75000 - 100000'">Rs.75000 - Rs.100000</option>
                                <option value="'100000 - 200000'">Rs.100000 - Rs.200000</option>
                                <option value="'200000'">Above Rs. 200000</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect SelectStar" placeholder="Star" id="member_star" name="MemberStar" multiple="no">

                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect" placeholder="Type of Jathakam" id="member_jathakam" name="MemberJathakam[]" multiple>
                                <!-- <option  hidden value="">Type of Jathakam</option> -->
                                <option value="'Normal Jadhakam'">Normal Jadhakam</option>
                                <option value="'Sudha Jadhakam'">Sudha Jadhakam</option>
                                <option value="'Paapa Jadhakam'">Paapa Jadhakam</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="Newselect select dropColor Newselect" placeholder="You have Own" id="member_own" name="MemberOwn[]" multiple>
                                <!-- <option disabled selected value="">You have Own</option> -->
                                <option value="'Own House'">Own House</option>
                                <option value="'Own Flat'">Own Flat</option>
                                <option value="'Own Car'">Own Car</option>
                                <option value="'Own Bike'">Own Bike</option>
                                <option value="'Rent House'">Rent House</option>
                                <option value="'Rent Flat'">Rent Flat</option>
                            </select>
                        </div>

                    </div>



                    <div class="row mt-1">
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <select class="form-control select dropDnLightPink" id="member_data" name="MemberData">
                                <option selected value="FD">Free Data</option>
                                <option value="BD">Bulk Data</option>
                                <option value="LD">Lead Data</option>
                                <option value="PD">Paid Data</option>
                                <option value="MD">Marriage Data</option>
                                <option value="WD">Wedding Data</option>
                            </select>
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <select class="form-control select dropDnLightPink" id="member_page" name="MemberPage">
                                <option value="0">Page</option>
                                <?php

                                $GetFeedbacks = mysqli_query($con, "SELECT fdId,feedback FROM feedback WHERE feedbackData = 'Free Data'");
                                foreach ($GetFeedbacks as $GetFeedbacksResult) {
                                    echo '<option value="' . $GetFeedbacksResult["fdId"] . '">' . $GetFeedbacksResult["feedback"] . '</option>';
                                }

                                ?>
                            </select>
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <input type="text" id="member_canid" name="MemberCanID" class="form-control inputFieldWhite" placeholder="ID Search">
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <input type="text" id="member_wordsearch" name="MemberWordSearch" class="form-control inputFieldWhite" placeholder="Search">
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <input type="text" id="member_mobile" name="MemberMobile" class="form-control inputFieldWhite" placeholder="Mobile">
                        </div>

                        <!-- <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <button class="form-control btnBlue" type="button" >Clear All</button>
                        </div> -->


                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <div class="row">
                                <div class="col-xl-6 col-lg-3 col-3 text-center ps-2">
                                    <!-- <button type="submit" class="btn p-0 m-0" id="searchButton"><i class="ri-search-2-line iconSearch"></i></button> -->
                                    <button type="button" id="clearAll" class="btn btn-dark filterrefreshbtn refreshBtn"><i class="ri-refresh-line text-dark refreshIcon"></i></button>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-4 text-center">
                                    <a data-bs-toggle="collapse" href="#collapseExample" role="button" id="filter_link" name="FilterLink"><i class="ri-filter-2-line iconFilter"></i></a>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-6 text-center">
                                    <select class="form-control select py-1 text-black ps-2 arrowHide" id="page_length" name="PageLength">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                        <option selected value="100">100</option>
                                        <!-- <option value="">25</option> -->
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-3 text-end">
                                    <button type="submit" class="btn p-0 m-0" id="searchButton"><i class="ri-search-2-line iconSearch"></i></button>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-3 text-end mt-1">
                                    <input class="form-check-input" type="checkbox" id="CheckSendReceive" name="CheckSendReceive" value="YES" class="checkBox">
                                </div>
                                <!-- <div class="col-xl-4 col-lg-5 col-5 text-center ps-0 ms-0 pt-1">
                                    <h6 class="" id="PageResult"></h6>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-2 mt-1 d-flex d-md-none">
                            <div class="SwitchScreenContent me-2">
                                <input type="checkbox" class="ScreenCheck d-none" id="StarCheck">
                                <label class="btn shadow-none" for="StarCheck"><i class="bi bi-star-fill"></i></label>
                            </div>
                            <div class="SwitchScreenContent me-2">
                                <input type="checkbox" class="ScreenCheck d-none" id="EduCheck">
                                <label class="btn shadow-none" for="EduCheck"><i class="bi bi-book-half"></i></label>
                            </div>
                            <div class="SwitchScreenContent me-2">
                                <input type="checkbox" class="ScreenCheck d-none" id="JobCheck">
                                <label class="btn shadow-none" for="JobCheck"><i class="bi bi-briefcase-fill"></i></label>
                            </div>
                            <div class="SwitchScreenContent me-2">
                                <input type="checkbox" class="ScreenCheck d-none" id="PhoneCheck">
                                <label class="btn shadow-none" for="PhoneCheck"><i class="bi bi-telephone-fill"></i></label>
                            </div>
                        </div>

                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <select class="form-select select dropDnGreen" id="member_match" name="MemberMatch">
                                <option hidden value="">Match</option>
                                <option value="SM">Star Match</option>
                                <option value="MM">My Match</option>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <select class="form-select select dropDnGreen" id="member_send" name="MemberSend">
                                <option hidden value="">Send</option>
                                <option value="PROFILESEND">Profile Send</option>
                                <option value="INTERESTSEND">Interest Send</option>

                            </select>
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <select class="form-select select dropDnGreen" id="member_receive" name="MemberReceive">
                                <option hidden value="">Receive</option>
                                <option value="PROFILERECIEVE">Profile Receive</option>
                                <option value="INTERESTRECIEVE">Interest Receive</option>
                            </select>
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <select class="form-control select dropDnLightPink" id="member_assist" name="MemberAssist">
                                <option hidden value="">Assist</option>

                            </select>
                        </div>
                    </div>



                    <div class="row mt-1">
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <select class="form-control select dropDnLightPink" id="member_type" name="MemberType">
                                <option value="0">Type</option>
                                <?php
                                    $GetTypes = mysqli_query($con, "SELECT id,typeName FROM types");
                                    foreach ($GetTypes as $GetTypesResult) {
                                        echo '<option value="' . $GetTypesResult["id"] . '">' . $GetTypesResult["typeName"] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <select class="form-control select dropDnLightPink" id="member_data" name="ChooseStaff">
                                <option selected value="">Staff</option>
                            </select>
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <select class="form-control select dropDnLightPink" id="member_packagae" name="MemberPackage">
                                <option value="0">Package</option>
                                <?php
                                    $GetPackage = mysqli_query($con, "SELECT id,packageName FROM package");
                                    foreach ($GetPackage as $GetPackageResult) {
                                        echo '<option value="' . $GetPackageResult["id"] . '">' . $GetPackageResult["packageName"] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <div class="row">
                                <div class="col-xl-6 col-lg-3 col-3 text-center ps-2">
                                    <!-- <button type="submit" class="btn p-0 m-0" id="searchButton"><i class="ri-search-2-line iconSearch"></i></button> -->
                                    <input class="form-check-input mt-2" type="checkbox" id="inlineCheckbox1" value="option1" class="checkBox">
                                </div>
                                <div class="col-xl-6 col-lg-4 col-4 text-center">
                                    <button type="button" id="DeleteProfileButton" class="btn DeleteProfile filterButtons refreshBtn"><i class="ri-delete-bin-6-line"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <select class="form-control select dropDnLightPink" id="member_page" name="ChoosePackage">
                                <option value="0">Online</option>
                            </select>
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <select class="form-control select dropDnLightPink" id="member_profile_status" name="ProfileStatus">
                                <option value="0">Registered</option>
                                <option value="1">Approved</option>
                                <option value="2">Dis Approved</option>
                                <option value="3">Active</option>
                                <option value="4">De Active</option>
                                <option value="5">Upgrade</option>
                                <option value="6">Dis Grade</option>
                                <option value="7">Suspend</option>
                                <option value="8">Delete</option>
                                <option value="9">Restore</option>
                            </select>
                        </div>

                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <div class="row">
                                <div class="col-xl-6 col-lg-3 col-3 text-center ps-2">
                                    <!-- <button type="submit" class="btn p-0 m-0" id="searchButton"><i class="ri-search-2-line iconSearch"></i></button> -->
                                    <button type="button" id="" value="1" class="btn filterButtons ApproveButton ProfileActionBtn"> <i class="ri-check-double-line"></i></button>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-4 text-center">
                                    <button type="button" id="" value="2" class="btn filterButtons DisapproveButton ProfileActionBtn"><i class="ri-thumb-down-fill"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1">
                            <h6 class="" id="PageResult"></h6>
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <div class="row">
                                <div class="col-xl-2 col-lg-3 col-3 text-center ps-2">
                                    <!-- <button type="submit" class="btn p-0 m-0" id="searchButton"><i class="ri-search-2-line iconSearch"></i></button> -->
                                    <input class="form-check-input mt-2" type="checkbox" id="inlineCheckbox1" value="option1" class="checkBox">
                                </div>
                                <div class="col-xl-10 col-lg-9 col-9 text-center">
                                    <button type="button" id="" class="btn filterButtons DeleteProfile"><i class="ri-phone-fill"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <div class="row">
                                <div class="col-xl-2 col-lg-3 col-3 text-center ps-2">
                                    <!-- <button type="submit" class="btn p-0 m-0" id="searchButton"><i class="ri-search-2-line iconSearch"></i></button> -->
                                    <input class="form-check-input mt-2" type="checkbox" id="inlineCheckbox1" value="option1" class="checkBox">
                                </div>
                                <div class="col-xl-10 col-lg-9 col-9 text-center">
                                    <button type="button" id="" class="btn filterButtons CheckStar"><i class="ri-star-fill"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <div class="row">
                                <div class="col-xl-2 col-lg-3 col-3 text-center ps-2">
                                    <!-- <button type="submit" class="btn p-0 m-0" id="searchButton"><i class="ri-search-2-line iconSearch"></i></button> -->
                                    <input class="form-check-input mt-2" type="checkbox" id="inlineCheckbox1" value="option1" class="checkBox">
                                </div>
                                <div class="col-xl-10 col-lg-9 col-9 text-center">
                                    <button type="button" id="" class="btn filterButtons "><i class="ri-book-open-fill"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <div class="row">
                                <div class="col-xl-2 col-lg-3 col-3 text-center ps-2">
                                    <!-- <button type="submit" class="btn p-0 m-0" id="searchButton"><i class="ri-search-2-line iconSearch"></i></button> -->
                                    <input class="form-check-input mt-2" type="checkbox" id="inlineCheckbox1" value="option1" class="checkBox">
                                </div>
                                <div class="col-xl-10 col-lg-9 col-9 text-center">
                                    <button type="button" id="" class="btn filterButtons DeleteProfile"> <i class="ri-briefcase-4-fill"></i> </button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- 
                    <div class="row mt-1">
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <select class="form-control select dropDnLightPink" id="member_data" name="MemberData">
                                <option selected value="FD">Free Data</option>
                                <option value="BD">Bulk Data</option>
                                <option value="LD">Lead Data</option>
                                <option value="PD">Paid Data</option>
                                <option value="MD">Marriage Data</option>
                                <option value="WD">Wedding Data</option>
                            </select>
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <select class="form-control select dropDnLightPink" id="member_page" name="MemberPage">
                                <option value="0">Page</option>
                                <?php

                                $GetFeedbacks = mysqli_query($con, "SELECT fdId,feedback FROM feedback WHERE feedbackData = 'Free Data'");
                                foreach ($GetFeedbacks as $GetFeedbacksResult) {
                                    echo '<option value="' . $GetFeedbacksResult["fdId"] . '">' . $GetFeedbacksResult["feedback"] . '</option>';
                                }

                                ?>
                            </select>
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <input type="text" id="member_canid" name="MemberCanID" class="form-control inputFieldWhite" placeholder="ID Search">
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <input type="text" id="member_wordsearch" name="MemberWordSearch" class="form-control inputFieldWhite" placeholder="Search">
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <input type="text" id="member_mobile" name="MemberMobile" class="form-control inputFieldWhite" placeholder="Mobile">
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <select class="form-select select dropDnGreen" id="member_match" name="MemberMatch">
                                <option hidden value="">Match</option>
                                <option value="SM">Star Match</option>
                                <option value="MM">My Match</option>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <select class="form-select select dropDnGreen" id="member_send" name="MemberSend">
                                <option hidden value="">Send</option>
                                <option value="PROFILESEND">Profile Send</option>
                                <option value="INTERESTSEND">Interest Send</option>

                            </select>
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <select class="form-select select dropDnGreen" id="member_receive" name="MemberReceive">
                                <option hidden value="">Receive</option>
                                <option value="PROFILERECIEVE">Profile Receive</option>
                                <option value="INTERESTRECIEVE">Interest Receive</option>
                            </select>
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <select class="form-select select dropDnLightPink" id="member_assist" name="MemberAssist">
                                <option hidden value="">Assist</option>

                            </select>
                        </div> -->
                    <!-- <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <button class="form-control btnBlue" type="button" >Clear All</button>
                        </div> -->
                    <!-- <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-3 text-center mt-1">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" class="checkBox">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-4 text-center">
                                    <a data-bs-toggle="collapse" href="#collapseExample" role="button" id="filter_link" name="FilterLink"><i class="ri-filter-2-line iconFilter"></i></a>
                                </div>
                                <div class="col-xl-5 col-lg-5 col-5 text-center">
                                    <button type="submit" class="btn p-0 m-0" id="searchButton"><i class="ri-search-2-line iconSearch"></i></button>
                                </div>
                            </div>
                        </div> -->
                    <!-- <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-3 text-center ps-2"> -->
                    <!-- <button type="submit" class="btn p-0 m-0" id="searchButton"><i class="ri-search-2-line iconSearch"></i></button> -->
                    <!-- <button type="button" id="clearAll" class="btn refreshBtn pt-0 mt-0"><i class="ri-refresh-line refreshIcon"></i></button>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-4 text-center">
                                    <select class="form-control select py-1 text-black ps-2 arrowHide" id="page_length" name="PageLength">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                        <option selected value="100">100</option>
                                      
                                    </select>
                                </div>
                                <div class="col-xl-4 col-lg-5 col-5 text-center ps-0 ms-0 pt-1">
                                    <h6 class="" id="PageResult"></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-2 mt-1 d-flex d-md-none">
                            <div class="SwitchScreenContent me-2">
                                <input type="checkbox" class="ScreenCheck d-none" id="StarCheck">
                                <label class="btn shadow-none" for="StarCheck"><i class="bi bi-star-fill"></i></label>
                            </div>
                            <div class="SwitchScreenContent me-2">
                                <input type="checkbox" class="ScreenCheck d-none" id="EduCheck">
                                <label class="btn shadow-none" for="EduCheck"><i class="bi bi-book-half"></i></label>
                            </div>
                            <div class="SwitchScreenContent me-2">
                                <input type="checkbox" class="ScreenCheck d-none" id="JobCheck">
                                <label class="btn shadow-none" for="JobCheck"><i class="bi bi-briefcase-fill"></i></label>
                            </div>
                            <div class="SwitchScreenContent me-2">
                                <input type="checkbox" class="ScreenCheck d-none" id="PhoneCheck">
                                <label class="btn shadow-none" for="PhoneCheck"><i class="bi bi-telephone-fill"></i></label>
                            </div>
                        </div> 
                    </div>
                    -->


                    <div>
                        <input type="number" value="1" id="PageNumber" name="PageNumber" hidden>

                        <div class="switch">
                            <input type="checkbox" class="btn-mobile-check d-none" id="HideMobileShowButton">
                            <label class="btn shadow-none" for="HideMobileShowButton"><i class="ri-arrow-left-s-fill"></i></label>
                        </div>

                        <div class="switch">
                            <input type="checkbox" class="btn-check" id="HideShowButton">
                            <label class="btn shadow-none" for="HideShowButton"><i class="ri-arrow-left-s-fill"></i></label>
                        </div>

                    </div>

                </form>
            </div>



            <div class="container-fluid px-1 px-lg-2" id="ViewData">


            </div>

            <div class="loader">
                <div class="">
                    <img class="img-fluid" src="../IMAGES/matrimony.gif">
                    <h4 class="text-center">LOADING</h4>
                </div>
            </div>



        </section>

    </main>



    <!-- Footer include -->
    <?php include('../MAIN/Footer.php'); ?>



    <script>



        /////////////////////  BULK LINK SEND  ////////////////////////////////////


            //Check all checkboxes with number in the same row
            $(document).on('click','.MainSelector',function(){
                let TableRow = $(this).closest('tr');
                if($(this).is(':checked')){
                    // console.log("Checked all");
                    // let BulkPhoneNumber  = TableRow.find(".BulkPhoneCheckbox").val();
                    TableRow.find(".BulkPhoneCheckbox").prop('checked',true);
                    TableRow.find(".ReferPhoneCheckbox").prop('checked',true);
                }else{
                    // console.log("Not checked");
                    TableRow.find(".BulkPhoneCheckbox").prop('checked',false);
                    TableRow.find(".ReferPhoneCheckbox").prop('checked',false);
                }
            })


            //Send link via whatsapp to selected numbers in the same row
            $(document).on('click','.SendWhatsappLinkButton',function(a){
                a.preventDefault();
                let SendLinkButtonType = $(this).data('buttontype');
                let LinkSendingArray = [];
                let LinkSendIdArray = [];
                let LinkSendDataType = $(this).data("datatype");
                let LinktoSend = 'https://matrimony.showmydemo.in/ADMIN/FreeRegister.php?Staff=';

                if(SendLinkButtonType == 'BULK'){
                    $(".BulkPhoneCheckbox:checked,.ReferPhoneCheckbox:checked").each(function() {
                        if($(this).val() != 0){
                            LinkSendingArray.push($(this).val());
                        }
                    });
                    $(".MainSelector:checked").each(function() {
                        LinkSendIdArray.push($(this).val());
                    });
                }else{

                    let LinkSendTableRow = $(this).closest('tr');
                    let LinkSendId = LinkSendTableRow.find(".MainSelector").val();
                    let BulkPhoneNumber  = ((LinkSendTableRow.find(".BulkPhoneCheckbox")).is(':checked') == true) ? LinkSendTableRow.find(".BulkPhoneCheckbox").val() : 0 ;
                    let ReferencePhoneNumber  = ((LinkSendTableRow.find(".ReferPhoneCheckbox")).is(':checked') == true) ? LinkSendTableRow.find(".ReferPhoneCheckbox").val() : 0 ;
                    //console.log(BulkPhoneNumber);
                    //console.log(ReferencePhoneNumber);
                
                    if(BulkPhoneNumber != 0){
                        LinkSendingArray.push(BulkPhoneNumber);
                    }
                    if(ReferencePhoneNumber != 0){
                        LinkSendingArray.push(ReferencePhoneNumber);
                    }

                    LinkSendIdArray.push(LinkSendId);
                }


                if(LinkSendingArray.length > 0 && LinkSendIdArray.length > 0){
                    $.ajax({
                        url: "SendWhatsapp.php",
                        type: "POST",
                        data: {
                            LinktoSend: LinktoSend,
                            LinkSendingArray: LinkSendingArray,
                            LinkSendDataType: LinkSendDataType,
                            LinkSendIdArray:LinkSendIdArray
                        },
                        success: function(data) {
                            console.log(data);
                            var LinkSendResponse = JSON.parse(data);
                            if (LinkSendResponse.LinkSend == 1) {
                                toastr.success('Link Send Successfully');
                                $('#FilterData').submit();
                            } else if(LinkSendResponse.LinkSend == 0) {
                                toastr.warning('Please select atleast one profile');
                            }else {
                                toastr.error('Failed Sending Link');
                            }
                        }
                    });
                }else{
                    toastr.warning("Please select atleast one profile");
                }
                // console.log(LinkSendingArray);
                // console.log(LinkSendIdArray);

               
            })


            //Check row if any one of the phone number check box is selected and uncheck row if both numbers are unchecked
            $(document).on('click','.BulkPhoneCheckbox,.ReferPhoneCheckbox',function(){
                //console.log("hello");
                let SelectAnyTableRow = $(this).closest('tr');
                console.log(SelectAnyTableRow);
                if($(this).is(':checked')){
                    SelectAnyTableRow.find('.MainSelector').prop('checked',true);
                }else{
                    if(SelectAnyTableRow.find('.BulkPhoneCheckbox').is(':checked') == false && SelectAnyTableRow.find('.ReferPhoneCheckbox').is(':checked') == false){
                        SelectAnyTableRow.find('.MainSelector').prop('checked',false);
                    }
                }
            })


            //Check and uncheck all checkboxes in bulkdata dom
            $(document).on('click','.bulkDataSelectAll',function(){
                if($(this).is(':checked')){
                    $('.BulkPhoneCheckbox').each(function(){
                        $('.BulkPhoneCheckbox').prop('checked',true);
                    });
                    $('.ReferPhoneCheckbox').each(function(){
                        $('.ReferPhoneCheckbox').prop('checked',true);
                    });
                    $('.MainSelector').each(function(){
                        $('.MainSelector').prop('checked',true);
                    });
                }else{
                    $('.BulkPhoneCheckbox').each(function(){
                        $('.BulkPhoneCheckbox').prop('checked',false);
                    });
                    $('.ReferPhoneCheckbox').each(function(){
                        $('.ReferPhoneCheckbox').prop('checked',false);
                    });
                    $('.MainSelector').each(function(){
                        $('.MainSelector').prop('checked',false);
                    });
                }
            });

        /////////////////////  BULK LINK SEND  ////////////////////////////////////


        ///////////////////// SET CURRENT DATA AND TIME  //////////////////////////

            setInterval(SetCurrentTime, 10000);

            function SetCurrentDate(){
                const DateToday = new Date();
                let Year = DateToday.getFullYear();
                let Month = DateToday.getMonth() + 1;
                let Day = DateToday.getDate();
                //console.log(Month);
                $('.BulkDaySelect').val(Day).change();
                $('.BulkMonthSelect').val(Month).change();
                $('.BulkYearSelect').val(Year).change();
            }


            function SetCurrentTime(){
                const TimeToday = new Date();
                //console.log( TimeToday.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true }) );
                let TimeString = TimeToday.toLocaleString('en-US', { hour: 'numeric'});
                let Hour = TimeString.slice(0,2);
                let AMPM = TimeString.slice(TimeString.length-2,TimeString.length);
                //console.log(AMPM);
                //console.log(TimeString);
                $('.BulkHourSelect').val(Hour.trim()).change();
                $('.BulkAMPMSelect').val(AMPM).change();
        
            }


        ///////////////////// SET CURRENT DATA AND TIME  //////////////////////////



        //////////////////// DATA FROM DUPLICATE //////////////////////////////////


            var FindMember = '<?= $FromDuplicateSearchValue ?>';
            var DataTypeOfMember
            var MemberId = 0;
            if(FindMember != ''){
                MemberId = (FindMember.substring(5,FindMember.length-6)).trim();
                DataTypeOfMember = (FindMember.substring(0,3)).trim();
                $('#member_data').val(DataTypeOfMember.trim()).change();
                //$('#FilterData').submit();
            }

            console.log(MemberId);
            console.log(DataTypeOfMember);


            $(document).ready(function(){

                if(FindMember != ''){

                    $.ajax({
                        url: "FilterExtras.php",
                        type: "POST",
                        data: {
                            FindProfileStatusMemberId: MemberId,
                            FindProfileStatusDataType: DataTypeOfMember
                        },
                        success: function(data) {
                            console.log(data);
                            var ProfileStatus = JSON.parse(data);
                            $('#member_profile_status').val(ProfileStatus.ShowProfileStatus).change();
                            $.ajax({
                                type: "POST",
                                url: "FilterExtras.php",
                                data: {
                                    GetPageType: DataTypeOfMember
                                },
                                success: function(data) {
                                    // member_page
                                    //console.log('Religion');
                                    console.log(data);
                                    $('#member_page').html(data);
                                    $('#member_page').val(ProfileStatus.ShowProfileFeedback).change();
                                    $('#FilterData').submit();
                                }
                            });   
                        }
                    });

                    //$('#FilterData').submit();
                }else{
                    $('#FilterData').submit();
                }
                
            });
       
        //////////////////// DATA FROM DUPLICATE //////////////////////////////////


        ////////////////////////  Navbar Operations  //////////////////

            $(document).on('change', '#nav_select_branch', function() {
                var BranchId = $(this).val();
                var FormName = 'Navbar';
                console.log()
                $.ajax({
                    url: "MasterExtras.php",
                    type: "POST",
                    data: {
                        ListAgency: BranchId,
                        FormName: FormName
                    },
                    success: function(data) {
                        console.log(data);
                        $('#nav_select_agency').html(data);
                    }
                });
            });
            

        ////////////////////////  Navbar Operations  //////////////////

        ////////////////////////  Delete Member  /////////////////////

            $(document).on('click', '#DeleteProfileButton', function() {

                if(confirm("Do you want to delete these data?") == true){
                    var DeleteArray = [];
                    $(".MainSelector:checked").each(function() {
                        DeleteArray.push($(this).val());
                    });
                    if(DeleteArray.length > 0){
                        var DeleteMemberData = $(".MainSelector:checked").data('datatype');
                        console.log(DeleteMemberData);
                        console.log(DeleteArray);
                        $.ajax({
                            url: "MasterOperations.php",
                            type: "POST",
                            data: {
                                DeleteMemberId: DeleteArray,
                                DeleteMemberData: DeleteMemberData
                            },
                            success: function(data) {
                                console.log(data);
                                var DeleteResponse = JSON.parse(data);
                                if (DeleteResponse.Status == 1) {
                                    toastr.success('Profile(s) Deleted Successfully');
                                    $('#FilterData').submit();
                                } else {
                                    toastr.error('Failed Deleting Member');
                                }
                            }
                        });
                    }else{
                        toastr.warning('Please Select Atleast One Data');
                    }
                }else{
                    toastr.info('Cancelled');
                }
            });

        ////////////////////////  Delete Member  /////////////////////

        /////////////// Base operations ////////////////////////////


            $(document).on('click','.bulkCopy,.referCopy,.whatsappCopy,.residenceCopy',function(c){
                c.preventDefault();
            });

            //Initiate Clipboard js in company Id
            new ClipboardJS('#clipboardIcon');

            //Initiate Clipboard js in Link copy
            var StaffCopy = new ClipboardJS('.linkBtn');
            StaffCopy.on('success', function(e) {
                toastr.info('Link Copied');
            });


            //Initiate Clipboard js in bulk number copy
            var BulkNumberCopy = new ClipboardJS('.bulkCopy');
            BulkNumberCopy.on('success', function(e) {
                toastr.info('Mobile Number Copied');
            });


            //Initiate Clipboard js in Refer number copy
            var ReferNumberCopy = new ClipboardJS('.referCopy');
            ReferNumberCopy.on('success', function(e) {
                toastr.info('Reference Number Copied');
            });

            //Initiate Clipboard js in Whatsapp number copy
            var WhatsappNumberCopy = new ClipboardJS('.whatsappCopy');
            WhatsappNumberCopy.on('success', function(e) {
                toastr.info('Whatsapp Number Copied');
            });


            //Initiate Clipboard js in Residence number copy
            var ResidenceNumberCopy = new ClipboardJS('.residenceCopy');
            ResidenceNumberCopy.on('success', function(e) {
                toastr.info('Residence Number Copied');
            });


            //Initiate popover on 
            const popover = new bootstrap.Popover('.modalPopover', {
                container: '.modal-body'
            });



            //View Company Id
            $(document).on('click', '.ViewCompanyId', function(e) {
                e.preventDefault();
                var CustomerId = $(this).data('custvalue');
                var CompanyDataType = $(this).data('type');
                $('#view_company_id').text('');
                console.log(CustomerId);
                console.log(CompanyDataType);
                $.ajax({
                    type: "POST",
                    url: "FilterExtras.php",
                    data: {
                        CustomerId: CustomerId,
                        CompanyDataType: CompanyDataType
                    },
                    beforeSend: function() {
                        $('#SmallLoader').show();
                        $('#ViewCompanyIdCont').hide();
                        $('#CompanyIdModal').modal('show');
                    },
                    success: function(data) {
                        console.log(data);
                        $('#SmallLoader').hide();
                        $('#ViewCompanyIdCont').show();
                        var CompanyResponse = JSON.parse(data);
                        if (CompanyResponse.CompanyStatus == 1) {
                            $('#view_company_id').text(CompanyResponse.CompanyId);
                        } else {
                            $('#view_company_id').text('No Company Id Found');
                        }
                    }
                });

            });


            document.onreadystatechange = function() {
                if (document.readyState !== "complete") {
                    document.querySelector(
                        ".mainContents").style.visibility = "hidden";
                    document.querySelector(
                        ".loader").style.visibility = "visible";
                } else {
                    document.querySelector(
                        ".loader").style.display = "none";
                    document.querySelector(
                        ".mainContents").style.visibility = "visible";
                }
            };

            //Enable virtual select
            VirtualSelect.init({
                ele: '.Newselect',
                //dropboxWidth:'500px',
                //multiple: true
            });

            VirtualSelect.init({
                ele: '.ExtendedSelect',
                dropboxWidth: '450px',
                //multiple: true
            });


            //Initiate onload functions
            ShowReligion();
            ShowEducationCat();
            ShowJobCat();
            ShowCountry();
            ShowStar();
            ShowDistrict();
            ShowJobType();


        /////////////// Base operations ////////////////////////////


        /////////////// View All Images and Operations ////////////

            //View all customer Images
            $(document).on('click', '.ViewCustomerImages', function(v) {
                v.preventDefault();
                var CustomerProfileId = $(this).data('profileid');
                var DataType = $(this).data('datatype');
                //$('.MasterImageStoreId').val(MasterId);
                //console.log(CustomerProfileId);
                $('#ViewImagesModal').modal('show');
                ViewMasterImages(CustomerProfileId, DataType); //View Images Function
            });


            //View Images Function
            function ViewMasterImages(MasterId, DataType) {
                $.ajax({
                    url: "MasterExtras.php",
                    type: "POST",
                    data: {
                        ViewImagesMasterId: MasterId,
                        FormName: "CUSTOMER",
                        DataType: DataType
                    },
                    beforeSend: function() {
                        $('#SmallLoaderViewImages').show();
                        $('#ViewImages').hide();
                    },
                    success: function(data) {
                        $('#ViewImages').show();
                        $('#SmallLoaderViewImages').hide();
                        $('#ViewImages').html(data);
                    },
                });
            }



            //Make Image as Main
            $(document).on('click', '.MakeMainImageBtn', function() {
                var PrimaryImageId = $(this).val();
                var PrimaryMasterId = $(this).data('masterid');
                var DataType = $(this).data('datatype');
                console.log(PrimaryImageId);
                console.log(PrimaryMasterId);
                var ConfirmPrimary = confirm("Do you want to make this image primary?");
                if (ConfirmPrimary == true) {
                    $.ajax({
                        url: "MasterOperations.php",
                        type: "POST",
                        data: {
                            PrimaryImageId: PrimaryImageId,
                            PrimaryMasterId: PrimaryMasterId,
                            MakeMainType: "CUSTOMER",
                            DataType: DataType
                        },
                        beforeSend: function() {

                        },
                        success: function(data) {
                            console.log(data);
                            var PrimaryResponse = JSON.parse(data);
                            if (PrimaryResponse.PrimaryImage == 1) {
                                toastr.success('Made Image As Main');
                                ViewMasterImages(PrimaryMasterId, DataType);
                                $('#FilterData').submit();

                            } else {
                                toastr.success('Cannot Made Image As Main');
                            }
                        },
                    });
                }
            });

        /////////////// View All Images and Operations ////////////

        

        /////////////////// Free data Feedback Functions  ///////////////////////

            //Free data feedback open popup
            $(document).on('click', '.btnFeedback', function() {
                var CustFeedbackId = $(this).val();
                var FeedbackType = $(this).data('feedback-type');
                $('#feed_customer_id').val(CustFeedbackId);
                $('.PartPreference').val($(this).data('looking-for'));
                $('.FeedbackRemarks').val($(this).data('remarks'));

                if(FeedbackType == 'FeedbackId'){
                    $('#FreeDataFeedbacks').show();
                    $('#PaidDataFeedbacks').hide();
                    $('#MarriageDataFeedbacks').hide();
                    $('#WeddingDataFeedbacks').hide();
                    $('#feedback_type').val('FD');
                    $('#FeedbackId'+ $(this).data('feedback-id')).prop('checked',true);
                }else if(FeedbackType == 'PaidFeedbackId'){
                    $('#FreeDataFeedbacks').hide();
                    $('#PaidDataFeedbacks').show();
                    $('#MarriageDataFeedbacks').hide();
                    $('#WeddingDataFeedbacks').hide();
                    $('#feedback_type').val('PD');
                    $('#PaidFeedbackId'+ $(this).data('feedback-id')).prop('checked',true);
                }else if(FeedbackType == 'MarriageFeedbackId'){
                    $('#FreeDataFeedbacks').hide();
                    $('#PaidDataFeedbacks').hide();
                    $('#MarriageDataFeedbacks').show();
                    $('#WeddingDataFeedbacks').hide();
                    $('#feedback_type').val('MD');
                    $('#MarriageFeedbackId'+ $(this).data('feedback-id')).prop('checked',true);
                }else if(FeedbackType == 'WeddingFeedbackId'){
                    $('#FreeDataFeedbacks').hide();
                    $('#PaidDataFeedbacks').hide();
                    $('#MarriageDataFeedbacks').hide();
                    $('#WeddingDataFeedbacks').show();
                    $('#feedback_type').val('WD');
                    $('#WeddingFeedbackId'+ $(this).data('feedback-id')).prop('checked',true);
                }

                $('#FeedBackModal').modal('show');
               
            });


            $('#FreeFeedbackForm').submit(function(e) {
                e.preventDefault();
                var FeedbackData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "FeedbackOperations.php",
                    data: FeedbackData,
                    beforeSend: function() {
                        $('#FeedBackModal').modal('hide');
                        $('#feed_customer_id').val('');
                        $('#FreeFeedbackForm')[0].reset();
                    },
                    success: function(data) {
                        console.log(data);
                        var FeedbackResponse = JSON.parse(data);
                        if (FeedbackResponse.FeedbackStatus == 1) {
                            toastr.success('Successfully Added Feedback');
                            $('#FilterData').submit();
                        } else {
                            toastr.error('Failed Adding Feedback');
                        }
                    },
                    cache: false,
                    processData: false,
                    contentType: false,
                });
            });

        /////////////////// Free data Feedback Functions ////////////////////////

     

        /////////////////// Lead data ////////////////////////

            //Select lead data on input keyup 
            $(document).on('keyup', '.LeadDataRemark,.LeadDataReferName,.LeadDataReferNumber,.LeadDataName', function() {
                $('.leadDataSelect').prop('checked', false);
                var KeyId = $(this).attr('data-id');
                //console.log(KeyId);
                $('#LEAD-' + KeyId).prop('checked', true);
            });


            //lead Feedback submit
            $(document).on('submit', '#LeadFeedbackForm', function(b) {
                b.preventDefault();
                if($('.leadDataSelect').is(':checked')){
                    //console.log("heloo");
                    var LeadFeedbackIdVar = $('.leadDataSelect:checked').attr('id');
                }
                else{
                    var LeadFeedbackIdVar = $('.leadDataSelect:first').attr('id');
                    //console.log("Test");
                    //console.log(BulkFeedbackIdVar);
                }
                //var LeadFeedbackIdVar = $('.leadDataSelect:checked').attr('id');
                //console.log(LeadFeedbackIdVar);
                var LeadFeedbackId = LeadFeedbackIdVar.slice(5);
                //console.log(BulkFeedbackId);

                var LeadDataName = $('#LEADNAME-' + LeadFeedbackId).val();
                var LeadFeedbackRemark = $('#LEADREMARK-' + LeadFeedbackId).val();
                var LeadDataReferName = $('#LEADREFERNAME-' + LeadFeedbackId).val();
                var LeadDataReferNumber = $('#LEADREFERNUMBER-' + LeadFeedbackId).val();

                LeadFeedbackData = new FormData(this);
                LeadFeedbackData.append('LeadDataRemark', LeadFeedbackRemark);
                LeadFeedbackData.append('LeadDataReferName', LeadDataReferName);
                LeadFeedbackData.append('LeadDataReferNumber', LeadDataReferNumber);
                LeadFeedbackData.append('LeadDataFeedbackId', LeadFeedbackId);
                LeadFeedbackData.append('LeadDataFeedbackName', LeadDataName);


                $.ajax({
                    type: "POST",
                    url: "FeedbackOperations.php",
                    data: LeadFeedbackData,
                    success: function(data) {
                        console.log(data);
                        var LeadFeedbackResponse = JSON.parse(data);
                        if (LeadFeedbackResponse.LeadFeedbackStatus == 1) {
                            toastr.success('Successfully Added Lead Feedback');
                            // $('#FeedBackModal').modal('hide');
                            // $('#feedback_customer_id').val('');
                            // $('#FreeRegister')[0].reset();
                            $('#FilterData').submit();
                        } else {
                            toastr.error('Failed Adding Feedback');
                        }
                    },
                    cache: false,
                    processData: false,
                    contentType: false,
                });

            });

        /////////////////// Lead data ////////////////////////


        /////////////////// Bulk data ////////////////////////

            //Select bulk data on input keyup 
            $(document).on('keyup', '.BulkDataRemark,.BulkDataReferName,.BulkDataReferNumber,.BulkDataName', function() {
                $('.bulkDataSelect').prop('checked', false);
                var KeyId = $(this).attr('data-id');
                //console.log(KeyId);
                $('#BULK-' + KeyId).prop('checked', true);
            });



            //Bulk Feedback submit
            $(document).on('submit', '#BulkFeedbackForm', function(b) {
                b.preventDefault();
                if($('.bulkDataSelect').is(':checked')){
                    //console.log("heloo");
                    var BulkFeedbackIdVar = $('.bulkDataSelect:checked').attr('id');
                }
                else{
                    var BulkFeedbackIdVar = $('.bulkDataSelect:first').attr('id');
                    //console.log("Test");
                    //console.log(BulkFeedbackIdVar);
                }
                //var BulkFeedbackIdVar = $('.bulkDataSelect:checked').attr('id');
                console.log(BulkFeedbackIdVar);
                var BulkFeedbackId = BulkFeedbackIdVar.slice(5);
                console.log(BulkFeedbackId);


                var BulkDataName = $('#BULKNAME-' + BulkFeedbackId).val();
                var BulkFeedbackRemark = $('#BULKREMARK-' + BulkFeedbackId).val();
                var BulkDataReferName = $('#BULKREFERNAME-' + BulkFeedbackId).val();
                var BulkDataReferNumber = $('#BULKREFERNUMBER-' + BulkFeedbackId).val();

                BulkFeedbackData = new FormData(this);
                BulkFeedbackData.append('BulkDataRemark', BulkFeedbackRemark);
                BulkFeedbackData.append('BulkDataReferName', BulkDataReferName);
                BulkFeedbackData.append('BulkDataReferNumber', BulkDataReferNumber);
                BulkFeedbackData.append('BulkDataFeedbackId', BulkFeedbackId);
                BulkFeedbackData.append('BulkDataFeedbackName', BulkDataName);


                $.ajax({
                    type: "POST",
                    url: "FeedbackOperations.php",
                    data: BulkFeedbackData,
                    success: function(data) {
                        console.log(data);
                        var BulkFeedbackResponse = JSON.parse(data);
                        if (BulkFeedbackResponse.BulkFeedbackStatus == 1) {
                            toastr.success('Successfully Added Bulk Feedback');
                            // $('#FeedBackModal').modal('hide');
                            // $('#feedback_customer_id').val('');
                            // $('#FreeRegister')[0].reset();
                            $('#FilterData').submit();
                        } else {
                            toastr.error('Failed Adding Feedback');
                        }
                    },
                    cache: false,
                    processData: false,
                    contentType: false,
                });

            });

        /////////////////// Bulk data ////////////////////////


        /////////////////// Search and Filter ////////////////////////

            //Change feedbacks according to data type
            $('#member_data').change(function() {
                var GetPageType = $(this).val();
                //console.log(GetPageType);
                $.ajax({
                    type: "POST",
                    url: "FilterExtras.php",
                    data: {
                        GetPageType: GetPageType
                    },
                    success: function(data) {
                        // member_page
                        //console.log('Religion');
                        console.log(data);
                        $('#member_page').html(data);

                    }
                });
            });


            //View All datas
            $('#FilterData').submit(function(e) {
                e.preventDefault();
                //console.log('submit');
                var FilterFormData = new FormData(this);
                //console.log(FilterFormData);
                var NavBranchId = $('#nav_select_branch').val();
                var NavAgencyId = $('#nav_select_agency').val();
                FilterFormData.append('FilterBranch', NavBranchId);
                FilterFormData.append('FilterAgency', NavAgencyId);
                FilterFormData.append('FindMemberId', MemberId);


                var FreeCheckbox = $('.FreeDataSelect:checked').length;
                if (FreeCheckbox == 1) {
                    var FreeSelectedID = $('.FreeDataSelect:checked').attr('id');
                    console.log(FreeSelectedID);
                    FilterFormData.append('MatcherId', FreeSelectedID);
                } else {
                    console.log(FreeCheckbox);
                }


                $.ajax({
                    type: "POST",
                    url: "FilterData.php",
                    data: FilterFormData,
                    beforeSend: function() {
                        $('.loader').show();
                        $('#ViewData').hide();
                        $('#PageResult').html('');
                    },
                    success: function(data) {
                        $('#ViewData').show();
                        $('.loader').hide();

                        //console.log(data);
                        $('#ViewData').html(data);
                        SetCurrentDate();
                        SetCurrentTime();
                        //HideShow();
                    },
                    cache: false,
                    processData: false,
                    contentType: false,
                });
            });

            //Change pagelength
            $('#page_length').change(function() {
                $('#PageNumber').val('1');
            });


            //Clear all filters
            $('#clearAll').click(function() {

                if(FindMember != ''){
                    location.replace('Lapview.php');
                }else{
                    $('#FilterData')[0].reset();
                    $('#FilterData').submit();
                }

            });

        /////////////////// Search and Filter ////////////////////////



        /////////////////// Dropdown Actions ////////////////////////

            // Get all religion
            function ShowReligion() {
                var GetReligion = 'FetchReligion';
                $.ajax({
                    type: "POST",
                    url: "FilterExtras.php",
                    data: {
                        GetReligion: GetReligion
                    },
                    success: function(data) {
                        //console.log('Religion');
                        //console.log(data);
                        var ResultReligionData = JSON.parse(data);
                        document.querySelector('.SelectReligion').setOptions(ResultReligionData);
                    }
                });
            }


            //Get all education categories
            function ShowEducationCat() {
                var GetEducationCat = 'FetchEducationCat';
                $.ajax({
                    type: "POST",
                    url: "FilterExtras.php",
                    data: {
                        GetEducationCat: GetEducationCat
                    },
                    success: function(data) {
                        //console.log(data);
                        var ResultEducationCatData = JSON.parse(data);
                        document.querySelector('.SelectEdCat').setOptions(ResultEducationCatData);
                    }
                });
            }


            //Get all job categories
            function ShowJobCat() {
                var GetJobCat = 'FetchJobCat';
                $.ajax({
                    type: "POST",
                    url: "FilterExtras.php",
                    data: {
                        GetJobCat: GetJobCat
                    },
                    success: function(data) {
                        //console.log('Job cat');
                        //console.log(data);
                        var ResultJobCatData = JSON.parse(data);
                        document.querySelector('.SelectJobCat').setOptions(ResultJobCatData);
                    }
                });
            }



            //Get all job types
            function ShowJobType() {
                var GetJobTypes = 'FetchJobType';
                $.ajax({
                    type: "POST",
                    url: "FilterExtras.php",
                    data: {
                        GetJobTypes: GetJobTypes
                    },
                    success: function(data) {
                        //console.log('Job cat');
                        //console.log(data);
                        var ResultJobTypeData = JSON.parse(data);
                        document.querySelector('.SelectJobType').setOptions(ResultJobTypeData);
                    }
                });
            }

            //Get all country
            function ShowCountry() {
                var GetCountry = 'FetchCountry';
                $.ajax({
                    type: "POST",
                    url: "FilterExtras.php",
                    data: {
                        GetCountry: GetCountry
                    },
                    success: function(data) {
                        //console.log('country');
                        //console.log(data);
                        var ResultCountryData = JSON.parse(data);
                        document.querySelector('.SelectCountry').setOptions(ResultCountryData);
                    }
                });
            }


            //Get all star
            function ShowStar() {
                var GetStar = 'FetchStar';
                $.ajax({
                    type: "POST",
                    url: "FilterExtras.php",
                    data: {
                        GetStar: GetStar
                    },
                    success: function(data) {
                        //console.log('star');
                        //console.log(data);
                        var ResultStarData = JSON.parse(data);
                        document.querySelector('.SelectStar').setOptions(ResultStarData);
                    }
                });
            }


            //Get all district
            function ShowDistrict() {
                var GetDistrict = 'FetchDistrict';
                $.ajax({
                    type: "POST",
                    url: "FilterExtras.php",
                    data: {
                        GetDistrict: GetDistrict
                    },
                    success: function(data) {
                        //console.log('district');
                        //console.log(data);
                        var ResultDistrictData = JSON.parse(data);
                        document.querySelector('.SelectDistrict').setOptions(ResultDistrictData);
                    }
                });
            }

            ///Select caste based on religion
            $('.SelectReligion').click(function() {
                $('.SelectReligion').change(function() {
                    var ReligionId = $(this).val();
                    if (ReligionId == '') {
                        ReligionId = 0
                    }
                    // console.log(ReligionId);
                    $.ajax({
                        type: "POST",
                        url: "FilterExtras.php",
                        data: {
                            ReligionId: ReligionId
                        },
                        success: function(data) {
                            //console.log(data);
                            var ResultCasteData = JSON.parse(data);
                            document.querySelector('.SelectCaste').setOptions(ResultCasteData);
                        }
                    });
                });
            });



            //Select education type based on education category
            $('.SelectEdCat').change(function() {
                var EdCatId = $(this).val();
                // $.ajax({
                //     type: "POST",
                //     url: "FilterExtras.php",
                //     data: {
                //         EdCatId: EdCatId
                //     },
                //     success: function(data) {
                //         console.log(data);
                //         var ResultEdTypeData = JSON.parse(data);
                //         document.querySelector('.SelectEdType').setOptions(ResultEdTypeData);
                //     }
                // });
                if (EdCatId.length === 0) {
                    EdCatId.push(0);
                } else {
                    //EdCatId.pop(0);
                    $.ajax({
                        type: "POST",
                        url: "FilterExtras.php",
                        data: {
                            EdCatId: EdCatId
                        },
                        success: function(data) {
                            //console.log(data);
                            var ResultEdTypeData = JSON.parse(data);
                            document.querySelector('.SelectEdType').setOptions(ResultEdTypeData);
                        }
                    });
                }
                console.log(EdCatId);
            });


            //Select job type based on category
            // $('.SelectJobCat').change(function() {
            //     var JobCatId = $(this).val();
            //     if (JobCatId.length === 0) {
            //         JobCatId.push(0);
            //     }
            //     // console.log(JobCatId);
            //     $.ajax({
            //         type: "POST",
            //         url: "FilterExtras.php",
            //         data: {
            //             JobCatId: JobCatId
            //         },
            //         success: function(data) {
            //             //console.log(data);
            //             var ResultJobTypeData = JSON.parse(data);
            //             document.querySelector('.SelectJobType').setOptions(ResultJobTypeData);
            //         }
            //     });
            // });


            //Select State based on country
            $('.SelectCountry').change(function() {
                var CountryId = $(this).val();
                if (CountryId.length === 0) {
                    CountryId.push(0);
                }
                // console.log(CountryId);
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
                    }
                });
            });


        /////////////////// Dropdown Actions ////////////////////////


        /////////////////// Screenshot and other operations ////////////////////////

            $('#HideShowButton').change(function() {
                HideShow();
            });

            $('#HideMobileShowButton').change(function() {
                HideMobileShow();
            });

            //Function to hide and show screenshot view
            function HideShow() {
                var Checked = $('#HideShowButton').is(':checked');
                if (Checked === true) {
                    openFullscreen();
                    $('.mobileView').show();
                    $('.lapView').hide();
                    $('.MobileDisplay').hide();
                    $('#HideMobileShowButton').prop('disabled', true);
                } else {
                    $('#HideMobileShowButton').prop('disabled', false);
                    closeFullscreen();
                    $('.mobileView').hide();
                    if ($('#HideMobileShowButton').is(':checked') == true) {
                        $('.MobileDisplay').show();
                        $('.lapView').hide();
                    } else {
                        $('.MobileDisplay').hide();
                        $('.lapView').show();
                    }
                }
            }

            //Function to hide and show mobile view
            function HideMobileShow() {

                var Checked = $('#HideMobileShowButton').is(':checked');
                console.log(Checked);
                if (Checked === true) {
                    $('.MobileDisplay').show();
                    $('.lapView').hide();
                } else {
                    $('.MobileDisplay').hide();
                    $('.lapView').show();
                }
            }


            $('#PhoneCheck,#JobCheck,#EduCheck,#StarCheck').click(function() {
                HideScreenShotContents();
            });


            function HideScreenShotContents() {
                if ($('#PhoneCheck').is(':checked') == true) {
                    $('.ScreenshotViewNumber').hide();
                    $('.ViewDetailsContainer').height('38vh');
                } else {
                    $('.ScreenshotViewNumber').show();
                    $('.ViewDetailsContainer').height('45vh');
                }
                if ($('#JobCheck').is(':checked') == true) {
                    $('.ScreenshotViewJob').hide();
                } else {
                    $('.ScreenshotViewJob').show();
                }
                if ($('#EduCheck').is(':checked') == true) {
                    $('.ScreenshotViewEducation').hide();
                } else {
                    $('.ScreenshotViewEducation').show();
                }
                if ($('#StarCheck').is(':checked') == true) {
                    $('.ScreenshotViewStar').hide();
                    $('.ScreenshotViewNativeSmall').hide();
                    $('.ScreenshotViewNativeBig').show();
                } else {
                    $('.ScreenshotViewStar').show();
                    $('.ScreenshotViewNativeSmall').show();
                    $('.ScreenshotViewNativeBig').hide();
                }


                if ($('#PhoneCheck').is(':checked') == true && $('#JobCheck').is(':checked') == true && $('#EduCheck').is(':checked') == true) {
                    $('.ViewDetailsContainer').height('35vh');
                } else if ($('#PhoneCheck').is(':checked') == true && $('#JobCheck').is(':checked') == false && $('#EduCheck').is(':checked') == false) {

                }
                $('.ImageBox,.custmobileimg').height($('.ScreenShotViewMobile').height() - $('.ViewDetailsContainer').height());
                // $('.custmobileimg').height($('.ScreenShotViewMobile').height() - $('.ViewDetailsContainer').height());




                // if($('#EduCheck').is(':checked') == true && $('#JobCheck').is(':checked') == true && $('#PhoneCheck').is(':checked') == true){
                //     $('.ImageBox').height('+20vh');
                //     $('.custmobileimg').height('+20vh');
                //     $('.ViewDetailsContainer').height('-15vh');
                // }
                // else if($('#EduCheck').is(':checked') == false && $('#JobCheck').is(':checked') == false && $('#PhoneCheck').is(':checked') == false){
                //     $('.ImageBox').height('-20vh');
                //     $('.custmobileimg').height('-20vh');
                //     $('.ViewDetailsContainer').height('+15vh');
                // }

            }


            var WholePage = document.documentElement;

            /* View in fullscreen */
            function openFullscreen() {
                if (WholePage.requestFullscreen) {
                    WholePage.requestFullscreen();
                } else if (WholePage.webkitRequestFullscreen) {
                    /* Safari */
                    WholePage.webkitRequestFullscreen();
                } else if (WholePage.msRequestFullscreen) {
                    /* IE11 */
                    WholePage.msRequestFullscreen();
                }
            }

            /* Close fullscreen */
            function closeFullscreen() {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.webkitExitFullscreen) {
                    /* Safari */
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) {
                    /* IE11 */
                    document.msExitFullscreen();
                }
            }


        /////////////////// Screenshot and other operations ////////////////////////



        /////////Matching Functions/////////////////////


            $(document).on('change', '#member_match', function() {
                var MatchingMethod = $(this).val();
                var FreeCheckbox = $('.FreeDataSelect:checked').length;
                if (FreeCheckbox == 1) {
                    var FreeSelectedID = $('.FreeDataSelect:checked').attr('id');
                    $.ajax({
                        type: "POST",
                        url: "FilterExtras.php",
                        data: {
                            SelectedMatchMethod: MatchingMethod,
                            SelectedMatcher: FreeSelectedID
                        },
                        success: function(data) {
                            console.log(data);
                            var FilterResponse = JSON.parse(data);
                            document.querySelector('#member_bride').setValue(FilterResponse.FilterGender); //Filter Gender
                            // document.querySelector('#member_religion').setValue(FilterResponse.FilterReligion); //Filter Religion
                            document.querySelector('#member_phystatus').setValue(FilterResponse.FilterPhyscialStatus); //Filter physical status
                            $.ajax({
                                type: "POST",
                                url: "FilterExtras.php",
                                data: {
                                    ReligionId: [0, FilterResponse.FilterReligion] //Pass as an array for the filtering to work
                                },
                                success: function(data) {
                                    var ResultCasteData = JSON.parse(data);
                                    document.querySelector('.SelectCaste').setOptions(ResultCasteData);
                                    document.querySelector('#member_caste').setValue([FilterResponse.FilterCaste]); //Filter caste
                                }
                            });
                            if (FilterResponse.FilterMaritalStatus === 'SelectAll') {
                                document.querySelector('#member_marstatus').toggleSelectAll(true);
                            } else {
                                document.querySelector('#member_marstatus').setValue(FilterResponse.FilterMaritalStatus);
                            }
                            if (FilterResponse.FilterReligion === 'SelectAll') {
                                document.querySelector('#member_religion').toggleSelectAll(true);
                            } else {
                                document.querySelector('#member_religion').setValue(FilterResponse.FilterReligion);
                            }
                            document.querySelector('#member_complexion').setValue(FilterResponse.FilterComplexion);
                            document.querySelector('#member_heightfrom').setValue(FilterResponse.FilterHeightFrom);
                            document.querySelector('#member_heightto').setValue(FilterResponse.FilterHeightTo);
                            document.querySelector('#member_agefrom').setValue(FilterResponse.FilterAgeFrom);
                            document.querySelector('#member_ageto').setValue(FilterResponse.FilterAgeTo);
                            //console.log((FilterResponse.FilterNearby).split(",")); split the string into an array using comma
                            document.querySelector('#member_district').setValue((FilterResponse.FilterNearby).split(","));




                            // console.log(FilterResponse.FilterGender);
                            // if(FilterResponse.FilterPhyscialStatus === 'SelectAll'){
                            //     document.querySelector('#member_phystatus').toggleSelectAll(true);
                            // }else{
                            //     document.querySelector('#member_phystatus').setValue(FilterResponse.FilterPhyscialStatus);
                            // }
                            // document.querySelector('#member_education').toggleSelectAll(true);
                            // if(FilterResponse.FilterReligion === 'SelectAll'){
                            //     document.querySelector('#member_religion').setValue(FilterResponse.FilterReligion);
                            //     //document.querySelector('#member_religion').toggleSelectAll(true);
                            //     console.log("heloo");
                            // }else{
                            //     document.querySelector('#member_religion').setValue(FilterResponse.FilterReligion);
                            // }
                        }
                    });


                } else {
                    console.log(FreeCheckbox);
                }


            });


        /////////Matching Functions/////////////////////




        ///////// Send-Receive Functions /////////////////////

            // Profile send as image
            $("#member_send").on('change', function() {
                var SendType = $(this).val();
                if (SendType == 'PROFILESEND') {
                    var FindSenderId = $('.SelectSender').attr('id');
                    var DataTypeSend = $('.SelectSender').data('datatype');
                    if (FindSenderId != null) {
                        //var SenderId = "Sender" + FindSenderId;
                        var SenderImageSection = document.getElementById("Sender" + FindSenderId);
                        var SendingArray = [];
                        $(".SendingList:checked").each(function() {
                            SendingArray.push($(this).attr('id'));
                        });
                        if (SendingArray.length > 0) {
                            console.log(SendingArray);
                            // console.log(FindSenderId);
                            // console.log(SenderId);
                            // console.log(SenderImageSection);
                            SenderImageSection.style.display = 'block';
                            html2canvas(document.getElementById("Sender" + FindSenderId), {
                                allowTaint: true,
                                useCORS: true
                            }).then(function(canvas) {
                                //var anchorTag = document.createElement("a");
                                //document.body.appendChild(anchorTag);
                                //document.getElementById("previewImg").appendChild(canvas);
                                //anchorTag.download = "filename.jpg";
                                //anchorTag.href = canvas.toDataURL();
                                //anchorTag.target = '_blank';
                                //anchorTag.click();/
                                var ImageData = canvas.toDataURL();
                                //console.log(ImageData);
                                SenderImageSection.style.display = 'none';
                                $.ajax({
                                    type: "POST",
                                    url: "SendWhatsapp.php",
                                    data: {
                                        SendImageData: ImageData,
                                        SendingId: SendingArray,
                                        DataTypeSend: DataTypeSend
                                    },
                                    success: function(data) {
                                        $("#member_send").val('');
                                        console.log(data);
                                        var SendResponse = JSON.parse(data);
                                        if (SendResponse.SendProfile == 1) {
                                            toastr.success("Selected profiles had been send sucessfully");

                                        } else {
                                            toastr.success("Failed sending profiles , please try again!");
                                        }
                                    }
                                });
                            });
                        } else {
                            toastr.warning("Please select atleast one person to send the profile");
                        }
                    } else {
                        toastr.warning("Please select the bride or groom whose profile to be send");
                    }


                }


            });



            // Profile recieve as image
            $("#member_receive").on('change', function() {
                var ReceiveType = $(this).val();
                if (ReceiveType == 'PROFILERECIEVE') {
                    var FindReceiverId = $('.SelectSender').attr('id');
                    var DataTypeReceive = $('.SelectSender').data('datatype');
                    if (FindReceiverId != null) {
                        //console.log(FindReceiverId);
                        var ReceiveImageArray = [];
                        let Counter = 0;
                        var SelectedCount = $(".SendingList:checked").length;
                        if (SelectedCount > 0) {
                            //console.log(SelectedCount);
                            $(".SendingList:checked").each(function() {
                                var ReceiverId = $(this).attr('id');
                                //console.log(ReceiverId);
                                var ReceiverImageSection = document.getElementById("Receiver" + ReceiverId);
                                ReceiverImageSection.style.display = 'block';
                                html2canvas(document.getElementById("Receiver" + ReceiverId), {
                                    allowTaint: true,
                                    useCORS: true
                                }).then(function(canvas) {
                                    ReceiveImageArray.push(canvas.toDataURL());
                                    Counter = Counter + 1;
                                    if (Counter == SelectedCount) {
                                        console.log("done");
                                        $.ajax({
                                            type: "POST",
                                            url: "SendWhatsapp.php",
                                            data: {
                                                ReceiveImageData: ReceiveImageArray,
                                                ReceivingId: FindReceiverId,
                                                DataTypeReceive: DataTypeReceive
                                            },
                                            success: function(data) {
                                                console.log(data);
                                                $("#member_receive").val('');
                                                var SendResponse = JSON.parse(data);
                                                if (SendResponse.ReceiveProfile == 1) {
                                                    toastr.success("Selected profiles had been send to the customer sucessfully");
                                                } else {
                                                    toastr.success("Failed sending profiles , please try again!");
                                                }
                                            }
                                        });
                                    }
                                });
                                ReceiverImageSection.style.display = 'none';
                            });
                        } else {
                            toastr.warning("Please select atleast one person whose profile need to be send to the selected person");
                        }

                    } else {
                        toastr.warning("Please select the bride or groom whose profile to recieve profiles");
                    }






                    // if (FindSenderId != null) {
                    //     //var SenderId = "Sender" + FindSenderId;
                    //     var SenderImageSection = document.getElementById("Sender" + FindSenderId);
                    //     var SendingArray = [];
                    //     $(".SendingList:checked").each(function() {
                    //         SendingArray.push($(this).attr('id'));
                    //     });
                    //     if (SendingArray.length > 0) {
                    //         console.log(SendingArray);
                    //         // console.log(FindSenderId);
                    //         // console.log(SenderId);
                    //         // console.log(SenderImageSection);
                    //         SenderImageSection.style.display = 'block';
                    //         html2canvas(document.getElementById("Sender" + FindSenderId), {
                    //             allowTaint: true,
                    //             useCORS: true
                    //         }).then(function(canvas) {
                    //             //var anchorTag = document.createElement("a");
                    //             //document.body.appendChild(anchorTag);
                    //             //document.getElementById("previewImg").appendChild(canvas);
                    //             //anchorTag.download = "filename.jpg";
                    //             //anchorTag.href = canvas.toDataURL();
                    //             //anchorTag.target = '_blank';
                    //             //anchorTag.click();/
                    //             var ImageData = canvas.toDataURL();
                    //             //console.log(ImageData);
                    //             SenderImageSection.style.display = 'none';
                    //             $.ajax({
                    //                 type: "POST",
                    //                 url: "SendWhatsapp.php",
                    //                 data: {
                    //                     SendImageData: ImageData,
                    //                     SendingId: SendingArray,
                    //                     DataTypeSend: 'FD'
                    //                 },
                    //                 success: function(data) {
                    //                     console.log(data);
                    //                 }
                    //             });
                    //         });
                    //     } else {
                    //         toastr.warning("Please select atleast one person to send the profile");
                    //     }
                    // } else {
                    //     toastr.warning("Please select the bride or groom whose profile to be send");
                    // }


                }


            });

        ///////// Send-Receive Functions /////////////////////




        //////////////////Approval Functions  ///////////////////

            $(document).on('click', '.ProfileActionBtn', function() {
                var ProfileChangeDataType = $('.FreeDataSelect').data('datatype');
                var ProfileAction = $(this).val();
                var ProfileList = [];
                $(".FreeDataSelect:checked").each(function() {
                    ProfileList.push($(this).attr('id'));
                });
                console.log(ProfileList.length);
                if (ProfileList.length == 0) {
                    toastr.warning("Please select atleast one profile");
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
                                $('#FilterData').submit();
                                if (ProfileAction == 1) {
                                    toastr.success("Approved all selected profiles");
                                } else if (ProfileAction == 2) {
                                    toastr.success("Un Approved all selected profiles");
                                }
                            } else if (ProfileActionResponse.ProfileAction == 0) {
                                toastr.warning("Please select atleast one profile");
                            } else {
                                if (ProfileAction == 1) {
                                    toastr.error("Failed approving profiles , please try again!");
                                } else if (ProfileAction == 2) {
                                    toastr.error("Failed un approving profiles , please try again!");
                                }

                            }
                        }
                    });
                }
            });



        //////////////////Approval Functions  ///////////////////
    </script>



</body>

</html>