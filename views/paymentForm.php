<!DOCTYPE html>
<html lang="en" mode="ios">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RadiantChild | Panier</title>
    <link rel="icon" type="image/png" href="" />
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css"/>
    <link rel="stylesheet" href="../assets/css/style.css"/>
    <link rel="stylesheet" href="../assets/css/payment.css"/>
    <link rel="stylesheet" href="../assets/vendors/fa/css/all.min.css">
    <script type="module">
        import { menuController } from 'https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/index.esm.js';
        window.menuController = menuController;
    </script>

</head>
<body>
<ion-app>
    <ion-header>
            <div class="ShadowHeader">
            <ion-toolbar class="test">
                    <ion-title><a  class="logo-header">RadiantChild</a></ion-title>
            </ion-toolbar>
            </div>
            </ion-header>
        <ion-content>
            <div class="contentCart">
                <ion-card class="cart">
                    <ion-card-content>
                        <form action="../controllers/paymentController.php?price=<?=$_GET['price']?>" method="post" id="payment_form">
                        <input type="email" name="email" placeholder="Email">
                        <div class="form-row">
                                <div id="card-element">
                                </div>
                                <div id="card-errors" role="alert">

                                </div>
                            </div>
                            <div id="hidden-input"></div>    
                            <button type="submit" class="btn-validate" value="VALIDER" >VALIDER</button>
                        </form>                    
                    </ion-card-content>
                </ion-card>
            </div>
        </ion-content>
      </div>
  </ion-app>
  <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('pk_test_51ImFoxFc4ysd59XzGSn89eaylNroDtUxY7uAFBpz1lLuBxRj2f4vCCNwUHiIzAvhZzQ63fVS3SjuEhaiJFZPxeC6009EGwvGne');
        var elements = stripe.elements();

        var style = {
            base: {
                fontSize: '16px',
                color: 'green',
            }
        };
        var card = elements.create('card', {style: style});
        card.mount('#card-element');

        card.addEventListener('charges', function (event){
            var displayError = document.getElementById('card-errors');
            if(event.error){
                displayError.textContent = event.error.message;
            }
            else{
                displayError.textContent = '';
            }
        })
        var form = document.getElementById('payment_form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result){
                if(result.error){
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                }
                else{
                    stripeTokenHandler(result.token);
                }
            })
        });
        function stripeTokenHandler(token){
            var form = document.getElementById('payment_form');
            var hiddenDiv = document.getElementById('hidden-input');
            hiddenDiv.innerHTML =`<input type="hidden" value="${token.id}" name="stripeToken"></input>`
            form.appendChild(hiddenDiv);

            form.submit();
        }
    </script>
  
</body>

</html>