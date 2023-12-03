<!DOCTYPE html>
<html lang="en">

<head>


    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />


    <!-- Jquery Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/compressorjs@1.1.1/dist/compressor.min.js"></script>





</head>

<body>



    <div class="container dropzone" id="myDrop">

    </div>

    <img src="../IMAGES/png_2.jpg" id="WatermarkImage" > 




    <script>
        //Disabling autoDiscover
        Dropzone.autoDiscover = false;
        $(function() {



            var myDropzone = new Dropzone("#myDrop", {
                paramName: "file", // The name that will be used to transfer the file
                addRemoveLinks: true,
                uploadMultiple: false,
                autoProcessQueue: true,
                parallelUploads: 50,
                // maxFilesize: jsonData.maxFileSizeMB, // MB
                acceptedFiles: ".png, .jpeg, .jpg, .gif",
                url: "Upload.php",

                transformFile: function(file, done) {
                    console.log('on transform file: ', file.name);
                    new Compressor(file, {
                        strict: false,
                        drew: function(context, canvas) {
                            // draw your watermark to context of the canvas
                            // context.fillStyle = '#0f0';
                            // x = 50;
                            // y = 100;
                            //Image = document.getElementById('WatermarkImage');
                            var Image = document.createElement("img");
                            Image.src = "../IMAGES/png_2.jpg";



                            //context.strokeStyle = '#000';
                            //context.font = '3rem serif';
                            // context.translate(x, y);
                            // context.rotate(-Math.PI / 2);
                            // context.fillText('MALAYALI MARRIAGE', 20, canvas.height - 20);
                            //context.strokeText('MALAYALI MARRIAGE', 30, canvas.height - 50);
                            // context.strokeStyle = "#000";
                            // context.fillStyle = "#0f0";
                            // context.fillText("Big smile!", 10, 50);
                            // context.strokeText("Big smile!", 10, 50);
                            //context.rotate(-1 * Math.PI / 4);

                            //context.drawImage(Image, 100,100, canvas.width, 400 * Image.height / Image.width);

                            //context.translate(canvas.width / 2, canvas.height / 2);

                            // rotate context by 45 degrees counter clockwise
                            context.rotate(-1 * Math.PI / 2);
                            //context.drawImage(Image, -1 * Image.width / 2, -1 * Image.height / 2);
                            context.drawImage(Image, -1* canvas.height/4, -1* 0, -1*canvas.height/2,100);
                            //context.drawImage(Image, -1 * Image.width / 2, -1 * Image.height / 2);
                            //context.drawImage(Image, 100,100, canvas.width, 400 * Image.height / Image.width);

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



            }); // end new Dropzones



        });
    </script>



</body>

</html>