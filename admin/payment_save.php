<?php
// Establish a connection to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservation";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query=mysqli_query($conn,"select * from reservation left join team on reservation.team_id=team.team_id")or die(mysqli_error($con));

while ($row=mysqli_fetch_array($query)){
  






// Get the payment ID from the form data
$payment_id = $row['rid'];




}


// Delete the payment record from the 'reservation' table
$sql = "DELETE FROM reservation WHERE rid = '$payment_id'";
if ($conn->query($sql) === TRUE) {
    echo "Payment record deleted successfully";
} else {
    echo "Error deleting payment record: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

















<?php 
// session_start();
// if(empty($_SESSION['id'])):
// header('Location:index.php');
// endif;
?>

<?php 
// include('../includes/dbcon.php');
	
// 	$id = $_POST['id'];
// 	$amount = $_POST['amount'];
// 	$status = $_POST['status'];
	
// 	$date=date("Y-m-d");
// 	if ($amount<>0)
// 	{
// 		mysqli_query($con,"INSERT INTO payment(amount,rid,payment_date) 
// 			VALUES('$amount','$id','$date')")or die(mysqli_error());  
// 	}
		

// 		mysqli_query($con,"UPDATE reservation SET balance=balance-'$amount',r_status='$status' where rid='$id'")or die(mysqli_error($con)); 




//     $query = mysqli_query($con, "SELECT * FROM reservation natural join combo WHERE rid='$id'");
//     if (!$query) {
//       echo 'datafound';
//       die(mysqli_error($con)); // handle the error
//     }
//     $row = mysqli_fetch_array($query);
//     if (!$row) {
//       // handle the case where no records were found
//       echo 'no data found';
//     }
    





// $query = mysqli_query($con, "SELECT * FROM reservation natural join combo WHERE rid='$id'");
//       $row=mysqli_fetch_array($query);
//         $rcode=$row['r_code'];
//         $first=$row['r_first'];
//         $last=$row['r_last'];
//         $contact=$row['r_contact'];
//         $address=$row['r_address'];
//         $date=$row['r_date'];
//         $venue=$row['r_venue'];
//         $balance=$row['balance'];
//         $payable=number_format($row['payable'],2);
//         $ocassion=$row['r_ocassion'];
//         $status=$row['r_status'];
//         $email=$row['r_email'];
//         $motif=$row['r_motif'];
//         $time=$row['r_time'];
//         $time=$row['r_time'];
//         $type=$row['r_type'];
//         $cid=$row['combo_id'];
//         $combo=$row['combo_name'];

        // if ($status=='Approved'){
        // 	$msg="Please pay your remaining balance $balance, before the event. Thank you!";
        // }
        // if ($status=='Cancelled'){
        // 	$msg=" Sorry!";
        // }


	// ini_set( 'display_errors', 1 );
    
  //   error_reporting( E_ALL );
    
  //   $from = "gbfoods.com";
    
  //   $to = "$email";
    
  //   $subject = "Reservation Status";
    
  //   $message = "Dear $first $last,

  //   Your reservation is $status. $msg


  //   Thanks,

  //   GB Foods
    	
  //   ";
    
  //   $headers = "From:" . $from;
    
  //   mail($to,$subject,$message, $headers);
    	
	// 		echo "<script type='text/javascript'>alert('Successfully added new payment!');</script>";
	// 		echo "<script>document.location='pending.php'</script>";   
	
	
?>