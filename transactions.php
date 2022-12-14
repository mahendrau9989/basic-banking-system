<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
  <h2>Transactions</h2>           
  <table id="tab" class="table table-striped">
    <thead>
      <tr>
        <th id='al'>Serial no</th>
        <th id='al'>Transferred from</th>
        <th id='al'>Transferred to(customer ID)</th>
        <th id='al'>Debit</th>
        <th id='al'>Credit</th>
        <th id='al'>Balance</th>
      </tr>
    </thead>
    <tbody>
    <?php 
        $conn=new mysqli("sql306.epizy.com","epiz_33125027","8ebnPRtOVSK","epiz_33125027_bank");
        $sql="select * from transactions;";

        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td id='al'>$row[sno]</td>";
        echo "<td id='al'>$row[t_from]</td>";
        echo "<td id='al'>$row[t_to]</td>";
        echo "<td id='al'>$row[debit]</td>";
        echo "<td id='al' style='color:#006400; font-weight:bold;'>(+) ₹ $row[credit]</td>";
        echo "<td id='al'>₹ $row[amount]</td>";
        echo "</tr>";
        }
        $conn->close();

        ?>
      
    </tbody>
  </table>
</div>
</body>
</html>