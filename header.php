<?php
 	if(isset($_SESSION['username'])){
		include('DBConnect.php');
		$sql = "SELECT DISTINCT path FROM image WHERE name = 'Default'";
		$result = mysqli_query($con,$sql);
		if(!$result){
			echo "Error : ".mysqli_error($con);
		}
		$row = mysqli_fetch_array($result);
		$count = mysqli_num_rows($result);
		
		
?>
    <!--<div class="row text-center">
		<div class="col-sm-2">
			<img class="logop" src="images/logo.jpg" width="150"/><br /><br />
			<b style="color:#FFFFFF">Welcome : <?php #echo $_SESSION['username'];?></b>
		</div>
	    <div id="headerName" class="col-sm-8" href="#" data-toggle="tooltip" title="Go to PBAS HomePage"><a href="Home.php"><h1 style="color:#0066FF;">Performance Based Appraisal System </h1></a></div>
	    <div class="col-sm-2 text-right"><?php #echo "<img class ='propic' src='images/".$row['path']."' width='113' height='150'/>"; ?>  
		    <a class="dropdown-toggle btn btn-primary btn-sm" href="#" data-toggle="dropdown">Setting Options<b class="caret"></b></a>
			<ul class="dropdown-menu text-center">
                <li><a href="#">Change Passoward</a></li>
                <li><a href="#">Delete Account</a></li>
				<li role="presentation" class="divider"></li>
                <li><a href="logout.php">LogOut</a></li>
              </ul>
        </div>
	</div> -->
	
	<div class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="Home.php"><span class="icon-home"></span> Performance Based Appraisal System</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
			  <li><a class="icon-user" href="#">  <?php echo $_SESSION['username'];?></a></li>
              <li class="dropdown active">
                <a href="#" class="dropdown-toggle icon-wrench" data-toggle="dropdown"> Setting <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a class="icon-cog" href="#">  Change Passoward</a></li>
				  <li><a class="icon-cog" data-toggle="modal" href="#yearModal">  Change Year</a></li>
                  <li><a class="icon-trash" href="#">  Delete Account</a></li>
                  <li class="divider"></li>
                  <li><a  class="icon-signout" href="logout.php"> LogOut</a></li>
                </ul>
              </li>
            </ul>
            
          </div><!--/.nav-collapse -->
        </div>
      </div>

<?php
	}
	else{
		header('location:index.php');
	}
?>
