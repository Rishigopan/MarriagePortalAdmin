<?php  $PageTitle = 'BulkUploadImage'; 

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

    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/compressorjs@1.1.1/dist/compressor.min.js"></script>

</head>

<body>

    <!-- Navbar include -->
    <?php include('../MAIN/Navbar.php'); ?>


    <!-- Sidebar include -->
    <?php include('../MAIN/Sidebar.php'); ?>



    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Upload Bulk Image</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Upload Bulk Image</li>
                </ol>
            </nav>
        </div>


        <section class="section dashboard">

            <!-- <img src="../IMAGES/png_2.jpg" id="WatermarkImage" hidden>  -->

            <!-- <img src="../IMAGES/water1.png" id="WatermarkImage" hidden>  -->

            <img src="../IMAGES/newwatermark.png" id="WatermarkImage" hidden> 
        




            <div class="container my-5">
                <div class="UploadMainDiv shadow px-4 py-2">
                    <div class="d-flex justify-content-between">
                        <h5>Profile Image Upload</h5>
                        <h5>&nbsp;</h5>
                    </div>
                    <div class="mt-4 mb-5 UploadInnerDiv dropzone">
                    </div>
                </div>

                <div class="UploadMainDiv shadow px-4 mt-2 py-2">
                    <div class="d-flex justify-content-between">
                        <h5>Profile Image Upload With Watermark</h5>
                        <h5>&nbsp;</h5>
                    </div>
                    <div class="mt-4 mb-5 UploadInnerDiv dropzone" id="profileWatermark">
                    </div>
                </div>

                <hr class="mt-5">

                <div class="UploadMainDiv shadow px-4 py-2 mt-5">
                    <div class="d-flex justify-content-between">
                        <h5>Horoscope Image Upload</h5>
                        <h5>&nbsp;</h5>
                    </div>
                    <div class="mt-4 mb-5 UploadInnerDiv dropzone" id="horoscopeDropzone">
                    </div>
                </div>

                <!-- <div class="UploadMainDiv shadow px-4 py-2 mt-2">
                    <div class="d-flex justify-content-between">
                        <h5>Horoscope Image Upload With Watermark</h5>
                        <h5>&nbsp;</h5>
                    </div>
                    <div class="mt-4 mb-5 UploadInnerDiv dropzone" id="horoscopeDropzoneWatermark">
                    </div>
                </div> -->

                <hr class="mt-5">

                <div class="UploadMainDiv shadow px-4 py-2 mt-5">
                    <div class="d-flex justify-content-between">
                        <h5>House Image Upload</h5>
                        <h5>&nbsp;</h5>
                    </div>
                    <div class="mt-4 mb-5 UploadInnerDiv dropzone" id="homedropzone">
                    </div>
                </div>

                <!-- <div class="UploadMainDiv shadow px-4 py-2 mt-2">
                    <div class="d-flex justify-content-between">
                        <h5>House Image Upload With Watermark</h5>
                        <h5>&nbsp;</h5>
                    </div>
                    <div class="mt-4 mb-5 UploadInnerDiv dropzone" id="homedropzoneWatermark">
                    </div>
                </div> -->

                <hr class="mt-5">

                <div class="UploadMainDiv shadow px-4 py-2 mt-5">
                    <div class="d-flex justify-content-between">
                        <h5>ID Proof Image Upload</h5>
                        <h5>&nbsp;</h5>
                    </div>
                    <div class="mt-4 mb-5 UploadInnerDiv dropzone" id="idproofdropzone">
                    </div>
                </div>


            </div>


        </section>

    </main>



    <!-- Footer include -->
    <?php include('../MAIN/Footer.php'); ?>



    <script>
        //Disabling autoDiscover
        Dropzone.autoDiscover = false;

        $(function() {

        
            //Profile Image
            var myDropzone = new Dropzone(".dropzone", {
                url: "BulkImageUploadOperation.php",
                paramName: "file",
                maxFilesize: 3,
                maxFiles: 50,
                acceptedFiles: ".jpg",
                addRemoveLinks: true,
                removedfile: function(file) {
                    var fileName = file.name;
                    $.ajax({
                        type: 'POST',
                        url: 'BulkImageUploadOperation.php',
                        data: {
                            profileDelete: fileName
                        },
                        sucess: function(data) {
                            console.log('success');
                        }
                    });
                    var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                },

            });

            //Horoscope Image
            var myDropzone2 = new Dropzone("#horoscopeDropzone", {
                url: "BulkImageUploadOperation.php",
                paramName: "horoscope",
                maxFilesize: 3,
                maxFiles: 50,
                acceptedFiles: ".jpg",
                addRemoveLinks: true,
                removedfile: function(file) {
                    var fileName = file.name;
                    $.ajax({
                        type: 'POST',
                        url: 'BulkImageUploadOperation.php',
                        data: {
                            HoroscopeDelete: fileName
                        },
                        sucess: function(data) {
                            console.log('success');
                        }
                    });
                    var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                },
            });

            //Home Image
            var myDropzone3 = new Dropzone("#homedropzone", {
                url: "BulkImageUploadOperation.php",
                paramName: "home",
                maxFilesize: 3,
                maxFiles: 50,
                acceptedFiles: ".jpg",
                addRemoveLinks: true,
                removedfile: function(file) {
                    var fileName = file.name;
                    $.ajax({
                        type: 'POST',
                        url: 'BulkImageUploadOperation.php',
                        data: {
                            homeDelete: fileName
                        },
                        sucess: function(data) {
                            console.log('success');
                        }
                    });
                    var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                },
            });

            //Id Proof Image
            var myDropzone4 = new Dropzone("#idproofdropzone", {
                url: "BulkImageUploadOperation.php",
                paramName: "idproof",
                maxFilesize: 3,
                maxFiles: 50,
                acceptedFiles: ".jpg",
                addRemoveLinks: true,
                removedfile: function(file) {
                    var fileName = file.name;
                    $.ajax({
                        type: 'POST',
                        url: 'BulkImageUploadOperation.php',
                        data: {
                            idproofDelete: fileName
                        },
                        sucess: function(data) {
                            console.log('success');
                        }
                    });
                    var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                },
            });


            //Profile with watermark
            var myDropzone5 = new Dropzone("#profileWatermark", {
                paramName: "profileWatermark", // The name that will be used to transfer the file
                addRemoveLinks: true,
                uploadMultiple: false,
                autoProcessQueue: true,
                parallelUploads: 50,
                // maxFilesize: jsonData.maxFileSizeMB, // MB
                acceptedFiles: ".png, .jpeg, .jpg, .gif",
                url: "BulkImageUploadOperation.php",
                transformFile: function(file, done) {
                    console.log('on transform file: ', file.name);
                    new Compressor(file, {
                        strict: false,
                        drew: function(context, canvas) {
                           
                            var Image = document.createElement("img");
                            Image.src = "../IMAGES/newwatermark.png";
                            context.rotate(-1 * Math.PI / 2);
                            context.drawImage(Image, -1* (canvas.height/2)+30, canvas.width/9, -1*canvas.height/2,70);
                         
                        },
                        success: function(result) {
                            console.log('success: ready to upload');
                            console.log('result type: ' + result.type);
                            console.log('result size: ' + result.size);
                            // this goes to dropzone on "sending" event
                            done(result);
                        },
                        error: function(err) {
                            console.log(err.message);
                        }, // end error
                    }); // end new Compressor
                }, // end transformFile
                removedfile: function(file) {
                    var fileName = file.name;
                    $.ajax({
                        type: 'POST',
                        url: 'BulkImageUploadOperation.php',
                        data: {
                            profileWatermarkDelete: fileName
                        },
                        sucess: function(data) {
                            console.log('success');
                        }
                    });
                    var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                },
            }); // end new Dropzones



            // //Horoscope with watermark
            // var myDropzone6 = new Dropzone("#horoscopeDropzoneWatermark", {
            //     paramName: "horoscopeWatermark", // The name that will be used to transfer the file
            //     addRemoveLinks: true,
            //     uploadMultiple: false,
            //     autoProcessQueue: true,
            //     parallelUploads: 50,
            //     // maxFilesize: jsonData.maxFileSizeMB, // MB
            //     acceptedFiles: ".png, .jpeg, .jpg, .gif",
            //     url: "BulkImageUploadOperation.php",
            //     transformFile: function(file, done) {
            //         console.log('on transform file: ', file.name);
            //         new Compressor(file, {
            //             strict: false,
            //             drew: function(context, canvas) {
                           
            //                 var Image = document.createElement("img");
            //                 Image.src = "../IMAGES/water1.png";
            //                 context.rotate(-1 * Math.PI / 2);
            //                 context.drawImage(Image, -1* canvas.height/4, -1* 0, -1*canvas.height/2,100);
                         
            //             },
            //             success: function(result) {
            //                 console.log('success: ready to upload');
            //                 console.log('result type: ' + result.type);
            //                 console.log('result size: ' + result.size);
            //                 // this goes to dropzone on "sending" event
            //                 done(result);
            //             },
            //             error: function(err) {
            //                 console.log(err.message);
            //             }, // end error
            //         }); // end new Compressor
            //     }, // end transformFile
            // }); // end new Dropzones


            // //Home with watermark
            // var myDropzone7 = new Dropzone("#homedropzoneWatermark", {
            //     paramName: "homeWatermark", // The name that will be used to transfer the file
            //     addRemoveLinks: true,
            //     uploadMultiple: false,
            //     autoProcessQueue: true,
            //     parallelUploads: 50,
            //     // maxFilesize: jsonData.maxFileSizeMB, // MB
            //     acceptedFiles: ".png, .jpeg, .jpg, .gif",
            //     url: "BulkImageUploadOperation.php",
            //     transformFile: function(file, done) {
            //         console.log('on transform file: ', file.name);
            //         new Compressor(file, {
            //             strict: false,
            //             drew: function(context, canvas) {
                           
            //                 var Image = document.createElement("img");
            //                 Image.src = "../IMAGES/water1.png";
            //                 context.rotate(-1 * Math.PI / 2);
            //                 context.drawImage(Image, -1* canvas.height/4, -1* 0, -1*canvas.height/2,100);
                         
            //             },
            //             success: function(result) {
            //                 console.log('success: ready to upload');
            //                 console.log('result type: ' + result.type);
            //                 console.log('result size: ' + result.size);
            //                 // this goes to dropzone on "sending" event
            //                 done(result);
            //             },
            //             error: function(err) {
            //                 console.log(err.message);
            //             }, // end error
            //         }); // end new Compressor
            //     }, // end transformFile
            // }); // end new Dropzones


        });
    </script>














</body>

</html>