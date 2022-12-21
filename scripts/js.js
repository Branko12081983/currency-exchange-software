$(function () {
	   $(document).on("change", "#currency", function (e) {			
       var selected_currency = $(this).val();	
       var ammount = $('#ammount_two').val();   
	   if(selected_currency=='JPY'){
       $("#surcharge_percentage").val('0.075');
       $("#surcharge-result").html('7.5%');	 
       $("#discount-result").html('No discount');
       $('#currency_two').val('JPY');	 
       $("#discount_percentage").val('0.00');	   
	   } 
	   else if(selected_currency=='GBP'){
       $("#surcharge_percentage").val('0.05');	
       $("#surcharge-result").html('5%');	
       $("#discount-result").html('No discount');
       $('#currency_two').val('GBP');
       $("#discount_percentage").val('0.00');	 	   
	   }
 	   else if(selected_currency=='EUR'){
       $("#surcharge_percentage").val('0.05');		
       $("#surcharge-result").html('5%');
       $("#discount-result").html('2%');
       $('#currency_two').val('EUR');	
       $("#discount_percentage").val('0.02');	 	   
	   }	
       var surcharge_percentage = $("#surcharge_percentage").val();	
       var discount_percentage = $("#discount_percentage").val();		   
	  	var xhttp = new XMLHttpRequest();
	    xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			  document.getElementById("ammount_in_usd_div").innerHTML = this.responseText;
			}
		};
		xhttp.open(
		"GET",
		"ajax.php?update-ammount=true&ammount=" + ammount + "&selected_currency=" + selected_currency + "&surcharge_percentage=" + surcharge_percentage + "&discount_percentage=" + discount_percentage + "",
				true
			);
			xhttp.send();
			return false;
	   });
	   });
	  $('#ammount').on('input',function(e){
        var ammount = $('#ammount').val();
        $('#ammount_two').val(ammount);	;		
        var selected_currency_two = $('#currency_two').val();	
        var surcharge_percentage = $("#surcharge_percentage").val();	
        var discount_percentage = $("#discount_percentage").val();			
	  	var xhttp = new XMLHttpRequest();
	    xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			  document.getElementById("ammount_in_usd_div").innerHTML = this.responseText;
			}
		};
		xhttp.open(
		"GET",
		"ajax.php?update-ammount=true&ammount=" + ammount + "&selected_currency=" + selected_currency_two + "&surcharge_percentage=" + surcharge_percentage + "&discount_percentage=" + discount_percentage + "",
				true
			);
			xhttp.send();
			return false;
      });

	  	  
$(function(){
$(document).on("click" , '#purchase' ,function (e) {	
        var email = $('#email').val();
        var username = $('#username').val(); 
        var ammount = $('#ammount_two').val();		
        var selected_currency_two = $('#currency_two').val();	
        var surcharge_percentage = $("#surcharge_percentage").val();	
        var discount_percentage = $("#discount_percentage").val();	
if ($('#username').val().length == 0) {
$('#username').addClass('warning-input'); 
setTimeout(function(){  
$('#username').removeClass('warning-input'); 
},1000);
}
if ($('#email').val().length == 0) {
$('#email').addClass('warning-input'); 
setTimeout(function(){  
$('#email').removeClass('warning-input'); 
},1000);
}
else if ($('#username').val().length != 0 && $('#email').val().length != 0) {		
if(!validateUserEmail(email)){ 
$('#email').addClass('warning-input'); 
setTimeout(function(){  
$('#email').removeClass('warning-input'); 
},1000);
}
else{	
setTimeout(function(){
$('#no-display').removeClass('no-display'); 
setTimeout(function(){  
$('#no-display').addClass('no-display'); 
},1000);
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) { 		 

    }
 };
  xhttp.open("GET", "ajax.php?purchase=true&ammount=" + ammount + "&selected_currency=" + selected_currency_two + "&surcharge_percentage=" + surcharge_percentage + "&discount_percentage=" + discount_percentage + "&email=" + email + "&username=" + username + "", true);
  xhttp.send();
  return false;	
                   },500); 	
}	
}			  				  				  
	              });	
	              });  
	  
	    function validateUserEmail($email) {
        var emailUserReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailUserReg.test( $email );
        }	  
	  
	  