<div id="paypal-button-container"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    // Render the PayPal button
    paypal.Button.render({
// Set your environment
        env: 'sandbox', // sandbox | production
        locale:'ar_EG',

// Specify the style of the button
        style: {
            layout: 'vertical',  // horizontal | vertical
            size:   'medium',    // medium | large | responsive
            shape:  'pill',      // pill | rect
            color:  'gold'       // gold | blue | silver | white | black
        },

// Specify allowed and disallowed funding sources
//
// Options:
// - paypal.FUNDING.CARD
// - paypal.FUNDING.CREDIT
// - paypal.FUNDING.ELV
        funding: {
            allowed: [
                paypal.FUNDING.CARD,
                paypal.FUNDING.CREDIT
            ],
            disallowed: []
        },

// Enable Pay Now checkout flow (optional)
        commit: true,

// PayPal Client IDs - replace with your own
// Create a PayPal app: https://developer.paypal.com/developer/applications/create
        client: {
            sandbox: 'AbWK_grMESHAKUnl-ewPJA0swAKrNoHO8dGvp7tkAfv0lhpZxiq2Pu0g6tIkvQ9_CJI2f19sirhYdf_5',
            production: '<insert production client id>'
        },

        payment: function (data, actions) {
            return actions.payment.create({
                payment: {
                    redirect_urls: {
                        return_url:'{{ route('paypal.process') }}'
                    },
                    transactions: [
                        {
                            amount: {
                                total: '20.00',
                                currency: 'USD'
                            }
                        }
                    ]
                }
            });
        },

        onAuthorize: function (data, actions) {
            return actions.redirect();
        }
    }, '#paypal-button-container');
</script>