<?php $PageTitle = 'StaffMaster';
include '../MAIN/Dbconfig.php';

if (isset($_COOKIE['custidcookie']) && isset($_COOKIE['custtypecookie'])) {
    if (!empty($_COOKIE['custtoken'])) {
        if ($_COOKIE['custtypecookie'] == 1) {
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
    <!-- 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
 -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webui-popover/1.2.18/jquery.webui-popover.min.js" integrity="sha512-c7jfqR4Yc1iFS3KA+EceHmO91hjSfqNZ6cu00AKBE62BmQq7EOoCVGGwjV/OoaEG1teTU9nY6gBuToAzFfxMSw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>




    <style>
        .photo {
            height: 150px;
            width: 150px;
            border-radius: 10px;
            position: relative;
            border: 3px solid #4D4DFF;
            background-color: white;
        }

        .photo img {
            width: 100%;
            height: 100%;
            border-radius: 6px;
        }

        .photo_add {
            top: 115px;
            height: 30px;
            width: 100%;
            border-radius: 0px 0px 7px 7px;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
        }

        .photo_add label {
            width: 100%;
            color: rgba(255, 255, 255, 1);
        }

        .photo_add label:hover {
            color: #4D4DFF;
        }

        .image_staff {
            height: 2.5cm !important;
            width: 2.2cm !important;
            border-radius: 10px;
        }

        .staffimageContainer {
            height: 2.5cm !important;
            /* width: 8cm !important; */
        }

        #ViewAllImagesCarousel .carousel-item img {
            height: 400px;
        }

        .btn_link {
            background-color: #6CB4EE;
            border-radius: 20px;
            color: #fff;
            height: 30px;
            justify-content: center;
            line-height: 1;
            padding-left: 16px;
            padding-right: 16px;
            font-size: 18px;
            font-family: 'Raleway', sans-serif;
        }

        #MasterTable thead tr th {
            position: sticky;
            top: 0;
            background-color: #82cbeb;
            font-size: 14px;
        }
    </style>


</head>

<body>

    <!-- add staff modal -->
    <div class="modal fade addUpdateModal" id="StaffModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content cntrymodalbg">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD STAFF</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <form class="AddForm" id="AddStaff" novalidate>

                        <!-- <div class="row">
                            <div class="col-12 col-xl-2 col-lg-4 justify-content-center d-flex">
                                <div class="photo ">
                                    <img src="../IMAGES/staffAvatar.png" alt="Choose an image" id="photo_img">
                                    <div class="photo_add">
                                        <input type="file" id="photo_input" class="form-control d-none" name="StaffImage" accept="image/*" onchange="showPreview(event);" capture>
                                        <label for="photo_input" class="form-label">
                                            <div class="text-center ">
                                                <i class="material-icons mt-1">photo_camera</i>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-10 col-lg-10">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="">Staff Name</label>
                                        <input type="text" class="form-control" id="staff_name" name="StaffName" placeholder="Enter staff name" autofocus required>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="">Staff Branch</label>
                                        <select class="form-select" id="staff_branch" name="StaffBranch" required>
                                            <option value="0">Select Branch</option>
                                            <?php
                                            $FindBranch = mysqli_query($con, "SELECT * FROM branch");
                                            foreach ($FindBranch as $FindBranchResult) {
                                                echo '<option value="' . $FindBranchResult["bId"] . '">' . $FindBranchResult["branchName"] . '</option>';
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-2">Staff Agency</label>
                                        <select class="form-select" id="staff_agency" name="StaffAgency">
                                            <option value="0">Select Agency</option>
                                            <?php
                                            $FindAgency = mysqli_query($con, "SELECT * FROM agency");
                                            foreach ($FindAgency as $FindAgencyResult) {
                                                echo '<option value="' . $FindAgencyResult["aId"] . '">' . $FindAgencyResult["agencyName"] . '</option>';
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label class="mt-2">Designation</label>
                                        <select class="form-select" id="staff_designation" name="StaffDesignation" required>
                                            <option hidden value="0">Select Designation</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Staff</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="row">


                            <!-- <div class="col-xl-4 col-lg-4 col-12">
                                <label class="">Staff Name</label>
                                <input type="text" class="form-control" id="staff_name" name="StaffName" placeholder="Enter staff name" autofocus required>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="">Staff Branch</label>
                                <select class="form-select" id="staff_branch" name="StaffBranch">
                                    <option value="">Select Branch</option>
                                    <?php
                                    $FindBranch = mysqli_query($con, "SELECT * FROM branch");
                                    foreach ($FindBranch as $FindBranchResult) {
                                        echo '<option value="' . $FindBranchResult["bId"] . '">' . $FindBranchResult["branchName"] . '</option>';
                                    }

                                    ?>
                                </select>
                            </div> -->
                            <!-- <div class="col-xl-4 col-lg-4 col-12">
                                <label class="">Staff Agency</label>
                                <select class="form-select" id="staff_agency" name="StaffAgency">
                                    <option value="">Select Agency</option>
                                    <?php
                                    $FindAgency = mysqli_query($con, "SELECT * FROM agency");
                                    foreach ($FindAgency as $FindAgencyResult) {
                                        echo '<option value="' . $FindAgencyResult["aId"] . '">' . $FindAgencyResult["agencyName"] . '</option>';
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Designation</label>
                                <select class="form-select" id="staff_designation" name="StaffDesignation">
                                    <option hidden value="">Select Designation</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Staff</option>
                                </select>
                            </div> -->


                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="">Staff Name</label>
                                <input type="text" class="form-control" id="staff_name" name="StaffName" placeholder="Enter staff name" autofocus required>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="">Staff Branch</label>
                                <select class="form-select" id="staff_branch" name="StaffBranch" required>
                                    <option value="0">Select Branch</option>
                                    <?php
                                    $FindBranch = mysqli_query($con, "SELECT * FROM branch");
                                    foreach ($FindBranch as $FindBranchResult) {
                                        echo '<option value="' . $FindBranchResult["bId"] . '">' . $FindBranchResult["branchName"] . '</option>';
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="">Staff Agency</label>
                                <select class="form-select" id="staff_agency" name="StaffAgency">
                                    <option value="0">Select Agency</option>
                                    <?php
                                    $FindAgency = mysqli_query($con, "SELECT * FROM agency");
                                    foreach ($FindAgency as $FindAgencyResult) {
                                        echo '<option value="' . $FindAgencyResult["aId"] . '">' . $FindAgencyResult["agencyName"] . '</option>';
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Designation</label>
                                <select class="form-select" id="staff_designation" name="StaffDesignation" required>
                                    <option hidden value="0">Select Designation</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Staff</option>
                                </select>
                            </div>





                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Head</label>
                                <select class="form-select" id="staff_head" name="StaffHead">
                                    <option hidden value="0">Select Head</option>
                                    <?php
                                    $FindStaff = mysqli_query($con, "SELECT * FROM staff");
                                    foreach ($FindStaff as $FindStaffResult) {
                                        echo '<option value="' . $FindStaffResult["sId"] . '">' . $FindStaffResult["staffName"] . '</option>';
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Phone Number</label>
                                <input type="number" class="form-control mt-1" id="staff_phone" name="StaffPhone" placeholder="Enter phone number" autofocus>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Aadhaar Number</label>
                                <input type="number" class="form-control mt-1" id="staff_aadhar" name="StaffAadhar" placeholder="Enter aadhar number" autofocus required>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Email</label>
                                <input type="text" class="form-control mt-1" id="staff_email" name="StaffEmail" placeholder="Enter email" autofocus>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Gender</label>
                                <select class="form-select" id="staff_gender" name="StaffGender">
                                    <option hidden value>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Blood Group</label>
                                <input type="text" class="form-control mt-1" id="staff_blood_group" name="StaffBloodGroup" placeholder="Enter Blood Group" autofocus>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Religion</label>
                                <select class="form-select" id="staff_religion" name="StaffReligion">
                                    <option hidden value="0">Select Religion</option>
                                    <?php
                                    $FindReligion = mysqli_query($con, "SELECT * FROM religion");
                                    foreach ($FindReligion as $FindReligionResult) {
                                        echo '<option value="' . $FindReligionResult["rId"] . '">' . $FindReligionResult["religionName"] . '</option>';
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Joining Date</label>
                                <input type="date" class="form-control mt-1" id="staff_joining_date" name="StaffJoiningDate" placeholder="Enter Joining Date" autofocus required>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Date of Birth</label>
                                <input type="date" class="form-control mt-1" id="staff_dob" name="StaffDob" autofocus>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Qualification</label>
                                <input type="text" class="form-control mt-1" id="qualification" name="StaffQualification" placeholder="Enter Qualification" autofocus>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Username</label>
                                <input type="username" class="form-control mt-1" id="staff_username" name="StaffUserName" placeholder="Enter Username" autofocus required>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Password</label>
                                <input type="password" class="form-control mt-1" id="staff_password" name="StaffPassword" placeholder="Enter Password" autofocus required>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Google Pay Number</label>
                                <input type="number" class="form-control mt-1" id="gpay_no" name="StaffGpayNo" placeholder="Enter Google Pay No" autofocus>
                            </div>
                            <div class="col-12 pb-4 border-bottom">
                                <label class="mt-2">Address</label>
                                <textarea cols="30" rows="3" class="form-control" id="staff_address" name="StaffAddress" placeholder="Enter Address"></textarea>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Account Number</label>
                                <input type="number" class="form-control mt-1" id="account_number" name="StaffAccountNumber" placeholder="Enter Account Number" autofocus>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Account Holder Name</label>
                                <input type="text" class="form-control mt-1" id="account_holder_name" name="StaffAccountHolderName" placeholder="Enter Account Holder Name" autofocus>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Bank Name</label>
                                <input type="text" class="form-control mt-1" id="bank_name" name="StaffBankName" placeholder="Enter Bank Name" autofocus>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">IFSC Code</label>
                                <input type="text" class="form-control mt-1" id="ifsc_code" name="StaffIfscCode" placeholder="Enter IFSC Code" autofocus>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Branch</label>
                                <input type="text" class="form-control mt-1" id="branch_name" name="StaffBankBranch" placeholder="Enter Branch Name" autofocus>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Salary</label>
                                <input type="number" class="form-control mt-1" id="staff_salary" name="StaffSalary" placeholder="Enter Salary" autofocus>
                            </div>

                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-info">ADD STAFF</button>
                        </div>
                    </form>

                    <form class="UpdateForm" id="UpdateStaff" novalidate style="display:none;">

                        <!-- <div class="row">

                            <div class="col-12 col-xl-2 col-lg-4 justify-content-center d-flex">
                                <div class="photo ">
                                    <img src="../IMAGES/staffAvatar.png" alt="Choose an image" id="photo_img_update">
                                    <div class="photo_add">
                                        <input type="file" id="photo_input_update" class="form-control d-none" name="UpdateStaffImage" accept="image/*" onchange="showUpdatePreview(event);" capture>
                                        <label for="photo_input_update" class="form-label">
                                            <div class="text-center ">
                                                <i class="material-icons mt-1">photo_camera</i>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-xl-10 col-lg-10">
                                <div class="row">
                                    <input type="number" class="form-control" id="update_staff_id" name="UpdateStaffId" value="1" required hidden>
                                    <div class="col-xl-4 col-lg-4 col-12">
                                        <label class="">Staff Name</label>
                                        <input type="text" class="form-control" id="update_staff_name" name="UpdateStaffName" placeholder="Enter staff name" autofocus required>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-12">
                                        <label class="">Staff Branch</label>
                                        <select class="form-select" id="update_staff_branch" name="UpdateStaffBranch" required>
                                            <option value="0">Select Branch</option>
                                            <?php
                                            $FindBranch = mysqli_query($con, "SELECT * FROM branch");
                                            foreach ($FindBranch as $FindBranchResult) {
                                                echo '<option value="' . $FindBranchResult["bId"] . '">' . $FindBranchResult["branchName"] . '</option>';
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-12">
                                        <label class="">Staff Agency</label>
                                        <select class="form-select" id="update_staff_agency" name="UpdateStaffAgency">
                                            <option value="0">Select Agency</option>
                                            <?php
                                            $FindAgency = mysqli_query($con, "SELECT * FROM agency");
                                            foreach ($FindAgency as $FindAgencyResult) {
                                                echo '<option value="' . $FindAgencyResult["aId"] . '">' . $FindAgencyResult["agencyName"] . '</option>';
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-12">
                                        <label class="mt-2">Designation</label>
                                        <select class="form-select" id="update_staff_designation" name="UpdateStaffDesignation" required>
                                            <option hidden value="0">Select Designation</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Staff</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="row">
                            <!-- <input type="number" class="form-control" id="update_staff_id" name="UpdateStaffId" required hidden>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="">Staff Name</label>
                                <input type="text" class="form-control" id="update_staff_name" name="UpdateStaffName" placeholder="Enter staff name" autofocus required>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="">Staff Branch</label>
                                <select class="form-select" id="update_staff_branch" name="UpdateStaffBranch">
                                    <option value="">Select Branch</option>
                                    <?php
                                    $FindBranch = mysqli_query($con, "SELECT * FROM branch");
                                    foreach ($FindBranch as $FindBranchResult) {
                                        echo '<option value="' . $FindBranchResult["bId"] . '">' . $FindBranchResult["branchName"] . '</option>';
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="">Staff Agency</label>
                                <select class="form-select" id="update_staff_agency" name="UpdateStaffAgency">
                                    <option value="">Select Agency</option>
                                    <?php
                                    $FindAgency = mysqli_query($con, "SELECT * FROM agency");
                                    foreach ($FindAgency as $FindAgencyResult) {
                                        echo '<option value="' . $FindAgencyResult["aId"] . '">' . $FindAgencyResult["agencyName"] . '</option>';
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Designation</label>
                                <select class="form-select" id="update_staff_designation" name="UpdateStaffDesignation">
                                    <option hidden value="">Select Designation</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Staff</option>
                                </select>
                            </div> -->

                            <input type="number" class="form-control" id="update_staff_id" name="UpdateStaffId" required hidden>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="">Staff Name</label>
                                <input type="text" class="form-control" id="update_staff_name" name="UpdateStaffName" placeholder="Enter staff name" autofocus required>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="">Staff Branch</label>
                                <select class="form-select" id="update_staff_branch" name="UpdateStaffBranch" required>
                                    <option value="0">Select Branch</option>
                                    <?php
                                    $FindBranch = mysqli_query($con, "SELECT * FROM branch");
                                    foreach ($FindBranch as $FindBranchResult) {
                                        echo '<option value="' . $FindBranchResult["bId"] . '">' . $FindBranchResult["branchName"] . '</option>';
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="">Staff Agency</label>
                                <select class="form-select" id="update_staff_agency" name="UpdateStaffAgency">
                                    <option value="0">Select Agency</option>
                                    <?php
                                    $FindAgency = mysqli_query($con, "SELECT * FROM agency");
                                    foreach ($FindAgency as $FindAgencyResult) {
                                        echo '<option value="' . $FindAgencyResult["aId"] . '">' . $FindAgencyResult["agencyName"] . '</option>';
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Designation</label>
                                <select class="form-select" id="update_staff_designation" name="UpdateStaffDesignation" required>
                                    <option hidden value="0">Select Designation</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Staff</option>
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Head</label>
                                <select class="form-select" id="update_staff_head" name="UpdateStaffHeadName">
                                    <option hidden value="0">Select Head</option>
                                    <?php
                                    $FindStaff = mysqli_query($con, "SELECT * FROM staff");
                                    foreach ($FindStaff as $FindStaffResult) {
                                        echo '<option value="' . $FindStaffResult["sId"] . '">' . $FindStaffResult["staffName"] . '</option>';
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Phone Number</label>
                                <input type="number" class="form-control mt-1" id="update_staff_phone" name="UpdateStaffPhone" placeholder="Enter phone number" autofocus required>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Aadhaar Number</label>
                                <input type="number" class="form-control mt-1" id="update_staff_aadhar" name="UpdateStaffAadhar" placeholder="Enter aadhar number" autofocus required>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Email</label>
                                <input type="text" class="form-control mt-1" id="update_staff_email" name="UpdateStaffemail" placeholder="Enter email" autofocus>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Gender</label>
                                <select class="form-select" id="update_staff_gender" name="UpdateStaffGender">
                                    <option hidden value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Blood Group</label>
                                <input type="text" class="form-control mt-1" id="update_staff_blood_group" name="UpdateStaffBloodGroup" placeholder="Enter Blood Group" autofocus>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Religion</label>
                                <select class="form-select" id="update_staff_religion" name="UpdateStaffReligion">
                                    <option hidden value="0">Select Religion</option>
                                    <?php
                                    $FindReligion = mysqli_query($con, "SELECT * FROM religion");
                                    foreach ($FindReligion as $FindReligionResult) {
                                        echo '<option value="' . $FindReligionResult["rId"] . '">' . $FindReligionResult["religionName"] . '</option>';
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Joining Date</label>
                                <input type="date" class="form-control mt-1" id="update_staff_joining_date" name="UpdateStaffJoiningDate" placeholder="Enter Joining Date" autofocus>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Date of Birth</label>
                                <input type="date" class="form-control mt-1" id="update_staff_dob" name="UpdateStaffDob" autofocus>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Qualification</label>
                                <input type="text" class="form-control mt-1" id="update_qualification" name="UpdateQualification" placeholder="Enter Qualification" autofocus>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Google Pay Number</label>
                                <input type="number" class="form-control mt-1" id="update_gpay_no" name="UpdateGpayNo" placeholder="Enter Google Pay No" autofocus>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Username</label>
                                <input type="username" class="form-control mt-1" id="update_staff_username" name="UpdateStaffUserName" placeholder="Enter Username" autofocus>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Password</label>
                                <input type="password" class="form-control mt-1" id="update_staff_password" name="UpdateStaffPassword" placeholder="Enter Password" autofocus>
                            </div>
                            <div class="col-12 pb-4 border-bottom">
                                <label class="mt-2">Address</label>
                                <textarea cols="30" rows="3" class="form-control" id="update_staff_address" name="UpdateStaffAddress" placeholder="Enter Address"></textarea>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Account Number</label>
                                <input type="number" class="form-control mt-1" id="update_account_number" name="UpdateStaffAccountNumber" placeholder="Enter Account Number" autofocus>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Account Holder Name</label>
                                <input type="text" class="form-control mt-1" id="update_account_holder_name" name="UpdateAccountHolderName" placeholder="Enter Account Holder Name" autofocus>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Bank Name</label>
                                <input type="text" class="form-control mt-1" id="update_bank_name" name="UpdateBankName" placeholder="Enter Bank Name" autofocus>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">IFSC Code</label>
                                <input type="text" class="form-control mt-1" id="update_ifsc_code" name="UpdateIfscCode" placeholder="Enter IFSC Code" autofocus>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Branch</label>
                                <input type="text" class="form-control mt-1" id="update_branch_name" name="UpdateBankBranch" placeholder="Enter Branch Name" autofocus>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <label class="mt-2">Salary</label>
                                <input type="number" class="form-control mt-1" id="update_staff_salary" name="UpdateStaffSalary" placeholder="Enter Salary" autofocus>
                            </div>
                        </div>


                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-info">UPDATE</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>


    <!-- Delete Modal -->
    <div class="modal fade" id="delModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="exampleModalLabel">Delete Confirmation</h5>
                </div>
                <div class="modal-body">
                    <h4 class="text-center">Do you want to delete this Staff?</h4>
                    <div class="text-center mt-3">
                        <button type="button" id="confirmYes" class="btn btn-primary me-5">Yes</button>
                        <button type="button" id="confirmNo" class="btn btn-secondary ms-5" data-bs-dismiss="modal">No</button>
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

                    <h5 class="">View & Edit Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="number" class="MasterImageStoreId" hidden>

                    <ul class="nav nav-pills mb-3 imagesTab" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-image-tab" data-bs-toggle="pill" data-bs-target="#pills-image" type="button" role="tab" aria-controls="pills-image" aria-selected="true">IMAGE</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-new-tab" data-bs-toggle="pill" data-bs-target="#pills-new" type="button" role="tab" aria-controls="pills-new" aria-selected="false">NEW</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-image" role="tabpanel" aria-labelledby="pills-image-tab" tabindex="0">
                            <div class="text-center" id="SmallLoader">
                                <img src="../IMAGES/miniloader.gif">
                            </div>

                            <div class="mt-3" id="ViewImages">

                            </div>

                        </div>
                        <div class="tab-pane fade" id="pills-new" role="tabpanel" aria-labelledby="pills-new-tab" tabindex="0">
                            <form id="AdditionalImageUpload">
                                <input type="number" name="UploadMasterId" class="MasterImageStoreId" id="" value="" hidden>
                                <input type="text" name="ImageFormName" value="STAFF" id="" hidden>
                                <input type="file" class="form-control" id="add_additional_image" name="AdditionalImage[]" multiple accept=".jpg,.png">

                                <div class="d-flex justify-content-center col-12">
                                    <button type="submit" class="btn  btn-info">UPLOAD</button>
                                </div>
                            </form>

                        </div>
                    </div>

                    <!-- <div class="text-center mt-4">
                        <button class="btn btn-secondary px-4" data-bs-dismiss="modal"> Close</button>
                    </div> -->

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
            <h1>View Data</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">View Data</li>
                </ol>
            </nav>
        </div> -->

        <section class="section dashboard">

            <div class="container-fluid mainContents">
                <div class="card card-body shadow p-2">
                    <div class="main_heading d-flex justify-content-between mb-2 shadow p-2">
                        <div>
                            <h3 class="pt-3">STAFF</h3>
                        </div>
                        <div class="">
                            <button class="btn AddBtn mt-1" data-bs-toggle="modal" data-bs-target="#StaffModal">Add
                                Staff</button>
                        </div>
                    </div>

                    <div class="admintoolbar">
                        <div class="card card-body">
                            <div class="row justify-content-between">
                                <div class="col-lg-4 col-4">
                                    <input type="text" class="form-control mt-3" id="SearchBar" placeholder="Search by Staff">
                                </div>
                                <div class="col-lg-4 text-end col-4">

                                </div>
                            </div>
                        </div>
                    </div>




                    <!-- <div class="admintoolbar">

                        <div class="row">
                            <div class="col-lg-4 col-4">
                                <input type="text" class="form-control" id="SearchBar" placeholder="Search by Staff">
                            </div>
                            <div class="col-lg-4 text-end col-4">

                            </div>

                            <div class="col-lg-4 text-end col-4">
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#StaffModal">Add
                                    Staff</button>
                            </div>
                        </div>

                    </div>

                    <hr> -->



                    <table class="table table-bordered table-hover mastertable text-nowrap" id="MasterTable">
                        <thead class="table-light">
                            <tr>
                                <th class="">Sl No</th>
                                <th class="">Image&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                <th class="all">Name</th>
                                <th class="all">Branch</th>
                                <th class="all">Agency</th>
                                <th class="all">Designation</th>
                                <th class="all">Phone</th>
                                <th class="none">Email</th>
                                <th class="none">Address</th>
                                <th class="none">Username</th>
                                <th class="none">Password</th>
                                <th class="none">Head</th>
                                <th class="none">Aadhaar</th>
                                <th class="all">Gender</th>
                                <th class="none">Blood Group</th>
                                <th class="none">Religion</th>
                                <th class="none">Joining Date</th>
                                <th class="none">DOB</th>
                                <th class="none">Qualification</th>
                                <th class="none">Gpay</th>
                                <th class="none">Account No</th>
                                <th class="none">Account Name</th>
                                <th class="none">Bank Name</th>
                                <th class="none">IFSC Code</th>
                                <th class="none">Bank Branch</th>
                                <th class="none">Salary</th>
                                <th class="all text-center">Link</th>
                                <th class="all text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
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

        const ViewImagesModal = document.getElementById('ViewImagesModal')
        ViewImagesModal.addEventListener('hidden.bs.modal', event => {
            $('#ViewImages').html('');
            $('#AdditionalImageUpload')[0].reset();
            $('.MasterImageStoreId').val('');
        });


       

        // function showPreview(event) {
        //     if (event.target.files.length > 0) {
        //         var src = URL.createObjectURL(event.target.files[0]);
        //         var preview = document.getElementById("photo_img");
        //         preview.src = src;
        //         preview.style.display = "block";
        //     }
        // }

        // function revertPreview() {
        //     var preview = document.getElementById("photo_img");
        //     preview.src = '../IMAGES/staffAvatar.png';
        // }

        // function showUpdatePreview(event) {
        //     if (event.target.files.length > 0) {
        //         var src = URL.createObjectURL(event.target.files[0]);
        //         var preview = document.getElementById("photo_img_update");
        //         preview.src = src;
        //         preview.style.display = "block";
        //     }
        // }

        // function revertUpdatePreview() {
        //     var preview = document.getElementById("photo_img_update");
        //     preview.src = '../IMAGES/staffAvatar.png';
        // }



        //data Table
        var MasterTable = $('#MasterTable').DataTable({
            "processing": true,
            // "responsive": true,
            "ajax": "StaffMasterData.php",
            //"scrollY": "600px",
            // "scrollX": true,
            //"scrollCollapse": true,
            "fixedHeader": true,
            "dom": 'l<"top">rt<"bottom"ip>',
            //"pageLength": 10,
            "lengthMenu": [
                [20, 50, 100, -1],
                [20, 50, 100, 'All'],
            ],
            "pagingType": 'simple_numbers',
            "language": {
                "paginate": {
                    "previous": "<i class='bi bi-caret-left-fill'></i>",
                    "next": "<i class='bi bi-caret-right-fill'></i>"
                }
            },
            // columnDefs: [{
            //     width: "500px",
            //     targets: 1
            // }],
            "initComplete": function() {
                //console.log("helloo");
                $("#MasterTable").wrap("<div style='overflow:auto; width:100%;height:70vh;position:relative;'></div>");
            },
            // "drawCallback": function(settings) {
            //     const lightbox = GLightbox({
            //         //selector: '.glightbox',
            //     });
            //     // $('.glightbox').magnificPopup({
            //     //     type: 'image'
            //     // });
            // },
            "columns": [{
                    data: null,
                    searchable: false,
                    render: function(data, type, row, meta) {
                        data = '<div class="ps-3">' + (meta.row + meta.settings._iDisplayStart + 1) + '</div>'
                        //return meta.row + meta.settings._iDisplayStart + 1;
                        return data;
                    }
                },
                {
                    data: null,
                    searchable: false,
                    orderable: false,
                    "render": function(data, type, row, meta) {
                        if (type == 'display') {
                            data = ' <a href="" data-masterid="' + data.sId + '" class="staffimageContainer"><img src="../STAFFIMAGES/IDPROOF/' + data.imageName + '" class=" img-fluid image_staff"></a>';
                        }
                        return data;
                    }

                },
                {
                    data: 'staffName',
                },
                {
                    data: 'branchName',
                },
                {
                    data: 'agencyName',
                },
                {
                    data: 'staffRole',
                    "render": function(data, type, row, meta) {
                        if (type == 'display') {
                            //data = '<button class=" btn btn_actions btn_edit me-3  shadow-none" type="button" data-bs-toggle="tooltip" data-bs-custom-class="edit-tooltip" data-bs-placement="top" data-bs-title="Edit" value="' + data + '"> <i class="material-icons">edit</i> </button>';
                            if (data == 1) {
                                data = 'Admin'
                            } else if (data == 2) {
                                data = 'Staff'
                            }
                        }
                        return data;
                    }
                },
                {
                    data: 'staffPhone',
                },
                {
                    data: 'staffEmail',
                },
                {
                    data: 'staffAddress',
                },
                {
                    data: 'staffUserName',
                },
                {
                    data: 'staffPassword',
                },
                {
                    data: 'staffName',
                },
                {
                    data: 'staffAdhar',
                },
                {
                    data: 'staffGender',
                },
                {
                    data: 'staffBloodGroup',
                },
                {
                    data: 'religionName',
                },
                {
                    data: 'staffJoiningDate',
                    render: function(data, type, row, meta) {
                        if (type === 'sort') {
                            return data;
                        }
                        return moment(data).format("MMM D , YYYY");
                    },
                    searchable: false

                },
                {
                    data: 'staffDOB',
                    render: function(data, type, row, meta) {
                        if (type === 'sort') {
                            return data;
                        }
                        return moment(data).format("MMM D , YYYY");
                    },
                    searchable: false

                },
                {
                    data: 'staffQualification',
                },
                {
                    data: 'staffGPay',
                },
                {
                    data: 'bankAccountNo',
                },
                {
                    data: 'accountHolderNAme',
                },
                {
                    data: 'bankName',
                },
                {
                    data: 'bankIFSC',
                },
                {
                    data: 'bankBranch',
                },
                {
                    data: 'staffSalary',
                },
                {
                    data: 'sId',
                    searchable: false,
                    orderable: false,
                    "render": function(data, type, row, meta) {
                        if (type == 'display') {
                            data = '<div class="d-flex justify-content-center me-3"><button class="btn btn_link mt-1" data-clipboard-text="https://matrimony.showmydemo.in/ADMIN/FreeRegister.php">Link</button></div>';
                        }
                        return data;
                    }
                },
                {
                    data: 'sId',
                    searchable: false,
                    orderable: false,
                    "render": function(data, type, row, meta) {
                        if (type == 'display') {
                            //data = '<button class=" btn btn_actions btn_edit me-3  shadow-none" type="button" data-bs-toggle="tooltip" data-bs-custom-class="edit-tooltip" data-bs-placement="top" data-bs-title="Edit" value="' + data + '"> <i class="material-icons">edit</i> </button>';
                            data = '<div class="d-flex justify-content-center me-3">  <button class="btn btn_actions btn_edit me-3" data-bs-toggle="tooltip" data-bs-custom-class="edit-tooltip" data-bs-placement="top" data-bs-title="Edit" value="' + data + '"><i class="material-icons">edit</i> </button> <button class="btn btn_actions btn_delete" data-bs-toggle="tooltip" data-bs-custom-class="delete-tooltip" data-bs-placement="top" data-bs-title="Delete" value="' + data + '"><i class="material-icons">delete</i> </button>  </div>'
                        }
                        return data;
                    }
                }
            ]
        });


        //View all Images
        $('#MasterTable').on('click', '.staffimageContainer', function(v) {
            v.preventDefault();
            var MasterId = $(this).data('masterid');
            $('.MasterImageStoreId').val(MasterId);
            //console.log(MasterId);
            $('#ViewImagesModal').modal('show');
            ViewMasterImages(MasterId); //View Images Function
        });



        //Initiate Clipboard js in Link copy
        var StaffCopy = new ClipboardJS('.btn_link');
        StaffCopy.on('success', function(e) {
            toastr.info('Link Copied');
        });


        //View Images Function
        function ViewMasterImages(MasterId) {
            $.ajax({
                url: "MasterExtras.php",
                type: "POST",
                data: {
                    ViewImagesMasterId: MasterId,
                    FormName: "STAFF",
                    DataType:"FD"
                },
                beforeSend: function() {
                    $('#SmallLoader').show();
                    $('#ViewImages').hide();
                },
                success: function(data) {
                    $('#ViewImages').show();
                    $('#SmallLoader').hide();
                    $('#ViewImages').html(data);
                },
            });
        }



        //Make Image as Main
        $(document).on('click', '.MakeMainImageBtn', function() {
            var PrimaryImageId = $(this).val();
            var PrimaryMasterId = $(this).data('masterid');
            console.log(PrimaryImageId);
            console.log(PrimaryMasterId);
            var ConfirmPrimary = confirm("Do you want to make this image primary?");
            if (ConfirmPrimary == true) {
                $.ajax({
                    url: "MasterOperations.php",
                    type: "POST",
                    data: {
                        PrimaryImageId: PrimaryImageId,
                        PrimaryMasterId: PrimaryMasterId
                    },
                    beforeSend: function() {

                    },
                    success: function(data) {
                        console.log(data);
                        var PrimaryResponse = JSON.parse(data);
                        if (PrimaryResponse.PrimaryImage == 1) {
                            toastr.success('Made Image As Main');
                            ViewMasterImages(PrimaryMasterId);
                            MasterTable.ajax.reload();
                        } else {
                            toastr.success('Cannot Made Image As Main');
                        }
                    },
                });
            }
        });




        //Delete Images
        $(document).on('click', '.DeleteImageBtn', function() {
            var DeleteImageId = $(this).val();
            var MasterId = $(this).data('masterid');
            // console.log(DeleteImageId);
            // console.log(MasterId);
            var ConfirmDelete = confirm("Do you want to delete this image?");
            if (ConfirmDelete == true) {
                $.ajax({
                    url: "MasterOperations.php",
                    type: "POST",
                    data: {
                        DeleteImageId: DeleteImageId
                    },
                    beforeSend: function() {

                    },
                    success: function(data) {
                        var DeleteResponse = JSON.parse(data);
                        if (DeleteResponse.DeleteImage == 1) {
                            ViewMasterImages(MasterId);
                            toastr.success('Image Deleted');
                            MasterTable.ajax.reload();
                        } else if (DeleteResponse.DeleteImage == 0) {
                            toastr.warning('Cannot Delete Main Image');
                        } else {
                            toastr.error('Deleting Image Failed');
                        }
                    },
                });
            }
        });



        //Upload Additional Images
        $(document).on('submit', '#AdditionalImageUpload', function(u) {
            u.preventDefault();
            var AdditionalData = new FormData(this);
            var MasterId = $('.MasterImageStoreId').val();
            $.ajax({
                url: "MasterOperations.php",
                method: "POST",
                data: AdditionalData,
                beforeSend: function() {},
                success: function(data) {
                    console.log(data);
                    MasterTable.ajax.reload();
                    ViewMasterImages(MasterId);
                    $('#add_additional_image').val('');
                    if (TestJson(data) == true) {
                        var AdditionalImageResult = JSON.parse(data);
                        if (AdditionalImageResult.Status == true) {
                            if (AdditionalImageResult.Code == "0") {
                                $('#ResponseImage').html('<img src="./warning.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Branch is Already Present");
                                $('#confirmModal').modal('show');
                            } else if (AdditionalImageResult.Code == "1") {
                                $('#ResponseImage').html('<img src="./success.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Successfully Added Images");
                                $('#confirmModal').modal('show');
                            } else if (AdditionalImageResult.Code == "2") {
                                $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Failed Adding Images");
                                $('#confirmModal').modal('show');
                            }
                        } else {
                            $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                            $('#ResponseText').text("Failed Adding Images");
                            $('#confirmModal').modal('show');
                        }

                    } else {
                        $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                        $('#ResponseText').text("Some Error Occured, Please refresh the page (ERROR : 12ENJ)");
                        $('#confirmModal').modal('show');
                    }
                },
                error: function() {
                    $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                    $('#ResponseText').text("Please refresh the page to continue (ERROR : 12EFF)");
                    $('#confirmModal').modal('show');
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });





        //tooltip on table
        MasterTable.on("draw", function() {
            const tooltipTriggerList = document.querySelectorAll(
                '[data-bs-toggle="tooltip"]'
            );
            const tooltipList = [...tooltipTriggerList].map(
                (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
            );
        });


        //Searchbar
        $('#SearchBar').keyup(function() {
            MasterTable.search($(this).val()).draw();
        });



        //Add master        
        $(function() {

            let validator = $('#AddStaff').jbvalidator({
                //language: 'dist/lang/en.json',
                successClass: false,
                html5BrowserDefault: true
            });

            validator.validator.custom = function(el, event) {
                if ($(el).is('#staff_name') && $(el).val().trim().length == 0) {
                    return 'Cannot be empty';
                }
                // else if($(el).is('#update_country_name') && $(el).val().match(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?0-9]+/)){
                //     return 'Only allowed alphabets';
                // }

            }

            $(document).on('submit', '#AddStaff', (function(e) {
                e.preventDefault();
                var feedbackData = new FormData(this);
                $.ajax({
                    url: "MasterOperations.php",
                    method: "POST",
                    data: feedbackData,
                    beforeSend: function() {
                        $('.loader').show();
                        $('.mainContents').hide();
                        $('#AddStaff').addClass("disable");
                        $('#StaffModal').modal('hide');
                        $('#AddStaff')[0].reset();
                        $('#UpdateStaff')[0].reset();
                        $('#ResponseImage').html("");
                        $('#ResponseText').text("");
                        //revertPreview();
                    },
                    success: function(data) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        console.log(data);
                        $('#AddStaff').removeClass("disable");
                        //console.log(TestJson(data));
                        MasterTable.ajax.reload();
                        if (TestJson(data) == true) {
                            var StaffResult = JSON.parse(data);
                            if (StaffResult.Status == true) {
                                if (StaffResult.Code == "0") {
                                    $('#ResponseImage').html('<img src="./warning.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                    $('#ResponseText').text(StaffResult.message);
                                    $('#confirmModal').modal('show');
                                } else if (StaffResult.Code == "1") {
                                    $('#ResponseImage').html('<img src="./success.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                    $('#ResponseText').text(StaffResult.message);
                                    $('#confirmModal').modal('show');
                                } else if (StaffResult.Code == "2") {
                                    $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                    $('#ResponseText').text(StaffResult.message);
                                    $('#confirmModal').modal('show');
                                }
                            } else {
                                $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(StaffResult.message);
                                $('#confirmModal').modal('show');
                            }

                        } else {
                            $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                            $('#ResponseText').text("Some Error Occured, Please refresh the page (ERROR : 12ENJ)");
                            $('#confirmModal').modal('show');
                        }
                    },
                    error: function() {
                        $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                        $('#ResponseText').text("Please refresh the page to continue (ERROR : 12EFF)");
                        $('#confirmModal').modal('show');
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }));

        });




        //Update master  
        $(function() {

            let validator = $('#UpdateStaff').jbvalidator({
                //language: 'dist/lang/en.json',
                successClass: false,
                html5BrowserDefault: true
            });

            validator.validator.custom = function(el, event) {
                if ($(el).is('') && $(el).val().trim().length == 0) {
                    return 'Cannot be empty';
                }
                // else if($(el).is('#update_country_name') && $(el).val().match(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?0-9]+/)){
                //     return 'Only allowed alphabets';
                // }

            }

            $(document).on('submit', '#UpdateStaff', (function(e) {
                e.preventDefault();
                var UpdateStaff = new FormData(this);
                $.ajax({
                    url: "MasterOperations.php",
                    method: "POST",
                    data: UpdateStaff,
                    beforeSend: function() {
                        $('.loader').show();
                        $('.mainContents').hide();
                        $('#UpdateStaff').addClass("disable");
                        $('#StaffModal').modal('hide');
                        $('#AddStaff')[0].reset();
                        $('#UpdateStaff')[0].reset();
                        $('#ResponseImage').html("");
                        $('#ResponseText').text("");
                        //revertPreview();
                    },
                    success: function(data) {
                        $('.mainContents').show();

                        $('.loader').hide();
                        console.log(data);
                        $('#UpdateStaff').removeClass("disable");
                        //console.log(TestJson(data));
                        MasterTable.ajax.reload();
                        if (TestJson(data) == true) {
                            var StaffResultUpdate = JSON.parse(data);
                            if (StaffResultUpdate.Status == true) {
                                if (StaffResultUpdate.Code == "0") {
                                    $('#ResponseImage').html('<img src="./warning.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                    $('#ResponseText').text("Staff is Already Present");
                                    $('#confirmModal').modal('show');
                                } else if (StaffResultUpdate.Code == "1") {
                                    $('#ResponseImage').html('<img src="./success.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                    $('#ResponseText').text("Successfully updated Staff");
                                    $('#confirmModal').modal('show');
                                } else if (StaffResultUpdate.Code == "2") {
                                    $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                    $('#ResponseText').text("Failed Updating Staff");
                                    $('#confirmModal').modal('show');
                                }
                            } else {
                                $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Failed Updating Staff");
                                $('#confirmModal').modal('show');
                            }
                        } else {
                            $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                            $('#ResponseText').text("Some Error Occured, Please refresh the page (ERROR : 12ENJ)");
                            $('#confirmModal').modal('show');
                        }
                    },
                    error: function() {
                        $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                        $('#ResponseText').text("Please refresh the page to continue (ERROR : 12EFF)");
                        $('#confirmModal').modal('show');
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }));

        });



        //Edit master
        $('#MasterTable').on('click', '.btn_edit', function() {
            var EditStaff = $(this).val();
            console.log(EditStaff);
            $.ajax({
                url: "MasterOperations.php",
                type: "POST",
                data: {
                    EditStaff: EditStaff
                },
                success: function(data) {
                    var EditStaff = JSON.parse(data);
                    console.log(data);
                    if (EditStaff.Status == true) {
                        $('#StaffModal').modal('show');
                        $('#AddStaff').hide();
                        $('#UpdateStaff').show();
                        $("#update_staff_id").val(EditStaff.StaffId);
                        $("#update_staff_name").val(EditStaff.StaffName);
                        $("#update_staff_branch").val(EditStaff.StaffBranch).change();
                        $("#update_staff_agency").val(EditStaff.StaffAgency).change();
                        $("#update_staff_designation").val(EditStaff.StaffRole).change();
                        $("#update_staff_head").val(EditStaff.StaffHead).change();
                        $("#update_staff_phone").val(EditStaff.StaffPhone);
                        $("#update_staff_aadhar").val(EditStaff.StaffAdhar);
                        $("#update_staff_email").val(EditStaff.StaffEmail);
                        $("#update_staff_gender").val(EditStaff.StaffGender).change();
                        $("#update_staff_blood_group").val(EditStaff.StaffBloodGroup);
                        $("#update_staff_religion").val(EditStaff.StaffReligion).change();
                        $("#update_staff_joining_date").val(EditStaff.StaffJoiningDate);
                        $("#update_staff_dob").val(EditStaff.StaffDOB);
                        $("#update_qualification").val(EditStaff.StaffQualification);
                        $("#update_gpay_no").val(EditStaff.StaffGPay);
                        $("#update_staff_username").val(EditStaff.StaffUserName);
                        $("#update_staff_password").val(EditStaff.StaffPassword);
                        $("#update_staff_address").val(EditStaff.StaffAddress);
                        $("#update_account_holder_name").val(EditStaff.AccountHolderNAme);
                        $("#update_bank_name").val(EditStaff.BankName);
                        $("#update_ifsc_code").val(EditStaff.BankIFSC);
                        $("#update_branch_name").val(EditStaff.BankBranch);
                        $("#update_staff_salary").val(EditStaff.StaffSalary);
                        $("#update_account_number").val(EditStaff.BankAccountNo);
                    }

                },
            });

        });




        //Delete master
        $('#MasterTable tbody').on('click', '.btn_delete', function() {
            var delValue = $(this).val();
            console.log(delValue);
            $('#delModal').modal('show');
            $('#confirmYes').click(function() {
                if (delValue != null) {
                    $.ajax({
                        type: "POST",
                        url: "MasterOperations.php",
                        data: {
                            DeleteStaff: delValue
                        },
                        beforeSend: function() {
                            $('.loader').show();
                            $('.mainContents').hide();
                            $('#AddStaff')[0].reset();
                            $('#UpdateStaff')[0].reset();
                            $('#delModal').modal('hide');
                            $('#ResponseImage').html("");
                            $('#ResponseText').text("");
                        },
                        success: function(data) {
                            $('.mainContents').show();
                            $('.loader').hide();
                            console.log(data);
                            MasterTable.ajax.reload();
                            if (TestJson(data) == true) {
                                var delResponse = JSON.parse(data);
                                if (delResponse.Status == true) {
                                    if (delResponse.Code == 0) {
                                        $('#ResponseImage').html('<img src="./warning.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                        $('#ResponseText').text(delResponse.message);
                                        $('#confirmModal').modal('show');
                                    } else if (delResponse.Code == 1) {
                                        $('#ResponseImage').html('<img src="./success.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                        $('#ResponseText').text(delResponse.message);
                                        $('#confirmModal').modal('show');
                                        //ResetForms();
                                        //ReloadTable();
                                    } else if (delResponse.Code == 2) {
                                        $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                        $('#ResponseText').text(delResponse.message);
                                        $('#confirmModal').modal('show');
                                    }
                                } else {
                                    $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                    $('#ResponseText').text("Some Error Occured, Please refresh the page (ERROR : 12ENJ)");
                                    $('#confirmModal').modal('show');
                                }

                                delValue = undefined;
                                delete window.delValue;
                            } else {
                                $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Some Error Occured, Please refresh the page (ERROR : 12ENJ)");
                                $('#confirmModal').modal('show');
                            }
                        },
                        error: function() {
                            $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                            $('#ResponseText').text("Please refresh the page to continue (ERROR : 12EFF)");
                            $('#confirmModal').modal('show');
                        },
                    });
                } else {}
            });
            $('#confirmNo').click(function() {
                delValue = undefined;
                delete window.delValue;
            });
        });




        // //Add Staff        
        // $('#AddStaff').submit(function(e) {
        //     e.preventDefault();
        //     var staffData = new FormData(this);
        //     $.ajax({
        //         url: "MasterOperations.php",
        //         method: "POST",
        //         data: staffData,
        //         beforeSend: function() {
        //             $('.loader').show();
        //             $('.mainContents').hide();
        //             $('#StaffModal').modal('hide');
        //             revertPreview();
        //             $('#AddStaff')[0].reset();
        //             $('#UpdateStaff')[0].reset();
        //         },
        //         success: function(data) {
        //             $('.mainContents').show();
        //             $('.loader').hide();
        //             console.log(data);
        //             var StaffResult = JSON.parse(data);
        //             if (StaffResult.UserResponse == 1) {
        //                 toastr.success("Staff Added successfully");
        //                 // location.reload();
        //                 MasterTable.ajax.reload();
        //             } else {
        //                 toastr.error("Staff Not Added");
        //             }
        //         },
        //         cache: false,
        //         contentType: false,
        //         processData: false
        //     });
        // });


        // //Delete Staff
        // $('#MasterTable').on('click', '.btn_delete', function() {
        //     var DeleteStaff = $(this).val();
        //     console.log(DeleteStaff);
        //     $.ajax({
        //         url: "MasterOperations.php",
        //         type: "POST",
        //         data: {
        //             DeleteStaff: DeleteStaff
        //         },
        //         beforeSend: function() {
        //             $('.loader').show();
        //             $('.mainContents').hide();
        //             //$('#StaffModal').modal('hide');
        //             //revertUpdatePreview();
        //         },
        //         success: function(data) {
        //             $('.mainContents').show();
        //             $('.loader').hide();
        //             console.log(data);
        //             var StaffResultDelete = JSON.parse(data);
        //             if (StaffResultDelete.Status == true) {
        //                 toastr.success("Staff Deleted successfully");
        //                 //location.reload();
        //                 MasterTable.ajax.reload();
        //             } else {
        //                 toastr.error("Deleting failed");
        //             }
        //         },
        //     });
        // });


        // //Edit Staff
        // $('#MasterTable').on('click', '.btn_edit', function() {
        //     var EditStaff = $(this).val();
        //     console.log(EditStaff);
        //     $.ajax({
        //         url: "MasterOperations.php",
        //         type: "POST",
        //         data: {
        //             EditStaff: EditStaff
        //         },
        //         success: function(data) {
        //             var EditStaff = JSON.parse(data);
        //             console.log(data);
        //             if (EditStaff.Status == true) {
        //                 $('#StaffModal').modal('show');
        //                 $('#AddStaff').hide();
        //                 $('#UpdateStaff').show();
        //                 $("#update_staff_id").val(EditStaff.StaffId);
        //                 $("#update_staff_name").val(EditStaff.StaffName);
        //                 $("#update_staff_branch").val(EditStaff.StaffBranch).change();
        //                 $("#update_staff_agency").val(EditStaff.StaffAgency).change();
        //                 $("#update_staff_designation").val(EditStaff.StaffRole).change();
        //                 $("#update_staff_head").val(EditStaff.StaffHead).change();
        //                 $("#update_staff_phone").val(EditStaff.StaffPhone);
        //                 $("#update_staff_aadhar").val(EditStaff.StaffAdhar);
        //                 $("#update_staff_email").val(EditStaff.StaffEmail);
        //                 $("#update_staff_gender").val(EditStaff.StaffGender).change();
        //                 $("#update_staff_blood_group").val(EditStaff.StaffBloodGroup);
        //                 $("#update_staff_religion").val(EditStaff.StaffReligion).change();
        //                 $("#update_staff_joining_date").val(EditStaff.StaffJoiningDate);
        //                 $("#update_staff_dob").val(EditStaff.StaffDOB);
        //                 $("#update_qualification").val(EditStaff.StaffQualification);
        //                 $("#update_gpay_no").val(EditStaff.StaffGPay);
        //                 $("#update_staff_username").val(EditStaff.StaffUserName);
        //                 $("#update_staff_password").val(EditStaff.StaffPassword);
        //                 $("#update_staff_address").val(EditStaff.StaffAddress);
        //                 $("#update_account_holder_name").val(EditStaff.AccountHolderNAme);
        //                 $("#update_bank_name").val(EditStaff.BankName);
        //                 $("#update_ifsc_code").val(EditStaff.BankIFSC);
        //                 $("#update_branch_name").val(EditStaff.BankBranch);
        //                 $("#update_staff_salary").val(EditStaff.StaffSalary);
        //                 $("#update_account_number").val(EditStaff.BankAccountNo);
        //             }

        //         },
        //     });

        // });



        // //Update Staff
        // $('#UpdateStaff').submit(function(e) {
        //     e.preventDefault();
        //     var UpdateStaff = new FormData(this);
        //     $.ajax({
        //         url: "MasterOperations.php",
        //         method: "POST",
        //         data: UpdateStaff,
        //         beforeSend: function() {
        //             $('.loader').show();
        //             $('.mainContents').hide();
        //             $('#StaffModal').modal('hide');
        //             revertUpdatePreview();
        //             $('#AddStaff')[0].reset();
        //             $('#UpdateStaff')[0].reset();
        //         },
        //         success: function(data) {
        //             $('.mainContents').show();
        //             $('.loader').hide();
        //             console.log(data);
        //             var StaffResultUpdate = JSON.parse(data);
        //             if (StaffResultUpdate.StaffUpdate == 1) {
        //                 toastr.success("Staff updated successfully");
        //                 // location.reload();
        //                 //$('#StaffModal').modal('hide');
        //                 MasterTable.ajax.reload();
        //             } else {
        //                 toastr.error("Updating failed");
        //             }
        //         },
        //         cache: false,
        //         contentType: false,
        //         processData: false
        //     });
        // });
    </script>


</body>

</html>