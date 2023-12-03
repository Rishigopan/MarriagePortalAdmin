<?php $PageTitle = 'BulkDataImport';
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

    <link rel="stylesheet" href="../assets/dist/virtual-select.min.css">

    <script src="../assets/dist/virtual-select.min.js"></script>

</head>

<body>

    <!-- Navbar include -->
    <?php include('../MAIN/Navbar.php'); ?>


    <!-- Sidebar include -->
    <?php include('../MAIN/Sidebar.php'); ?>



    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Bulk Data Import</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Bulk Data Import</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">


            <div class="card card-body main-card shadow-sm">
                <form action="" class="my-4" id="Import_form" enctype="multipart/form-data">
                    <input type="text" name="bulkImportFile" value="1" hidden>
                    <div class="mb-3">
                        <label for="choose_branch">Branch</label>
                        <select class="form-select ChooseBranch" name="BulkBranch" id="choose_branch" required>
                            <option hidden value=""> Select Branch</option>
                            <?php
                            $FetchBranch = mysqli_query($con, "SELECT bId,branchName FROM branch");
                            if(mysqli_num_rows($FetchBranch) > 0){
                                foreach($FetchBranch as $FetchBranchResult){
                                    echo '<option value="'.$FetchBranchResult["bId"].'">'.$FetchBranchResult["branchName"].'</option>';
                                }   
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="choose_agency">Agency</label>
                        <select class="form-select ChooseAgency" name="BulkAgency" id="choose_agency" required>
                            <option hidden value="" > Select Agency </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="data_type">Data Type</label>
                        <select class="form-select" name="BulkDataType" id="data_type" required>
                            <option value="BD">Bulk Data</option>
                            <option value="LD">Lead Data</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bulk_file">Add Excel File</label>
                        <input type="file" class="form-control" name="BulkFile" id="bulk_file" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" name="UploadExcel" class="btn btn-primary">Import</button>
                    </div>
                </form>
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


        $(document).on('change','.ChooseBranch', function(){
            var BranchId = $(this).val();
            var FormName = 'Import';
            console.log()
            $.ajax({
                url:"MasterExtras.php",
                type:"POST",
                data:{ListAgency:BranchId,FormName:FormName},
                success:function(data){
                    console.log(data);
                    $('.ChooseAgency').html(data);
                }
            });
        });


        $(document).ready(function() {
            // /*IMPORT data  start*/
            $('#Import_form').submit(function(i) {
                i.preventDefault();
                var importBulkData = new FormData(this);
                //console.log(importData);
                $.ajax({
                    url: "FreeDataImportOperation.php",
                    type: "POST",
                    data: importBulkData,
                    beforeSend: function() {
                        $('#main_card').addClass("disable");
                        $('#import_modal').modal('hide');
                        $('#Import_form')[0].reset();
                        $('.loader').show();
                        $('.main-card').hide();
                    },
                    success: function(data) {
                        $('.loader').hide();
                        $('.main-card').show();
                        console.log(data);
                        var response = JSON.parse(data);
                        $('#main_card').removeClass("disable");
                        if (response.cust == "0") {
                            toastr.error('Failed Importing');
                        }
                        if (response.cust == "1") {
                            toastr.success('Success Importing Customers,Please Goto Details Page');
                        }
                    },
                    error: function() {
                        alert("Error");
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });
            // /*IMPORT data  end*/
        });

    </script>


</body>

</html>