<div class="content-wrapper" style="min-height: 496px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?=$pageName?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('/Admin/Dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active"><?=$pageName?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    
    <section class="content">
        <div class="container-fluid">
            <div class="card card-widget widget-user ">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header  admin-custom-color-g admin-table-header">
                    
                    <!--    <h3 class="widget-user-username">Alexander Pierce</h3>
                        <h5 class="widget-user-desc">Founder &amp; CEO</h5>-->
                </div>
                <div class="widget-user-image admin-custom-table-pos" >
                    <div class="row">
                        <div class="col-md-2">
                            
                        </div>
                        <div class="col-md-8">
                            <div class="card custom-card">
                                <table class=" table-bordered   table custom-table m-0" cellspacing="0" id="example2" >
                                <thead class="custom-table-thead">
                                    <tr class="custom-table-tr">
                                        <th>Order ID</th>
                                        <th>Order Date</th>
                                        <th>CustomerName</th>
                                        <th>Address</th>
                                        
                                        <th>Total Amount</th>
                                        <th>Action</th>
                                            
                                    </tr>
                                </thead>
                                <tbody class="custom-table-tbody">
                                <?php
                                /*echo "<pre>";
                                print_r($OrderData);
                                die();*/
                                for($i=0;$i<count($OrderData);$i++)
                                {   ?>
                                        <tr class="custom-table-tr">
                                            <td><?=$OrderData[$i]["OrderId"]?></td>
                                            <td><?=$OrderData[$i]["OrderDate"]?></td>
                                            <td><?=$OrderData[$i]["ConsignorName"]?></td>
                                            <td><?=$OrderData[$i]["AddressAppartmentName"]?></td>
                                            <td><?=$OrderData[$i]["OrderTotal"]?></td>
                                            <td class="custom-table-td">
                                                <a id="<?=$OrderData[$i]["OrderId"]?>" class="updatedata" data-toggle="modal" data-target="#insert-modal" ><i class="fa fa-edit admin-custom-color-opp" ></i></a>
                                                <a id="<?=$OrderData[$i]["OrderId"]?>" class="deletedata"><i class="fa fa-trash admin-custom-color-opp" ></i></a>
                                                <a href="<?=site_url('Admin/BillPrintDifferent/'.$OrderData[$i]["OrderId"])?>" ><i class="fa fa-print admin-custom-color-opp" ></i></a>
                                               <!-- <a href="<//?=site_url('Admin/OrderPrintDifferent/'.$OrderData[$i]["OrderId"])?>" ><i class="fa fa-file admin-custom-color-opp" ></i></a>
                                                <!--<a id="<?//=$mainData[$i]["CustomerId"]?>" class="smsdata" data-toggle="modal" data-target="#sms-modal" ><i class="fa fa-envelope admin-custom-color-opp" ></i></a>-->
                                            </td>
                                        </tr> 
                                   <?php 
                                }
                                ?>
                        
                            </tbody>
                            </table>
                            </div>    
                        </div>
                        <div class="col-md-2">
                            
                        </div>
                    </div>
                </div>
            </div>
              
        </div>
    </section>
    <!-- /.modal -->

        <div class="modal fade" id="insert-modal">
            <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header admin-custom-color-g">
              <h4 class="modal-title">Add <?=$pageName?></h4>
              <button type="button" class="close " data-dismiss="modal"  style="color:white;" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form   id="AddUpdateForm" name="AddUpdateForm" enctype="multipart/form-data">
                  <div class="card-body">  
                        <div class="row ">
                                 
                                <?php 
                                $filterField=remove_CDT($OriginalFields);
                                    //  $filterField=remove_last_field($filterField,4);
                                    //update code after removing 2 column from last
                                     $filterField=remove_last_field($filterField,2);
                                       //  check_p($filterField);
                                
                                 ?>
                                 <input type="hidden" name='<?=$filterField[0]?>'  id='<?=$filterField[0]?>'  >
                               
                                 <?php
                                        $tblkey=ucfirst($page);
                                         $filterField=remove_first_field($filterField);
                                        foreach($filterField as $data)
                                        {   ?>
                                                <?= get_input_field($data,$tblkey,'6')?>
                                <?php   }  
                                if(checK_table_present('tbl'.$page.'detail'))
                                {
                                ?>
                                
                                <div class='col-md-12'>
                                    <input type="button" id='add' class=' btn btn-primary col-md-12 ' value="Add" >
                                </div>
                                <div style="overflow-x:auto;">
                                    <table id="DetailView" >
                                    </table>
                                    <table id="UpdateDetailView" >
                                     </table>
                                </div>
                                
                                <?php
                                        }
                                    /* get_detail_view($page);*/
                                    ?>
                                <?php     
                                    if(checK_table_present('tbl'.$page.'detail2'))
                                    {?>
                                      <div class='col-md-12'>
                                    <input type="button" id='add2' class=' btn btn-primary col-md-12 ' value="Add Details" >
                                </div>
                                <div style="overflow-x:auto;">
                                    <table id="DetailView2" >
                                    </table>
                                    <table id="UpdateDetailView2" >
                                     </table>
                                </div>  
                                <?php }
                                ?>
                    
                        <div class="modal-footer ">
                                <button type="submit" name="btnSubmit" id="btnSubmit" class="btn admin-custom-color">Submit</button>
                           
                        </div>
                     </div> 
                </form>
              </div>
                </form>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        
        <!-- /.modal-dialog -->
      </div>
      
      <div class="modal fade" id="sms-modal">
            <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header admin-custom-color-g">
              <h4 class="modal-title">Send SMS</h4>
              <button type="button" class="close " data-dismiss="modal"  style="color:white;" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form    enctype="multipart/form-data">
                    <div class="card-body">  
                        <div class="row ">
                            <div class='col-md-12'>
                            </div>
                            <div style="overflow-x:auto;">
                            </div>
                            <div class="modal-footer ">
                                <button type="submit" name="btnSubmit" id="btnSubmit" class="btn admin-custom-color">Submit</button>
                           </div>
                        </div>
                    </div>
                </form>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
</div>