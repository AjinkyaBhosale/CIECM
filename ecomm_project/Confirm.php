<?php
include_once "HeaderHtml.php";
include_once "Helper.php";
include_once "Foreach.php";
include_once "DisplayLogic.php";
$helperObj=new Helper("ecomm");
$pricedb;
$userdb=$_SESSION['user'];
$prodiddb;
$tabledb="buy_details";
$fielddb="user_id,product_id,price";
$var=$_SESSION['user'];
$obj = new Helper("ecomm");
$field="user_id,mobile,address,city,zip";
$table="user_details";
$condition="user_id='".$var."'";
$record=$obj->read_record($field, $table, $condition);
$arra=[];
$price=0;

$arra=array(explode("&",str_replace('%2F','/',(str_replace('%2C',',',urldecode(html_entity_decode($_SESSION['key'])))))));
foreach ($arra[0] as $booking) {
$temp=$booking;
$temp=explode(",", $temp);
    foreach ($temp as $key=>$booking2) {
		if ($key == 0) {
		$prodiddb= substr($booking2,-7,7);
		}
       if ($key==2) {
				$price+=$booking2;
				$pricedb=$booking2;
}
		if ($key==5) {
			$valuesdb="'$userdb','$prodiddb','$pricedb'";
		$result=$helperObj->insert($tabledb, $fielddb, $valuesdb);	
		}			
	}
}
$parts = explode("@", "$emailid");
$username = $parts[0];
?>
<div id="body">
<h1 style="color:magenta">Thank you....<?php echo $username;?></h1>
	<?php  echo "<h3 style='color:blue'> You shoped for $price</h1>";
	echo "</div>";
include_once "html/FooterHtml.html";
?>
