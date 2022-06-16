@extends('layouts.payp')
@section('content')
    <h1 class="text-center">Paypal Merchant</h1>   
      <div id="paypal-button-container-popup"></div>
      <input type="hidden" name="payment_id" id="payment_id" value="">
      <input type="hidden" name="payer_id" id="payer_id">
      <input type="hidden" name="marchant_id" id="marchant_id" value="">
      <input type="hidden" name="payment_status" id="payment_status" value="">
@endsection
@push('script')
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
   $body = $("body");
      // $('#paypal-button-container-popup').show();
      paypal.Button.render({
      env: 'sandbox', //sandbox // production
      style: {
      label: 'checkout',
      size:  'responsive',
      shape: 'rect',
      color: 'gold'
      },
      client: {
      sandbox: 'AecOOc2jEXgHOHx8dPM0A_NCpjSlkmu5lP5TW73CLI0P9WD5eLNK4gIz-1S8uIXk0ddTXCRhBwAB6_n1',
       }, 
      payment: function(data, actions) {
      total_price = 465;
      return actions.payment.create({
        payment: {
          transactions: [
            {
              amount: { total: total_price, currency: 'USD' }
            }
          ]
        }
      });
      },
      onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
       // generateNotification('success','Payment Authorized');
        $body.addClass("loading");
      console.log(data);
       var dataString = JSON.stringify(data);
        $('input[name="payment_status"]').val('Completed');
        $('input[name="payment_id"]').val(data.paymentID);
        $('input[name="payer_id"]').val(data.payerID); 
        $('input[name="marchant_id"]').val(data.marchant_id); 
        $('input[name="respon_data"]').val(dataString);
        $('input[name="payment_method"]').val('paypal');
        swal("Your Payment Successfull");
        return false;
        
        // $('#msform').submit();
        $body.removeClass("loading");
      });
      },
      onCancel: function(data, actions) {
       
        $('input[name="payment_status"]').val('Failed');
        $('input[name="payment_id"]').val(data.paymentID);
        $('input[name="payer_id"]').val('');
        $('input[name="payment_method"]').val('paypal');
        $('input[name="marchant_id"]').val('marchant_id');
        $('input[name="respon_data"]').val('');
         swal(" Your Payment Denied");
         return false;
      }
      }, '#paypal-button-container-popup');
</script>
@endpush