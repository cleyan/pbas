<?php
	if(isset($_SESSION['username'])){
?>
	<!-- Modal Window For Getting PBAS Year -->
		<div class="modal fade" id="yearModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
			 <div class="modal-dialog">
				 <div class="modal-content">
					 <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title"><center><img src="images/logo_new.png" width="200px"></center></h4>
					</div>
					<div class="modal-body">
						<div class="modal-header text-center">
							<b>Manage Your PBAS Account</b>
						</div><br><br>
						<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="form-inline text-center" method="post">
							<label>Enter The Year &nbsp</label>
							<input type="text" class="form-control inputSmall" name="pbasYear" title="Please Enter the Year" placeholder="Ex. 2010, 2013."/><br><br><br>
							
							<div class="modal-footer">
							<button type="submit" name="yearButton" class="btn btn-md btn-primary">Submit</button>
							</div>
						</form>
					</div>
					
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
<?php
	}
	else{
		header('location: index.php');
	}
?>