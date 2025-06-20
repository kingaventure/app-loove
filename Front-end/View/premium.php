<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Acheter le premium - My App</title>
  <link rel="stylesheet" href="/app-loove/Front-end/assets/css/premium.css">
  <script src="https://www.paypal.com/sdk/js?client-id=AeeMis0L4wL9pc15ITVJILeARWl_ffKVhLrqMkm4ZPNA3442n4IEZQFsrI5itKexfDtg5TXEFWmtxXHO&currency=EUR"></script>
</head>
<body>
  <header>
    <a href="/app-loove/index.php?component=settings" class="header-icon close-icon">×</a>
    <h1>Acheter le premium</h1>
  </header>
  <div class="container">
    <div class="option"><p>Plus grande zone de recherche</p></div>
    <div class="option"><p>Débloquer les filtres</p></div>
    <div class="prix">10€/Mois</div>
    <div id="paypal-button-container"></div>
  </div>

  <script>
    paypal.Buttons({
      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{
            amount: { value: '10.00' }
          }]
        });
      },
      onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
          fetch('/app-loove/index.php?component=premium', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ pay_success: true })
          }).then(() => {
            alert('Félicitations, vous êtes Premium !');
            window.location.href = '/app-loove/index.php?component=settings';
          });
        });
      }
    }).render('#paypal-button-container');
  </script>
</body>
</html>
