<?php $PageTitle = 'FreeDataDuplicate';

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
        .ConfirmBtn {
            background-color: #82cbeb;
            border-radius: 10px;
        }

        .CancelBtn {
            background-color: rgb(253, 169, 185);
            border-radius: 10px;
        }

        .table thead tr th {
            position: sticky;
            top: 0;
            background-color: #82cbeb;
            font-size: 14px;
        }

        .BTNBLUE {
            background-color: #82cbeb;
            font-weight: 600;
            font-size: 14px;
            border: 1px solid black;
        }

        .BTNBLUE:hover {
            background-color: #82cbeb;
        }

        .BTNBLUE:focus {
            background-color: #82cbeb !important;
        }

        .BTNPINK {
            background-color: #ff98c5;
            font-weight: 600;
            font-size: 14px;
            border: 1px solid black;
        }

        .BTNPINK:hover {
            background-color: #ff98c5;
        }

        .BTNPINK:focus {
            background-color: #ff98c5 !important;
        }

        .SelectAllCheck {
            height: 25px;
            width: 25px;
        }

        .table tbody td:nth-child(12),
        .table tbody td:nth-child(13) {
            vertical-align: middle;
        }
    </style>

</head>

<body>

    <!-- Navbar include -->
    <?php include('../MAIN/Navbar.php'); ?>


    <!-- Sidebar include -->
    <?php include('../MAIN/Sidebar.php'); ?>



    <!-- Confirm Modal -->
    <div class="modal fade ResponseModal" id="confirmModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-3 py-5">
                    <div class="text-center mb-4" id="ResponseImage">

                    </div>
                    <h4 id="ResponseText" class="text-center mb-3"></h4>
                    <div class="text-center">
                        <button type="button" id="btnConfirm" style="display: none;" class="btn btn_save mt-4 px-5 py-2" data-bs-dismiss="modal">Proceed</button>
                        <button type="button" id="btnClose" class="btn btn_save mt-4 px-5 py-2" data-bs-dismiss="modal">Okay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Delete  Modal -->
    <div class="modal deleteModal fade" id="delModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body py-5 px-4">
                    <div class="text-center deleteImg mb-5">
                        <img src="../IMAGES/error.jpg" class="img-fluid" alt="">
                    </div>
                    <h5 class="text-center">Delete Duplicate</h5>
                    <p class="text-center mt-3 px-3">Are you sure you want to delete this duplicate?</p>
                    <div class="text-center mt-5">
                        <button type="button" id="confirmYes" class="btn btn_save w-100 ConfirmBtn">Yes , Delete
                            Duplicate</button>
                        <button type="button" id="confirmNo" class="btn btn_deleteCancel CancelBtn w-100 mt-3" data-bs-dismiss="modal">No , Cancel Deleting</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Convert  Modal -->
    <div class="modal convertModal fade" id="convertModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body py-5 px-4">
                    <div class="text-center deleteImg mb-5">
                        <img src="../IMAGES/error.jpg" class="img-fluid" alt="">
                    </div>
                    <h5 class="text-center">Convert Duplicate</h5>
                    <p class="text-center mt-3 px-3">Are you sure you want to convert this duplicate?</p>
                    <div class="text-center mt-5">
                        <button type="button" id="convertYes" class="btn btn_save w-100 ConfirmBtn border-1">Yes , Convert
                            Duplicate</button>
                        <button type="button" id="convertNo" class="btn btn_deleteCancel CancelBtn border-1 w-100 mt-3" data-bs-dismiss="modal">No ,
                            Cancel Converting</button>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Free Data Duplicates</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Free Data Duplicates</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">


            <div class="card card-body table-card p-0 px-3 py-1">

                <!-- <div class="row">

                    <div class="col-12 col-12 text-end">
                        <input type="checkbox" class="form-check-input SelectAllCheck me-3" value=""></input>
                        <button class="btn BTNBLUE px-3 me-3 ConvertAll">Convert</button>
                        <button class="btn BTNPINK px-3 DeleteAll">Delete&nbsp;</button>
                    </div>

                </div>

                <hr> -->


                <div class="row mt-2">
                    <div class="col-lg-4 col-md-4">
                        <input class="form-control" id="SearchTable" placeholder="Search">
                    </div>
                    <div class="col-lg-1 col-md-2 mt-2 mt-md-0">
                        <select class="form-select" id="PageLengthTable">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="250">250</option>
                            <option value="500">500</option>
                            <option value="-1">All</option>
                        </select>
                    </div>
                    <div class="col-lg-7 col-md-6 mt-2 mt-md-0">
                        <div class="row">
                            <div class="col-12 col-12 text-end">
                                <input type="checkbox" class="form-check-input SelectAllCheck me-3" value=""></input>
                                <button class="btn BTNBLUE px-3 me-3 ConvertAll">Convert</button>
                                <button class="btn BTNPINK px-3 DeleteAll">Delete&nbsp;</button>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>


                <table class="table table-striped table-bordered display" id="product_table" style="width:100%;">
                    <thead class="text-center">
                        <tr>
                            <th class="">&nbsp;</th>
                            <th class="">Sl.No</th>
                            <th class="">Call</th>
                            <th class="">Profile ID</th>
                            <th class="">Full Name</th>
                            <!-- <th class="">CheckedValue</th> -->
                            <th class="">ImportedData</th>
                            <th class="">Profile ID</th>
                            <th class="">Registered Number</th>
                            <th class="">Whatsapp Number</th>
                            <th class="">Residence Number</th>
                            <th class="">Company ID</th>
                            <!-- <th class="">Du. Profile ID</th>
                            <th class="">Du. Company ID</th>
                            <th class="">Du. Reg. Number</th>
                            <th class="">Du. Wha. Number</th>
                            <th class="">Du. Resid. Number</th> -->
                            <!-- <!- class=""- <th>DOB</th> -->
                            <!-- 
                                <th class="">Whatsapp Phone</th>
                                <th class="">Residential Phone</th> -->
                            <!-- <!- class=""- <th>Contact Person</th> -->
                            <!-- <!- class=""- <th>Address</th> -->

                            <!-- <th class="">Duplicate Numbers</th>
                                
                                
                                
                                <th class="">DuplicatesIn</th> -->
                            <th class="">Convert</th>
                            <th class="">Delete</th>
                        </tr>
                    </thead>
                    <tbody class="">


                    </tbody>
                </table>


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

        var PageLength = $('#PageLengthTable').val();

        var itemTable = $('#product_table').DataTable({
            "processing": true,
            "ajax": "DuplicateDatas.php?FreeDuplicate",
            //"responsive": true,

            // "scrollX": true,
            "fixedHeader": true,
            "dom": '<"top">rt<"bottom"ip>',
            "ordering": false,
            "pageLength": 5,
            "initComplete": function() {
                //console.log("helloo");
                $("#product_table").wrap("<div style='overflow:auto; width:100%;height:70vh;position:relative;'></div>");
            },
            "columns": [{
                    data: 'custId',
                    searchable: false,
                    render: function(data, type, row, meta) {
                        data = '<input type="checkbox" class="form-check-input me-2 SelectDuplicates" value="' + data + '"></input>'
                        //return meta.row + meta.settings._iDisplayStart + 1;
                        return data;
                    }
                },
                {
                    data: null,
                    searchable: false,
                    render: function(data, type, row, meta) {
                        data = '<div class="">' + (meta.row + meta.settings._iDisplayStart +
                            1) + '</div>'
                        //return meta.row + meta.settings._iDisplayStart + 1;
                        return data;
                    }
                },
                {
                    data: 'registeredNumber',
                    searchable: false,
                    render: function(data, type, row, meta) {
                        data = '<a class="" href="tel:+91' + data +
                            '">  <i class="ri-phone-fill"></i> </a>'
                        //return meta.row + meta.settings._iDisplayStart + 1;
                        return data;
                    }
                },
                {
                    data: 'profileId'
                },
                {
                    data: 'fullName'
                },
                // {
                //     data: 'dob'
                // },
                // {
                //     data: 'registeredNumber'
                // },
                // {
                //     data: 'whatsappNumber'
                // },
                // {
                //     data: 'residencePhoneNumber'
                // },
                // {
                //     data: 'contactPerson'
                // },
                // {
                //     data: 'address'
                // },
                // {
                //     data: 'duplicateCheckType'
                // },
                {
                    data: 'importedData'
                },
                {
                    // data: 'ProifileDuplicate'
                    data: null,
                    "render": function(data, type, row, meta) {
                        let NewData = '<div class="text-center"> <strong> ' + data.profileId + ' </strong> </div>';

                        if ((data.ProifileDuplicate).trim() == '' && (data.registerDuplicate).trim() == '' && (data.whatsappDuplicate).trim() == '' && (data.residenceDuplicate).trim() == '' && (data.companyDuplicate).trim() == '') {
                            NewData += '<a class="text-danger"><strong> Record Deleted </strong> </a>';
                        } else {
                            if (type == 'display') {
                                let DuplicateVar = data.ProifileDuplicate;
                                DuplicateArray = DuplicateVar.split("/");
                                for (let i = 0; i < DuplicateArray.length; i++) {
                                    console.log(DuplicateArray[i]);
                                    if (NewData == '<div class="text-center"> <strong> ' + data.profileId + ' </strong> </div>') {
                                        NewData += '<a href="Lapview.php?FindMember=' + DuplicateArray[i] + '">' + DuplicateArray[i] + '</a>';
                                    } else {
                                        NewData += ' /  <a href="Lapview.php?FindMember=' + DuplicateArray[i] + '">' + DuplicateArray[i] + '</a>';
                                    }

                                }
                            }
                        }
                        return NewData;
                    }
                },

                {
                    //data: 'registerDuplicate'
                    data: null,
                    "render": function(data, type, row, meta) {
                        let NewData = '<div class="text-center"> <strong> ' + data.registeredNumber + ' </strong> </div>';
                        if (type == 'display') {
                            let DuplicateVar = data.registerDuplicate;
                            DuplicateArray = DuplicateVar.split("/");
                            for (let i = 0; i < DuplicateArray.length; i++) {
                                console.log(DuplicateArray[i]);
                                if (NewData == '<div class="text-center"> <strong> ' + data.registeredNumber + ' </strong> </div>') {
                                    NewData += '<a href="Lapview.php?FindMember=' + DuplicateArray[i] + '">' + DuplicateArray[i] + '</a>';
                                } else {
                                    NewData += ' /  <a href="Lapview.php?FindMember=' + DuplicateArray[i] + '">' + DuplicateArray[i] + '</a>';
                                }

                            }
                        }
                        return NewData;
                    }
                },
                {
                    //data: 'whatsappDuplicate'
                    data: null,
                    "render": function(data, type, row, meta) {
                        let NewData = '<div class="text-center"> <strong> ' + data.whatsappNumber + ' </strong> </div>';
                        if (type == 'display') {
                            let DuplicateVar = data.whatsappDuplicate;
                            DuplicateArray = DuplicateVar.split("/");
                            for (let i = 0; i < DuplicateArray.length; i++) {
                                console.log(DuplicateArray[i]);
                                if (NewData == '<div class="text-center"> <strong> ' + data.whatsappNumber + ' </strong> </div>') {
                                    NewData += '<a href="Lapview.php?FindMember=' + DuplicateArray[i] + '">' + DuplicateArray[i] + '</a>';
                                } else {
                                    NewData += ' /  <a href="Lapview.php?FindMember=' + DuplicateArray[i] + '">' + DuplicateArray[i] + '</a>';
                                }

                            }
                        }
                        return NewData;
                    }
                },
                {
                    //data: 'residenceDuplicate'
                    data: null,
                    "render": function(data, type, row, meta) {
                        let NewData = '<div class="text-center"> <strong> ' + data.residencePhoneNumber + ' </strong> </div>';
                        if (type == 'display') {
                            let DuplicateVar = data.residenceDuplicate;
                            DuplicateArray = DuplicateVar.split("/");
                            for (let i = 0; i < DuplicateArray.length; i++) {
                                console.log(DuplicateArray[i]);
                                if (NewData == '<div class="text-center"> <strong> ' + data.residencePhoneNumber + ' </strong> </div>') {
                                    NewData += '<a href="Lapview.php?FindMember=' + DuplicateArray[i] + '">' + DuplicateArray[i] + '</a>';
                                } else {
                                    NewData += ' /  <a href="Lapview.php?FindMember=' + DuplicateArray[i] + '">' + DuplicateArray[i] + '</a>';
                                }

                            }
                        }
                        return NewData;
                    }
                },
                {
                    //data: 'companyDuplicate'
                    data: null,
                    "render": function(data, type, row, meta) {
                        let NewData = '<div class="text-center"> <strong> ' + data.companyId + ' </strong> </div>';
                        if (type == 'display') {
                            let DuplicateVar = data.companyDuplicate;
                            DuplicateArray = DuplicateVar.split("/");
                            for (let i = 0; i < DuplicateArray.length; i++) {
                                console.log(DuplicateArray[i]);
                                if (NewData == '<div class="text-center"> <strong> ' + data.companyId + ' </strong> </div>') {
                                    NewData += '<a href="Lapview.php?FindMember=' + DuplicateArray[i] + '">' + DuplicateArray[i] + '</a>';
                                } else {
                                    NewData += ' /  <a href="Lapview.php?FindMember=' + DuplicateArray[i] + '">' + DuplicateArray[i] + '</a>';
                                }

                            }
                        }
                        return NewData;
                    }
                },


                // {
                //     data: 'duplicateFoundIn'
                // },
                // {
                //     data: 'custId',
                //     "render": function(data, type, row, meta) {
                //         if (type == 'display') {
                //             data =
                //                 '<button class="ConvertBtn border-1 btn shadow-none py-0 px-2" type="button" value="' +
                //                 data + '"> Convert </button>';
                //         }
                //         return data;
                //     }
                // },
                {
                    data: null,
                    "render": function(data, type, row, meta) {
                        if (type == 'display') {
                            data =
                                // '<div class="btn-group"><button type="button" class="btn ConvertBtn border-1 btn shadow-none py-0 px-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Action</button><ul class="dropdown-menu"><li><a class="dropdown-item DataConvert" data-convert="FD"  href="' + data + '" >Free Convert</a></li><li><a class="dropdown-item DataConvert" data-convert="PD" href="' + data + '">Paid Convert</a></li><li><a class="dropdown-item DataConvert" data-convert="MD" href="' + data + '">Marriage Convert</a></li><li><a class="dropdown-item DataConvert" data-convert="WD" href="' + data + '">Wedding Convert</a></li></ul></div>';
                                '<button class="ConvertBtn border-1 btn shadow-none py-0 px-2" type="button" data-convert="' + data.importedData + '" value="' +
                                data.custId + '" >Convert</button>';
                        }
                        return data;
                    }
                },
                {
                    data: 'custId',
                    "render": function(data, type, row, meta) {
                        if (type == 'display') {
                            data =
                                '<button class="DeleteBtn border-1 btn shadow-none py-0 px-2" type="button" value="' +
                                data + '" >Delete</a>';
                        }
                        return data;
                    }
                },

            ]
        });


        $('#SearchTable').keyup(function() {
            itemTable.search($(this).val()).draw();
        });


        $('#PageLengthTable').on('click', function() {
            var PageLength = $(this).val();
            itemTable.page.len(PageLength).draw();
        });

        //delete duplicate
        $('#product_table tbody').on('click', '.DeleteBtn', function() {
            var delValue = $(this).val();
            console.log(delValue);
            $('#delModal').modal('show');
            $('#confirmYes').click(function() {
                console.log('hello');
                if (delValue != null) {
                    $.ajax({
                        type: "POST",
                        url: "DuplicateOperation.php",
                        data: {
                            DeleteId: delValue
                        },
                        beforeSend: function() {
                            $('#loading').show();
                            $('#delModal').modal('hide');
                            $('#ResponseImage').html("");
                            $('#ResponseText').text("");
                        },
                        success: function(data) {
                            $('#loading').hide();
                            console.log(data);
                            if (TestJson(data) == true) {
                                var delResponse = JSON.parse(data);
                                if (delResponse.DeleteDuplicate == 0) {
                                    $('#ResponseImage').html(
                                        '<img src="./warning.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">'
                                    );
                                    $('#ResponseText').text("Branch is Already in Use");
                                    $('#confirmModal').modal('show');
                                } else if (delResponse.DeleteDuplicate == 1) {
                                    $('#ResponseImage').html(
                                        '<img src="./success.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">'
                                    );
                                    $('#ResponseText').text(
                                        "Successfully Deleted Duplicate Data");
                                    $('#confirmModal').modal('show');
                                    itemTable.ajax.reload();
                                } else if (delResponse.DeleteDuplicate == 2) {
                                    $('#ResponseImage').html(
                                        '<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">'
                                    );
                                    $('#ResponseText').text("Failed Deleting Duplicate Data");
                                    $('#confirmModal').modal('show');
                                }
                                delValue = undefined;
                                delete window.delValue;
                            } else {
                                $('#ResponseImage').html(
                                    '<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">'
                                );
                                $('#ResponseText').text(
                                    "Some Error Occured, Please refresh the page (ERROR : 12ENJ)"
                                );
                                $('#confirmModal').modal('show');
                            }
                        },
                        error: function() {
                            $('#ResponseImage').html(
                                '<img src="../IMAGES/error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">'
                            );
                            $('#ResponseText').text(
                                "Please refresh the page to continue (ERROR : 12EFF)");
                            $('#confirmModal').modal('show');
                        },
                    });
                } else {}
            });
            $('#confirmNo').click(function() {
                delValue = undefined;
                delete window.delValue;
                console.log('test');
            });
        });


        //convert to free reg
        $('#product_table tbody').on('click', '.ConvertBtn', function(e) {
            e.preventDefault();
            var ConvertValue = $(this).val();
            console.log(ConvertValue);
            var ConvertType = $(this).data('convert');
            console.log(ConvertType);
            $('#convertModal').modal('show');
            $('#convertYes').click(function() {
                if (ConvertValue != null) {
                    $.ajax({
                        type: "POST",
                        url: "DuplicateOperation.php",
                        data: {
                            FreeConvertId: ConvertValue,
                            FreeConvertType: ConvertType
                        },
                        beforeSend: function() {
                            $('#loading').show();
                            $('#convertModal').modal('hide');
                            $('#ResponseImage').html("");
                            $('#ResponseText').text("");
                        },
                        success: function(data) {
                            $('#loading').hide();
                            console.log(data);
                            if (TestJson(data) == true) {
                                var ConvertResponse = JSON.parse(data);
                                if (ConvertResponse.ConvertDuplicate == 0) {
                                    $('#ResponseImage').html('<img src="./warning.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                    $('#ResponseText').text("Branch is Already in Use");
                                    $('#confirmModal').modal('show');
                                } else if (ConvertResponse.ConvertDuplicate == 1) {
                                    $('#ResponseImage').html('<img src="./success.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                    $('#ResponseText').text("Successfully Converted Duplicate Data");
                                    $('#confirmModal').modal('show');
                                    itemTable.ajax.reload();
                                } else if (ConvertResponse.ConvertDuplicate == 2) {
                                    $('#ResponseImage').html('<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
                                    $('#ResponseText').text("Failed Converting Duplicate Data");
                                    $('#confirmModal').modal('show');
                                }
                                ConvertValue = undefined;
                                delete window.ConvertValue;
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
            $('#convertNo').click(function() {
                ConvertValue = undefined;
                delete window.ConvertValue;
            });
        });


        //Select all Togggle
        $('.SelectAllCheck').click(function() {
            if ($(this).prop('checked') == true) {
                $('.SelectDuplicates').each(function() {
                    $(this).prop('checked', true);
                });
            } else {
                $('.SelectDuplicates').each(function() {
                    $(this).prop('checked', false);
                });
            }
        });



        //Delete All
        $(document).on('click', '.DeleteAll', function() {
            $('#loading').show();
            $('.mainContents').hide();
            var DeleteAllArray = [];
            $('.SelectDuplicates:checked').each(function() {
                DeleteAllArray.push($(this).val());
            });

            if (DeleteAllArray.length <= 0) {
                toastr.warning("Please select atleast one data");
                return false;
            }
            var DeleteAllID = DeleteAllArray.join();
            console.log(DeleteAllID);
            $.ajax({
                type: "POST",
                url: "DuplicateOperation.php",
                data: {
                    DeleteAllID: DeleteAllID
                },
                beforeSend: function() {
                    $('#loading').show();
                    $('.mainContents').hide();
                    $('#ResponseImage').html("");
                    $('#ResponseText').text("");
                },
                success: function(data) {
                    $('#loading').hide();
                    $('.mainContents').show();
                    console.log(data);
                    if (TestJson(data) == true) {
                        var delAllResponse = JSON.parse(data);
                        if (delAllResponse.DeleteAllDuplicate == 0) {
                            $('#ResponseImage').html(
                                '<img src="./warning.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">'
                            );
                            $('#ResponseText').text("Branch is Already in Use");
                            $('#confirmModal').modal('show');
                        } else if (delAllResponse.DeleteAllDuplicate == 1) {
                            $('#ResponseImage').html(
                                '<img src="./success.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">'
                            );
                            $('#ResponseText').text(
                                "Successfully Deleted Selected Duplicate Data");
                            $('#confirmModal').modal('show');
                            itemTable.ajax.reload();
                        } else if (delAllResponse.DeleteAllDuplicate == 2) {
                            $('#ResponseImage').html(
                                '<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">'
                            );
                            $('#ResponseText').text("Failed Deleting Selected Duplicate Data");
                            $('#confirmModal').modal('show');
                        }
                        delValue = undefined;
                        delete window.delValue;
                    } else {
                        $('#ResponseImage').html(
                            '<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">'
                        );
                        $('#ResponseText').text(
                            "Some Error Occured, Please refresh the page (ERROR : 12ENJ)"
                        );
                        $('#confirmModal').modal('show');
                    }
                },
                error: function() {
                    $('#ResponseImage').html(
                        '<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">'
                    );
                    $('#ResponseText').text(
                        "Please refresh the page to continue (ERROR : 12EFF)");
                    $('#confirmModal').modal('show');
                },
            });
        });



        //Convert All
        $(document).on('click', '.ConvertAll', function() {
            $('#loading').show();
            $('.mainContents').hide();
            var ConvertAllArray = [];
            $('.SelectDuplicates:checked').each(function() {
                ConvertAllArray.push($(this).val());
            });
            if (ConvertAllArray.length <= 0) {
                toastr.warning("Please select atleast one data");
                return false;
            }
            var ConvertAllID = ConvertAllArray.join();
            console.log(ConvertAllID);
            $.ajax({
                type: "POST",
                url: "DuplicateOperation.php",
                data: {
                    ConvertAllID: ConvertAllID
                },
                beforeSend: function() {
                    $('#loading').show();
                    $('.mainContents').hide();
                    $('#ResponseImage').html("");
                    $('#ResponseText').text("");
                },
                success: function(data) {
                    $('#loading').hide();
                    $('.mainContents').show();
                    console.log(data);
                    if (TestJson(data) == true) {
                        var ConvAllResponse = JSON.parse(data);
                        if (ConvAllResponse.ConvertAllDuplicate == 0) {
                            $('#ResponseImage').html(
                                '<img src="./warning.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">'
                            );
                            $('#ResponseText').text("Branch is Already in Use");
                            $('#confirmModal').modal('show');
                        } else if (ConvAllResponse.ConvertAllDuplicate == 1) {
                            $('#ResponseImage').html(
                                '<img src="./success.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">'
                            );
                            $('#ResponseText').text(
                                "Successfully Converted Selected Duplicate Data");
                            $('#confirmModal').modal('show');
                            itemTable.ajax.reload();
                        } else if (ConvAllResponse.ConvertAllDuplicate == 2) {
                            $('#ResponseImage').html(
                                '<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">'
                            );
                            $('#ResponseText').text("Failed Converting Selected Duplicate Data");
                            $('#confirmModal').modal('show');
                        }
                        delValue = undefined;
                        delete window.delValue;
                    } else {
                        $('#ResponseImage').html(
                            '<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">'
                        );
                        $('#ResponseText').text(
                            "Some Error Occured, Please refresh the page (ERROR : 12ENJ)"
                        );
                        $('#confirmModal').modal('show');
                    }
                },
                error: function() {
                    $('#ResponseImage').html(
                        '<img src="./error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">'
                    );
                    $('#ResponseText').text(
                        "Please refresh the page to continue (ERROR : 12EFF)");
                    $('#confirmModal').modal('show');
                },
            });
        });






        //convert to free reg
        // $('#product_table tbody').on('click', '.DataConvert', function(e) {
        //     e.preventDefault();
        //     var ConvertValue = $(this).attr('href');
        //     console.log(ConvertValue);
        //     var ConvertType = $(this).data('convert');
        //     console.log(ConvertType);
        //     $('#convertModal').modal('show');
        //     $('#convertYes').click(function() {
        //         if (ConvertValue != null) {
        //             $.ajax({
        //                 type: "POST",
        //                 url: "DuplicateOperation.php",
        //                 data: {
        //                     FreeConvertId: ConvertValue,
        //                     FreeConvertType: ConvertType
        //                 },
        //                 beforeSend: function() {
        //                     $('#loading').show();
        //                     $('#convertModal').modal('hide');
        //                     $('#ResponseImage').html("");
        //                     $('#ResponseText').text("");
        //                 },
        //                 success: function(data) {
        //                     $('#loading').hide();
        //                     console.log(data);
        //                     if (TestJson(data) == true) {
        //                         var ConvertResponse = JSON.parse(data);
        //                         if (ConvertResponse.ConvertDuplicate == 0) {
        //                             $('#ResponseImage').html('<img src="../IMAGES/warning.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
        //                             $('#ResponseText').text("Branch is Already in Use");
        //                             $('#confirmModal').modal('show');
        //                         } else if (ConvertResponse.ConvertDuplicate == 1) {
        //                             $('#ResponseImage').html('<img src="../IMAGES/success.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
        //                             $('#ResponseText').text("Successfully Converted Duplicate Data");
        //                             $('#confirmModal').modal('show');
        //                             itemTable.ajax.reload();
        //                         } else if (ConvertResponse.ConvertDuplicate == 2) {
        //                             $('#ResponseImage').html('<img src="../IMAGES/error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
        //                             $('#ResponseText').text("Failed Converting Duplicate Data");
        //                             $('#confirmModal').modal('show');
        //                         }
        //                         ConvertValue = undefined;
        //                         delete window.ConvertValue;
        //                     } else {
        //                         $('#ResponseImage').html('<img src="../IMAGES/error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
        //                         $('#ResponseText').text("Some Error Occured, Please refresh the page (ERROR : 12ENJ)");
        //                         $('#confirmModal').modal('show');
        //                     }
        //                 },
        //                 error: function() {
        //                     $('#ResponseImage').html('<img src="../IMAGES/error.jpg" style="height:130px;width:130px;" class="img-fluid" alt="">');
        //                     $('#ResponseText').text("Please refresh the page to continue (ERROR : 12EFF)");
        //                     $('#confirmModal').modal('show');
        //                 },
        //             });
        //         } else {}
        //     });
        //     $('#convertNo').click(function() {
        //         ConvertValue = undefined;
        //         delete window.ConvertValue;
        //     });
        // });
    </script>








</body>

</html>