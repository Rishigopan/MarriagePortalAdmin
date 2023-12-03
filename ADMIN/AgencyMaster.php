<?php

$PageTitle = 'AgencyMaster';
include '../MAIN/Dbconfig.php';

if (isset($_COOKIE['custidcookie']) && isset($_COOKIE['custtypecookie'])) {
    if (!empty($_COOKIE['custtoken'])) {
        if ($_COOKIE['custtypecookie'] == 1) {
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


    <style>
        .image_staff {
            height: 2.5cm !important;
            width: 2.2cm !important;
            border-radius: 10px;
        }

        .staffimageContainer {
            height: 2.5cm !important;
            /* width: 8cm !important; */
        }


        #ViewImagesModal .imagesTab {
            width: 100%;
            background-color: lightcyan;
            border-radius: 3px;
        }

        #ViewImagesModal .imagesTab .nav-item {
            width: 50%;
        }

        #ViewImagesModal .imagesTab .nav-item .nav-link {
            width: 100%;
        }

        #ViewAllImagesCarousel .carousel-item img {
            height: 400px;
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

    <!-- add agency modal -->
    <div class="modal fade addUpdateModal" id="MasterModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content cntrymodalbg">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD AGENCY</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="AddForm" id="AddMaster" novalidate>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-1">Agency Name</label><br>
                                <input type="text" class="form-control" id="agency_name" name="AgencyName" placeholder="Enter agency name" required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-1">Agency Prefix</label><br>
                                <input type="text" class="form-control" id="agency_prefixname" name="AgencyPrefix" placeholder="Enter agency prefix">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-1">Branch Name</label><br>
                                <select class="form-select" aria-label="Default select example name" id="branch_name" name="AgencyBranch" required>
                                    <option value=""> Select Branch</option>
                                    <?php
                                    $fetchbranch = $con->query("select bId,branchName from branch");
                                    $agencycount = $fetchbranch->num_rows;
                                    if ($agencycount > 0) {
                                        while ($row = $fetchbranch->fetch_assoc()) {
                                            foreach ($fetchbranch as $row) {
                                    ?>
                                                <option value="<?php echo $row["bId"]; ?>"> <?php echo $row["branchName"]; ?> </option>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-1">Email</label><br>
                                <input type="email" class="form-control" id="agency_email" name="AgencyEmail" placeholder="Enter email">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-1">Mobile Number</label><br>
                                <input type="number" class="form-control " id="mobile_number" name="MobileNumber" placeholder="Enter mobile number" required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-1">State</label><br>
                                <select class="form-select SelectState" id="state_name" name="AgencyState" required>
                                    <option value="">Select State</option>
                                    <?php
                                    $FetchState = $con->query("SELECT sId,stateName FROM state");
                                    $Statecount = $FetchState->num_rows;
                                    if ($Statecount > 0) {
                                        while ($StateRow = $FetchState->fetch_assoc()) {
                                            foreach ($FetchState as $StateRow) {
                                    ?>
                                                <option value="<?php echo $StateRow["sId"]; ?>"> <?php echo $StateRow["stateName"]; ?> </option>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-1">District</label><br>
                                <select class="form-select SelectDistrict" id="agency_district" name="AgencyDistrict" required>
                                    <option value="">Select District</option>
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-1">City</label>
                                <select class="form-select SelectCity" id="city_name" name="AgencyCity" required>
                                    <option value="">Select City</option>

                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-1">Pancard No</label><br>
                                <input type="text" class="form-control " id="agency_pan" name="AgencyPan" placeholder="Enter PanCard No" required>
                            </div>
                            <div class="col-12">
                                <label class="mt-1">Address</label><br>
                                <textarea cols="30" rows="3" class="form-control " id="address_name" name="AgencyAddress" placeholder="Enter address"></textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-info">ADD AGENCY</button>
                        </div>
                    </form>

                    <form class="UpdateForm" id="UpdateMaster" style="display: none;" novalidate>
                        <div class="row">
                            <input type="hidden" class="form-control " id="update_agencyId" name="UpdateAgencyId" required>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-1">Agency Name</label><br>
                                <input type="text" class="form-control" id="update_agency_name" name="UpdateAgencyName" placeholder="Enter agency name">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-1">Agency Prefix</label><br>
                                <input type="text" class="form-control" id="update_agency_prefixname" name="UpdateAgencyPrefix" placeholder="Enter branch prefix name">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-1">Branch Name</label><br>
                                <select class="form-select" id="update_branch_name" name="UpdateAgencyBranch" required>
                                    <option value=""> Select Branch</option>

                                    <?php

                                    $fetchbranch = $con->query("select bId,branchName from branch");
                                    $agencycount = $fetchbranch->num_rows;
                                    if ($agencycount > 0) {
                                        while ($row = $fetchbranch->fetch_assoc()) {

                                            foreach ($fetchbranch as $row) {
                                    ?>
                                                <option value="<?php echo $row["bId"]; ?>"> <?php echo $row["branchName"]; ?> </option>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>

                                </select>
                                <!-- <input type="text" class="form-control mt-1" id="update_branch_name" name="UpdateBranchName" placeholder="Enter branch prefix name" autofocus required> -->
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-1">Email</label><br>
                                <input type="email" class="form-control" id="update_agency_email" name="UpdateAgencyEmail" placeholder="Enter email">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-1">Mobile Number</label><br>
                                <input type="number" class="form-control" id="update_mobile_number" name="UpdateAgencyMobile" placeholder="Enter mobile number" required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-1">State</label><br>
                                <select class="form-select UpdateSelectState" id="update_state_name" name="UpdateAgencyState" required>
                                    <option value=""> Select State</option>
                                    <?php
                                    $FetchState = $con->query("SELECT sId,stateName FROM state");
                                    $Statecount = $FetchState->num_rows;
                                    if ($Statecount > 0) {
                                        while ($StateRow = $FetchState->fetch_assoc()) {
                                            foreach ($FetchState as $StateRow) {
                                    ?>
                                                <option value="<?php echo $StateRow["sId"]; ?>"> <?php echo $StateRow["stateName"]; ?> </option>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-1">District</label><br>
                                <select class="form-select UpdateSelectDistrict" id="update_district_name" name="UpdateAgencyDistrict" required>
                                    <option value="">Select District</option>
                                    <?php
                                    $FetchDistrict = $con->query("SELECT dId,districtName FROM district");
                                    $Districtcount = $FetchDistrict->num_rows;
                                    if ($Districtcount > 0) {
                                        while ($DistrictRow = $FetchDistrict->fetch_assoc()) {
                                            foreach ($FetchDistrict as $DistrictRow) {
                                    ?>
                                                <option value="<?php echo $DistrictRow["dId"]; ?>"> <?php echo $DistrictRow["districtName"]; ?> </option>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-1">City</label><br>
                                <select class="form-select UpdateSelectCity" id="update_city_name" name="UpdateAgencyCity" required>
                                    <option value="">Select City</option>

                                    <?php
                                    $FetchCity = $con->query("SELECT citId,cityName FROM city");
                                    $Citycount = $FetchCity->num_rows;
                                    if ($Citycount > 0) {
                                        while ($CityRow = $FetchCity->fetch_assoc()) {
                                            foreach ($FetchCity as $CityRow) {
                                    ?>
                                                <option value="<?php echo $CityRow["citId"]; ?>"> <?php echo $CityRow["cityName"]; ?> </option>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <label class="mt-1">Pancard No</label><br>
                                <input type="text" class="form-control" id="update_agency_pan" name="UpdateAgencyPan" placeholder="Enter Pancard No" required>
                            </div>
                            <div class="col-12">
                                <label class="mt-1">Address</label><br>
                                <textarea cols="30" rows="3" class="form-control" id="update_address_name" name="UpdateAgencyAddress" placeholder="Enter address"></textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-info">UPDATE AGENCY</button>
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
                    <h4 class="text-center">Do you want to delete this agency?</h4>
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
                                <input type="text" name="ImageFormName" value="AGENCY" id="" hidden>
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
                <div class="card card-body main_card  shadow-lg p-3 mb-5">
                    <div class="main_heading d-flex justify-content-between mb-2 shadow p-2">
                        <div>
                            <h3 class="pt-3">AGENCY</h3>
                        </div>
                        <div class="">
                            <button class="btn AddBtn mt-1" data-bs-toggle="modal" data-bs-target="#MasterModal">Add Agency</button>
                        </div>
                    </div>

                    <div class="admintoolbar">
                        <div class="card card-body">
                            <div class="row justify-content-between">
                                <div class="col-lg-4 col-4">
                                    <input type="text" class="form-control mt-3" id="SearchBar" placeholder="Search by Agency">
                                </div>
                                <div class="col-lg-4 text-end col-4">

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="">
                        <table class="table table-bordered table-hover mastertable text-nowrap" id="MasterTable" style="width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th class="">Sl No</th>
                                    <th class="">Id Proof&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th class="">Agency Name</th>
                                    <th class="">Agency Prefix</th>
                                    <th class="">Branch Name</th>
                                    <th class="">Email</th>
                                    <th class="">Phone Number</th>
                                    <th class="">State</th>
                                    <th class="">District</th>
                                    <th class="">City</th>
                                    <th class="">Pancard</th>
                                    <th class="">Address</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
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
        // function ResetForms(){
        //     $('.UpdateForm')[0].reset();
        //     $('.AddForm')[0].reset();
        // }


        var Token = '<?= $Token ?>';
        var ApiLink = '<?= $ApiBaseUrl ?>';
        let EmpID = '<?= $EmpID ?>';

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



        //Data Table
        var MasterTable = $('#MasterTable').DataTable({
            "processing": true,
            //"responsive": true,
            "ajax": "AgencyMasterData.php",
            // "scrollY": "600px",
            // "scrollX": true,
            // "scrollCollapse": true,
            // "fixedHeader": true,
            "dom": 'l<"top">rt<"bottom"ip>',
            // "pageLength": 10,
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
            "initComplete": function() {
                //console.log("helloo");
                $("#MasterTable").wrap("<div style='overflow:auto; width:100%;height:70vh;position:relative;'></div>");
            },
            // columnDefs: [{
            //     width: 194,
            //     targets: 1
            // }],
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
                            data = ' <a href="" class="staffimageContainer" data-masterid="' + data.aId + '"><img src="../STAFFIMAGES/IDPROOF/' + data.imageName + '" class=" img-fluid image_staff"></a>';
                        }
                        return data;
                    }

                },
                {
                    data: 'agencyName'
                },
                {
                    data: 'agencyPrefix',
                },
                {
                    data: 'branchName',
                    // render: function(data, type, row, meta) {
                    //     if (type === 'sort') {
                    //         return data;
                    //     }
                    //     return moment(data).format("MMM D , YYYY");
                    // },
                    // searchable: false
                },
                {
                    data: 'agencyEmail',
                },
                {
                    data: 'agencyPhone',
                },
                {
                    data: 'stateName',
                },
                {
                    data: 'districtName',
                },
                {
                    data: 'cityName',
                },
                {
                    data: 'agencyPan',
                },
                {
                    data: 'agencyAddress',
                },
                {
                    data: 'aId',
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


        //View Images Function
        function ViewMasterImages(MasterId) {
            $.ajax({
                url: "MasterExtras.php",
                type: "POST",
                data: {
                    ViewImagesMasterId: MasterId,
                    FormName: "AGENCY"
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

            let validator = $('#AddMaster').jbvalidator({
                //language: 'dist/lang/en.json',
                successClass: false,
                html5BrowserDefault: true
            });

            validator.validator.custom = function(el, event) {
                if ($(el).is('#agency_name') && $(el).val().trim().length == 0) {
                    return 'Cannot be empty';
                } else if ($(el).is('#agency_name,#agency_prefixname') && $(el).val().match(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?0-9]+/)) {
                    return 'Only allowed alphabets';
                } else if ($(el).is('#agency_prefixname') && $(el).val().trim().length > 1) {
                    return 'Only one alphabet is allowed';
                }

            }

            $(document).on('submit', '#AddMaster', (function(e) {
                e.preventDefault();
                $.ajax({
                    url: ApiLink + "/api/agency/add",
                    method: "POST",
                    async: true,
                    crossDomain: true,
                    headers: {
                        "Accept": "application/json",
                        "Authorization": "Bearer " + Token,
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    data: {
                        "agencyName": $('#agency_name').val(),
                        "branchId": $('#branch_name').val(),
                        "agencyPrefix": $('#agency_prefixname').val(),
                        "agencyEmail": $('#agency_email').val(),
                        "agencyPhone": $('#mobile_number').val(),
                        "agencyState": $('#state_name').val(),
                        "agencyDistrict": $('#agency_district').val(),
                        "agencyCity": $('#city_name').val(),
                        "agencyAddress": $('#address_name').val(),
                        "agencyPan": $('#agency_pan').val(),
                        "createdBy": EmpID,
                        "createdDate": getCurrentTime(),
                    },
                    beforeSend: function() {
                        $('.loader').show();
                        $('.mainContents').hide();
                        $('#AddMaster').addClass("disable");
                        $('#ResponseImage').html("");
                        $('#ResponseText').text("");
                    },
                }).done(function(data) {
                    $('.mainContents').show();
                    $('.loader').hide();
                    console.log(data);
                    $('#AddMaster').removeClass("disable");
                    //console.log(TestJson(data));
                    MasterTable.ajax.reload(null, false);
                    var AddResult = data;
                    if (AddResult.Status == true) {
                        if (AddResult.Code == "0") {
                            $('#ResponseImage').html('<img src="./warning.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(AddResult.message);
                            $('#confirmModal').modal('show');
                        } else if (AddResult.Code == "1") {
                            $('#MasterModal').modal('hide');
                            $('#AddMaster')[0].reset();
                            $('#UpdateMaster')[0].reset();
                            $('#ResponseImage').html('<img src="./success.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(AddResult.message);
                            $('#confirmModal').modal('show');
                        } else if (AddResult.Code == "2") {
                            $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(AddResult.message);
                            $('#confirmModal').modal('show');
                        }
                    } else {
                        $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                        $('#ResponseText').text("Some Error Occured, Please refresh the page");
                        $('#confirmModal').modal('show');
                    }
                });
            }));


        });


        //Update master  
        $(function() {

            let validator = $('#UpdateMaster').jbvalidator({
                //language: 'dist/lang/en.json',
                successClass: false,
                html5BrowserDefault: true
            });

            validator.validator.custom = function(el, event) {
                if ($(el).is('#update_agency_name') && $(el).val().trim().length == 0) {
                    return 'Cannot be empty';
                } else if ($(el).is('#update_agency_name,#update_agency_prefixname') && $(el).val().match(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?0-9]+/)) {
                    return 'Only allowed alphabets';
                } else if ($(el).is('#update_agency_prefixname') && $(el).val().trim().length > 1) {
                    return 'Only one alphabet is allowed';
                }

            }

            $(document).on('submit', '#UpdateMaster', (function(e) {
                e.preventDefault();
                var UpdateId = $('#update_agencyId').val();
                console.log(UpdateId);
                
                $.ajax({
                    url: ApiLink + "/api/agency/update/" + UpdateId,
                    method: "PUT",
                    async: true,
                    crossDomain: true,
                    headers: {
                        "Accept": "application/json",
                        "Authorization": "Bearer " + Token,
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    data: {
                        "agencyName": $('#update_agency_name').val(),
                        "branchId": $('#update_branch_name').val(),
                        "agencyPrefix": $('#update_agency_prefixname').val(),
                        "agencyEmail": $('#update_agency_email').val(),
                        "agencyPhone": $('#update_mobile_number').val(),
                        "agencyState": $('#update_state_name').val(),
                        "agencyDistrict": $('#update_district_name').val(),
                        "agencyCity": $('#update_city_name').val(),
                        "agencyAddress": $('#update_address_name').val(),
                        "agencyPan": $('#update_agency_pan').val(),
                        "createdBy": EmpID,
                        "createdDate": getCurrentTime(),
                    },

                    beforeSend: function() {
                        $('.loader').show();
                        $('.mainContents').hide();
                        $('#UpdateMaster').addClass("disable");
                        $('#ResponseImage').html("");
                        $('#ResponseText').text("");
                    },
                }).done(function(data) {
                    $('.mainContents').show();
                    $('.loader').hide();
                    console.log(data);
                    $('#UpdateMaster').removeClass("disable");
                    MasterTable.ajax.reload(null, false);
                    var UpdateMaster = data;
                    if (UpdateMaster.Status == true) {
                        if (UpdateMaster.Code == "0") {
                            $('#ResponseImage').html('<img src="./warning.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(UpdateMaster.message);
                            $('#confirmModal').modal('show');
                        } else if (UpdateMaster.Code == "1") {
                            $('#MasterModal').modal('hide');
                            $('#AddMaster')[0].reset();
                            $('#UpdateMaster')[0].reset();
                            $('#ResponseImage').html('<img src="./success.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(UpdateMaster.message);
                            $('#confirmModal').modal('show');
                        } else if (UpdateMaster.Code == "2") {
                            $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                            $('#ResponseText').text(UpdateMaster.message);
                            $('#confirmModal').modal('show');
                        }
                    } else {
                        $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                        $('#ResponseText').text("Some Error Occured, Please refresh the page");
                        $('#confirmModal').modal('show');
                    }

                });
            }));

        });


        //Edit master
        $('#MasterTable').on('click', '.btn_edit', function() {
            var EditId = $(this).val();
            console.log(EditId);
            $.ajax({
                url: ApiLink + "/api/agency/viewid/" + EditId,
                method: "GET",
                async: true,
                crossDomain: true,
                headers: {
                    "Accept": "application/json",
                    "Authorization": "Bearer " + Token,
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                beforeSend: function() {
                    $('.loader').show();
                    $('.mainContents').hide();
                },
            }).done(function(data) {
                $('.mainContents').show();
                $('.loader').hide();
                $('#AddMaster').hide();
                $('#UpdateMaster').show();
                var ViewEditValues = data;
                console.log(ViewEditValues);
                $("#update_agencyId").val(ViewEditValues.AgencyId);
                $("#update_agency_name").val(ViewEditValues.AgencyName);
                $("#update_agency_prefixname").val(ViewEditValues.AgencyPrefix);
                $("#update_branch_name").val(ViewEditValues.BranchId).change();
                $("#update_agency_email").val(ViewEditValues.AgencyEmail);
                $("#update_mobile_number").val(ViewEditValues.AgencyPhone);
                $("#update_state_name").val(ViewEditValues.AgencyState).change();
                $("#update_city_name").val(ViewEditValues.AgencyCity).change();
                $("#update_district_name").val(ViewEditValues.AgencyDistrict).change();
                $("#update_address_name").val(ViewEditValues.AgencyAddress);
                $("#update_agency_pan").val(ViewEditValues.AgencyPan);
                $('#MasterModal').modal('show');
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
                            DeleteAgency: delValue
                        },
                        beforeSend: function() {
                            $('.loader').show();
                            $('.mainContents').hide();
                            $('#AddMaster')[0].reset();
                            $('#UpdateMaster')[0].reset();
                            $('#delModal').modal('hide');
                            $('#ResponseImage').html("");
                            $('#ResponseText').text("");
                        },
                        success: function(data) {
                            $('.mainContents').show();
                            $('.loader').hide();
                            console.log(data);
                            MasterTable.ajax.reload(null, false);
                            if (TestJson(data) == true) {
                                var delResponse = JSON.parse(data);
                                if (delResponse.Status == true) {
                                    if (delResponse.Code == 0) {
                                        $('#ResponseImage').html('<img src="./warning.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                        $('#ResponseText').text("Agency is Already in Use");
                                        $('#confirmModal').modal('show');
                                    } else if (delResponse.Code == 1) {
                                        $('#ResponseImage').html('<img src="./success.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                        $('#ResponseText').text("Successfully Deleted Agency");
                                        $('#confirmModal').modal('show');
                                        //ResetForms();
                                        //ReloadTable();
                                    } else if (delResponse.Code == 2) {
                                        $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                        $('#ResponseText').text("Failed Deleting Agency");
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


        function ShowState(SelectedState) {
            var SelectedState = SelectedState;
            $.ajax({
                type: "POST",
                url: "MasterExtras.php",
                data: {
                    SelectedState: SelectedState
                },
                success: function(data) {
                    //console.log(data);
                    $('.SelectDistrict').html(data);
                }
            });
        }

        function ShowDistrict(SelectedDistrict) {
            var SelectedDistrict = SelectedDistrict;
            $.ajax({
                type: "POST",
                url: "MasterExtras.php",
                data: {
                    SelectedDistrict: SelectedDistrict
                },
                success: function(data) {
                    //console.log(data);
                    $('.SelectCity').html(data);
                }
            });
        }


        $('.SelectState').change(function() {
            var SelectedState = $(this).val();
            ShowState(SelectedState);
        });

        $('.SelectDistrict').change(function() {
            var SelectedDistrict = $(this).val();
            ShowDistrict(SelectedDistrict);
        });


        $('.UpdateSelectState').click(function() {
            var SelectedState = $(this).val();
            $.ajax({
                type: "POST",
                url: "MasterExtras.php",
                data: {
                    SelectedState: SelectedState
                },
                success: function(data) {
                    console.log(data);
                    $('.UpdateSelectDistrict').html(data);
                }
            });
        });

        $('.UpdateSelectDistrict').click(function() {
            var SelectedDistrict = $(this).val();
            $.ajax({
                type: "POST",
                url: "MasterExtras.php",
                data: {
                    SelectedDistrict: SelectedDistrict
                },
                success: function(data) {
                    //console.log(data);
                    $('.UpdateSelectCity').html(data);
                }
            });
        });
    </script>


</body>

</html>