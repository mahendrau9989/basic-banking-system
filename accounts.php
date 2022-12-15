<!DOCTYPE html>
<html lang="en">
<head>
  <title>Accounts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    a{
        color:#F999B7;
      }
      a:hover{
        font-size:17px;
        background-color:#F0E9D2;
        color:#9145B6;
      }
      .i1{
        margin-top:15px;
      }
      #a1{
        background-color:orange;
        border:3px solid black;
        font-size:18px;
      }
      #al{
          text-align:center;
      }
      @media (max-width: 600px) {
        #tab {
    font-size:10px;
  }
}
  </style>
</head>
<body>
<header>
      <div>
          <div class="container-fluid" style="background-color:#B762C1">
            <ul class="nav justify-content-center">
              <li class="nav-item"><a style="color:black;font-weight:bolder" class="nav-link active" href="homepage.html">Home</a></li>
              <li class="nav-item"><a style="color:black;font-weight:bolder" class="nav-link active" href="accounts.php">Accounts</a></li>
              <li class="nav-item"><a style="color:black;font-weight:bolder" class="nav-link active" href="moneytransfer.php">Transfer</a></li>
              <li class="nav-item"><a style="color:black;font-weight:bolder" class="nav-link active" href="transactions.php">Transactions</a></li>
            </ul>
          </div>
      </div>
    </header>
<div class="container-fluid">
  <h2>List of Accounts</h2>           
  <table id="tab" class="table table-striped">
    <thead>
      <tr>
        <th id='al'>Customer_ID</th>
        <th id='al'>Name</th>
        <th id='al'>Email</th>
        <th id='al'>Amount</th>
      </tr>
    </thead>
    <tbody>
    <?php 
        $conn=new mysqli("","","","");
        $sql="select * from account;";

        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()){//Array or records stored in $row
        echo "<tr>";
        echo "<td id='al'>$row[customer_id]</td>";
        echo "<td id='al'>$row[name]</td>";
        echo "<td id='al'>$row[email]</td>";
        echo "<td id='al'>₹ $row[current_balance]</td>";
        echo "</tr>";
        }
        $conn->close();

        ?>
      
    </tbody>
  </table>
</div>

</body>
</html>




