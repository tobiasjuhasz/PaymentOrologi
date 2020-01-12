Mercadopago.setPublishableKey("TEST-942139d0-9543-4547-8d04-524554820231");

function addEvent(to, type, fn) {
    if (document.addEventListener) {
        to.addEventListener(type, fn, false);
    } else if (document.attachEvent) {
        to.attachEvent('on' + type, fn);
    } else {
        to['on' + type] = fn;
    }
};

addEvent(document.getElementById('cardNumber'), 'keyup', guessingPaymentMethod);
addEvent(document.getElementById('cardNumber'), 'change', guessingPaymentMethod);

function getBin() {
    const cardnumber = document.getElementById("cardNumber");
    return cardnumber.value.substring(0, 6);
};

function guessingPaymentMethod(event) {
    var bin = getBin();
    console.log()
    if (event.type == "keyup") {
        if (bin.length >= 6) {
            window.Mercadopago.getPaymentMethod({
                "bin": bin
            }, setPaymentMethodInfo);
        }
    } else {
        setTimeout(function() {
            if (bin.length >= 6) {
                window.Mercadopago.getPaymentMethod({
                    "bin": bin
                }, setPaymentMethodInfo);
            }
        }, 100);
    }

    console.log(window.Mercadopago.getPaymentMethod());
};

function setPaymentMethodInfo(status, response) {
    if (status == 200) {
        const paymentMethodElement = document.querySelector('input[name=paymentMethodId]');

        if (paymentMethodElement) {
            paymentMethodElement.value = response[0].id;
        } else {
            const input = document.createElement('input');
            input.setAttribute('name', 'paymentMethodId');
            input.setAttribute('type', 'hidden');
            input.setAttribute('value', response[0].id);

            form.appendChild(input);
        }

        // Mercadopago.getInstallments({
        //     "bin": getBin(),
        //     "amount": parseFloat(document.querySelector('#amount').value),
        // }, setInstallmentInfo);

    } else {
        alert(`payment method info error: ${response}`);
    }
};

doSubmit = false;
addEvent(document.querySelector('#pay'), 'submit', doPay);

function doPay(event) {
    event.preventDefault();
    if (!doSubmit) {
        var $form = document.querySelector('#pay');

        window.Mercadopago.createToken($form, sdkResponseHandler); // The function "sdkResponseHandler" is defined below

        return false;
    }
};

function sdkResponseHandler(status, response) {
    if (status != 200 && status != 201) {
        alert("verify filled data");
    } else {
        var form = document.querySelector('#pay');
        var card = document.createElement('input');
        card.setAttribute('name', 'token');
        card.setAttribute('type', 'hidden');
        card.setAttribute('value', response.id);
        form.appendChild(card);
        doSubmit = true;
        form.submit();
    }
};