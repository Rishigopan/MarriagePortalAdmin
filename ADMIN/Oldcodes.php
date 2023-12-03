if($DataValue == 'BD'){
?>
<tbody>
    <?php
                    $RowCount = 0;
                foreach ($GetAllDataQuery as $GetAllDataResults) {
                    $RowCount ++;
                
        ?>
    <tr class="text-center">
        <td class="py-2 px-0"><input class="form-check-input bulkDataSelect MainSelector" data-datatype="<?= $DataValue ?>" type="checkbox" <?= ($RowCount == 1) ? "checked" : "" ?> id="BULK-<?php echo $GetAllDataResults["bulkId"] ?>" value="<?php echo $GetAllDataResults["bulkId"] ?>"></td>
        <td class="py-2 px-0"><?= $RowCount ?></td>
        <td class="py-2 px-0"><?= str_pad($GetAllDataResults['bulkId'], 5, '0', STR_PAD_LEFT);  ?></td>
        <!-- Add prefix zeros to id and make it 5 digits -->
        <td class="py-2 px-0"><?= $GetAllDataResults['typeName'] ?></td>
        <td class="py-2 px-0"><input type="checkbox" class="form-check-input bulkCheckbox BulkPhoneCheckbox" <?= ($RowCount == 1) ? "checked" : "" ?> value="<?= $GetAllDataResults['bulkPhone'] ?>"> </td>
        <!-- <td class="py-2 px-0"> <?= $GetAllDataResults['bulkPhone'] ?></td> -->
        <td class="py-2 px-2"> <input data-id="<?= $GetAllDataResults['bulkId'] ?>" id="BULKMOBILENUMBER-<?= $GetAllDataResults['bulkId'] ?>" type="number" class="bulkTextField BulkDataMobileNumber form-control " name="BulkDataMobileNumber" value="<?= $GetAllDataResults['bulkPhone'] ?>"></td>
        <td class="py-2 px-0"><a href="tel:+91<?= $GetAllDataResults['bulkPhone'] ?>"><i class="ri-phone-fill callIcon"></i></a> <a href="" data-clipboard-text="<?= $GetAllDataResults['bulkPhone'] ?>" class="bulkCopy"><i class="ri-clipboard-fill callIcon"></i></a></td>
        <td class="py-2 px-2" colspan="2"> <input data-id="<?= $GetAllDataResults['bulkId'] ?>" id="BULKNAME-<?= $GetAllDataResults['bulkId'] ?>" type="text" class="bulkTextField BulkDataName form-control " name="BulkDataName" value="<?= $GetAllDataResults['bulkName'] ?>"> </td>
        <td class="py-2 px-2"><input data-id="<?= $GetAllDataResults['bulkId'] ?>" id="BULKREMARK-<?= $GetAllDataResults['bulkId'] ?>" type="text" class="bulkTextField BulkDataRemark form-control " name="BulkDataRemark" value="<?= $GetAllDataResults['bulkRemark'] ?>"></td>
        <td class="py-2 px-0"> <input type="checkbox" class="form-check-input bulkCheckbox ReferPhoneCheckbox" <?= ($RowCount == 1) ? "checked" : "" ?> value="<?= $GetAllDataResults['referPhone'] ?>"> </td>
        <td class="py-2 px-2"> <input data-id="<?= $GetAllDataResults['bulkId'] ?>" id="BULKREFERNUMBER-<?= $GetAllDataResults['bulkId'] ?>" type="number" class="bulkTextField BulkDataReferNumber form-control " name="BulkDataReferNumber" value="<?= $GetAllDataResults['referPhone'] ?>"></td>
        <td class="py-2 px-0"><a href="tel:+91<?= $GetAllDataResults['referPhone'] ?>"><i class="ri-phone-fill callIcon"></i></a> <a href="" data-clipboard-text="<?= $GetAllDataResults['referPhone'] ?>" class="referCopy"><i class="ri-clipboard-fill callIcon"></i></a></td>
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
        <td class="py-2 px-0"><input class="form-check-input leadDataSelect MainSelector" data-datatype="<?= $DataValue ?>" type="checkbox" <?= ($RowCount == 1) ? "checked" : "" ?> id="LEAD-<?php echo $GetAllDataResults["bulkId"] ?>" value="<?php echo $GetAllDataResults["bulkId"] ?>"></td>
        <td class="py-2 px-0"><?= $RowCount ?></td>
        <td class="py-2 px-0"><?= str_pad($GetAllDataResults['bulkId'], 5, '0', STR_PAD_LEFT);  ?></td>
        <!-- Add prefix zeros to id and make it 5 digits -->
        <td class="py-2 px-0"><?= $GetAllDataResults['typeName'] ?></td>
        <td class="py-2 px-0"><input type="checkbox" class="form-check-input leadCheckbox BulkPhoneCheckbox" <?= ($RowCount == 1) ? "checked" : "" ?> value="<?= $GetAllDataResults['bulkPhone'] ?>"> </td>
        <td class="py-2 px-0"> <?= $GetAllDataResults['bulkPhone'] ?></td>
        <td class="py-2 px-0"><a href="tel:+91<?= $GetAllDataResults['bulkPhone'] ?>"><i class="ri-phone-fill callIcon"></i></a> <a href="" data-clipboard-text="<?= $GetAllDataResults['bulkPhone'] ?>" class="bulkCopy"><i class="ri-clipboard-fill callIcon"></i></a></td>
        <td class="py-2 px-2" colspan="2"> <input data-id="<?= $GetAllDataResults['bulkId'] ?>" id="LEADNAME-<?= $GetAllDataResults['bulkId'] ?>" type="text" class="bulkTextField LeadDataName form-control " name="LeadDataName" value="<?= $GetAllDataResults['bulkName'] ?>"> </td>
        <td class="py-2 px-2"><input data-id="<?= $GetAllDataResults['bulkId'] ?>" id="LEADREMARK-<?= $GetAllDataResults['bulkId'] ?>" type="text" class="bulkTextField LeadDataRemark form-control " name="LeadDataRemark" value="<?= $GetAllDataResults['bulkRemark'] ?>"></td>
        <td class="py-2 px-0"> <input type="checkbox" class="form-check-input bulkCheckbox ReferPhoneCheckbox" <?= ($RowCount == 1) ? "checked" : "" ?> value="<?= $GetAllDataResults['referPhone'] ?>"> </td>
        <td class="py-2 px-2"> <input data-id="<?= $GetAllDataResults['bulkId'] ?>" id="LEADREFERNUMBER-<?= $GetAllDataResults['bulkId'] ?>" type="number" class="bulkTextField LeadDataReferNumber form-control " name="LeadDataReferNumber" value="<?= $GetAllDataResults['referPhone'] ?>"></td>
        <td class="py-2 px-0"><a href="tel:+91<?= $GetAllDataResults['referPhone'] ?>"><i class="ri-phone-fill callIcon"></i></a> <a href="" data-clipboard-text="<?= $GetAllDataResults['referPhone'] ?>" class="referCopy"><i class="ri-clipboard-fill callIcon"></i></a></td>
        <td class="py-2 px-2"><input data-id="<?= $GetAllDataResults['bulkId'] ?>" id="LEADREFERNAME-<?= $GetAllDataResults['bulkId'] ?>" type="text" min="0" class="bulkTextField LeadDataReferName form-control " name="LeadDataReferName" value="<?= $GetAllDataResults['referName'] ?>"></td>
        <td class="py-2 px-0"> <a href="https://wa.me/91<?= $GetAllDataResults['bulkPhone'] ?>" target="_blank" class=""><img src="../IMAGES/whatsappImg.png" alt="" class="lapviewImg"></a></td>
        </tr>
    <?php
                    }
                    
        ?>
    </tbody>
<?php
}



   //Bulk Feedback submit
   $(document).on('submit', '#BulkFeedbackForm', function(b) {
    b.preventDefault();
    var BulkFeedbackIdVar = $('.bulkDataSelect:checked').attr('id');
    //console.log(BulkFeedbackIdVar);
    var BulkFeedbackId = BulkFeedbackIdVar.slice(5);
    //console.log(BulkFeedbackId);


    var BulkDataName = $('#BULKNAME-' + BulkFeedbackId).val();
    var BulkFeedbackRemark = $('#BULKREMARK-' + BulkFeedbackId).val();
    var BulkDataReferName = $('#BULKREFERNAME-' + BulkFeedbackId).val();
    var BulkDataReferNumber = $('#BULKREFERNUMBER-' + BulkFeedbackId).val();

    BulkFeedbackData = new FormData(this);
    BulkFeedbackData.append('BulkDataRemark', BulkFeedbackRemark);
    BulkFeedbackData.append('BulkDataReferName', BulkDataReferName);
    BulkFeedbackData.append('BulkDataReferNumber', BulkDataReferNumber);
    BulkFeedbackData.append('BulkDataFeedbackId', BulkFeedbackId);
    BulkFeedbackData.append('BulkDataFeedbackName', BulkDataName);


    $.ajax({
        type: "POST",
        url: "FeedbackOperations.php",
        data: BulkFeedbackData,
        success: function(data) {
            console.log(data);
            var BulkFeedbackResponse = JSON.parse(data);
            if (BulkFeedbackResponse.BulkFeedbackStatus == 1) {
                toastr.success('Successfully Added Bulk Feedback');
                // $('#FeedBackModal').modal('hide');
                // $('#feedback_customer_id').val('');
                // $('#FreeRegister')[0].reset();
                $('#FilterData').submit();
            } else {
                toastr.error('Failed Adding Feedback');
            }
        },
        cache: false,
        processData: false,
        contentType: false,
    });

});



