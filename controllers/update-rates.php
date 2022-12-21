<?php
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.apilayer.com/currency_data/live",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: text/plain",
    "apikey: kjWnRYn3la9cfYe24StIehX8Etr7Dxjx"
  ),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET"
));
$response = curl_exec($curl);
curl_close($curl);
$jsonArrayResponse = json_decode($response);
$pusd_to_jpy=$jsonArrayResponse->quotes->USDJPY; 
$pusd_to_gbp=$jsonArrayResponse->quotes->USDGBP; 
$pusd_to_eur=$jsonArrayResponse->quotes->USDEUR; 

$update_rates_query = "UPDATE exchange_rates SET 
usd_to_jpy=:usd_to_jpy,
usd_to_gbp=:usd_to_gbp,
usd_to_eur=:usd_to_eur,
timestamp=:timestamp
WHERE id=1";
        // prepare the statement
        $stmt = $connwrite->prepare($update_rates_query);	
		$stmt->bindParam(':usd_to_jpy', $pusd_to_jpy, PDO::PARAM_STR);	
		$stmt->bindParam(':usd_to_gbp', $pusd_to_gbp, PDO::PARAM_STR);		
        $stmt->bindParam(':usd_to_eur', $pusd_to_eur, PDO::PARAM_STR);	
 		$stmt->bindParam(':timestamp', time(), PDO::PARAM_STR);	                                                            
        $stmt->execute();
        $OK = $stmt->rowCount();
		
$update_rates_update_query = "UPDATE rates_updated SET 
timestamp=:timestamp
WHERE id=1";
        // prepare the statement
        $stmt = $connwrite->prepare($update_rates_update_query );	
 		$stmt->bindParam(':timestamp', time(), PDO::PARAM_STR);	                                                            
        $stmt->execute();
        $OK = $stmt->rowCount();		

