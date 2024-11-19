import { initializeApp } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-analytics.js";
import { getAuth } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-auth.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyB9zw2LbL1q7i9gK6QNKN7yNReBc-HqQoE",
  authDomain: "pwci-e39ea.firebaseapp.com",
  projectId: "pwci-e39ea",
  storageBucket: "pwci-e39ea.firebasestorage.app",
  messagingSenderId: "965689602944",
  appId: "1:965689602944:web:8922dbba75b708cbcc8765",
  measurementId: "G-W37E8JFE62"
};

const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
const auth = getAuth(app);

export { auth };