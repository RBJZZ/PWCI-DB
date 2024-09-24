function PaymentMethod(){
    var debitcreditdiv=document.getElementById('credit-debit-form');
    var paypalmethod=document.getElementById('paypal-redirect');
    var selectedPM = document.querySelector('input[name="listGroupRadio"]:checked').value;

    if (selectedPM === 'PaypalPM') {
        paypalmethod.style.display = "flex";
        debitcreditdiv.style.display = "none";
    } else if (selectedPM === 'DebitPM' || selectedPM === 'CreditPM') {
        paypalmethod.style.display = "none";
        debitcreditdiv.style.display = "flex";
    } else {
        paypalmethod.style.display = "none";
        debitcreditdiv.style.display = "none";
    }
}
