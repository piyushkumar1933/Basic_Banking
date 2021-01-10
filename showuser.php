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
                  <input type="text" name="search" placeholder="Search for Customers" class="form-control" >
                  <select  id = "se"name="se" value = "se" class="form-control">
                    <option value="AccountNo" >Account No</option>
                    <option value="Name">  Name</option>
                    <option value="Email"> Email</option>
                    <option value="Mobile"> Mobile</option>
                  </select>
                  <input type="submit" class="btn btn-primary" value="Search" name="submit"></i>
        </form>
  </div>
  <?php
    if(isset($_POST['submit'])){
      $val = $_POST['se'];
      $searchq = $_POST['search'];
      $qu = "SELECT * FROM user WHERE  $val LIKE '%$searchq%'";
      $stmt = $pdo->query($qu);
      echo ("<h4>Search result for : '".$searchq."' in '".$val."' </h4>");
      echo('<table class="table table-striped">
      <thead>
          <tr>
              <th scope="col">Account No</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Mobile</th>
              <th scope="col">DOB</th>
              <th scope="col">Address</th>
              <th scope="col">CurrentBalance</th>
              

              <th scope="col">Action</th>
          </tr>
      </thead><tbody>');
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
echo('<tr>
      <th scope="row">');
echo(htmlentities($row['AccountNo']));
echo('</th><td>');
echo(htmlentities($row['Name']));
echo('</td><td>');
echo(htmlentities($row['Email']));
echo('</td><td>');
echo(htmlentities($row['Mobile']));
echo('</td><td>');
echo(htmlentities($row['DOB']));
echo('</td><td>');
echo(htmlentities($row['Address']));
echo('</td><td>');
echo(htmlentities($row['CurrentBalance']));
echo('</td><td>');
echo('<a class="btn btn-success" href="view_profile.php?AccountNo='.$row['AccountNo'].'"role="button">View Profile</a>');
echo('</td></tr>');
}
echo('</tbody><table>'); 
    }
  $sql = "SELECT * FROM user";
    $stmt = $pdo->query($sql);
        echo('<table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Account No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Address</th>
                        <th scope="col">CurrentBalance</th>
                        

                        <th scope="col">Action</th>
                    </tr>
                </thead><tbody>');
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo('<tr>
                <th scope="row">');
        echo(htmlentities($row['AccountNo']));
        echo('</th><td>');
        echo(htmlentities($row['Name']));
        echo('</td><td>');
        echo(htmlentities($row['Email']));
        echo('</td><td>');
        echo(htmlentities($row['Mobile']));
        echo('</td><td>');
        echo(htmlentities($row['DOB']));
        echo('</td><td>');
        echo(htmlentities($row['Address']));
        echo('</td><td>');
        echo(htmlentities($row['CurrentBalance']));
        echo('</td><td>');
        echo('<a class="btn btn-success" href="view_profile.php?AccountNo='.$row['AccountNo'].'"role="button">View Profile</a>');
        echo('</td><td>');
        echo('</td></tr>');
    }
    echo('</tbody><table>'); 

  ?>
	<?php require_once "tail.php" ?>
</body>
</html>