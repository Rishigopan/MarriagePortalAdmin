<?php $PageTitle = 'StaffAssign';
include '../MAIN/Dbconfig.php';  ?>
<!DOCTYPE html>
<html lang="en">
s

<head>
    s
    <!-- Header include -->
    <?php include('../MAIN/Header.php'); ?>

    <link rel="stylesheet" href="../assets/dist/virtual-select.min.css">

    <script src="../assets/dist/virtual-select.min.js"></script>

    <style>
        .Newselect .vscomp-value {
            color: black !important;
            opacity: 1 !important;
        }

        .vscomp-wrapper {
            font-family: "Nunito", sans-serif;
            width: 100% !important;
            /* border-radius: 20px !important;  */
        }

        .vscomp-wrapper.has-clear-button .vscomp-toggle-button {
            padding: 2px 10px;
        }

        .vscomp-ele {
            border-radius: 30px !important;
            padding: 0 !important;
        }

        .vscomp-option-text {
            font-weight: 400 !important;
            font-size: 12px !important;
        }

        .vscomp-option.focused {
            background-color: #afebed !important;
        }

        .vscomp-option {
            max-height: 30px !important;
        }

        .dropDnGreen {
            background-image: none !important;
        }

        .MobileDisplay {
            height: 100vh;
        }

        .MobileDisplay .ImageBox {
            border-radius: 20px;
            border: 2px solid #e81a81;
            height: 40vh;
        }

        .MobileDisplay .ImageBox .custmobileimg {
            border-radius: 18px 18px 18px 18px;
            height: 39.5vh;
        }

        .MobileDisplay .ViewDetailsContainer {
            height: 55vh;
            margin: 1vh;
        }

        .MobileDisplay .ViewDetails p {
            background-color: #e4e4e4;
            border-radius: 10px;
            font-size: 15px;
            padding: 2px 8px;
            margin: 0px;
        }

        .MobileDisplay .ViewDetails .CustomerNameField {
            background-color: #e81a81;
            color: white;
        }

        .MobileDisplay .ViewDetails .CustomerIdField {
            background-color: #3dadf3;
            color: white;
        }

        .MobileDisplay .SideMiniMenu li {
            padding: 7px 5px;
        }

        .MobileDisplay .SideMiniMenu li input {
            height: 25px;
            width: 25px;
            border-radius: 50%;
        }

        .MobileDisplay .SideMiniMenu li button {
            height: 25px;
            width: 25px;
        }

        .MobileDisplay .SideMiniMenu li button i {
            color: #e81a81;
            font-size: 20px;
            font-weight: 700;
        }


        @media only screen and (max-width:480px) {
            .lapView {
                display: none;
            }
        }

        @media only screen and (min-width:480px) {
            .MobileDisplay {
                display: none;
            }
        }


        .refreshBtn {
            border-radius: 50%;
            background-color: black;
            color: white;
            padding: 0px 5px;
        }

        .refreshBtn:focus,
        .refreshBtn:hover {
            background-color: black !important;
            color: white !important;
        }

        .SearchButton {
            background-color: #1ba7f7;
            color: white;
            padding: 2px 5px;
            font-weight: 600;
        }

        .SearchButton:focus,
        .SearchButton:hover {
            background-color: #1ba7f7 !important;
            color: white !important;
        }
    </style>

</head>

