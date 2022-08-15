<?php
// Initialize the session
session_start();

// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
<title>Billing</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
  .button {
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</head>

<body>
<div style="border-style: solid;">
<button style="float: right;width: 200px;padding: 10px;right: 5px;border:  solid #000000;border-right-style:hidden;border-top-style:hidden;" onclick="window.location.href = 'logout.php';">Logout</button><br><br>

<center>
<form action="makebill.php" method="post">
<h3><center><b>Select Center</b></center></h3>
<label for="center">Choose a center:</label>
  <select id="center" name="ccenter" size="1">
    <option value="MH142/I">INMH142 (MG Road)</option>
    <option value="MH148/I">INMH148 (Bhosari)</option>
    <option value="MH144/I">INMH144 (Laxmi Road)</option>

    

    
  </select>
<h3><center><b>Invoice Details</b></center></h3>
			<table>
			<tr>
                <th>Enter Job No.:
                <th><input type="text" name="sheetno" maxlength="10" id="sheetno" required><br>
				   <span id="error_msg" style="color:red"></span>

			</tr>
			<tr>
                <th>Enter Invoice No.:
                <th><input type="text" name="inno" maxlength="8" id="inno" required><br>
				   <span id="error_msg1" style="color:red"></span>

			</tr>
			<tr>
                <th>Enter Invoice Date:
                <th><input type="date" name="indate"><br>
				   
			</tr>
			
			</table>
               
<h3><center><b>Customer Details</b></center></h3>
			<table>
			<tr>
                <th>Enter Bill To.:
                <th><input type="text" name="name" required><br>
				   
			</tr>
			<tr>
                <th>Enter Contact No.:
                <th><input type="text" name="contactno"><br>
				   
			</tr>
			<tr>
                <th>Enter Address.:
                <th><input type="text" name="address"><br>
				   
			</tr>
			<tr>
                <th>Enter State:
                <th><input type="text" name="state"><br>
				   
			</tr>
			
			<tr>
                <th>Select Payment Mode:
                <th><label for="Cash">Cash</label>
  <input type="radio" name="payment" id="Cash" value="Cash" checked><br>
  <label for="Card">Card</label>
  <input type="radio" name="payment" id="Card" value="Card"><br>
  <label for="Paytm">Paytm</label>
  <input type="radio" name="payment" id="Paytm" value="Paytm"><br>
			</tr>
			</table>
			
			<h3><center><b>Device Details</b></center></h3>
			<table>
			<tr>
                <th>Enter Model No.:
                <th><input type="text" name="model" required><br>
				   
			</tr>
			<tr>
                <th>Enter IMEI No.:
                <th><input type="text" name="imei" ><br>
				   
			</tr>
			</table>
			   
			   <h3><center><b>Part Details</b></center></h3>
			   <h3><center><b>Item 1</b></center></h3>

			       <input type="hidden" id="count" value="0" name="count">

				<table>
			<tr>
                <th>Enter Part Code No.:
                <th><input type="text" name="partcode0"><br>
				   
			</tr>
			<tr>
                <th>Enter Quantity:
                <th><input type="text" name="quantity0"><br>
				   
			</tr>
	</table>
	<div class="pxtg">
	<br>
    <input class="button" type="button" id="newFieldBtn" value="Add Item"/>
            
    <input class="button" type="submit" value="Submit"></input><br><br>
          </div>  
        </form>

<script>
						jQuery(document).ready(function($) {
  $('#newFieldBtn').click(function() {
    var count = document.getElementById('count').value;
    count++;
	count1=count+1;
	var nxt = '<h3><b>Item ' + count1 + '</b></h3><table><tr><th><b>Enter Part Code No.:</b></th><th><input type="text" name="partcode' + count +'"></th><br></tr><tr><th><b>Enter Quantity:</b></th><th><input type="text" name="quantity' + count +'"></th></tr></table>';

	jQuery('.pxtg').before(nxt);

    document.getElementById('count').value = count;
  });
});

	


	</script>
	</center>
</body>
</html>