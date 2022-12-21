<?php
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'controllers/controllers.php';
include 'controllers/db-controllers.php';
if(isset($_GET["update-ammount"])){
$ammount = $_GET["ammount"];
$selected_currency = $_GET["selected_currency"];
$surcharge_percentage = $_GET["surcharge_percentage"];
$discount_percentage = $_GET["discount_percentage"];
if($selected_currency=='JPY'){
$currency_rate=$usd_to_jpy;	
}
else if($selected_currency=='GBP'){
$currency_rate=$usd_to_gbp;		
}
else if($selected_currency=='EUR'){
$currency_rate=$usd_to_eur;		
}
$ammount_in_usd = $ammount/$currency_rate;
$ammount_in_usd = $ammount_in_usd + $surcharge_percentage * $ammount_in_usd;
$ammount_in_usd = $ammount_in_usd - $discount_percentage * $ammount_in_usd;
$ammount_in_usd = round($ammount_in_usd, 2);
echo '<input type="number" id="ammount_in_usd" disabled class="full-width form-control" required name="price" min="0.00" value="'.$ammount_in_usd.'" step="0.0001">';
}
else if(isset($_GET["purchase"])){
$ammount = $_GET["ammount"];
$selected_currency = $_GET["selected_currency"];
$surcharge_percentage = $_GET["surcharge_percentage"];
$discount_percentage = $_GET["discount_percentage"];
$username = $_GET["username"];
$email = $_GET["email"];
if($selected_currency=='JPY'){
$currency_rate=$usd_to_jpy;	
}
else if($selected_currency=='GBP'){
$currency_rate=$usd_to_gbp;		
}
else if($selected_currency=='EUR'){
$currency_rate=$usd_to_eur;		
}
$ammount_in_usd = $ammount/$currency_rate;
$ammount_in_usd = $ammount_in_usd + $surcharge_percentage * $ammount_in_usd;
$surcharge = round($surcharge_percentage * $ammount_in_usd, 2);
$discount = round($discount_percentage * $ammount_in_usd, 2);
$ammount_in_usd = $ammount_in_usd - $discount_percentage * $ammount_in_usd;
$ammount_in_usd = round($ammount_in_usd, 2);
$surcharge_percentage = $surcharge_percentage*100;
$discount_percentage = $discount_percentage*100;

 $insert_purchase_query = "INSERT INTO purchases
 (
ammount,
currency,
exchange_rate,
total_paid,
surcharge,
surcharge_percentage,
discount,
discount_percentage,
username,
email,
timestamp
 )
  VALUES(
:ammount,
:currency,
:exchange_rate,
:total_paid,
:surcharge,
:surcharge_percentage,
:discount,
:discount_percentage,
:username,
:email,
:timestamp
  )";  
        $stmt = $connwrite->prepare($insert_purchase_query);									
		$stmt->bindParam(':ammount', $ammount, PDO::PARAM_STR);	
 		$stmt->bindParam(':currency', $selected_currency, PDO::PARAM_STR);	
 		$stmt->bindParam(':exchange_rate', $currency_rate, PDO::PARAM_STR);	            
  		$stmt->bindParam(':total_paid', $ammount_in_usd, PDO::PARAM_STR);
 		$stmt->bindParam(':surcharge', $surcharge, PDO::PARAM_STR);			  
      	$stmt->bindParam(':surcharge_percentage', $surcharge_percentage, PDO::PARAM_STR);		   
       	$stmt->bindParam(':discount', $discount, PDO::PARAM_STR);
      	$stmt->bindParam(':discount_percentage', $discount_percentage, PDO::PARAM_STR);	
      	$stmt->bindParam(':username', $username, PDO::PARAM_STR);	
      	$stmt->bindParam(':email', $email, PDO::PARAM_STR);	
      	$stmt->bindParam(':timestamp', time(), PDO::PARAM_STR);			
        $stmt->execute();
        $OK = $stmt->rowCount(); 
		
		if($selected_currency=='EUR'){
		$basic->send_mail('branko83itbusiness@gmail.com',$username,$email,'Your order is successfull',$ammount);
		}
}