<!-- Free register feedback -->
<form action="" method="" id="FreeRegister" class="">
    <div class="row mt-3 modalForm">
        <div class="col-12">
            <h6 class="btnSubmit" style="background-color:#05cbfc;">FREE REGISTER FEEDBACK & PAGES</h6>
        </div>
        <div class="col-md-6 form-group mt-3">
            <input type="radio" name="FreeFeedBack" class="FeedbackCheckboxClass " value="0" id="FeedbackId0" required>
            <label class="btnSubmit form-control" style="background-color: #ff0185;" for="FeedbackId0"> Default </label>
        </div>
        <?php
        $GetFeedbacks = mysqli_query($con, "SELECT * FROM feedback WHERE feedbackData = 'Free Data'");
        foreach ($GetFeedbacks as $GetFeedbacksResult) {
        ?>
            <div class="col-md-6 form-group mt-3">
                <input type="radio" name="FreeFeedBack" class="FeedbackCheckboxClass " value="<?= $GetFeedbacksResult['fdId'] ?>" id="FeedbackId<?= $GetFeedbacksResult['fdId']  ?>" required>
                <label class="btnSubmit form-control" style="background-color: <?= ($GetFeedbacksResult['feedbackColor'] != '') ?  $GetFeedbacksResult['feedbackColor'] :  '#ff0185' ?>;" for="FeedbackId<?= $GetFeedbacksResult['fdId'] ?>"> <?= $GetFeedbacksResult['feedback'] ?> </label>
            </div>
        <?php
        }

        ?>

        <input type="text" name="FreeFeedbackCustomerId" id="feedback_customer_id" class="form-control" hidden>
        <input type="text" name="Feedback" id="" value="3" class="form-control" hidden>
        <div class="col-12 form-group mt-3">
            <label for="" class="mb-1 ms-2">Partner Preference</label>
            <input type="text" name="PartnerPrefer" class="form-control PartPreference">
        </div>
        <div class="col-12 form-group mt-3">
            <label for="" class="mb-1 ms-2">Remarks</label>
            <input type="text" name="FeedbackRemark" class="form-control FeedbackRemarks">
        </div>
        <div class="row">
            <div class="col-md-10 form-group mt-3">
                <input type="datetime-local" name="FeedbackDate" class="form-control">
            </div>
            <div class="col-md-2 form-group mt-3">
                <h6 class="reminder text-white text-center">Reminder</h6>
            </div>
        </div>

        <!-- <div class="col-md-6 form-group mt-3">
            <input type="time" name="FeedbackTime" class="form-control">
        </div> -->
    </div>
    <div class="text-center mt-4 mb-3">
        <button type="submit" class="btnLightblue px-4 py-1 my-2" id="btn_submit" name="BtnSubmit">Submit</button>
    </div>
