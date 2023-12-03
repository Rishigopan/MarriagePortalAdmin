// //Show Leaddata
            // if ($DataValue == 'LD') {
            //     ?>
            //     <div class="row bulkdatasection">
            //         <div class="col-xl-10 col-lg-10 col-12">
            //             <div class="bulkDataHead mt-3 p-0 text-center">
            //                 <?php
            //                 $FindFeedbackName = mysqli_query($con, "SELECT feedback FROM  feedback WHERE fdId = $FeedbackStatus ");
            //                 if (mysqli_num_rows($FindFeedbackName) > 0) {
            //                     foreach ($FindFeedbackName as $FindFeedbackNameResult) {
            //                         $BulkFeedbackName = $FindFeedbackNameResult['feedback'];
            //                     }
            //                 } else {
            //                     $BulkFeedbackName = '';
            //                 }
            //                 ?>
            //                 <h5 class="m-0 p-0 text-white"><?= ($BulkFeedbackName != '') ? $BulkFeedbackName : "LEADDATA";  ?> &nbsp; - &nbsp; <?= $LimitedRows ?></h5>
            //             </div>
            //             <div class="table-responsive mt-4 d-none d-md-flex">
            //                 <table class="table table-bordered bulkDataBorder">
            //                     <thead class="bg-info">
            //                         <tr class="text-center">
            //                             <td scope="col" class="bulklTableText"> <input class="form-check-input bulkDataSelectAll" type="checkbox"> </td>
            //                             <td scope="col" class="bulklTableText">Sl No</td>
            //                             <td scope="col" class="bulklTableText">Data ID</td>
            //                             <td scope="col" class="bulklTableText">Type</td>
            //                             <td scope="col" class="bulklTableText"></td>
            //                             <td scope="col" class="bulklTableText">Mobile</td>
            //                             <td scope="col" class="bulklTableText"></td>
            //                             <td scope="col" class="bulklTableText" colspan="2">Name</td>
            //                             <td scope="col" class="bulklTableText">Remark</td>
            //                             <td scope="col" class="bulklTableText"></td>
            //                             <td scope="col" class="bulklTableText">Ref. Mobile</td>
            //                             <td scope="col" class="bulklTableText"></td>
            //                             <td scope="col" class="bulklTableText">Ref. Name</td>
            //                             <td scope="col" class="bulklTableText bg-white">
            //                                 <button class="linkBtn" data-clipboard-text="http://localhost/ADMINMATRIMONY/ADMIN/Lapview.php">LINK</button>
            //                                 <a href="" data-datatype="<?= $DataValue ?>" data-buttontype="<?= $ButtonType ?>" class="SendWhatsappLinkButton"><img src="../IMAGES/whatsappImg.png" alt="" class="lapviewImg"></a>
            //                             </td>
            //                         </tr>
            //                     </thead>
                               
            //                 </table>
            //             </div>

            //             <!-- Table Mobile View -->
            //             <div class="table-responsive mt-4 mx-xl-4 d-md-none">
            //                 <table class="table table-borderless">
            //                     <thead class="bg-info d-none">
            //                         <tr class="text-center">
            //                             <td scope="col" class="bulklTableText">Sl No</td>
            //                             <td scope="col" class="bulklTableText">Mobile</td>
            //                             <td scope="col" class="bulklTableText"><i class="ri-phone-fill callIcon"></i></td>
            //                             <td scope="col" class="bulklTableText">Name</td>
            //                             <td scope="col" class="bulklTableText">Ref. Mobile</td>
            //                             <td scope="col" class="bulklTableText"><i class="ri-phone-fill callIcon"></i></td>
            //                             <td scope="col" class="bulklTableText">Ref. Name</td>
            //                             <td scope="col" class="bulklTableText">Feed Back</td>
            //                         </tr>
            //                     </thead>
            //                     <tbody class="">
            //                         <?php
            //                         foreach ($GetAllDataQuery as $GetAllDataResults) {

            //                         ?>
            //                             <tr>
            //                                 <td class="pt-2 fs-5"><?= $GetAllDataResults['bulkId'] ?></td>
            //                                 <td></td>
            //                                 <td class="py-2 px-2" colspan="2"><input type="text" class="form-control" style="font-size:10pt" placeholder="Feed Back"></td>
            //                                 <td></td>
            //                                 <td class="pt-2 px-2"><button class="bulkFeedBack px-2">FB</button></td>
            //                                 <!-- <td class="pt-2"><i class="ri-menu-line bulkMenu"></i></td> -->
            //                             </tr>

            //                             <tr>
            //                                 <td class="py-2"><input type="checkbox" class="form-check-input bulkCheckbox fs-4"></td>
            //                                 <td class="py-2 px-2"><a href="tel:+91<?= $GetAllDataResults['registeredNumber'] ?>"><i class="ri-phone-fill callIcon fs-5"></i></a></td>
            //                                 <td class="py-2 fs-5" colspan="2"><?= $GetAllDataResults['bulkPhone'] ?><br><?= $GetAllDataResults['bulkName'] ?></td>
            //                                 <td class="py-2 fs-5 d-flex"></td>
            //                                 <td class="py-1 px-2"><button class="linkBtn bulkLinkBtn mt-1">LINK</button></td>
            //                             </tr>

            //                             <tr class="tableDataBorder">
            //                                 <td class="py-2"><input type="checkbox" class="form-check-input bulkCheckbox fs-4"></td>
            //                                 <td class="py-2 px-2"><a href="tel:+91<?= $GetAllDataResults['registeredNumber'] ?>"><i class="ri-phone-fill callIcon fs-5"></i></a></td>
            //                                 <td class="py-2 fs-5" colspan="2"><?= $GetAllDataResults['bulkPhone'] ?><br> <?= $GetAllDataResults['bulkName'] ?></td>
            //                                 <td class="py-2 fs-5"></td>
            //                                 <td class="py-1 px-2"><a href="https://wa.me/91<?= $GetAllDataResults['whatsappNumber'] ?>" target="_blank" class=""><img src="../IMAGES/whatsappImg.png" alt="" class="lapviewImg" style="width:37px; height:37px;"></a></td>
            //                             </tr>

            //                         <?php

            //                         }

            //                         ?>

            //                     </tbody>
            //                 </table>
            //             </div>


            //         </div>
            //         <div class="col-xl-2 col-lg-2 col-12 d-none d-md-block">


            //             <form id="LeadFeedbackForm">
            //                 <div class="mt-3">
            //                     <button type="button" class="form-control text-white bulkBlueBtn fs-5 mb-4">FEED BACK</button>
            //                     <?php

            //                     $GetLeadFeedbacks = mysqli_query($con, "SELECT * FROM feedback WHERE feedbackData = 'Lead Data'");
            //                     foreach ($GetLeadFeedbacks as $GetLeadFeedbacksResult) {
            //                     ?>
            //                         <div class="col-12 form-group mb-3">
            //                             <input type="radio" name="LeadFeedBack" class="FeedbackCheckboxClass" value="<?= $GetLeadFeedbacksResult['fdId'] ?>" id="FeedbackId<?= $GetLeadFeedbacksResult['fdId']  ?>">
            //                             <label class="btnSubmit  form-control" style="background-color: <?= ($GetBulkFeedbacksResult['feedbackColor'] != '') ?  $GetBulkFeedbacksResult['feedbackColor'] :  '#ff0185' ?>;" for="FeedbackId<?= $GetLeadFeedbacksResult['fdId'] ?>"> <?= $GetLeadFeedbacksResult['feedback'] ?> </label>
            //                         </div>
            //                     <?php
            //                     }

            //                     ?>

            //                     <a type="button" href="./FreeRegister.php" class="form-control greenButton bulkGreenBtn fs-5 mb-3 text-center">Free Register</a>

            //                     <div class="row mb-3">
            //                         <div class="col-xl-4 col-lg-4 col-4">
            //                             <select class="form-control bulkdropDn px-2 BulkDaySelect" name="LeadFeedbackDay" aria-label="Default select example">
            //                                 <?php
            //                                 for ($Day = 01; $Day <= 31; $Day++) {
            //                                     echo  '<option value="' . $Day . '">' . $Day . '</option>';
            //                                 }
            //                                 ?>
            //                             </select>
            //                         </div>
            //                         <div class="col-xl-4 col-lg-4 col-4">
            //                             <select class="form-control bulkdropDn px-2 BulkMonthSelect" name="LeadFeedbackMonth" aria-label="Default select example">
            //                                 <?php
            //                                 for ($Month = 01; $Month <= 12; $Month++) {
            //                                     echo  '<option value="' . $Month . '">' . $Month . '</option>';
            //                                 }
            //                                 ?>
            //                             </select>
            //                         </div>
            //                         <div class="col-xl-4 col-lg-4 col-4 ">
            //                             <select class="form-control bulkdropDn px-1 BulkYearSelect" name="LeadFeedbackYear" aria-label="Default select example">
            //                                 <?php
            //                                 for ($Year = date("Y") ; $Year <= date('Y', strtotime('+10 years')); $Year++) {
            //                                     echo  '<option value="' . $Year . '">' . $Year . '</option>';
            //                                 }
            //                                 ?>
            //                             </select>
            //                         </div>
            //                     </div>
            //                     <div class="row mb-3">
            //                         <div class="col-xl-4 col-lg-4 col-4">
            //                             <select class="form-control bulkdropDn px-2 BulkHourSelect" name="LeadFeedbackHour" aria-label="Default select example">
            //                                 <?php
            //                                 for ($Hour = 01; $Hour <= 12; $Hour++) {
            //                                     echo  '<option value="' . $Hour . '">' . $Hour . '</option>';
            //                                 }
            //                                 ?>
            //                             </select>
            //                         </div>
            //                         <div class="col-xl-4 col-lg-4 col-4">
            //                             <select class="form-control bulkdropDn px-2 BulkAMPMSelect" name="LeadFeedbackFormat" aria-label="Default select example">
            //                                 <option value="AM">AM</option>
            //                                 <option value="PM">PM</option>
            //                             </select>
            //                         </div>
            //                         <div class="col-xl-4 col-lg-4 col-4">
            //                             <h6 class="reminder text-white text-center">Reminder</h6>
            //                         </div>
            //                     </div>
            //                     <button type="submit" class="form-control bulkBlueBtn fs-5 mb-3" id="btn_submit">SUBMIT</button>
            //                 </div>
            //             </form>

            //         </div>
            //     </div>

            //     <?php

            // }