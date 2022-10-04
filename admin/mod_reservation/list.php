<?php
		 check_message();
			
		?>
<div class="container">
<!-- <div class="panel panel-primary"> -->
			<div class="panel-body">
<form  method="post" action="processreservation.php?action=delete">
	<table id="table" class="table table-striped" cellspacing="0">
<thead>
<tr>
<td width="5%">#</td>	

<td width="90"><strong>Guest</strong></td>
<!--<td width="10"><strong>Confirmation</strong></td>-->
<td width="80"><strong>Reservation Date</strong></td>
<td width="80"><strong>Room Type</strong></td>
<td width="70"><strong>Total Rooms</strong></td>
<td width="80"><strong>Total Price</strong></td>
<!-- <td width="80"><strong>Nights</strong></td> -->
<td width="80"><strong>Status</strong></td>
<td width="100"><strong>Action</strong></td>
</tr>
</thead>
<tbody>
<?php
 
//  $mydb->setQuery("SELECT  p.`GUESTID`,`G_FNAME` ,  `G_LNAME` ,  `G_ADDRESS` ,  `TRANSDATE` ,  `CONFIRMATIONCODE` ,  `PQTY` ,  `SPRICE` ,`STATUS`
// 				FROM  `tblpayment` p,  `tblguest` g
// 				WHERE p.`GUESTID` = g.`GUESTID`   
// 				ORDER BY p.`STATUS`='pending' desc ");

$mydb->setQuery(" SELECT * From  `tblaccomodation`c,`tblreservation`r ,`tblguest`q , `tblroom`o where  o.ACCOMID = c.ACCOMID   and r.ROOMID = o.ROOMID  and r.GUESTID = q.GUESTID ");
$cur = $mydb->loadResultList();
				  			 
foreach ($cur as $result) {
?>
<tr>
<td width="5%" align="center"></td>
<td><?php echo $result->G_FNAME." ".$result->G_LNAME; ?></td>
<td><?php echo $result->TRANSDATE; ?></td>  
<td><?php echo $result->ACCOMODATION	; ?></td>
<td><?php echo $result->ROOM; ?></td>
<td>&euro;<?php echo $result->RPRICE; ?></td>
<td><?php if($result->STATUS == 0)echo "Pending";
 if($result->STATUS == 1) echo "Confirmed";
  if($result->STATUS == 2) echo "Checkedin";
   if($result->STATUS == 3) echo "Checkedout"; 
   if($result->STATUS == 4) echo "Cancled"; 
            ?></td> 
 <td width="170">
	<?php 

        
		if($result->STATUS == 1){ ?>
		<!-- <a class="cls_btn" id="<?php echo $result->RESERVEID; ?>" data-toggle='modal' href="#profile" title="Click here to Change Image." ><i class="icon-edit">test</a> -->
			<a href="index.php?view=view&code=<?php echo $result->RESERVEID; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">View</a>
			<a href="controller.php?action=cancel&code=<?php echo $result->RESERVEID; ?>" class="btn btn-danger btn-xs" ><i class="icon-edit">Cancel</a>
			<a href="controller.php?action=checkin&code=<?php echo $result->RESERVEID; ?>" class="btn btn-success btn-xs" ><i class="icon-edit">Check in</a>
			<a href="controller.php?action=delete&code=<?php echo $result->RESERVEID; ?>" class="btn btn-danger btn-xs"  ><i class="icon-edit">Delete</a>
			<!-- <a href="index.php?view=edit&code=<?php //echo $result->GUESTID; ?>&id=<?php //echo $result->GUESTID; ?>" class="btn btn-primary btn-xs"  ><i class="icon-edit">Edit</a> -->
		<?php
		}elseif($result->STATUS == 2){
	?>
			<a href="index.php?view=view&code=<?php echo $result->RESERVEID; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">View</a>
			<a href="controller.php?action=checkout&code=<?php echo $result->RESERVEID; ?>" class="btn btn-danger btn-xs" ><i class="icon-edit">Check out</a>
			<a href="controller.php?action=delete&code=<?php echo $result->RESERVEID; ?>" class="btn btn-danger btn-xs"  ><i class="icon-edit">Delete</a>
			<!-- <a href="index.php?view=edit&code=<?php //echo $result->GUESTID; ?>&id=<?php //echo $result->GUESTID; ?>" class="btn btn-primary btn-xs"  ><i class="icon-edit">Edit</a> -->
	<?php
		}elseif($result->STATUS == 3){ ?>
			<a href="index.php?view=view&code=<?php echo $result->RESERVEID; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">View</a>
			<a href="controller.php?action=delete&code=<?php echo $result->RESERVEID; ?>" class="btn btn-danger btn-xs"  ><i class="icon-edit">Delete</a>
			<!-- <a href="index.php?view=edit&code=<?php //echo $result->GUESTID; ?>&id=<?php //echo $result->GUESTID; ?>" class="btn btn-primary btn-xs"  ><i class="icon-edit">Edit</a> -->
			
	<?php }elseif($result->STATUS == 4){ ?>
	
		<a href="index.php?view=view&code=<?php echo $result->RESERVEID; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">View</a>
		<a href="controller.php?action=delete&code=<?php echo $result->RESERVEID; ?>" class="btn btn-danger btn-xs"  ><i class="icon-edit">Delete</a>
		<!-- <a href="index.php?view=edit&code=<?php // echo $result->GUESTID; ?>&id=<?php //echo $result->GUESTID; ?>" class="btn btn-primary btn-xs"  ><i class="icon-edit">Edit</a> -->
	
	
	
	
	<?php
	}else{
			?>
			<a href="index.php?view=view&code=<?php echo $result->RESERVEID; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">View</a>
			<a href="controller.php?action=cancel&code=<?php echo $result->RESERVEID; ?>" class="btn btn-danger btn-xs" ><i class="icon-edit">Cancel</a>
			<a href="controller.php?action=confirm&code=<?php echo $result->RESERVEID; ?>" class="btn btn-success btn-xs"  ><i class="icon-edit">Confirm</a>
			<a href="controller.php?action=delete&code=<?php echo $result->RESERVEID; ?>" class="btn btn-danger btn-xs"  ><i class="icon-edit">Delete</a>
			<a href="index.php?view=edit&code=<?php echo $result->GUESTID; ?>&id=<?php echo $result->GUESTID; ?>" class="btn btn-primary btn-xs"  ><i class="icon-edit">Edit</a>
	<?php
		}

	?>
	
	
</td>

<?php }
?>
		<div class="modal fade" id="profile" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						

						<div class="alert alert-info">Profile:</div>
					</div>

					<form action="#"  method=
					"post">
						<div class="modal-body">
					
												
								<div id="display">
									
										<p>ID : <div id="infoid"></div></p><br/>
											Name : <div id="infoname"></div><br/>
											Email Address : <div id="Email"></div><br/>
											Gender : <div id="Gender"></div><br/>
											Birthday : <div id="bday"></div>
										</p>
										
								</div>
						</div>

						<div class="modal-footer">
							<button class="btn btn-default" data-dismiss="modal" type=
							"button">Close</button>
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

</table>

</form>
<!-- </div> -->
</div>