</form>


<!-- Paid register feedback -->
<form action="" method="" id="PaidRegister" class="" style="display: none;">
    <div class="row mt-3 modalForm">
        <div class="col-12">
            <h6 class="btnSubmit py-2">PAID REGISTER FEEDBACK & PAGES</h6>
        </div>
        <div class="col-md-6 form-group mt-3">
            <input type="radio" name="PaidFeedBack" class="FeedbackCheckboxClass " value="0" id="PaidFeedbackId0" required>
            <label class="btnSubmit form-control" style="background-color: #ff0185;" for="PaidFeedbackId0"> Default </label>
        </div>
        <?php
        $GetPaidFeedbacks = mysqli_query($con, "SELECT * FROM feedback WHERE feedbackData = 'Paid Data'");
        foreach ($GetPaidFeedbacks as $GetPaidFeedbacksResult) {
        ?>
            <div class="col-md-6 form-group mt-3">
                <input type="radio" name="PaidFeedBack" class="FeedbackCheckboxClass" value="<?= $GetPaidFeedbacksResult['fdId'] ?>" id="PaidFeedbackId<?= $GetPaidFeedbacksResult['fdId'] ?>" required>
                <label class="btnSubmit form-control" for="PaidFeedbackId<?= $GetPaidFeedbacksResult['fdId'] ?>"> <?= $GetPaidFeedbacksResult['feedback'] ?> </label>
            </div>

        <?php
        }

        ?>

        <input type="text" name="PaidFeedbackCustomerId" id="paid_feedback_customer_id" class="form-control" hidden>
        <input type="text" name="PaidFeedback" id="" value="3" class="form-control" hidden>
        <div class="col-12 form-group mt-3">
            <label for="" class="mb-1 ms-2">Partner Preference</label>
            <input type="text" name="PaidPartnerPrefer" class="form-control">
        </div>
        <div class="col-12 form-group mt-3">
            <label for="" class="mb-1 ms-2">Remarks</label>
            <input type="text" name="PaidFeedbackRemark" class="form-control">
        </div>
        <div class="row">
            <div class="col-md-10 form-group mt-3">
                <input type="datetime-local" name="PaidFeedbackDate" class="form-control">
            </div>
            <div class="col-md-2 form-group mt-3">
                <h6 class="reminder text-white text-center">Reminder</h6>
            </div>
        </div>

        <!-- <div class="col-md-6 form-group mt-3">
            <input type="time" name="FeedbackTime" class="form-control">
        </div> -->
    </div>
    <div class="text-center mt-4 mb-3">
        <button type="submit" class="btnLightblue px-4 py-1 my-2" id="btn_submit" name="BtnSubmit">Submit</button>
    </div>
