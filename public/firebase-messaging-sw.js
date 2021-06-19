importScripts('https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.6.8/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyDVSPv0HVHKJfvr48fU0fuha8nDgI5DMVs",
    projectId: "doctordisplay-ec8b6",
    messagingSenderId: "778584535844",
    appId: "1:778584535844:web:c9aef0fbadbd547bd039b1"
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});
