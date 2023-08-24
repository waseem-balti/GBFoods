<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">
	<div class="conjtainer">
      <!-- Menu button for smallar screens -->
      <div class="navbar-header">
		  <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
			
		  </button>
		  <!-- Site name for smallar screens -->
		  
		</div>
		<!-- Navigation starts -->
      <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">  
	  <ul class="nav navbar-nav">  
          <!-- Upload to server link. Class "dropdown-big" creates big dropdown 
      

          <!-- Upload to server link. Class "dropdown-big" creates big dropdown -->
          <li class="dropdown dropdown-big">
            <a href="#"><span class = "label label-info"><i class="fa fa-calendar"></i></span> <?php echo date("F d, Y");?></a>            
          </li>
          <!-- Sync to server link -->
         

        </ul>

        <!-- Search form -->
       
        <!-- Links -->
		
		<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['id']; ?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
            <li><a href="settings.php"><i class="fa fa-cog"></i> Settings</a></li>
            <li><a href="../logoutnew.php"><i class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
    </li>
</ul>

      </nav> 

    </div>
	</div>
	
	
	