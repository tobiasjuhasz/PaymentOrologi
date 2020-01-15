var fc = {
    apiKey: "AIzaSyBLYMRW6TY3_MY-BvCj7ufx-sX6dK5YJ2Y",
    authDomain: "orologifb-5843c.firebaseapp.com",
    databaseURL: "https://orologifb-5843c.firebaseio.com",
    projectId: "orologifb-5843c",
    storageBucket: "orologifb-5843c.appspot.com",
    messagingSenderId: "68148808732",
    appId: "1:68148808732:web:63e0eaa5e38c755975a3d9",
    measurementId: "G-ESVKQ35GTM"
}

if (location.pathname !== "procesar_pago.php") {
    var uid = document.getElementById('uid').value;

    firebase.initializeApp(fc);
    var db = firebase.firestore();

    var items;
    var total = 0;

    db.collection("cart_" + uid).get().then((querySnapshot) => {
        items = [];
        if (querySnapshot.size > 0) {
            querySnapshot.forEach((doc) => {
                items.push({
                    id: doc.id,
                    ...doc.data()
                });
                total += doc.data().value * doc.data().cant;
            });

            if (location.pathname !== 'shipping_way.php') {
                document.getElementById('items').value = JSON.stringify(items);
                document.getElementById('total').value = total;
            }
        } else {
            location.pathname = "notfound.html";
        }
    });
}


setTimeout(function() {

    return;
}, 2500);