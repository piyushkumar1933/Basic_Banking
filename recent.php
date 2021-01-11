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
      <div class="jumbotron">
        <form method="post" class="form-inline d-flex justify-content-center md-form form-sm mt-0">
                  <input type="text" name="search" placeholder="Search" class="form-control" >
                  <select  id = "se"name="se" value = "se" class="form-control">
                    <option value="TransId" >Transaction Id</option>
                    <option value="fname"> Sender  Name</option>
                    <option value="fan"> Sender Account Number</option>
                    <option value="lname"> Reciver Name</option>
                    <option value="lan"> Reciver Account Number</option>
                  </select>
                  <input type="submit" class="btn btn-primary" value="Search" name="submit"></i>
        </form>
  </div>
<?php
 if(isset($_POST['submit'])){
  $vall = $_POST['se'];
  $searchq = $_POST['search'];
  $qu = "SELECT * FROM transfer WHERE  $vall LIKE '%$searchq%'";
  $stmt = $pdo->query($qu);
  echo ("<h4>Search result for : '".$searchq."' </h4>");
  echo('<table class="table table-striped">
  <thead>
      <tr>
          <th scope="col">Transaction Id</th>
          <th scope="col">Sender Name</th>
          <th scope="col">Sender Account Number</th>
          <th scope="col">Reciver Name</th>
          <th scope="col">Reciver Account Number</th>
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
echo(htmlentities($row['lname']));
echo('</td><td>');
echo(htmlentities($row['lan']));
echo('</td><td>');
echo(htmlentities($row['amount']));
echo('</td><td>');
echo(htmlentities($row['Date']));
echo('</td></tr>');
}
echo('</tbody><table>'); 
}
    $sql = "SELECT * FROM transfer ORDER BY Date DESC";
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
        echo(htmlentities($row['lname']));
        echo('</td><td>');
        echo(htmlentities($row['lan']));
        echo('</td><td>');
        echo(htmlentities($row['amount']));
        echo('</td><td>');
        echo(htmlentities($row['Date']));
        echo('</td></tr>');
    }
    echo('</tbody><table>'); 

  ?>
	<?php require_once "tail.php" ?>
</body>
</html>