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
   <style>
     input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
.form{
  margin:10px;
  padding: 10px;
  text-align:center;
  font-size:16px;
}
.form label{

}
     </style>
 </head>
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
    if ( isset($_POST['cancel']) ) {
      header('Location:index.php');
      return;
  }
if(isset($_POST['sub'])){
  if(isset($_POST['fname']) && isset($_POST['lname']) && $_POST['AM']){
    $am = $_POST['AM'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $sql = "SELECT * FROM `user` WHERE AccountNo = '$fname'";
    $stmt = $pdo->query($sql);
    $count = $stmt->rowCount();
    $sql = "SELECT * FROM `user` WHERE AccountNo = '$lname'";
    $stmtt = $pdo->query($sql);
    $count2 = $stmt->rowCount();

    //echo $count;
  if($count == 0 && $count2 == 0){
    echo '<script>alert("Wrong Account Number");
    window.location.replace("transfer.php");
  </script>';
  }
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $fnamee = $row['Name'];
  $fba = $row['CurrentBalance'];
  $row = $stmtt->fetch(PDO::FETCH_ASSOC);
  $lnamee = $row['Name'];
  $lba = $row['CurrentBalance'];
  $net = $fba-$am;
  $fnew = $fba-$am;
  $lnew = $lba+$am;
  if($net<0){
    echo '<script>alert("Insufficient Balance");
              window.location.replace("index.php");
            </script>';
    return;
  }

  $sql = "INSERT INTO transfer (fname, fan, lname,lan,amount)
                    VALUES (:fn,:fa, :ln, :la,:am)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':fa' => $fname,
            ':fn' => $fnamee,
            ':la' => $lname,
            ':ln' => $lnamee,
            ':am' => $am)
        );
  $sql = " UPDATE `user` SET `CurrentBalance`='$fnew' WHERE AccountNo = '$fname'";
  $stmt = $pdo->query($sql);
  $sql = " UPDATE `user` SET `CurrentBalance`='$lnew' WHERE AccountNo = '$lname'";
  $stmt = $pdo->query($sql);
  echo '<script>alert("Transfer successfully!!!");
          window.location.replace("index.php");
        </script>';
      return;

}
else{
  echo '<script>alert("All Fields are Required");
</script>';
}
}

if(isset($_SESSION["id"])){
  $val = $_SESSION["id"];
  session_unset();

}
// ?>
<div class= "row, form">
<form method="post">
                    <div class="form-group row">
                        <label for="fname" class="col-md-2 col-form-label">Enter Your Account Number</label>
                        <div class="col-md-4">
                            <input type="number" name="fname" id="fname" class="form-control"  value="<?php echo $val;?>" placeholder = "Enter Your Account Number:">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lname" class="col-md-2 col-form-label">Enter Reciver Account Number</label>
                        <div class="col-md-4">
                            <input type="number" name="lname" id="lname" class="form-control"  placeholder = "Enter Reciver Account Number:">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="am" class="col-md-2 col-form-label">Amount To be Transferd</label>
                        <div class="col-md-4">
                            <input type="number" name="AM" id="am" class="form-control"  placeholder = "Amount To be Transferd:">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                        <button type="submit" class="btn btn-primary" name="sub">Transfer</button>
                        <button type="submit" class="btn btn-secondary" name="cancel">Cancel</button>
                    </div>
</form>
</div>