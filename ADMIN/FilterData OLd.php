<?php

include '../MAIN/Dbconfig.php';

if ($_COOKIE['custtypecookie'] == 1) {
    $Assigned = 0;
} else {
    $Assigned = $_COOKIE['custidcookie'];
}

$Today = date("Y-m-d");



if (isset($_POST['Search'])) {

    $query = '';


    $FilterGender = $_POST['MemberBride'];
    // $FilterReligion = '1';
    //$FilterMonthlyIncome = $_POST['MemberIncome'];
    $FilterMemberCanID = $_POST['MemberCanID'];
    $FilterMemberMobile = $_POST['MemberMobile'];




    if (isset($_POST['MemberMarstatus'])) {
        foreach ($_POST['MemberMarstatus'] as $MaritalStatusCheck) {
            if ($MaritalStatusCheck != '') {
                $FilterMaritalStatusLength = count($_POST['MemberMarstatus']);
                $FilterMaritalStatus = ltrim(implode(",", $_POST['MemberMarstatus']), ',');
            } else {
                $FilterMaritalStatus = "''";
                $FilterMaritalStatusLength = 0;
            }
        }
    } else {
    }



    if (isset($_POST['MemberPhystatus'])) {
        foreach ($_POST['MemberPhystatus'] as $PhyscialStatusCheck) {
            if ($PhyscialStatusCheck != '') {
                $FilterPhyscialStatusLength = count($_POST['MemberPhystatus']);
                $FilterPhyscialStatus = ltrim(implode(",", $_POST['MemberPhystatus']), ',');
            } else {
                $FilterPhyscialStatus = "''";
                $FilterPhyscialStatusLength = 0;
            }
        }
    } else {
    }


    if (isset($_POST['MemberComplexion'])) {
        foreach ($_POST['MemberComplexion'] as $ComplexionCheck) {
            if ($ComplexionCheck != '') {
                $FilterComplexionLength = count($_POST['MemberComplexion']);
                $FilterComplexion = ltrim(implode(",", $_POST['MemberComplexion']), ',');
            } else {
                $FilterComplexion = "''";
                $FilterComplexionLength = 0;
            }
        }
    } else {
    }


    if (isset($_POST['MemberBodyType'])) {
        foreach ($_POST['MemberBodyType'] as $BodyTypeCheck) {
            if ($BodyTypeCheck != '') {
                $FilterBodyTypeLength = count($_POST['MemberBodyType']);
                $FilterBodyType = ltrim(implode(",", $_POST['MemberBodyType']), ',');
            } else {
                $FilterBodyType = "''";
                $FilterBodyTypeLength = 0;
            }
        }
    } else {
    }



    if (isset($_POST['MemberJathakam'])) {
        foreach ($_POST['MemberJathakam'] as $JathakamCheck) {
            if ($JathakamCheck != '') {
                $FilterJathakamLength = count($_POST['MemberJathakam']);
                $FilterJathakam = ltrim(implode(",", $_POST['MemberJathakam']), ',');
            } else {
                $FilterJathakam = "''";
                $FilterJathakamLength = 0;
            }
        }
    } else {
    }


    if (isset($_POST['MemberChild'])) {
        foreach ($_POST['MemberChild'] as $ChildCheck) {
            if ($ChildCheck != '') {
                $FilterChildLength = count($_POST['MemberChild']);
                $FilterChild = ltrim(implode(",", $_POST['MemberChild']), ',');
            } else {
                $FilterChild = "''";
                $FilterChildLength = 0;
            }
        }
    } else {
    }


    if (isset($_POST['MemberFinstatus'])) {
        foreach ($_POST['MemberFinstatus'] as $FinstatusCheck) {
            if ($FinstatusCheck != '') {
                $FilterFinstatusLength = count($_POST['MemberFinstatus']);
                $FilterFinstatus = ltrim(implode(",", $_POST['MemberFinstatus']), ',');
            } else {
                $FilterFinstatus = "''";
                $FilterFinstatusLength = 0;
            }
        }
    } else {
    }



    if (isset($_POST['MemberOwn'])) {
        foreach ($_POST['MemberOwn'] as $OwnCheck) {
            if ($OwnCheck != '') {
                $FilterOwnLength = count($_POST['MemberOwn']);
                $FilterOwn = ltrim(implode(",", $_POST['MemberOwn']), ',');
            } else {
                $FilterOwn = "''";
                $FilterOwnLength = 0;
            }
        }
    } else {
    }


    if (isset($_POST['MemberCaste'])) {
        foreach ($_POST['MemberCaste'] as $CasteCheck) {
            if ($CasteCheck != '') {
                $FilterCasteLength = count($_POST['MemberCaste']);
                $FilterCaste = ltrim(implode(",", $_POST['MemberCaste']), ',');
            } else {
                $FilterCaste = "''";
                $FilterCasteLength = 0;
            }
        }
    } else {
    }



    if (isset($_POST['MemberEducationCategory'])) {
        foreach ($_POST['MemberEducationCategory'] as $EducationCategoryCheck) {
            if ($EducationCategoryCheck != '') {
                $FilterEducationCategoryLength = count($_POST['MemberEducationCategory']);
                $FilterEducationCategory = ltrim(implode(",", $_POST['MemberEducationCategory']), ',');
            } else {
                $FilterEducationCategory = "''";
                $FilterEducationCategoryLength = 0;
            }
        }
    } else {
    }


    if (isset($_POST['MemberReligion'])) {
        foreach ($_POST['MemberReligion'] as $ReligionCheck) {
            if ($ReligionCheck != '') {
                $FilterReligionLength = count($_POST['MemberReligion']);
                $FilterReligion = ltrim(implode(",", $_POST['MemberReligion']), ',');
            } else {
                $FilterReligion = "''";
                $FilterReligionLength = 0;
            }
        }
    } else {
    }


    if (isset($_POST['MemberEduType'])) {
        foreach ($_POST['MemberEduType'] as $EduTypeCheck) {
            if ($EduTypeCheck != '') {
                $FilterEduTypeLength = count($_POST['MemberEduType']);
                $FilterEduType = ltrim(implode(",", $_POST['MemberEduType']), ',');
            } else {
                $FilterEduType = "''";
                $FilterEduTypeLength = 0;
            }
        }
    } else {
    }



    if (isset($_POST['MemberJobcategory'])) {
        foreach ($_POST['MemberJobcategory'] as $JobcategoryCheck) {
            if ($JobcategoryCheck != '') {
                $FilterJobcategoryLength = count($_POST['MemberJobcategory']);
                $FilterJobcategory = ltrim(implode(",", $_POST['MemberJobcategory']), ',');
            } else {
                $FilterJobcategory = "''";
                $FilterJobcategoryLength = 0;
            }
        }
    } else {
    }



    if (isset($_POST['MemberJobType'])) {
        foreach ($_POST['MemberJobType'] as $JobTypeCheck) {
            if ($JobTypeCheck != '') {
                $FilterJobTypeLength = count($_POST['MemberJobType']);
                $FilterJobType = ltrim(implode(",", $_POST['MemberJobType']), ',');
            } else {
                $FilterJobType = "''";
                $FilterJobTypeLength = 0;
            }
        }
    } else {
    }



    if (isset($_POST['MemberDistrict'])) {
        foreach ($_POST['MemberDistrict'] as $DistrictCheck) {
            if ($DistrictCheck != '') {
                $FilterDistrictLength = count($_POST['MemberDistrict']);
                $FilterDistrict = ltrim(implode(",", $_POST['MemberDistrict']), ',');
            } else {
                $FilterDistrict = "''";
                $FilterDistrictLength = 0;
            }
        }
    } else {
    }


    if (isset($_POST['MemberCountry'])) {
        foreach ($_POST['MemberCountry'] as $CountryCheck) {
            if ($CountryCheck != '') {
                $FilterCountryLength = count($_POST['MemberCountry']);
                $FilterCountry = ltrim(implode(",", $_POST['MemberCountry']), ',');
            } else {
                $FilterCountry = "''";
                $FilterCountryLength = 0;
            }
        }
    } else {
    }


    if (isset($_POST['MemberIncome'])) {
        foreach ($_POST['MemberIncome'] as $IncomeCheck) {
            if ($IncomeCheck != '') {
                $FilterIncomeLength = count($_POST['MemberIncome']);
                $FilterIncome = ltrim(implode(",", $_POST['MemberIncome']), ',');
            } else {
                $FilterIncome = "''";
                $FilterIncomeLength = 0;
            }
        }
    } else {
    }


    if (isset($_POST['MemberState'])) {
        foreach ($_POST['MemberState'] as $StateCheck) {
            if ($StateCheck != '') {
                $FilterStateLength = count($_POST['MemberState']);
                $FilterState = ltrim(implode(",", $_POST['MemberState']), ',');
            } else {
                $FilterState = "''";
                $FilterStateLength = 0;
            }
        }
    } else {
    }


    if (isset($_POST['MemberAgefrom']) && isset($_POST['MemberAgeto'])) {

        if ($_POST['MemberAgefrom'] != '' && $_POST['MemberAgeto'] == '') {
            $AgeFrom = $_POST['MemberAgefrom'];
            $AgeTo = '100';
        } elseif ($_POST['MemberAgefrom'] == '' && $_POST['MemberAgeto'] != '') {
            $AgeFrom = '1';
            $AgeTo = $_POST['MemberAgeto'];
        } elseif ($_POST['MemberAgefrom'] != '' && $_POST['MemberAgeto'] != '') {
            $AgeFrom = $_POST['MemberAgefrom'];
            $AgeTo = $_POST['MemberAgeto'];
        } else {
            $AgeFrom = '1';
            $AgeTo = '100';
        }
    } else {
    }


    if (isset($_POST['MemberHeightfrom']) && isset($_POST['MemberHeightto'])) {

        if ($_POST['MemberHeightfrom'] != '' && $_POST['MemberHeightto'] == '') {
            $HeightFrom = $_POST['MemberHeightfrom'];
            $HeightTo = '300';
        } elseif ($_POST['MemberHeightfrom'] == '' && $_POST['MemberHeightto'] != '') {
            $HeightFrom = '0';
            $HeightTo = $_POST['MemberHeightto'];
        } elseif ($_POST['MemberHeightfrom'] != '' && $_POST['MemberHeightto'] != '') {
            $HeightFrom = $_POST['MemberHeightfrom'];
            $HeightTo = $_POST['MemberHeightto'];
        } else {
            $HeightFrom = '0';
            $HeightTo = '300';
        }
    } else {
    }


    if (isset($_POST['MemberStar'])) {

        if (($_POST['MemberStar'] != '') && ($_POST['MemberBride'] != '')) {

            $MemberStar = $_POST['MemberStar'];
            //$MemberBride =  ($_POST['MemberBride'] == 'Female') ? 'YES' : 'NO';

            if ($_POST['MemberBride'] == 'Female') {
                $MemberBride = 'YES';
                $FilterGender = 'Male';
            } elseif ($_POST['MemberBride'] == 'Male') {
                $MemberBride = 'NO';
                $FilterGender = 'Female';
            } else {
                $MemberBride = 'NO';
                $FilterGender = 'Female';
            }
            //echo $MemberStar;
            //echo $MemberBride;

            $MatchingStars =  array();

            $MemberBride = mysqli_query($con, "SELECT matchingStars FROM starmatch WHERE isBride = '$MemberBride' AND starId = '$MemberStar'");
            foreach ($MemberBride as $MemberBrideResult) {
                array_push($MatchingStars, $MemberBrideResult["matchingStars"]);
            }

            $MatchingStarString = implode(",", $MatchingStars);
            //echo $MatchingStarString;

            $FilterStarLength = 2;
        } else {
            $FilterStarLength = 0;

            $MatchingStarString = "''";
        }
    }


    if (isset($_POST['PageLength'])) {
        $PageLength = $_POST['PageLength'];
    }


    if (isset($_POST['PageNumber'])) {
        $PageNumber = $_POST['PageNumber'];
    } else {
        $PageNumber = 1;
    }

    if (isset($_POST['MemberPage'])) {
        $FeedbackStatus = $_POST['MemberPage'];
    } else {
        $FeedbackStatus = 0;
    }


    if($_POST['FilterBranch'] == 0){
        $FilterBranch = $_POST['FilterBranch'];
        $BranchQuery = " AND branchId = ".$FilterBranch."";
    }
    else{
        $BranchQuery = " AND branchId = branchId";
    }

    if($_POST['FilterAgency'] == 0){
        $FilterAgency = $_POST['FilterAgency'];
        $AgencyQuery = " AND agencyId = ".$FilterAgency."";
    }
    else{
        $AgencyQuery = " AND agencyId = agencyId";
    }


    
    $FilterProfileStatus = $_POST['ProfileStatus'];
    $FilterType = $_POST['MemberType'];
    $FilterPackage = $_POST['MemberPackage'];


    // echo $BranchQuery;
    // echo $AgencyQuery;





    //echo $FeedbackStatus;

    //echo $_POST['FindMemberId'];

    //print_r($_POST);

    if(isset($_POST['FindMemberId'])){
        $FindMemberId = $_POST['FindMemberId'];  
    }


    function IdToNameConversion($IdString,$TableName,$ColumnId,$ColumnName,$con){
        $NameArray = array();
        //return $IdString;
        if(trim($IdString) != ''){
            $IdArray = explode(",",$IdString);
            foreach($IdArray as $IdArrayResults){
                $FindNameQuery =  "SELECT $ColumnName FROM $TableName WHERE $ColumnId = $IdArrayResults";
                $FindName = mysqli_query($con, $FindNameQuery);
                foreach($FindName as $FindNameResults){
                    array_push($NameArray,$FindNameResults[$ColumnName]);
                }
            }
            return implode(",", $NameArray);
        }else{
            return "";
        }
    }


    // echo IdToNameConversion("2,3,4","caste","casId","casteName",$con);





    if (isset($_POST['MemberData'])) {



        $DataValue = $_POST['MemberData'];

        if($FindMemberId != 0){

            if($DataValue == 'BD'){
                $QueryAdditionFromDuplicate =  " AND B.bulkId = '$FindMemberId'";
            }elseif($DataValue == 'LD'){
                $QueryAdditionFromDuplicate =  " AND L.bulkId = '$FindMemberId'";
            }else{
                $QueryAdditionFromDuplicate =  " AND cdata.profileId = '$FindMemberId'";
            }
        }else{
            $QueryAdditionFromDuplicate = '';
        }


        if (!empty($_POST['MemberMatch']) && !empty($_POST['MatcherId'])) {


            $MatchingMethod = $_POST['MemberMatch'];
            $MatcherId = $_POST['MatcherId'];

            // $SelectedQuery = "SELECT MAINDATA.*,FD.feedback,R.religionName,C.casteName,SC.subcasteName,ST.starName,EDCAT.educationCategory AS EDUCATIONCATEGORY,EDTYPE.educationType AS EDUCATIONTYPE,JBCAT.jobCategory AS JOBCATEGORY,JBTYP.jobType AS JOBTYPE,JBCNTRY.countryName AS JOBCOUNTRY,JBSTATE.stateName AS JOBSTATE,JBDISTRICT.districtName AS JOBDISTRICT,JBCITY.cityName AS JOBCITY,CNTRY.countryName AS COUNTRY,STAT.stateName AS STATE,DSTRCT.districtName AS DISTRICT,CTY.cityName AS CITY,FEDU.educationType AS FATHEREDUCATION,FJB.jobType AS FATHERJOB,MEDU.educationType AS MOTHEREDUCATION,MJB.jobType AS MOTHERJOB,PR.religionName AS PRELIGION,PCST.casteName AS PCASTE,PEDU.educationCategory AS PEDCUATIONCATEGORY,PEDT.educationType AS PEDUCATIONTYPE,PJBCT.jobCategory AS PJOBCATEGORY,PJBTYP.jobType AS PJOBTYPE,PCNTRY.countryName AS PCOUNTRY,PSTAT.stateName AS PSTATE,PDSTRT.districtName AS PDISTRICT,PCTY.cityName AS PCITY FROM custdata MAINDATA LEFT JOIN feedback FD ON MAINDATA.feedback = FD.fdId LEFT JOIN religion R ON MAINDATA.religion = R.rId LEFT JOIN caste C ON MAINDATA.caste = C.casId LEFT JOIN subcaste SC ON MAINDATA.subCaste = SC.scId LEFT JOIN star ST ON MAINDATA.star = ST.starId LEFT JOIN educationcategory EDCAT ON MAINDATA.educationCat = EDCAT.edcatId LEFT JOIN educationtype EDTYPE ON MAINDATA.educationType = EDTYPE.edTyId LEFT JOIN jobcategory JBCAT ON MAINDATA.jobCat = JBCAT.jbcatId LEFT JOIN jobtype JBTYP ON MAINDATA.jobType = JBTYP.jbTyId LEFT JOIN country JBCNTRY ON MAINDATA.jobLocCountry = JBCNTRY.cId LEFT JOIN state JBSTATE ON MAINDATA.jobLocState = JBSTATE.sId LEFT JOIN district JBDISTRICT ON MAINDATA.jobLocDistrict = JBDISTRICT.dId LEFT JOIN city JBCITY ON MAINDATA.jobLocCity = JBCITY.citId LEFT JOIN country CNTRY ON MAINDATA.country = CNTRY.cId LEFT JOIN state STAT ON MAINDATA.state = STAT.sId LEFT JOIN district DSTRCT ON MAINDATA.district = DSTRCT.dId LEFT JOIN city CTY ON MAINDATA.city = CTY.citId LEFT JOIN educationtype FEDU ON MAINDATA.fatherEducation = FEDU.edTyId LEFT JOIN jobtype FJB ON MAINDATA.fatherJob = FJB.jbTyId LEFT JOIN educationtype MEDU ON MAINDATA.motherEducation = MEDU.edTyId LEFT JOIN jobtype MJB ON MAINDATA.motherJob = MJB.jbTyId LEFT JOIN religion PR ON MAINDATA.partnerReligion = PR.rId LEFT JOIN caste PCST ON MAINDATA.partnerCaste = PCST.casId LEFT JOIN educationcategory PEDU ON MAINDATA.partnerEduCat = PEDU.edcatId LEFT JOIN educationtype PEDT ON MAINDATA.partnerEduType = PEDT.edTyId LEFT JOIN jobcategory PJBCT ON MAINDATA.partnerJobCat = PJBCT.jbcatId LEFT JOIN jobtype PJBTYP ON MAINDATA.partnerJobType = PJBTYP.jbTyId LEFT JOIN country PCNTRY ON MAINDATA.partnerCountry = PCNTRY.cId LEFT JOIN state PSTAT ON MAINDATA.partnerState = PSTAT.sId LEFT JOIN district PDSTRT ON MAINDATA.partnerDistrict = PDSTRT.dId LEFT JOIN city PCTY ON MAINDATA.partnerCity = PCTY.citId WHERE MAINDATA.custId = '$MatcherId'";

            $SelectedQuery = "SELECT cdata.*,R.religionName,C.casteName,SUBCST.subcasteName,FD.feedback,EDCAT.educationCategory,EDTY.educationType,JBCAT.jobCategory,JBTY.jobType,JBCOUNTRY.countryName AS jobCountry,JBDISTRICT.districtName AS jobDistrict,JBCITY.cityName AS jobCity,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,FATEDU.educationCategory AS fatherEducation,FATJOB.jobCategory AS fatherJob,MOTEDU.educationCategory AS motherEducation,MOTJOB.jobCategory AS motherJob,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,PARTEDCAT.educationCategory AS partnerEducationCategory,PARTEDTY.educationType AS partnerEducationType,PARTJOBCAT.jobCategory AS partnerJobCategory,PARTJOBTY.jobType AS partnerJobType,PARTCASTE.casteName AS partnerCaste,PARTCOUNTRY.countryName AS partnerJobCountry,PARTCITY.cityName AS partnerCity, STAR.starName AS STARNAME,FEED.feedback AS FEEDBACK  FROM custdata cdata LEFT JOIN religion R ON cdata.religion = R.rId LEFT JOIN caste C ON cdata.caste = C.casId LEFT JOIN subcaste SUBCST ON cdata.subCaste = SUBCST.scId LEFT JOIN feedback FD ON cdata.status = FD.fdId LEFT JOIN educationcategory EDCAT ON cdata.educationCat = EDCAT.edcatId LEFT JOIN educationtype EDTY ON cdata.educationType = EDTY.edTyId LEFT JOIN jobcategory JBCAT ON cdata.jobCat = JBCAT.jbcatId LEFT JOIN jobtype JBTY ON cdata.jobType = JBTY.jbTyId LEFT JOIN country JBCOUNTRY ON cdata.jobLocCountry = JBCOUNTRY.cId LEFT JOIN district JBDISTRICT ON cdata.jobLocDistrict = JBDISTRICT.dId LEFT JOIN city JBCITY ON cdata.jobLocCity = JBCITY.citId LEFT JOIN country CNTRY ON cdata.country = CNTRY.cId LEFT JOIN state STATE ON cdata.state = STATE.sId LEFT JOIN district DSTRCT ON cdata.district = DSTRCT.dId LEFT JOIN city CITY ON cdata.city = CITY.citId LEFT JOIN educationcategory FATEDU ON cdata.fatherEducation = FATEDU.edcatId LEFT JOIN jobcategory FATJOB ON cdata.fatherJob = FATJOB.jbcatId LEFT JOIN educationcategory MOTEDU ON cdata.motherEducation = MOTEDU.edcatId LEFT JOIN jobcategory MOTJOB ON cdata.fatherJob = MOTJOB.jbcatId LEFT JOIN religion PARTRELIGION ON cdata.partnerReligion = PARTRELIGION.rId LEFT JOIN caste PARTCASTE ON cdata.partnerCaste = PARTCASTE.casId LEFT JOIN educationcategory PARTEDCAT ON cdata.partnerEduCat = PARTEDCAT.edcatId LEFT JOIN educationtype PARTEDTY ON cdata.partnerEduType = PARTEDTY.edTyId LEFT JOIN jobcategory PARTJOBCAT ON cdata.partnerJobCat = PARTJOBCAT.jbcatId LEFT JOIN jobtype PARTJOBTY ON cdata.partnerJobType = PARTJOBTY.jbTyId LEFT JOIN country PARTCOUNTRY ON cdata.partnerCountry = PARTCOUNTRY.cId LEFT JOIN state PARTSTATE ON cdata.partnerState = PARTSTATE.sId LEFT JOIN district PARTDISTRICT ON cdata.partnerDistrict = PARTDISTRICT.dId LEFT JOIN city PARTCITY ON cdata.partnerCity = PARTCITY.citId LEFT JOIN star STAR ON cdata.star = STAR.starId LEFT JOIN feedback FEED ON cdata.feedback = FEED.fdId WHERE cdata.custId = '$MatcherId'";


            //echo $SelectedQuery;

            $SelectedPerson = mysqli_query($con, $SelectedQuery);

            foreach ($SelectedPerson as $SelectedPersonResult) {

                ?>


                <!-- Table view -->
                <div class="lapView MatcherView table-responsive p-0 m-0">

                    <table class="table table-bordered tableSize tableBorder">
                        <tbody>
                            <tr>
                                <td rowspan="5" class="ps-0">
                                    <div class="d-flex ViewCustomerImages" data-profileid="<?= $GetAllDataResults["custId"] ?>">
                                        <?php
                                        if ($SelectedPersonResult['gender'] == 'Male') {
                                        ?>
                                            <object data="../CUSTOMERIMAGES/PROFILE/<?= $SelectedPersonResult["mainImage"] ?>" type="image/jpeg" class="BrideAndGroomImg mx-auto"><img src="../IMAGES/boy.png" class="BrideAndGroomImg mx-auto" /></object>
                                            <?= ($SelectedPersonResult["verified"] == 'Y') ? "<i class='material-icons VerifiedIcon'> verified </i>" : "" ?>
                                        <?php
                                        } else {
                                        ?>
                                            <object data="../CUSTOMERIMAGES/PROFILE/<?= $SelectedPersonResult["mainImage"] ?>" type="image/jpeg" class="BrideAndGroomImg mx-auto"><img src="../IMAGES/girl.png" class="BrideAndGroomImg mx-auto" /> </object>
                                            <?= ($SelectedPersonResult["verified"] == 'Y') ? "<i class='material-icons VerifiedIcon'> verified </i>" : "" ?>
                                        <?php
                                        }
                                        ?>
                                    </div>


                                </td>
                                <td class="tableHead tableHeadBg1 headSize2 <?php echo ($SelectedPersonResult['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">
                                    <div class="d-flex justify-content-between"> <a class="ViewCompanyId" data-type="FD" href="" data-custvalue="<?= $SelectedPersonResult['custId'] ?>"> <?= $SelectedPersonResult['profileId'] ?> </a>
                                        <input class="form-check-input me-2 FreeDataSelect SelectSender" data-datatype="<?= $DataValue ?>" type="checkbox" id="<?= $SelectedPersonResult['custId'] ?>" value="" checked>
                                    </div>
                                </td>

                                <td class="tableHead tableHeadBg1 profileIdSize <?php echo ($SelectedPersonResult['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>"> <?= $SelectedPersonResult['fullName'] ?> </td>
                                <td class="tableHead tableHeadBg1 <?php echo ($SelectedPersonResult['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Religion</td>
                                <td class="tableHead tableHeadBg1 headSize1 <?php echo ($SelectedPersonResult['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Profession</td>
                                <td class="tableHead tableHeadBg1 <?php echo ($SelectedPersonResult['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Family</td>
                                <td class="tableHead tableHeadBg1 headSize1 <?php echo ($SelectedPersonResult['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Address</td>
                                <td class="tableHead tableHead2 headSize3 <?php echo ($SelectedPersonResult['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Preference</td>
                                <td class="tableHead tableHead2 headBorder headSize3 <?php echo ($SelectedPersonResult['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Looking</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['profileFor'] ?> ,
                                        <?php
                                        switch ($SelectedPersonResult['dataType']) {
                                            case 'Facebook':
                                                echo 'FB';
                                                break;
                                            case 'Paper':
                                                echo 'PA';
                                                break;
                                            case 'Advertisement':
                                                echo 'ADV';
                                                break;
                                            case 'Waliking':
                                                echo 'WA';
                                                break;
                                        }
                                        ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="heightAdjust">
                                        <?php
                                        if ($SelectedPersonResult['dob'] != '01-Jan-1800') {
                                            //echo (date('Y') - date('Y', strtotime($GetAllDataResults['dob'])));
                                            $diff = date_diff(date_create($SelectedPersonResult['dob']), date_create($Today));
                                            echo $diff->format('%y') . 'Yr ' . $diff->format('%m') . 'Mon';
                                        } else {
                                        }
                                        ?>

                                    </div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['religionName'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['educationCategory'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust">Bro - <?= $SelectedPersonResult['marriedBro'] ?> &nbsp; &nbsp; &nbsp;<?= $SelectedPersonResult['unmarriedBro'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['jobCountry'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['partnerAgeFrom'] ?> - <?= $SelectedPersonResult['partnerAgeTo'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['partnerEducationType'] ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['package'] ?>Premium Plus</div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['height'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['casteName'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['educationType'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust">Sis - <?= $SelectedPersonResult['marriedSis'] ?> &nbsp; &nbsp; &nbsp;<?= $SelectedPersonResult['unmarriedSis'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['state'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['partnerHeightFrom'] ?> cm - <?= $SelectedPersonResult['partnerHeightTo'] ?> cm</div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['partnerEducationType'] ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="heightAdjust"><?= ($SelectedPersonResult['feedbackDate'] != '') ? date('d.m.Y/ h A', strtotime($SelectedPersonResult['feedbackDate']))  : ""  ?> </div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['weight'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['subcasteName'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['jobCategory'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['fatherName'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['jobDistrict'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['partnerPhysicalStatus'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['partnerJobCategory'] ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td><button class="statusBtn ms-4 px-3 mt-1"><?php echo  $SelectedPersonResult['FEEDBACK']
                                                                                ?></button></td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['complexion'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['casteNoBar'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['jobType'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['motherName'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['city'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['partnerComplexion'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $SelectedPersonResult['partnerJobType'] ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Mary</td>
                                <td>Joseph</td>
                                <td><?= $SelectedPersonResult['bodyType'] ?></td>
                                <td><?= $SelectedPersonResult['STARNAME'] ?></td>
                                <td><?= $SelectedPersonResult['jobDetails'] ?></td>
                                <td><?= $SelectedPersonResult['fatherJob'] ?></td>
                                <td><?= $SelectedPersonResult['nativePlace'] ?></td>
                                <td><?= $SelectedPersonResult['partnerCaste'] ?></td>
                                <td><?= $SelectedPersonResult['partnerJobCountry'] ?></td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="mobileNoBg1"><?= $SelectedPersonResult['whatsappNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $SelectedPersonResult['whatsappNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                                </td>
                                <td>
                                    <span class="mobileNoBg2"><?= $SelectedPersonResult['registeredNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $SelectedPersonResult['registeredNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                                </td>
                                <td><?= $SelectedPersonResult['maritalStatus'] ?></td>
                                <td><?= $SelectedPersonResult['chovvaDosham'] ?></td>
                                <td><?= $SelectedPersonResult['jobCity'] ?></td>
                                <td><?= $SelectedPersonResult['motherJob'] ?></td>
                                <td><?= $SelectedPersonResult['residentialStatus'] ?></td>
                                <td><?= $SelectedPersonResult['matchingStars'] ?></td>
                                <td><?= $SelectedPersonResult['partnerCity'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="2"><?= $SelectedPersonResult['feedbackRemark'] ?></td>
                                <td><?= $SelectedPersonResult['physicalStatus'] ?></td>
                                <td><?= $SelectedPersonResult['jathakamType'] ?></td>
                                <td><?= $SelectedPersonResult['monthlyIncome'] ?> INR</td>
                                <td><?= $SelectedPersonResult['financialStatus'] ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="row my-1 mx-1">
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-2">
                                                    <button type="button" id="clearAll" class="btn DeleteProfile filterButtons"><i class="ri-delete-bin-6-line"></i></button>
                                                </div>
                                                <div class="col-2">
                                                    <div class=""><button class="linkBtn">LINK</button><br></div>
                                                </div>
                                                <div class="col-2">
                                                    <a href="" class=""><img src="../IMAGES/mailImg.png" alt="" class="lapviewImg"></a>
                                                </div>
                                                <div class="col-2">
                                                    <a href="mailto:test@gmail.com" class=""><img src="../IMAGES/printerImg.jpg" alt="" class="lapviewImg"></a>
                                                </div>
                                                <div class="col-2">
                                                    <a href="https://wa.me/91<?= $SelectedPersonResult['whatsappNumber'] ?>" target="_blank" class=""><img src="../IMAGES/whatsappImg.png" alt="" class="lapviewImg"></a>
                                                </div>
                                                <div class="col-2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <button type="button" class="form-control btnFeedback FeedbackButton" id="" value="<?= $SelectedPersonResult['custId'] ?>">Feedback</button>
                                        </div>
                                    </div>
                                </td>
                                <td colspan="3"><?= $SelectedPersonResult['lookingFor'] ?></td>
                                <td colspan="3"><?= $SelectedPersonResult['candidateShare'] ?></td>
                                <td></td>

                            </tr>
                        </tbody>
                    </table>


                </div>



                <!-- Mobile View -->
                <div class="bg-white Section mb-3 MobileDisplay">
                    <div class="">
                        <div class="container px-3">
                            <div class="row g-0 ImageBox">
                                <div class="col-10 ">
                                    <?php
                                    if ($SelectedPersonResult['gender'] == 'Male') {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $SelectedPersonResult["photo1"] ?>" type="image/jpeg" class="img-fluid custmobileimg"><img src="../IMAGES/boy.png" class="img-fluid custmobileimg" /></object>
                                    <?php
                                    } else {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $SelectedPersonResult["photo1"] ?>" type="image/jpeg" class="img-fluid custmobileimg"><img src="../IMAGES/girl.png" class=" img-fluid custmobileimg" /></object>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-2 SideMiniMenu">
                                    <ul class="list-unstyled text-center">
                                        <li><button class="linkBtn">LINK</button></li>
                                        <li><a href="" class=""><img src="../IMAGES/mailImg.png" alt="" class="lapviewImg"></a></li>
                                        <li><a href="https://wa.me/91<?= $SelectedPersonResult['whatsappNumber'] ?>" target="_blank" class=""><img src="../IMAGES/whatsappImg.png" alt="" class="lapviewImg"></a></li>
                                        <li> <input class="form-check-input" type="checkbox" id="" value=""></li>
                                        <li> <button class="btn m-0 p-0"><i class="ri-menu-fill"></i></button> </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row g-0 ViewDetailsContainer">

                                <div class="col-6 ViewDetails">
                                    <p class="me-1 CustomerNameField"> <?= ($SelectedPersonResult['fullName'] != '') ? $SelectedPersonResult['fullName'] : "&nbsp;";  ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1 CustomerIdField"> <?= ($SelectedPersonResult['profileId'] != '') ? $SelectedPersonResult['profileId'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="me-1"> <?= ($SelectedPersonResult['religionName'] != '') ? $SelectedPersonResult['religionName'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($SelectedPersonResult['casteName'] != '') ? $SelectedPersonResult['casteName'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="me-1"> <?php echo ($SelectedPersonResult['dob'] != '') ? (date('Y') - date('Y', strtotime($SelectedPersonResult['dob']))) : ""; ?> / <?= $SelectedPersonResult['weight'] ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($SelectedPersonResult['complexion'] != '') ? $SelectedPersonResult['complexion'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class=" me-1"> <?= (substr($SelectedPersonResult['height'], 0, 7) != '') ? substr($SelectedPersonResult['height'], 0, 7) : "&nbsp;";  ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($SelectedPersonResult['maritalStatus'] != '') ? $SelectedPersonResult['maritalStatus'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="me-1"> <?= ($SelectedPersonResult['nativePlace'] != '') ? $SelectedPersonResult['nativePlace'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($SelectedPersonResult['STARNAME'] != '') ? $SelectedPersonResult['STARNAME'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-12 ViewDetails">
                                    <p class=""> <?= ($SelectedPersonResult['educationCategory'] != '') ? $SelectedPersonResult['educationCategory'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-12 ViewDetails">
                                    <p class=""> <?= ($SelectedPersonResult['jobCategory'] != '') ? $SelectedPersonResult['jobCategory'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-12 ViewDetails">
                                    <p class="me-1"> <?= ($SelectedPersonResult['lookingFor'] != '') ? $SelectedPersonResult['lookingFor'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="me-1"> <?= ($SelectedPersonResult['registeredNumber'] != '') ? $SelectedPersonResult['registeredNumber'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($SelectedPersonResult['whatsappNumber'] != '') ? $SelectedPersonResult['whatsappNumber'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="me-1"> <?= ($SelectedPersonResult['contactPerson'] != '') ? $SelectedPersonResult['contactPerson'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($SelectedPersonResult['contactPerson'] != '') ? $SelectedPersonResult['contactPerson'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="me-1"> Status </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= (date('d,m.Y - H A', strtotime($SelectedPersonResult['createdDate'])) != '') ? date('d,m.Y - H A', strtotime($SelectedPersonResult['createdDate'])) : "&nbsp;"  ?> </p>
                                </div>
                                <div class="col-12 ViewDetails">
                                    <p class=""> I will pay tommorrow </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <!-- ScreenShot View -->
                <div class="mobileView bg-white Section mb-3 lapviewMobileBorder" style="display:none;">


                    <div class="row pb-2 ImgColumn d-none d-md-flex">
                        <div class="col-xl-3 col-lg-3 col-12">
                            <div class="text-center mt-1 d-none d-md-block">
                                <p class="m-0 fs-5 d-none d-md-block profileIdLapFont profileIdSize fs-6 pt-2"><?= $SelectedPersonResult['profileId'] ?></p>
                                <?php
                                if ($SelectedPersonResult['gender'] == 'Male') {
                                ?>
                                    <object data="../CUSTOMERIMAGES/PROFILE/<?= $SelectedPersonResult["photo1"] ?>" type="image/jpeg" class="loginBrideGroomImg"><img src="../IMAGES/boy.png" class="loginBrideGroomImg" /></object>
                                <?php
                                } else {
                                ?>
                                    <object data="../CUSTOMERIMAGES/PROFILE/<?= $SelectedPersonResult["photo1"] ?>" type="image/jpeg" class="loginBrideGroomImg"><img src="../IMAGES/girl.png" class="loginBrideGroomImg" /></object>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                        <!-------- MobileView Image-------->
                        <div class="container-fluid d-md-none">
                            <div class="d-flex justify-content-center">
                                <div class="card loginPageCard" style="width: 23rem;">
                                    <?php
                                    if ($GetAllDataResults['gender'] == 'Male') {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="card-img-top loginPageImg"><img src="../IMAGES/boy.png" class="card-img-top loginPageImg" /></object>
                                    <?php
                                    } else {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="card-img-top loginPageImg"><img src="../IMAGES/girl.png" class="card-img-top loginPageImg" /></object>
                                    <?php
                                    }
                                    ?>

                                    <div class="card-body p-0 m-0">
                                        <div class="cardText">
                                            <div class="row m-0 p-0">
                                                <div class="col-4 text-center">
                                                    <a href=""><i class="ri-heart-3-fill heartIcon p-0 m-0"></i></a>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <a href=""><i class="material-icons closeIcon p-0 mt-2">cancel</i>
                                                    </a>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <a href=""><i class="ri-star-s-fill pinkStarMobile p-0 m-0"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-9 col-lg-9 col-12 ContentColumn">
                            <div class="row ">
                                <div class="col-12 text-end d-none d-md-block">
                                    <h6 class="me-5 position-relative">

                                        <span class="position-absolute start-100 p-2 bg-success border border-light rounded-circle">
                                            <span class="visually-hidden">New alerts</span>
                                        </span>
                                        Online
                                    </h6>
                                </div>
                                <div class="col-12 text-end pe-5 d-none d-md-flex">
                                    <p>I have Bachelor's - Engineering/ Computers/ Others and I am Employed in IT & Engineering as a <a href="">See More..</a></p>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-6 pe-1">
                                    <p class="d-md-none mobileviewName bridendGroomName ps-2 mt-3 ms-1"> <?= $GetAllDataResults['fullName'] ?> </p>
                                    <p class="personDetails ps-2 ms-1"> <?= $GetAllDataResults['religionName'] ?> </p>
                                    <p class="personDetails ps-2 ms-1"> <?php if ($GetAllDataResults['dob'] != '') {
                                                                            echo (date('Y') - date('Y', strtotime($GetAllDataResults['dob'])));
                                                                        } else {
                                                                        } ?> </p>
                                    <p class="personDetails ps-2 d-md-none ms-1"> <?= substr($GetAllDataResults['height'], 0, 7);  ?> </p>
                                    <p class="personDetails ps-2 ms-1 d-none d-md-block"> <?= $GetAllDataResults['complexion'] ?> </p>
                                    <p class="personDetails ps-2 ms-1"> <?= $GetAllDataResults['nativePlace'] ?> </p>
                                    <p class="personDetails ps-2 ms-1 d-md-none"> <?= $GetAllDataResults['educationCategory'] ?> </p>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-6 ps-1">
                                    <p class="d-md-none mobileviewID bridendGroomID ps-2 mt-3 me-1"> <?= $GetAllDataResults['profileId'] ?> </p>
                                    <p class="personDetails ps-2 me-1"> <?= $GetAllDataResults['casteName'] ?> </p>
                                    <p class="personDetails ps-2 me-1 d-md-none"> <?= $GetAllDataResults['complexion'] ?> </p>
                                    <p class="personDetails ps-2 me-1 d-md-none"> <?= $GetAllDataResults['weight'] ?> </p>
                                    <p class="personDetails ps-2 me-1 d-none d-md-block"> <?= $GetAllDataResults['height'] ?> / <?= $GetAllDataResults['weight'] ?> </p>
                                    <p class="personDetails ps-2 me-1"> <?= $GetAllDataResults['maritalStatus'] ?> </p>
                                    <p class="personDetails ps-2 me-1 d-none d-md-block"> <?= $GetAllDataResults['educationCategory'] ?> </p>
                                    <p class="personDetails ps-2 me-1 d-md-none"> <?= $GetAllDataResults['jobCategory'] ?> </p>
                                </div>
                                <div class="col-xl-4 col-lg-4 d-none d-md-flex">
                                    <div class="row rigtIconPaddng">
                                        <div class="col-xl-6 col-lg-6 col-6">
                                            <div class="iconBorder text-center">
                                                <div class="py-1"><i class="ri-heart-3-fill heartIcon py-2"></i></div>

                                                <p class="fs-6 mb-0">Like</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-6">
                                            <div class="iconBorder text-center">
                                                <img src="../IMAGES/loginpgeAvatar.png" alt="" class="pt-2 py-1">
                                                <p class="fs-6 mb-0">Assist</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-6 mt-3">
                                            <div class="iconBorder text-center">
                                                <div class="py-1">
                                                    <i class="ri-star-s-fill starIcon"></i>
                                                </div>
                                                <p class="fs-6 mb-0">Shortlist</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-6 mt-3">
                                            <div class="iconBorder text-center">
                                                <div class="py-1">
                                                    <i class="ri-eye-line eyeIcon"></i>
                                                </div>
                                                <p class="fs-6 mb-0">Full Profile</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="d-md-none ScreenShotViewMobile">
                        <div class="container px-2">
                            <div class="row g-0 ImageBox">
                                <div class="col-12 d-flex justify-content-center">
                                    <?php
                                    if ($SelectedPersonResult['gender'] == 'Male') {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $SelectedPersonResult["photo1"] ?>" type="image/jpeg" class="img-fluid custmobileimg"><img src="../IMAGES/boy.png" class="img-fluid custmobileimg" /></object>
                                    <?php
                                    } else {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $SelectedPersonResult["photo1"] ?>" type="image/jpeg" class="img-fluid custmobileimg"><img src="../IMAGES/girl.png" class=" img-fluid custmobileimg" /></object>
                                    <?php
                                    }
                                    ?>
                                </div>

                            </div>

                            <div class="row g-0 ViewDetailsContainer">

                                <div class="col-6 ViewDetails">
                                    <p class="me-1 CustomerNameField"> <?= ($SelectedPersonResult['fullName'] != '') ? $SelectedPersonResult['fullName'] : "&nbsp;";  ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1 CustomerIdField"> <?= ($SelectedPersonResult['profileId'] != '') ? $SelectedPersonResult['profileId'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="me-1"> <?= ($SelectedPersonResult['religionName'] != '') ? $SelectedPersonResult['religionName'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($SelectedPersonResult['casteName'] != '') ? $SelectedPersonResult['casteName'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="me-1"> <?php echo ($SelectedPersonResult['dob'] != '') ? (date('Y') - date('Y', strtotime($SelectedPersonResult['dob']))) : ""; ?> / <?= $SelectedPersonResult['weight'] ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($SelectedPersonResult['complexion'] != '') ? $SelectedPersonResult['complexion'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class=" me-1"> <?= (substr($SelectedPersonResult['height'], 0, 7) != '') ? substr($SelectedPersonResult['height'], 0, 7) : "&nbsp;";  ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($SelectedPersonResult['maritalStatus'] != '') ? $SelectedPersonResult['maritalStatus'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails ScreenshotViewNativeSmall">
                                    <p class="me-1"> <?= ($SelectedPersonResult['nativePlace'] != '') ? $SelectedPersonResult['nativePlace'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-12 ViewDetails ScreenshotViewNativeBig" style="display: none;">
                                    <p class="me-1"> <?= ($SelectedPersonResult['nativePlace'] != '') ? $SelectedPersonResult['nativePlace'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails ScreenshotViewStar">
                                    <p class="ms-1"> <?= ($SelectedPersonResult['STARNAME'] != '') ? $SelectedPersonResult['STARNAME'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-12 ViewDetails ScreenshotViewEducation">
                                    <p class="ms-0"> <?= ($SelectedPersonResult['educationCategory'] != '') ? $SelectedPersonResult['educationCategory'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-12 ViewDetails ScreenshotViewJob">
                                    <p class="ms-0"> <?= ($SelectedPersonResult['jobCategory'] != '') ? $SelectedPersonResult['jobCategory'] : "&nbsp;" ?> </p>
                                </div>

                                <div class="col-12 ViewDetails ScreenshotViewNumber">
                                    <p class="ms-0"> <?= ($SelectedPersonResult['registeredNumber'] != '') ? $SelectedPersonResult['registeredNumber'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-12 ViewDetails ScreenshotViewNumber">
                                    <p class="ms-0"> <?= ($SelectedPersonResult['whatsappNumber'] != '') ? $SelectedPersonResult['whatsappNumber'] : "&nbsp;" ?> </p>
                                </div>


                            </div>
                        </div>
                    </div>


                </div>


                <div class="SendingImage" id="Sender<?= $SelectedPersonResult['custId'] ?>" style="display:none;">
                    <div class="px-3 SendImageDisplayDiv mt-2">
                        <?php
                        if ($SelectedPersonResult['gender'] == 'Male') {
                        ?>
                            <img src="../IMAGES/boy.png" class="SendImageDisplay" />

                        <?php
                        } else {
                        ?>
                            <img src="../IMAGES/girl.png" class="SendImageDisplay" />

                        <?php
                        }
                        ?>
                    </div>

                    <div class="row mt-4 px-3">
                        <div class="col-6 ">
                            <h6 class="ColName">
                                <?= ($SelectedPersonResult['fullName'] != '') ? $SelectedPersonResult['fullName'] : "&nbsp;" ?>
                            </h6>
                        </div>
                        <div class="col-6 ">
                            <h6 class="ColId">
                                <?= ($SelectedPersonResult['profileId'] != '') ? $SelectedPersonResult['profileId'] : "&nbsp;" ?>
                            </h6>
                        </div>
                    </div>
                    <div class="row mt-2 px-3">
                        <div class="col-6 ">
                            <h6 class="ColOthers">
                                <?= ($SelectedPersonResult['religionName'] != '') ? $SelectedPersonResult['religionName'] : "&nbsp;"  ?>
                            </h6>
                        </div>
                        <div class="col-6 ">
                            <h6 class="ColOthers">
                                <?= ($SelectedPersonResult['casteName'] != '') ? $SelectedPersonResult['casteName'] : "&nbsp;" ?>
                            </h6>
                        </div>
                    </div>
                    <div class="row mt-2 px-3">
                        <div class="col-6 ">
                            <h6 class="ColOthers">
                                <?php
                                if ($SelectedPersonResult['dob'] != '01-Jan-1800') {
                                    //echo (date('Y') - date('Y', strtotime($GetAllDataResults['dob'])));
                                    $diff = date_diff(date_create($SelectedPersonResult['dob']), date_create($Today));
                                    echo $diff->format('%y') . ' Yr ' . $diff->format('%m') . ' Mon / ' . $SelectedPersonResult['weight'] . '';
                                } else {
                                    echo "&nbsp;";
                                }
                                ?>
                            </h6>
                        </div>
                        <div class="col-6 ">
                            <h6 class="ColOthers">
                                <?= ($SelectedPersonResult['complexion'] != '') ? $SelectedPersonResult['complexion'] : "&nbsp;" ?>
                            </h6>
                        </div>
                    </div>
                    <div class="row mt-2 px-3">
                        <div class="col-6 ">
                            <h6 class="ColOthers">
                                <?= ($SelectedPersonResult['height'] != '') ? $SelectedPersonResult['height'] : "&nbsp;" ?>
                            </h6>
                        </div>
                        <div class="col-6 ">
                            <h6 class="ColOthers">
                                <?= ($SelectedPersonResult['maritalStatus'] != '') ? $SelectedPersonResult['maritalStatus'] : "&nbsp;" ?>
                            </h6>
                        </div>
                    </div>
                    <div class="row mt-2 px-3">
                        <div class="col-6 ">
                            <h6 class="ColOthers">
                                <?= ($SelectedPersonResult['nativePlace'] != '') ? $SelectedPersonResult['nativePlace'] : "&nbsp;" ?>
                            </h6>
                        </div>
                        <div class="col-6 ">
                            <h6 class="ColOthers">
                                <?= ($SelectedPersonResult['STARNAME'] != '') ? $SelectedPersonResult['STARNAME'] : "&nbsp;" ?>
                            </h6>
                        </div>
                    </div>

                    <div class="row mt-2 px-3">
                        <div class="col-12">
                            <h6 class="ColOthers">
                                <?= ($SelectedPersonResult['educationType'] != '') ? $SelectedPersonResult['educationType'] : "&nbsp;" ?>
                            </h6>
                        </div>
                    </div>
                    <div class="row mt-2 px-3">
                        <div class="col-12">
                            <h6 class="ColOthers">
                                <?= ($SelectedPersonResult['jobCategory'] != '') ? $SelectedPersonResult['jobCategory'] : "&nbsp;" ?>
                            </h6>
                        </div>
                    </div>
                    <div class="row mt-2 px-3">
                        <div class="col-12">
                            <h6 class="ColOthers">
                                <?= ($SelectedPersonResult['registeredNumber'] != '') ? $SelectedPersonResult['registeredNumber'] : "&nbsp;" ?>
                            </h6>
                        </div>
                    </div>
                    <div class="row mt-2 px-3">
                        <div class="col-12">
                            <h6 class="ColOthers">
                                <?= ($SelectedPersonResult['whatsappNumber'] != '') ? $SelectedPersonResult['whatsappNumber'] : "&nbsp;" ?>
                            </h6>
                        </div>
                    </div>

                </div>


                <?php
            }


            if(isset($_POST['CheckSendReceive'])){
                $SendReceive = "";
            }else{
                $SendReceive = "AND (cdata.profileSend = 'NO' AND cdata.profileReceive = 'NO')";
            }

            $query = "SELECT cdata.*,R.religionName,C.casteName,SUBCST.subcasteName,FD.feedback,EDCAT.educationCategory,EDTY.educationType,JBCAT.jobCategory,JBTY.jobType,JBCOUNTRY.countryName AS jobCountry,JBDISTRICT.districtName AS jobDistrict,JBCITY.cityName AS jobCity,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,FATEDU.educationCategory AS fatherEducation,FATJOB.jobCategory AS fatherJob,MOTEDU.educationCategory AS motherEducation,MOTJOB.jobCategory AS motherJob,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,PARTEDCAT.educationCategory AS partnerEducationCategory,PARTEDTY.educationType AS partnerEducationType,PARTJOBCAT.jobCategory AS partnerJobCategory,PARTJOBTY.jobType AS partnerJobType,PARTCASTE.casteName AS partnerCaste,PARTCOUNTRY.countryName AS partnerJobCountry,PARTCITY.cityName AS partnerCity, STAR.starName AS STARNAME,FEED.feedback AS FEEDBACK  FROM custdata cdata LEFT JOIN religion R ON cdata.religion = R.rId LEFT JOIN caste C ON cdata.caste = C.casId LEFT JOIN subcaste SUBCST ON cdata.subCaste = SUBCST.scId LEFT JOIN feedback FD ON cdata.status = FD.fdId LEFT JOIN educationcategory EDCAT ON cdata.educationCat = EDCAT.edcatId LEFT JOIN educationtype EDTY ON cdata.educationType = EDTY.edTyId LEFT JOIN jobcategory JBCAT ON cdata.jobCat = JBCAT.jbcatId LEFT JOIN jobtype JBTY ON cdata.jobType = JBTY.jbTyId LEFT JOIN country JBCOUNTRY ON cdata.jobLocCountry = JBCOUNTRY.cId LEFT JOIN district JBDISTRICT ON cdata.jobLocDistrict = JBDISTRICT.dId LEFT JOIN city JBCITY ON cdata.jobLocCity = JBCITY.citId LEFT JOIN country CNTRY ON cdata.country = CNTRY.cId LEFT JOIN state STATE ON cdata.state = STATE.sId LEFT JOIN district DSTRCT ON cdata.district = DSTRCT.dId LEFT JOIN city CITY ON cdata.city = CITY.citId LEFT JOIN educationcategory FATEDU ON cdata.fatherEducation = FATEDU.edcatId LEFT JOIN jobcategory FATJOB ON cdata.fatherJob = FATJOB.jbcatId LEFT JOIN educationcategory MOTEDU ON cdata.motherEducation = MOTEDU.edcatId LEFT JOIN jobcategory MOTJOB ON cdata.fatherJob = MOTJOB.jbcatId LEFT JOIN religion PARTRELIGION ON cdata.partnerReligion = PARTRELIGION.rId LEFT JOIN caste PARTCASTE ON cdata.partnerCaste = PARTCASTE.casId LEFT JOIN educationcategory PARTEDCAT ON cdata.partnerEduCat = PARTEDCAT.edcatId LEFT JOIN educationtype PARTEDTY ON cdata.partnerEduType = PARTEDTY.edTyId LEFT JOIN jobcategory PARTJOBCAT ON cdata.partnerJobCat = PARTJOBCAT.jbcatId LEFT JOIN jobtype PARTJOBTY ON cdata.partnerJobType = PARTJOBTY.jbTyId LEFT JOIN country PARTCOUNTRY ON cdata.partnerCountry = PARTCOUNTRY.cId LEFT JOIN state PARTSTATE ON cdata.partnerState = PARTSTATE.sId LEFT JOIN district PARTDISTRICT ON cdata.partnerDistrict = PARTDISTRICT.dId LEFT JOIN city PARTCITY ON cdata.partnerCity = PARTCITY.citId LEFT JOIN star STAR ON cdata.star = STAR.starId LEFT JOIN feedback FEED ON cdata.feedback = FEED.fdId WHERE custId <> '' AND $AgeFrom <= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND $AgeTo >= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND ( substring(height, 12,15) BETWEEN $HeightFrom AND $HeightTo) AND ( cdata.gender = CASE WHEN '$FilterGender' <> '' THEN '$FilterGender' ELSE cdata.gender END) AND (cdata.maritalStatus = CASE WHEN $FilterMaritalStatusLength > 0 THEN ((SELECT cmarital.maritalStatus FROM custdata cmarital WHERE cmarital.maritalStatus IN($FilterMaritalStatus) AND cdata.custId = cmarital.custId )) ELSE cdata.maritalStatus END) AND (cdata.physicalStatus = CASE WHEN $FilterPhyscialStatusLength > 0 THEN ((SELECT cphysical.physicalStatus FROM custdata cphysical WHERE cphysical.physicalStatus IN($FilterPhyscialStatus) AND cdata.custId = cphysical.custId )) ELSE cdata.physicalStatus END) AND (cdata.complexion = CASE WHEN $FilterComplexionLength > 0 THEN (SELECT ccomplexion.complexion FROM custdata ccomplexion WHERE ccomplexion.complexion IN($FilterComplexion) AND cdata.custId = ccomplexion.custId) ELSE cdata.complexion END) AND (cdata.bodyType = CASE WHEN $FilterBodyTypeLength > 0 THEN (SELECT cbody.bodyType FROM custdata cbody WHERE cbody.bodyType IN($FilterBodyType) AND cdata.custId = cbody.custId) ELSE cdata.bodyType END) AND (cdata.jathakamType = CASE WHEN $FilterJathakamLength > 0 THEN (SELECT cjathakam.jathakamType FROM custdata cjathakam WHERE cjathakam.jathakamType IN($FilterJathakam) AND cdata.custId = cjathakam.custId) ELSE cdata.jathakamType END) AND (cdata.noofChild = CASE WHEN $FilterChildLength > 0 THEN (SELECT cchild.noofChild FROM custdata cchild WHERE cchild.noofChild IN($FilterChild) AND cdata.custId = cchild.custId) ELSE cdata.noofChild END) AND (cdata.financialStatus = CASE WHEN $FilterFinstatusLength > 0 THEN (SELECT cfinancial.financialStatus FROM custdata cfinancial WHERE cfinancial.financialStatus IN($FilterFinstatus) AND cdata.custId = cfinancial.custId) ELSE cdata.financialStatus END) AND (cdata.youOwn = CASE WHEN $FilterOwnLength > 0 THEN (SELECT cOwn.youOwn FROM custdata cOwn WHERE cOwn.youOwn IN($FilterOwn) AND cdata.custId = cOwn.custId) ELSE cdata.youOwn END) AND (cdata.caste = CASE WHEN $FilterCasteLength > 0 THEN (SELECT ccaste.casId FROM caste ccaste WHERE ccaste.casId IN($FilterCaste) AND cdata.caste = ccaste.casId) ELSE cdata.caste END) AND (cdata.educationCat = CASE WHEN $FilterEducationCategoryLength > 0 THEN (SELECT cedcat.edcatId FROM educationcategory cedcat WHERE cedcat.edcatId IN($FilterEducationCategory) AND cdata.educationCat = cedcat.edcatId) ELSE cdata.educationCat END) AND (cdata.educationType = CASE WHEN $FilterEduTypeLength > 0 THEN (SELECT cedtype.edTyId FROM educationtype cedtype WHERE cedtype.edTyId IN($FilterEduType) AND cdata.educationType = cedtype.edTyId) ELSE cdata.educationType END) AND (cdata.jobCat = CASE WHEN $FilterJobcategoryLength > 0 THEN (SELECT cjobcat.jbcatId FROM jobcategory cjobcat WHERE cjobcat.jbcatId IN($FilterJobcategory) AND cdata.jobCat = cjobcat.jbcatId) ELSE cdata.jobCat END) AND (cdata.jobType = CASE WHEN $FilterJobTypeLength > 0 THEN (SELECT cjobtype.jbTyId FROM jobtype cjobtype WHERE cjobtype.jbTyId IN($FilterJobType) AND cdata.jobType = cjobtype.jbTyId) ELSE cdata.jobType END) AND (cdata.district = CASE WHEN $FilterDistrictLength > 0 THEN (SELECT cdistrict.dId FROM district cdistrict WHERE cdistrict.dId IN($FilterDistrict) AND cdata.district = cdistrict.dId) ELSE cdata.district END) AND (cdata.jobLocCountry = CASE WHEN $FilterCountryLength > 0 THEN (SELECT ccountry.cId FROM country ccountry WHERE ccountry.cId IN($FilterCountry) AND cdata.jobLocCountry = ccountry.cId) ELSE cdata.jobLocCountry END) AND (cdata.jobLocState = CASE WHEN $FilterStateLength > 0 THEN (SELECT cstate.sId FROM state cstate WHERE cstate.sId IN($FilterState) AND cdata.jobLocState = cstate.sId) ELSE cdata.jobLocState END) AND (cdata.religion = CASE WHEN $FilterReligionLength > 0 THEN (SELECT rreli.rId FROM religion rreli WHERE rreli.rId IN($FilterReligion) AND cdata.religion = rreli.rId) ELSE cdata.religion END) AND (cdata.star = CASE WHEN $FilterStarLength > 0 THEN (SELECT cstar.starId FROM star cstar WHERE cstar.starId IN($MatchingStarString) AND cdata.star = cstar.starId) ELSE cdata.star END) AND (cdata.profileId = CASE WHEN '$FilterMemberCanID' <> '' THEN '$FilterMemberCanID'  ELSE cdata.profileId END) AND ( cdata.registeredNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.registeredNumber END ) OR cdata.whatsappNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.whatsappNumber END ) OR cdata.residencePhoneNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.residencePhoneNumber END )) $SendReceive ";


            //Get Total Number of Results
            $TotalResult = mysqli_num_rows(mysqli_query($con, $query));

            //Get Number of pages according to page length
            $TotalPages = ceil($TotalResult / $PageLength);

            $Offset = ($PageNumber - 1) * $PageLength;

            $query = $query . ' LIMIT ' . $Offset . ', ' . $PageLength;

            //echo $query;

            $LimitedRows  = mysqli_num_rows(mysqli_query($con, $query));
            $GetAllDataQuery = mysqli_query($con, $query);



            foreach ($GetAllDataQuery as $GetAllDataResults) {
            ?>

                <!-- Table view -->
                <div class="lapView table-responsive">

                    <!-- <div class="mt-1">
                                    <img src="../IMAGES/GroomA.jpg" alt="" class="BrideAndGroomImg">
                                </div> -->
                    <table class="table table-bordered bg-white tableSize tableBorder">
                        <tbody>
                            <tr>
                                <td rowspan="5" class="ps-0">
                                    <div class="d-flex ViewCustomerImages" data-profileid="<?= $GetAllDataResults["custId"] ?>">
                                        <?php
                                        if ($GetAllDataResults['gender'] == 'Male') {
                                        ?>
                                            <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["mainImage"] ?>" type="image/jpeg" class="BrideAndGroomImg mx-auto"><img src="../IMAGES/boy.png" class="BrideAndGroomImg mx-auto" /></object>
                                            <?= ($GetAllDataResults["verified"] == 'Y') ? "<i class='material-icons VerifiedIcon'> verified </i>" : "" ?>
                                        <?php
                                        } else {
                                        ?>
                                            <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["mainImage"] ?>" type="image/jpeg" class="BrideAndGroomImg mx-auto"><img src="../IMAGES/girl.png" class="BrideAndGroomImg mx-auto" /> </object>
                                            <?= ($GetAllDataResults["verified"] == 'Y') ? "<i class='material-icons VerifiedIcon'> verified </i>" : "" ?>
                                        <?php
                                        }
                                        ?>
                                    </div>


                                </td>
                                <td class="tableHead tableHeadBg1 headSize2 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">
                                    <div class="d-flex justify-content-between"> <a class="ViewCompanyId" data-type="FD" href="" data-custvalue="<?= $GetAllDataResults['custId'] ?>"> <?= $GetAllDataResults['profileId'] ?> </a>
                                        <input class="form-check-input me-2 FreeDataSelect SendingList" type="checkbox" id="<?= $GetAllDataResults['custId'] ?>" value="">
                                    </div>
                                </td>

                                <td class="tableHead tableHeadBg1 profileIdSize <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>"> <?= $GetAllDataResults['fullName'] ?> </td>
                                <td class="tableHead tableHeadBg1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Religion</td>
                                <td class="tableHead tableHeadBg1 headSize1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Profession</td>
                                <td class="tableHead tableHeadBg1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Family</td>
                                <td class="tableHead tableHeadBg1 headSize1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Address</td>
                                <td class="tableHead tableHead2 headSize3 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Preference</td>
                                <td class="tableHead tableHead2 headBorder headSize3 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Looking</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['profileFor'] ?> ,
                                        <?php
                                        switch ($GetAllDataResults['dataType']) {
                                            case 'Facebook':
                                                echo 'FB';
                                                break;
                                            case 'Paper':
                                                echo 'PA';
                                                break;
                                            case 'Advertisement':
                                                echo 'ADV';
                                                break;
                                            case 'Waliking':
                                                echo 'WA';
                                                break;
                                        }
                                        ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="heightAdjust">
                                        <?php if ($GetAllDataResults['dob'] != '01-Jan-1800') {
                                            //echo (date('Y') - date('Y', strtotime($GetAllDataResults['dob'])));
                                            $diff = date_diff(date_create($GetAllDataResults['dob']), date_create($Today));
                                            echo $diff->format('%y') . 'Yr ' . $diff->format('%m') . 'Mon';
                                        } else {
                                        }  ?>

                                    </div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['religionName'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['educationCategory'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust">Bro - <?= $GetAllDataResults['marriedBro'] ?> &nbsp; &nbsp; &nbsp;<?= $GetAllDataResults['unmarriedBro'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['country'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['partnerAgeFrom'] ?> - <?= $GetAllDataResults['partnerAgeTo'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['partnerEducationType'] ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['package'] ?>Premium Plus</div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['height'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['casteName'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['educationType'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust">Sis - <?= $GetAllDataResults['marriedSis'] ?> &nbsp; &nbsp; &nbsp;<?= $GetAllDataResults['unmarriedSis'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['state'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['partnerHeightFrom'] ?> cm - <?= $GetAllDataResults['partnerHeightTo'] ?> cm</div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['partnerEducationType'] ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="heightAdjust"><?= ($GetAllDataResults['feedbackDate'] != '') ? date('d.m.Y/ h A', strtotime($GetAllDataResults['feedbackDate']))  : ""  ?> </div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['weight'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['subcasteName'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['jobCategory'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['fatherName'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['district'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['partnerPhysicalStatus'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['partnerJobCategory'] ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td><button class="statusBtn ms-4 px-3 mt-1"><?php echo  $GetAllDataResults['FEEDBACK']
                                                                                ?></button></td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['complexion'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['casteNoBar'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['jobType'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['motherName'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['city'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['partnerComplexion'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['partnerJobType'] ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Mary</td>
                                <td>Joseph</td>
                                <td><?= $GetAllDataResults['bodyType'] ?></td>
                                <td><?= $GetAllDataResults['STARNAME'] ?></td>
                                <td><?= $GetAllDataResults['jobDetails'] ?></td>
                                <td><?= $GetAllDataResults['fatherJob'] ?></td>
                                <td><?= $GetAllDataResults['nativePlace'] ?></td>
                                <td><?= $GetAllDataResults['partnerCaste'] ?></td>
                                <td><?= $GetAllDataResults['partnerJobCountry'] ?></td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="mobileNoBg1"><?= $GetAllDataResults['whatsappNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $GetAllDataResults['whatsappNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                                </td>
                                <td>
                                    <span class="mobileNoBg2"><?= $GetAllDataResults['residencePhoneNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $GetAllDataResults['residencePhoneNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                                </td>
                                <td><?= $GetAllDataResults['maritalStatus'] ?></td>
                                <td><?= $GetAllDataResults['chovvaDosham'] ?></td>
                                <td><?= $GetAllDataResults['jobCity'] ?></td>
                                <td><?= $GetAllDataResults['motherJob'] ?></td>
                                <td><?= $GetAllDataResults['residentialStatus'] ?></td>
                                <td><?= $GetAllDataResults['matchingStars'] ?></td>
                                <td><?= $GetAllDataResults['partnerCity'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="2"><?= $GetAllDataResults['feedbackRemark'] ?></td>
                                <td><?= $GetAllDataResults['physicalStatus'] ?></td>
                                <td><?= $GetAllDataResults['jathakamType'] ?></td>
                                <td><?= $GetAllDataResults['monthlyIncome'] ?> INR</td>
                                <td><?= $GetAllDataResults['financialStatus'] ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="row my-1 mx-1">
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-2">
                                                    <button type="button" id="clearAll" class="btn DeleteProfile filterButtons"><i class="ri-delete-bin-6-line"></i></button>
                                                </div>
                                                <div class="col-2">
                                                    <div class=""><button class="linkBtn">LINK</button><br></div>
                                                </div>
                                                <div class="col-2">
                                                    <a href="" class=""><img src="../IMAGES/mailImg.png" alt="" class="lapviewImg"></a>
                                                </div>
                                                <div class="col-2">
                                                    <a href="mailto:test@gmail.com" class=""><img src="../IMAGES/printerImg.jpg" alt="" class="lapviewImg"></a>
                                                </div>
                                                <div class="col-2">
                                                    <a href="https://wa.me/91<?= $GetAllDataResults['whatsappNumber'] ?>" target="_blank" class=""><img src="../IMAGES/whatsappImg.png" alt="" class="lapviewImg"></a>
                                                </div>
                                                <div class="col-2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <button type="button" class="form-control btnFeedback FeedbackButton" id="" value="<?= $GetAllDataResults['custId'] ?>">Feedback</button>
                                        </div>
                                    </div>
                                </td>
                                <td colspan="3"><?= $GetAllDataResults['lookingFor'] ?></td>
                                <td colspan="3"><?= $GetAllDataResults['candidateShare'] ?></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                </div>



                <!-- Mobile View -->
                <div class="bg-white Section mb-3 MobileDisplay">
                    <div class="">
                        <div class="container px-3">
                            <div class="row g-0 ImageBox">
                                <div class="col-10 ">
                                    <?php
                                    if ($GetAllDataResults['gender'] == 'Male') {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="img-fluid custmobileimg"><img src="../IMAGES/boy.png" class="img-fluid custmobileimg" /></object>
                                    <?php
                                    } else {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="img-fluid custmobileimg"><img src="../IMAGES/girl.png" class=" img-fluid custmobileimg" /></object>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-2 SideMiniMenu">
                                    <ul class="list-unstyled text-center">
                                        <li><button class="linkBtn">LINK</button></li>
                                        <li><a href="" class=""><img src="../IMAGES/mailImg.png" alt="" class="lapviewImg"></a></li>
                                        <li><a href="https://wa.me/91<?= $GetAllDataResults['whatsappNumber'] ?>" target="_blank" class=""><img src="../IMAGES/whatsappImg.png" alt="" class="lapviewImg"></a></li>
                                        <li> <input class="form-check-input" type="checkbox" id="" value=""></li>
                                        <li> <button class="btn m-0 p-0"><i class="ri-menu-fill"></i></button> </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row g-0 ViewDetailsContainer">

                                <div class="col-6 ViewDetails">
                                    <p class="me-1 CustomerNameField"> <?= ($GetAllDataResults['fullName'] != '') ? $GetAllDataResults['fullName'] : "&nbsp;";  ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1 CustomerIdField"> <?= ($GetAllDataResults['profileId'] != '') ? $GetAllDataResults['profileId'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="me-1"> <?= ($GetAllDataResults['religionName'] != '') ? $GetAllDataResults['religionName'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($GetAllDataResults['casteName'] != '') ? $GetAllDataResults['casteName'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="me-1"> <?php echo ($GetAllDataResults['dob'] != '') ? (date('Y') - date('Y', strtotime($GetAllDataResults['dob']))) : ""; ?> / <?= $GetAllDataResults['weight'] ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($GetAllDataResults['complexion'] != '') ? $GetAllDataResults['complexion'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class=" me-1"> <?= (substr($GetAllDataResults['height'], 0, 7) != '') ? substr($GetAllDataResults['height'], 0, 7) : "&nbsp;";  ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($GetAllDataResults['maritalStatus'] != '') ? $GetAllDataResults['maritalStatus'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="me-1"> <?= ($GetAllDataResults['nativePlace'] != '') ? $GetAllDataResults['nativePlace'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($GetAllDataResults['STARNAME'] != '') ? $GetAllDataResults['STARNAME'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-12 ViewDetails">
                                    <p class=""> <?= ($GetAllDataResults['educationCategory'] != '') ? $GetAllDataResults['educationCategory'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-12 ViewDetails">
                                    <p class=""> <?= ($GetAllDataResults['jobCategory'] != '') ? $GetAllDataResults['jobCategory'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-12 ViewDetails">
                                    <p class="me-1"> <?= ($GetAllDataResults['lookingFor'] != '') ? $GetAllDataResults['lookingFor'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="me-1"> <?= ($GetAllDataResults['registeredNumber'] != '') ? $GetAllDataResults['registeredNumber'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($GetAllDataResults['whatsappNumber'] != '') ? $GetAllDataResults['whatsappNumber'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="me-1"> <?= ($GetAllDataResults['contactPerson'] != '') ? $GetAllDataResults['contactPerson'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($GetAllDataResults['contactPerson'] != '') ? $GetAllDataResults['contactPerson'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="me-1"> Status </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= (date('d,m.Y - H A', strtotime($GetAllDataResults['createdDate'])) != '') ? date('d,m.Y - H A', strtotime($GetAllDataResults['createdDate'])) : "&nbsp;"  ?> </p>
                                </div>
                                <div class="col-12 ViewDetails">
                                    <p class=""> I will pay tommorrow </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <!-- ScreenShot View -->
                <div class="mobileView bg-white Section mb-3 lapviewMobileBorder" style="display:none;">


                    <div class="row pb-2 ImgColumn d-none d-md-flex">
                        <div class="col-xl-3 col-lg-3 col-12">
                            <div class="text-center mt-1 d-none d-md-block">
                                <p class="m-0 fs-5 d-none d-md-block profileIdLapFont profileIdSize fs-6 pt-2"><?= $GetAllDataResults['profileId'] ?></p>
                                <?php
                                if ($GetAllDataResults['gender'] == 'Male') {
                                ?>
                                    <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="loginBrideGroomImg"><img src="../IMAGES/boy.png" class="loginBrideGroomImg" /></object>
                                <?php
                                } else {
                                ?>
                                    <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="loginBrideGroomImg"><img src="../IMAGES/girl.png" class="loginBrideGroomImg" /></object>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                        <!-------- MobileView Image-------->
                        <div class="container-fluid d-md-none">
                            <div class="d-flex justify-content-center">
                                <div class="card loginPageCard" style="width: 23rem;">
                                    <?php
                                    if ($GetAllDataResults['gender'] == 'Male') {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="card-img-top loginPageImg"><img src="../IMAGES/boy.png" class="card-img-top loginPageImg" /></object>
                                    <?php
                                    } else {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="card-img-top loginPageImg"><img src="../IMAGES/girl.png" class="card-img-top loginPageImg" /></object>
                                    <?php
                                    }
                                    ?>

                                    <div class="card-body p-0 m-0">
                                        <div class="cardText">
                                            <div class="row m-0 p-0">
                                                <div class="col-4 text-center">
                                                    <a href=""><i class="ri-heart-3-fill heartIcon p-0 m-0"></i></a>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <a href=""><i class="material-icons closeIcon p-0 mt-2">cancel</i>
                                                    </a>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <a href=""><i class="ri-star-s-fill pinkStarMobile p-0 m-0"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-9 col-lg-9 col-12 ContentColumn">
                            <div class="row ">
                                <div class="col-12 text-end d-none d-md-block">
                                    <h6 class="me-5 position-relative">

                                        <span class="position-absolute start-100 p-2 bg-success border border-light rounded-circle">
                                            <span class="visually-hidden">New alerts</span>
                                        </span>
                                        Online
                                    </h6>
                                </div>
                                <div class="col-12 text-end pe-5 d-none d-md-flex">
                                    <p>I have Bachelor's - Engineering/ Computers/ Others and I am Employed in IT & Engineering as a <a href="">See More..</a></p>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-6 pe-1">
                                    <p class="d-md-none mobileviewName bridendGroomName ps-2 mt-3 ms-1"> <?= $GetAllDataResults['fullName'] ?> </p>
                                    <p class="personDetails ps-2 ms-1"> <?= $GetAllDataResults['religionName'] ?> </p>
                                    <p class="personDetails ps-2 ms-1"> <?php if ($GetAllDataResults['dob'] != '') {
                                                                            echo (date('Y') - date('Y', strtotime($GetAllDataResults['dob'])));
                                                                        } else {
                                                                        } ?> </p>
                                    <p class="personDetails ps-2 d-md-none ms-1"> <?= substr($GetAllDataResults['height'], 0, 7);  ?> </p>
                                    <p class="personDetails ps-2 ms-1 d-none d-md-block"> <?= $GetAllDataResults['complexion'] ?> </p>
                                    <p class="personDetails ps-2 ms-1"> <?= $GetAllDataResults['nativePlace'] ?> </p>
                                    <p class="personDetails ps-2 ms-1 d-md-none"> <?= $GetAllDataResults['educationCategory'] ?> </p>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-6 ps-1">
                                    <p class="d-md-none mobileviewID bridendGroomID ps-2 mt-3 me-1"> <?= $GetAllDataResults['profileId'] ?> </p>
                                    <p class="personDetails ps-2 me-1"> <?= $GetAllDataResults['casteName'] ?> </p>
                                    <p class="personDetails ps-2 me-1 d-md-none"> <?= $GetAllDataResults['complexion'] ?> </p>
                                    <p class="personDetails ps-2 me-1 d-md-none"> <?= $GetAllDataResults['weight'] ?> </p>
                                    <p class="personDetails ps-2 me-1 d-none d-md-block"> <?= $GetAllDataResults['height'] ?> / <?= $GetAllDataResults['weight'] ?> </p>
                                    <p class="personDetails ps-2 me-1"> <?= $GetAllDataResults['maritalStatus'] ?> </p>
                                    <p class="personDetails ps-2 me-1 d-none d-md-block"> <?= $GetAllDataResults['educationCategory'] ?> </p>
                                    <p class="personDetails ps-2 me-1 d-md-none"> <?= $GetAllDataResults['jobCategory'] ?> </p>
                                </div>
                                <div class="col-xl-4 col-lg-4 d-none d-md-flex">
                                    <div class="row rigtIconPaddng">
                                        <div class="col-xl-6 col-lg-6 col-6">
                                            <div class="iconBorder text-center">
                                                <div class="py-1"><i class="ri-heart-3-fill heartIcon py-2"></i></div>

                                                <p class="fs-6 mb-0">Like</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-6">
                                            <div class="iconBorder text-center">
                                                <img src="../IMAGES/loginpgeAvatar.png" alt="" class="pt-2 py-1">
                                                <p class="fs-6 mb-0">Assist</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-6 mt-3">
                                            <div class="iconBorder text-center">
                                                <div class="py-1">
                                                    <i class="ri-star-s-fill starIcon"></i>
                                                </div>
                                                <p class="fs-6 mb-0">Shortlist</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-6 mt-3">
                                            <div class="iconBorder text-center">
                                                <div class="py-1">
                                                    <i class="ri-eye-line eyeIcon"></i>
                                                </div>
                                                <p class="fs-6 mb-0">Full Profile</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="d-md-none ScreenShotViewMobile">
                        <div class="container px-2">
                            <div class="row g-0 ImageBox">
                                <div class="col-12 d-flex justify-content-center">
                                    <?php
                                    if ($GetAllDataResults['gender'] == 'Male') {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="img-fluid custmobileimg"><img src="../IMAGES/boy.png" class="img-fluid custmobileimg" /></object>
                                    <?php
                                    } else {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="img-fluid custmobileimg"><img src="../IMAGES/girl.png" class=" img-fluid custmobileimg" /></object>
                                    <?php
                                    }
                                    ?>
                                </div>

                            </div>

                            <div class="row g-0 ViewDetailsContainer">

                                <div class="col-6 ViewDetails">
                                    <p class="me-1 CustomerNameField"> <?= ($GetAllDataResults['fullName'] != '') ? $GetAllDataResults['fullName'] : "&nbsp;";  ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1 CustomerIdField"> <?= ($GetAllDataResults['profileId'] != '') ? $GetAllDataResults['profileId'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="me-1"> <?= ($GetAllDataResults['religionName'] != '') ? $GetAllDataResults['religionName'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($GetAllDataResults['casteName'] != '') ? $GetAllDataResults['casteName'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="me-1"> <?php echo ($GetAllDataResults['dob'] != '') ? (date('Y') - date('Y', strtotime($GetAllDataResults['dob']))) : ""; ?> / <?= $GetAllDataResults['weight'] ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($GetAllDataResults['complexion'] != '') ? $GetAllDataResults['complexion'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class=" me-1"> <?= (substr($GetAllDataResults['height'], 0, 7) != '') ? substr($GetAllDataResults['height'], 0, 7) : "&nbsp;";  ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($GetAllDataResults['maritalStatus'] != '') ? $GetAllDataResults['maritalStatus'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails ScreenshotViewNativeSmall">
                                    <p class="me-1"> <?= ($GetAllDataResults['nativePlace'] != '') ? $GetAllDataResults['nativePlace'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-12 ViewDetails ScreenshotViewNativeBig" style="display: none;">
                                    <p class="me-1"> <?= ($GetAllDataResults['nativePlace'] != '') ? $GetAllDataResults['nativePlace'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails ScreenshotViewStar">
                                    <p class="ms-1"> <?= ($GetAllDataResults['STARNAME'] != '') ? $GetAllDataResults['STARNAME'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-12 ViewDetails ScreenshotViewEducation">
                                    <p class="ms-0"> <?= ($GetAllDataResults['educationCategory'] != '') ? $GetAllDataResults['educationCategory'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-12 ViewDetails ScreenshotViewJob">
                                    <p class="ms-0"> <?= ($GetAllDataResults['jobCategory'] != '') ? $GetAllDataResults['jobCategory'] : "&nbsp;" ?> </p>
                                </div>

                                <div class="col-12 ViewDetails ScreenshotViewNumber">
                                    <p class="ms-0"> <?= ($GetAllDataResults['registeredNumber'] != '') ? $GetAllDataResults['registeredNumber'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-12 ViewDetails ScreenshotViewNumber">
                                    <p class="ms-0"> <?= ($GetAllDataResults['whatsappNumber'] != '') ? $GetAllDataResults['whatsappNumber'] : "&nbsp;" ?> </p>
                                </div>


                            </div>
                        </div>
                    </div>


                </div>


                <!-- Sending Image -->
                <div class="SendingImage" id="Receiver<?= $GetAllDataResults['custId'] ?>" style="display:none;">
                    <div class="px-3 SendImageDisplayDiv mt-2">
                        <?php
                        if ($GetAllDataResults['gender'] == 'Male') {
                        ?>
                            <img src="../IMAGES/boy.png" class="SendImageDisplay" />

                        <?php
                        } else {
                        ?>
                            <img src="../IMAGES/girl.png" class="SendImageDisplay" />

                        <?php
                        }
                        ?>
                    </div>

                    <div class="row mt-4 px-3">
                        <div class="col-6 ">
                            <h6 class="ColName">
                                <?= ($GetAllDataResults['fullName'] != '') ? $GetAllDataResults['fullName'] : "&nbsp;" ?>
                            </h6>
                        </div>
                        <div class="col-6 ">
                            <h6 class="ColId">
                                <?= ($GetAllDataResults['profileId'] != '') ? $GetAllDataResults['profileId'] : "&nbsp;" ?>
                            </h6>
                        </div>
                    </div>
                    <div class="row mt-2 px-3">
                        <div class="col-6 ">
                            <h6 class="ColOthers">
                                <?= ($GetAllDataResults['religionName'] != '') ? $GetAllDataResults['religionName'] : "&nbsp;"  ?>
                            </h6>
                        </div>
                        <div class="col-6 ">
                            <h6 class="ColOthers">
                                <?= ($GetAllDataResults['casteName'] != '') ? $GetAllDataResults['casteName'] : "&nbsp;" ?>
                            </h6>
                        </div>
                    </div>
                    <div class="row mt-2 px-3">
                        <div class="col-6 ">
                            <h6 class="ColOthers">
                                <?php
                                if ($GetAllDataResults['dob'] != '01-Jan-1800') {
                                    //echo (date('Y') - date('Y', strtotime($GetAllDataResults['dob'])));
                                    $diff = date_diff(date_create($GetAllDataResults['dob']), date_create($Today));
                                    echo $diff->format('%y') . ' Yr ' . $diff->format('%m') . ' Mon / ' . $GetAllDataResults['weight'] . '';
                                } else {
                                    echo "&nbsp;";
                                }
                                ?>
                            </h6>
                        </div>
                        <div class="col-6 ">
                            <h6 class="ColOthers">
                                <?= ($GetAllDataResults['complexion'] != '') ? $GetAllDataResults['complexion'] : "&nbsp;" ?>
                            </h6>
                        </div>
                    </div>
                    <div class="row mt-2 px-3">
                        <div class="col-6 ">
                            <h6 class="ColOthers">
                                <?= ($GetAllDataResults['height'] != '') ? $GetAllDataResults['height'] : "&nbsp;" ?>
                            </h6>
                        </div>
                        <div class="col-6 ">
                            <h6 class="ColOthers">
                                <?= ($GetAllDataResults['maritalStatus'] != '') ? $GetAllDataResults['maritalStatus'] : "&nbsp;" ?>
                            </h6>
                        </div>
                    </div>
                    <div class="row mt-2 px-3">
                        <div class="col-6 ">
                            <h6 class="ColOthers">
                                <?= ($GetAllDataResults['nativePlace'] != '') ? $GetAllDataResults['nativePlace'] : "&nbsp;" ?>
                            </h6>
                        </div>
                        <div class="col-6 ">
                            <h6 class="ColOthers">
                                <?= ($GetAllDataResults['STARNAME'] != '') ? $GetAllDataResults['STARNAME'] : "&nbsp;" ?>
                            </h6>
                        </div>
                    </div>

                    <div class="row mt-2 px-3">
                        <div class="col-12">
                            <h6 class="ColOthers">
                                <?= ($GetAllDataResults['educationType'] != '') ? $GetAllDataResults['educationType'] : "&nbsp;" ?>
                            </h6>
                        </div>
                    </div>
                    <div class="row mt-2 px-3">
                        <div class="col-12">
                            <h6 class="ColOthers">
                                <?= ($GetAllDataResults['jobCategory'] != '') ? $GetAllDataResults['jobCategory'] : "&nbsp;" ?>
                            </h6>
                        </div>
                    </div>
                    <div class="row mt-2 px-3">
                        <div class="col-12">
                            <h6 class="ColOthers">
                                <?= ($GetAllDataResults['registeredNumber'] != '') ? $GetAllDataResults['registeredNumber'] : "&nbsp;" ?>
                            </h6>
                        </div>
                    </div>
                    <div class="row mt-2 px-3">
                        <div class="col-12">
                            <h6 class="ColOthers">
                                <?= ($GetAllDataResults['whatsappNumber'] != '') ? $GetAllDataResults['whatsappNumber'] : "&nbsp;" ?>
                            </h6>
                        </div>
                    </div>

                </div>


            <?php
            }
        } else {

            //Check data is bulk
            if ($DataValue == 'BD') {
                $query = "SELECT * FROM bulkdata B LEFT JOIN feedback FB ON B.bulkStatus =  FB.fdId LEFT JOIN types DT ON B.bulkType = DT.id WHERE B.assignedTo = $Assigned AND B.approvalStatus = '$FilterProfileStatus' AND B.bulkStatus = $FeedbackStatus ".$BranchQuery." ".$AgencyQuery."";
            } elseif ($DataValue == 'LD') {
                $query = "SELECT * FROM leaddata L LEFT JOIN feedback FB ON L.bulkStatus =  FB.fdId LEFT JOIN types DT ON L.bulkType = DT.id WHERE L.assignedTo = $Assigned AND L.approvalStatus = '$FilterProfileStatus' AND L.bulkStatus = $FeedbackStatus ".$BranchQuery." ".$AgencyQuery."";
            } elseif ($DataValue == 'PD') {
                $query = "SELECT cdata.*,P.packageName,DT.typeAbbreviation,R.religionName,C.casteName,SUBCST.subcasteName,FD.feedback,EDCAT.educationCategory,EDTY.educationType,JBCAT.jobCategory,JBTY.jobType,JBCOUNTRY.countryName AS jobCountry,JBDISTRICT.districtName AS jobDistrict,JBCITY.cityName AS jobCity,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,FATEDU.educationCategory AS fatherEducation,FATJOB.jobType AS fatherJob,MOTEDU.educationCategory AS motherEducation,MOTJOB.jobType AS motherJob,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,STAR.starName AS STARNAME,FEED.feedback AS FEEDBACK  FROM paiddata cdata LEFT JOIN religion R ON cdata.religion = R.rId LEFT JOIN caste C ON cdata.caste = C.casId LEFT JOIN subcaste SUBCST ON cdata.subCaste = SUBCST.scId LEFT JOIN feedback FD ON cdata.status = FD.fdId LEFT JOIN educationcategory EDCAT ON cdata.educationCat = EDCAT.edcatId LEFT JOIN educationtype EDTY ON cdata.educationType = EDTY.edTyId LEFT JOIN jobcategory JBCAT ON cdata.jobCat = JBCAT.jbcatId LEFT JOIN jobtype JBTY ON cdata.jobType = JBTY.jbTyId LEFT JOIN country JBCOUNTRY ON cdata.jobLocCountry = JBCOUNTRY.cId LEFT JOIN district JBDISTRICT ON cdata.jobLocDistrict = JBDISTRICT.dId LEFT JOIN city JBCITY ON cdata.jobLocCity = JBCITY.citId LEFT JOIN country CNTRY ON cdata.country = CNTRY.cId LEFT JOIN state STATE ON cdata.state = STATE.sId LEFT JOIN district DSTRCT ON cdata.district = DSTRCT.dId LEFT JOIN city CITY ON cdata.city = CITY.citId LEFT JOIN educationcategory FATEDU ON cdata.fatherEducation = FATEDU.edcatId LEFT JOIN jobtype FATJOB ON cdata.fatherJob = FATJOB.jbTyId LEFT JOIN educationcategory MOTEDU ON cdata.motherEducation = MOTEDU.edcatId LEFT JOIN jobtype MOTJOB ON cdata.motherJob = MOTJOB.jbTyId LEFT JOIN star STAR ON cdata.star = STAR.starId LEFT JOIN feedback FEED ON cdata.feedback = FEED.fdId LEFT JOIN package P ON cdata.package = P.id LEFT JOIN types DT ON cdata.dataType = DT.id WHERE custId <> '' AND $AgeFrom <= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND $AgeTo >= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND ( substring(height, 12,15) BETWEEN $HeightFrom AND $HeightTo) AND ( cdata.gender = CASE WHEN '$FilterGender' <> '' THEN '$FilterGender' ELSE cdata.gender END) AND (cdata.maritalStatus = CASE WHEN $FilterMaritalStatusLength > 0 THEN ((SELECT cmarital.maritalStatus FROM custdata cmarital WHERE cmarital.maritalStatus IN($FilterMaritalStatus) AND cdata.custId = cmarital.custId )) ELSE cdata.maritalStatus END) AND (cdata.monthlyIncome = CASE WHEN $FilterIncomeLength > 0 THEN ((SELECT cmonthly.monthlyIncome FROM custdata cmonthly WHERE cmonthly.monthlyIncome IN($FilterIncome) AND cdata.custId = cmonthly.custId )) ELSE cdata.monthlyIncome END) AND (cdata.physicalStatus = CASE WHEN $FilterPhyscialStatusLength > 0 THEN ((SELECT cphysical.physicalStatus FROM custdata cphysical WHERE cphysical.physicalStatus IN($FilterPhyscialStatus) AND cdata.custId = cphysical.custId )) ELSE cdata.physicalStatus END) AND (cdata.complexion = CASE WHEN $FilterComplexionLength > 0 THEN (SELECT ccomplexion.complexion FROM custdata ccomplexion WHERE ccomplexion.complexion IN($FilterComplexion) AND cdata.custId = ccomplexion.custId) ELSE cdata.complexion END) AND (cdata.bodyType = CASE WHEN $FilterBodyTypeLength > 0 THEN (SELECT cbody.bodyType FROM custdata cbody WHERE cbody.bodyType IN($FilterBodyType) AND cdata.custId = cbody.custId) ELSE cdata.bodyType END) AND (cdata.jathakamType = CASE WHEN $FilterJathakamLength > 0 THEN (SELECT cjathakam.jathakamType FROM custdata cjathakam WHERE cjathakam.jathakamType IN($FilterJathakam) AND cdata.custId = cjathakam.custId) ELSE cdata.jathakamType END) AND (cdata.noofChild = CASE WHEN $FilterChildLength > 0 THEN (SELECT cchild.noofChild FROM custdata cchild WHERE cchild.noofChild IN($FilterChild) AND cdata.custId = cchild.custId) ELSE cdata.noofChild END) AND (cdata.financialStatus = CASE WHEN $FilterFinstatusLength > 0 THEN (SELECT cfinancial.financialStatus FROM custdata cfinancial WHERE cfinancial.financialStatus IN($FilterFinstatus) AND cdata.custId = cfinancial.custId) ELSE cdata.financialStatus END) AND (cdata.youOwn = CASE WHEN $FilterOwnLength > 0 THEN (SELECT cOwn.youOwn FROM custdata cOwn WHERE cOwn.youOwn IN($FilterOwn) AND cdata.custId = cOwn.custId) ELSE cdata.youOwn END) AND (cdata.caste = CASE WHEN $FilterCasteLength > 0 THEN (SELECT ccaste.casId FROM caste ccaste WHERE ccaste.casId IN($FilterCaste) AND cdata.caste = ccaste.casId) ELSE cdata.caste END) AND (cdata.educationCat = CASE WHEN $FilterEducationCategoryLength > 0 THEN (SELECT cedcat.edcatId FROM educationcategory cedcat WHERE cedcat.edcatId IN($FilterEducationCategory) AND cdata.educationCat = cedcat.edcatId) ELSE cdata.educationCat END) AND (cdata.educationType = CASE WHEN $FilterEduTypeLength > 0 THEN (SELECT cedtype.edTyId FROM educationtype cedtype WHERE cedtype.edTyId IN($FilterEduType) AND cdata.educationType = cedtype.edTyId) ELSE cdata.educationType END) AND (cdata.jobCat = CASE WHEN $FilterJobcategoryLength > 0 THEN (SELECT cjobcat.jbcatId FROM jobcategory cjobcat WHERE cjobcat.jbcatId IN($FilterJobcategory) AND cdata.jobCat = cjobcat.jbcatId) ELSE cdata.jobCat END) AND (cdata.jobType = CASE WHEN $FilterJobTypeLength > 0 THEN (SELECT cjobtype.jbTyId FROM jobtype cjobtype WHERE cjobtype.jbTyId IN($FilterJobType) AND cdata.jobType = cjobtype.jbTyId) ELSE cdata.jobType END) AND (cdata.district = CASE WHEN $FilterDistrictLength > 0 THEN (SELECT cdistrict.dId FROM district cdistrict WHERE cdistrict.dId IN($FilterDistrict) AND cdata.district = cdistrict.dId) ELSE cdata.district END) AND (cdata.jobLocCountry = CASE WHEN $FilterCountryLength > 0 THEN (SELECT ccountry.cId FROM country ccountry WHERE ccountry.cId IN($FilterCountry) AND cdata.jobLocCountry = ccountry.cId) ELSE cdata.jobLocCountry END) AND (cdata.jobLocState = CASE WHEN $FilterStateLength > 0 THEN (SELECT cstate.sId FROM state cstate WHERE cstate.sId IN($FilterState) AND cdata.jobLocState = cstate.sId) ELSE cdata.jobLocState END) AND (cdata.religion = CASE WHEN $FilterReligionLength > 0 THEN (SELECT rreli.rId FROM religion rreli WHERE rreli.rId IN($FilterReligion) AND cdata.religion = rreli.rId) ELSE cdata.religion END) AND (cdata.star = CASE WHEN $FilterStarLength > 0 THEN (SELECT cstar.starId FROM star cstar WHERE cstar.starId IN($MatchingStarString) AND cdata.star = cstar.starId) ELSE cdata.star END) AND (cdata.profileId = CASE WHEN '$FilterMemberCanID' <> '' THEN '$FilterMemberCanID'  ELSE cdata.profileId END) AND ( cdata.registeredNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.registeredNumber END ) OR cdata.whatsappNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.whatsappNumber END ) OR cdata.residencePhoneNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.residencePhoneNumber END )) AND assignedTo = $Assigned AND cdata.feedback = $FeedbackStatus ".$BranchQuery." ".$AgencyQuery." AND approvalStatus = '$FilterProfileStatus'";
            } elseif ($DataValue == 'MD') {
                $query = "SELECT cdata.*,P.packageName,DT.typeAbbreviation,R.religionName,C.casteName,SUBCST.subcasteName,FD.feedback,EDCAT.educationCategory,EDTY.educationType,JBCAT.jobCategory,JBTY.jobType,JBCOUNTRY.countryName AS jobCountry,JBDISTRICT.districtName AS jobDistrict,JBCITY.cityName AS jobCity,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,FATEDU.educationCategory AS fatherEducation,FATJOB.jobType AS fatherJob,MOTEDU.educationCategory AS motherEducation,MOTJOB.jobType AS motherJob,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,STAR.starName AS STARNAME,FEED.feedback AS FEEDBACK  FROM marriagedata cdata LEFT JOIN religion R ON cdata.religion = R.rId LEFT JOIN caste C ON cdata.caste = C.casId LEFT JOIN subcaste SUBCST ON cdata.subCaste = SUBCST.scId LEFT JOIN feedback FD ON cdata.status = FD.fdId LEFT JOIN educationcategory EDCAT ON cdata.educationCat = EDCAT.edcatId LEFT JOIN educationtype EDTY ON cdata.educationType = EDTY.edTyId LEFT JOIN jobcategory JBCAT ON cdata.jobCat = JBCAT.jbcatId LEFT JOIN jobtype JBTY ON cdata.jobType = JBTY.jbTyId LEFT JOIN country JBCOUNTRY ON cdata.jobLocCountry = JBCOUNTRY.cId LEFT JOIN district JBDISTRICT ON cdata.jobLocDistrict = JBDISTRICT.dId LEFT JOIN city JBCITY ON cdata.jobLocCity = JBCITY.citId LEFT JOIN country CNTRY ON cdata.country = CNTRY.cId LEFT JOIN state STATE ON cdata.state = STATE.sId LEFT JOIN district DSTRCT ON cdata.district = DSTRCT.dId LEFT JOIN city CITY ON cdata.city = CITY.citId LEFT JOIN educationcategory FATEDU ON cdata.fatherEducation = FATEDU.edcatId LEFT JOIN jobType FATJOB ON cdata.fatherJob = FATJOB.jbTyId LEFT JOIN educationcategory MOTEDU ON cdata.motherEducation = MOTEDU.edcatId LEFT JOIN jobType MOTJOB ON cdata.motherJob = MOTJOB.jbTyId LEFT JOIN star STAR ON cdata.star = STAR.starId LEFT JOIN feedback FEED ON cdata.feedback = FEED.fdId LEFT JOIN package P ON cdata.package = P.id LEFT JOIN types DT ON cdata.dataType = DT.id WHERE custId <> '' AND $AgeFrom <= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND $AgeTo >= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND ( substring(height, 12,15) BETWEEN $HeightFrom AND $HeightTo) AND ( cdata.gender = CASE WHEN '$FilterGender' <> '' THEN '$FilterGender' ELSE cdata.gender END) AND (cdata.maritalStatus = CASE WHEN $FilterMaritalStatusLength > 0 THEN ((SELECT cmarital.maritalStatus FROM custdata cmarital WHERE cmarital.maritalStatus IN($FilterMaritalStatus) AND cdata.custId = cmarital.custId )) ELSE cdata.maritalStatus END) AND (cdata.monthlyIncome = CASE WHEN $FilterIncomeLength > 0 THEN ((SELECT cmonthly.monthlyIncome FROM custdata cmonthly WHERE cmonthly.monthlyIncome IN($FilterIncome) AND cdata.custId = cmonthly.custId )) ELSE cdata.monthlyIncome END) AND (cdata.physicalStatus = CASE WHEN $FilterPhyscialStatusLength > 0 THEN ((SELECT cphysical.physicalStatus FROM custdata cphysical WHERE cphysical.physicalStatus IN($FilterPhyscialStatus) AND cdata.custId = cphysical.custId )) ELSE cdata.physicalStatus END) AND (cdata.complexion = CASE WHEN $FilterComplexionLength > 0 THEN (SELECT ccomplexion.complexion FROM custdata ccomplexion WHERE ccomplexion.complexion IN($FilterComplexion) AND cdata.custId = ccomplexion.custId) ELSE cdata.complexion END) AND (cdata.bodyType = CASE WHEN $FilterBodyTypeLength > 0 THEN (SELECT cbody.bodyType FROM custdata cbody WHERE cbody.bodyType IN($FilterBodyType) AND cdata.custId = cbody.custId) ELSE cdata.bodyType END) AND (cdata.jathakamType = CASE WHEN $FilterJathakamLength > 0 THEN (SELECT cjathakam.jathakamType FROM custdata cjathakam WHERE cjathakam.jathakamType IN($FilterJathakam) AND cdata.custId = cjathakam.custId) ELSE cdata.jathakamType END) AND (cdata.noofChild = CASE WHEN $FilterChildLength > 0 THEN (SELECT cchild.noofChild FROM custdata cchild WHERE cchild.noofChild IN($FilterChild) AND cdata.custId = cchild.custId) ELSE cdata.noofChild END) AND (cdata.financialStatus = CASE WHEN $FilterFinstatusLength > 0 THEN (SELECT cfinancial.financialStatus FROM custdata cfinancial WHERE cfinancial.financialStatus IN($FilterFinstatus) AND cdata.custId = cfinancial.custId) ELSE cdata.financialStatus END) AND (cdata.youOwn = CASE WHEN $FilterOwnLength > 0 THEN (SELECT cOwn.youOwn FROM custdata cOwn WHERE cOwn.youOwn IN($FilterOwn) AND cdata.custId = cOwn.custId) ELSE cdata.youOwn END) AND (cdata.caste = CASE WHEN $FilterCasteLength > 0 THEN (SELECT ccaste.casId FROM caste ccaste WHERE ccaste.casId IN($FilterCaste) AND cdata.caste = ccaste.casId) ELSE cdata.caste END) AND (cdata.educationCat = CASE WHEN $FilterEducationCategoryLength > 0 THEN (SELECT cedcat.edcatId FROM educationcategory cedcat WHERE cedcat.edcatId IN($FilterEducationCategory) AND cdata.educationCat = cedcat.edcatId) ELSE cdata.educationCat END) AND (cdata.educationType = CASE WHEN $FilterEduTypeLength > 0 THEN (SELECT cedtype.edTyId FROM educationtype cedtype WHERE cedtype.edTyId IN($FilterEduType) AND cdata.educationType = cedtype.edTyId) ELSE cdata.educationType END) AND (cdata.jobCat = CASE WHEN $FilterJobcategoryLength > 0 THEN (SELECT cjobcat.jbcatId FROM jobcategory cjobcat WHERE cjobcat.jbcatId IN($FilterJobcategory) AND cdata.jobCat = cjobcat.jbcatId) ELSE cdata.jobCat END) AND (cdata.jobType = CASE WHEN $FilterJobTypeLength > 0 THEN (SELECT cjobtype.jbTyId FROM jobtype cjobtype WHERE cjobtype.jbTyId IN($FilterJobType) AND cdata.jobType = cjobtype.jbTyId) ELSE cdata.jobType END) AND (cdata.district = CASE WHEN $FilterDistrictLength > 0 THEN (SELECT cdistrict.dId FROM district cdistrict WHERE cdistrict.dId IN($FilterDistrict) AND cdata.district = cdistrict.dId) ELSE cdata.district END) AND (cdata.jobLocCountry = CASE WHEN $FilterCountryLength > 0 THEN (SELECT ccountry.cId FROM country ccountry WHERE ccountry.cId IN($FilterCountry) AND cdata.jobLocCountry = ccountry.cId) ELSE cdata.jobLocCountry END) AND (cdata.jobLocState = CASE WHEN $FilterStateLength > 0 THEN (SELECT cstate.sId FROM state cstate WHERE cstate.sId IN($FilterState) AND cdata.jobLocState = cstate.sId) ELSE cdata.jobLocState END) AND (cdata.religion = CASE WHEN $FilterReligionLength > 0 THEN (SELECT rreli.rId FROM religion rreli WHERE rreli.rId IN($FilterReligion) AND cdata.religion = rreli.rId) ELSE cdata.religion END) AND (cdata.star = CASE WHEN $FilterStarLength > 0 THEN (SELECT cstar.starId FROM star cstar WHERE cstar.starId IN($MatchingStarString) AND cdata.star = cstar.starId) ELSE cdata.star END) AND (cdata.profileId = CASE WHEN '$FilterMemberCanID' <> '' THEN '$FilterMemberCanID'  ELSE cdata.profileId END) AND ( cdata.registeredNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.registeredNumber END ) OR cdata.whatsappNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.whatsappNumber END ) OR cdata.residencePhoneNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.residencePhoneNumber END )) AND assignedTo = $Assigned AND cdata.feedback = $FeedbackStatus ".$BranchQuery." ".$AgencyQuery." AND approvalStatus = '$FilterProfileStatus'";
            } elseif ($DataValue == 'WD') {
                $query = "SELECT cdata.*,P.packageName,DT.typeAbbreviation,R.religionName,C.casteName,SUBCST.subcasteName,FD.feedback,EDCAT.educationCategory,EDTY.educationType,JBCAT.jobCategory,JBTY.jobType,JBCOUNTRY.countryName AS jobCountry,JBDISTRICT.districtName AS jobDistrict,JBCITY.cityName AS jobCity,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,FATEDU.educationCategory AS fatherEducation,FATJOB.jobType AS fatherJob,MOTEDU.educationCategory AS motherEducation,MOTJOB.jobType AS motherJob,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,STAR.starName AS STARNAME,FEED.feedback AS FEEDBACK  FROM weddingdata cdata LEFT JOIN religion R ON cdata.religion = R.rId LEFT JOIN caste C ON cdata.caste = C.casId LEFT JOIN subcaste SUBCST ON cdata.subCaste = SUBCST.scId LEFT JOIN feedback FD ON cdata.status = FD.fdId LEFT JOIN educationcategory EDCAT ON cdata.educationCat = EDCAT.edcatId LEFT JOIN educationtype EDTY ON cdata.educationType = EDTY.edTyId LEFT JOIN jobcategory JBCAT ON cdata.jobCat = JBCAT.jbcatId LEFT JOIN jobtype JBTY ON cdata.jobType = JBTY.jbTyId LEFT JOIN country JBCOUNTRY ON cdata.jobLocCountry = JBCOUNTRY.cId LEFT JOIN district JBDISTRICT ON cdata.jobLocDistrict = JBDISTRICT.dId LEFT JOIN city JBCITY ON cdata.jobLocCity = JBCITY.citId LEFT JOIN country CNTRY ON cdata.country = CNTRY.cId LEFT JOIN state STATE ON cdata.state = STATE.sId LEFT JOIN district DSTRCT ON cdata.district = DSTRCT.dId LEFT JOIN city CITY ON cdata.city = CITY.citId LEFT JOIN educationcategory FATEDU ON cdata.fatherEducation = FATEDU.edcatId LEFT JOIN jobType FATJOB ON cdata.fatherJob = FATJOB.jbTyId LEFT JOIN educationcategory MOTEDU ON cdata.motherEducation = MOTEDU.edcatId LEFT JOIN jobType MOTJOB ON cdata.motherJob = MOTJOB.jbTyId LEFT JOIN star STAR ON cdata.star = STAR.starId LEFT JOIN feedback FEED ON cdata.feedback = FEED.fdId LEFT JOIN package P ON cdata.package = P.id LEFT JOIN types DT ON cdata.dataType = DT.id WHERE custId <> '' AND $AgeFrom <= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND $AgeTo >= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND ( substring(height, 12,15) BETWEEN $HeightFrom AND $HeightTo) AND ( cdata.gender = CASE WHEN '$FilterGender' <> '' THEN '$FilterGender' ELSE cdata.gender END) AND (cdata.maritalStatus = CASE WHEN $FilterMaritalStatusLength > 0 THEN ((SELECT cmarital.maritalStatus FROM custdata cmarital WHERE cmarital.maritalStatus IN($FilterMaritalStatus) AND cdata.custId = cmarital.custId )) ELSE cdata.maritalStatus END) AND (cdata.monthlyIncome = CASE WHEN $FilterIncomeLength > 0 THEN ((SELECT cmonthly.monthlyIncome FROM custdata cmonthly WHERE cmonthly.monthlyIncome IN($FilterIncome) AND cdata.custId = cmonthly.custId )) ELSE cdata.monthlyIncome END) AND (cdata.physicalStatus = CASE WHEN $FilterPhyscialStatusLength > 0 THEN ((SELECT cphysical.physicalStatus FROM custdata cphysical WHERE cphysical.physicalStatus IN($FilterPhyscialStatus) AND cdata.custId = cphysical.custId )) ELSE cdata.physicalStatus END) AND (cdata.complexion = CASE WHEN $FilterComplexionLength > 0 THEN (SELECT ccomplexion.complexion FROM custdata ccomplexion WHERE ccomplexion.complexion IN($FilterComplexion) AND cdata.custId = ccomplexion.custId) ELSE cdata.complexion END) AND (cdata.bodyType = CASE WHEN $FilterBodyTypeLength > 0 THEN (SELECT cbody.bodyType FROM custdata cbody WHERE cbody.bodyType IN($FilterBodyType) AND cdata.custId = cbody.custId) ELSE cdata.bodyType END) AND (cdata.jathakamType = CASE WHEN $FilterJathakamLength > 0 THEN (SELECT cjathakam.jathakamType FROM custdata cjathakam WHERE cjathakam.jathakamType IN($FilterJathakam) AND cdata.custId = cjathakam.custId) ELSE cdata.jathakamType END) AND (cdata.noofChild = CASE WHEN $FilterChildLength > 0 THEN (SELECT cchild.noofChild FROM custdata cchild WHERE cchild.noofChild IN($FilterChild) AND cdata.custId = cchild.custId) ELSE cdata.noofChild END) AND (cdata.financialStatus = CASE WHEN $FilterFinstatusLength > 0 THEN (SELECT cfinancial.financialStatus FROM custdata cfinancial WHERE cfinancial.financialStatus IN($FilterFinstatus) AND cdata.custId = cfinancial.custId) ELSE cdata.financialStatus END) AND (cdata.youOwn = CASE WHEN $FilterOwnLength > 0 THEN (SELECT cOwn.youOwn FROM custdata cOwn WHERE cOwn.youOwn IN($FilterOwn) AND cdata.custId = cOwn.custId) ELSE cdata.youOwn END) AND (cdata.caste = CASE WHEN $FilterCasteLength > 0 THEN (SELECT ccaste.casId FROM caste ccaste WHERE ccaste.casId IN($FilterCaste) AND cdata.caste = ccaste.casId) ELSE cdata.caste END) AND (cdata.educationCat = CASE WHEN $FilterEducationCategoryLength > 0 THEN (SELECT cedcat.edcatId FROM educationcategory cedcat WHERE cedcat.edcatId IN($FilterEducationCategory) AND cdata.educationCat = cedcat.edcatId) ELSE cdata.educationCat END) AND (cdata.educationType = CASE WHEN $FilterEduTypeLength > 0 THEN (SELECT cedtype.edTyId FROM educationtype cedtype WHERE cedtype.edTyId IN($FilterEduType) AND cdata.educationType = cedtype.edTyId) ELSE cdata.educationType END) AND (cdata.jobCat = CASE WHEN $FilterJobcategoryLength > 0 THEN (SELECT cjobcat.jbcatId FROM jobcategory cjobcat WHERE cjobcat.jbcatId IN($FilterJobcategory) AND cdata.jobCat = cjobcat.jbcatId) ELSE cdata.jobCat END) AND (cdata.jobType = CASE WHEN $FilterJobTypeLength > 0 THEN (SELECT cjobtype.jbTyId FROM jobtype cjobtype WHERE cjobtype.jbTyId IN($FilterJobType) AND cdata.jobType = cjobtype.jbTyId) ELSE cdata.jobType END) AND (cdata.district = CASE WHEN $FilterDistrictLength > 0 THEN (SELECT cdistrict.dId FROM district cdistrict WHERE cdistrict.dId IN($FilterDistrict) AND cdata.district = cdistrict.dId) ELSE cdata.district END) AND (cdata.jobLocCountry = CASE WHEN $FilterCountryLength > 0 THEN (SELECT ccountry.cId FROM country ccountry WHERE ccountry.cId IN($FilterCountry) AND cdata.jobLocCountry = ccountry.cId) ELSE cdata.jobLocCountry END) AND (cdata.jobLocState = CASE WHEN $FilterStateLength > 0 THEN (SELECT cstate.sId FROM state cstate WHERE cstate.sId IN($FilterState) AND cdata.jobLocState = cstate.sId) ELSE cdata.jobLocState END) AND (cdata.religion = CASE WHEN $FilterReligionLength > 0 THEN (SELECT rreli.rId FROM religion rreli WHERE rreli.rId IN($FilterReligion) AND cdata.religion = rreli.rId) ELSE cdata.religion END) AND (cdata.star = CASE WHEN $FilterStarLength > 0 THEN (SELECT cstar.starId FROM star cstar WHERE cstar.starId IN($MatchingStarString) AND cdata.star = cstar.starId) ELSE cdata.star END) AND (cdata.profileId = CASE WHEN '$FilterMemberCanID' <> '' THEN '$FilterMemberCanID'  ELSE cdata.profileId END) AND ( cdata.registeredNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.registeredNumber END ) OR cdata.whatsappNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.whatsappNumber END ) OR cdata.residencePhoneNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.residencePhoneNumber END )) AND assignedTo = $Assigned AND cdata.feedback = $FeedbackStatus ".$BranchQuery." ".$AgencyQuery." AND approvalStatus = '$FilterProfileStatus'";
            } else {



                $query = "SELECT cdata.*,P.packageName,DT.typeAbbreviation,R.religionName,C.casteName,SUBCST.subcasteName,FD.feedback,EDCAT.educationCategory,EDTY.educationType,JBCAT.jobCategory,JBTY.jobType,JBCOUNTRY.countryName AS jobCountry,JBDISTRICT.districtName AS jobDistrict,JBCITY.cityName AS jobCity,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,FATEDU.educationCategory AS fatherEducation,FATJOB.jobType AS fatherJob,MOTEDU.educationCategory AS motherEducation,MOTJOB.jobType AS motherJob,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,STAR.starName AS STARNAME,FEED.feedback AS FEEDBACK  FROM $QueryTableName cdata LEFT JOIN religion R ON cdata.religion = R.rId LEFT JOIN caste C ON cdata.caste = C.casId LEFT JOIN subcaste SUBCST ON cdata.subCaste = SUBCST.scId LEFT JOIN feedback FD ON cdata.status = FD.fdId LEFT JOIN educationcategory EDCAT ON cdata.educationCat = EDCAT.edcatId LEFT JOIN educationtype EDTY ON cdata.educationType = EDTY.edTyId LEFT JOIN jobcategory JBCAT ON cdata.jobCat = JBCAT.jbcatId LEFT JOIN jobtype JBTY ON cdata.jobType = JBTY.jbTyId LEFT JOIN country JBCOUNTRY ON cdata.jobLocCountry = JBCOUNTRY.cId LEFT JOIN district JBDISTRICT ON cdata.jobLocDistrict = JBDISTRICT.dId LEFT JOIN city JBCITY ON cdata.jobLocCity = JBCITY.citId LEFT JOIN country CNTRY ON cdata.country = CNTRY.cId LEFT JOIN state STATE ON cdata.state = STATE.sId LEFT JOIN district DSTRCT ON cdata.district = DSTRCT.dId LEFT JOIN city CITY ON cdata.city = CITY.citId LEFT JOIN educationcategory FATEDU ON cdata.fatherEducation = FATEDU.edcatId LEFT JOIN jobtype FATJOB ON cdata.fatherJob = FATJOB.jbTyId LEFT JOIN educationcategory MOTEDU ON cdata.motherEducation = MOTEDU.edcatId LEFT JOIN jobtype MOTJOB ON cdata.motherJob = MOTJOB.jbTyId LEFT JOIN star STAR ON cdata.star = STAR.starId LEFT JOIN feedback FEED ON cdata.feedback = FEED.fdId LEFT JOIN package P ON cdata.package = P.id LEFT JOIN types DT ON cdata.dataType = DT.id WHERE custId <> '' AND $AgeFrom <= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND $AgeTo >= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND ( substring(height, 12,15) BETWEEN $HeightFrom AND $HeightTo) AND ( cdata.gender = CASE WHEN '$FilterGender' <> '' THEN '$FilterGender' ELSE cdata.gender END) AND (cdata.maritalStatus = CASE WHEN $FilterMaritalStatusLength > 0 THEN ((SELECT cmarital.maritalStatus FROM custdata cmarital WHERE cmarital.maritalStatus IN($FilterMaritalStatus) AND cdata.custId = cmarital.custId )) ELSE cdata.maritalStatus END) AND (cdata.monthlyIncome = CASE WHEN $FilterIncomeLength > 0 THEN ((SELECT cmonthly.monthlyIncome FROM custdata cmonthly WHERE cmonthly.monthlyIncome IN($FilterIncome) AND cdata.custId = cmonthly.custId )) ELSE cdata.monthlyIncome END) AND (cdata.physicalStatus = CASE WHEN $FilterPhyscialStatusLength > 0 THEN ((SELECT cphysical.physicalStatus FROM custdata cphysical WHERE cphysical.physicalStatus IN($FilterPhyscialStatus) AND cdata.custId = cphysical.custId )) ELSE cdata.physicalStatus END) AND (cdata.complexion = CASE WHEN $FilterComplexionLength > 0 THEN (SELECT ccomplexion.complexion FROM custdata ccomplexion WHERE ccomplexion.complexion IN($FilterComplexion) AND cdata.custId = ccomplexion.custId) ELSE cdata.complexion END) AND (cdata.bodyType = CASE WHEN $FilterBodyTypeLength > 0 THEN (SELECT cbody.bodyType FROM custdata cbody WHERE cbody.bodyType IN($FilterBodyType) AND cdata.custId = cbody.custId) ELSE cdata.bodyType END) AND (cdata.jathakamType = CASE WHEN $FilterJathakamLength > 0 THEN (SELECT cjathakam.jathakamType FROM custdata cjathakam WHERE cjathakam.jathakamType IN($FilterJathakam) AND cdata.custId = cjathakam.custId) ELSE cdata.jathakamType END) AND (cdata.noofChild = CASE WHEN $FilterChildLength > 0 THEN (SELECT cchild.noofChild FROM custdata cchild WHERE cchild.noofChild IN($FilterChild) AND cdata.custId = cchild.custId) ELSE cdata.noofChild END) AND (cdata.financialStatus = CASE WHEN $FilterFinstatusLength > 0 THEN (SELECT cfinancial.financialStatus FROM custdata cfinancial WHERE cfinancial.financialStatus IN($FilterFinstatus) AND cdata.custId = cfinancial.custId) ELSE cdata.financialStatus END) AND (cdata.youOwn = CASE WHEN $FilterOwnLength > 0 THEN (SELECT cOwn.youOwn FROM custdata cOwn WHERE cOwn.youOwn IN($FilterOwn) AND cdata.custId = cOwn.custId) ELSE cdata.youOwn END) AND (cdata.caste = CASE WHEN $FilterCasteLength > 0 THEN (SELECT ccaste.casId FROM caste ccaste WHERE ccaste.casId IN($FilterCaste) AND cdata.caste = ccaste.casId) ELSE cdata.caste END) AND (cdata.educationCat = CASE WHEN $FilterEducationCategoryLength > 0 THEN (SELECT cedcat.edcatId FROM educationcategory cedcat WHERE cedcat.edcatId IN($FilterEducationCategory) AND cdata.educationCat = cedcat.edcatId) ELSE cdata.educationCat END) AND (cdata.educationType = CASE WHEN $FilterEduTypeLength > 0 THEN (SELECT cedtype.edTyId FROM educationtype cedtype WHERE cedtype.edTyId IN($FilterEduType) AND cdata.educationType = cedtype.edTyId) ELSE cdata.educationType END) AND (cdata.jobCat = CASE WHEN $FilterJobcategoryLength > 0 THEN (SELECT cjobcat.jbcatId FROM jobcategory cjobcat WHERE cjobcat.jbcatId IN($FilterJobcategory) AND cdata.jobCat = cjobcat.jbcatId) ELSE cdata.jobCat END) AND (cdata.jobType = CASE WHEN $FilterJobTypeLength > 0 THEN (SELECT cjobtype.jbTyId FROM jobtype cjobtype WHERE cjobtype.jbTyId IN($FilterJobType) AND cdata.jobType = cjobtype.jbTyId) ELSE cdata.jobType END) AND (cdata.district = CASE WHEN $FilterDistrictLength > 0 THEN (SELECT cdistrict.dId FROM district cdistrict WHERE cdistrict.dId IN($FilterDistrict) AND cdata.district = cdistrict.dId) ELSE cdata.district END) AND (cdata.jobLocCountry = CASE WHEN $FilterCountryLength > 0 THEN (SELECT ccountry.cId FROM country ccountry WHERE ccountry.cId IN($FilterCountry) AND cdata.jobLocCountry = ccountry.cId) ELSE cdata.jobLocCountry END) AND (cdata.jobLocState = CASE WHEN $FilterStateLength > 0 THEN (SELECT cstate.sId FROM state cstate WHERE cstate.sId IN($FilterState) AND cdata.jobLocState = cstate.sId) ELSE cdata.jobLocState END) AND (cdata.religion = CASE WHEN $FilterReligionLength > 0 THEN (SELECT rreli.rId FROM religion rreli WHERE rreli.rId IN($FilterReligion) AND cdata.religion = rreli.rId) ELSE cdata.religion END) AND (cdata.star = CASE WHEN $FilterStarLength > 0 THEN (SELECT cstar.starId FROM star cstar WHERE cstar.starId IN($MatchingStarString) AND cdata.star = cstar.starId) ELSE cdata.star END) AND (cdata.profileId = CASE WHEN '$FilterMemberCanID' <> '' THEN '$FilterMemberCanID'  ELSE cdata.profileId END) AND ( cdata.registeredNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.registeredNumber END ) OR cdata.whatsappNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.whatsappNumber END ) OR cdata.residencePhoneNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.residencePhoneNumber END )) AND assignedTo = $Assigned AND cdata.feedback = $FeedbackStatus ".$BranchQuery." ".$AgencyQuery." AND approvalStatus = '$FilterProfileStatus'";
            }

            

            $query .= $QueryAdditionFromDuplicate;


            // Filter by package and type
            if($DataValue == 'BD' || $DataValue == 'LD'){
                if($FilterType != 0){
                    $query .= " AND bulkType = $FilterType";
                }
            }else{
                if($FilterType != 0){
                    $query .= " AND dataType = $FilterType";
                }
                if($FilterPackage != 0){
                    $query .= " AND package = $FilterPackage";
                }
            }


            // Order by latest of added and updated date
            if($DataValue == 'BD'){
                //$query .= " ORDER BY GREATEST(COALESCE(B.updatedDate, '0000-00-00'), COALESCE(B.createdDate, '0000-00-00')) DESC";
                $query .= " ORDER BY COALESCE(B.createdDate, '0000-00-00') DESC";
            }elseif($DataValue == 'LD'){
                //$query .= " ORDER BY GREATEST(COALESCE(L.updatedDate, '0000-00-00'), COALESCE(L.createdDate, '0000-00-00')) DESC";
                $query .= " ORDER BY COALESCE(L.createdDate, '0000-00-00') DESC";
            }else{
                //$query .= " ORDER BY GREATEST(COALESCE(cdata.updatedDate, '0000-00-00'), COALESCE(cdata.createdDate, '0000-00-00')) DESC";
                $query .= " ORDER BY COALESCE(cdata.createdDate, '0000-00-00') DESC";
            }

          

            //echo $query;

            //Get Total Number of Results
            $TotalResult = mysqli_num_rows(mysqli_query($con, $query));

            //Get Number of pages according to page length
            $TotalPages = ceil($TotalResult / $PageLength);

            $Offset = ($PageNumber - 1) * $PageLength;

            $query = $query . ' LIMIT ' . $Offset . ', ' . $PageLength;



            //echo $query;


            $LimitedRows  = mysqli_num_rows(mysqli_query($con, $query));
            $GetAllDataQuery = mysqli_query($con, $query);


            //Show Bulkdata
            if ($DataValue == 'BD' || $DataValue == 'LD') {
                ?>
                <div class="row bulkdatasection">
                    <div class="col-xl-10 col-lg-10 col-12">
                        <div class="bulkDataHead mt-3 p-0 text-center">
                            <?php
                                $FindFeedbackName = mysqli_query($con, "SELECT feedback FROM  feedback WHERE fdId = $FeedbackStatus ");
                                if (mysqli_num_rows($FindFeedbackName) > 0) {
                                    foreach ($FindFeedbackName as $FindFeedbackNameResult) {
                                        $BulkFeedbackName = $FindFeedbackNameResult['feedback'];
                                    }
                                } else {
                                    $BulkFeedbackName = '';
                                }
                                if($DataValue == 'BD'){
                                    $BulkDataHeading = 'BULKDATA';
                                    $ButtonType = 'BULK';
                                }else{
                                    $BulkDataHeading = 'LEADDATA';
                                    $ButtonType = 'LEAD';
                                }
                            ?>
                            <h5 class="m-0 p-0 text-white"><?= ($BulkFeedbackName != '') ? $BulkFeedbackName : $BulkDataHeading;  ?> &nbsp; - &nbsp; <?= $LimitedRows ?></h5>
                        </div>
                        <div class="table-responsive mt-4 d-none d-md-flex">
                            <table class="table table-bordered bulkDataBorder">
                                <thead class="bg-info">
                                    <tr class="text-center">
                                        <td scope="col" class="bulklTableText">  <input class="form-check-input bulkDataSelectAll" type="checkbox" > </td>
                                        <td scope="col" class="bulklTableText">Sl No</td>
                                        <td scope="col" class="bulklTableText">Data ID</td>
                                        <td scope="col" class="bulklTableText">Type</td>
                                        <td scope="col" class="bulklTableText"></td>
                                        <td scope="col" class="bulklTableText">Mobile</td>
                                        <td scope="col" class="bulklTableText"></td>
                                        <td scope="col" class="bulklTableText" colspan="2">Name</td>
                                        <td scope="col" class="bulklTableText">Remark</td>
                                        <td scope="col" class="bulklTableText"></td>
                                        <td scope="col" class="bulklTableText">Ref. Mobile</td>
                                        <td scope="col" class="bulklTableText"></td>
                                        <td scope="col" class="bulklTableText">Ref. Name</td>
                                        <td scope="col" class="bulklTableText bg-white">
                                            <button class="linkBtn" data-clipboard-text="http://localhost/ADMINMATRIMONY/ADMIN/Lapview.php">LINK</button>
                                            <a href="" data-datatype="<?= $DataValue ?>" data-buttontype="<?= $ButtonType ?>" class="SendWhatsappLinkButton"><img src="../IMAGES/whatsappImg.png" alt="" class="lapviewImg"></a>
                                        </td>
                                    </tr>
                                </thead>
                                    <?php  
                                    if($DataValue == 'BD'){
                                        ?>
                                        <tbody>
                                            <?php
                                                $RowCount = 0;
                                            foreach ($GetAllDataQuery as $GetAllDataResults) {
                                                $RowCount ++;
                                            ?>
                                                <tr class="text-center">
                                                    <td class="py-2 px-0"><input class="form-check-input bulkDataSelect MainSelector" data-datatype="<?= $DataValue ?>" type="checkbox" id="BULK-<?php echo $GetAllDataResults["bulkId"] ?>" value="<?php echo $GetAllDataResults["bulkId"] ?>"></td>
                                                    <td class="py-2 px-0"><?= $RowCount ?></td>
                                                    <td class="py-2 px-0"><?= str_pad($GetAllDataResults['bulkId'], 5, '0', STR_PAD_LEFT);  ?></td>
                                                    <!-- Add prefix zeros to id and make it 5 digits -->
                                                    <td class="py-2 px-0"><?= $GetAllDataResults['typeName'] ?></td>
                                                    <td class="py-2 px-0"><input type="checkbox" class="form-check-input bulkCheckbox BulkPhoneCheckbox" value="<?= $GetAllDataResults['bulkPhone'] ?>" > </td>
                                                    <!-- <td class="py-2 px-0"> <?= $GetAllDataResults['bulkPhone'] ?></td> -->
                                                    <td class="py-2 px-2"> <input data-id="<?= $GetAllDataResults['bulkId'] ?>" id="BULKMOBILENUMBER-<?= $GetAllDataResults['bulkId'] ?>" type="number" class="bulkTextField BulkDataMobileNumber form-control " name="BulkDataMobileNumber" value="<?= $GetAllDataResults['bulkPhone'] ?>"></td>
                                                    <td class="py-2 px-0"><a href="tel:+91<?= $GetAllDataResults['bulkPhone'] ?>"><i class="ri-phone-fill callIcon"></i></a> <a href="" data-clipboard-text="<?= $GetAllDataResults['bulkPhone'] ?>" class="bulkCopy"><i class="ri-clipboard-fill callIcon"></i></a></td>
                                                    <td class="py-2 px-2" colspan="2"> <input data-id="<?= $GetAllDataResults['bulkId'] ?>" id="BULKNAME-<?= $GetAllDataResults['bulkId'] ?>" type="text" class="bulkTextField BulkDataName form-control " name="BulkDataName" value="<?= $GetAllDataResults['bulkName'] ?>"> </td>
                                                    <td class="py-2 px-2"><input data-id="<?= $GetAllDataResults['bulkId'] ?>" id="BULKREMARK-<?= $GetAllDataResults['bulkId'] ?>" type="text" class="bulkTextField BulkDataRemark form-control " name="BulkDataRemark" value="<?= $GetAllDataResults['bulkRemark'] ?>"></td>
                                                    <td class="py-2 px-0"> <input type="checkbox" class="form-check-input bulkCheckbox ReferPhoneCheckbox" value="<?= $GetAllDataResults['referPhone'] ?>"> </td>
                                                    <td class="py-2 px-2"> <input data-id="<?= $GetAllDataResults['bulkId'] ?>" id="BULKREFERNUMBER-<?= $GetAllDataResults['bulkId'] ?>" type="number" class="bulkTextField BulkDataReferNumber form-control " name="BulkDataReferNumber" value="<?= $GetAllDataResults['referPhone'] ?>"></td>
                                                    <td class="py-2 px-0"><a href="tel:+91<?= $GetAllDataResults['referPhone'] ?>"><i class="ri-phone-fill callIcon"></i></a>   <a href="" data-clipboard-text="<?= $GetAllDataResults['referPhone'] ?>"  class="referCopy"><i class="ri-clipboard-fill callIcon"></i></a></td>
                                                    <td class="py-2 px-2"><input data-id="<?= $GetAllDataResults['bulkId'] ?>" id="BULKREFERNAME-<?= $GetAllDataResults['bulkId'] ?>" type="text" min="0" class="bulkTextField BulkDataReferName form-control " name="BulkDataReferName" value="<?= $GetAllDataResults['referName'] ?>"></td>
                                                    <td class="py-2 px-0"> <a href="" data-datatype="<?= $DataValue ?>" data-buttontype="SINGLE" class="SendWhatsappLinkButton"><img src="../IMAGES/whatsappImg.png" alt="" class="lapviewImg"></a></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                        <?php
                                    }else{
                                        ?>
                                            <tbody>
                                                <?php
                                                $RowCount = 0;
                                                foreach ($GetAllDataQuery as $GetAllDataResults) {
                                                    $RowCount ++;
                                                ?>
                                                    <tr class="text-center">
                                                        <td class="py-2 px-0"><input class="form-check-input leadDataSelect MainSelector" data-datatype="<?= $DataValue ?>" type="checkbox" id="LEAD-<?php echo $GetAllDataResults["bulkId"] ?>" value="<?php echo $GetAllDataResults["bulkId"] ?>"></td>
                                                        <td class="py-2 px-0"><?= $RowCount ?></td>
                                                        <td class="py-2 px-0"><?= str_pad($GetAllDataResults['bulkId'], 5, '0', STR_PAD_LEFT);  ?></td>
                                                        <!-- Add prefix zeros to id and make it 5 digits -->
                                                        <td class="py-2 px-0"><?= $GetAllDataResults['typeName'] ?></td>
                                                        <td class="py-2 px-0"><input type="checkbox" class="form-check-input leadCheckbox BulkPhoneCheckbox" value="<?= $GetAllDataResults['bulkPhone'] ?>" > </td>
                                                        <td class="py-2 px-0"> <?= $GetAllDataResults['bulkPhone'] ?></td>
                                                        <td class="py-2 px-0"><a href="tel:+91<?= $GetAllDataResults['bulkPhone'] ?>"><i class="ri-phone-fill callIcon"></i></a> <a href="" data-clipboard-text="<?= $GetAllDataResults['bulkPhone'] ?>" class="bulkCopy"><i class="ri-clipboard-fill callIcon"></i></a></td>
                                                        <td class="py-2 px-2" colspan="2"> <input data-id="<?= $GetAllDataResults['bulkId'] ?>" id="LEADNAME-<?= $GetAllDataResults['bulkId'] ?>" type="text" class="bulkTextField LeadDataName form-control " name="LeadDataName" value="<?= $GetAllDataResults['bulkName'] ?>"> </td>
                                                        <td class="py-2 px-2"><input data-id="<?= $GetAllDataResults['bulkId'] ?>" id="LEADREMARK-<?= $GetAllDataResults['bulkId'] ?>" type="text" class="bulkTextField LeadDataRemark form-control " name="LeadDataRemark" value="<?= $GetAllDataResults['bulkRemark'] ?>"></td>
                                                        <td class="py-2 px-0"> <input type="checkbox" class="form-check-input bulkCheckbox ReferPhoneCheckbox" value="<?= $GetAllDataResults['referPhone'] ?>"> </td>
                                                        <td class="py-2 px-2"> <input data-id="<?= $GetAllDataResults['bulkId'] ?>" id="LEADREFERNUMBER-<?= $GetAllDataResults['bulkId'] ?>" type="number" class="bulkTextField LeadDataReferNumber form-control " name="LeadDataReferNumber" value="<?= $GetAllDataResults['referPhone'] ?>"></td>
                                                        <td class="py-2 px-0"><a href="tel:+91<?= $GetAllDataResults['referPhone'] ?>"><i class="ri-phone-fill callIcon"></i></a> <a href="" data-clipboard-text="<?= $GetAllDataResults['referPhone'] ?>"  class="referCopy"><i class="ri-clipboard-fill callIcon"></i></a></td>
                                                        <td class="py-2 px-2"><input data-id="<?= $GetAllDataResults['bulkId'] ?>" id="LEADREFERNAME-<?= $GetAllDataResults['bulkId'] ?>" type="text" min="0" class="bulkTextField LeadDataReferName form-control " name="LeadDataReferName" value="<?= $GetAllDataResults['referName'] ?>"></td>
                                                        <td class="py-2 px-0"> <a href="https://wa.me/91<?= $GetAllDataResults['bulkPhone'] ?>" target="_blank" class=""><img src="../IMAGES/whatsappImg.png" alt="" class="lapviewImg"></a></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        <?php
                                    }

                                   
                                    ?>
                            </table>
                        </div>

                        <!-- Table Mobile View -->
                        <div class="table-responsive mt-4 mx-xl-4 d-md-none">
                            <table class="table table-borderless">
                                <thead class="bg-info d-none">
                                    <tr class="text-center">
                                        <td scope="col" class="bulklTableText">Sl No</td>
                                        <td scope="col" class="bulklTableText">Mobile</td>
                                        <td scope="col" class="bulklTableText"><i class="ri-phone-fill callIcon"></i></td>
                                        <td scope="col" class="bulklTableText">Name</td>
                                        <td scope="col" class="bulklTableText">Ref. Mobile</td>
                                        <td scope="col" class="bulklTableText"><i class="ri-phone-fill callIcon"></i></td>
                                        <td scope="col" class="bulklTableText">Ref. Name</td>
                                        <td scope="col" class="bulklTableText">Feed Back</td>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    <?php
                                    foreach ($GetAllDataQuery as $GetAllDataResults) {

                                    ?>
                                        <tr>
                                            <td class="pt-2 fs-5"><?= $GetAllDataResults['bulkId'] ?></td>
                                            <td></td>
                                            <td class="py-2 px-2" colspan="2"><input type="text" class="form-control" style="font-size:10pt" placeholder="Feed Back"></td>
                                            <td></td>
                                            <td class="pt-2 px-2"><button class="bulkFeedBack px-2">FB</button></td>
                                            <!-- <td class="pt-2"><i class="ri-menu-line bulkMenu"></i></td> -->
                                        </tr>

                                        <tr>
                                            <td class="py-2"><input type="checkbox" class="form-check-input bulkCheckbox fs-4"></td>
                                            <td class="py-2 px-2"><a href="tel:+91<?= $GetAllDataResults['registeredNumber'] ?>"><i class="ri-phone-fill callIcon fs-5"></i></a></td>
                                            <td class="py-2 fs-5" colspan="2"><?= $GetAllDataResults['bulkPhone'] ?><br><?= $GetAllDataResults['bulkName'] ?></td>
                                            <td class="py-2 fs-5 d-flex"></td>
                                            <td class="py-1 px-2"><button class="linkBtn bulkLinkBtn mt-1">LINK</button></td>
                                        </tr>

                                        <tr class="tableDataBorder">
                                            <td class="py-2"><input type="checkbox" class="form-check-input bulkCheckbox fs-4"></td>
                                            <td class="py-2 px-2"><a href="tel:+91<?= $GetAllDataResults['registeredNumber'] ?>"><i class="ri-phone-fill callIcon fs-5"></i></a></td>
                                            <td class="py-2 fs-5" colspan="2"><?= $GetAllDataResults['bulkPhone'] ?><br> <?= $GetAllDataResults['bulkName'] ?></td>
                                            <td class="py-2 fs-5"></td>
                                            <td class="py-1 px-2"><a href="https://wa.me/91<?= $GetAllDataResults['whatsappNumber'] ?>" target="_blank" class=""><img src="../IMAGES/whatsappImg.png" alt="" class="lapviewImg" style="width:37px; height:37px;"></a></td>
                                        </tr>

                                    <?php

                                    }

                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-12 d-none d-md-block">
                        <?php   
                            if($DataValue == 'BD'){
                                ?>
                                    <form id="BulkFeedbackForm" class="FeedbackSection mb-3">
                                        <div class="mt-3">
                                            <button type="button" class="form-control text-white bulkBlueBtn fs-5 mb-4">FEED BACK</button>
                                            <?php


                                            $GetBulkFeedbacks = mysqli_query($con, "SELECT * FROM feedback WHERE feedbackData = 'Bulk Data'");
                                            foreach ($GetBulkFeedbacks as $GetBulkFeedbacksResult) {
                                            ?>
                                                <div class="col-12 form-group mb-1">
                                                    <input type="radio" name="BulkFeedBack" class="FeedbackCheckboxClass" value="<?= $GetBulkFeedbacksResult['fdId'] ?>" id="FeedbackId<?= $GetBulkFeedbacksResult['fdId']  ?>">
                                                    <label class="btnSubmit form-control" style="background-color: <?= ($GetBulkFeedbacksResult['feedbackColor'] != '') ?  $GetBulkFeedbacksResult['feedbackColor'] :  '#ff0185' ?>;" for="FeedbackId<?= $GetBulkFeedbacksResult['fdId'] ?>"> <?= $GetBulkFeedbacksResult['feedback'] ?> </label>
                                                </div>
                                            <?php
                                            }

                                            ?>

                                            <a type="button" href="./FreeRegister.php" class="form-control greenButton bulkGreenBtn fs-5 mb-1 text-center">Free Register</a>

                                            <div class="row mb-1">
                                                <div class="col-xl-4 col-lg-4 col-4">
                                                    <select class="form-control bulkdropDn px-2 py-0 BulkDaySelect" name="BulkFeedbackDay" aria-label="Default select example">
                                                        <?php
                                                        for ($Day = 01; $Day <= 31; $Day++) {
                                                            echo  '<option value="' . $Day . '">' . $Day . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-4">
                                                    <select class="form-control bulkdropDn px-2 py-0 BulkMonthSelect" name="BulkFeedbackMonth" aria-label="Default select example">
                                                        <?php
                                                        for ($Month = 01; $Month <= 12; $Month++) {
                                                            echo  '<option value="' . $Month . '">' . $Month . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-4 ">
                                                    <select class="form-control bulkdropDn px-1 py-0 BulkYearSelect" name="BulkFeedbackYear" aria-label="Default select example">
                                                        <?php
                                                        for ($Year = date("Y") ; $Year <= date('Y', strtotime('+10 years')); $Year++) {
                                                            echo  '<option value="' . $Year . '">' . $Year . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-1">
                                                <div class="col-xl-4 col-lg-4 col-4">
                                                    <select class="form-control bulkdropDn px-2 py-0 BulkHourSelect" name="BulkFeedbackHour" aria-label="Default select example">
                                                        <?php
                                                        for ($Hour = 01; $Hour <= 12; $Hour++) {
                                                            echo  '<option value="' . $Hour . '">' . $Hour . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-4">
                                                    <select class="form-control bulkdropDn px-2 py-0 BulkAMPMSelect" name="BulkFeedbackFormat" aria-label="Default select example">
                                                        <option value="AM">AM</option>
                                                        <option value="PM">PM</option>
                                                    </select>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-4">
                                                    <h6 class="reminder text-white text-center">Reminder</h6>
                                                </div>
                                            </div>
                                            <button type="submit" class="form-control bulkBlueBtn fs-5" id="btn_submit">SUBMIT</button>
                                        </div>
                                    </form>
                                <?php
                            }else{
                                ?>
                                    <form id="LeadFeedbackForm" class="FeedbackSection mb-3">
                                        <div class="mt-3">
                                            <button type="button" class="form-control text-white bulkBlueBtn fs-5 mb-4">FEED BACK</button>
                                            <?php

                                            $GetLeadFeedbacks = mysqli_query($con, "SELECT * FROM feedback WHERE feedbackData = 'Lead Data'");
                                            foreach ($GetLeadFeedbacks as $GetLeadFeedbacksResult) {
                                            ?>
                                                <div class="col-12 form-group mb-1">
                                                    <input type="radio" name="LeadFeedBack" class="FeedbackCheckboxClass" value="<?= $GetLeadFeedbacksResult['fdId'] ?>" id="FeedbackId<?= $GetLeadFeedbacksResult['fdId']  ?>">
                                                    <label class="btnSubmit  form-control" style="background-color: <?= ($GetBulkFeedbacksResult['feedbackColor'] != '') ?  $GetBulkFeedbacksResult['feedbackColor'] :  '#ff0185' ?>;" for="FeedbackId<?= $GetLeadFeedbacksResult['fdId'] ?>"> <?= $GetLeadFeedbacksResult['feedback'] ?> </label>
                                                </div>
                                            <?php
                                            }

                                            ?>

                                            <a type="button" href="./FreeRegister.php" class="form-control greenButton bulkGreenBtn fs-5 mb-1 text-center">Free Register</a>

                                            <div class="row mb-1">
                                                <div class="col-xl-4 col-lg-4 col-4">
                                                    <select class="form-control bulkdropDn px-2 py-0 BulkDaySelect" name="LeadFeedbackDay" aria-label="Default select example">
                                                        <?php
                                                        for ($Day = 01; $Day <= 31; $Day++) {
                                                            echo  '<option value="' . $Day . '">' . $Day . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-4">
                                                    <select class="form-control bulkdropDn px-2 py-0 BulkMonthSelect" name="LeadFeedbackMonth" aria-label="Default select example">
                                                        <?php
                                                        for ($Month = 01; $Month <= 12; $Month++) {
                                                            echo  '<option value="' . $Month . '">' . $Month . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-4 ">
                                                    <select class="form-control bulkdropDn px-1 py-0 BulkYearSelect" name="LeadFeedbackYear" aria-label="Default select example">
                                                        <?php
                                                        for ($Year = date("Y") ; $Year <= date('Y', strtotime('+10 years')); $Year++) {
                                                            echo  '<option value="' . $Year . '">' . $Year . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-xl-4 col-lg-4 col-4">
                                                    <select class="form-control bulkdropDn px-2 py-0 BulkHourSelect" name="LeadFeedbackHour" aria-label="Default select example">
                                                        <?php
                                                        for ($Hour = 01; $Hour <= 12; $Hour++) {
                                                            echo  '<option value="' . $Hour . '">' . $Hour . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-4">
                                                    <select class="form-control bulkdropDn px-2 py-0 BulkAMPMSelect" name="LeadFeedbackFormat" aria-label="Default select example">
                                                        <option value="AM">AM</option>
                                                        <option value="PM">PM</option>
                                                    </select>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-4">
                                                    <h6 class="reminder text-white text-center">Reminder</h6>
                                                </div>
                                            </div>
                                            <button type="submit" class="form-control bulkBlueBtn fs-5 mb-3" id="btn_submit">SUBMIT</button>
                                        </div>
                                    </form>
                                <?php
                            }
                        ?>
                    </div>
                </div>
                <?php
            }



            //Show Free Data
            if ($DataValue == 'FD' || $DataValue == 'PD' || $DataValue == 'MD' || $DataValue == 'WD') {


                if($DataValue == 'PD'){
                    $FeedbackButtonClass = 'PaidFeedbackButton';
                }elseif($DataValue == 'FD'){
                    $FeedbackButtonClass = 'FeedbackButton';
                }elseif($DataValue == 'MD'){
                    $FeedbackButtonClass = 'MarriageFeedbackButton';
                }elseif($DataValue == 'WD'){
                    $FeedbackButtonClass = 'WeddingFeedbackButton';
                }

                foreach ($GetAllDataQuery as $GetAllDataResults) {
                    ?>

                    <!-- Table view -->
                    <div class="lapView table-responsive">

                        <!-- <div class="mt-1">
                                    <img src="../IMAGES/GroomA.jpg" alt="" class="BrideAndGroomImg">
                                </div> -->
                        <table class="table table-bordered bg-white tableSize tableBorder">
                            <tbody>
                                <tr>

                                    <td rowspan="5" class="ps-0">
                                        <div class="d-flex ViewCustomerImages" data-profileid="<?= $GetAllDataResults["custId"] ?>" data-datatype="<?= $DataValue ?>">
                                            <?php
                                            if ($GetAllDataResults['gender'] == 'Male') {
                                            ?>
                                               
                                                <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["mainImage"] ?>" type="image/jpeg" class="BrideAndGroomImg mx-auto"><img src="../IMAGES/boy.png" class="BrideAndGroomImg mx-auto" /></object>
                                                <?= ($GetAllDataResults["verified"] == 'Y') ? "<i class='material-icons VerifiedIcon'> verified </i>" : "" ?>
                                               
                                            <?php
                                            } else {
                                            ?>
                                               
                                                <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["mainImage"] ?>" type="image/jpeg" class="BrideAndGroomImg mx-auto"><img src="../IMAGES/girl.png" class="BrideAndGroomImg mx-auto" /> </object>
                                                <?= ($GetAllDataResults["verified"] == 'Y') ? "<i class='material-icons VerifiedIcon'> verified </i>" : "" ?>
                                                
                                            <?php
                                            }
                                            ?>
                                        </div>


                                    </td>
                                    <td class="tableHead tableHeadBg1 headSize2 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">
                                        <div class="d-flex justify-content-between"> <a class="ViewCompanyId" data-type="<?= $DataValue ?>" href="" data-custvalue="<?= $GetAllDataResults['custId'] ?>"> <?= $GetAllDataResults['profileId'] ?> </a>
                                            <input class="form-check-input me-2 FreeDataSelect MainSelector" data-datatype="<?= $DataValue ?>" type="checkbox" id="<?= $GetAllDataResults['custId'] ?>" value="<?= $GetAllDataResults['custId'] ?>">
                                        </div>
                                    </td>

                                    <td class="tableHead tableHeadBg1 profileIdSize <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>"> <a href="FreeRegisterEdit.php?ProfileEditId=<?= $GetAllDataResults['custId'] ?>&DataType=<?= $DataValue ?>"> <?= $GetAllDataResults['fullName'] ?> </a> </td>
                                    <td class="tableHead tableHeadBg1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>"><a href="FreeRegisterEdit.php?ProfileEditId=<?= $GetAllDataResults['custId'] ?>&DataType=<?= $DataValue ?>"> Religion </a> </td>
                                    <td class="tableHead tableHeadBg1 headSize1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>"><a href="FreeRegisterEdit.php?ProfileEditId=<?= $GetAllDataResults['custId'] ?>&DataType=<?= $DataValue ?>"> Profession </a> </td>
                                    <td class="tableHead tableHeadBg1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>"><a href="FreeRegisterEdit.php?ProfileEditId=<?= $GetAllDataResults['custId'] ?>&DataType=<?= $DataValue ?>"> Family </a> </td>
                                    <td class="tableHead tableHeadBg1 headSize1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>"><a href="FreeRegisterEdit.php?ProfileEditId=<?= $GetAllDataResults['custId'] ?>&DataType=<?= $DataValue ?>"> Address </a> </td>
                                    <td class="tableHead tableHead2 headSize3 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>"><a href="FreeRegisterEdit.php?ProfileEditId=<?= $GetAllDataResults['custId'] ?>&DataType=<?= $DataValue ?>"> Preference </a> </td>
                                    <td class="tableHead tableHead2 headBorder headSize3 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>"><a href="FreeRegisterEdit.php?ProfileEditId=<?= $GetAllDataResults['custId'] ?>&DataType=<?= $DataValue ?>"> Looking </a> </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="heightAdjust d-flex justify-content-between">
                                            <span>
                                                <?= $GetAllDataResults['profileFor'] ?> 
                                            </span>
                                            <span class="me-2">
                                                <?= $GetAllDataResults['typeAbbreviation'] ?>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust">
                                            <?php if ($GetAllDataResults['dob'] != '01-Jan-1800') {
                                                //echo (date('Y') - date('Y', strtotime($GetAllDataResults['dob'])));
                                                $diff = date_diff(date_create($GetAllDataResults['dob']), date_create($Today));
                                                echo $diff->format('%y') . 'Yr ' . $diff->format('%m') . 'Mon';
                                            } else {
                                            }  ?>

                                        </div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust"><?= $GetAllDataResults['religionName'] ?></div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust"><?= $GetAllDataResults['educationCategory'] ?></div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust">Bro - <?= $GetAllDataResults['marriedBro'] ?> &nbsp; &nbsp; &nbsp;<?= $GetAllDataResults['unmarriedBro'] ?></div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust"><?= $GetAllDataResults['country'] ?></div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust"> 
                                            <?php  
                                                if($GetAllDataResults['partnerAgeFrom'] != 0 || $GetAllDataResults['partnerAgeTo'] != 0){
                                                    echo $GetAllDataResults['partnerAgeFrom']  .' - '. $GetAllDataResults['partnerAgeTo'];
                                                }else{
                                                }
                                            ?>                                            
                                        <!-- <?= $GetAllDataResults['partnerAgeFrom'] ?> - <?= $GetAllDataResults['partnerAgeTo'] ?> -->
                                    </div>
                                    </td>
                                    <td><?php $EducationCat = $GetAllDataResults['partnerEduCat'];  ?>
                                        <div class="heightAdjust"><?=  IdToNameConversion($EducationCat,"educationcategory","edcatId","educationCategory",$con); ?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="heightAdjust">   <?= $GetAllDataResults['packageName'] ?>   </div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust"><?= $GetAllDataResults['height'] ?></div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust"><?= $GetAllDataResults['casteName'] ?></div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust"><?= $GetAllDataResults['educationType'] ?></div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust">Sis - <?= $GetAllDataResults['marriedSis'] ?> &nbsp; &nbsp; &nbsp;<?= $GetAllDataResults['unmarriedSis'] ?></div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust"><?= $GetAllDataResults['state'] ?></div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust">
                                            <?php  
                                                if($GetAllDataResults['partnerHeightFrom'] != '  ' || $GetAllDataResults['partnerHeightTo'] != '  '){
                                                    echo substr($GetAllDataResults['partnerHeightFrom'],12,15) ?> - <?= substr($GetAllDataResults['partnerHeightTo'],12,15);
                                                }else{
                                                }
                                            ?>    
                                        <!-- <?= substr($GetAllDataResults['partnerHeightFrom'],12,15) ?> - <?= substr($GetAllDataResults['partnerHeightTo'],12,15) ?> -->
                                    </div>
                                    </td>
                                    <td><?php $EducationType = $GetAllDataResults['partnerEduType'];  ?>
                                        <div class="heightAdjust"><?=  IdToNameConversion($EducationType,"educationtype","edTyId","educationType",$con); ?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="heightAdjust"><?= ($GetAllDataResults['feedbackDate'] != '') ? date('d.m.Y/ h A', strtotime($GetAllDataResults['feedbackDate']))  : ""  ?> </div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust"><?= $GetAllDataResults['weight'] ?></div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust"><?= $GetAllDataResults['subcasteName'] ?></div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust"><?= $GetAllDataResults['jobCategory'] ?></div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust"><?= $GetAllDataResults['fatherName'] ?></div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust"><?= $GetAllDataResults['district'] ?></div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust"><?= $GetAllDataResults['partnerPhysicalStatus'] ?></div>
                                    </td>
                                    <td><?php $JobCategory = $GetAllDataResults['partnerJobCat'];  ?>
                                        <div class="heightAdjust"><?=  IdToNameConversion($JobCategory,"jobcategory","jbcatId","jobCategory",$con); ?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><button class="statusBtn ms-4 px-3 mt-1"><?php echo  $GetAllDataResults['FEEDBACK']
                                                                                    ?></button></td>
                                    <td>
                                        <div class="heightAdjust"><?= $GetAllDataResults['complexion'] ?></div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust"><?= $GetAllDataResults['casteNoBar'] ?></div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust"><?= $GetAllDataResults['jobType'] ?></div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust"><?= $GetAllDataResults['motherName'] ?></div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust"><?= $GetAllDataResults['city'] ?></div>
                                    </td>
                                    <td>
                                        <div class="heightAdjust"><?= $GetAllDataResults['partnerComplexion'] ?></div>
                                    </td>
                                    <td><?php $JobType = $GetAllDataResults['partnerJobType'];  ?>
                                        <div class="heightAdjust"><?=  IdToNameConversion($JobType,"jobtype","jbTyId","jobType",$con); ?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mary</td>
                                    <td>Joseph</td>
                                    <td><?= $GetAllDataResults['bodyType'] ?></td>
                                    <td><?= $GetAllDataResults['STARNAME'] ?></td>
                                    <td><?= $GetAllDataResults['jobDetails'] ?></td>
                                    <td><?= $GetAllDataResults['fatherJob'] ?></td>
                                    <td><?= $GetAllDataResults['nativePlace'] ?></td>
                                    <td>
                                        <?php 
                                            $PartnerCaste = $GetAllDataResults['partnerCaste'] ;
                                            echo IdToNameConversion($PartnerCaste,"caste","casId","casteName",$con);
                                        ?>
                                    
                                    </td>
                                    <td>
                                        <?php 
                                            $PartnerJobCountry = $GetAllDataResults['partnerCountry'] ;
                                            echo IdToNameConversion($PartnerJobCountry,"country","cId","countryName",$con);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="mobileNoBg1"><?= $GetAllDataResults['whatsappNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $GetAllDataResults['whatsappNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                                    </td>
                                    <td>
                                        <span class="mobileNoBg2"><?= $GetAllDataResults['residencePhoneNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $GetAllDataResults['residencePhoneNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                                    </td>
                                    <td><?= $GetAllDataResults['maritalStatus'] ?></td>
                                    <td><?= $GetAllDataResults['chovvaDosham'] ?></td>
                                    <td><?= $GetAllDataResults['jobCity'] ?></td>
                                    <td><?= $GetAllDataResults['motherJob'] ?></td>
                                    <td><?= $GetAllDataResults['residentialStatus'] ?></td>
                                    <td>
                                        <?php 
                                            $MatchingStars = $GetAllDataResults['matchingStars'] ;
                                            echo IdToNameConversion($MatchingStars,"star","starId","starName",$con);
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            $PartnerDistrict = $GetAllDataResults['partnerDistrict'] ;
                                            echo IdToNameConversion($PartnerDistrict,"district","dId","districtName",$con);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><?= $GetAllDataResults['feedbackRemark'] ?></td>
                                    <td><?= $GetAllDataResults['physicalStatus'] ?></td>
                                    <td><?= $GetAllDataResults['jathakamType'] ?></td>
                                    <td><?= $GetAllDataResults['monthlyIncome'] ?> INR</td>
                                    <td><?= $GetAllDataResults['financialStatus'] ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="row my-1 mx-1">
                                            <div class="col-9">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <button type="button" id="clearAll" class="btn DeleteProfile filterButtons"><i class="ri-delete-bin-6-line"></i></button>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class=""><button class="linkBtn">LINK</button><br></div>
                                                    </div>
                                                    <div class="col-2">
                                                        <a href="" class=""><img src="../IMAGES/mailImg.png" alt="" class="lapviewImg"></a>
                                                    </div>
                                                    <div class="col-2">
                                                        <a href="mailto:test@gmail.com" class=""><img src="../IMAGES/printerImg.jpg" alt="" class="lapviewImg"></a>
                                                    </div>
                                                    <div class="col-2">
                                                        <a href="https://wa.me/91<?= $GetAllDataResults['whatsappNumber'] ?>" target="_blank" class=""><img src="../IMAGES/whatsappImg.png" alt="" class="lapviewImg"></a>
                                                    </div>
                                                    <div class="col-2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <button type="button" class="form-control btnFeedback <?= $FeedbackButtonClass ?>" id="" value="<?= $GetAllDataResults['custId'] ?>">Feedback</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="3"><?= $GetAllDataResults['lookingFor'] ?></td>
                                    <td colspan="3"><?= $GetAllDataResults['candidateShare'] ?></td>
                                    <td><?= $GetAllDataResults['serviceCharge'] ?></td>

                                </tr>
                            </tbody>
                        </table>

                    </div>



                    <!-- Mobile View -->
                    <div class="bg-white Section mb-3 MobileDisplay">
                        <div class="">
                            <div class="container px-3">
                                <div class="row g-0 ImageBox">
                                    <div class="col-10 ">
                                        <?php
                                        if ($GetAllDataResults['gender'] == 'Male') {
                                        ?>
                                            <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="img-fluid custmobileimg"><img src="../IMAGES/boy.png" class="img-fluid custmobileimg" /></object>
                                        <?php
                                        } else {
                                        ?>
                                            <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="img-fluid custmobileimg"><img src="../IMAGES/girl.png" class=" img-fluid custmobileimg" /></object>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-2 SideMiniMenu">
                                        <ul class="list-unstyled text-center">
                                            <li><button class="linkBtn">LINK</button></li>
                                            <li><a href="" class=""><img src="../IMAGES/mailImg.png" alt="" class="lapviewImg"></a></li>
                                            <li><a href="https://wa.me/91<?= $GetAllDataResults['whatsappNumber'] ?>" target="_blank" class=""><img src="../IMAGES/whatsappImg.png" alt="" class="lapviewImg"></a></li>
                                            <li> <input class="form-check-input" type="checkbox" id="" value=""></li>
                                            <li> <button class="btn m-0 p-0"><i class="ri-menu-fill"></i></button> </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="row g-0 ViewDetailsContainer">

                                    <div class="col-6 ViewDetails">
                                        <p class="me-1 CustomerNameField"> <?= ($GetAllDataResults['fullName'] != '') ? $GetAllDataResults['fullName'] : "&nbsp;";  ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails">
                                        <p class="ms-1 CustomerIdField"> <?= ($GetAllDataResults['profileId'] != '') ? $GetAllDataResults['profileId'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails">
                                        <p class="me-1"> <?= ($GetAllDataResults['religionName'] != '') ? $GetAllDataResults['religionName'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails">
                                        <p class="ms-1"> <?= ($GetAllDataResults['casteName'] != '') ? $GetAllDataResults['casteName'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails">
                                        <p class="me-1"> <?php echo ($GetAllDataResults['dob'] != '') ? (date('Y') - date('Y', strtotime($GetAllDataResults['dob']))) : ""; ?> / <?= $GetAllDataResults['weight'] ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails">
                                        <p class="ms-1"> <?= ($GetAllDataResults['complexion'] != '') ? $GetAllDataResults['complexion'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails">
                                        <p class=" me-1"> <?= (substr($GetAllDataResults['height'], 0, 7) != '') ? substr($GetAllDataResults['height'], 0, 7) : "&nbsp;";  ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails">
                                        <p class="ms-1"> <?= ($GetAllDataResults['maritalStatus'] != '') ? $GetAllDataResults['maritalStatus'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails">
                                        <p class="me-1"> <?= ($GetAllDataResults['nativePlace'] != '') ? $GetAllDataResults['nativePlace'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails">
                                        <p class="ms-1"> <?= ($GetAllDataResults['STARNAME'] != '') ? $GetAllDataResults['STARNAME'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-12 ViewDetails">
                                        <p class=""> <?= ($GetAllDataResults['educationCategory'] != '') ? $GetAllDataResults['educationCategory'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-12 ViewDetails">
                                        <p class=""> <?= ($GetAllDataResults['jobCategory'] != '') ? $GetAllDataResults['jobCategory'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-12 ViewDetails">
                                        <p class="me-1"> <?= ($GetAllDataResults['lookingFor'] != '') ? $GetAllDataResults['lookingFor'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails">
                                        <p class="me-1"> <?= ($GetAllDataResults['registeredNumber'] != '') ? $GetAllDataResults['registeredNumber'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails">
                                        <p class="ms-1"> <?= ($GetAllDataResults['whatsappNumber'] != '') ? $GetAllDataResults['whatsappNumber'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails">
                                        <p class="me-1"> <?= ($GetAllDataResults['contactPerson'] != '') ? $GetAllDataResults['contactPerson'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails">
                                        <p class="ms-1"> <?= ($GetAllDataResults['contactPerson'] != '') ? $GetAllDataResults['contactPerson'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails">
                                        <p class="me-1"> Status </p>
                                    </div>
                                    <div class="col-6 ViewDetails">
                                        <p class="ms-1"> <?= (date('d,m.Y - H A', strtotime($GetAllDataResults['createdDate'])) != '') ? date('d,m.Y - H A', strtotime($GetAllDataResults['createdDate'])) : "&nbsp;"  ?> </p>
                                    </div>
                                    <div class="col-12 ViewDetails">
                                        <p class=""> I will pay tommorrow </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- ScreenShot View -->
                    <div class="mobileView bg-white Section mb-3 lapviewMobileBorder" style="display:none">


                        <div class="row pb-2 ImgColumn d-none d-md-flex">
                            <div class="col-xl-3 col-lg-3 col-12">
                                <div class="text-center mt-1 d-none d-md-block">
                                    <p class="m-0 fs-5 d-none d-md-block profileIdLapFont profileIdSize fs-6 pt-2"><?= $GetAllDataResults['profileId'] ?></p>
                                    <?php
                                    if ($GetAllDataResults['gender'] == 'Male') {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="loginBrideGroomImg"><img src="../IMAGES/boy.png" class="loginBrideGroomImg" /></object>
                                    <?php
                                    } else {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="loginBrideGroomImg"><img src="../IMAGES/girl.png" class="loginBrideGroomImg" /></object>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <!-------- MobileView Image-------->
                            <div class="container-fluid d-md-none">
                                <div class="d-flex justify-content-center">
                                    <div class="card loginPageCard" style="width: 23rem;">
                                        <?php
                                        if ($GetAllDataResults['gender'] == 'Male') {
                                        ?>
                                            <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="card-img-top loginPageImg"><img src="../IMAGES/boy.png" class="card-img-top loginPageImg" /></object>
                                        <?php
                                        } else {
                                        ?>
                                            <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="card-img-top loginPageImg"><img src="../IMAGES/girl.png" class="card-img-top loginPageImg" /></object>
                                        <?php
                                        }
                                        ?>

                                        <div class="card-body p-0 m-0">
                                            <div class="cardText">
                                                <div class="row m-0 p-0">
                                                    <div class="col-4 text-center">
                                                        <a href=""><i class="ri-heart-3-fill heartIcon p-0 m-0"></i></a>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <a href=""><i class="material-icons closeIcon p-0 mt-2">cancel</i>
                                                        </a>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <a href=""><i class="ri-star-s-fill pinkStarMobile p-0 m-0"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-9 col-lg-9 col-12 ContentColumn">
                                <div class="row ">
                                    <div class="col-12 text-end d-none d-md-block">
                                        <h6 class="me-5 position-relative">

                                            <span class="position-absolute start-100 p-2 bg-success border border-light rounded-circle">
                                                <span class="visually-hidden">New alerts</span>
                                            </span>
                                            Online
                                        </h6>
                                    </div>
                                    <div class="col-12 text-end pe-5 d-none d-md-flex">
                                        <p>I have Bachelor's - Engineering/ Computers/ Others and I am Employed in IT & Engineering as a <a href="">See More..</a></p>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-6 pe-1">
                                        <p class="d-md-none mobileviewName bridendGroomName ps-2 mt-3 ms-1"> <?= $GetAllDataResults['fullName'] ?> </p>
                                        <p class="personDetails ps-2 ms-1"> <?= $GetAllDataResults['religionName'] ?> </p>
                                        <p class="personDetails ps-2 ms-1"> <?php if ($GetAllDataResults['dob'] != '') {
                                                                                echo (date('Y') - date('Y', strtotime($GetAllDataResults['dob'])));
                                                                            } else {
                                                                            } ?> </p>
                                        <p class="personDetails ps-2 d-md-none ms-1"> <?= substr($GetAllDataResults['height'], 0, 7);  ?> </p>
                                        <p class="personDetails ps-2 ms-1 d-none d-md-block"> <?= $GetAllDataResults['complexion'] ?> </p>
                                        <p class="personDetails ps-2 ms-1"> <?= $GetAllDataResults['nativePlace'] ?> </p>
                                        <p class="personDetails ps-2 ms-1 d-md-none"> <?= $GetAllDataResults['educationCategory'] ?> </p>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-6 ps-1">
                                        <p class="d-md-none mobileviewID bridendGroomID ps-2 mt-3 me-1"> <?= $GetAllDataResults['profileId'] ?> </p>
                                        <p class="personDetails ps-2 me-1"> <?= $GetAllDataResults['casteName'] ?> </p>
                                        <p class="personDetails ps-2 me-1 d-md-none"> <?= $GetAllDataResults['complexion'] ?> </p>
                                        <p class="personDetails ps-2 me-1 d-md-none"> <?= $GetAllDataResults['weight'] ?> </p>
                                        <p class="personDetails ps-2 me-1 d-none d-md-block"> <?= $GetAllDataResults['height'] ?> / <?= $GetAllDataResults['weight'] ?> </p>
                                        <p class="personDetails ps-2 me-1"> <?= $GetAllDataResults['maritalStatus'] ?> </p>
                                        <p class="personDetails ps-2 me-1 d-none d-md-block"> <?= $GetAllDataResults['educationCategory'] ?> </p>
                                        <p class="personDetails ps-2 me-1 d-md-none"> <?= $GetAllDataResults['jobCategory'] ?> </p>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 d-none d-md-flex">
                                        <div class="row rigtIconPaddng">
                                            <div class="col-xl-6 col-lg-6 col-6">
                                                <div class="iconBorder text-center">
                                                    <div class="py-1"><i class="ri-heart-3-fill heartIcon py-2"></i></div>

                                                    <p class="fs-6 mb-0">Like</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-6">
                                                <div class="iconBorder text-center">
                                                    <img src="../IMAGES/loginpgeAvatar.png" alt="" class="pt-2 py-1">
                                                    <p class="fs-6 mb-0">Assist</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-6 mt-3">
                                                <div class="iconBorder text-center">
                                                    <div class="py-1">
                                                        <i class="ri-star-s-fill starIcon"></i>
                                                    </div>
                                                    <p class="fs-6 mb-0">Shortlist</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-6 mt-3">
                                                <div class="iconBorder text-center">
                                                    <div class="py-1">
                                                        <i class="ri-eye-line eyeIcon"></i>
                                                    </div>
                                                    <p class="fs-6 mb-0">Full Profile</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="d-md-none ScreenShotViewMobile">
                            <div class="container px-2">
                                <div class="row g-0 ImageBox">
                                    <div class="col-12 d-flex justify-content-center">
                                        <?php
                                        if ($GetAllDataResults['gender'] == 'Male') {
                                        ?>
                                            <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="img-fluid custmobileimg"><img src="../IMAGES/boy.png" class="img-fluid custmobileimg" /></object>
                                        <?php
                                        } else {
                                        ?>
                                            <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="img-fluid custmobileimg"><img src="../IMAGES/girl.png" class=" img-fluid custmobileimg" /></object>
                                        <?php
                                        }
                                        ?>
                                    </div>

                                </div>

                                <div class="row g-0 ViewDetailsContainer">

                                    <div class="col-6 ViewDetails">
                                        <p class="me-1 CustomerNameField"> <?= ($GetAllDataResults['fullName'] != '') ? $GetAllDataResults['fullName'] : "&nbsp;";  ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails">
                                        <p class="ms-1 CustomerIdField"> <?= ($GetAllDataResults['profileId'] != '') ? $GetAllDataResults['profileId'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails">
                                        <p class="me-1"> <?= ($GetAllDataResults['religionName'] != '') ? $GetAllDataResults['religionName'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails">
                                        <p class="ms-1"> <?= ($GetAllDataResults['casteName'] != '') ? $GetAllDataResults['casteName'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails">
                                        <p class="me-1"> <?php echo ($GetAllDataResults['dob'] != '') ? (date('Y') - date('Y', strtotime($GetAllDataResults['dob']))) : ""; ?> / <?= $GetAllDataResults['weight'] ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails">
                                        <p class="ms-1"> <?= ($GetAllDataResults['complexion'] != '') ? $GetAllDataResults['complexion'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails">
                                        <p class=" me-1"> <?= (substr($GetAllDataResults['height'], 0, 7) != '') ? substr($GetAllDataResults['height'], 0, 7) : "&nbsp;";  ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails">
                                        <p class="ms-1"> <?= ($GetAllDataResults['maritalStatus'] != '') ? $GetAllDataResults['maritalStatus'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails ScreenshotViewNativeSmall">
                                        <p class="me-1"> <?= ($GetAllDataResults['nativePlace'] != '') ? $GetAllDataResults['nativePlace'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-12 ViewDetails ScreenshotViewNativeBig" style="display: none;">
                                        <p class="me-1"> <?= ($GetAllDataResults['nativePlace'] != '') ? $GetAllDataResults['nativePlace'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-6 ViewDetails ScreenshotViewStar">
                                        <p class="ms-1"> <?= ($GetAllDataResults['STARNAME'] != '') ? $GetAllDataResults['STARNAME'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-12 ViewDetails ScreenshotViewEducation">
                                        <p class="ms-0"> <?= ($GetAllDataResults['educationCategory'] != '') ? $GetAllDataResults['educationCategory'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-12 ViewDetails ScreenshotViewJob">
                                        <p class="ms-0"> <?= ($GetAllDataResults['jobCategory'] != '') ? $GetAllDataResults['jobCategory'] : "&nbsp;" ?> </p>
                                    </div>

                                    <div class="col-12 ViewDetails ScreenshotViewNumber">
                                        <p class="ms-0"> <?= ($GetAllDataResults['registeredNumber'] != '') ? $GetAllDataResults['registeredNumber'] : "&nbsp;" ?> </p>
                                    </div>
                                    <div class="col-12 ViewDetails ScreenshotViewNumber">
                                        <p class="ms-0"> <?= ($GetAllDataResults['whatsappNumber'] != '') ? $GetAllDataResults['whatsappNumber'] : "&nbsp;" ?> </p>
                                    </div>


                                </div>
                            </div>
                        </div>


                    </div>


                    <?php
                }
            }


          
            $StartPage = 1 + $Offset;

            if ($PageLength > $TotalResult) {
                $PageLength = $TotalResult;
            }

            if ($LimitedRows < $Offset) {
                $EndPage = $Offset + $LimitedRows;
            } else {
                $EndPage = $PageLength + $Offset;
            }

            $PageString = $StartPage . '-' . $EndPage . '/' . $TotalResult;

            ?>

            <!-- <p>Offset = <?= $PageString; ?></p>  -->

            <div class="" id="Pagination">
                <nav aria-label="">
                    <ul class="pagination justify-content-end">
                        <li class="page-item">
                            <button class="page-link <?php echo ($PageNumber == '1') ? 'disabled' : '' ?>" value="<?= ($PageNumber - 1) ?>">Previous</button>
                        </li>
                        <?php
                        for ($Page = 1; $Page <= $TotalPages; $Page++) {
                        ?>
                            <li class="page-item <?php echo ($PageNumber == $Page) ? 'active' : ""  ?>"><button class="page-link" value="<?= $Page ?>"><?= $Page ?></button></li>
                        <?php
                        }
                        ?>
                        <li class="page-item">
                            <button class="page-link <?php echo ($PageNumber == $TotalPages) ? 'disabled' : '' ?>" value="<?= ($PageNumber + 1) ?>">Next</button>
                        </li>
                    </ul>
                </nav>
            </div>


            <?php

        }
    }


}


/* 

SELECT cdata.*,R.religionName,C.casteName,SUBCST.subcasteName,FD.feedback,EDCAT.educationCategory,EDTY.educationType,JBCAT.jobCategory,JBTY.jobType,JBCOUNTRY.countryName AS jobCountry,JBDISTRICT.districtName AS jobDistrict,JBCITY.cityName AS jobCity,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,FATEDU.educationCategory AS fatherEducation,FATJOB.jobCategory AS fatherJob,MOTEDU.educationCategory AS motherEducation,MOTJOB.jobCategory AS motherJob,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,PARTEDCAT.educationCategory AS partnerEducationCategory,PARTEDTY.educationType AS partnerEducationType,PARTJOBCAT.jobCategory AS partnerJobCategory,PARTJOBTY.jobType AS partnerJobType,PARTCASTE.casteName AS partnerCaste,PARTCOUNTRY.countryName AS partnerJobCountry,PARTCITY.cityName AS partnerCity  FROM custdata cdata LEFT JOIN religion R ON cdata.religion = R.rId LEFT JOIN caste C ON cdata.caste = C.casId LEFT JOIN subcaste SUBCST ON cdata.subCaste = SUBCST.scId LEFT JOIN feedback FD ON cdata.status = FD.fdId LEFT JOIN educationcategory EDCAT ON cdata.educationCat = EDCAT.edcatId LEFT JOIN educationtype EDTY ON cdata.educationType = EDTY.edTyId LEFT JOIN jobcategory JBCAT ON cdata.jobCat = JBCAT.jbcatId LEFT JOIN jobtype JBTY ON cdata.jobType = JBTY.jbTyId LEFT JOIN country JBCOUNTRY ON cdata.jobLocCountry = JBCOUNTRY.cId LEFT JOIN district JBDISTRICT ON cdata.jobLocDistrict = JBDISTRICT.dId LEFT JOIN city JBCITY ON cdata.jobLocCity = JBCITY.citId LEFT JOIN country CNTRY ON cdata.country = CNTRY.cId LEFT JOIN state STATE ON cdata.state = STATE.sId LEFT JOIN district DSTRCT ON cdata.district = DSTRCT.dId LEFT JOIN city CITY ON cdata.city = CITY.citId LEFT JOIN educationcategory FATEDU ON cdata.fatherEducation = FATEDU.edcatId LEFT JOIN jobcategory FATJOB ON cdata.fatherJob = FATJOB.jbcatId LEFT JOIN educationcategory MOTEDU ON cdata.motherEducation = MOTEDU.edcatId LEFT JOIN jobcategory MOTJOB ON cdata.fatherJob = MOTJOB.jbcatId LEFT JOIN religion PARTRELIGION ON cdata.partnerReligion = PARTRELIGION.rId LEFT JOIN caste PARTCASTE ON cdata.partnerCaste = PARTCASTE.casId LEFT JOIN educationcategory PARTEDCAT ON cdata.partnerEduCat = PARTEDCAT.edcatId LEFT JOIN educationtype PARTEDTY ON cdata.partnerEduType = PARTEDTY.edTyId LEFT JOIN jobcategory PARTJOBCAT ON cdata.partnerJobCat = PARTJOBCAT.jbcatId LEFT JOIN jobtype PARTJOBTY ON cdata.partnerJobType = PARTJOBTY.jbTyId LEFT JOIN country PARTCOUNTRY ON cdata.partnerCountry = PARTCOUNTRY.cId LEFT JOIN state PARTSTATE ON cdata.partnerState = PARTSTATE.sId LEFT JOIN district PARTDISTRICT ON cdata.partnerDistrict = PARTDISTRICT.dId LEFT JOIN city PARTCITY ON cdata.partnerCity = PARTCITY.citId WHERE custId <> '' AND $AgeFrom < YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND $AgeTo > YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND ( substring(height, 1,3) BETWEEN $HeightFrom AND $HeightTo) AND ( cdata.gender = CASE WHEN '$FilterGender' <> '' THEN '$FilterGender' ELSE cdata.gender END) AND (cdata.religion = CASE WHEN '$FilterReligion' <> '' THEN '$FilterReligion'  ELSE cdata.religion END) AND (cdata.maritalStatus = CASE WHEN $FilterMaritalStatusLength > 0 THEN ((SELECT cmarital.maritalStatus FROM custdata cmarital WHERE cmarital.maritalStatus IN($FilterMaritalStatus) AND cdata.custId = cmarital.custId )) ELSE cdata.maritalStatus END) AND (cdata.physicalStatus = CASE WHEN $FilterPhyscialStatusLength > 0 THEN ((SELECT cphysical.physicalStatus FROM custdata cphysical WHERE cphysical.physicalStatus IN($FilterPhyscialStatus) AND cdata.custId = cphysical.custId )) ELSE cdata.physicalStatus END) AND (cdata.star = CASE WHEN $FilterStarLength > 0 THEN ((SELECT cstar.star FROM custdata cstar WHERE cstar.star IN($FilterStar) AND cdata.custId = cstar.custId )) ELSE cdata.star END) AND (cdata.complexion = CASE WHEN $FilterComplexionLength > 0 THEN (SELECT ccomplexion.complexion FROM custdata ccomplexion WHERE ccomplexion.complexion IN($FilterComplexion) AND cdata.custId = ccomplexion.custId) ELSE cdata.complexion END) AND (cdata.bodyType = CASE WHEN $FilterBodyTypeLength > 0 THEN (SELECT cbody.bodyType FROM custdata cbody WHERE cbody.bodyType IN($FilterBodyType) AND cdata.custId = cbody.custId) ELSE cdata.bodyType END) AND (cdata.jathakamType = CASE WHEN $FilterJathakamLength > 0 THEN (SELECT cjathakam.jathakamType FROM custdata cjathakam WHERE cjathakam.jathakamType IN($FilterJathakam) AND cdata.custId = cjathakam.custId) ELSE cdata.jathakamType END) AND (cdata.noofChild = CASE WHEN $FilterChildLength > 0 THEN (SELECT cchild.noofChild FROM custdata cchild WHERE cchild.noofChild IN($FilterChild) AND cdata.custId = cchild.custId) ELSE cdata.noofChild END) AND (cdata.financialStatus = CASE WHEN $FilterFinstatusLength > 0 THEN (SELECT cfinancial.financialStatus FROM custdata cfinancial WHERE cfinancial.financialStatus IN($FilterFinstatus) AND cdata.custId = cfinancial.custId) ELSE cdata.financialStatus END) AND (cdata.youOwn = CASE WHEN $FilterOwnLength > 0 THEN (SELECT cOwn.youOwn FROM custdata cOwn WHERE cOwn.youOwn IN($FilterOwn) AND cdata.custId = cOwn.custId) ELSE cdata.youOwn END) AND (cdata.caste = CASE WHEN $FilterCasteLength > 0 THEN (SELECT ccaste.casId FROM caste ccaste WHERE ccaste.casId IN($FilterCaste) AND cdata.caste = ccaste.casId) ELSE cdata.caste END) AND (cdata.educationCat = CASE WHEN $FilterEducationCategoryLength > 0 THEN (SELECT cedcat.edcatId FROM educationcategory cedcat WHERE cedcat.edcatId IN($FilterEducationCategory) AND cdata.educationCat = cedcat.edcatId) ELSE cdata.educationCat END) AND (cdata.educationType = CASE WHEN $FilterEduTypeLength > 0 THEN (SELECT cedtype.edTyId FROM educationtype cedtype WHERE cedtype.edTyId IN($FilterEduType) AND cdata.educationType = cedtype.edTyId) ELSE cdata.educationType END) AND (cdata.jobCat = CASE WHEN $FilterJobcategoryLength > 0 THEN (SELECT cjobcat.jbcatId FROM jobcategory cjobcat WHERE cjobcat.jbcatId IN($FilterJobcategory) AND cdata.jobCat = cjobcat.jbcatId) ELSE cdata.jobCat END) AND (cdata.jobType = CASE WHEN $FilterJobTypeLength > 0 THEN (SELECT cjobtype.jbTyId FROM jobtype cjobtype WHERE cjobtype.jbTyId IN($FilterJobType) AND cdata.jobType = cjobtype.jbTyId) ELSE cdata.jobType END) AND (cdata.district = CASE WHEN $FilterDistrictLength > 0 THEN (SELECT cdistrict.dId FROM district cdistrict WHERE cdistrict.dId IN($FilterDistrict) AND cdata.district = cdistrict.dId) ELSE cdata.district END) AND (cdata.jobLocCountry = CASE WHEN $FilterCountryLength > 0 THEN (SELECT ccountry.cId FROM country ccountry WHERE ccountry.cId IN($FilterCountry) AND cdata.jobLocCountry = ccountry.cId) ELSE cdata.jobLocCountry END) AND (cdata.jobLocState = CASE WHEN $FilterStateLength > 0 THEN (SELECT cstate.sId FROM state cstate WHERE cstate.sId IN($FilterState) AND cdata.jobLocState = cstate.sId) ELSE cdata.jobLocState END) LIMIT $PageLength */
/* 

if(!empty($_POST['MemberMarstatus'])){
    $FilterMaritalStatusLength = count($_POST['MemberMarstatus']);
    $FilterMaritalStatus = ltrim(implode("," , $_POST['MemberMarstatus']) , ',');
}
else{
    $FilterMaritalStatus ="''";
    $FilterMaritalStatusLength = 0;
}

echo $FilterMaritalStatus;


if(!empty($_POST['MemberPhystatus'])){
    $FilterPhyscialStatusLength = count($_POST['MemberPhystatus']);
    $FilterPhyscialStatus = ltrim(implode("," , $_POST['MemberPhystatus']) , ',');
}
else{
    $FilterPhyscialStatus = "''";
    $FilterPhyscialStatusLength = 0;
}

//echo $FilterPhyscialStatus;


if(!empty($_POST['MemberStar'])){
    $FilterStarLength = count($_POST['MemberStar']);
    $FilterStar = ltrim(implode("," , $_POST['MemberStar']) , ',');
}
else{
    $FilterStar = "''";
    $FilterStarLength = 0;
}

//echo $FilterStar;

if(!empty($_POST['MemberComplexion'])){
    $FilterComplexionLength = count($_POST['MemberComplexion']);
    $FilterComplexion = ltrim(implode("," , $_POST['MemberComplexion']) , ',');
}
else{
    $FilterComplexion = "''";
    $FilterComplexionLength = 0;
}

//echo $FilterComplexion;


if(!empty($_POST['MemberBodyType'])){
    $FilterBodyTypeLength = count($_POST['MemberBodyType']);
    $FilterBodyType = ltrim(implode("," , $_POST['MemberBodyType']) , ',');
}
else{
    $FilterBodyType = "''";
    $FilterBodyTypeLength = 0;
}

//echo $FilterBodyType;

if(!empty($_POST['MemberJathakam'])){
    $FilterJathakamLength = count($_POST['MemberJathakam']);
    $FilterJathakam = ltrim(implode("," , $_POST['MemberJathakam']) , ',');
}
else{
    $FilterJathakam = "''";
    $FilterJathakamLength = 0;
}

//echo $FilterJathakam;

if(!empty($_POST['MemberChild'])){
    $FilterChildLength = count($_POST['MemberChild']);
    $FilterChild = ltrim(implode("," , $_POST['MemberChild']) , ',');
}
else{
    $FilterChild = "''";
    $FilterChildLength = 0;
}

//echo $FilterChild;
if(!empty($_POST['MemberFinstatus'])){
    $FilterFinstatusLength = count($_POST['MemberFinstatus']);
    $FilterFinstatus = ltrim(implode("," , $_POST['MemberFinstatus']) , ',');
}
else{
    $FilterFinstatus = "''";
    $FilterFinstatusLength = 0;
}

//echo $FilterFinstatus;



if(isset($_POST['MemberOwn'])){
    $FilterOwnLength = count($_POST['MemberOwn']);
    $FilterOwn = ltrim(implode("," , $_POST['MemberOwn']) , ',');
}
else{
    $FilterOwn = "''";
    $FilterOwnLength = 0;
}


if(!empty($_POST['MemberCaste'])){
    $FilterCasteLength = count($_POST['MemberCaste']);
    $FilterCaste = ltrim(implode("," , $_POST['MemberCaste']) , ',');
}
else{
    $FilterCaste = "''";
    $FilterCasteLength = 0;
}

//echo $FilterCaste;



if(!empty($_POST['MemberEducationCategory'])){
    $FilterEducationCategoryLength = count($_POST['MemberEducationCategory']);
    $FilterEducationCategory = ltrim(implode("," , $_POST['MemberEducationCategory']) , ',');
}
else{
    $FilterEducationCategory = "''";
    $FilterEducationCategoryLength = 0;
}

//echo $FilterEducationCategory;

if(!empty($_POST['MemberEduType'])){
    $FilterEduTypeLength = count($_POST['MemberEduType']);
    $FilterEduType = ltrim(implode("," , $_POST['MemberEduType']) , ',');
}
else{
    $FilterEduType = "''";
    $FilterEduTypeLength = 0;
}

//echo $FilterEduType;


if(!empty($_POST['MemberJobcategory']) && isset($_POST['MemberJobcategory'])){
    $FilterJobcategoryLength = count($_POST['MemberJobcategory']);
    $FilterJobcategory = ltrim(implode("," , $_POST['MemberJobcategory']) , ',');
}
else{
    $FilterJobcategory = "''";
    $FilterJobcategoryLength = 0;
}


//echo $FilterJobcategory;

if(!empty($_POST['MemberJobType'])){
    $FilterJobTypeLength = count($_POST['MemberJobType']);
    $FilterJobType = ltrim(implode("," , $_POST['MemberJobType']) , ',');
}
else{
    $FilterJobType = "''";
    $FilterJobTypeLength = 0;
}

//echo $FilterJobType;

if(!empty($_POST['MemberDistrict'])){
    $FilterDistrictLength = count($_POST['MemberDistrict']);
    $FilterDistrict = ltrim(implode("," , $_POST['MemberDistrict']) , ',');
}
else{
    $FilterDistrict = "''";
    $FilterDistrictLength = 0;
}

//echo $FilterDistrict;

if(!empty($_POST['MemberCountry'])){
    $FilterCountryLength = count($_POST['MemberCountry']);
    $FilterCountry = ltrim(implode("," , $_POST['MemberCountry']) , ',');
}
else{
    $FilterCountry = "''";
    $FilterCountryLength = 0;
}

//echo $FilterCountry;

if(!empty($_POST['MemberState'])){
    $FilterStateLength = count($_POST['MemberState']);
    $FilterState = ltrim(implode("," , $_POST['MemberState']) , ',');
}
else{
    $FilterState = "''";
    $FilterStateLength = 0;
}

//echo $FilterState;
 */


?>


<script>
    $(document).ready(function() {
        $('#PageResult').html('<?php echo $PageString; ?>');
    });

    $('#Pagination .page-link').click(function(f) {
        f.preventDefault();
        var PageNumber = $(this).val();
        console.log(PageNumber);
        $('#PageNumber').val(PageNumber);
        $('#FilterData').submit();

    });
</script>