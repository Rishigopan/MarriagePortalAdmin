<?php

$PageTitle = 'SubCasteMaster';
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



</head>

<body>

    <div class="modal fade addUpdateModal" id="MasterModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content cntrymodalbg">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Sub Caste</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                
                    <form action="" id="AddMaster" class="AddForm">
                        <div class="row pt-3">
                            <div class="col-12">
                                <label for="religion_id" class="form-label">Religion</label>
                                <select class="form-select mb-3" id="religion_id" name="ReligionId" required>
                                    <option hidden value=''> Select Religion </option>
                                    <?php
                                    $FindReligion =  mysqli_query($con, "SELECT rId,religionName FROM religion");
                                    foreach ($FindReligion as $FindReligionResult) {
                                        echo "<option value='" . $FindReligionResult['rId'] . "'> " . $FindReligionResult['religionName'] . "  </option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="caste_id" class="form-label">Caste</label>
                                <select class="form-select mb-3 ShowCaste" id="caste_id" name="CasteId" required>
                                    <option hidden value=''> Select Caste </option>

                                </select>
                            </div>
                            <div class="col-12">
                                <label for="sub_caste_name" class="form-label">Sub Caste</label>
                                <input class="form-control mb-3" type="text" placeholder=" " id="sub_caste_name" name="SubCasteName" required>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-info">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form action="" id="UpdateMaster" class="UpdateForm" style="display:none;">
                        <div class="row pt-3">
                            <div class="col-12">
                                <input type="hidden" id="update_sub_caste_id" name="UpdateSubCasteId">
                                <label for="caste_name" class="form-label">Religion</label>
                                <select class="form-select mb-3" id="update_religion_id" name="UpdateReligionId" required>
                                    <option hidden value=''> Select Religion </option>
                                    <?php
                                    foreach ($FindReligion as $FindReligionResult) {
                                        echo "<option value='" . $FindReligionResult['rId'] . "'> " . $FindReligionResult['religionName'] . "  </option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="update_caste_id" class="form-label">Caste</label>
                                <select class="form-select mb-3 ShowCaste" id="update_caste_id" name="UpdateCasteId" required>
                                    <option hidden value=''> Select Caste </option>

                                </select>
                            </div>
                            <div class="col-12">
                                <label for="update_sub_caste" class="form-label">Sub Caste</label>
                                <input class="form-control mb-3" type="text" placeholder=" " id="update_sub_caste" name="UpdateSubCaste" required>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-info">UPDATE</button>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="delModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="exampleModalLabel">Delete Confirmation</h5>
                </div>
                <div class="modal-body">
                    <h4 class="text-center">Do you want to delete this Caste?</h4>
                    <div class="text-center mt-3">
                        <button type="button" id="confirmYes" class="btn btn-primary me-5">Yes</button>
                        <button type="button" id="confirmNo" class="btn btn-secondary ms-5" data-bs-dismiss="modal">No</button>
                    </div>
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

        <div class="pagetitle">
            <h1>Sub Caste Master</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Religion </li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">


            <!--CONTENTS-->
            <div class="container-fluid mainContents">
                <div class="card card-body main_card shadow-lg p-3 mb-5">
                    <div class="main_heading d-flex justify-content-between mb-2 shadow p-2">
                        <div>
                            <h3 class="pt-3">SUB CASTE</h3>
                        </div>
                        <div class="">
                            <button class="btn AddBtn mt-1" data-bs-toggle="modal" data-bs-target="#MasterModal">Add Sub Caste</button>
                        </div>
                    </div>

                    <div class="admintoolbar">
                        <div class="card card-body">
                            <div class="row justify-content-between">
                                <div class="col-lg-4 col-4 mt-3">
                                    <input type="text" class="form-control" id="SearchBar" placeholder="Search by Sub Caste">
                                </div>
                                <div class="col-lg-4 text-end col-4">

                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="">
                        <table class="table table-hover mastertable" id="MasterTable" style="width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th class="">Sl No</th>
                                    <th class="">Religion</th>
                                    <th class="">Caste</th>
                                    <th class="">Sub Caste</th>
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
        var Token = '<?= $Token ?>';
        var ApiLink = '<?= $ApiBaseUrl ?>';
        let EmpID = '<?= $EmpID ?>';

        console.log(Token);


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




        function FetchCasteByReligion(ReligionId) {
            $.ajax({
                url: "MasterExtras.php",
                method: "POST",
                async: true,
                crossDomain: true,
                data: {
                    fetchCaste: ReligionId
                },
                beforeSend: function() {},
            }).done(function(data) {
                //console.log(data);
                $('.ShowCaste').html(data);
            });
        }


        //Fetch caste by religion in add form
        $(document).on('change', '#religion_id', function() {
            var ReligionId = $(this).val();
            //console.log(ReligionId);
            FetchCasteByReligion(ReligionId)
        });


        //Fetch caste by religion in update form
        $(document).on('click', '#update_religion_id', function() {

            $('#update_religion_id').change(function() {
                var ReligionId = $(this).val();
                //console.log(ReligionId);
                FetchCasteByReligion(ReligionId)
            })

        });


        //DataTable
        var MasterTable = $('#MasterTable').DataTable({
            "processing": true,
            //"responsive": true,
            "ajax": "SubCasteMasterData.php",
            "scrollY": "600px",
            "scrollX": true,
            "scrollCollapse": true,
            "fixedHeader": true,
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
                    data: 'religionName',
                },
                {
                    data: 'casteName',
                },
                {
                    data: 'subcasteName',
                },
                {
                    data: 'scId',
                    searchable: false,
                    orderable: false,
                    "render": function(data, type, row, meta) {
                        if (type == 'display') {
                            data = '<div class="d-flex justify-content-center me-3">  <button class="btn btn_actions btn_edit me-3" data-bs-toggle="tooltip" data-bs-custom-class="edit-tooltip" data-bs-placement="top" data-bs-title="Edit" value="' + data + '"><i class="material-icons">edit</i> </button> <button class="btn btn_actions btn_delete" data-bs-toggle="tooltip" data-bs-custom-class="delete-tooltip" data-bs-placement="top" data-bs-title="Delete" value="' + data + '"><i class="material-icons">delete</i> </button>  </div>'
                        }
                        return data;
                    }
                }
            ]
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
                if ($(el).is('#sub_caste_name') && $(el).val().trim().length == 0) {
                    return 'Cannot be empty';
                }
                // else if($(el).is('#update_country_name') && $(el).val().match(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?0-9]+/)){
                //     return 'Only allowed alphabets';
                // }

            }

            $(document).on('submit', '#AddMaster', (function(e) {
                e.preventDefault();
                $.ajax({
                    url: ApiLink + "/api/subcaste/add",
                    method: "POST",
                    async: true,
                    crossDomain: true,
                    headers: {
                        "Accept": "application/json",
                        "Authorization": "Bearer " + Token,
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    data: {
                        "religionId": $('#religion_id').val(),
                        "casteId": $('#caste_id').val(),
                        "subcasteName": $('#sub_caste_name').val(),
                        "createdBy": EmpID,
                        "createdDate": "2021-02-12"
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



        //Delete master
        $('#MasterTable tbody').on('click', '.btn_delete', function() {
            var delValue = $(this).val();
            console.log(delValue);
            $('#delModal').modal('show');
            $('#confirmYes').click(function() {
                if (delValue != null) {
                    $.ajax({
                        url: ApiLink + "/api/subcaste/delete/" + delValue,
                        method: "DELETE",
                        async: true,
                        crossDomain: true,
                        headers: {
                            "Accept": "application/json",
                            "Authorization": "Bearer " + Token,
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

                    }).done(function(data) {
                        $('.mainContents').show();
                        $('.loader').hide();
                        console.log(data);
                        MasterTable.ajax.reload(null, false);
                        var delResponse = data;
                        if (delResponse.Status == true) {
                            if (delResponse.Code == 0) {
                                $('#ResponseImage').html('<img src="./warning.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(delResponse.message);
                                $('#confirmModal').modal('show');
                            } else if (delResponse.Code == 1) {
                                $('#ResponseImage').html('<img src="./success.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(delResponse.message);
                                $('#confirmModal').modal('show');
                            } else if (delResponse.Code == 2) {
                                $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                $('#ResponseText').text(delResponse.message);
                                $('#confirmModal').modal('show');
                            }
                        } else {
                            $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                            $('#ResponseText').text("Some Error Occured, Please refresh the page");
                            $('#confirmModal').modal('show');
                        }
                        delValue = undefined;
                        delete window.delValue;
                    });
                }
            });
            $('#confirmNo').click(function() {
                delValue = undefined;
                delete window.delValue;
            });
        });



        //Update master  
        $(function() {

            let validator = $('#UpdateMaster').jbvalidator({
                //language: 'dist/lang/en.json',
                successClass: false,
                html5BrowserDefault: true
            });

            validator.validator.custom = function(el, event) {
                if ($(el).is('#update_sub_caste') && $(el).val().trim().length == 0) {
                    return 'Cannot be empty';
                }
                // else if($(el).is('#update_country_name') && $(el).val().match(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?0-9]+/)){
                //     return 'Only allowed alphabets';
                // }

            }

            $(document).on('submit', '#UpdateMaster', (function(e) {
                e.preventDefault();
                var UpdateId = $('#update_sub_caste_id').val();
                console.log(UpdateId);
                $.ajax({
                    url: ApiLink + "/api/subcaste/update/" + UpdateId,
                    method: "PUT",
                    async: true,
                    crossDomain: true,
                    headers: {
                        "Accept": "application/json",
                        "Authorization": "Bearer " + Token,
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    data: {
                        "religionId": $('#update_religion_id').val(),
                        "casteId": $('#update_caste_id').val(),
                        "subcasteName": $('#update_sub_caste').val(),
                        "updatedBy": EmpID,
                        "updatedDate": "2023-02-02"
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



        //Edit Master
        $('#MasterTable').on('click', '.btn_edit', function() {
            var EditId = $(this).val();
            console.log(EditId);
            $.ajax({
                url: ApiLink + "/api/subcaste/viewid/" + EditId,
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
                $.ajax({
                    url: "MasterExtras.php",
                    method: "POST",
                    async: true,
                    crossDomain: true,
                    data: {
                        fetchCaste: ViewEditValues.religion
                    }
                }).done(function(data) {
                    //console.log(data);
                    $('.ShowCaste').html(data);
                    $('#update_caste_id').val(ViewEditValues.caste);
                });
                $('#update_religion_id').val(ViewEditValues.religion).change();
                $('#update_sub_caste').val(ViewEditValues.subcaste);
                $('#update_sub_caste_id').val(EditId);
                $('#MasterModal').modal('show');
            });
        });


    </script>




</body>

</html>