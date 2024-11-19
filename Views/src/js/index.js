function checkRememberedUser() {
    var rememberedUser = localStorage.getItem('username');
    if (rememberedUser) {
        document.getElementById('userName').value = rememberedUser;
        document.getElementById('formCheck').checked = true;
    }
}

document.getElementById('loginForm').addEventListener('submit', Login);

window.onload = checkRememberedUser;

