var usd =  $('.show_pal').val();
paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'AQZ2FD7P5AK1XHpGnClXF2MUe39K5RgB-ZckHjwaIDk9rrRnjA9AcMaLhQtPuTljRlMGucEtGuOxYPdD',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: `${usd}`,
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
      setTimeout(function(){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Tien da duoc thanh toan',
            showConfirmButton: false,
            timer: 2000
          })
      },1500);

      });
    }
  }, '#paypal-button');