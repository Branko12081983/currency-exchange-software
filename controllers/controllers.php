<?php
Class Basic {	
    public function select_currency_list(){
         return 
		 "
		 <option value='JPY'>JPY</option>    
		 <option value='GBP'>GBP</option>   
		 <option value='EUR'>EUR</option>   		 
		 ";
	}
    public function hidden_inputs(){
         return 
		 "
         <input type='hidden' id='ammount_two' value='0.00' />			 
         <input type='hidden' id='currency_two' value='JPY' />	
         <input type='hidden' id='surcharge_percentage' value='0.075' />
         <input type='hidden' id='discount_percentage' value='0.00' />		 
		 ";
	}	
    public function surcharge($currency){
         if($currency=='JPY'){
		 return '0.075';	 
		 }
		 else if($currency=='GBP'){
		 return '0.05';				 
		 }
		 else if($currency=='EUR'){
		 return '0.05';				 
		 }		 
		 
    }	
    public function send_mail($sender_address,$receiver_username,$receiver_address,$email_subject,$order_ammount){
	    $to = $receiver_address;
        $subject = $email_subject;
        $txt = $receiver_username . ', you have just bought' . $order_ammount . 'british pounds. Thank you!';
        $headers = "From: $sender_address" . "\r\n";
        mail($to,$subject,$txt,$headers);	 	 
    }	
	
}
	
Class Theme {
	public static function upper_page(){
	    return 
	    "
	    <html>
	    <head>
	    ";			
    }
	
	public static function middle_page(){
	    return 
	    "
        </head>
		<body class='bg-light'>
	    ";			
    }
		
	
    public static function down_page(){
	    return 
	    "
        </body>
		</html>
	    ";			
    }	
	
	public static function theme_style($css_link){
	    return 
	    "
		 <link rel='stylesheet' href=$css_link></link>
	    ";			
    }
	
	public static function theme_script($js_link){
	    return 
	    "
		 <script type='text/javascript' src=$js_link></script>
	    ";			
    }
	
}

if(class_exists('Basic')) {
  $basic= new Basic();
}
if(class_exists('Theme')) {
  $theme= new Theme();
}