<body>

    <!-- Navbar include -->
    <?php include('../MAIN/Navbar.php'); ?>


    <!-- Sidebar include -->
    <?php include('../MAIN/Sidebar.php'); ?>



    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Staff Assign</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Staff Assign</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">



            <!-------- Header start-------->
            <!-- <nav class="navbar navbar-expand-lg navBg">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link headLink pe-3" aria-current="page" href="#">REGISTER</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link headLink px-3" href="#">PROFILE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link headLink px-3" href="#">PACKAGE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link headLink px-3" href="#">CONTACT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link headLink px-3" href="#">ASSIST</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link headlastLink ps-3" href="#">FILTER</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav> -->
            <!-------- Header end-------->



            <div class="container-fluid pb-2">

                <form id="FilterData">


                    <input type="text" name="Search" value="1" hidden>


                    <div class="row collapse show" id="collapseExample">
                        <div class="col-xl-2 col-lg-3 col-6 mt-2">
                            <select class="Newselect select choose" id="member_bride" placeholder="Bride/Groom" name="MemberBride" multiple="no">
                                <!-- <option hidden value="">Bride/Groom</option> -->
                                <option value="Female">Bride</option>
                                <option value="Male">Groom</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-2">
                            <select class="Newselect select dropColor choose" placeholder="Phys Status" id="member_phystatus" name="MemberPhystatus[]" multiple>
                                <!-- <option hidden value="">Phys Status</option> -->
                                <option value="'Normal'">Normal</option>
                                <option value="'Blind'">Blind</option>
                                <option value="'Deaf/Dump'">Deaf/Dump</option>
                                <option value="'Handicapped'">Handicapped</option>
                                <option value="'Mentally Challenged'">Mentally Challenged</option>
                                <option value="'Physically Challenged'">Physically Challenged</option>
                                <option value="'With other Disability'">With other Disability</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-2">
                            <select class="Newselect select choose" id="member_agefrom" placeholder="Age From" name="MemberAgefrom" multiple="no">
                                <!-- <option hidden value="">Age From</option> -->
                                <?php
                                for ($Age = 18; $Age <= 80; $Age++) {
                                    echo '<option value="' . $Age . '">' . $Age . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-2">
                            <select class="Newselect select choose" id="member_ageto" placeholder="Age To" name="MemberAgeto" multiple="no">
                                <!-- <option hidden value="">Age To</option> -->
                                <?php
                                for ($Age = 18; $Age <= 80; $Age++) {
                                    echo '<option value="' . $Age . '">' . $Age . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-2">
                            <select class="Newselect select choose" id="member_heightfrom" placeholder="Height From" name="MemberHeightfrom" multiple="no">
                                <!-- <option hidden value="">Height From</option> -->
                                <option value="120">120 cm - 3 Ft 11 in</option>
                                <option value="121">121 cm - 3 Ft 12 In</option>
                                <option value="122">122 cm - 4 Ft</option>
                                <option value="123">123 cm - 4 Ft</option>
                                <option value="124">124 cm - 4 Ft 1 In</option>
                                <option value="125">125 cm - 4 Ft 1 In</option>
                                <option value="126">126 cm - 4 Ft 2 In</option>
                                <option value="127">127 cm - 4 Ft 2 In</option>
                                <option value="128">128 cm - 4 Ft 2 In</option>
                                <option value="129">129 cm - 4 Ft 3 In</option>
                                <option value="130">130 cm - 4 Ft 3 In</option>
                                <option value="131">131 cm - 4 Ft 4 In</option>
                                <option value="132">132 cm - 4 Ft 4 In</option>
                                <option value="133">133 cm - 4 Ft 4 In</option>
                                <option value="134">134 cm - 4 Ft 5 in</option>
                                <option value="135">135 cm - 4 Ft 5 In</option>
                                <option value="136">136 cm - 4 Ft 6 In</option>
                                <option value="137">137 cm - 4 Ft 6 In</option>
                                <option value="138">138 cm - 4 Ft 6 In</option>
                                <option value="139">139 cm - 4 Ft 7 In</option>
                                <option value="140">140 cm - 4 Ft 7 In</option>
                                <option value="141">141 cm - 4 Ft 8 In</option>
                                <option value="142">142 cm - 4 Ft 8 In</option>
                                <option value="143">143 cm - 4 Ft 8 In</option>
                                <option value="144">144 cm - 4 Ft 9 In</option>
                                <option value="145">145 cm - 4 Ft 9 In</option>
                                <option value="146">146 cm - 4 Ft 9 In</option>
                                <option value="147">147 cm - 4 Ft 10 In</option>
                                <option value="148">148 cm - 4 Ft 10 In</option>
                                <option value="149">149 cm - 4 Ft 11 In</option>
                                <option value="150">150 cm - 4 Ft 11 In</option>
                                <option value="151">151 cm - 4 Ft 11 In</option>
                                <option value="152">152 cm - 5 Ft</option>
                                <option value="153">153 cm - 5 Ft</option>
                                <option value="154">154 cm - 5 Ft 1 In</option>
                                <option value="155">155 cm - 5 Ft 1 In</option>
                                <option value="156">156 cm - 5 Ft 1 In</option>
                                <option value="157">157 cm - 5 Ft 2 in</option>
                                <option value="158">158 cm - 5 Ft 2 In</option>
                                <option value="159">159 cm - 5 Ft 3 In</option>
                                <option value="160">160 cm - 5 Ft 3 In</option>
                                <option value="161">161 cm - 5 Ft 3 In</option>
                                <option value="162">162 cm - 5 Ft 4 In</option>
                                <option value="163">163 cm - 5 Ft 4 In</option>
                                <option value="164">164 cm - 5 Ft 5 In</option>
                                <option value="165">165 cm - 5 Ft 5 In</option>
                                <option value="166">166 cm - 5 Ft 5 In</option>
                                <option value="167">167 cm - 5 Ft 6 In</option>
                                <option value="168">168 cm - 5 Ft 6 In</option>
                                <option value="169">169 cm - 5 Ft 7 In</option>
                                <option value="170">170 cm - 5 Ft 7 In</option>
                                <option value="171">171 cm - 5 Ft 7 In</option>
                                <option value="172">172 cm - 5 Ft 8 In</option>
                                <option value="173">173 cm - 5 Ft 8 In</option>
                                <option value="174">174 cm - 5 Ft 9 In</option>
                                <option value="175">175 cm - 5 Ft 9 In</option>
                                <option value="176">176 cm - 5 Ft 9 In</option>
                                <option value="177">177 cm - 5 Ft 10 In</option>
                                <option value="178">178 cm - 5 Ft 10 In</option>
                                <option value="179">179 cm - 5 Ft 10 In</option>
                                <option value="180">180 cm - 5 Ft 11 In</option>
                                <option value="181">181 cm - 5 Ft 11 In</option>
                                <option value="182">182 cm - 6 Ft</option>
                                <option value="183">183 cm - 6 Ft</option>
                                <option value="184">184 cm - 6 Ft</option>
                                <option value="185">185 cm - 6 Ft 1 In</option>
                                <option value="186">186 cm - 6 Ft 1 In</option>
                                <option value="187">187 cm - 6 Ft 2 In</option>
                                <option value="188">188 cm - 6 Ft 2 In</option>
                                <option value="189">189 cm - 6 Ft 2 In</option>
                                <option value="190">190 cm - 6 Ft 3 In</option>
                                <option value="191">191 cm - 6 Ft 3 In</option>
                                <option value="192">192 cm - 6 Ft 4 In</option>
                                <option value="193">193 cm - 6 Ft 4 In</option>
                                <option value="194">194 cm - 6 Ft 4 In</option>
                                <option value="195">195 cm - 6 Ft 5 In</option>
                                <option value="196">196 cm - 6 Ft 5 In</option>
                                <option value="197">197 cm - 6 Ft 6 In</option>
                                <option value="198">198 cm - 6 Ft 6 in</option>
                                <option value="199">199 cm - 6 Ft 6 In</option>
                                <option value="200">200 cm - 6 Ft 7 In</option>
                                <option value="201">201 cm - 6 Ft 7 In</option>
                                <option value="202">202 cm - 6 Ft 8 In</option>
                                <option value="203">203 cm - 6 Ft 8 In</option>
                                <option value="204">204 cm - 6 Ft 8 In</option>
                                <option value="205">205 cm - 6 Ft 9 In</option>
                                <option value="206">206 cm - 6 Ft 9 In</option>
                                <option value="207">207 cm - 6 Ft 9 In</option>
                                <option value="208">208 cm - 6 Ft 10 In</option>
                                <option value="209">209 cm - 6 Ft 10 In</option>
                                <option value="210">210 cm - 6 Ft 11 in</option>
                                <option value="211">211 cm - 6 Ft 11 In</option>
                                <option value="212">212 cm - 6 Ft 11 In</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-2">
                            <select class="Newselect select choose" id="member_heightto" placeholder="Height To" name="MemberHeightto" multiple="no">
                                <!-- <option hidden value="">Height To</option> -->
                                <option value="120">120 cm - 3 Ft 11 in</option>
                                <option value="121">121 cm - 3 Ft 12 In</option>
                                <option value="122">122 cm - 4 Ft</option>
                                <option value="123">123 cm - 4 Ft</option>
                                <option value="124">124 cm - 4 Ft 1 In</option>
                                <option value="125">125 cm - 4 Ft 1 In</option>
                                <option value="126">126 cm - 4 Ft 2 In</option>
                                <option value="127">127 cm - 4 Ft 2 In</option>
                                <option value="128">128 cm - 4 Ft 2 In</option>
                                <option value="129">129 cm - 4 Ft 3 In</option>
                                <option value="130">130 cm - 4 Ft 3 In</option>
                                <option value="131">131 cm - 4 Ft 4 In</option>
                                <option value="132">132 cm - 4 Ft 4 In</option>
                                <option value="133">133 cm - 4 Ft 4 In</option>
                                <option value="134">134 cm - 4 Ft 5 in</option>
                                <option value="135">135 cm - 4 Ft 5 In</option>
                                <option value="136">136 cm - 4 Ft 6 In</option>
                                <option value="137">137 cm - 4 Ft 6 In</option>
                                <option value="138">138 cm - 4 Ft 6 In</option>
                                <option value="139">139 cm - 4 Ft 7 In</option>
                                <option value="140">140 cm - 4 Ft 7 In</option>
                                <option value="141">141 cm - 4 Ft 8 In</option>
                                <option value="142">142 cm - 4 Ft 8 In</option>
                                <option value="143">143 cm - 4 Ft 8 In</option>
                                <option value="144">144 cm - 4 Ft 9 In</option>
                                <option value="145">145 cm - 4 Ft 9 In</option>
                                <option value="146">146 cm - 4 Ft 9 In</option>
                                <option value="147">147 cm - 4 Ft 10 In</option>
                                <option value="148">148 cm - 4 Ft 10 In</option>
                                <option value="149">149 cm - 4 Ft 11 In</option>
                                <option value="150">150 cm - 4 Ft 11 In</option>
                                <option value="151">151 cm - 4 Ft 11 In</option>
                                <option value="152">152 cm - 5 Ft</option>
                                <option value="153">153 cm - 5 Ft</option>
                                <option value="154">154 cm - 5 Ft 1 In</option>
                                <option value="155">155 cm - 5 Ft 1 In</option>
                                <option value="156">156 cm - 5 Ft 1 In</option>
                                <option value="157">157 cm - 5 Ft 2 in</option>
                                <option value="158">158 cm - 5 Ft 2 In</option>
                                <option value="159">159 cm - 5 Ft 3 In</option>
                                <option value="160">160 cm - 5 Ft 3 In</option>
                                <option value="161">161 cm - 5 Ft 3 In</option>
                                <option value="162">162 cm - 5 Ft 4 In</option>
                                <option value="163">163 cm - 5 Ft 4 In</option>
                                <option value="164">164 cm - 5 Ft 5 In</option>
                                <option value="165">165 cm - 5 Ft 5 In</option>
                                <option value="166">166 cm - 5 Ft 5 In</option>
                                <option value="167">167 cm - 5 Ft 6 In</option>
                                <option value="168">168 cm - 5 Ft 6 In</option>
                                <option value="169">169 cm - 5 Ft 7 In</option>
                                <option value="170">170 cm - 5 Ft 7 In</option>
                                <option value="171">171 cm - 5 Ft 7 In</option>
                                <option value="172">172 cm - 5 Ft 8 In</option>
                                <option value="173">173 cm - 5 Ft 8 In</option>
                                <option value="174">174 cm - 5 Ft 9 In</option>
                                <option value="175">175 cm - 5 Ft 9 In</option>
                                <option value="176">176 cm - 5 Ft 9 In</option>
                                <option value="177">177 cm - 5 Ft 10 In</option>
                                <option value="178">178 cm - 5 Ft 10 In</option>
                                <option value="179">179 cm - 5 Ft 10 In</option>
                                <option value="180">180 cm - 5 Ft 11 In</option>
                                <option value="181">181 cm - 5 Ft 11 In</option>
                                <option value="182">182 cm - 6 Ft</option>
                                <option value="183">183 cm - 6 Ft</option>
                                <option value="184">184 cm - 6 Ft</option>
                                <option value="185">185 cm - 6 Ft 1 In</option>
                                <option value="186">186 cm - 6 Ft 1 In</option>
                                <option value="187">187 cm - 6 Ft 2 In</option>
                                <option value="188">188 cm - 6 Ft 2 In</option>
                                <option value="189">189 cm - 6 Ft 2 In</option>
                                <option value="190">190 cm - 6 Ft 3 In</option>
                                <option value="191">191 cm - 6 Ft 3 In</option>
                                <option value="192">192 cm - 6 Ft 4 In</option>
                                <option value="193">193 cm - 6 Ft 4 In</option>
                                <option value="194">194 cm - 6 Ft 4 In</option>
                                <option value="195">195 cm - 6 Ft 5 In</option>
                                <option value="196">196 cm - 6 Ft 5 In</option>
                                <option value="197">197 cm - 6 Ft 6 In</option>
                                <option value="198">198 cm - 6 Ft 6 in</option>
                                <option value="199">199 cm - 6 Ft 6 In</option>
                                <option value="200">200 cm - 6 Ft 7 In</option>
                                <option value="201">201 cm - 6 Ft 7 In</option>
                                <option value="202">202 cm - 6 Ft 8 In</option>
                                <option value="203">203 cm - 6 Ft 8 In</option>
                                <option value="204">204 cm - 6 Ft 8 In</option>
                                <option value="205">205 cm - 6 Ft 9 In</option>
                                <option value="206">206 cm - 6 Ft 9 In</option>
                                <option value="207">207 cm - 6 Ft 9 In</option>
                                <option value="208">208 cm - 6 Ft 10 In</option>
                                <option value="209">209 cm - 6 Ft 10 In</option>
                                <option value="210">210 cm - 6 Ft 11 in</option>
                                <option value="211">211 cm - 6 Ft 11 In</option>
                                <option value="212">212 cm - 6 Ft 11 In</option>

                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect" placeholder="Marital Status" id="member_marstatus" name="MemberMarstatus[]" multiple>
                                <!-- <option disabled selected value="">Marital Status</option> -->
                                <option value="'Un Married'">Un Married</option>
                                <option value="'Divorced'">Divorced</option>
                                <option value="'Separated'">Separated</option>
                                <option value="'Widow/ Widower'">Widow/ Widower</option>
                                <option value="'Awaiting Divorce'">Awaiting Divorce</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect" placeholder="No of Child" id="member_child" name="MemberChild[]" multiple>
                                <!-- <option hidden value="">No of Child</option> -->
                                <option value="'0'">0</option>
                                <option value="'1'">1</option>
                                <option value="'2'">2</option>
                                <option value="'3'">3</option>
                                <option value="'4'">4</option>
                                <option value="'5'">5</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="Newselect select choose SelectReligion" id="member_religion" name="MemberReligion" multiple="no" placeholder="Religion">
                                
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose SelectCaste Newselect" placeholder="Caste" id="member_caste" name="MemberCaste[]" multiple>
                                <!-- <option value="">Caste</option> -->

                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect SelectEdCat" placeholder="Education Category" id="member_education" name="MemberEducationCategory[]" multiple>
                                
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect SelectEdType" placeholder="Education Type" id="member_edutype" name="MemberEduType[]" multiple>
                                <!-- <option hidden value="">Education Type</option> -->

                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect SelectJobCat" placeholder="Job Category" id="member_jobcategory" name="MemberJobcategory[]" multiple>
                               
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect SelectJobType" placeholder="Job Type" id="member_jobdetail" name="MemberJobType[]" multiple>

                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect SelectDistrict" placeholder="District" id="member_district" name="MemberDistrict[]" multiple>
                                
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect" placeholder="Financial Status" id="member_finstatus" name="MemberFinstatus[]" multiple>
                                <!-- <option hidden value="">Financial Status</option> -->
                                <option value="'Middle class'">Middle class</option>
                                <option value="'Upper middle class'">Upper middle class</option>
                                <option value="'Lower class'">Lower class</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect" placeholder="Complexion" id="member_complexion" name="MemberComplexion[]" multiple>
                                <!-- <option hidden value="">Complexion</option> -->
                                <option value="'Dark'">Dark</option>
                                <option value="'Fair'">Fair</option>
                                <option value="'Medium'">Medium</option>
                                <option value="'Very Fair'">Very Fair</option>
                                <option value="'Wheatish'">Wheatish</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect" placeholder="Body" id="member_bodytype" name="MemberBodyType[]" multiple>
                                <!-- <option hidden value="">Body</option> -->
                                <option value="'Slim'">Slim</option>
                                <option value="'Average'">Average</option>
                                <option value="'Athletic'">Athletic</option>
                                <option value="'Heavy'">Heavy</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect SelectCountry" placeholder="Job Country" id="member_country" name="MemberCountry[]" multiple>
                                
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect SelectState" placeholder="Job State" id="member_state" name="MemberState[]" multiple>

                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect" placeholder="Monthly Income" id="member_income" name="MemberIncome" multiple="no">
                                <!-- <option hidden value="">Monthly Income</option> -->
                                <option value="1000">Below Rs.1000</option>
                                <option value="1000 - 3000">Rs.1000 - Rs.3000</option>
                                <option value="3000 - 5000">Rs.3000 - Rs.5000</option>
                                <option value="5000 - 8000">Rs.5000 - Rs.8000</option>
                                <option value="8000 - 10000">Rs.8000 - Rs.10000</option>
                                <option value="10000 - 15000">Rs.10000 - Rs.15000</option>
                                <option value="15000 - 25000">Rs.15000 - Rs.25000</option>
                                <option value="25000 - 50000">Rs.25000 - Rs.50000</option>
                                <option value="50000 - 75000">Rs.50000 - Rs.75000</option>
                                <option value="75000 - 100000">Rs.75000 - Rs.100000</option>
                                <option value="100000 - 200000">Rs.100000 - Rs.200000</option>
                                <option value="200000">Above Rs. 200000</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect SelectStar" placeholder="Star" id="member_star" name="MemberStar" multiple="no">

                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="select dropColor choose Newselect" placeholder="Type of Jathakam" id="member_jathakam" name="MemberJathakam[]" multiple>
                                <!-- <option  hidden value="">Type of Jathakam</option> -->
                                <option value="'Normal Jadhakam'">Normal Jadhakam</option>
                                <option value="'Sudha Jadhakam'">Sudha Jadhakam</option>
                                <option value="'Paapa Jadhakam'">Paapa Jadhakam</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <select class="Newselect select dropColor Newselect" placeholder="You have Own" id="member_own" name="MemberOwn[]" multiple>
                                <!-- <option disabled selected value="">You have Own</option> -->
                                <option value="'Own House'">Own House</option>
                                <option value="'Own Flat'">Own Flat</option>
                                <option value="'Own Car'">Own Car</option>
                                <option value="'Own Bike'">Own Bike</option>
                                <option value="'Rent House'">Rent House</option>
                                <option value="'Rent Flat'">Rent Flat</option>
                            </select>
                        </div>


                    </div>


                    <!-- <div class="row mt-1">
                        <div class="col-xl-2 col-lg-3 col-6 mt-1 selectMargin">
                            <select class="form-select select dropDnLightPink" id="member_page" name="MemberPage">
                                <option hidden value="">Page</option>
                               
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1 selectMargin">
                            <select class="form-select select dropDnLightPink" id="member_data" name="MemberData">
                                <option hidden value="">Data</option>
                                <option value="BD">Bulk Data</option>
                                <option value="PD">Paid Data</option>
                                <option selected value="FD">Free Data</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1 selectMargin">
                            <input type="text" id="member_canid" name="MemberCanID" class="form-control inputFieldWhite" placeholder="ID Search">
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1 selectMargin">
                            <input type="text" id="member_wordsearch" name="MemberWordSearch" class="form-control inputFieldWhite" placeholder="Search">
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1 selectMargin">
                            <input type="text" id="member_mobile" name="MemberMobile" class="form-control inputFieldWhite" placeholder="Mobile">
                        </div>

                        <div class="col-xl-1 col-lg-3 col-6 mt-1 mt-xl-2 selectMargin">
                            <div class="row">
                                <div class="col-xl-10 col-lg-6 col-6 text-center">
                                    <select class="form-control select py-1 text-black" id="member_assist" name="PageLength">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="10">20</option>
                                        <option value="50">50</option>
                                        <option selected value="100">100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 mt-xl-2 selectMargin">
                            <div class="row bg-info">
                                <div class="col-xl-4 col-lg-4 col-4 text-start">
                                    <a data-bs-toggle="collapse" href="#collapseExample" role="button" id="filter_link" name="FilterLink"><i class="ri-filter-2-line iconFilter"></i></a>
                                </div>
                                <div class="col-xl-4 col-lg-5 col-5 text-start">
                                    <button type="submit" class="btn p-0 m-0" id="searchButton"><i class="ri-search-2-line iconSearch"></i></button>
                                </div>
                            </div>
                        </div>


                    </div> -->


                    <div class="row mt-1">

                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <select class="form-control select dropDnLightPink" id="member_page" name="MemberPage">
                                <option hidden value="">Page</option>

                            </select>
                        </div>
                        <div class="col-xl-1 col-lg-3 col-6 mt-1 selectMargin">
                            <select class="form-control select dropDnLightPink" id="member_data" name="MemberData">
                                <option selected value="FD">Free Data</option>
                                <option value="BD">Bulk Data</option>
                                <option value="PD">Paid Data</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1 selectMargin">
                            <input type="text" id="member_canid" name="MemberCanID" class="form-control inputFieldWhite" placeholder="ID Search">
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1 selectMargin">
                            <input type="text" id="member_wordsearch" name="MemberWordSearch" class="form-control inputFieldWhite" placeholder="Search">
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1 selectMargin">
                            <input type="text" id="member_mobile" name="MemberMobile" class="form-control inputFieldWhite" placeholder="Mobile">
                        </div>


                        <div class="col-xl-2 col-lg-3 col-6 mt-1 selectMargin">
                            <div class="row">
                                <div class="col-xl-6 col-lg-4 col-4 text-center">
                                    <select class="form-control select py-1 text-black " id="page_length" name="PageLength">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="10">20</option>
                                        <option value="50">50</option>
                                        <option selected value="100">100</option>
                                        <!-- <option value="">25</option> -->
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-4 text-center ">
                                    <a data-bs-toggle="collapse" href="#collapseExample" role="button" id="filter_link" name="FilterLink"><i class="ri-filter-2-line iconFilter"></i></a>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-3 text-center ps-2 ">
                                    <button type="button" id="clearAll" class="btn refreshBtn pt-0 mt-0"><i class="ri-refresh-line "></i></button>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1">
                            <div class="row">
                                <div class="col-xl-6 col-lg-5 col-5 text-center ps-0 ms-0">
                                    <button type="submit" class="btn m-0 SearchButton rounded-pill" id="searchButton"><i class="ri-search-2-line"></i> SEARCH</button>
                                </div>
                                <div class="col-xl-6 col-lg-5 col-5 text-center ps-0 ms-0 pt-1">
                                    <h6 class="" id="PageResult"></h6>
                                </div>

                            </div>
                        </div>




                    </div>


                    <div class="row mt-2 mb-3 pb-2 rounded-pill" style="background-color: #99ccff;">
                        <div class="col-xl-2 col-lg-3 col-3 text-start mt-1">
                            <div class="row">
                                <div class="col-6 mt-1">
                                    <input class="form-check-input" type="checkbox" id="assigned_profile" name="Assigned" data-bs-toggle="collapse" data-bs-target="#staff_assigned">
                                    <label class="form-check-label assignedCheckbox" for="assigned_profile">
                                        Assigned
                                    </label>
                                </div>
                                <div class="col-6 mt-1">
                                    <input class="form-check-input" type="checkbox" id="selectAllCustomers" value="" class="checkBox" name="customers[]">
                                    <label for="selectAllCustomers"> Select All </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1 mt-xl-2 selectMargin">
                            <select class="form-select select  SelectBranch" id="branch_select" name="MemberBranch">
                                <option hidden value="">Branch</option>
                                <?php 
                                
                                $FindBranches = mysqli_query($con, "SELECT * FROM branch");
                                foreach($FindBranches as $FindBranchesResult){
                                    echo "<option value='".$FindBranchesResult['bId']."'>".$FindBranchesResult['branchName']."</option>";
                                }
                            
                            
                            ?>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1 mt-xl-2">
                            <select class="form-select select  selectAgency" id="" name="MemberAgency">
                                <option hidden value="">Agency</option>

                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1 mt-xl-2 selectMargin">
                            <select class="form-select select  selectStaff" id="member_staff" name="MemberSend">
                                <option hidden value="">Staff</option>

                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1 mt-xl-2 selectMargin">
                            <button class="form-control btnBlue" type="button" id="assignCustomers" style="background-color: #33cc00;">Assign</button>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1 mt-xl-2 selectMargin">
                            <button class="form-control btnBlue" type="button" id="unassignCustomers" style="background-color: #ff0000;">Un Assign</button>

                        </div>

                    </div>



                    <!-- <div class="row collapse" id="staff_assigned">
                        <div class="col-xl-2 col-lg-3 col-6 mt-1 mt-xl-2 selectMargin">
                            <select class="form-select select dropDnGreen SelectBranch" id="branch_select">
                                <option hidden value="">Branch</option>
                                
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1 mt-xl-2">
                            <select class="form-select select dropDnGreen selectAgency" id="">
                                <option hidden value="">Agency</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1 mt-xl-2 selectMargin">
                            <select class="form-select select dropDnGreen selectStaff" id="unassigned_staff" name="AssignedStaff">
                                <option hidden value="">Staff</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-6 mt-1 mt-xl-2 selectMargin">
                            <div class="row">

                                <div class="col-xl-12 col-lg-12 col-12 selectMargin">
                                   
                                    
                                </div>
                            </div>
                        </div>

                    </div> -->

                    <input type="number" value="1" id="PageNumber" name="PageNumber" hidden>


                </form>
            </div>


            <div class="container-fluid px-1 px-lg-2" id="ViewData">


            </div>






        </section>

    </main>



    <!-- Footer include -->
    <?php include('../MAIN/Footer.php'); ?>




    <script>

        ShowReligion();
        ShowEducationCat();
        ShowJobCat();
        ShowCountry();
        ShowStar();
        ShowDistrict();
       


        VirtualSelect.init({
            ele: '.Newselect',
            //multiple: true
        });

        $('#page_length').change(function() {
            $('#PageNumber').val('1');
        });



        $('#FilterData').submit(function(e) {
            e.preventDefault();
            //console.log('submit');
            var FilterFormData = new FormData(this);
            //console.log(FilterFormData);
            $.ajax({
                type: "POST",
                url: "StaffAssignData.php",
                data: FilterFormData,
                success: function(data) {
                    //console.log(data);
                    $('#ViewData').html(data);
                },
                cache: false,
                processData: false,
                contentType: false,

            });
        });


        // Get all religion
        function ShowReligion(){
            var GetReligion = 'FetchReligion';
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetReligion: GetReligion
                },
                success: function(data) {
                    //console.log(data);
                    var ResultReligionData = JSON.parse(data);
                    document.querySelector('.SelectReligion').setOptions(ResultReligionData);
                }
            });
        }


        //Get all education categories
        function ShowEducationCat(){
            var GetEducationCat = 'FetchEducationCat';
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetEducationCat: GetEducationCat
                },
                success: function(data) {
                    //console.log(data);
                    var ResultEducationCatData = JSON.parse(data);
                    document.querySelector('.SelectEdCat').setOptions(ResultEducationCatData);
                }
            });
        }


        //Get all job categories
        function ShowJobCat(){
            var GetJobCat = 'FetchJobCat';
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetJobCat: GetJobCat
                },
                success: function(data) {
                    //console.log(data);
                    var ResultJobCatData = JSON.parse(data);
                    document.querySelector('.SelectJobCat').setOptions(ResultJobCatData);
                }
            });
        }


        //Get all country
        function ShowCountry(){
            var GetCountry = 'FetchCountry';
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetCountry: GetCountry
                },
                success: function(data) {
                    //console.log(data);
                    var ResultCountryData = JSON.parse(data);
                    document.querySelector('.SelectCountry').setOptions(ResultCountryData);
                }
            });
        }


        //Get all star
        function ShowStar(){
            var GetStar = 'FetchStar';
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetStar: GetStar
                },
                success: function(data) {
                    //console.log(data);
                    var ResultStarData = JSON.parse(data);
                    document.querySelector('.SelectStar').setOptions(ResultStarData);
                }
            });
        }


        //Get all district
        function ShowDistrict(){
            var GetDistrict = 'FetchDistrict';
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetDistrict: GetDistrict
                },
                success: function(data) {
                    //console.log(data);
                    var ResultDistrictData = JSON.parse(data);
                    document.querySelector('.SelectDistrict').setOptions(ResultDistrictData);
                }
            });
        }

        

        
        

        $('.SelectReligion').change(function() {
            var ReligionId = $(this).val();
            //console.log(ReligionId);
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    ReligionId: ReligionId
                },
                success: function(data) {
                    //console.log(data);
                    var ResultCasteData = JSON.parse(data);
                    document.querySelector('.SelectCaste').setOptions(ResultCasteData);
                }
            });
        });


        $('.SelectEdCat').change(function() {
            var EdCatId = $(this).val();
            //console.log(EdCatId);
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    EdCatId: EdCatId
                },
                success: function(data) {
                    //console.log(data);
                    var ResultEdTypeData = JSON.parse(data);
                    document.querySelector('.SelectEdType').setOptions(ResultEdTypeData);
                }
            });
        });


        $('.SelectJobCat').change(function() {
            var JobCatId = $(this).val();
            //console.log(JobCatId);
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    JobCatId: JobCatId
                },
                success: function(data) {
                    //console.log(data);
                    var ResultJobTypeData = JSON.parse(data);
                    document.querySelector('.SelectJobType').setOptions(ResultJobTypeData);
                }
            });
        });


        $('.SelectCountry').change(function() {
            var CountryId = $(this).val();
            //console.log(CountryId);
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    CountryId: CountryId
                },
                success: function(data) {
                    //console.log(data);
                    var ResultStateData = JSON.parse(data);
                    document.querySelector('.SelectState').setOptions(ResultStateData);
                }
            });
        });


        $('#selectAllCustomers').click(function() {
            
            var DataChoosen = $('#member_data').val();
            if(DataChoosen == 'FD'){
                $('.customersSelect').prop('checked', this.checked);
            }else if(DataChoosen == 'BD'){
                $('.bulkSelect').prop('checked', this.checked);
            }
            else{
                $('.paidSelect').prop('checked', this.checked);
            }

        });



        //Assign Staff
        $('#assignCustomers').click(function() {
            var SelectedCustomers = [];
            var StaffAssignId = $('#member_staff').val();
            var DataType = $('#member_data').val();
            if(DataType == 'FD'){
                $('.customersSelect:checked').each(function() {
                    SelectedCustomers.push($(this).val());
                });
            }else if(DataType == 'BD'){
                $('.bulkSelect:checked').each(function() {
                    SelectedCustomers.push($(this).val());
                });
            }
            else{
                $('.paidSelect:checked').each(function() {
                    SelectedCustomers.push($(this).val());
                });
            }
            console.log(SelectedCustomers);
            console.log(StaffAssignId);
            console.log(DataType);
            $.ajax({
                type: "POST",
                url: "MasterOperations.php",
                data: {
                    StaffAssignId: StaffAssignId,
                    SelectedCustomers: SelectedCustomers,
                    DataType:DataType
                },
                success: function(data) {
                    console.log(data);
                    var AssignResult = JSON.parse(data);
                    if (AssignResult.Success == 1) {
                        $('#FilterData').submit();
                        toastr.success('Assigned');
                    } else {
                        toastr.error('failed');
                    }
                }
            });
        });


        //Un Assign Staff
        $('#unassignCustomers').click(function() {
            var UnAssignCustomers = [];
            var StaffUnAssignId = $('#member_staff').val();
            var DataType = $('#member_data').val();
            if(DataType == 'FD'){
                $('.customersSelect:checked').each(function() {
                    UnAssignCustomers.push($(this).val());
                });
            }else if(DataType == 'BD'){
                $('.bulkSelect:checked').each(function() {
                    UnAssignCustomers.push($(this).val());
                });
            }
            else{
                $('.paidSelect:checked').each(function() {
                    UnAssignCustomers.push($(this).val());
                });
            }
            console.log(UnAssignCustomers);
            console.log(StaffUnAssignId);
            console.log(DataType);
            $.ajax({
                type: "POST",
                url: "MasterOperations.php",
                data: {
                    StaffUnAssignId: StaffUnAssignId,
                    UnAssignCustomers: UnAssignCustomers,
                    DataType:DataType
                },
                success: function(data) {
                    console.log(data);
                    var UnAssignResult = JSON.parse(data);
                    if (UnAssignResult.UnAssign == 1) {
                        $('#FilterData').submit();
                        toastr.success('UnAssigned');
                    } else {
                        toastr.error('failed');
                    }
                }
            });
        });



        $('.SelectBranch').change(function() {
            GetStaff();
            var SelectBranch = $(this).val();
            $.ajax({
                type: "POST",
                url: "MasterExtras.php",
                data: {
                    SelectBranch: SelectBranch
                },
                success: function(data) {
                    //console.log(data);
                    $('.selectAgency').html(data);
                }
            });
        });


        $('.selectAgency').change(function() {
            var SelectAgency = $(this).val();
            $.ajax({
                type: "POST",
                url: "MasterExtras.php",
                data: {
                    SelectAgency: SelectAgency
                },
                success: function(data) {
                    //console.log(data);
                    $('.selectStaff').html(data);
                }
            });
        });



        //find staff with agency and branch
        function GetStaff() {
            var StaffWithoutBranch = 'StaffNoBranch';
            $.ajax({
                type: "POST",
                url: "MasterExtras.php",
                data: {
                    StaffWithoutBranch: StaffWithoutBranch
                },
                success: function(data) {
                    //console.log(data);
                    $('.selectStaff').html(data);
                }
            });
        }



        $('#clearAll').click(function(){
            $('#FilterData')[0].reset();
            $('#FilterData').submit();
        });
    </script>





</body>

</html>