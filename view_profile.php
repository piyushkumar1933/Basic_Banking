 <?php 
  require_once "pdo.php";
  require_once "util.php";
  session_start();
?>
<!DOCTYPE html>
 <html>
 <head>
 	<title>Viewing Profile</title>
   <?php require_once "head.php"; ?>
   <link rel="stylesheet" type="text/css" href="css/styles.css">
 </head>
 <style>
   h1 {
  color: #ff5600;
  font-family: Lora,Oxygen, -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
  font-size: 1.5em;
  font-weight: bold;
  text-shadow: 1px 1px 1px #222;
  margin-top: 0;
  margin-bottom: 0.9;
  text-align:center;
  /*line-height: .75;*/
}
.view p{
  text-align:center;
  font-size:1.2em;
  
}
.trans {
  text-align:center;
}
   </style>
 <body>
 <nav style="background-color:black;">
        <div class= "row">
            <ul class="main-nav">
                <li class="nam">Basic Banking System</li>
                <li><a href="index.php">Home</a></li>
                <li><a href="showuser.php">View Customers</a></li>
                <li><a href="#">Transfer Money</a></li>
                <li><a href="#">Recent Transactions</a></li>
              </ul>
              </div>
      </nav>
 <div class="container view">
 <h1>Profile Information</h1>
<?php 
$arr = array();
$stmt = $pdo->prepare("SELECT * FROM user  where AccountNo = :xyz");
$stmt->execute(array(":xyz" => $_GET['AccountNo']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
 echo '<p>Name: '.$row['Name'];
 echo '</p><p>AccountNo: '.$row['AccountNo'];
 echo '</p><p>Email: '.$row['Email'];
 echo '</p><p>Mobile: '.$row['Mobile'];
 echo '</p><p>Date of Birth:  '.$row['DOB'];
 echo '</p><p>Address: '.$row['Address'];
 echo '</p><p> Current Balance:'.$row['CurrentBalance'];
 echo "</p>";
 $_SESSION["id"] = $row['AccountNo'];
?>
</div>
<div class ="trans">
<a class="btn btn-primary" href="transfer.php"role="button">Transfer Money</a>
<a class="btn btn-primary" href="transfer.php"role="button">Your Recent Transactions</a>
</div>

</div>
</body>