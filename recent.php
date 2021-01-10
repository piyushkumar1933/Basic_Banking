<?php 
  require_once "pdo.php";
  require_once "util.php";
    
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
    /* //#e67e22; */
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
    $sql = "SELECT * FROM transfer";
    $stmt = $pdo->query($sql);
        echo('<table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Transaction Id</th>
                        <th scope="col">Sender Name</th>
                        <th scope="col">Sender Account Number</th>
                        <th scope="col">Reciver Name</th>
                        <th scope="col">Reciver Account Number</th>
                        <th scope="col">Amout Transferd</th>
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
        echo(htmlentities($row['lname']));
        echo('</td><td>');
        echo(htmlentities($row['lan']));
        echo('</td><td>');
        echo(htmlentities($row['amount']));
        echo('</td><td>');
        echo('</td></tr>');
    }
    echo('</tbody><table>'); 

  ?>
	<?php require_once "tail.php" ?>
</body>
</html>