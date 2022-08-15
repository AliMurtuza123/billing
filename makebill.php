<?php

// Initialize the session
session_start();

// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
require_once "conn.php";

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
      // username and password sent from form 
	  
      $ccenter = mysqli_real_escape_string($conn,$_POST['ccenter']);
      $sheetno = mysqli_real_escape_string($conn,$_POST['sheetno']);
	  $inno = mysqli_real_escape_string($conn,$_POST['inno']);
      $indate = mysqli_real_escape_string($conn,$_POST['indate']);
	  $name = mysqli_real_escape_string($conn,$_POST['name']);
      $contactno = mysqli_real_escape_string($conn,$_POST['contactno']);
	  $address= mysqli_real_escape_string($conn,$_POST['address']);
	  $state = mysqli_real_escape_string($conn,$_POST['state']);
	  $payment = mysqli_real_escape_string($conn,$_POST['payment']);
    $model = mysqli_real_escape_string($conn,$_POST['model']);
	  $imei = mysqli_real_escape_string($conn,$_POST['imei']);
     
	// $partcode = mysqli_real_escape_string($conn,$_POST['partcode']);
	 // $quantity = mysqli_real_escape_string($conn,$_POST['quantity']);


}

$gettinfo = "select * from center where cinvno = N'$ccenter' ";
$queryy = mysqli_query($conn, $gettinfo);
$roww = mysqli_fetch_array($queryy);
	$cccode = $roww['cccode'];
	$billfrom = $roww['billfrom'];
	$caddress = $roww['caddress'];
	$address3 = $roww['address3'];
	$cstate = $roww['cstate'];
	$cpincode = $roww['cpincode'];
	$cphone = $roww['cphone'];
	$cgstin = $roww['cgstin'];
	$ccin = $roww['ccin'];
	$cpan = $roww['cpan'];
	$cinvno = $roww['cinvno'];

?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<title>CUSTOMER SERVICE</title>
<style>
table {
  border-collapse: collapse;
  font-size:11pt;
}

table, td, th {
  border: 1px solid black;
}

  .button {
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}




body 
{ 
height:297mm; 
width:210mm; 
margin-left:auto; 
margin-right:auto; 
}
</style>
<style>
@media print {
    body{
        height:297mm; 
	width:210mm; 
	margin-left:0.1; 
	margin-right:0.1; 
   } 
}
</style>
<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin-top: 8.5mm;  /* this affects the margin in the printer settings */
    margin-bottom : 0; 
	
}


  #printPageButton {
    display: none;
  }
  
  #SiteHomeButton {
    display: none;
  }
  
  #LogoutButton {
    display: none;
  }


</style>
</head>
<body>
<font face="Arial">
<table align="center">
<tr>
<th colspan="16" align="left" style="border-right-style:hidden;border-left-style:hidden;border-top-style:hidden;"><b>Job No.: <?php echo "$cccode"; ?>-<?php echo "$sheetno"; ?>
</b></th>
</tr>

<tr>
<th colspan="16" style="font-size:13pt">Tax Invoice</font></th>
</tr>

<tr>
<td colspan="7">
<b>Bill from</b> : <?php echo "$billfrom"; ?> (<?php echo "$cccode"; ?>)<br>
<b>Add</b> : <?php echo "$caddress"; ?><br>
<?php echo "$address3"; ?><br>
<b>Place of Supply</b> : <?php echo "$cstate"; ?><br>
<b>Pincode</b> : <?php echo "$cpincode"; ?><br>
<b>Phone No</b> : <?php echo "$cphone"; ?><br>
<b>GSTIN No</b> : <?php echo "$cgstin"; ?><br>
<b>CIN No</b> : <?php echo "$ccin"; ?><br>
<b>PAN No</b> : <?php echo "$cpan"; ?>
</td>
<td colspan="9">
<b>Invoice No</b> : <?php echo "$cinvno"; ?><?php echo "$inno"; ?><br>
<b>Invoice Date</b> : <?php echo "$indate"; ?>
</td>

</tr>

<tr>
<td colspan="7">
<b>Bill To</b> : <?php echo "$name"; ?><br>
<b>Contact No</b> : <?php echo "$contactno"; ?> <br>
<b>Add</b> : <?php echo "$address"; ?> <br>
<b>State</b> : <?php echo "$state"; ?><br> 
<b>GST No.</b> : <br>
<b>Payment Mode</b> : <?php echo "$payment"; ?> 

