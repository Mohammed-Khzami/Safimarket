
<!DOCTYPE html>
<html lang="en">
    <?php session_start();
    ?>

<head>
    <!-- Add meta tags for mobile and IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title> PayPal Smart Payment Buttons Integration | Client Demo </title>
    <style>
    .container {
  margin: auto;
  width: 50%;
  height:50%;
  padding: 10px;
}
    </style>
</head>

<body> 
     
     <div class="container">
     
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
    
    </div>

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=ATXA1MhkSvqKvglM7UiHFyfDoXP7Wy6MO58Bq4tKdFtmh5fMg6SHDH5E8vmWEWfHz2D64qKJ31IxP56H&currency=USD"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
          
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: <?php echo $_SESSION['total']?>
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }
            


        }).render('#paypal-button-container');
    </script>
</body>

</html>
    