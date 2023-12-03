<?php



//Profile Image
if (!empty($_FILES["file"]["name"])) {
     
    $target_dir = "../CUSTOMERIMAGES/PROFILE/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name'])) {
       $status = 1;
    }
     
}


//Profile Image With Watermark
if (!empty($_FILES["profileWatermark"]["name"])) {
     
    $target_dir = "../CUSTOMERIMAGES/W-PROFILE/";
    $target_file = $target_dir . basename($_FILES["profileWatermark"]["name"]);
    
    if (move_uploaded_file($_FILES["profileWatermark"]["tmp_name"], $target_dir.$_FILES['profileWatermark']['name'])) {
       $status = 1;
    }
       
}
 


 

//Horoscope Image
if (!empty($_FILES["horoscope"]["name"])) {
     
    $target_dir = "../CUSTOMERIMAGES/HOROSCOPE/";
    $target_file = $target_dir . basename($_FILES["horoscope"]["name"]);
    
    if (move_uploaded_file($_FILES["horoscope"]["tmp_name"], $target_dir.$_FILES['horoscope']['name'])) {
       $status = 1;
    }
     
}


//Horoscope Image With Watermark 
if (!empty($_FILES["horoscopeWatermark"]["name"])) {
     
    $target_dir = "../CUSTOMERIMAGES/W-HOROSCOPE/";
    $target_file = $target_dir . basename($_FILES["horoscopeWatermark"]["name"]);
    
    if (move_uploaded_file($_FILES["horoscopeWatermark"]["tmp_name"], $target_dir.$_FILES['horoscopeWatermark']['name'])) {
       $status = 1;
    }
     
}





//Home Image
if (!empty($_FILES["home"]["name"])) {
     
    $target_dir = "../CUSTOMERIMAGES/HOME/";
    $target_file = $target_dir . basename($_FILES["home"]["name"]);
    
    if (move_uploaded_file($_FILES["home"]["tmp_name"], $target_dir.$_FILES['home']['name'])) {
       $status = 1;
    }
     
}


//Home Image  With Watermark 
if (!empty($_FILES["homeWatermark"]["name"])) {
     
    $target_dir = "../CUSTOMERIMAGES/W-HOME/";
    $target_file = $target_dir . basename($_FILES["homeWatermark"]["name"]);
    
    if (move_uploaded_file($_FILES["homeWatermark"]["tmp_name"], $target_dir.$_FILES['homeWatermark']['name'])) {
       $status = 1;
    }
     
}




//Id Proof Image
if (!empty($_FILES["idproof"]["name"])) {
     
    $target_dir = "../CUSTOMERIMAGES/IDPROOF/";
    $target_file = $target_dir . basename($_FILES["idproof"]["name"]);
    
    if (move_uploaded_file($_FILES["idproof"]["tmp_name"], $target_dir.$_FILES['idproof']['name'])) {
       $status = 1;
    }
     
}



//Delete Profile
if(isset($_POST['profileDelete'])){

    $ProfileDelete = $_POST['profileDelete'];
    $target_dir = "../CUSTOMERIMAGES/PROFILE/";
    $target_file = $target_dir . $ProfileDelete;

    if(unlink($target_file)){
        echo "success";
    }

}


//Delete Profile with Watermark
if(isset($_POST['profileWatermarkDelete'])){

    $profileWatermarkDelete = $_POST['profileWatermarkDelete'];
    $target_dir = "../CUSTOMERIMAGES/W-PROFILE/";
    $target_file = $target_dir . $profileWatermarkDelete;

    if(unlink($target_file)){
        echo "success";
    }

}


//Delete Horoscope
if(isset($_POST['HoroscopeDelete'])){

    $HoroscopeDelete = $_POST['HoroscopeDelete'];
    $target_dir = "../CUSTOMERIMAGES/HOROSCOPE/";
    $target_file = $target_dir . $HoroscopeDelete;

    if(unlink($target_file)){
        echo "success";
    }

}


//Delete Home

if(isset($_POST['homeDelete'])){

    $HomeDelete = $_POST['homeDelete'];
    $target_dir = "../CUSTOMERIMAGES/HOME/";
    $target_file = $target_dir . $HomeDelete;

    if(unlink($target_file)){
        echo "success";
    }

}


//Delete Id proof
if(isset($_POST['idproofDelete'])){

    $IdproofDelete = $_POST['idproofDelete'];
    $target_dir = "../CUSTOMERIMAGES/IDPROOF/";
    $target_file = $target_dir . $IdproofDelete;

    if(unlink($target_file)){
        echo "success";
    }

}








?>