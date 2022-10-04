 
<div class="wrapper">
  
 
  <form action="" method="POST" >
  <!-- Main content -->
  <section class="invoice">
      <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> Rooms Report
          <!-- <small class="pull-right">Date: <?php //echo date('m/d/Y'); ?></small> -->
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
    <div class="col-sm-2 invoice-col">
      
    </div>
      <div class="col-sm-2 invoice-col">
        Room
        <address>
          <input class="form-control" size="20" type="text" value="<?php echo isset($_POST['txtsearch']) ? $_POST['txtsearch'] :'' ?>" Placeholder="Search For...." name="txtsearch" id="txtsearch">
      </address>    
    
      </div>
      <div class="col-sm-2 invoice-col">
      Accomodation
        <address>
          <div class="form-group">
          <select class="form-control input-sm" name="ACCOMID" id="ACCOMID"> 
                    <option value="">Select</option>
                    <?php
                    $rm = new Accomodation();
                    $cur= $rm->listOfaccomodation();
                    foreach ($cur  as $accom) {
                      echo '<option value='.$accom->ACCOMID.'>'.$accom->ACCOMODATION.' (' . $accom->ACCOMDESC.')</OPTION>';
                    }

                    ?>
                  </select> 
        </div>
        </address>
      </div>

      <div class="col-sm-2 invoice-col">
       Room Status
        <address>
          <div class="form-group">
            <select name="status" class="form-control">
              <option value=""> Select </option>
                <option value="0" >Avaliable </option>
                 <option value="1">Booked</option>

            </select>
        </div>
        </address>
      </div>




  

      <div class="col-sm-2 invoice-col"> 
      <br/>
      <address>
      <div class="form-group"> 
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
        
      </address>

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i><?php // echo (isset($_POST['categ'])) ? $_POST['categ'] : ''; ?>
          <!-- <small class="pull-right"> <?php //echo (isset($_POST['start'])) ? 'Checkedin Date :' .$_POST['start'] : ''; ?> <?php //echo (isset($_POST['end'])) ? ' Checkedout Date :' .$_POST['end'] : ''; ?> </small> -->
        </h2>
      </div>
      <!-- /.col -->
    </div>
 

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 col-md-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            
            <th>Room</th>
            <th>Price</th>
            <th>ROOM DESC</th>
            <th>Person Number</th>
            <th>Status</th>
           
          </tr>
          </thead>
          <tbody>
           <?php
  if(isset($_POST['submit'])){ 
    $status = $_POST['status'];
    $ACCOMID = $_POST['ACCOMID'];
    $txtsearch = $_POST['txtsearch'];

 if( $status == '' && $ACCOMID == '' && $txtsearch =='' )
 {
  echo "<script>
			alert('No Thing Selected '); window.location = 'index.php';
            </script>";

 }else{

if($status !='' && $ACCOMID == '' && $txtsearch == '' ){
$sql ="SELECT * 
       FROM  `tblaccomodation` A,  `tblroom` RM
       WHERE A.`ACCOMID` = RM.`ACCOMID` 
       AND RM.`room_status` = $status";
}
   elseif($status =='' && $ACCOMID != '' && $txtsearch == ''){
    $sql ="SELECT * 
       FROM  `tblaccomodation` A,  `tblroom` RM
       WHERE A.`ACCOMID` = RM.`ACCOMID` 
       AND A.`ACCOMID` = $ACCOMID";
   }elseif ($status =='' && $ACCOMID == '' && $txtsearch !='' ) {
    $sql ="SELECT * 
    FROM  `tblaccomodation` A,  `tblroom` RM
    WHERE A.`ACCOMID` = RM.`ACCOMID` 
    AND CONCAT( `ACCOMODATION`, ' ', `ROOM` , ' ' , `ROOMDESC`) LIKE '%" .$_POST['txtsearch'] ."%'";
   } elseif($status !='' && $ACCOMID != '' && $txtsearch != ''){
    $sql ="SELECT * 
       FROM  `tblaccomodation` A,  `tblroom` RM
       WHERE A.`ACCOMID` = RM.`ACCOMID` 
       AND  A.`ACCOMID` = $ACCOMID 
       AND  RM.`room_status` = $status
       CONCAT( `ACCOMODATION`, ' ', `ROOM` , ' ' , `ROOMDESC`) LIKE '%" .$_POST['txtsearch'] ."%'";
   }

$mydb->setQuery($sql);
  $res = $mydb->executeQuery();
  $row_count = $mydb->num_rows($res);
  $cur = $mydb->loadResultList();


      if ($row_count >0){
                foreach ($cur as $result) {
              // $days =  dateDiff(date($result->ARRIVAL),date($result->DEPARTURE));
                 ?>
                <tr> 
                  
                  <td><?php echo $result->ACCOMODATION . ' [' .$result->ROOM.']' ;?></td>
                  <td> &euro; <?php echo $result->PRICE;?></td>
                  <td><?php echo $result->ROOMDESC;?></td>
                  <td><?php echo $result->NUMPERSON;?></td>
                  <?php $image = $result->ROOMIMAGE; ?>
                  <!-- <td><img src="admin/mod_room/<?php //echo $image ; ?>" width="60" height="40"></td> -->
				  	<td><?php  if($result->room_status == 1)echo "Booked"; if($result->room_status == 0)echo "Avaliable";  ?> </td>
                  
                </tr>
                <?php 
                  @$tot += $result->RPRICE;
                } 
                

                }else{
                  echo "<script>
                  alert('No Data For Your Search '); window.location = 'index.php';
                        </script>";
                }
              }
            }
            
          ?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->


</form>
<form action="printreport.php" method="POST" target="_blank">
<input type="hidden" name="txtsearch" value="<?php echo (isset($_POST['txtsearch'])) ? $_POST['txtsearch'] : ''; ?>">
<input type="hidden" name="categ" value="<?php echo (isset($_POST['categ'])) ? $_POST['categ'] : ''; ?>">
  <input type="hidden" name="start" value="<?php echo (isset($_POST['start'])) ? $_POST['start'] :  date('Y-m-d'); ?>">
  <input type="hidden" name="end" value="<?php echo (isset($_POST['end'])) ? $_POST['end'] :  date('Y-m-d'); ?>">
    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-xs-12"> 
     <span class="pull-right"> <button type="submit" class="btn btn-primary"  ><i class="fa fa-print"></i> Print</button></span>  
        </div>
    </div>
  </section>
  </form>
  <!-- /.content -->
  <div class="clearfix"></div>

</div>
<!-- ./wrapper -->
