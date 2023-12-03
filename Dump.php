<?php

$PageTitle = 'AgencyMaster';
include '../MAIN/Dbconfig.php';

if (isset($_COOKIE['custidcookie']) && isset($_COOKIE['custtypecookie'])) {
    if (!empty($_COOKIE['custtoken'])) {
        if ($_COOKIE['custtypecookie'] == 1) {
            $Token = $_COOKIE['custtoken'];
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
        /* --------  Laptop Profile View And Edit Start-------- */
        .profileEditMain {
            background-color: #00ccfd;
            text-align: center;
            min-height: 10px !important;
        }

        .profileEditfirst {
            border-radius: 10px 0 0 10px;
            background-color: #00ccfd;
            text-align: center;
            min-height: 10px !important;
        }

        .profileEditlast {
            background-color: #00ccfd;
            text-align: center;
            min-height: 10px !important;
            border-radius: 0 10px 10px 0;
        }

        @media screen and (max-width:991px) {
            .profileEditfirst {
                border-radius: 10px;

            }

            .profileEditlast {
                border-radius: 10px;
            }
        }

        .editContent {
            font-size: 20px;
            border-right: 2px solid black;
        }

        .lastEditContent {
            font-size: 20px;
        }

        .editHeading {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            color: #078bd7;
            font-size: 20px;
        }

        .packagedetails {
            background-color: rgb(215, 214, 211);
            border-color: rgb(215, 214, 211);
        }

        .editPage {
            border: 1px solid rgb(244, 243, 243);
            border-radius: 10px;
            padding: 0;

        }

        @media screen and (max-width:991px) {
            .profileEditMain {
                background-color: #00ccfd;
                border-radius: 10px;
                text-align: center;
                min-height: 10px !important;

            }

            .editContent {
                font-size: 20px;
                border-right: none;
            }
        }

        .preferenceEditPage {
            border: 1px solid rgb(244, 243, 243) !important;
            border-radius: 10px !important;
            color: rgb(241, 20, 152) !important;
            background-color: #fee7f8 !important;
            font-size: 25px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .editBg {
            background-color: #fee7f8;
        }

        .selectBorder {
            border: none;
            font-family: Arial, Helvetica, sans-serif;
            padding: 0;
        }

        .selectBdr {
            padding: 0%;
            margin: 3%;
            border-radius: 10px;
            border-color: #06b7fb;
        }

        @media screen and (max-width:480px) {
            .editHeading {
                font-size: medium;
                margin-top: 15px;
            }
        }

        .btnlightgreen {
            border-radius: 6px;
            padding: 2px 12px;
            background-color: #08f03e;
            box-shadow: -2px 2px 2px rgb(155, 155, 155);
            border: none;
            color: white;
            font-size: 18px;
            font-family: "Averia Serif Libre";
            margin-right: 0;
        }

        .form-select {
            /* background-image: url("data:image/svg+xml;utf8,<svg fill='black' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/><path d='M0 0h24v24H0z' fill='none'/></svg>"); */
            background-image: url("../IMAGES/DownArrow.png");


        }

        #SaveCustomer input,
        #SaveCustomer select {
            box-shadow: none !important;
        }

        /* --------  Laptop Profile View And Edit End-------- */
    </style>

</head>

<body>




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

                <form id="SaveCustomer">




                    <div class="row">
                        <!-- Section 1 -->
                        <div class="col-xl-4 col-lg-4 col-12 ps-4 ">

                            <div class="row ">
                                <div class="col-6 col-xl-6">
                                    <h4 class="editHeading ps-2">BASIC DETAILS</h4>
                                </div>
                                <div class="col-6 text-end pe-0">
                                    <button class="btnLightblue p-0 px-2 mb-2"><i class="ri-edit-box-line p-0"></i>&nbsp;&nbsp; Edit</button>
                                </div>
                            </div>
                            <div class="row editPage packagedetails">
                                <div class="col-6 ">
                                    <p class="mb-0">Package</p>
                                </div>
                                <div class="col-6 ">
                                    <p class="mb-0">Gold Plus-2500</p>
                                </div>
                            </div>
                            <div class="row editPage packagedetails">
                                <div class="col-6 ">
                                    <p class="mb-0">Create Date</p>
                                </div>
                                <div class="col-6 ">
                                    <p class="mb-0">30-10-2021</p>
                                </div>
                            </div>
                            <div class="row editPage packagedetails">
                                <div class="col-6">
                                    <p class="mb-0">Last Log Date</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0">30-4-2022</p>
                                </div>
                            </div>
                            <div class="row editPage packagedetails">
                                <div class="col-6 ">
                                    <p class="mb-0">Expiry Date</p>
                                </div>
                                <div class="col-6 ">
                                    <p class="mb-0">30-10-2022</p>
                                </div>
                            </div>




                            <div class="row editPage ">
                                <div class="col-6 ">
                                    <p class="mb-0">Profile ID</p>
                                </div>
                                <div class="col-6 ">
                                    <input class="form-control selectBorder" id="profile_id" name="ProfileId" type="text">
                                </div>
                            </div>

                            <div class="row editPage ">
                                <div class="col-6 ">
                                    <p class="mb-0 ">Bride/Groom Name</p>
                                </div>
                                <div class="col-6 ">
                                    <input class="form-control selectBorder" id="profile_name" name="ProfileName" type="text" placeholder="">
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 ">Gender</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="gender" name="Gender">
                                        <option value="Male"> Male</option>
                                        <option value="Female"> Female</option>
                                        <option value="Other"> Others</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 ">Age & Date of Birth</p>
                                </div>
                                <div class="col-6">
                                    <input class="form-control selectBorder" id="dob" name="DOB" type="date">
                                </div>
                            </div>

                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 ">Profile Created by</p>
                                </div>
                                <div class="col-6">
                                    <input class="form-control selectBorder" id="profile_created" name="ProfileCreated" type="text" placeholder="">
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 ">Height</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="height" name="Height">
                                        <option value="120 cm - 3 Ft 11 in">120 cm - 3 Ft 11 In</option>
                                        <option value="121 cm - 3 Ft 12 In">121 cm - 3 Ft 12 In</option>
                                        <option value="122 cm - 4 Ft 0 in">122 cm - 4 Ft 0 In</option>
                                        <option value="123 cm - 4 Ft 0 in">123 cm - 4 Ft 0 In</option>
                                        <option value="124 cm - 4 Ft 1 In">124 cm - 4 Ft 1 In</option>
                                        <option value="125 cm - 4 Ft 1 In">125 cm - 4 Ft 1 In</option>
                                        <option value="126 cm - 4 Ft 2 In">126 cm - 4 Ft 2 In</option>
                                        <option value="127 cm - 4 Ft 2 In">127 cm - 4 Ft 2 In</option>
                                        <option value="128 cm - 4 Ft 2 In">128 cm - 4 Ft 2 In</option>
                                        <option value="129 cm - 4 Ft 3 In">129 cm - 4 Ft 3 In</option>
                                        <option value="130 cm - 4 Ft 3 In">130 cm - 4 Ft 3 In</option>
                                        <option value="131 cm - 4 Ft 4 In">131 cm - 4 Ft 4 In</option>
                                        <option value="132 cm - 4 Ft 4 In">132 cm - 4 Ft 4 In</option>
                                        <option value="133 cm - 4 Ft 4 In">133 cm - 4 Ft 4 In</option>
                                        <option value="134 cm - 4 Ft 5 in">134 cm - 4 Ft 5 In</option>
                                        <option value="135 cm - 4 Ft 5 In">135 cm - 4 Ft 5 In</option>
                                        <option value="136 cm - 4 Ft 6 In">136 cm - 4 Ft 6 In</option>
                                        <option value="137 cm - 4 Ft 6 In">137 cm - 4 Ft 6 In</option>
                                        <option value="138 cm - 4 Ft 6 In">138 cm - 4 Ft 6 In</option>
                                        <option value="139 cm - 4 Ft 7 In">139 cm - 4 Ft 7 In</option>
                                        <option value="140 cm - 4 Ft 7 In">140 cm - 4 Ft 7 In</option>
                                        <option value="141 cm - 4 Ft 8 In">141 cm - 4 Ft 8 In</option>
                                        <option value="142 cm - 4 Ft 8 In">142 cm - 4 Ft 8 In</option>
                                        <option value="143 cm - 4 Ft 8 In">143 cm - 4 Ft 8 In</option>
                                        <option value="144 cm - 4 Ft 9 In">144 cm - 4 Ft 9 In</option>
                                        <option value="145 cm - 4 Ft 9 In">145 cm - 4 Ft 9 In</option>
                                        <option value="146 cm - 4 Ft 9 In">146 cm - 4 Ft 9 In</option>
                                        <option value="147 cm - 4 Ft 10 In">147 cm - 4 Ft 10 In</option>
                                        <option value="148 cm - 4 Ft 10 In">148 cm - 4 Ft 10 In</option>
                                        <option value="149 cm - 4 Ft 11 In">149 cm - 4 Ft 11 In</option>
                                        <option value="150 cm - 4 Ft 11 In">150 cm - 4 Ft 11 In</option>
                                        <option value="151 cm - 4 Ft 11 In">151 cm - 4 Ft 11 In</option>
                                        <option value="152 cm - 5 Ft 0 In">152 cm - 5 Ft 0 In</option>
                                        <option value="153 cm - 5 Ft 0 In">153 cm - 5 Ft 0 In</option>
                                        <option value="154 cm - 5 Ft 1 In">154 cm - 5 Ft 1 In</option>
                                        <option value="155 cm - 5 Ft 1 In">155 cm - 5 Ft 1 In</option>
                                        <option value="156 cm - 5 Ft 1 In">156 cm - 5 Ft 1 In</option>
                                        <option value="157 cm - 5 Ft 2 In">157 cm - 5 Ft 2 In</option>
                                        <option value="158 cm - 5 Ft 2 In">158 cm - 5 Ft 2 In</option>
                                        <option value="159 cm - 5 Ft 3 In">159 cm - 5 Ft 3 In</option>
                                        <option value="160 cm - 5 Ft 3 In">160 cm - 5 Ft 3 In</option>
                                        <option value="161 cm - 5 Ft 3 In">161 cm - 5 Ft 3 In</option>
                                        <option value="162 cm - 5 Ft 4 In">162 cm - 5 Ft 4 In</option>
                                        <option value="163 cm - 5 Ft 4 In">163 cm - 5 Ft 4 In</option>
                                        <option value="164 cm - 5 Ft 5 In">164 cm - 5 Ft 5 In</option>
                                        <option value="165 cm - 5 Ft 5 In">165 cm - 5 Ft 5 In</option>
                                        <option value="166 cm - 5 Ft 5 In">166 cm - 5 Ft 5 In</option>
                                        <option value="167 cm - 5 Ft 6 In">167 cm - 5 Ft 6 In</option>
                                        <option value="168 cm - 5 Ft 6 In">168 cm - 5 Ft 6 In</option>
                                        <option value="169 cm - 5 Ft 7 In">169 cm - 5 Ft 7 In</option>
                                        <option value="170 cm - 5 Ft 7 In">170 cm - 5 Ft 7 In</option>
                                        <option value="171 cm - 5 Ft 7 In">171 cm - 5 Ft 7 In</option>
                                        <option value="172 cm - 5 Ft 8 In">172 cm - 5 Ft 8 In</option>
                                        <option value="173 cm - 5 Ft 8 In">173 cm - 5 Ft 8 In</option>
                                        <option value="174 cm - 5 Ft 9 In">174 cm - 5 Ft 9 In</option>
                                        <option value="175 cm - 5 Ft 9 In">175 cm - 5 Ft 9 In</option>
                                        <option value="176 cm - 5 Ft 9 In">176 cm - 5 Ft 9 In</option>
                                        <option value="177 cm - 5 Ft 10 In">177 cm - 5 Ft 10 In</option>
                                        <option value="178 cm - 5 Ft 10 In">178 cm - 5 Ft 10 In</option>
                                        <option value="179 cm - 5 Ft 10 In">179 cm - 5 Ft 10 In</option>
                                        <option value="180 cm - 5 Ft 11 In">180 cm - 5 Ft 11 In</option>
                                        <option value="181 cm - 5 Ft 11 In">181 cm - 5 Ft 11 In</option>
                                        <option value="182 cm - 6 Ft 0 In">182 cm - 6 Ft 0 In</option>
                                        <option value="183 cm - 6 Ft 0 In">183 cm - 6 Ft 0 In</option>
                                        <option value="184 cm - 6 Ft 0 In">184 cm - 6 Ft 0 In</option>
                                        <option value="185 cm - 6 Ft 1 In">185 cm - 6 Ft 1 In</option>
                                        <option value="186 cm - 6 Ft 1 In">186 cm - 6 Ft 1 In</option>
                                        <option value="187 cm - 6 Ft 2 In">187 cm - 6 Ft 2 In</option>
                                        <option value="188 cm - 6 Ft 2 In">188 cm - 6 Ft 2 In</option>
                                        <option value="189 cm - 6 Ft 2 In">189 cm - 6 Ft 2 In</option>
                                        <option value="190 cm - 6 Ft 3 In">190 cm - 6 Ft 3 In</option>
                                        <option value="191 cm - 6 Ft 3 In">191 cm - 6 Ft 3 In</option>
                                        <option value="192 cm - 6 Ft 4 In">192 cm - 6 Ft 4 In</option>
                                        <option value="193 cm - 6 Ft 4 In">193 cm - 6 Ft 4 In</option>
                                        <option value="194 cm - 6 Ft 4 In">194 cm - 6 Ft 4 In</option>
                                        <option value="195 cm - 6 Ft 5 In">195 cm - 6 Ft 5 In</option>
                                        <option value="196 cm - 6 Ft 5 In">196 cm - 6 Ft 5 In</option>
                                        <option value="197 cm - 6 Ft 6 In">197 cm - 6 Ft 6 In</option>
                                        <option value="198 cm - 6 Ft 6 in">198 cm - 6 Ft 6 in</option>
                                        <option value="199 cm - 6 Ft 6 In">199 cm - 6 Ft 6 In</option>
                                        <option value="200 cm - 6 Ft 7 In">200 cm - 6 Ft 7 In</option>
                                        <option value="201 cm - 6 Ft 7 In">201 cm - 6 Ft 7 In</option>
                                        <option value="202 cm - 6 Ft 8 In">202 cm - 6 Ft 8 In</option>
                                        <option value="203 cm - 6 Ft 8 In">203 cm - 6 Ft 8 In</option>
                                        <option value="204 cm - 6 Ft 8 In">204 cm - 6 Ft 8 In</option>
                                        <option value="205 cm - 6 Ft 9 In">205 cm - 6 Ft 9 In</option>
                                        <option value="206 cm - 6 Ft 9 In">206 cm - 6 Ft 9 In</option>
                                        <option value="207 cm - 6 Ft 9 In">207 cm - 6 Ft 9 In</option>
                                        <option value="208 cm - 6 Ft 10 In">208 cm - 6 Ft 10 In</option>
                                        <option value="209 cm - 6 Ft 10 In">209 cm - 6 Ft 10 In</option>
                                        <option value="210 cm - 6 Ft 11 in">210 cm - 6 Ft 11 in</option>
                                        <option value="211 cm - 6 Ft 11 In">211 cm - 6 Ft 11 In</option>
                                        <option value="212 cm - 6 Ft 11 In">212 cm - 6 Ft 11 In</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 ">Weight</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="weight" name="Weight">
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                        <option value="44">44</option>
                                        <option value="45">45</option>
                                        <option value="46">46</option>
                                        <option value="47">47</option>
                                        <option value="48">48</option>
                                        <option value="49">49</option>
                                        <option value="50">50</option>
                                        <option value="51">51</option>
                                        <option value="52">52</option>
                                        <option value="53">53</option>
                                        <option value="54">54</option>
                                        <option value="55">55</option>
                                        <option value="56">56</option>
                                        <option value="57">57</option>
                                        <option value="58">58</option>
                                        <option value="59">59</option>
                                        <option value="60">60</option>
                                        <option value="61">61</option>
                                        <option value="62">62</option>
                                        <option value="63">63</option>
                                        <option value="64">64</option>
                                        <option value="65">65</option>
                                        <option value="66">66</option>
                                        <option value="67">67</option>
                                        <option value="68">68</option>
                                        <option value="69">69</option>
                                        <option value="70">70</option>
                                        <option value="71">71</option>
                                        <option value="72">72</option>
                                        <option value="73">73</option>
                                        <option value="74">74</option>
                                        <option value="75">75</option>
                                        <option value="76">76</option>
                                        <option value="77">77</option>
                                        <option value="78">78</option>
                                        <option value="79">79</option>
                                        <option value="80">80</option>
                                        <option value="81">81</option>
                                        <option value="82">82</option>
                                        <option value="83">83</option>
                                        <option value="84">84</option>
                                        <option value="85">85</option>
                                        <option value="86">86</option>
                                        <option value="87">87</option>
                                        <option value="88">88</option>
                                        <option value="89">89</option>
                                        <option value="90">90</option>
                                        <option value="91">91</option>
                                        <option value="92">92</option>
                                        <option value="93">93</option>
                                        <option value="94">94</option>
                                        <option value="95">95</option>
                                        <option value="96">96</option>
                                        <option value="97">97</option>
                                        <option value="98">98</option>
                                        <option value="99">99</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 ">Complexion</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="complexion" name="Complexion">
                                        <option hidden value="">Complexion</option>
                                        <option value="Dark">Dark</option>
                                        <option value="Fair">Fair</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Very Fair">Very Fair</option>
                                        <option value="Wheatish">Wheatish</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">Body Type</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="body_type" name="BodyType">
                                        <option hidden value="">Body</option>
                                        <option value="Slim">Slim</option>
                                        <option value="Average">Average</option>
                                        <option value="Athletic">Athletic</option>
                                        <option value="Heavy">Heavy</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">Matrial Status</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="matrial_status" name="MatrialStatus">
                                        <option disabled selected value="">Marital Status</option>
                                        <option value="Un Married">Un Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Widow/ Widower">Widow/ Widower</option>
                                        <option value="Awaiting Divorce">Awaiting Divorce</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">No of Child</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="no_of_child" name="NoOfChild">
                                        <option hidden value="">No of Child</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">Phys Status</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="phys_status" name="PhysStatus">
                                        <option hidden value="">Phys Status</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Blind">Blind</option>
                                        <option value="Deaf/Dump">Deaf/Dump</option>
                                        <option value="Handicapped">Handicapped</option>
                                        <option value="Mentally Challenged">Mentally Challenged</option>
                                        <option value="Physically Challenged">Physically Challenged</option>
                                        <option value="With other Disability">With other Disability</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">Native Place</p>
                                </div>
                                <div class="col-6">
                                    <input class="form-control selectBorder" id="native_place" name="NativePlace" type="text" placeholder="">
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">Mother Tongue</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select ShowMothertongue selectBorder" id="mother_tongue" name="MotherTongue">
                                        <option value="">Mother Tongue</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">Blood Group</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="blood_group" name="BloodGroup">
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">Marriage Plan</p>
                                </div>
                                <div class="col-6">
                                    <input class="form-control selectBorder" id="marriage_plan" name="MarriagePlan" type="text" placeholder="">
                                </div>
                            </div>

                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">About Myself</p>
                                </div>
                                <div class="col-6">
                                    <textarea class="form-control selectBorder" id="about_myself" rows="1"></textarea>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">Upload Id Proof</p>
                                </div>
                                <div class="col-6">
                                    <input class="form-control selectBorder" id="upload_idproof" name="UploadIdProof" type="file">
                                </div>
                            </div>
                        </div>


                        <div class="col-12 col-lg-8 px-4">
                            <div class="row">

                                <!-- Section 2 -->
                                <div class="col-xl-6 col-lg-6 col-12 ">
                                    <h4 class="editHeading ps-4">RELIGIOUS DETAILS</h4>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Religion</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select ShowReligion selectBorder" id="religion" name="Religion">
                                                <option value=""> Religion</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Cast</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select ShowCaste selectBorder" id="cast" name="Cast">
                                                <option value=""> Caste</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Sub Caste</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select ShowSubCaste selectBorder" id="sub_caste" name="SubCaste">
                                                <option> Sub Caste</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Caste No Bar</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select  selectBorder" id="caste_no_bar" name="CasteNoBar">
                                                <option> Yes</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0"> Star</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select ShowAllStar selectBorder" id="star" name="Star">

                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Chovva Dosham</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select  selectBorder" id="chovva_dosham" name="ChovvaDosham">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Type of Jathakam</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select  selectBorder" id="type_jathakam" name="TypeJathakam">
                                                <option hidden value="">Type of Jathakam</option>
                                                <option value="Normal Jadhakam">Normal Jadhakam</option>
                                                <option value="Sudha Jadhakam">Sudha Jadhakam</option>
                                                <option value="Paapa Jadhakam">Paapa Jadhakam</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Parish/SNDP/NSS/Mahal</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>

                                    <h4 class="editHeading ps-4">PROFESSION DETAILS</h4>


                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Education Category</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select selectBorder ShowEduCat" id="education_category" name="EducationCategory">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Education Type</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select selectBorder ShowEduType" id="education_type" name="EducationType">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Education Details</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="education_details" name="EducationDetails" type="text" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Job Category</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select selectBorder ShowJobCategory" id="job_category" name="JobCategory">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Job Type</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select selectBorder ShowJobType" id="job_type" name="JobType">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Job Detail and Official Address </p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="job_detail" name="JobDetail" type="text" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Job Location Country</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select selectBorder Country JobCountry" id="job_location_country" name="JobLocationCountry">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Job Location State</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select selectBorder JobState" id="job_location_state" name="JobLocationState">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Job Location District</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select selectBorder JobDistrict" id="job_location_district" name="JobLocationDistrict">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Job Location City</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select selectBorder JobCity" id="job_location_city" name="JobLocationCity">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Monthly Income</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="monthly_income" name="MonthlyIncome" type="text" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <!-- Section 3 -->
                                <div class="col-xl-6 col-lg-6 col-12 ps-4">
                                    <h4 class="editHeading ps-4">FAMILY DETAILS</h4>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Father's Name</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="father_name" name="FatherName" type="text" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Father's Education</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select  selectBorder AllEduTypes" id="father_education" name="FatherEducation">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Father's Job</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select selectBorder ShowJobType" id="father_job" name="FatherJob">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Father's Job Details</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="father_job_details" name="FatherJobDetails" type="text" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Mother's Name</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="mother_name" name="MotherName" type="text" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Mother's Education</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select selectBorder AllEduTypes" id="mother_education" name="MotherEducation">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Mother's Job </p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select selectBorder ShowJobType" id="mother_job" name="MotherJob">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Mother's Job Detail </p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="mother_job_detail" name="MotherJobDetail" type="text" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Married Brothers</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select  selectBorder" id="married_brothers" name="MarriedBrothers">
                                                <option hidden value="0">Choose</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Married Sisters</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select  selectBorder" id="married_sister" name="MarriedSister">
                                                <option hidden value="0">Choose</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Unmarried Brothers</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select  selectBorder" id="unmarried_brothers" name="UnmarriedBrothers">
                                                <option hidden value="0">Choose</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Unmarried Sisters </p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select  selectBorder" id="unmarried_sisters" name="UnmarriedSisters">
                                                <option hidden value="0">Choose</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Job Profile Of Sibling</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="job_sibling" name="JobSibling" type="text" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Guardian (If Any)</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="guardian" name="Guardian" type="text" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Ancestral / Family Orgin</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="family_orgin" name="FamilyOrgin" type="text" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Family Values</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="family_values" name="FamilyValues" type="text" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Family Type </p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select  selectBorder" id="family_type" name="FamilyType">
                                                <option hidden value="">Choose</option>
                                                <option value="Nuclear">Nuclear</option>
                                                <option value="Joint">Joint</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Financial Status</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select  selectBorder" id="financial_status" name="FinancialStatus">
                                                <option hidden value="">Financial Status</option>
                                                <option value="Middle class">Middle class</option>
                                                <option value="Upper middle class">Upper middle class</option>
                                                <option value="Lower class">Lower class</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Home Type</p>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select  selectBorder" id="home_type" name="HomeType">
                                                <option hidden value="">Choose</option>
                                                <option value="Traditional">Traditional</option>
                                                <option value="Moderate">Moderate</option>
                                                <option value="Liberal">Liberal</option>
                                                <option value="Orthodox">Orthodox</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Candidates Share Details</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="candidates_share" name="CandidatesShare" type="text" placeholder="">
                                        </div>
                                    </div>
                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">About Family</p>
                                        </div>
                                        <div class="col-6">
                                            <textarea class="form-control selectBorder" id="about_family" rows="1"></textarea>
                                        </div>
                                    </div>
                                    <div class="row editPage">
                                        <div class="col-6">
                                            <p class="mb-0">Upload Home Images</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control selectBorder" id="upload_home_image" name="UploadHomeImage" type="file">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- <div class="col-6 px-4">
                            <div class="row editPage">
                                <div class="col-4">
                                    <p class="mb-0">About Myself</p>
                                </div>
                                <div class="col-8">
                                    <textarea class="form-control" id="about_myself" rows="1"></textarea>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="col-6 px-4">
                            <div class="row editPage">
                                <div class="col-4">
                                    <p class="mb-0">About Family</p>
                                </div>
                                <div class="col-8">
                                    <textarea class="form-control" id="about_family" rows="1"></textarea>
                                </div>
                            </div>
                        </div> -->


                    </div>


                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-12 px-4">
                            <h4 class="editHeading ps-4 my-3">LIFE STYLE</h4>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0">Eating Habits</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="" name="">
                                        <option value="Eggetaria'">Eggetarian</option>
                                        <option value="Non Veg">Non Veg</option>
                                        <option value="Veg">Veg</option>
                                        <option value="Occasionally Non - Veg">Occasionally Non - Veg</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 py-1">Drinking Habits</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="" name="">
                                        <option value="Daily">Daily</option>
                                        <option value="Never">Never</option>
                                        <option value="Occasionally">Occasionally</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 py-1">Smoking Habits</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="" name="">
                                        <option value="Daily">Daily</option>
                                        <option value="Never">Never</option>
                                        <option value="Occasionally">Occasionally</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 py-1">Language Known</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="" name="" aria-label="Default select example">
                                        <option value="Arabic'">Arabic</option>
                                        <option value="English'">English</option>
                                        <option value="French'">French</option>
                                        <option value="Gujarati'">Gujarati</option>
                                        <option value="Hindi'">Hindi</option>
                                        <option value="Kannada'">Kannada</option>
                                        <option value="Konkani'">Konkani</option>
                                        <option value="Malayalam'">Malayalam</option>
                                        <option value="Punjabi'">Punjabi</option>
                                        <option value="Tamil'">Tamil</option>
                                        <option value="Telugu'">Telugu</option>
                                        <option value="Others'">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 py-1">Hobbies</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="" name="" aria-label="Default select example">
                                        <option value="'Art and handicraft'">Art and handicraft</option>
                                        <option value="'Billiards'">Billiards</option>
                                        <option value="'Coin Collection'">Coin Collection</option>
                                        <option value="'Cricket'">Cricket</option>
                                        <option value="'Cycling'">Cycling</option>
                                        <option value="'Dancing'">Dancing</option>
                                        <option value="'Drawing and painting'">Drawing and painting</option>
                                        <option value="'Dress designing'">Dress designing</option>
                                        <option value="'Gardening'">Gardening</option>
                                        <option value="'Internet surfing'">Internet surfing</option>
                                        <option value="'Pool'">Pool</option>
                                        <option value="'Reading'">Reading</option>
                                        <option value="'Singing'">Singing</option>
                                        <option value="'Snooker'">Snooker</option>
                                        <option value="'Writing'">Writing</option>
                                        <option value="'Others'">Others</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 py-1">Interests</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select  selectBorder" id="" name="" aria-label="Default select example">
                                        <option value="Browsing internet">Browsing internet</option>
                                        <option value="Chess">Chess</option>
                                        <option value="Cooking">Cooking</option>
                                        <option value="Dance">Dance</option>
                                        <option value="Dancing">Dancing</option>
                                        <option value="Designing">Designing</option>
                                        <option value="Driving">Driving</option>
                                        <option value="Games and puzzles">Games and puzzles</option>
                                        <option value="Movies">Movies</option>
                                        <option value="Music">Music</option>
                                        <option value="Nature">Nature</option>
                                        <option value="Pets">Pets</option>
                                        <option value="Photography">Photography</option>
                                        <option value="Playing musical instruments">Playing musical instruments</option>
                                        <option value="Shopping">Shopping</option>
                                        <option value="Singing">Singing</option>
                                        <option value="Sports">Sports</option>
                                        <option value="Travelling">Travelling</option>
                                        <option value="Watching movies">Watching movies</option>
                                        <option value="Others">Others</option>

                                    </select>
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 py-1">Blog</p>
                                </div>
                                <div class="col-6">
                                    <input class="form-control selectBorder" id="" name="" type="text" placeholder="">
                                </div>
                            </div>


                            <div class="row editPage">
                                <div class="col-6">
                                    <p class="mb-0 py-1">Link Social Network</p>
                                </div>
                                <div class="col-6">
                                    <input class="form-control selectBorder" id="" name="" type="text" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-12  ">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class=" editHeading ps-4 my-3">LOCATION AND CONTACT DETAILS</h4>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 px-4">

                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">Communication Address</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <textarea cols="30" rows="4" class="form-control selectBorder " id=" " name=" " placeholder="  "></textarea>
                                            <!-- <input type="textarea" row="3" class="selectBorder " value="Chirayil House, Karshaka Road, Near Church, 4th House " > -->
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">Permanent Address Country</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <select class="form-select  selectBorder" id="" name="" aria-label="Default select example">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">State</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <select class="form-select  selectBorder" id="" name="" aria-label="Default select example">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">District</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <select class="form-select  selectBorder" id="" name="" aria-label="Default select example">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">City</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <select class="form-select  selectBorder" id="" name="" aria-label="Default select example">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">Residential Status</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <select class="form-select  selectBorder" id="" name="" aria-label="Default select example">
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 px-4">
                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">Whatsapp</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class=" form-control  selectBorder" id="" name="" value=" ">
                                        </div>
                                    </div>
                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">Residence Phone Number</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class=" form-control selectBorder" id="" name="" value=" ">
                                        </div>
                                    </div>
                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">Preferred Contact Number</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class=" form-control selectBorder" id="" name="" value=" ">
                                        </div>
                                    </div>
                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">Contact Person Name</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class=" form-control selectBorder" id="" name="" value=" ">
                                        </div>
                                    </div>
                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">Releationship with Candidate</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class=" form-control  selectBorder" id="" name="" value=" ">
                                        </div>
                                    </div>
                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">Preferred Time to Call</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control selectBorder" id="" name="" value=" ">
                                        </div>
                                    </div>
                                    <div class="row editPage">
                                        <div class="col-lg-6">
                                            <p class="mb-0 py-1">Email</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control selectBorder" id="" name="" value=" ">
                                        </div>
                                    </div>
                                    <div class="row editPage">
                                        <div class="col-lg-6 py-1">
                                            <p class="mb-0 py-1"> </p>
                                        </div>
                                        <div class="col-lg-6 py-1">
                                            <input type="text" class="form-control selectBorder" id="" name="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row d-md-none ">
                        <div class="col-lg-4 col-xl-4 col-12">
                            <h4 class="editHeading ps-4 text-center text-lg-start">HOROSCOPE DETAILS</h4>
                            <div class="row">
                                <div class="col-12">
                                    <label>Time Of Birth</label>
                                </div>
                                <div class="col-6">
                                    <input class="form-control" type="text" id="" name="" placeholder="Hour">
                                </div>
                                <div class="col-6">
                                    <input class="form-control" type="text" id="" name="" placeholder="Minute">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <label>Date Of Birth</label>
                                </div>
                                <div class="col-4">
                                    <input class="form-control" type="text" id="" name="" placeholder="Day">
                                </div>
                                <div class="col-4">
                                    <input class="form-control" type="text" id="" name="" placeholder="Month">
                                </div>
                                <div class="col-4">
                                    <input class="form-control" type="text" id="" name="" placeholder="Year">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label>Place Of Birth</label>
                                </div>
                                <div class="col-4">
                                    <input class="form-control" type="text" id="" name="" placeholder="Country">
                                </div>
                                <div class="col-4">
                                    <input class="form-control" type="text" id="" name="" placeholder="Region">
                                </div>
                                <div class="col-4">
                                    <input class="form-control" type="text" id="" name="" placeholder="Place">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-1">
                                    <label>Janma Sista Dasa Details</label>
                                </div>
                                <div class="col-lg-3 col-6 mt-2">
                                    <input class="form-control" type="text" id="" name="" placeholder="Janma Sista Dasa">
                                </div>
                                <div class="col-lg-3 col-6 mt-2">
                                    <input class="form-control" type="text" id="" name="" placeholder="End Day">
                                </div>
                                <div class="col-lg-3 col-6 mt-2">
                                    <input class="form-control" type="text" id="" name="" placeholder="End Month">
                                </div>
                                <div class="col-lg-3 col-6 mt-2">
                                    <input class="form-control" type="text" id="" name="" placeholder="End Year">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-xl-2 col-lg-2 col-12 text-center">
                                    <label class="mb-3">Upload Horoscope</label>
                                    <button class="btnUpload mb-3">UPLOAD</button> <br>
                                    <label>Horo.jpg</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row mt-2">
                        <div class="col-12 d-none d-md-block mt-2">
                            <h4 class="editHeading ps-4  text-center text-lg-start">HOROSCOPE DETAILS</h4>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-12 ps-4 ">
                            <div class="col-12 d-none d-md-block ">
                                <div class="row">
                                    <div class="col-12">
                                        <label>Time Of Birth</label>
                                    </div>
                                    <div class="col-6">
                                        <input class="form-control" type="text" id="" name="" placeholder="Hour">
                                    </div>
                                    <div class="col-6">
                                        <input class="form-control" type="text" id="" name="" placeholder="Minute">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label>Date Of Birth</label>
                                    </div>
                                    <div class="col-4">
                                        <input class="form-control" type="text" id="" name="" placeholder="Day">
                                    </div>
                                    <div class="col-4">
                                        <input class="form-control" type="text" id="" name="" placeholder="Month">
                                    </div>
                                    <div class="col-4">
                                        <input class="form-control" type="text" id="" name="" placeholder="Year">
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="col-6 d-none d-md-block">
                            <div class="row">
                                <div class="col-12">
                                    <label>Place Of Birth</label>
                                </div>
                                <div class="col-4">
                                    <input class="form-control" type="text" id="" name="" placeholder="Country">
                                </div>
                                <div class="col-4">
                                    <input class="form-control" type="text" id="" name="" placeholder="Region">
                                </div>
                                <div class="col-4">
                                    <input class="form-control" type="text" id="" name="" placeholder="Place">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-1">
                                    <label>Janma Sista Dasa Details</label>
                                </div>
                                <div class="col-lg-3 col-6 mt-2">
                                    <input class="form-control" type="text" id="" name="" placeholder="Janma Sista Dasa">
                                </div>
                                <div class="col-lg-3 col-6 mt-2">
                                    <input class="form-control" type="text" id="" name="" placeholder="End Day">
                                </div>
                                <div class="col-lg-3 col-6 mt-2">
                                    <input class="form-control" type="text" id="" name="" placeholder="End Month">
                                </div>
                                <div class="col-lg-3 col-6 mt-2">
                                    <input class="form-control" type="text" id="" name="" placeholder="End Year">
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-12 text-center d-none d-md-block">
                            <label class="mb-3">Upload Horoscope</label>
                            <button class="btnUpload mb-3">UPLOAD</button> <br>
                            <label>Horo.jpg</label>
                        </div>
                    </div>


                    <div class="row mt-2">
                        <div class="col-xl-6 col-12">
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 col-12 my-3">
                                    <select class="form-select selectBdr" aria-label="Default select example">
                                        <option>Select</option>
                                    </select>
                                    <select class="form-select selectBdr" aria-label="Default select example">
                                        <option>Select</option>
                                    </select>
                                    <select class="form-select selectBdr" aria-label="Default select example">
                                        <option>Select</option>
                                    </select>
                                    <select class="form-select selectBdr" aria-label="Default select example">
                                        <option>Select</option>
                                    </select>
                                    <select class="form-select selectBdr" aria-label="Default select example">
                                        <option>Select</option>
                                    </select>
                                    <select class="form-select selectBdr" aria-label="Default select example">
                                        <option>Select</option>
                                    </select>
                                    <select class="form-select selectBdr" aria-label="Default select example">
                                        <option>Select</option>
                                    </select>
                                    <select class="form-select selectBdr" aria-label="Default select example">
                                        <option>Select</option>
                                    </select>
                                    <select class="form-select selectBdr" aria-label="Default select example">
                                        <option>Select</option>
                                    </select>
                                    <select class="form-select selectBdr" aria-label="Default select example">
                                        <option>Select</option>
                                    </select>
                                    <select class="form-select selectBdr" aria-label="Default select example">
                                        <option>Select</option>
                                    </select>
                                </div>
                                <div class="col-xl-8 col-lg-6 col-12">
                                    <div class="row mx-5 my-3">
                                        <div class="col-3 horoscopeBox">12</div>
                                        <div class="col-3 horoscopeBox border-start-0">1</div>
                                        <div class="col-3 horoscopeBox border-start-0 border-end-0">2</div>
                                        <div class="col-3 horoscopeBox">3</div>
                                        <div class="col-3 horoscopeBox border-top-0">11</div>
                                        <div class="col-3"></div>
                                        <div class="col-3"></div>
                                        <div class="col-3 horoscopeBox border-top-0">4</div>
                                        <div class="col-3 horoscopeBox border-top-0 border-bottom-0">10</div>
                                        <div class="col-3"></div>
                                        <div class="col-3"></div>
                                        <div class="col-3 horoscopeBox border-top-0 border-bottom-0">5</div>
                                        <div class="col-3 horoscopeBox">9</div>
                                        <div class="col-3 horoscopeBox border-start-0">8</div>
                                        <div class="col-3 horoscopeBox border-start-0 border-end-0">7</div>
                                        <div class="col-3 horoscopeBox">6</div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-6 col-12">
                            <div class="row">
                                <div class="  col-xl-4 col-lg-6 col-12 my-3">
                                    <select class=" form-select selectBdr" aria-label="Default select example">
                                        <option>Select</option>
                                    </select>
                                    <select class="form-select selectBdr" aria-label="Default select example">
                                        <option>Select</option>
                                    </select>
                                    <select class="form-select selectBdr" aria-label="Default select example">
                                        <option>Select</option>
                                    </select>
                                    <select class="form-select selectBdr" aria-label="Default select example">
                                        <option>Select</option>
                                    </select>
                                    <select class="form-select selectBdr" aria-label="Default select example">
                                        <option>Select</option>
                                    </select>
                                    <select class="form-select selectBdr" aria-label="Default select example">
                                        <option>Select</option>
                                    </select>
                                    <select class="form-select selectBdr" aria-label="Default select example">
                                        <option>Select</option>
                                    </select>
                                    <select class="form-select selectBdr" aria-label="Default select example">
                                        <option>Select</option>
                                    </select>
                                    <select class="form-select selectBdr" aria-label="Default select example">
                                        <option>Select</option>
                                    </select>
                                    <select class="form-select selectBdr" aria-label="Default select example">
                                        <option>Select</option>
                                    </select>
                                    <select class="form-select selectBdr" aria-label="Default select example">
                                        <option>Select</option>
                                    </select>
                                </div>
                                <div class="col-xl-8 col-lg-6 col-12">
                                    <div class="row mx-5 my-3">
                                        <div class="col-3 horoscopeBox">12</div>
                                        <div class="col-3 horoscopeBox border-start-0">1</div>
                                        <div class="col-3 horoscopeBox border-start-0 border-end-0">2</div>
                                        <div class="col-3 horoscopeBox">3</div>
                                        <div class="col-3 horoscopeBox border-top-0">11</div>
                                        <div class="col-3"></div>
                                        <div class="col-3"></div>
                                        <div class="col-3 horoscopeBox border-top-0">4</div>
                                        <div class="col-3 horoscopeBox border-top-0 border-bottom-0">10</div>
                                        <div class="col-3"></div>
                                        <div class="col-3"></div>
                                        <div class="col-3 horoscopeBox border-top-0 border-bottom-0">5</div>
                                        <div class="col-3 horoscopeBox">9</div>
                                        <div class="col-3 horoscopeBox border-start-0">8</div>
                                        <div class="col-3 horoscopeBox border-start-0 border-end-0">7</div>
                                        <div class="col-3 horoscopeBox">6</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 preferenceEditPage">
                        <div class="col-12">
                            <p class="mb-0 py-1">PARTNER PREFERENCE</p>
                        </div>
                    </div>
                    <div class="row editBg mt-4">
                        <div class="col-12 col-xl-6 col-lg-6">
                            <div class="row editPage">
                                <div class="col-4">
                                    <p class="mb-0 py-1">Age </p>
                                </div>
                                <div class="col-4">
                                    <select class="form-select editBg selectBorder" aria-label="Default select example">
                                        <option>From</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select class="form-select editBg selectBorder" aria-label="Default select example">
                                        <option>to</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-4">
                                    <p class="mb-0 py-1">Height </p>
                                </div>
                                <div class="col-4">
                                    <select class="form-select editBg selectBorder" aria-label="Default select example">
                                        <option>From</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select class="form-select editBg selectBorder" aria-label="Default select example">
                                        <option>to</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">Complexion</p>
                                </div>
                                <div class="col-5">
                                    <select class="form-select editBg selectBorder" aria-label="Default select example">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">Body Type</p>
                                </div>
                                <div class="col-5">
                                    <select class="form-select editBg selectBorder" aria-label="Default select example">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">Marital Status</p>
                                </div>
                                <div class="col-5">
                                    <select class="form-select editBg selectBorder" aria-label="Default select example">
                                        <option>Never Married</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">Religion</p>
                                </div>
                                <div class="col-5">
                                    <select class="form-select editBg selectBorder" aria-label="Default select example">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">Caste</p>
                                </div>
                                <div class="col-5">
                                    <select class="form-select editBg selectBorder" aria-label="Default select example">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">Caste No Bar</p>
                                </div>
                                <div class="col-5">
                                    <select class="form-select editBg selectBorder" aria-label="Default select example">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">Type of Jathakam</p>
                                </div>
                                <div class="col-5">
                                    <select class="form-select editBg selectBorder" aria-label="Default select example">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row preferenceEditPage">
                                <div class="col-12">
                                    <p class="mb-0 py-1">I am Looking For</p>
                                </div>
                            </div>


                        </div>
                        <div class="col-12 col-xl-6 col-lg-6">
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">Matching Stars</p>
                                </div>
                                <div class="col-5">
                                    <select class="form-select editBg selectBorder" aria-label="Default select example">
                                        <option>Revathi</option>
                                        <option>Uthradam</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">Education Category</p>
                                </div>
                                <div class="col-5">
                                    <select class="form-select editBg selectBorder" aria-label="Default select example">
                                        <option>Bachelor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">Education Type</p>
                                </div>
                                <div class="col-5">
                                    <select class="form-select editBg selectBorder" aria-label="Default select example">
                                        <option>B.Com</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">Job Category</p>
                                </div>
                                <div class="col-5">
                                    <select class="form-select editBg selectBorder" aria-label="Default select example">
                                        <option>private Company</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">Job Type</p>
                                </div>
                                <div class="col-5">
                                    <select class="form-select editBg selectBorder" aria-label="Default select example">
                                        <option>Field Executive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">Country</p>
                                </div>
                                <div class="col-5">
                                    <select class="form-select editBg selectBorder" aria-label="Default select example">
                                        <option>India</option>
                                        <option>USA</option>
                                        <option>UK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">State</p>
                                </div>
                                <div class="col-5">
                                    <select class="form-select editBg selectBorder" aria-label="Default select example">
                                        <option>Kerala</option>
                                        <option>Tamilnadu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">District</p>
                                </div>
                                <div class="col-5">
                                    <select class="form-select editBg selectBorder" aria-label="Default select example">
                                        <option>Ernakulam</option>
                                        <option>Thrissur</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="col-7">
                                    <p class="mb-0 py-1">City</p>
                                </div>
                                <div class="col-5">
                                    <select class="form-select editBg selectBorder" aria-label="Default select example">
                                        <option>Aluva</option>
                                        <option>Ankamaly</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row editPage">
                                <div class="row my-2 ">
                                    <div class="col-xl-6 col-lg-6 col-6  text-end">
                                        <button class="btnLightblue  me-3 px-5 py-1 ">Edit</button>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-6  text-start">
                                        <button type="submit" class="btnlightgreen  px-5 py-1 ms-3 ">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-6  text-start mb-4 mt-4">
                            <button class="btnLightblue  me-3 px-4 py-1 ">+Add Photo</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-12 mb-5">
                            <img src="../IMAGES/custProfileEditImg.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12">
                            <img src="../IMAGES/custProfileEditImg.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12">
                            <img src="../IMAGES/custProfileEditImg.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12">
                            <img src="../IMAGES/custProfileEditImg.png" alt="" class="img-fluid">
                        </div>

                    </div>

                </form>

            </div>

            <!-- <div class="loader">
                <div class="">
                    <img class="img-fluid" src="../IMAGES/matrimony.gif">
                    <h4 class="text-center">LOADING</h4>
                </div>
            </div> -->

        </section>


    </main>



    <!-- Footer include -->
    <?php include('../MAIN/Footer.php'); ?>

    <script>
        var Token = '<?= $Token ?>';
        var ApiLink = '<?= $ApiBaseUrl ?>';


        ShowMothertongue();
        ShowAllReligion();
        ShowAllStar();
        ShowAllEducationCat();
        ShowAllJobCat();
        ShowAllJobType();
        ShowAllCountry();
        ShowAllEduTypes();


        //List Mothertongue
        function ShowMothertongue() {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetMothertongue: 'fetch_motherTongue'
                },
                success: function(data) {
                    //console.log(data);
                    $('.ShowMothertongue').html(data);
                }
            });
        }


        //List Religion
        function ShowAllReligion() {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllReligion: 'fetch_all_religion'
                },
                success: function(data) {
                    //console.log(data);
                    $('.ShowReligion').html(data);
                }
            });
        }



        //List Education Category
        function ShowAllEducationCat() {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllEducationCat: 'fetch_all_education_cat'
                },
                success: function(data) {
                    //console.log(data);
                    $('.ShowEduCat').html(data);
                }
            });
        }


        //List Star
        function ShowAllStar() {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllStar: 'fetch_AllStar'
                },
                success: function(data) {
                    //console.log(data);
                    $('.ShowAllStar').html(data);
                }
            });
        }


        //List Job Category
        function ShowAllJobCat() {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllJobCat: 'fetch_AllJobCat'
                },
                success: function(data) {
                    //console.log(data);
                    $('.ShowJobCategory').html(data);
                }
            });
        }



        //List Job Type
        function ShowAllJobType() {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllJobType: 'fetch_AllJobType'
                },
                success: function(data) {
                    //console.log(data);
                    $('.ShowJobType').html(data);
                }
            });
        }


        //List Country
        function ShowAllCountry() {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllCountry: 'fetch_AllCountry'
                },
                success: function(data) {
                    //console.log(data);
                    $('.Country').html(data);
                }
            });
        }


        //List Caste by Religion
        function ShowAllCaste(Religion) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllCaste: Religion
                },
                success: function(data) {
                    //console.log(data);
                    $('.ShowCaste').html(data);
                }
            });
        }


        //Show Subcaste by Caste
        function ShowAllSubCaste(Caste) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllSubCaste: Caste
                },
                success: function(data) {
                    //console.log(data);
                    $('.ShowSubCaste').html(data);
                }
            });
        }


        //Show Education Type By Education Category
        function ShowAllEduType(EduCat) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllEduType: EduCat
                },
                success: function(data) {
                    //console.log(data);
                    $('.ShowEduType').html(data);
                }
            });
        }


        //Show Education Type 
        function ShowAllEduTypes() {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllEduTypes: 'fetch_AllEduType'
                },
                success: function(data) {
                    //console.log(data);
                    $('.AllEduTypes').html(data);
                }
            });
        }


        //List State By Country 
        function ShowAllState(Country, ClassName) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllState: Country
                },
                success: function(data) {
                    //console.log(data);
                    $('.' + ClassName).html(data);
                }
            });
        }


        //List District By State
        function ShowAllDistrict(State, ClassName) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllDistrict: State
                },
                success: function(data) {
                    //console.log(data);
                    $('.' + ClassName).html(data);
                }
            });
        }


        //List City By District By City
        function ShowAllCity(District, ClassName) {
            $.ajax({
                type: "POST",
                url: "FilterExtras.php",
                data: {
                    GetAllCity: District
                },
                success: function(data) {
                    //console.log(data);
                    $('.' + ClassName).html(data);
                }
            });
        }



        //Change Caste By Religion
        $('.ShowReligion').change(function() {
            var ReligionId = $(this).val();
            ShowAllCaste(ReligionId);
        });


        //Change Subcaste By Caste
        $('.ShowCaste').change(function() {
            var CasteId = $(this).val();
            ShowAllSubCaste(CasteId);
        });


        //Change Education Type By Education Category
        $('.ShowEduCat').change(function() {
            var EduCatId = $(this).val();
            ShowAllEduType(EduCatId);
        });



        //Change Job State By Country
        $('.JobCountry').change(function() {
            var CountryId = $(this).val();
            ShowAllState(CountryId, 'JobState');
        });



        //Change Job District By State
        $('.JobState').change(function() {
            var StateId = $(this).val();
            ShowAllDistrict(StateId, 'JobDistrict');
        });



        //Change Job City By District
        $('.JobDistrict').change(function() {
            var DistrictId = $(this).val();
            console.log(DistrictId);
            ShowAllCity(DistrictId, 'JobCity');
        });



        //Free Register Customer
        $('#SaveCustomer').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: ApiLink + "/api/customer/add",
                method: "POST",
                async: true,
                crossDomain: true,
                headers: {
                    "Accept": "application/json",
                    "Authorization": "Bearer " + Token,
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                data: {
                    "profileId": "111",
                    "gender": $('#gender').val(),
                    "fullName": $('#profile_name').val(),
                    "package": 0,
                    "status": 0,
                    "dob": $('#dob').val(),
                    "age": 0,
                    "height": $('#height').val(),
                    "weight": $('#weight').val(),
                    "complexion": $('#complexion').val(),
                    "bodyType": $('#body_type').val(),
                    "maritalStatus": $('#matrial_status').val(),
                    "physicalStatus": $('#phys_status').val(),
                    "nativePlace": $('#native_place').val(),
                    "religion": $('#religion').val(),
                    "caste": $('#cast').val(),
                    "subCaste": $('#sub_caste').val(),
                    "email": "",
                    "star": $('#star').val(),
                    "chovvaDosham": $('#chovva_dosham').val(),
                    "jathakamType": $('#type_jathakam').val(),
                    "educationCat": $('#education_category').val(),
                    "educationType": $('#education_type').val(),
                    "jobCat": $('#job_category').val(),
                    "jobType": $('#job_type').val(),
                    "jobLocCountry": $('#job_location_country').val(),
                    "jobLocState": $('#job_location_state').val(),
                    "jobLocDistrict": $('#job_location_district').val(),
                    "jobLocCity": $('#job_location_city').val(),
                    "monthlyIncome": $('#monthly_income').val(),
                    "financialStatus": $('#financial_status').val(),
                    "registeredNumber": 0,
                    "whatsappNumber": 0,
                    "residencePhoneNumber": 0,
                    "contactPerson": 0,
                    "noofChild": $('#no_of_child').val(),
                    "casteNoBar": $('#caste_no_bar').val(),
                    "eduDetails": $('#education_details').val(),
                    "jobDetails": $('#job_detail').val(),
                    "motherTongue": $('#mother_tongue').val(),
                    "profileFor": $('#profile_created').val(),
                    "bloodGroup": $('#blood_group').val(),
                    "ParishEdavakaSNDPNSSMahal": "",
                    "hopingToMarry": $('#marriage_plan').val(),
                    "communicationAddress": $('#profile_created').val(),
                    "address": $('#profile_created').val(),
                    "permanentAddress": $('#profile_created').val(),
                    "country": 0,
                    "state": 0,
                    "district": 0,
                    "city": 0,
                    "residentialStatus": "",
                    "timeToCall": "",
                    "yearlyIncome": "",
                    "groomLocation": "",
                    "prefferedContactNumber": 0,
                    "relationshipCandidate": "",
                    "fatherName": $('#father_name').val(),
                    "fatherEducation": $('#father_education').val(),
                    "fatherJob": $('#father_job').val(),
                    "fatherJobDetail": $('#father_job_details').val(),
                    "motherName": $('#mother_name').val(),
                    "motherEducation": $('#mother_education').val(),
                    "motherJob": $('#mother_job').val(),
                    "motherJobDetail": $('#mother_job_detail').val(),
                    "marriedBro": $('#married_brothers').val(),
                    "unmarriedBro": $('#unmarried_brothers').val(),
                    "marriedSis": $('#married_sister').val(),
                    "unmarriedSis": $('#unmarried_sisters').val(),
                    "siblingJobProfile": $('#job_sibling').val(),
                    "guardian": $('#guardian').val(),
                    "familyOrigin": $('#family_orgin').val(),
                    "familyType": $('#family_type').val(),
                    "homeType": $('#home_type').val(),
                    "candidateShare": $('#candidates_share').val(),
                    "familyValues": $('#family_values').val(),
                    "youOwn": "",
                    "eatingHabits": "",
                    "drinkingHabits": "",
                    "smokingHabits": "",
                    "languagesKnown": "",
                    "Hobbies": "",
                    "interests": "",
                    "blog": "",
                    "socialMediaLink": "",
                    "horoscopeDetails": "",
                    "birthHour": "",
                    "birthMinute": "",
                    "birthPlace": "",
                    "malayalamDob": "",
                    "janmaSistaDasa": "",
                    "janmaSistaDasaEnd": "",
                    "horoscopeFile": "",
                    "partnerAgeFrom": "",
                    "partnerAgeTo": "",
                    "partnerHeightFrom": "",
                    "partnerHeightTo": "",
                    "partnerComplexion": "",
                    "partnerBodyType": "",
                    "partnerMaritalStatus": "",
                    "partnerPhysicalStatus": "",
                    "partnerFamilyStatus": "",
                    "partnerReligion": "",
                    "partnerCaste": "",
                    "partnerCasteNoBar": "",
                    "matchingStars": "",
                    "partnerEduCat": "",
                    "partnerEduType": "",
                    "partnerJathakam": "",
                    "partnerJobCat": "",
                    "partnerJobType": "",
                    "annualIncome": "",
                    "partnerCountry": "",
                    "partnerState": "",
                    "partnerDistrict": "",
                    "partnerCity": "",
                    "lookingFor": "",
                    "aboutCandidate": "",
                    "photo1": "",
                    "photo2": "",
                    "photo3": "",
                    "photo4": "",
                    "photo5": "",
                    "photo6": "",
                    "photo7": "",
                    "photo8": "",
                    "photo9": "",
                    "photo10": "",
                    "horoscope1": "",
                    "horoscope2": "",
                    "horoscope3": "",
                    "horoscope4": "",
                    "horoscope5": "",
                    "idProof1": "",
                    "idProof2": "",
                    "idProof3": "",
                    "idProof4": "",
                    "idProof5": "",
                    "home1": "",
                    "home2": "",
                    "home3": "",
                    "home4": "",
                    "home5": "",
                    "createdBy": "1",
                    "createdDate": "2023-02-02"
                },

                beforeSend: function() {
                    $('#SaveCustomer')[0].reset();
                },
                success: function(data) {
                    console.log(data);
                    var FreeCustomerResponse = data;
                    if (FreeCustomerResponse.Status == true) {
                        toastr.success('Successfully Registered Customer');
                    } else {
                        toastr.error('Failed Adding Customer');
                    }
                },
                // cache: false,
                // processData: false,
                // contentType: false,
            });

        });
    </script>








</body>

</html>




<!-- End of Free register section -->