var firebaseConfig = {
    apiKey: "AIzaSyBLYMRW6TY3_MY-BvCj7ufx-sX6dK5YJ2Y",
    authDomain: "orologifb-5843c.firebaseapp.com",
    databaseURL: "https://orologifb-5843c.firebaseio.com",
    projectId: "orologifb-5843c",
    storageBucket: "orologifb-5843c.appspot.com",
    messagingSenderId: "68148808732",
    appId: "1:68148808732:web:63e0eaa5e38c755975a3d9",
    measurementId: "G-ESVKQ35GTM"
}

var uid = document.getElementById('uid').value;

firebase.initializeApp(firebaseConfig);
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

setTimeout(async function() {
    if (items === undefined || items.length <= 0) {
        location.pathname = "notfound.html";
    }
    items.forEach(i => {
        total += i.cant * i.value;
    });
    document.getElementById('items').value = JSON.stringify(items);
    document.getElementById('total').value = total;
    return;
}, 2500);