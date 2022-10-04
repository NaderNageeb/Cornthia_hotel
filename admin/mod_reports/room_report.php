 
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
        Status
        <address>
          <div class="form-group">
            <select name="categ" class="form-control">
                <option value="2" <?php echo isset($_POST['categ']) && $_POST['categ'] == 'Checkedin' ? 'selected' :'' ?>>Checkedin</option>
      <option value="3" <?php echo isset($_POST['categ']) && $_POST['categ'] == 'Checkedout' ? 'selected' :'' ?>>Checkedout</option>
      <option value="0" <?php echo isset($_POST['categ']) && $_POST['categ'] == 'Arrival' ? 'selected' :'' ?>>Pending</option>
      <option value="1" <?php echo isset($_POST['categ']) && $_POST['categ'] == 'Pending' ? 'selected' :'' ?>>Confirmed</option>
      <option value="4" <?php echo isset($_POST['categ']) && $_POST['categ'] == 'Confirmed' ? 'selected' :'' ?>>Cancelled</option>
            </select>
        </div>
        </address>
      </div>

      <div class="col-md-8">
              <select class="form-control input-sm" name="ACCOMID" id="ACCOMID"> 
                    <option value="None">None</option>
                    <?php
                    $rm = new Accomodation();
                    $cur= $rm->listOfaccomodation();
                    foreach ($cur  as $accom) {
                      echo '<option value='.$accom->ACCOMID.'>'.$accom->ACCOMODATION.' (' . $accom->ACCOMDESC.')</OPTION>';
                    }

                    ?>
                  </select> 
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
            <th>Guest</th>
            <th>Room</th>
            <th>Price</th>
            <th>Arrival</th>
            <th>Departure</th>
            <th>Night(s)</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
           <?php
  if(isset($_POST['submit'])){ 


$sql ="SELECT * 
       FROM  `tblaccomodation` A,  `tblroom` RM,  `tblreservation` RS,  `tblguest` G
       WHERE A.`ACCOMID` = RM.`ACCOMID` 
       AND RM.`ROOMID` = RS.`ROOMID` 
   AND RS.`GUESTID` = G.`GUESTID`  
   
   AND DATE(`ARRIVAL`) >=  '".$_POST['start']."'
       AND DATE(`DEPARTURE`) <=  '".$_POST['end']."' AND RS.STATUS='" .$_POST['categ']."'
   AND CONCAT( `ACCOMODATION`, ' ', `ROOM` , ' ' , `ROOMDESC`) LIKE '%" .$_POST['txtsearch'] ."%'";
  

$mydb->setQuery($sql);
  $res = $mydb->executeQuery();
  $row_count = $mydb->num_rows($res);
  $cur = $mydb->loadResultList();


      if ($row_count >0){
                foreach ($cur as $result) {
              $days =  dateDiff(date($result->ARRIVAL),date($result->DEPARTURE));
                 ?>
                <tr> 
                  <td><?php echo $result->G_FNAME . ' ' .  $result->G_LNAME;?></td>
                  <td><?php echo $result->ACCOMODATION . ' [' .$result->ROOM.']' ;?></td>
                  <td> &euro; <?php echo $result->PRICE;?></td>
                  <td><?php echo date_format(date_create($result->ARRIVAL),'m/d/Y');?></td>
                  <td><?php echo date_format(date_create($result->DEPARTURE),'m/d/Y');?></td>
                  <td><?php echo ($days==0) ? '1' : $days;?></td>
                  <td> &euro; <?php echo $result->RPRICE;?></td>
                </tr>
                <?php 
                  @$tot += $result->RPRICE;
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