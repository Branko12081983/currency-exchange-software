<div class="container">
<div class="row">
<div class="col-md">
<div method="POST" class="form-signin register-div">
<div class="py-5 text-center">
     <h2>Purchase foreign currency</h2>
</div>
<label for="userName">Username</label>
<input type="text" required class="full-width form-control" name="username" id="username" value="" placeholder="Type your username here..."/>
<label for="email">Email</label>
<input type="email" required class="full-width form-control" name="email" id="email" value="" placeholder="Type your email here..."/>

<label for="ammount">Ammount</label>
<input type="number" id="ammount" class="full-width form-control" required name="price" min="0.00" value="0.00" step="0.01">

<label for="currency">Currency</label>
<select name="currency" class="full-width form-control" id="currency">
<?php echo $basic->select_currency_list();?>
</select>
<label for="surcharge">Surcharge</label>
<p id="surcharge-result">7.5%</p>
<label for="discount">Discount</label>
<p id="discount-result">No discount</p>
<label for="ammount">Ammount in USD</label>
<div id="ammount_in_usd_div">
<input type="number" id="ammount_in_usd" disabled class="full-width form-control" required name="price" min="0.00" value="0.00" step="0.01">
</div>
<br>
<button id="purchase" class="full-width btn btn btn-primary btn-block" type="submit">Purchase</button>
<div class="clearfix"></div>
<br>
<div id="no-display" class="alert alert-success no-display">
  <strong>Success!</strong> You bought currency succesfully.
</div>

</div>
</div>
</div>
</div>