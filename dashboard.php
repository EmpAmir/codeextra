
<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from spruko.com/demo/django/dashtic/DASHTIC/HTML-LTR/Sidemenu-Icon-Light/index5.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Nov 2021 15:53:16 GMT -->
<?php $this->view('commenLayout/head'); ?>


<style type="text/css">

  .border {
    border: 5px solid #03071b!important;
}

  .option-transaction {
    color: green;
    font-weight: bold;
    text-transform:uppercase
  }

  .option-transaction-value {
    font-weight: bold;
  }
.qr-brands{
  height:40px;
  margin:4px;
}       

.toolbar{
  width:99%;
  background: #157bbe;
  margin-left: 10px;
}


.toolbar-options{
  color: white;
  font-size: large;
  padding: 10px 0px;
}

.toolbar-button{
  background: #157bbe;
    border: none;
  color: white;
  border-radius: 20px;
  padding:5px 15px 5px 15px;
  box-shadow: -2px -2px 10px #52abe7,
              2px 2px 10px #011e31;
}

.toolbar-button:hover{
  cursor: pointer;
  background-color: #52abe7;
  color: #000;
}
</style>

<body class="app sidebar-mini light-mode default-sidebar">

    <!-- Start Switcher -->
    <?php $this->view('commenLayout/switcher-wrapper'); ?>
    <!-- End Switcher -->
    <!---Global-loader-->
    <?php $this->view('commenLayout/global-loader.php'); ?>
    <!---End Global-loader-->
    <div class="page">
        <div class="page-main">
            <!--aside open-->
            <?php $this->view('commenLayout/aside.php'); ?>
            <!--aside closed-->

            <div class="app-content main-content">
                <div class="side-app">

                    <!--app header-->
                    <?php $this->view('commenLayout/app-header.php'); ?>
                    <!--/app header-->

                    <!--Page header-->
                    <div class="page-header">
                        <div class="page-leftheader">
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                    </div>
                    <!--End Page header-->

                    <div class="row">
                        <div class="col-xl-4 col-md-12 col-lg-3">
                            <div class="card expenses-card overflow-hidden">
                                <div class="card-body">
                                    <div class="feature">
                                        <i class="fa fa-bank feature-icon"></i>
                                        <h1 class="font-weight-bold mb-0 mt-4 fs-50"><i class="fa fa-inr"><?php echo sprintf('%.2f', $agentData->cashout_agent_balance);?></i></h1>
                                        <p class="text-muted fs-18 mb-0">
                                           <!--  <?php 
                                              $accountApproved = $agentData->cashout_agent_is_admin_approved;
                                              $profile_completed = $agentData->cashout_agent_is_profile_completed;
                                              if(($accountApproved == '0' && $profile_completed == '0' ) || ($accountApproved == '0' && $profile_completed == '1') || ($accountApproved == '2' && $profile_completed == '0') )  { ?>
                                                <a class="btn btn-warning accountApproved">QR </a>
                                              <?php  }else { ?>
                                                <?php 
                                                $mahaID =$agentData->maha_subMerchantId;
                                                if($mahaID == ''){ ?>
                                                  <a  class="btn btn-primary" href ="<?php echo base_url();?>upi/registration_maha">QR</a>
                                                <?php }else {?>
                                                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largemodalQR">QR</button>
                                              <?php } }?> -->

                                               <?php 
                                              $accountApproved = $agentData->cashout_agent_is_admin_approved;
                                              $profile_completed = $agentData->cashout_agent_is_profile_completed;
                                              if(($accountApproved == '0' && $profile_completed == '0' ) || ($accountApproved == '0' && $profile_completed == '1') || ($accountApproved == '2' && $profile_completed == '0') )  { ?>
                                                <a class="btn btn-warning accountApproved"> QR </a>
                                              <?php  }else { ?>
                                                  <?php if($agentData->virtualVpaId == ''){ ?>
                                                    <a class="btn btn-info" href="#" onclick="return cashfreeUpiGenerate();" >ENABLE UPI</a>
                                                  
                                                   <?php }  elseif($agentData->virtualVpastatus != 'SUCCESS') { ?>
                                                  <a href ="#" class="activate-button accountcashfreeQr" >Your Account Status is : <?php echo $agentData->virtualVpastatus;?></a>
                                                   <?php }else {?>

                                                     <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#largemodalQRCashfree">QR</a>

                                                  <?php } } ?>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#largemodalPayment">Payment</button>

                                           

                                        </p>
                                    </div>
                                </div>
                                <div class="chart-wrapper"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                    <canvas id="Chart" class="overflow-hidden chartjs-render-monitor" style="display: block; height: 120px; width: 391px;" width="488" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-md-12 col-lg-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm d-flex mb-4 mb-sm-0">
                                            <i class="mdi mdi-basket-fill fs-60 text-success icon-dropshadow-primary me-3"></i>
                                            <div class="mt-5">
                                                <h6>Today Transaction</h6>
                                                <h3 class="mb-0 font-weight-bold"><i class="fa fa-inr"></i><?php echo (int)$todayTxn;?></h3>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm d-flex mb-4 mb-sm-0">
                                            <i class="mdi mdi-basket-fill fs-60 text-primary icon-dropshadow-success me-3"></i>
                                            <div class="mt-5">
                                                <h6>Today VA/UPI Transaction</h6>
                                                <h3 class="mb-0 font-weight-bold"><i class="fa fa-inr"></i><?php echo (int)$todayVAUPITxn;?></h3>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm d-flex">
                                            <i class="mdi mdi-basket-fill fs-60 text-danger icon-dropshadow-danger me-3"></i>
                                            <div class="mt-5">
                                                <h6>Today Payouts Transaction</h6>
                                                <h3 class="mb-0 font-weight-bold"><i class="fa fa-inr"></i><?php echo (int)$todayFTTxn;?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="mb-1">Monthly Transaction</p>
                                            <h2 class="mb-1 font-weight-bold"><i class="fa fa-inr"></i><?php echo (int)$currentMonthTxn;?></h2>
                                            <?php if($currentMonthTxn >= $lastMonthTxn ) { $monthClasss = "up"; $monthClassstest = "success";  }else { $monthClasss = "down"; $monthClassstest = "danger";} ;?>
                                            <span class="mb-1 text-muted"><span class="text-<?php echo $monthClassstest;?>"><i class="fa fa-caret-<?php echo $monthClasss;?>  me-1"></i><i class="fa fa-inr"></i><?php echo (int)$lastMonthTxn;?></span> last month</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="mb-1">Monthly UPI/VA Transaction</p>
                                            <h2 class="mb-1 font-weight-bold"><i class="fa fa-inr"></i><?php echo (int)$currentMonthTxnUPIVA;?></h2>
                                            <?php if($currentMonthTxnUPIVA >= $lastMonthTxnUPIVA ) { $monthClasssVU = "up"; $monthClassstestVU = "success";  }else { $monthClasssVU = "down"; $monthClassstestVU = "danger";} ;?>
                                            <span class="mb-1 text-muted"><span class="text-<?php echo $monthClassstestVU;?>"><i class="fa fa-caret-<?php echo $monthClasssVU;?>  me-1"></i><i class="fa fa-inr"></i><?php echo (int)$lastMonthTxnUPIVA;?></span> last month</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="mb-1">Monthly Payouts Transaction</p>
                                            <h2 class="mb-1 font-weight-bold"><i class="fa fa-inr"></i><?php echo (int)$currentMonthTxnFT;?></h2>
                                            <?php if($currentMonthTxnFT >= $lastMonthTxnFT ) { $monthClasssFT = "up"; $monthClassstestFT = "success";  }else { $monthClasssFT = "down"; $monthClassstestFT = "danger";} ;?>
                                            <span class="mb-1 text-muted"><span class="text-<?php echo $monthClassstestFT;?>"><i class="fa fa-caret-<?php echo $monthClasssFT;?>  me-1"></i><i class="fa fa-inr"></i><?php echo (int)$lastMonthTxnFT;?></span> last month</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <!--Row-->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            
                            <div class="card">
                                <!-- <div class="card-header">
                                    <div class="card-title">Account Statement</div>
                                </div> -->
                                 <!--toolbar menu-->
                                <!--  <div class="card-header"> -->
                                    <div class="row display-flex center-content ">
                                      <div class="toolbar">
                                        <div class="row">
                                            <div class="col-lg-2 col-6 display-flex center-content toolbar-options">Account Statement</div>
                                            <div class="col-lg-2 col-6 display-flex center-content toolbar-options">Transaction (<?php echo $count;?>) </div>
                                            <div class="col-lg-5 col-12 display-flex center-content toolbar-options">
                                              <form action="" method="GET" id="formDataSearch">
                                                <input type="text" name="search" id="search" placeholder="SEARCH ID / REF / NUMBER / BANK REF NUMBER" class="search-bar"><button style="background: #0c4164; border: solid 1px white; border-radius:0px 5px 5px 0px; padding: 5px 10px 5px 10px;"><img  src="<?php echo base_url();?>assets/images/oldimage/search.png" style="height:15px;"></button><a href="<?php echo base_url();?>" title="Click Here to Reload the Page"><img src="<?php echo base_url();?>assets/images/oldimage/refresh(2).png" style="height: 18px;"></a>
                                              </form>
                                            </div>
                                            <div class="col-lg-1 col-4 display-flex center-content toolbar-options"><button class="toolbar-button"  data-bs-target="#modalDownloadFilter" data-bs-toggle="modal" href="#">Download</button></div>
                                            <div class="col-lg-1 col-4 display-flex center-content toolbar-options" >
                                                <!-- <a class="btn btn-primary" data-bs-target="#modaldemo1" data-bs-toggle="modal" href="">View Live Demo</a> -->
                                                <button class="toolbar-button" data-bs-target="#modalSerchFilter" data-bs-toggle="modal" href="#"> <img src="<?php echo base_url();?>assets/images/oldimage/filter.png" style="height:12px; margin-right:5px;">Filter
                                                </button></div>
                                         
                                        </div>
                                      </div>
                                 <!--  </div> -->
                              </div>
                                <div class="card-body">
                                   <!--  <div class="table-responsive datatble-filter">
                                        <table id="example" class="table card-table table-vcenter text-nowrap border p-0"> -->
                                          <div class="table-responsive datatble-filter">
                                            <table id="example" class="table table-bordered text-nowrap key-buttons">
                                            <thead>
                                                <tr>
                                                    <th  class="border-bottom-0"><i class="fa fa-file-text"></i></th>
                                                    <th  class="border-bottom-0">ID</th>
                                                    <th  class="border-bottom-0">Transaction Time </th>
                                                    <th  class="border-bottom-0">Transaction Type</th>
                                                    <th  class="border-bottom-0">Payment Method</th>
                                                    <th  class="border-bottom-0">Transaction Amount</th>
                                                    <th  class="border-bottom-0">Payer Name</th>
                                                    <th  class="border-bottom-0">UTR</th>
                                                    <th  class="border-bottom-0">Credit/Debit</th>
                                                    <th  class="border-bottom-0">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php if($transactionData) {
                                                $i = 1;
                                                foreach ($transactionData as $key ) {
                                              ?>
                                                <tr class="table-subheader"  >
                                                <td>
                                                      <?php if($key->status == "COMPLETED" ) {
                                                        $statusClass = "success";
                                                        $statusIcon = "fa fa-check-square";
                                                        $statusTitle = "Success";
                                                      }elseif($key->status == "FAILED" ) {
                                                        $statusClass = "danger";
                                                        $statusIcon = "fa fa-times"; 
                                                        $statusTitle = "Failed";
                                                      }elseif($key->status == "REVERSED" ) {
                                                        $statusClass = "info";
                                                        $statusIcon = "fa fa-arrow-circle-right"; 
                                                        $statusTitle = "Reversed";
                                                      }else{
                                                        $statusClass = "warning";
                                                        $statusIcon = "fa fa-exclamation-triangle";
                                                        $statusTitle = "Pending"; 
                                                      } ;?>
                                                        <a data-bs-target="#modaldemoDetail<?php echo $i;?>" data-bs-toggle="modal" href="#"> <h5 class="font-weight-bold mb-0 bg-<?php echo $statusClass;?> rounded-pill text-center" title="<?php echo $statusTitle;?>"> <i class="<?php echo $statusIcon;?>"></i></h5>
                                                        </a>
                                                    </td>
                                                <td>
                                            <h5 class="font-weight-bold mb-0"> <?php echo $key->transaction_id;?></h5>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <h5 class="font-weight-bold mb-0"><?php echo $key->transaction_time;?></h5>
                                                    </td>
                                                    <td>
                                                        <h5 class="font-weight-bold mb-0"><?php echo $key->transaction_type;?></h5>
                                                    </td>
                                                     <td>
                                                        <h5 class="font-weight-bold mb-0"><?php echo $key->payment_mode;?></h5>
                                                    </td>
                                                     <td>
                                                        <h5 class="font-weight-bold mb-0"><?php echo sprintf('%.2f', $key->transaction_amount);?></h5>
                                                    </td>
                                                    <td>
                                                        <h5 class="font-weight-bold mb-0"><?php echo $key->rmtr_full_name;?></h5>
                                                    </td>
                                                    <td>
                                                        <h5 class="font-weight-bold mb-0"><?php echo $key->bank_reference_number;?></h5>
                                                    </td>
                                                    
                                                    <td>
                                                        <h5 class="font-weight-bold mb-0"><?php echo $key->debit_credit;?></h5>
                                                    </td>
                                                    
                                                     <td>
                                                      <?php if($key->status == "COMPLETED" ) {
                                                        $statusClass = "success";
                                                      }elseif($key->status == "FAILED" ) {
                                                        $statusClass = "danger";
                                                      }elseif($key->status == "REVERSED" ) {
                                                        $statusClass = "info";
                                                      }else{
                                                        $statusClass = "warning";

                                                      } ;?>
                                                        <a data-bs-target="#modaldemoDetail<?php echo $i;?>" data-bs-toggle="" href="#"> <h5 class="font-weight-bold mb-0 bg-<?php echo $statusClass;?> rounded-pill text-center"><?php echo $key->status;?> <i class="fa fa-caret-down"></i></h5>
                                                        </a>
                                                    </td>
                                                   
                                                </tr>
                                                <tr style="display:none">
                                                    <td colspan="9">
                                                        <div class="">
                                                            <div class="panel panel-primary receipts-inline-table border-0">
                                                                <div class="tab-menu-heading p-0 border-0">
                                                                    <div class="tabs-menu1">
                                                                        <!-- Tabs -->
                                                                        <ul class="nav panel-tabs">
                                                                            <li class=""><a href="#tab1-<?php echo $i;?>" class="active" data-bs-toggle="tab">Basic Details</a></li>
                                                                            <li><a href="#tab2-<?php echo $i;?>" data-bs-toggle="tab">Transaction Details</a></li>
                                                                            <li><a href="#tab3-<?php echo $i;?>" data-bs-toggle="tab">Bank Details</a></li>
                                                                            <li><a href="#tab4-<?php echo $i;?>" data-bs-toggle="tab">Payers Details</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="panel-body tabs-menu-body p-0 border-0">
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane active" id="tab1-<?php echo $i;?>">
                                                                            <table class="table detail-transaction">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th>ID</th>
                                                                                        <th>Transaction Time</th>
                                                                                        <th>Created Time </th>
                                                                                        <th>Transaction Type</th>
                                                                                        <th>Payment Method</th>
                                                                                        <th>Status</th>
                                                                                        <?php if($key->status =='FAILED') { ?>
                                                                                        <th>Failure Reason</th>
                                                                                        <?php } ?>
                                                                                    </tr>
                                                                                    <tr class="last-product">
                                                                                        <td><?php echo $key->transaction_id;?></td>
                                                                                        <td><?php echo $key->transaction_time;?></td>
                                                                                        <td><?php echo $key->create_time;?></td>
                                                                                        <td><?php echo $key->transaction_type;?></td>
                                                                                        <td><?php echo $key->payment_mode;?></td>
                                                                                        <td><?php echo $key->status;?></td>
                                                                                        <?php if($key->status =='FAILED') { ?>
                                                                                        <td><?php echo $key->transaction_failure_reason;?></td>
                                                                                        <?php } ?>
                                                                                    </tr>
                                                                                    
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="tab-pane" id="tab2-<?php echo $i;?>">
                                                                            <table class="table detail-transaction">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th>Transaction Amount</th>
                                                                                        <th>Empirezip Fees</th>
                                                                                        <th>GST</th>
                                                                                        <th>Settlement Amount</th>
                                                                                        <th>Closing Balance</th>
                                                                                        <th>Credit/Debit</th>
                                                                                    </tr>
                                                                                    <tr class="last-product">
                                                                                        <td><?php echo sprintf('%.2f', $key->transaction_amount);?></td>
                                                                                        <td><?php echo sprintf('%.2f', $key->pocketpay_fees);?></td>
                                                                                        <td><?php echo sprintf('%.2f', $key->gst);?></td>
                                                                                        <td><?php echo sprintf('%.2f', $key->settlement_amount);?></td>
                                                                                        <td><?php echo sprintf('%.2f', $key->closing_balance);?></td>
                                                                                        <td><?php echo $key->debit_credit;?></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>

                                                                        <div class="tab-pane" id="tab3-<?php echo $i;?>">
                                                                            <table class="table detail-transaction">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th>Bank Reference Number :</th>
                                                                                        <th>UPI ID</th>
                                                                                        <th>Bank Transaction ID </th>
                                                                                        <th>Benificiary name</th>
                                                                                        <th>Bank Account Number</th>
                                                                                        <th>Bank Ifsc Code UPI</th>
                                                                                    </tr>
                                                                                    <tr class="last-product">
                                                                                        <td><?php echo $key->bank_reference_number;?></td>
                                                                                        <td><?php echo $key->upi_id;?></td>
                                                                                        <td><?php echo $key->bank_reference_number;?></td>
                                                                                        <td><?php echo $key->benificiary_name;?></td>
                                                                                        <td><?php echo $key->bank_account_number;?></td>
                                                                                        <td><?php echo $key->bank_ifsc_code;?></td>
                                                                                        
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="tab-pane" id="tab4-<?php echo $i;?>">
                                                                            <table class="table detail-transaction">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th>Payer UPI ID</th>
                                                                                        <th>Payer Name</th>
                                                                                        <th>Payer Account Number</th>
                                                                                        <th>Payer IFSC Code</th>
                                                                                        <th> Note :</th>
                                                                                    </tr>
                                                                                    <tr class="last-product">
                                                                                        <td><?php echo $key->rmtr_upi_id ;?></td>
                                                                                        <td><?php echo $key->rmtr_full_name ;?></td>
                                                                                        <td><?php echo $key->rmtr_account_no;?></td>
                                                                                        <td><?php echo $key->rmtr_account_ifsc;?></td>
                                                                                        <td><?php echo $key->note;?></td>
                                                                                    </tr>
                                                                                    
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $i++;} } ?>

                                            </tbody>

                                        </table>
                                        <div style="float:right"><?php echo $this->pagination->create_links();?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Row-->

                </div>
            </div>
            <!-- BASIC MODAL -->
             <?php if($transactionData) {
                $i = 1;
                foreach ($transactionData as $key ) {
             ?>
            <div class="modal fade" id="modaldemoDetail<?php echo $i;?>">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                      <span class="border border-danger">
                        
                        <div class="modal-body border">
                          <h3 class="modal-title" style="text-align-last: center;text-transform:uppercase"><u><strong>Transaction Recipt </strong></u></h3>
                          <span class="clearfix">  </span>
                          <div class=" row mt-2 display-flex center-content transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">ID : </div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php echo $key->transaction_id;?></div>
                          </div>
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">Transaction Time :</div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php echo $key->transaction_time;?></div>
                          </div>
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">Created Time :</div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php echo $key->create_time;?></div>
                          </div>
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">Transaction Type :</div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php echo $key->transaction_type;?></div>
                          </div>
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">Payment Method :</div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php echo $key->payment_mode;?></div>
                          </div>
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">Status :</div>
                            <div class="col-lg-6  col-6 option-transaction-value bg-<?php echo $statusClass;?>"><?php echo $key->status;?></div>
                          </div>
                          <?php if($key->status =='FAILED') { ?>
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">Failure Reason :</div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php echo $key->transaction_failure_reason;?></div>
                          </div>
                          <?php } ?>
                          <?php if($key->transaction_amount) { ?>
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">Transaction Amount :</div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php echo sprintf('%.2f', $key->transaction_amount);?></div>
                          </div>
                          <?php } ?>
                          <?php if($key->pocketpay_fees) { ?>
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">EmpireZip Fees :</div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php echo sprintf('%.2f', $key->pocketpay_fees);?></div>
                          </div>
                          <?php } ?>
                          <?php if($key->gst) { ?>
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">GST :</div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php echo sprintf('%.2f', $key->gst);?></div>
                          </div>
                          <?php } ?>
                          <?php if($key->settlement_amount) { ?>
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">Settlement Amount :</div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php echo sprintf('%.2f', $key->settlement_amount);?></div>
                          </div>
                          <?php } ?>
                          <?php if($key->closing_balance) { ?>
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">Closing Balance :</div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php echo sprintf('%.2f', $key->closing_balance);?></div>
                          </div>
                           <?php } ?>
                          <?php if($key->debit_credit) { ?>
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">Credit/Debit :</div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php echo $key->debit_credit;?></div>
                          </div>
                           <?php } ?>
                          <?php if($key->bank_reference_number) { ?>
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">Bank Reference Number :</div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php echo $key->bank_reference_number;?></div>
                          </div>
                          <?php } ?>
                          <?php if($key->upi_id) { ?>
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">UPI ID :</div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php echo $key->upi_id;?></div>
                          </div>
                          <?php } ?>
                          <?php if($key->bank_reference_number) { ?>
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">Bank Transaction ID :</div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php echo $key->bank_reference_number;?></div>
                          </div>
                          <?php } ?>
                          <?php if($key->benificiary_name) { ?>
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">Benificiary name :</div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php echo $key->benificiary_name;?></div>
                          </div>
                          <?php } ?>
                          <?php if($key->bank_account_number) { ?>
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">Bank Account Number  :</div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php echo $key->bank_account_number;?></div>
                          </div>
                          <?php } ?>
                          <?php if($key->bank_ifsc_code) { ?>
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">Bank Ifsc Code UPI :</div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php echo $key->bank_ifsc_code;?></div>
                          </div>
                          <?php } ?>
                          <?php if($key->rmtr_full_name) { ?>
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">Payer Name :</div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php echo $key->rmtr_full_name;?></div>
                          </div>
                          <?php } ?>
                          <?php if($key->rmtr_account_no) { ?>
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">Payer Account Number :</div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php echo $key->rmtr_account_no;?></div>
                          </div>
                          <?php } ?>
                          <?php if($key->rmtr_account_ifsc) { ?>
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">Payer IFSC Code :</div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php echo $key->rmtr_account_ifsc;?></div>
                          </div>
                          <?php } ?>
                          <?php if($key->note) { ?>
                          
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">Note :</div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php echo $key->note;?></div>
                          </div>
                          <?php } ?>

                          
                          <div class=" row mt-2 transaction-details-value">
                            <div class="col-lg-6  col-6 option-transaction">Acknowledged :</div>
                            <div class="col-lg-6  col-6 option-transaction-value"><?php if($key->acknowledged == 1 ) { echo "YES"; } else { echo "NO"; }?></div>
                          </div>
                         
                          <div class=" row mt-2 transaction-details-value">
                            <button class="btn btn-primary btn-block" data-bs-dismiss="modal" type="button">Close</button>
                          </div>
                        </div>
                      </span>
                        
                    </div>
                </div>
            </div>
          <?php $i++;} } ?>
          </div>

            <!-- end app-content-->
        </div>

        <!--Footer-->
       <?php $this->view('commenLayout/footer'); ?>
        <!-- End Footer-->

    </div>

    <div class="modal fade" id="modalSerchFilter">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Filter Transactions</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="" method="GET" id="formDataFilter">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">From Date</label>
                                    <input type="date" placeholder=""  required="" class="form-control" id="search_from_date" name="search_from_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">To Date</label>
                                    <input type="date" placeholder=""  required="" class="form-control" id="search_to_date" name="search_to_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Transaction Types</label>
                                    <select class="form-control select2" data-placeholder="Choose Browser" multiple name="transaction_type[]">
                                        <option value="Funds Added">Funds Added</option>
                                        <option value="Funds Deducted">Funds Deducted</option>
                                        <option value="Bank Transfer">Bank Transfer</option>
                                        <option value="Refund - Bank Transfer">Refund - Bank Transfer</option>
                                        <option value="Verify Bank Account">Verify Bank Account</option>
                                        <option value="Bank Transfer">Refund - Bank Verification</option>
                                        <option value="Verify UPI">Verify UPI</option>
                                        <option value=" Refund - Verify UPI">Refund - Verify UPI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Payment Types</label>
                                    <select class="form-control select2" data-placeholder="Choose Browser" multiple name="payment[]">
                                        <option value="EMPIREZIP_TRANSFER_ADMIN">EMPIREZIP_TRANSFER_ADMIN</option>
                                        <option value="EMPIREZIP_TRANSFER">EMPIREZIP_TRANSFER</option>
                                        <option value="UPI">UPI</option>
                                        <option value="IMPS">IMPS</option>
                                        <option value="NEFT">NEFT</option>
                                        <option value="RTGS">RTGS</option>
                                        <option value="FT">FT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-control select2" data-placeholder="Choose Browser" multiple name="txn_status[]">
                                        <option value="PENDING">PENDING</option>
                                        <option value="COMPLETED">COMPLETED</option>
                                        <option value="FAILED">FAILED</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">SORT ORDER</label>
                                    <input type="radio" id="desc" name="sort" value="ASC">
                                    <label for="desc" class="age">OLDEST</label>
                                    <input type="radio" id="asc" name="sort" value="DESC" checked>
                                    <label for="asc" class="age">LATEST</label><br>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" onclick=applyFilter()>APPLY</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDownloadFilter">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Download Transactions</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" action="b2b/downloadExcelReportDateWise" method="post" id="formDataDownload" enctype='multipart/form-data'> 
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">From Date</label>
                                    <input type="date" placeholder=""  required="" class="form-control" id="from_date" name="from_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">To Date</label>
                                    <input type="date" placeholder=""  required="" class="form-control" id="to_date" name="to_date" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" onclick=applyDownload()>APPLY</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        

    <!-- Back to top -->
    <a href="#top" id="back-to-top">
        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"/></svg>
    </a>

     <!-- Modal -->
        <div class="modal fade " id="largemodalPayment" tabindex="-1" role="dialog" aria-labelledby="largemodalPayment" aria-hidden="true" >
            <div class="modal-dialog modal-lg " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largemodal1" style="margin: 0 auto;">Payment Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="card-pay">
                                <ul class="tabs-menu nav">
                                    <li class=""><a href="#tab20" class="active" data-bs-toggle="tab"><i class="fa fa-university"></i>BANK TRANSFER</a></li>
                                    <li><a href="#tab22" data-bs-toggle="tab" class=""><i class="fa fa-plus"></i>  ADD FUND </a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tab20">
                                        <div class="mb-0 border">
                                            <div class="card-body text-center">
                                                <div class="card-title text-start text-dark">Transfer Funds</div>
                                                <form method="POST" >
                                                  <div class="row">
                                                      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                                      <div class="col-sm-6 col-md-6">
                                                          <div class="mb-3">
                                                              <label class="form-label float-start">Enter Your Amount</label>
                                                              <div class="input-group">
                                                                  <input type="text"  class="form-control only_number" name="amount" id="amount"  onkeyup="word.innerHTML=convertNumberToWords(this.value)">
                                                              </div>
                                                              <span class="amountErr error" style="color: red;text-align: center"></span>
                                                              <div id="word"></div>
                                                          </div>
                                                      </div>
                                                      <div class="col-sm-6 col-md-6">
                                                          <div class="mb-3">
                                                              <label class="form-label float-start">Transfer Type</label>
                                                              <div class="input-group">
                                                                  <!-- <select name="transfer" id="mySelectTransfer" onchange="changeTransfer()"  class="form-control select2 br-0 nice-select br-tl-0 br-bl-0"> -->
                                                                    <select name="transfer" id="mySelectTransfer" onchange=changeTransfer() class="form-control">
                                                                      <option value="IMPS">IMPS</option>
                                                                      <option value="RTGS">RTGS</option>
                                                                      <option value="NEFT">NEFT</option>
                                                                      <option value="UPI">UPI</option>
                                                                    </select>
                                                              </div>
                                                              <span class="mySelectTransferErr error" style="color: red;text-align: center"></span>
                                                          </div>
                                                      </div>

                                                      <div class="col-sm-6 col-md-6" id="AccountTransfer">
                                                          <div class="mb-3">
                                                              <label class="form-label float-start">Account Number</label>
                                                              <div class="input-group">
                                                                  <input type="text" class="form-control" name="acc-number"  id="acc-number" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)">
                                                             </div>
                                                              <span class="acc-numberErr error" style="color: red;text-align: center"></span>
                                                          </div>
                                                      </div>
                                                      <div class="col-sm-6 col-md-6" id="IFSCTransfer">
                                                          <div class="mb-3">
                                                              <label class="form-label float-start">IFSC CODE</label>
                                                              <div class="input-group">
                                                                  <input type="text" class="form-control" name="ifsc-code" id="ifsc-code" maxlength="11" style="text-transform:uppercase" onkeyup="myFunction(this.value)">
                                                              </div>
                                                              <span class="ifsc-codeErr error" style="color: red;text-align: center"></span>
                                                          </div>
                                                      </div>
                                                      <div  style="padding:10px; font-size: small; color: red; display: grid; justify-content: center; align-items: center;">
                                                                    <div id="ifsc-code-validation-char"></div>
                                                                    <div id="ifsc-code-validation-length"></div>
                                                                  </div>

                                                                  <div class="ifsc-code-result" id="ifsc-code-results" style="display: none;">
                                                                    <div>Bank Name : <span class="bank_name"></span> </div>
                                                                    <div>Branch Name : <span class="branch_name"></span>  </div>
                                                                  </div>
                                                      <div class="col-sm-12 col-md-12" id="BeneficiaryTransfer">
                                                          <div class="mb-3">
                                                              <label class="form-label float-start">Beneficiary Name</label>
                                                              <div class="input-group">
                                                                <input type="text" class="form-control" name="beneficiary-name" id="beneficiary-name" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)" maxlength="25">
                                                              </div>
                                                              <span class="beneficiary-nameErr error" style="color: red;text-align: center"></span>
                                                              <a href="#" onclick="return verifyBeneName();" style="border:none; background-color: none; color: rgb(11, 11, 95);"> Beneficiary Verify</a>
                                                          </div>
                                                      </div>
                                                      <div class="col-sm-12 col-md-12" id="UpiTransfer" style="display: none;">
                                                          <div class="mb-3">
                                                              <label class="form-label float-start">UPI</label>
                                                              <div class="input-group">
                                                                <input type="text" name="upi_transfer" id="upi_transfer" class="form-control">
                                                              </div>
                                                              <span class="upi_transferErr error" style="color: red;text-align: center"></span>
                                                          </div>
                                                      </div>
                                                      
                                                      <div class="col-sm-6 col-md-6" id="NoteTransfer">
                                                          <div class="mb-3">
                                                              <label class="form-label float-start">Notes</label>
                                                              <div class="input-group">
                                                                  <input type="text" name="note" id="note" class="form-control">
                                                              </div>
                                                               <span class="noteErr error" style="color: red;text-align: center"></span>
                                                          </div>
                                                      </div>

                                                      <div class="col-sm-6 col-md-6" id="ReferenceTransfer">
                                                          <div class="mb-3">
                                                              <label class="form-label float-start">Reference Number (Optional)</label>
                                                              <div class="input-group">
                                                                  <input type="text" name="ref-number" id="ref-number" class="form-control">
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <a class="btn btn-block btn-secondary" onclick="return transferAmount();">Initaiate Transfer</a>
                                                  </div>
                                              </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab22">
                                        <?php if($Virtualcount == 1 ) { ?>
                                          <p>Bank account details</p>
                                          <dl class="card-text">
                                            <dt>Company Name: </dt>
                                            <dd><?php echo $agentData->cashout_agent_company_name;?></dd>
                                          </dl>
                                          <dl class="card-text">
                                              <dt>Account Details:</dt>
                                              
                                              <dd> 
                                                  <div><?php echo $virtualAccData->account_number1;?> / <?php echo $virtualAccData->account_ifsc1;?> </div>
                                                   <div><?php echo $virtualAccData->account_number2;?> / <?php echo $virtualAccData->account_ifsc2;?> </div>
                                                
                                              </dd>
                                          </dl>
                                          <p class="mb-0"><strong>Note : </strong>If the money is transferred through IMPS/UPI, the amount will be reflected in your EmpireZip  account within 10 mins.</p>
                                          <br>
                                          <p class="mb-0"><strong>Note : </strong>If the money is transferred through NEFT/RTGS, the amount will be reflected in your EmpireZip  Account within 3 working hours. </p>
                                        <?php }else { ?>
                                          <?php  $accountApproved = $agentData->cashout_agent_is_admin_approved;
                                          $profile_completed = $agentData->cashout_agent_is_profile_completed;
                                          if(($accountApproved == '0' && $profile_completed == '0' ) || ($accountApproved == '0' && $profile_completed == '1') || ($accountApproved == '2' && $profile_completed == '0') )  { ?>
                                             <dl class="card-text">
                                              <!-- <dt>Account Details:</dt> -->
                                              <dd> 
                                                <a class="btn btn-warning btn-block accountApproved"> Enable Virtual Account </a>
                                               </dd>
                                              </dl>
                                            <?php  }else { ?>
                                              <div class="card">
                                                <div class="card-header" style="margin: 0 auto">
                                                    <h4 class="card-title">Activate Virtual Account</h4>
                                                </div>
                                                <div class="card-body text-center">
                                                    <form action="" method="POST" id="formDataVirtualAccount">
                                                      <div class="row">
                                                      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                                        <div class="">
                                                            <div class="col-md-6" style="display: none;">
                                                                <label for="exampleInputEmail1" class="form-label">Reference Number ID</label>
                                                                <input class="form-control" type="text" name="virtualref" id="virtualref" value="<?php echo $agentData->cashout_agent_contact_person;?>" readonly>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12" style="display: block;">
                                                                <label for="exampleInputEmail1" class="alert alert-primary text-center">*Allow Transfers only from A Specific Bank Account*</label>
                                            </div>
                                                                <form method="POST" >
                                                  <div class="row">
                                                      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                                      <div class="col-sm-6 col-md-6" id="AccountTransfer">
                                                          <div class="mb-3">
                                                              <label class="form-label float-start">Account Number</label>
                                                              <div class="input-group">
                                                                  <input type="text" class="form-control" name="acc-number" id="acc-number" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)">
                                                              </div>
                                                              <span class="acc-numberErr error" style="color: red;text-align: center"></span>
                                                          </div>
                                                      </div>
                                                      <div class="col-sm-6 col-md-6" id="IFSCTransfer">
                                                          <div class="mb-3">
                                                              <label class="form-label float-start">IFSC CODE</label>
                                                              <div class="input-group">
                                                                  <input type="text" class="form-control" name="ifsc-code" id="ifsc-code" style="text-transform:uppercase" onkeyup="myFunction(this.value)">
                                                              </div>
                                                              <span class="ifsc-codeErr error" style="color: red;text-align: center"></span>
                                                          </div>
                                                      </div>
                                                      <a href="#" onclick="return verifyBeneName();" type="button" class="btn btn-secondary btn-block" > Beneficiary Verify</a>
                                                      <div  style="padding:10px; font-size: small; color: red; display: grid; justify-content: center; align-items: center;">
                                                                    <div id="ifsc-code-validation-char"></div>
                                                                    <div id="ifsc-code-validation-length"></div>
                                                                  </div>

                                                                  <div class="ifsc-code-result" id="ifsc-code-results" style="display: none;">
                                                                    <div>Bank Name : <span class="bank_name"></span> </div>
                                                                    <div>Branch Name : <span class="branch_name"></span>  </div>
                                                                  </div>
                                                      <div class="col-sm-12 col-md-12" id="BeneficiaryTransfer">
                                                          <div class="mb-3">
                                                              <label class="form-label float-start">Beneficiary Name</label>
                                                              <div class="input-group">
                                                                <input type="text" class="form-control" name="beneficiary-name" id="beneficiary-name" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)" maxlength="25" disabled>
                                                              </div>
                                                              <span class="beneficiary-nameErr error" style="color: red;text-align: center"></span>
                                                              
                                                          </div>
                                                      </div></div> </form>
                                                              </div>
                                                            
                                                        </div>
                                                        <button class="btn btn-success btn-block" onclick="return addvirtualAccount();">Activate</button>

                                                    </form>
                                                </div>
                                              </div>


                                              <?php  } ?>



                                       <?php  } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
       <!--  <div class="modal fade " id="largemodalQR" tabindex="-1" role="dialog" aria-labelledby="largemodalQR" aria-hidden="true" >
            <div class="modal-dialog modal-sm " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largemodal1">Payment Recieved</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                    </div>
                    <div class="modal-body">
                       
                        <div class="widget-user-image text-center">
                            <h5  style="color: blue;" ><strong>INSTANT PAY</strong></h5>
                            <canvas id="qr-code"></canvas>
                            <br>    
                             <h5 style="text-align: center;" ><strong>EPOCKETPAY SOLUTION PRIVATE LIMITED</strong></h5>
                        <div class="pro-user text-center">
                            <h6 class="pro-user-desc text-muted"> upi :  <?php echo $agentData->maha_merchantVirtualAddress;?></h6>
                            
                            <a onclick="downloadImage('https://empirezip.com/assets/images/code.png', 'qr.png')" ><i class="fa fa-download"></i> DOWNLOAD</a>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                       <div class="row">
                            <div class="col-sm-12 border-end text-center">
                                <p style="text-align: center;">Scan and Pay using any UPI App</p>
                                <div class="avatar-list avatar-list-stacked">
                                    <img src="https://empirezip.com/assets/images/paytm-226448.webp" class="qr-brands">
                                    <img src="https://empirezip.com/assets/images/PhonePe-Logo.wine.png" class="qr-brands">
                                    <img src="https://empirezip.com/assets/images/Google-Pay-Logo-Icon-PNG.png" class="qr-brands">
                                    <img src="https://empirezip.com/assets/images/Amazon_Pay-Logo.wine.png" class="qr-brands">
                                </div>
                                <div class="avatar-list avatar-list-stacked">
                                    <img src='https://empirezip.com/assets/images/png-transparent-india-rupay-debit-card-bank-credit-card-india-text-trademark-logo.png' style="height:30px; margin-right: 10px;" class="qr-brands">
                                    <img src='https://empirezip.com/assets/images/1763558.jpg' style="height:30px" class="qr-brands">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

         <div class="modal fade " id="largemodalQRCashfree" tabindex="-1" role="dialog" aria-labelledby="largemodalQRCashfree" aria-hidden="true" >
            <div class="modal-dialog modal-sm " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largemodal1">Payment Recieved</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                    </div>
                    <div class="modal-body">
                       
                        <div class="widget-user-image text-center">
                            <h5  style="color: blue;" ><strong>EMPIRE ZIP</strong></h5>
                            <canvas id="qr-code1"></canvas>
                            <!-- <img alt="User Avatar"  src="https://empirezip.com/assets/images/code.png" height="150px"></div> -->
                            <br>    
                             <h5 style="text-align: center;" ><strong><?php echo $agentData->cashout_agent_company_name;?></strong></h5>
                        <div class="pro-user text-center">
                            <h6 class="pro-user-desc text-muted"> upi :   <?php echo $agentData->virtualVpaId;?></h6>
                            
                            <a onclick="downloadImage('https://empirezip.com/assets/images/code.png', 'qr.png')" ><i class="fa fa-download"></i> DOWNLOAD</a>
                           <!--  <a href="https://empirezip.com/assets/images/code.png" target="_blank" download><i class="fa fa-download"></i> Download  </a> -->
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                       <div class="row">
                            <div class="col-sm-12 border-end text-center">
                                <p style="text-align: center;">Scan and Pay using any UPI App</p>
                                <div class="avatar-list avatar-list-stacked">
                                    <img src="https://empirezip.com/assets/images/paytm-226448.webp" class="qr-brands">
                                    <img src="https://empirezip.com/assets/images/PhonePe-Logo.wine.png" class="qr-brands">
                                    <img src="https://empirezip.com/assets/images/Google-Pay-Logo-Icon-PNG.png" class="qr-brands">
                                    <img src="https://empirezip.com/assets/images/Amazon_Pay-Logo.wine.png" class="qr-brands">
                                </div>
                                <div class="avatar-list avatar-list-stacked">
                                    <img src='https://empirezip.com/assets/images/png-transparent-india-rupay-debit-card-bank-credit-card-india-text-trademark-logo.png' style="height:30px; margin-right: 10px;" class="qr-brands">
                                    <img src='https://empirezip.com/assets/images/1763558.jpg' style="height:30px" class="qr-brands">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    <?php $this->view('commenLayout/script'); ?>

    <!-- Change Open-->

  <script type="text/javascript">
    function downloadImage(url, name){
      fetch(url)
        .then(resp => resp.blob())
        .then(blob => {
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.style.display = 'none';
            a.href = url;
            // the filename you want
            a.download = name;
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
        })
        .catch(() => alert('An error sorry'));
    }
  </script>
  <script type="text/javascript">
    $('.accountApproved').click(function(event) {
        var accountApproved = '<?php echo $agentData->cashout_agent_is_admin_approved;?>';
        var profile_completed = '<?php echo $agentData->cashout_agent_is_profile_completed;?>';
        var adminRedirectUrl="<?php echo base_url().'b2b/edit_profile'?>";
        if(accountApproved == '0' && profile_completed == '0') {
          swal("Your account is pending activation!" + "\n \n" + "Please submit your documents for activating your EMPIREZIP MONEY account.!");

          //swal("Your account is pending activation! Please submit your documents for activating your POCKETPAY account.");
          setTimeout(function () 
            {
           window.location.href=adminRedirectUrl },4000);    
        }
        if(accountApproved == '0' && profile_completed == '1') {
          swal("Your KYC is sumbit Successfully." + "\n " + "Your KYC documents are under review wait for Approval");
          //setTimeout(location.reload.bind(location), 2500);
        }
        if(accountApproved == '2' && profile_completed == '0') {
          swal("Your KYC is Rejectd." + "\n \n" + "Please Resumbit KYC Documents");
          //setTimeout(location.reload.bind(location), 2500);
        }
        if(accountApproved == '1' && profile_completed == '1') {
          return true;
        }
     });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
  <script>
    /* JS comes here */
    //display the 'value' field with the upi-id
    var qr;
      (function() {
        qr = new QRious({
        element: document.getElementById('qr-code'),
        size: 100,
        value : '<?php echo $qrdata;?>'
        //value: 'https://pocketdev.com'
        });
      s})();
  </script>

  <script>
    /* JS comes here */
    //display the 'value' field with the upi-id
    var qr1;
    (function() {
                  qr1 = new QRious({
                  element: document.getElementById('qr-code1'),
                  size: 100,
                  value : '<?php echo $cashfreeqrdata;?>'
                  //value: 'https://pocketdev.com'
              });
          })();
  </script>
  <script type="text/javascript">
    function changeTransfer() {

          var x = document.getElementById("mySelectTransfer").value;
          if (x === 'IMPS') {
            console.log(x);
            document.getElementById('AccountTransfer').style.display = 'block';
            document.getElementById('IFSCTransfer').style.display = 'block';
            document.getElementById('BeneficiaryTransfer').style.display = 'block';
            document.getElementById('UpiTransfer').style.display = 'none';
            document.getElementById('NoteTransfer').style.display = 'block';
            document.getElementById('ReferenceTransfer').style.display = 'block';

          }

          if (x === 'RTGS') {
            console.log(x);
            document.getElementById('AccountTransfer').style.display = 'block';
            document.getElementById('IFSCTransfer').style.display = 'block';
            document.getElementById('BeneficiaryTransfer').style.display = 'block';
            document.getElementById('UpiTransfer').style.display = 'none';
            document.getElementById('NoteTransfer').style.display = 'block';
            document.getElementById('ReferenceTransfer').style.display = 'block';
          }

          if (x === 'NEFT') {
            console.log(x);
            document.getElementById('AccountTransfer').style.display = 'block';
            document.getElementById('IFSCTransfer').style.display = 'block';
            document.getElementById('BeneficiaryTransfer').style.display = 'block';
            document.getElementById('UpiTransfer').style.display = 'none';
            document.getElementById('NoteTransfer').style.display = 'block';
            document.getElementById('ReferenceTransfer').style.display = 'block';
          }

          if (x === 'UPI') {
            console.log(x);
            document.getElementById('AccountTransfer').style.display = 'none';
            document.getElementById('IFSCTransfer').style.display = 'none';
            document.getElementById('BeneficiaryTransfer').style.display = 'block';
            document.getElementById('UpiTransfer').style.display = 'block';
            document.getElementById('NoteTransfer').style.display = 'block';
            document.getElementById('ReferenceTransfer').style.display = 'block';
          }
        }
  </script>
  <script type="text/javascript">
    $(function () {
        //alert('Document is ready');
        var ifscCode = document.getElementById('ifsc-code');
        var ifscValidationLength = document.getElementById('ifsc-code-validation-length');
        var ifscValidationChar = document.getElementById('ifsc-code-validation-char');
        $('#ifsc-code').keyup(function () {
          var ifscCodeLength = ifscCode.value.length;
          if (ifscCodeLength != 11) {
            ifscValidationLength.innerText = "Please enter 11 digits.";
          }
          var fifthChar = ifscCode.value.charAt(5);
          if ($("#ifsc-code").val().length > 4) {
            var fifthChar = ifscCode.value.charAt(4);
            if (fifthChar != 0) {
              ifscValidationChar.innerText = " 5th character in an IFSC code must be the digit - 0 . ";
            }
          }
          if ($("#ifsc-code").val().length == 11 && fifthChar == 0) {
            document.getElementById('ifsc-code-results').style.display = 'grid';
          }
          if ($("#ifsc-code").val().length == 11) {
            ifscValidationLength.innerText = "";
          }
          if ( fifthChar == 0) {
            ifscValidationChar.innerText = "";
          }
        })
      });
  </script>
  <script type="text/javascript">
    function myFunction(ifscCode) {
      var bank_name = document.getElementsByClassName('bank_name');
      var branch_name = document.getElementsByClassName('branch_name');
      var numberOfDigits = ifscCode.length;
      if(numberOfDigits == 11) {
        var url="<?php echo base_url()."b2b/bankIfscDetail"?>";
        $.ajax({
            type: "POST",
            url: url,
            data:({
                ifscCode : ifscCode,
                <?php echo $this->security->get_csrf_token_name(); ?> : '<?php echo $this->security->get_csrf_hash(); ?>'
            }),
            cache: false,
            success: function(data)
                {
                  //alert(data);   
                  var res = data;
                  var strArray = res.split("@");
                  var bank = strArray[0];
                  var branch = strArray[1];
                  $(".bank_name").html(bank);
                  $(".branch_name").html(branch);
                  //bank_name.innerText = bank;
                  //branch_name.innerText = branch;
                }
        });
      }
      return false;  
    }
  </script>
  <script type="text/javascript">
        function transferAmount() {
          var data = new FormData($('#formDataBankTransfer')[0]);
          var cashout_verification_status = "<?php echo $agentData->cashout_transfer_status;?>";
          var amount =$('#amount').val();
          var mySelectTransfer =$('#mySelectTransfer').val();
          var accountnumber =$('#acc-number').val();
          var ifsc =$('#ifsc-code').val();
          var upi_bank =$('#upi_transfer').val();
          var upi_transfer =$('#upi_transfer').val();
          var beneficiaryname =$('#beneficiary-name').val();
          var note =$('#note').val();
          var referencenumber =$('#ref-number').val();
          var otp_transfer =$('#otp_transfer').val();
          $(".amountErr").html("");
          $(".amountErr").hide("");
          $(".mySelectTransferErr").html("");
          $(".mySelectTransferErr").hide("");
          $(".acc-numberErr").html("");
          $(".acc-numberErr").hide("");
          $(".ifsc-codeErr").html("");
          $(".ifsc-codeErr").hide("");
          $(".upi_transferErr").html("");
          $(".upi_transferErr").hide("");
          $(".beneficiary-nameErr").html("");
          $(".beneficiary-nameErr").hide("");
          $(".noteErr").html("");
          $(".noteErr").hide("");
          $(".otp_transferErr").html("");
          $(".otp_transferErr").hide("");
          if(cashout_verification_status == "inactive") {
            swal("Your Transfer Service is INACTIVE");
            return false;
          }
          if (isNaN(amount)){
            $("#amount").focus();
            $(".amountErr").slideDown('slow');
            $(".amountErr").html("Please Enter Valid Amount.");
            return false;
            }
          if(amount == "") {
            $("#amount").focus();
            $(".amountErr").slideDown('slow');
            $(".amountErr").html("Please Enter Amount.");
            return false;
          }

          if((amount > 200000) && (mySelectTransfer == 'NEFT')) {
            $("#amount").focus();
            $(".amountErr").slideDown('slow');
            $(".amountErr").html("Maximum amount 2Lakhs");
            return false;
          }
          if((amount > 200000) && (mySelectTransfer == 'IMPS')) {
            $("#amount").focus();
            $(".amountErr").slideDown('slow');
            $(".amountErr").html("Maximum amount 2Lakh.");
            return false;
          }
          if((amount <= 200000) && (mySelectTransfer == 'RTGS')) {
            $("#amount").focus();
            $(".amountErr").slideDown('slow');
            $(".amountErr").html("Minimum amount 2Lakhs.");
            return false;
          }
          if((amount > 100000) && (mySelectTransfer == 'UPI')) {
            $("#amount").focus();
            $(".amountErr").slideDown('slow');
            $(".amountErr").html("Maximum amount 1Lakh.");
            return false;
          }
          if(mySelectTransfer == "") {
            $("#mySelectTransfer").focus();
            $(".mySelectTransferErr").slideDown('slow');
            $(".mySelectTransferErr").html("Please Select.");
            //swal("Please Select");
            return false;
          }
          if(accountnumber == "" && mySelectTransfer != 'UPI') {
            $("#accountnumber").focus();
            //swal("Please Fill Your Account Number");
            $(".acc-numberErr").slideDown('slow');
            $(".acc-numberErr").html("Please Fill Your Account Number.");
            return false;
          }
          if(ifsc == "" && mySelectTransfer != 'UPI') {
            $("#ifsc").focus();
            //swal("Please Fill IFSC Code");
            $(".ifsc-codeErr").slideDown('slow');
            $(".ifsc-codeErr").html("Please Fill IFSC Code.");
            return false;
          }
          if(upi_bank == "" && mySelectTransfer == 'UPI') {
            $("#upi_transfer").focus();
            //swal("Please Fill Your UPI");
            $(".upi_transferErr").slideDown('slow');
            $(".upi_transferErr").html("Please Fill Your UPI");
            return false;
          }
          if(beneficiaryname == "") {
            $("#beneficiary-name").focus();
            //swal("Please Fill Beneficiary Name");
            $(".beneficiary-nameErr").slideDown('slow');
            $(".beneficiary-nameErr").html("Please Fill Beneficiary Name.");
            return false;
          }

          if (/[^A-Za-z 0-9]/g.test(beneficiaryname)) {
    			   $("#beneficiary-name").focus();
            	//swal("Please Fill Beneficiary Name");
            	$(".beneficiary-nameErr").slideDown('slow');
            	$(".beneficiary-nameErr").html("No Special Character Allowed.");
    			   return false;
  			 }
          if(note == "") {
            $("#note").focus();
            //swal("Please Fill Note Name");
            $(".noteErr").slideDown('slow');
            $(".noteErr").html("Please Fill Note Name,");
            return false;
          }
          // if(otp_transfer == "") {
          //   $("#otp_transfer").focus();
          //   //swal("Please Fill Note Name");
          //   $(".otp_transferErr").slideDown('slow');
          //   $(".otp_transferErr").html("Please Fill Transfer OTP,");
          //   return false;
          // }
          // if(referencenumber == "") {
          //   $("#ref-number").focus();
          //   swal("Please Fill Reference Number");
          //   return false;
          // }
          
          document.getElementById('global-loader').style.display = 'block';
          $.ajax({
            type:"POST",
            dataType: 'text',
            url: "<?php echo base_url();?>b2b/bank_transfer",
            data: {
              amount: amount,
              mySelectTransfer: mySelectTransfer,
              accountnumber: accountnumber,
              ifsc: ifsc,
              upi_bank: upi_bank,
              beneficiaryname : beneficiaryname,
              note : note,
              referencenumber: referencenumber,
              //otp_transfer: otp_transfer,
              <?php echo $this->security->get_csrf_token_name(); ?> : '<?php echo $this->security->get_csrf_hash(); ?>'
            }, 
           
            success: function(data)
             {
              ///alert(data);
              console.log(data);
              document.getElementById('global-loader').style.display = 'none';
              //$('#loaders').modal('hide');
              var res = data;
              //alert(data);
              var strArray = res.split("@");
              //alert(strArray);
              var rs = strArray[0];
              //alert(rs);
              var rms = strArray[1];
              //alert(rms);
              if(rs == 'insufficient'){
                //swal("Error", "Insufficient Balance", "error");
                swal("Error", "Insufficient Balance", "error");
                window.location.href = "<?php echo site_url();?>b2b";
              }else if(rs == 'MISMATCHED'){
                //swal("Error", "Verification Failed", "error");
                swal("Error", rms, "error");
                window.location.href = "<?php echo site_url();?>b2b";
              }else if(rs == '0'){
                //swal("Error", "Verification Failed", "error");
                swal("Error", rms, "error");
                window.location.href = "<?php echo site_url();?>b2b";
              }else if(rs == '9'){
                //swal("Error", "Verification Failed", "error");
                swal("Error", rms, "error");
                window.location.href = "<?php echo site_url();?>b2b";
              }else if(rs == '1'){
                //swal("Success", "Verification Successful", "success");
                swal("Success", rms, "success");
                window.location.href = "<?php echo site_url();?>b2b";
              }else if(rs == '2'){
                //swal("Success", "Verification PENDING", "success");
                swal("Success", rms, "success");
                window.location.href = "<?php echo site_url();?>b2b";
              }else {
                 swal(data);
              }
             }
          });
          return false;
        }
  </script>
  <script type="text/javascript">
    function verifyBeneName() {
      var data = new FormData($('#formDataBankVerification')[0]);
      var mySelectVerification =$('#mySelectTransfer').val();
      var accountnumber =$('#acc-number').val();
      var ifsc =$('#ifsc-code').val();
      var upi_bank =$('#upi_transfer').val();
      var cashout_verification_status = "<?php echo $agentData->cashout_verification_status;?>";
      $(".mySelectTransferErr").html("");
      $(".mySelectTransferErr").hide("");
      $(".acc-numberErr").html("");
      $(".acc-numberErr").hide("");
      $(".ifsc-codeErr").html("");
      $(".ifsc-codeErr").hide("");
      $(".upi_transferErr").html("");
      $(".upi_transferErr").hide("");
      if(cashout_verification_status == "inactive") {
        swal("Your Verification Service is INACTIVE");
        return false;
      }
      if(mySelectVerification == "") {
        $("#mySelectTransfer").focus();
        //swal("Please Select");
        $(".mySelectTransferErr").slideDown('slow');
        $(".mySelectTransferErr").html("Please Select.");
        return false;
      }
      if(accountnumber == "" && (mySelectVerification == 'IMPS' || mySelectVerification == 'RTGS' || mySelectVerification == 'NEFT')) {
        $("#acc-number").focus();
        //swal("Please Fill Your Account Number");
        $(".acc-numberErr").slideDown('slow');
        $(".acc-numberErr").html("Please Fill Your Account Number.");
        return false;
      }
      if(ifsc == "" && (mySelectVerification == 'IMPS' || mySelectVerification == 'RTGS' || mySelectVerification == 'NEFT')) {
        $("#ifsc-code").focus();
        //swal("Please Fill IFSC Code");
        $(".ifsc-codeErr").slideDown('slow');
        $(".ifsc-codeErr").html("Please Fill IFSC Code.");
        return false;
      }
      if(upi_bank == "" && mySelectVerification == 'UPI') {
        $("#upi_transfer").focus();
        //swal("Please Fill Your UPI");
        $(".upi_transferErr").slideDown('slow');
        $(".upi_transferErr").html("Please Fill Your UPI.");
        return false;
      }
        document.getElementById('global-loader').style.display = 'block';
       // $('#loaders').modal('show');
        $.ajax({
          type:"POST",
          dataType: 'text',
          url: "<?php echo base_url();?>b2b/bank_verification_trnasfer",
          data: {
            mySelectVerification: mySelectVerification,
            accountnumber: accountnumber,
            ifsc: ifsc,
            upi_bank: upi_bank,
            <?php echo $this->security->get_csrf_token_name(); ?> : '<?php echo $this->security->get_csrf_hash(); ?>'
          }, 
         
          success: function(data)
           {
            alert(data);
            console.log(data);
            document.getElementById('global-loader').style.display = 'none';
            var res = data;
            //alert(data);
            var strArray = res.split("@");
            //alert(strArray);
            var rs = strArray[0];
            //alert(rs);
            var rms = strArray[1];
            var rmsname = strArray[2];
            if(rs == 'insufficient'){
              //swal("Error", "Insufficient Balance", "error");
              swal("Error", "Insufficient Balance", "error");
              //window.location.href = "<?php echo site_url();?>b2b";
            }else if(rs == '0'){
              //swal("Error", "Verification Failed", "error");
              swal("Error", rms, "error");
              //window.location.href = "<?php echo site_url();?>b2b";
            }else if(rs == '9'){
              //swal("Error", "Verification Failed", "error");
              swal("Error", rms, "error");
              //window.location.href = "<?php echo site_url();?>b2b";
            }else if(rs == '1'){
              //swal("Success", "Verification Successful", "success");
              //alert(rmsname);
              $("#beneficiary-name").val(rmsname);
              swal("Success", rms, "success");
              //window.location.href = "<?php echo site_url();?>b2b";
            }else if(rs == '2'){
              //swal("Success", "Verification PENDING", "success");
              //alert(rmsname);
              $("#beneficiary-name").val(rmsname);
              swal("Success", rms, "success");
              //window.location.href = "<?php echo site_url();?>b2b";
            }else {
               swal(data);
            }
           }
        });
        

      return false;
    }
  </script>

  <script type="">
        function cashfreeUpiGenerate() {
          var cashout_agent_is_admin_approved = "<?php echo $agentData->cashout_agent_is_admin_approved;?>";
          if(cashout_agent_is_admin_approved != "1") {
            swal("Your Is Not yet APPROVED By admin");
            return false;
          }
          document.getElementById('global-loader').style.display = 'block';
            $.ajax({
              type:"POST",
              dataType: 'text',
              url: "<?php echo base_url();?>b2b/cashfreeUpiGenerate",
              data: {
                <?php echo $this->security->get_csrf_token_name(); ?> : '<?php echo $this->security->get_csrf_hash(); ?>'
              }, 
             
              success: function(data)
               {
                //alert(data);
                console.log(data);
                document.getElementById('global-loader').style.display = 'none';
                var res = data;
                //alert(data);
                var strArray = res.split("@");
                //alert(strArray);
                var rs = strArray[0];
                //alert(rs);
                var rms = strArray[1];
                var rmsname = strArray[2];
                if(rs == 'insufficient'){
                  //swal("Error", "Insufficient Balance", "error");
                  swal("Error", "Insufficient Balance", "error");
                  //window.location.href = "<?php echo site_url();?>b2b";
                }else if(rs == '0'){
                  //swal("Error", "Verification Failed", "error");
                  swal("Error", rms, "error");
                  //window.location.href = "<?php echo site_url();?>b2b";
                }else if(rs == '9'){
                  //swal("Error", "Verification Failed", "error");
                  swal("Error", rms, "error");
                  //window.location.href = "<?php echo site_url();?>b2b";
                }else if(rs == '1'){
                  //swal("Success", "Verification Successful", "success");
                  //alert(rmsname);
                  swal("Success", rms, "success");
                  //window.location.href = "<?php echo site_url();?>b2b";
                }else if(rs == '2'){
                  //swal("Success", "Verification PENDING", "success");
                  //alert(rmsname);
                  swal("Success", rms, "success");
                  //window.location.href = "<?php echo site_url();?>b2b";
                }else {
                   swal(data);
                }
               }
            });
            

          return false;
        }
  </script>

  <script type="text/javascript">
    $('.accountcashfreeQr').click(function(event) {
        var accountApproved = '<?php echo $agentData->virtualVpastatus;?>';
        var virtualVparesponse = '<?php echo $agentData->virtualVparesponse;?>';        
        if(accountApproved == 'SUCCESS') {
          swal("Your account is  activated!");

          //swal("Your account is pending activation! Please submit your documents for activating your POCKETPAY account.");
          setTimeout(function () 
            {
           window.location.href=adminRedirectUrl },4000);    
        }else if(accountApproved == 'ERROR') {
          swal("Your account is not activated!");

          //swal("Your account is pending activation! Please submit your documents for activating your POCKETPAY account.");
          setTimeout(function () 
            {
           window.location.href=adminRedirectUrl },4000);    
        }else {
           swal("Your account is Pending !" + "\n \n" + "Please submit your documents for activating your EMPIREZIP account.!");

        }
        
     });
  </script>

  <script>
    function convertNumberToWords(amount) {

      $('.only_number').on('keypress', function (e) {
      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          $("#errmsg").html("Digits Only").show().fadeOut("slow");
                 return false;
      }
      });
      var words = new Array();
      words[0] = '';
      words[1] = 'One';
      words[2] = 'Two';
      words[3] = 'Three';
      words[4] = 'Four';
      words[5] = 'Five';
      words[6] = 'Six';
      words[7] = 'Seven';
      words[8] = 'Eight';
      words[9] = 'Nine';
      words[10] = 'Ten';
      words[11] = 'Eleven';
      words[12] = 'Twelve';
      words[13] = 'Thirteen';
      words[14] = 'Fourteen';
      words[15] = 'Fifteen';
      words[16] = 'Sixteen';
      words[17] = 'Seventeen';
      words[18] = 'Eighteen';
      words[19] = 'Nineteen';
      words[20] = 'Twenty';
      words[30] = 'Thirty';
      words[40] = 'Forty';
      words[50] = 'Fifty';
      words[60] = 'Sixty';
      words[70] = 'Seventy';
      words[80] = 'Eighty';
      words[90] = 'Ninety';
      amount = amount.toString();
      var atemp = amount.split(".");
      var number = atemp[0].split(",").join("");
      var n_length = number.length;
      var words_string = "";
      if (n_length <= 9) {
          var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
          var received_n_array = new Array();
          for (var i = 0; i < n_length; i++) {
              received_n_array[i] = number.substr(i, 1);
          }
          for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
              n_array[i] = received_n_array[j];
          }
          for (var i = 0, j = 1; i < 9; i++, j++) {
              if (i == 0 || i == 2 || i == 4 || i == 7) {
                  if (n_array[i] == 1) {
                      n_array[j] = 10 + parseInt(n_array[j]);
                      n_array[i] = 0;
                  }
              }
          }
          value = "";
          for (var i = 0; i < 9; i++) {
              if (i == 0 || i == 2 || i == 4 || i == 7) {
                  value = n_array[i] * 10;
              } else {
                  value = n_array[i];
              }
              if (value != 0) {
                  words_string += words[value] + " ";
              }
              if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                  words_string += "Crores ";
              }
              if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                  words_string += "Lakhs ";
              }
              if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                  words_string += "Thousand ";
              }
              if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                  words_string += "Hundred and ";
              } else if (i == 6 && value != 0) {
                  words_string += "Hundred ";
              }
          }
          words_string = words_string.split("  ").join(" ");
      }
      if(amount > 200000){
      $("#mySelectTransfer").val('RTGS');
        var transferAmount = document.getElementById('amount').value;
        console.log("Amount :" + transferAmount);
      }

      return words_string;
    }
  </script>

   <script type="text/javascript">
        function addvirtualAccount() {
          var data = new FormData($('#formDataVirtualAccount')[0]);
          var virtualref =$('#virtualref').val();
          if(virtualref == "") {
            $("#virtualref").focus();
            swal("Please Fill Reference Number");
            return false;
          }
          document.getElementById('global-loader').style.display = 'block';
          $.ajax({
            type:"POST",
            dataType: 'text',
            url: "<?php echo base_url();?>b2b/addvirtualAccount",
            data: {
              virtualref: virtualref,
              <?php echo $this->security->get_csrf_token_name(); ?> : '<?php echo $this->security->get_csrf_hash(); ?>'
            }, 
            success: function(data)
             {
              //alert(data);
              console.log(data);
              document.getElementById('global-loader').style.display = 'none';
               if(data == '1'){
                swal("Success", "Virtual Account Added Successful", "success");
                window.location.href = "<?php echo site_url();?>b2b";
              }else if(data == '0'){
                swal("Error", "Virtual Account Not Added Successful", "error");
                window.location.href = "<?php echo site_url();?>b2b";
              }else {
                 swal(data);
              }
             }
          });
          
          return false;
        }
      </script>

      <script type="text/javascript">
        $(function () {
        $("#acc-number").keypress(function (e) {
            var keyCode = e.keyCode || e.which;
 
            $("#acc-numberErr").html("");
 
            //Regex for Valid Characters i.e. Alphabets and Numbers.
            var regex = /^[A-Za-z0-9]+$/;
 
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#acc-numberErr").html("Only Alphabets and Numbers allowed.");
            }
 
            return isValid;
        });
    });
      </script>

</body>


<!-- Mirrored from spruko.com/demo/django/dashtic/DASHTIC/HTML-LTR/Sidemenu-Icon-Light/index5.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Nov 2021 15:53:18 GMT -->
</html>
