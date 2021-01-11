<?php 
  require_once "pdo.php";
  require_once "util.php";
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Basic Bank</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<?php require_once "head.php"; ?>
</head>
<body>
    <style>
   h3 {
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
    </style>

<body>
 <nav style="background-color:black;">
        <div class= "row">
            <ul class="main-nav">
                <li class="nam">Basic Banking System</li>
                <li><a href="index.php">Home</a></li>
                <li><a href="showuser.php">View Customers</a></li>
                <li><a href="transfer.php">Transfer Money</a></li>
                <li><a href="recent.php">Recent Transactions</a></li>
              </ul>
              </div>
      </nav>
<?php

if(isset($_SESSION["Ac"])){
    $val = $_SESSION["Ac"];
    session_unset();
    $sql = "SELECT * FROM transfer Where fan = '$val' ORDER BY Date DESC";
  
    $stmt = $pdo->query($sql);
      echo('<h3> Debited</h3>');
        echo('<table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Transaction Id</th>
                        <th scope="col"> Name</th>
                        <th scope="col"> Account Number</th>
                        <th scope="col">Amout Transferd</th>
                        <th scope="col">Time</th>
                    </tr>
                </thead><tbody>');
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo('<tr>
                <th scope="row">');
        echo(htmlentities($row['TransId']));
        echo('</th><td>');
        echo(htmlentities($row['lname']));
        echo('</td><td>');
        echo(htmlentities($row['lan']));
        echo('</td><td>');
        echo(htmlentities($row['amount']));
        echo('</td><td>');
        echo(htmlentities($row['Date']));
        echo('</td><td>');
        echo('</td></tr>');
    }
    echo('</tbody><table>'); 
    $sql = "SELECT * FROM transfer Where lan = '$val' ORDER BY Date DESC";
  
    $stmt = $pdo->query($sql);
    echo('<h3>Credited</h3>');
    echo('<table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Transaction Id</th>
                    <th scope="col"> Name</th>
                    <th scope="col"> Account Number</th>
                    <th scope="col">Amout Transferd</th>
                    <th scope="col">Time</th>
                </tr>
            </thead><tbody>');
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo('<tr>
            <th scope="row">');
    echo(htmlentities($row['TransId']));
    echo('</th><td>');
    echo(htmlentities($row['fname']));
    echo('</td><td>');
    echo(htmlentities($row['fan']));
    echo('</td><td>');
    echo(htmlentities($row['amount']));
    echo('</td><td>');
    echo(htmlentities($row['Date']));
    echo('</td><td>');
    echo('</td></tr>');
}
echo('</tbody><table>'); 
}
else{
    echo '<script>alert("Access Denaied");
          window.location.replace("index.php");
        </script>';
      return;
}

  ?>
	<?php require_once "tail.php" ?>
</body>
</html>