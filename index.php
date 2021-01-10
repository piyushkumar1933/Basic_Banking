<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "head.php"; ?>
    <title>Basic Bank</title>
</head>
<body>
    <header>
        <nav>
        <div class= "row">
            <ul class="main-nav">
                <li class="nam">Basic Banking System</li>
                <li><a href="showuser.php">View Customers</a></li>
                <li><a href="transfer.php">Transfer Money</a></li>
                <li><a href="recent.php">Recent Transactions</a></li>
              </ul>
              </div>
      </nav>
      
      <div class="slogan">
        <h1> Transactions are now simple and secure</h1>
        <a href="showuser.php" class="btn btnn btnn-or">View Customers</a>
        <a href="#" class="btn btnn btnn-ex">Recent Transactions</a>
      </div>
    </div>
            </div>
        </nav>

    </header>
    <div  class="row">
    <?php 
        include("tail.php"); ?>
        </div>
</body>
</html>