</td>
<td colspan="9">
<b>Model</b> : <?php echo "$model"; ?><br>
<b>IMEI</b> : <?php echo "$imei"; ?>
</td>
</tr>

<tr>
<td style= "text-align: center;"><b>Sno</b>
</td>
<td style= "text-align: center;"><b>Item Description</b>
</td>
<td style= "text-align: center;"><b>HSN/SAC</b></td>
<td style= "text-align: center;"><b>Qty</b></td>
<td style= "text-align: center;"><b>Unit
</b></td>
<td style= "text-align: center;" colspan="2"><b>Rate Per Ite<br>m</b></td>
<td style= "text-align: center;" ><b>Taxabl<br>e Valu<br>e
</b></td>
<td colspan="2"  style= "text-align: center;"><b>CGST</b></td>
<td colspan="2"  style= "text-align: center;"><b>SGST</b></td>
<td colspan="2"  style= "text-align: center;"><b>IGST</b></td>
<td  style= "text-align: center;"><b>Disco<br>unt</b></td>
<td  style= "text-align: center;"><b>Total</b></td>
</tr>

<tr>
<td colspan="8"></td>
<td  style= "text-align: center; border-left-style:hidden;">Rate</td>
<td  style= "text-align: center;">Amt.</td>
<td  style= "text-align: center;">Rate</td>
<td style= "text-align: center;">Amt.</td>
<td style= "text-align: center;">Rate</td>
<td style= "text-align: center;">Amt.</td>
<td></td>
<td></td>
</tr>
<?php
if(isset($_POST))
{
    $count = $_POST['count'];
	$sum11 = 0;
	$sum12 = 0;
	$sum13 = 0;
}
for($i=0;$i<=$count;$i++)
{
	    $partcode = $_POST['partcode'.$i];
		$quantity = $_POST['quantity'.$i];
		$counts = $i+1;
		$getinfo = "select * from partdata where part_code = N'$partcode' ";
$query = mysqli_query($conn, $getinfo);
$row = mysqli_fetch_array($query);

	$partname = $row['part_name'];
	$unit = $row['Unit'];
	$HSN = $row['HSN_Code'];
    
	$total1 = $row['price'];
    $price = $total1 /1.18;
	$taxable = $price*$quantity;
	$cgst = (($total1-$price)/2)*$quantity;
	$sgst = $cgst;
	$total2 = $total1 * $quantity;
	$total = round($total2);
	$sum11 += $taxable;	
	$sum12 += $cgst;
	$sum13 += $total2 ;
		?>

<tr>
<td  style= "text-align: center;"><?php echo "$counts"; ?></td>
<td  style= "text-align: center;"><?php echo "$partname"; ?> (<?php echo "$partcode"; ?>)</td>
<td  style= "text-align: center;"><?php echo "$HSN"; ?></td>
<td  style= "text-align: center;"><?php echo "$quantity"; ?></td>
<td  style= "text-align: center;"><?php echo "$unit"; ?></td>
<td  style= "text-align: center;" colspan="2"><?php $price1=number_format($price,2); echo "$price1"; ?></td>
<td style= "text-align: center;"><?php $taxable1=number_format($taxable,2); echo "$taxable1"; ?></td>
<td style= "text-align: center;">9.00</td>
<td style= "text-align: center;"><?php $cgst1=number_format($cgst,2); echo "$cgst1"; ?></td>
<td style= "text-align: center;">9.00</td>
<td style= "text-align: center;"><?php echo "$cgst1"; ?></td>
<td style= "text-align: center;">0.00</td>
<td style= "text-align: center;">0.00</td>
<td style= "text-align: center;">0.00</td>
<td style= "text-align: center;"><?php $total1=number_format($total,2); echo "$total1"; ?></td>
</tr>



		
<?php
}?>