</form>


<!-- Marriage register feedback -->
<form action="" method="" id="MarriageRegister" class="" style="display: none;">
    <div class="row mt-3 modalForm">
        <div class="col-12">
            <h6 class="btnSubmit py-2">MARRIAGE REGISTER FEEDBACK & PAGES</h6>
        </div>
        <div class="col-md-6 form-group mt-3">
            <input type="radio" name="MarriageFeedBack" class="FeedbackCheckboxClass " value="0" id="MarriageFeedbackId0" required>
            <label class="btnSubmit form-control" style="background-color: #ff0185;" for="MarriageFeedbackId0"> Default </label>
        </div>
        <?php
        $GetMarriageFeedbacks = mysqli_query($con, "SELECT * FROM feedback WHERE feedbackData = 'Marriage Data'");
        foreach ($GetMarriageFeedbacks as $GetMarriageFeedbacksResult) {
        ?>
            <div class="col-md-6 form-group mt-3">
                <input type="radio" name="MarriageFeedBack" class="FeedbackCheckboxClass" value="<?= $GetMarriageFeedbacksResult['fdId'] ?>" id="MarriageFeedbackId<?= $GetMarriageFeedbacksResult['fdId'] ?>" required>
                <label class="btnSubmit form-control" for="MarriageFeedbackId<?= $GetMarriageFeedbacksResult['fdId'] ?>"> <?= $GetMarriageFeedbacksResult['feedback'] ?> </label>
            </div>

        <?php
        }

        ?>

        <input type="text" name="MarriageFeedbackCustomerId" id="marriage_feedback_customer_id" class="form-control" hidden>
        <!-- <input type="text" name="MarriageFeedback" id="" value="3" class="form-control" hidden> -->
        <div class="col-12 form-group mt-3">
            <label for="" class="mb-1 ms-2">Partner Preference</label>
            <input type="text" name="MarriagePartnerPrefer" class="form-control">
        </div>
        <div class="col-12 form-group mt-3">
            <label for="" class="mb-1 ms-2">Remarks</label>
            <input type="text" name="MarriageFeedbackRemark" class="form-control">
        </div>
        <div class="row">
            <div class="col-md-10 form-group mt-3">
                <input type="datetime-local" name="MarriageFeedbackDate" class="form-control">
            </div>
            <div class="col-md-2 form-group mt-3">
                <h6 class="reminder text-white text-center">Reminder</h6>
            </div>
        </div>


        <!-- <div class="col-md-6 form-group mt-3">
            <input type="time" name="FeedbackTime" class="form-control">
        </div> -->
    </div>
    <div class="text-center mt-4 mb-3">
        <button type="submit" class="btnLightblue px-4 py-1 my-2" id="btn_submit" name="BtnSubmit">Submit</button>
    </div>
