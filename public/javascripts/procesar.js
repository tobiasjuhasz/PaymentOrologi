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


firebase.initializeApp(fc);
var db = firebase.firestore();

var data = document.getElementById('data');
var uid = document.getElementById('uid');
data = JSON.parse(data.value);

db.collection("ventas").add(data);


db.collection("cart_" + uid).get().then((q) => {
    q.forEach((d) => {
        db.collection("cart_" + uid).doc(d.id).delete();
    })
});