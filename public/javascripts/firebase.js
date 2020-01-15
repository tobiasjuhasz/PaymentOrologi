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
        querySnapshot.forEach((doc) => {
            items.push({
                id: doc.id,
                ...doc.data()
            });
        });
    });
}

var data = document.getElementById('data');

setTimeout(async function() {
    if (location.pathname !== "procesar_pago.php") {
        if (items === undefined || items.length <= 0) {
            location.pathname = "notfound.html";
        }
        items.forEach(i => {
            total += i.cant * i.value;
        });
        if (location.pathname !== 'shipping_way.php') {
            document.getElementById('items').value = JSON.stringify(items);
            document.getElementById('total').value = total;
        }
    } else {
        data = JSON.parse(data.value);

        console.log(data);
    }
    return;
}, 2500);