<tr>
<?php $srn = $counts + 1; ?>
<td  style= "text-align: center;"><?php echo "$srn"; ?></td>
<td style= "text-align: center;">Service Charges</td>
<td style= "text-align: center;">998716</td>
<td style= "text-align: center;">1</td>
<td style= "text-align: center;"></td>
<td style= "text-align: center;" colspan="2">150.00</td>
<td style= "text-align: center;">150.00</td>
<td style= "text-align: center;">9.00</td>
<td style= "text-align: center;">13.50</td>
<td style= "text-align: center;">9.00</td>
<td style= "text-align: center;">13.50</td>
<td style= "text-align: center;">0.00</td>
<td style= "text-align: center;">0.00</td>
<td style= "text-align: center;">0.00</td>
<td style= "text-align: center;">177.00</td>
</tr>

<?php
$sum1 = $sum11 + 150;
$sum2 = $sum12 + 13.50;
$sum = $sum13 + 177;
 ?>

<tr>
<td colspan="7"align="right"><b>Total</b></td>
<td  style= "text-align: center;"><?php $sum01=number_format($sum1,2);  echo "$sum01"; ?></td>
<td></td>
<td align="center"><?php $sum02=number_format($sum2,2); echo "$sum02"; ?></td>
<td></td>
<td style= "text-align: center;"><?php echo "$sum02"; ?></td>
<td></td>
<td style= "text-align: center;">0.00</td>
<td align="center">0.00</td>
<td style= "text-align: center;"><?php $sum0=number_format($sum,2); echo "$sum0"; ?></td>
</tr>
<?php
$number = $sum;
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
   $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
     $words[$point / 10] . " " . $words[$point = $point % 10] : '';
		  
		  $totalword = $result."Only";
		  $roundoff1 = $total2 - $total;
		  $roundoff = number_format($roundoff1,2);
		  
?>

<tr>
<td colspan="6">Total Taxable Value (In Figure)</td>
<td colspan="10"><?php echo "$sum01"; ?></td>
</tr>

<tr>
<td colspan="6">Total GST</td>
<td colspan="10"><?php $totalGST = $sum02 * 2;
echo "$totalGST"; ?></td>
</tr>

<tr>
<td colspan="6">Total Discount</td>
<td colspan="10">0.00</td>
</tr>

<tr>
<td colspan="6">Round off</td>
<td colspan="10"><?php echo "$roundoff"; ?></td>
</tr>

<tr>
<td colspan="6">Total Invoice Value(In Figure)</td>
<td colspan="10"><?php echo "$sum0"; ?></td>
</tr>

<tr>
<td colspan="6">Total Invoice Value(In Words)</td>
<td colspan="10"><?php echo "$totalword"; ?></td>
</tr>

<tr>
<td colspan="6" rowspan="2"><b>Terms and Conditions</b>
<ol style="padding-left:20; ">
<li>In case of out of warranty/ void/physical damage, there
shall be awarranty period of 90 days from date of invoice pertaining to spare parts replaced. </li>
<li>Accessories such as Charger, earphone, USB cable and battery, sold over the counter shall not be qualified for replacement unless there is manufacturing defect within warranty period of 180 days from date of invoice.</li>
<li>No warranty on physical damaged/burnt items.</li>
<li>Only cash/card payment accepted.</li>
</ol>
</td>
<td colspan="5" rowspan="2" valign="bottom"><b>Customer Signature</b></td>
<td colspan="5" valign="top">For Inlead Electronics Private Limited</td>
</tr>
<tr>
<td valign="bottom" colspan="5" style="border-top-style:hidden;"><b>Authorized Signatory</b></td>
</tr>
<tr>
<td colspan="10"><b>Declaration : We declare that the invoice shows the actual price of goods describe and that all the particular are true and correct.</b></td>
<td colspan="6" align="right"><b>Description Date</b> : <?php echo "$indate"; ?></td>
</tr>
<tr>
<th colspan="16" align="center" style="border-right-style:hidden;border-left-style:hidden;border-bottom-style:hidden;"><b>*This is a computer generated invoice</b></th>
</tr>
</table><br>
<div  align="center">    
<table style="border:hidden;">
<tr style="border:hidden;">  
<td style="border:hidden;"><button class="button" id="SiteHomeButton" onClick="location.href = 'home.php';">New Bill</button> </td>    
<td style="border:hidden;"><button class="button" id="printPageButton" onClick="window.print();">Print</button></td> 
<td style="border:hidden;"><button class="button" id="LogoutButton" onClick="location.href = 'logout.php';">Logout</button>   </td>   
</tr>
</table>
</div>

</body>
</html>