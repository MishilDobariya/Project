<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\LibraryMagazineIssue */
/* @var $form yii\widgets\ActiveForm */
$config = require('../config/esta_config.php');
?>

<div class="library-magazine-issue-form">

    <?php $form = ActiveForm::begin(); ?>
    <script type="text/javascript">
        document.getElementsByClassNames("issuebtn");
        function getBatchlist() // done working fine function () // done working fine
        {// alert("aasdasd");
            $.ajax({url: "../ajax/jamn",
                //data: {receiptid: "" + $(this).val() + "", masterid: "" + $("#accountsalaryheadingsettings-employee_type").val() + ""},
                //data: {masterid: "" + $(this).val()},
                data: {masterid: $(this).val()},
                type: 'get', //get value fetch value
                success: function (result) {
                    $("#ingrid").html(result);
                    $(".acfees").css("border-right", "none");
                }});

            $.ajax({url: "../ajax/image",
                dataType: 'json',
                method: 'GET',
                data: {masterid: $(this).val()},
                type: 'get', //get value fetch value
                success: function (data) {
                    $("#libphoto").attr("src", "../../uploads/eprofile/" + data.folder + "/" + data.filename);
                }});
        }
    </script>
   
    
    
   
        <script type="text/javascript">    
        function getAcc() // done working fine function () // done working fine
        {
            document.getElementsByClassName("issuebtn");
            //alert("abc");
            
            document.getElementById("librarymagazineissue-status").disabled = true;
          //  document.getElementById("librarytransectionissue-status").disabled = true;
           // document.getElementById("librarytransectionissue-author").disabled = true;
           // document.getElementById("librarytransectionissue-issue_date").disabled = false;
            $.ajax({url: "../ajax/accessionn",
                //                //data: {receiptid: "" + $(this).val() + "", masterid: "" + $("#accountsalaryheadingsettings-employee_type").val() + ""},
                //                data: {masterid: "" + $(this).val()},
                //                type: 'get', //get value fetch value
                //                success: function (result) {
                //                    $("#view").html(result);
                //                    $(".acfees").css("border-right", "none");

                dataType: 'json',
                method: 'GET',
                data:{id: $(this).val()},
                success: function (data) {
                   
                  //  $('#librarymagazineissue-name').val("");
                    //$('#librarytransectionissue-author').val("");
                    $('#librarytransectionissue-status').val("");
                    $('#librarymagazineissue-magazine_person_id').val("");
                    $('#librarymagazineissue-magazine_issue_date').val("");
                    $('#librarymagazineissue-magazine_due_date').val("");
                    $('#librarymagazineissue-Remarks').val("");

                    $('#librarymagazineissue-name').val(data.name);
                   // $('#librarytransectionissue-author').val(data.author);
                   
                    $('#librarymagazineissue-status').val(data.status);
                    $('#returnbtn input[type="return"]').removeAttr('disabled');
                     document.getElementById("returnbtn").disabled = false;
                    if(data.status=="Available")
                    {
                        document.getElementById("returnbtn").disabled = true;
                        $('#returnbtn').attr('disabled','disabled');
                        $('a').on('click',function(e){
                           if ($(this).attr('disabled') == 'disabled'){
                                e.preventDefault();
                                
                            }
                        });
                    }
                    
                    
                        //document.getElementById('returnbtn').disabled = true;
                       // alert("Magazine is not issued..");
                    //}
                    $('#librarymagazineissue-magazine_person_id').val(data.memberName);
                    $('#librarymagazineissue-magazine_issue_date').val(data.issuedate);
                    $('#librarymagazineissue-magazine_due_date').val(data.duedate);
                    $('#librarymagazineissue-remarks').val(data.remarks);
                    $('#librarymagazineissue-magazine_issue_date').trigger("change");
                      $('#librarymagazineissue-magazine_due_date').trigger("change");
                    $('#librarymagazineissue-magazine_person_id').trigger("change");
                    $('#librarymagazineissue-remarks').trigger("change");

                    $("#libphoto").attr("src", "../../uploads/eprofile/" + data.folder + "/" + data.filename);

                    var today = new Date();
                    var dd = today.getDate();
                    var mm = today.getMonth() + 1; //January is 0!

                    var yyyy = today.getFullYear();
                    if (dd < 10) {
                        dd = '0' + dd;
                    }
                    if (mm < 10) {
                        mm = '0' + mm;
                    }
                    var today = yyyy + '-' + mm + '-' + dd;

//                    if (data.issuedate !== today) {
//                        document.getElementById("librarymagazineissue-magazine_issue_date").disabled = true;
//                    }

                    //function callBtn()
                    //{      alert("sjhdfshfuh");
                 
                    //}

                    if (data.membername !== "")
                    {
                        callBtn();
                    }
                }});
        }
    </script>

    
    <div class="box box-primary form-group-sm">
        <fieldset>
            <legend>Magazine Issue</legend>
            <div class="row">
              <div class="col-md-6">  
                    <div class="row">
                        <div class="col-md-12">
                        <?=
                            $form->field($model, 'Magazine_Id')->widget(Select2::classname(), ['data' => ArrayHelper::map(app
                                \models\LibraryMagazineSubscriptionMaster::find()->all(), 'Magazine_Subscription_Id', 'magazineTitle'),
                        'class' => "form-control", 'language' => 'en', 'options' => ['placeholder' => 'Title Name'],
                        'pluginOptions' => [ 'allowClear' => true],
                        ]);
                        ?>
                    </div>        
                
                </div>
              
                 
                  <!---  <div class="row">
                 <div class="col-md-12">
                    <?=
                     $form->field($model, 'Magazine_Person_Id')->widget(Select2::classname(), ['data' => ArrayHelper::map(app\models\LibraryMemberMaster::find()->all(), 'Member_Id', 'memberName'),
                        'class' => "form-control", 'language' => 'en', 'options' => ['placeholder' => 'Member Code'], 'pluginOptions' => [ 'allowClear' => true],
                       ]);
                     ?> 
                </div>
                </div>--->
                 
            
            <div class="row">
                <div class="col-md-4">
                   
                    <?= $form->field($model, 'Magazine_Issue_Date')->widget(DatePicker::className(), ['inline' => false, 'options' => array('class' => "form-control"), 'value' => date('Y-m-d'), 'clientOptions' => ['changeYear' => true, 'changeMonth' => true, 'yearRange' => '1996:c+0', 'autoclose' => true, 'dateFormat' => 'yy-mm-dd']])->textInput(['placeholder' => 'Select Date', "datatype" => 'date']) ?>    
                </div>    
                <div class="col-md-4">
                     <?= $form->field($model, 'Magazine_Due_Date')->widget(DatePicker::className(), ['inline' => false, 'options' => array('class' => "form-control"), 'value' => date('Y-m-d'), 'clientOptions' => ['changeYear' => true, 'changeMonth' => true, 'yearRange' => '1996:c+0', 'autoclose' => true, 'dateFormat' => 'yy-mm-dd']])->textInput(['placeholder' => 'Select Date', "datatype" => 'date']) ?>       
                </div>
                <div class="col-md-4">
                            <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">      
                <div class="col-md-12">
                    <?= $form->field($model, 'Remarks')->textInput(['maxlength' => true]) ?>           
                </div>
            </div>    
                  
         
        
    </div> 
            <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-10">
                            <?=
                     $form->field($model, 'Magazine_Person_Id')->widget(Select2::classname(), ['data' => ArrayHelper::map(app\models\LibraryMemberMaster::find()->all(), 'Member_Id', 'memberName'),
                        'class' => "form-control", 'language' => 'en', 'options' => ['placeholder' => 'Member Code'], 'pluginOptions' => [ 'allowClear' => true],
                       ]);
                     ?> 
                        </div>
                        <div class="col-md-2">
                            <img id="libphoto" width="50" height="50" src="../../uploads/eprofile/nophoto/nophoto.jpg" class="img-circle">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class ="form-group" id="ingrid"></div>
                        </div>
                    </div>
                </div>
        </fieldset>
  
  <!---  <div class="col-md-6">
                    
                       
                        
                       <div class="row">     
                        <div class="col-md-2">
                            <img id="libphoto" width="50" height="50" src="../../uploads/eprofile/nophoto/nophoto.jpg" class="img-circle">
                        </div>
                          
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class ="form-group" id="ingrid" ></div>
                        </div>
                    </div>
                </div>
    </div>
    </div>        
    </filedset>--->
    
   </div>         
    <div class="form-group">
         <?php echo Html::a('Issue', ['issue'], ['class' => 'btn btn-primary btnissue','id'=>'issuebtn', 'data' => ['method' => 'post'],]) ?>
            <?php echo Html::a('Return', ['return'], ['class' => 'btn btn-primary','id'=>'returnbtn' ,'data' => ['method' => 'post'],]) ?>
            <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


<?php
    $this->registerJs(
            "$('#librarymagazineissue-magazine_person_id').change(getBatchlist);
             $('#librarymagazineissue-magazine_person_id').trigger('change') ;
             $('#librarymagazineissue-magazine_id').change(getAcc);
             $('#librarymagazineissue-magazine_id').trigger('change')
", \yii\web\View::POS_END
    );
    ?>

            <script type="text/javascript">
    function stopRKey(evt) {
        var evt = (evt) ? evt : ((event) ? event : null);
        var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
        if ((evt.keyCode == 13) && (node.type == "text")) {
            $(this).closest('tr').next().find('form').focus();
            evt.preventDefault();
            return false;
        }
    }
    document.onkeypress = stopRKey;
</script> 