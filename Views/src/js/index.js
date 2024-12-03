document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');
    const keyInput = document.getElementById('key');
    const rememberCheckbox = document.getElementById('formCheck');


    if (localStorage.getItem('rememberMe') === 'true') {
        keyInput.value = localStorage.getItem('key') || '';
        rememberCheckbox.checked = true;
    }

   
    loginForm.addEventListener('submit', () => {
        const rememberMe = rememberCheckbox.checked;

        if (rememberMe) {
            localStorage.setItem('key', keyInput.value); 
            localStorage.setItem('rememberMe', 'true'); 
        } else {
            localStorage.removeItem('key'); 
            localStorage.removeItem('rememberMe');
        }
    });
});