</form>


<!-- Wedding register feedback -->
<form action="" method="" id="WeddingRegister" class="" style="display: none;">
    <div class="row mt-3 modalForm">
        <div class="col-12">
            <h6 class="btnSubmit py-2">WEDDING REGISTER FEEDBACK & PAGES</h6>
        </div>
        <div class="col-md-6 form-group mt-3">
            <input type="radio" name="WeddingFeedBack" class="FeedbackCheckboxClass " value="0" id="WeddingFeedbackId0" required>
            <label class="btnSubmit form-control" style="background-color: #ff0185;" for="WeddingFeedbackId0"> Default </label>
        </div>
        <?php
        $GetWeddingFeedbacks = mysqli_query($con, "SELECT * FROM feedback WHERE feedbackData = 'Wedding Data'");
        foreach ($GetWeddingFeedbacks as $GetWeddingFeedbacksResult) {
        ?>
            <div class="col-md-6 form-group mt-3">
                <input type="radio" name="WeddingFeedBack" class="FeedbackCheckboxClass" value="<?= $GetWeddingFeedbacksResult['fdId'] ?>" id="WeddingFeedbackId<?= $GetWeddingFeedbacksResult['fdId'] ?>" required>
                <label class="btnSubmit form-control" for="WeddingFeedbackId<?= $GetWeddingFeedbacksResult['fdId'] ?>"> <?= $GetWeddingFeedbacksResult['feedback'] ?> </label>
            </div>

        <?php
        }

        ?>

        <input type="text" name="WeddingFeedbackCustomerId" id="wedding_feedback_customer_id" class="form-control" hidden>
        <!-- <input type="text" name="MarriageFeedback" id="" value="3" class="form-control" hidden> -->
        <div class="col-12 form-group mt-3">
            <label for="" class="mb-1 ms-2">Partner Preference</label>
            <input type="text" name="WeddingPartnerPrefer" class="form-control">
        </div>
        <div class="col-12 form-group mt-3">
            <label for="" class="mb-1 ms-2">Remarks</label>
            <input type="text" name="WeddingFeedbackRemark" class="form-control">
        </div>
        <div class="row">
            <div class="col-md-10 form-group mt-3">
                <input type="datetime-local" name="WeddingFeedbackDate" class="form-control">
            </div>
            <div class="col-md-2 form-group mt-3">
                <h6 class="reminder text-white text-center">Reminder</h6>
            </div>
        </div>

        <!-- <div class="col-md-6 form-group mt-3">
            <input type="time" name="FeedbackTime" class="form-control">
        </div> -->
    </div>
    <div class="text-center mt-4 mb-3">
        <button type="submit" class="btnLightblue px-4 py-1 my-2" id="btn_submit" name="BtnSubmit">Submit</button>
    </div>
