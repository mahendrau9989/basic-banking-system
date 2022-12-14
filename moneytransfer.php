<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Transfer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <style media="screen">
      a{
        color:#F999B7;
      }
      a:hover{
        font-size:18px;
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
      footer{
        background-color:#4C3F91;
        color:white;
      }
      #a2{
        font-size: 18px;
        font-weight: bolder;
        padding:10px 10px 10px 0;
      }
      #footer {
        position: fixed;
        padding: 10px 10px 0px 10px;
        bottom: 0;
        width: 100%;
        /* Height of the footer*/
        height: 80px;
        background: grey;
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
    <div class="container" align=center style="margin-top:10px">
    <form method = "post" action = "<?php $_PHP_SELF ?>">
    
      <table>
        <tr>
          <td id="a2"><label for="">Select Payee</label></td>
          <td>
            <?php 
                $conn=new mysqli("sql306.epizy.com","epiz_33125027","8ebnPRtOVSK","epiz_33125027_bank");
                $sql="select * from account;";

                $result = $conn->query($sql);

                echo "<select id='onselect'><option>None</option>"; // list box select command

                while($row = $result->fetch_assoc()){//Array or records stored in $row

                echo "<option value=$row[customer_id]>$row[name]</option>"; 

                }
                echo "</select>";
                $conn->close();

            ?>
        </td>
        <td><button type="button" onClick="myFunction()" class="btn btn-secondary">Fetch ID</button></td>
        </tr>
        <tr>
          <td id="a2"><label for="">Customer ID</label></td>
          <td id="cus_id">Click <b>fetch id</b></td>
        </tr>
        <tr>
          <td id="a2"><label for="">Confirm Customer ID</label></td>
          <td><?php
            echo "<input type='number' name='cu_id'>";
             ?></td>
        </tr>
        <tr>
          <td id="a2"><label for="">Enter Amount</label></td>
          <td> 
            <?php
            echo "<input id='amount' type='number' name='amo'>";
             ?>        
          </td>
        </tr>
        <tr>
          <td></td>
          <td><input type="checkbox" name="declare" value="accept">Accept terms and conditions</td>
        </tr>
        <tr>
          <td></td>
          <td><button id="update" class="btn btn-primary" onClick="transfer()" name="update" value="Update">Transfer</button></td>
        </tr>
      </table>
    </form>
    </div>

    <footer class="container-fluid" id="footer">
      <div class="row" align=center>
        <div class="col" style="color:#EDD2F3">
          Contact Us
        </div>
        <div class="col" style="color:#EDD2F3">
          Email Us
        </div>
      </div>
      <div class="row" align=center>
        <div class="col">
          +91 9999995555
        </div>
        <div class="col">
          mahendra@gmail.com
        </div>
      </div>
    </footer>
  </body>
  <script type="text/javascript">
  function myFunction() {
    var x = document.getElementById("onselect").value;
    console.log(x);
    document.getElementById("cus_id").innerHTML=x;
  }
  function transfer(){
      <?php
        $conn=new mysqli("sql306.epizy.com","epiz_33125027","8ebnPRtOVSK","epiz_33125027_bank");
        $cu_id = $_POST['cu_id'];
        $amo = $_POST['amo'];
        $sql1="select * from account;";
        $result = $conn->query($sql1);

        while($row = $result->fetch_assoc()){//Array or records stored in $row

              if($row['customer_id']==$cu_id){
                $fromamount=$row['current_balance'];
                break;
            } 

            }

        $up=$amo+$fromamount;

        $sql2="INSERT INTO `transactions`(`t_from`, `t_to`, `debit`, `credit`, `amount`) VALUES ('bank','$cu_id','-',$amo,$up)";
        $r = $conn->query($sql2);

        $sql="UPDATE account ". "SET current_balance = $up ". 
               "WHERE customer_id = $cu_id" ;
        $result = $conn->query($sql);

        if($sql){
            header("Location: http://banking-app.great-site.net/success.html");
        }

       ?>
        
       
  }

  </script>
</html>
