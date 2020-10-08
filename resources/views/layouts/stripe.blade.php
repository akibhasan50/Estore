<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title data-tid="elements_examples.meta.title">Stripe Elements: Build beautiful, smart checkout flows</title>
  <meta data-tid="elements_examples.meta.description" name="description" content="Build beautiful, smart checkout flows.">

  <!-- CSS for each example: -->
  <link rel="stylesheet" type="text/css" href="{{asset('ui/fontend')}}/assets/css/stripecss/example1.css" data-rel-css="" />

</head>

<body>
      <div class="container">
      <h1 class="py-3" style="margin:20px 20px; text-align:center; font-size:26px; color:blue;">Thank you for purchasing from us we will contact with you soon</h1>

      <div style="margin-top:20px;">
            <h1 class="py-3" style="margin:20px 20px; text-align:center; font-size:26px;">Your total payable amount is : ${{ Session::get('grandtotal')}}</h1>
      <div>


      <script src="https://js.stripe.com/v3/"></script>

<div class="payment-form">
<form action="{{url('/payment-done/')}}" method="post" id="payment-form">
@csrf
  <div class="form-row">
    <label style="font-size:19px;" for="card-element">
      Credit or debit card
    </label>
    <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>
  </div>

  <button class="btn">Submit Payment</button>
</form>

</div>


</body>

  <script src="{{asset('ui/fontend')}}/assets/js/stripe/example1.js" data-rel-js></script>
  
</html>

  