</form>


 /////////////////// Paid data ////////////////////////

            //Paid data feedback open popup
            $(document).on('click', '.PaidFeedbackButton', function() {
                var PaidCustFeedbackId = $(this).val();
                console.log(PaidCustFeedbackId);
                $('#paid_feedback_customer_id').val(PaidCustFeedbackId);
                $('#FeedBackModal').modal('show');
                $('#PaidRegister').show();
                $('#FreeRegister').hide();
                $('#MarriageRegister').hide();
            });


            //Submit Paid register feedback
            $('#PaidRegister').submit(function(e) {
                e.preventDefault();
                var PaidFeedbackData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "FeedbackOperations.php",
                    data: PaidFeedbackData,
                    beforeSend: function() {
                        $('#FeedBackModal').modal('hide');
                        $('#paid_feedback_customer_id').val('');
                        $('#PaidRegister')[0].reset();
                    },
                    success: function(data) {
                        console.log(data);
                        var PaidFeedbackResponse = JSON.parse(data);
                        if (PaidFeedbackResponse.PaidFeedbackStatus == 1) {
                            toastr.success('Successfully Added Paid Feedback');

                            $('#FilterData').submit();
                        } else {
                            toastr.error('Failed Adding Feedback');
                        }
                    },
                    cache: false,
                    processData: false,
                    contentType: false,
                });
            });


        /////////////////// Paid data ////////////////////////


        /////////////////// Marriage data ////////////////////////

            //Marriage data feedback open popup
            $(document).on('click', '.MarriageFeedbackButton', function() {
                var MarriageCustFeedbackId = $(this).val();
                console.log(MarriageCustFeedbackId);
                $('#marriage_feedback_customer_id').val(MarriageCustFeedbackId);
                $('#FeedBackModal').modal('show');
                $('#MarriageRegister').show();
                $('#FreeRegister').hide();
                $('#PaidRegister').hide();
            });


            //Submit Marriage register feedback
            $('#MarriageRegister').submit(function(e) {
                e.preventDefault();
                var MarriageFeedbackData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "FeedbackOperations.php",
                    data: MarriageFeedbackData,
                    beforeSend: function() {
                        $('#FeedBackModal').modal('hide');
                        $('#marriage_feedback_customer_id').val('');
                        $('#MarriageRegister')[0].reset();
                    },
                    success: function(data) {
                        console.log(data);
                        var MarriageFeedbackResponse = JSON.parse(data);
                        if (MarriageFeedbackResponse.MarriageFeedbackStatus == 1) {
                            toastr.success('Successfully Added Marriage Feedback');
                            $('#FilterData').submit();
                        } else {
                            toastr.error('Failed Adding Feedback');
                        }
                    },
                    cache: false,
                    processData: false,
                    contentType: false,
                });
            });


        /////////////////// Marriage data ////////////////////////


        /////////////////// Wedding data ////////////////////////

            //Wedding data feedback open popup
            $(document).on('click', '.WeddingFeedbackButton', function() {
                var WeddingCustFeedbackId = $(this).val();
                console.log(WeddingCustFeedbackId);
                $('#wedding_feedback_customer_id').val(WeddingCustFeedbackId);
                $('#FeedBackModal').modal('show');
                $('#WeddingRegister').show();
                $('#MarriageRegister').hide();
                $('#FreeRegister').hide();
                $('#PaidRegister').hide();
            });


            //Submit Wedding register feedback
            $('#WeddingRegister').submit(function(e) {
                e.preventDefault();
                var WeddingFeedbackData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "FeedbackOperations.php",
                    data: WeddingFeedbackData,
                    beforeSend: function() {
                        $('#FeedBackModal').modal('hide');
                        $('#wedding_feedback_customer_id').val('');
                        $('#WeddingRegister')[0].reset();
                    },
                    success: function(data) {
                        console.log(data);
                        var WeddingFeedbackResponse = JSON.parse(data);
                        if (WeddingFeedbackResponse.WeddingFeedbackStatus == 1) {
                            toastr.success('Successfully Added Wedding Feedback');
                            $('#FilterData').submit();
                        } else {
                            toastr.error('Failed Adding Feedback');
                        }
                    },
                    cache: false,
                    processData: false,
                    contentType: false,
                });
            });


        /////////////////// Wedding data ////////////////////////


           /////////////////// Free data ////////////////////////

            //Free data feedback open popup
            $(document).on('click', '.FeedbackButton', function() {
                var CustFeedbackId = $(this).val();
                //console.log(CustFeedbackId);
                $('#feedback_customer_id').val(CustFeedbackId);
                $('.PartPreference').val($(this).data('looking-for'));
                $('.FeedbackRemarks').val($(this).data('remarks'));
                $('#FeedbackId'+ $(this).data('feedback-id')).prop('checked',true);
                // console.log($(this).data('looking-for'));
                // console.log($(this).data('remarks'));
                // console.log($(this).data('feedback-id'));
                $('#FeedBackModal').modal('show');
                $('#MarriageRegister').hide();
                $('#PaidRegister').hide();
                $('#FreeRegister').show();
            });

            //Submit free register feedback
            $('#FreeRegister').submit(function(e) {
                e.preventDefault();
                var FeedbackData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "FeedbackOperations.php",
                    data: FeedbackData,
                    beforeSend: function() {
                        $('#FeedBackModal').modal('hide');
                        $('#feedback_customer_id').val('');
                        $('#FreeRegister')[0].reset();
                    },
                    success: function(data) {
                        console.log(data);
                        var FeedbackResponse = JSON.parse(data);
                        if (FeedbackResponse.FeedbackStatus == 1) {
                            toastr.success('Successfully Added Feedback');
                            $('#FilterData').submit();
                        } else {
                            toastr.error('Failed Adding Feedback');
                        }
                    },
                    cache: false,
                    processData: false,
                    contentType: false,
                });
            });


        /////////////////// Free data ////////////////////////
