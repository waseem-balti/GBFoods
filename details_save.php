<?php include 'header.php';?>
<?php include 'headernew.php';?>

<?php 
if(empty($_SESSION['id'])):
header('Location:indexnew.php');
endif;
?>

<?php 
include('includes/dbcon.php');
	
	$id = $_SESSION['id'];
	$venue = $_POST['venue'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$motif = $_POST['motif'];
	$pax = $_POST['pax'];
	$type = $_POST['type'];
	$ocassion = $_POST['ocassion'];
	$date=date("Y-m-d",strtotime($date));

	$query = mysqli_query($con, "SELECT * FROM `reservation` WHERE r_date='".$date."' AND r_status = 'Approved'");
			if(mysqli_num_rows($query) > 0)
			{
                   echo "<script>alert ('Date is already reserved');
					document.location='details.php'; </script>";
			}
			else{
    // do something
			{
		mysqli_query($con,"UPDATE reservation SET payable='$payable',balance='$payable',r_venue='$venue',r_date='$date',r_time='$time',r_motif='$motif'
		,r_ocassion='$ocassion',r_type='$type',pax='$pax',price='$price' where rid='$id'")or die(mysqli_error($con)); 

			$_SESSION['id']=$id;

			
			echo "<script>document.location='save_reservation.php'</script>";   
	}}
	
?>