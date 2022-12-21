<?php
     $select_ex_rates_query = "SELECT * FROM  exchange_rates WHERE id=1";		
     foreach($connread->query($select_ex_rates_query) as $row) {
	    $usd_to_jpy=$row['usd_to_jpy']; 
	    $usd_to_gbp=$row['usd_to_gbp']; 	
	    $usd_to_eur=$row['usd_to_eur']; 			
     }
	 $now= time();
     $select_rate_update_query = "SELECT * FROM  rates_updated WHERE id=1";		
     foreach($connread->query($select_rate_update_query) as $row) {
	    $uc_timestamp = $row['timestamp']; 
        $uc_diference = $now - $uc_timestamp;		
     }	 