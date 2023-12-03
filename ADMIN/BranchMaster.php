<?php

$PageTitle = 'BranchMaster';
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

    <!-- Add Modal -->
    <div class="modal fade addUpdateModal" id="BranchModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content cntrymodalbg">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD BRANCH</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="AddForm" id="AddBranch" novalidate>
                        <div class="row">
                            <div class="col-6">
                                <label class="mt-2">Branch Name</label>
                                <input type="text" class="form-control" id="branch_name" name="BranchName" placeholder="Enter branch name" required>
                            </div>
                            <div class="col-6">
                                <label class="mt-2">Branch Prefix Name</label>
                                <input type="text" class="form-control " id="branch_prefix" name="BranchPrefix" placeholder="Enter branch prefix name">
                            </div>
                            <div class="col-6">
                                <label class="mt-2">Email</label>
                                <input type="text" class="form-control " id="branch_email" name="BranchEmail" placeholder="Enter email">
                            </div>
                            <div class="col-6">
                                <label class="mt-2">Mobile Number</label>
                                <input type="text" class="form-control " id="branch_phone" name="BranchPhone" placeholder="Enter branch phone" required>
                            </div>
                            <div class="col-6">
                                <label class="mt-2">State</label>
                                <select class="form-select SelectState" id="branch_state" name="BranchState" required>
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

                            <div class="col-6">
                                <label class="mt-2">District</label>
                                <select class="form-select SelectDistrict" id="branch_district" name="BranchDistrict" required>
                                    <option value="">Select District</option>
                                </select>

                            </div>
                            <div class="col-6">
                                <label class="mt-2">City</label>
                                <select class="form-select SelectCity" id="branch_city" name="BranchCity" required>
                                    <option value="">Select City</option>

                                </select>
                            </div>
                            <div class="col-6">
                                <label class="mt-2">Pancard No</label>
                                <input type="text" class="form-control" id="branch_pan" name="BranchPan" placeholder="Enter Pancard No" required>
                            </div>
                            <!-- <div class="col-12">
                                <label class="mt-2">Upload Id Proof</label>
                                <input type="file" class="form-control" id="branch_image" name="BranchImage[]" accept=".jpg,.png" multiple>
                            </div> -->
                            <div class="col-12">
                                <label class="mt-2">Address</label>
                                <textarea class="form-control mt-1" id="branch_address" name="BranchAddress" placeholder="Enter address" cols="3"></textarea>
                            </div>
                            <div class="d-flex justify-content-center col-12">
                                <button type="submit" class="btn  btn-info">ADD BRANCH</button>
                            </div>
                        </div>

                    </form>

                    <form class="UpdateForm" id="UpdateBranch" style="display: none;" novalidate>

                        <div class="row">
                            <input type="text" class="form-control " id="update_branchId" name="UpdatebranchId" required hidden>
                            <div class="col-6">
                                <label class="mt-2">Branch Name</label>
                                <input type="text" class="form-control" id="update_branch_name" name="UpdatebranchName" placeholder="Enter branch name" required>
                            </div>
                            <div class="col-6">
                                <label class="mt-2">Branch Prefix Name</label>
                                <input type="text" class="form-control " id="update_branch_prefix" name="UpdatebranchPrefix" placeholder="Enter branch prefix name">
                            </div>
                            <div class="col-6">
                                <label class="mt-2">Email</label>
                                <input type="text" class="form-control " id="update_branch_email" name="Updateemail" placeholder="Enter email">
                            </div>
                            <div class="col-6">
                                <label class="mt-2">Mobile Number</label>
                                <input type="text" class="form-control " id="update_branch_phone" name="Updatephone" placeholder="Enter branch phone" required>
                            </div>
                            <div class="col-6">
                                <label class="mt-2">State</label>
                                <select class="form-select UpdateSelectState" id="update_branch_state" name="UpdateBranchState" required>
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
                            <div class="col-6">
                                <label class="mt-2">City</label>
                                <select class="form-select UpdateSelectDistrict" id="update_branch_district" name="UpdateBranchDistrict" required>
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
                            <div class="col-6">
                                <label class="mt-2">District</label>
                                <select class="form-select UpdateSelectCity" id="update_branch_city" name="UpdateBranchCity" required>
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
                            <div class="col-6">
                                <label class="mt-2">Pancard No</label>
                                <input type="text" class="form-control" id="update_branch_pan" name="UpdateBranchPan" placeholder="Enter Pancard No" required>
                            </div>

                            <!-- <div class="col-12">
                                <label class="mt-2">Upload Id Proof</label>
                                <input type="file" class="form-control" id="update_branch_image" name="UpdateBranchImage[]" accept=".jpg,.png">
                            </div> -->

                            <div class="col-12">
                                <label class="mt-2">Address</label>
                                <textarea class="form-control mt-1" id="update_branch_address" name="Updateaddress" placeholder="Enter address" cols="3"></textarea>
                            </div>
                            <div class="d-flex justify-content-center col-12">
                                <button type="submit" class="btn  btn-info">UPDATE BRANCH</button>
                            </div>
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
                    <h4 class="text-center">Do you want to delete this Branch?</h4>
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
                                <input type="text" name="ImageFormName" value="BRANCH" id="" hidden>
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
<!-- 
        <div class="pagetitle">
            <h1>Branch Master</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Branch Master</li>
                </ol>
            </nav>
        </div> -->

        <section class="section dashboard">

            <!--CONTENTS-->
            <div class="container-fluid mainContents">
                <div class="card card-body main_card shadow-lg p-3 mb-5">
                    <div class="main_heading d-flex justify-content-between mb-2 shadow p-2">
                        <div>
                            <h3 class="pt-3">BRANCH</h3>
                        </div>
                        <div class="">
                            <button class="btn AddBtn mt-1" data-bs-toggle="modal" data-bs-target="#BranchModal">Add
                                Branch</button>
                        </div>
                    </div>

                    <div class="admintoolbar">
                        <div class="card card-body">
                            <div class="row justify-content-between">
                                <div class="col-lg-4 col-4">
                                    <input type="text" class="form-control mt-3" id="SearchBar" placeholder="Search by Branch">
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
                                    <th class="">Branch Name</th>
                                    <th class="">Branch Prefix</th>
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

            <div class="loader" id="loader">
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


        var MasterTable = $('#MasterTable').DataTable({
            "processing": true,
            //"responsive": true,
            "ajax": "BranchMasterData.php",
            //"scrollY": "600px",
            //"scrollX": true,
            //"scrollCollapse": true,
            //"fixedHeader": true,
            "dom": 'l<"top">rt<"bottom"ip>',
            "lengthMenu": [
                [20, 50, 100, -1],
                [20, 50, 100, 'All'],
            ],
            // "pageLength": 10,
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
                            data = ' <a href="" class="staffimageContainer" data-masterid="' + data.bId + '"><img src="../STAFFIMAGES/IDPROOF/' + data.imageName + '" class=" img-fluid image_staff"></a>';
                        }
                        return data;
                    }

                },
                {
                    data: 'branchName',
                },
                {
                    data: 'branchPrefix',
                },
                {
                    data: 'email',
                },
                {
                    data: 'phoneNumber',
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
                    data: 'branchPan',
                },
                {
                    data: 'address',
                },
                // {
                //     data: 'createdDate',
                //     render: function(data, type, row, meta) {
                //         if (type === 'sort') {
                //             return data;
                //         }
                //         return moment(data).format("MMM D , YYYY");
                //     },
                //     searchable: false
                // },
                {
                    data: 'bId',
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
                    FormName: "BRANCH"
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

            let validator = $('#AddBranch').jbvalidator({
                //language: 'dist/lang/en.json',
                successClass: false,
                html5BrowserDefault: true
            });

            validator.validator.custom = function(el, event) {
                if ($(el).is('#Branch_name') && $(el).val().trim().length == 0) {
                    return 'Cannot be empty';
                }
                // else if($(el).is('#update_country_name') && $(el).val().match(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?0-9]+/)){
                //     return 'Only allowed alphabets';
                // }

            }

            $(document).on('submit', '#AddBranch', (function(e) {
                e.preventDefault();
                var branchData = new FormData(this);
                $.ajax({
                    url: "MasterOperations.php",
                    method: "POST",
                    data: branchData,
                    beforeSend: function() {
                        $('.loader').show();
                        $('.mainContents').hide();
                        $('#AddBranch').addClass("disable");
                        $('#ResponseImage').html("");
                        $('#ResponseText').text("");
                        //revertPreview();
                    },
                    success: function(data) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        console.log(data);
                        $('#AddBranch').removeClass("disable");
                        //console.log(TestJson(data));
                        MasterTable.ajax.reload();
                        if (TestJson(data) == true) {
                            var BranchResult = JSON.parse(data);
                            if (BranchResult.Status == true) {
                                if (BranchResult.Code == "0") {
                                    $('#ResponseImage').html('<img src="./warning.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                    $('#ResponseText').text("Branch is Already Present");
                                    $('#confirmModal').modal('show');
                                } else if (BranchResult.Code == "1") {
                                    $('#BranchModal').modal('hide');
                                    $('#AddBranch')[0].reset();
                                    $('#UpdateBranch')[0].reset();
                                    $('#ResponseImage').html('<img src="./success.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                    $('#ResponseText').text("Successfully Added Branch");
                                    $('#confirmModal').modal('show');
                                } else if (BranchResult.Code == "2") {
                                    $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                    $('#ResponseText').text("Failed Adding Branch");
                                    $('#confirmModal').modal('show');
                                }
                            } else {
                                $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Failed Adding Branch");
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

            let validator = $('#UpdateBranch').jbvalidator({
                //language: 'dist/lang/en.json',
                successClass: false,
                html5BrowserDefault: true
            });

            validator.validator.custom = function(el, event) {
                if ($(el).is('#update_branch_name') && $(el).val().trim().length == 0) {
                    return 'Cannot be empty';
                }
                // else if($(el).is('#update_country_name') && $(el).val().match(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?0-9]+/)){
                //     return 'Only allowed alphabets';
                // }

            }

            $(document).on('submit', '#UpdateBranch', (function(e) {
                e.preventDefault();
                var UpdateBranchData = new FormData(this);
                $.ajax({
                    url: "MasterOperations.php",
                    method: "POST",
                    data: UpdateBranchData,
                    beforeSend: function() {
                        $('.loader').show();
                        $('.mainContents').hide();
                        $('#UpdateBranch').addClass("disable");
                        $('#ResponseImage').html("");
                        $('#ResponseText').text("");
                        //revertPreview();
                    },
                    success: function(data) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        console.log(data);
                        $('#UpdateBranch').removeClass("disable");
                        //console.log(TestJson(data));
                        MasterTable.ajax.reload();
                        if (TestJson(data) == true) {
                            var BranchResultUpdate = JSON.parse(data);
                            if (BranchResultUpdate.Status == true) {
                                if (BranchResultUpdate.Code == "0") {
                                    $('#ResponseImage').html('<img src="./warning.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                    $('#ResponseText').text("Branch is Already Present");
                                    $('#confirmModal').modal('show');
                                } else if (BranchResultUpdate.Code == "1") {
                                    $('#BranchModal').modal('hide');
                                    $('#AddBranch')[0].reset();
                                    $('#UpdateBranch')[0].reset();
                                    $('#ResponseImage').html('<img src="./success.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                    $('#ResponseText').text("Successfully updated Branch");
                                    $('#confirmModal').modal('show');
                                } else if (BranchResultUpdate.Code == "2") {
                                    $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                    $('#ResponseText').text("Failed Updating Branch");
                                    $('#confirmModal').modal('show');
                                }
                            } else {
                                $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                $('#ResponseText').text("Failed Updating Branch");
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


        //Edit Master
        $('#MasterTable').on('click', '.btn_edit', function() {
            var EditBranchData = $(this).val();
            //console.log(EditBranchData);
            $.ajax({
                url: "MasterOperations.php",
                type: "POST",
                data: {
                    EditBranchData: EditBranchData
                },
                beforeSend: function() {
                    $('#UpdateBranch')[0].reset();
                    $('#AddBranch')[0].reset();
                },
                success: function(data) {
                    //console.log(data);
                    var UpdateBranch = JSON.parse(data);
                    if (UpdateBranch.Status == true) {
                        $('#AddBranch').hide();
                        $('#UpdateBranch').show();
                        $("#update_branchId").val(UpdateBranch.BranchId);
                        $("#update_branch_name").val(UpdateBranch.BranchName);
                        $("#update_branch_prefix").val(UpdateBranch.BranchPrefix);
                        $("#update_branch_email").val(UpdateBranch.Email);
                        $("#update_branch_phone").val(UpdateBranch.Mobile);
                        $("#update_branch_state").val(UpdateBranch.State).change();
                        $("#update_branch_district").val(UpdateBranch.District).change();
                        $("#update_branch_city").val(UpdateBranch.City).change();
                        $("#update_branch_address").val(UpdateBranch.Address);
                        $("#update_branch_pan").val(UpdateBranch.BranchPan);
                        $('#BranchModal').modal('show');
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
                            DeleteBranch: delValue
                        },
                        beforeSend: function() {
                            $('.loader').show();
                            $('.mainContents').hide();
                            $('#AddBranch')[0].reset();
                            $('#UpdateBranch')[0].reset();
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
                                        $('#ResponseText').text("Branch is Already in Use");
                                        $('#confirmModal').modal('show');
                                    } else if (delResponse.Code == 1) {
                                        $('#ResponseImage').html('<img src="./success.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                        $('#ResponseText').text("Successfully Deleted Branch");
                                        $('#confirmModal').modal('show');
                                        //ResetForms();
                                        //ReloadTable();
                                    } else if (delResponse.Code == 2) {
                                        $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                        $('#ResponseText').text("Failed Deleting Branch");
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