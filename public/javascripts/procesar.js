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
data = JSON.parse(data.value);

db.collection("Ventas")
    .add(data)
    .then(function(docRef) {
        console.log("Document Written! id:", docRef);
    }).catch(function(e) {
        console.error("Error Writing Document: ", e);
    })