//VARIABLES GLOBALES
const emailinput=document.getElementById('email-input');
const formbtn=document.getElementById('button-register');
formbtn.disabled=true;

//IMAGEN SUBIDA (VALIDACIÓN)
document.getElementById('pic-input').addEventListener('input', function(){

    var picinput=document.getElementById('pic-input');
    
    if(picinput.files.length===0){
        formbtn.disabled=true;
        picinput.classList.add('border-danger', 'focus-danger')
        picinput.classList.remove('border-success', 'focus-success');
    }else{
        formbtn.disabled=false;
        picinput.classList.add('border-success', 'border-success');
        picinput.classList.remove('border-danger', 'focus-ring-danger');
    }
});
//PREVIEW IMAGEN DE PERFIL
document.getElementById('pic-input').addEventListener('change', function(event){

    const file=event.target.files[0];
    if(file){
        const preview=document.getElementById('pic-preview');
        preview.src=URL.createObjectURL(file);
    }
});
//CAMPO DE EMAIL
emailinput.addEventListener('input', ()=>{

    const validate=CheckEmail(emailinput.value);

    if(validate){
        emailinput.classList.add('border-success', 'focus-ring-success');
        emailinput.classList.remove('border-danger', 'focus-ring-danger');
        formbtn.disabled=false;
    }else{
        emailinput.classList.add('border-danger','focus-ring-danger');
        emailinput.classList.remove('border-success', 'focus-ring-success');
        formbtn.disabled=true;
    }


});
//REGEX CORREO
function CheckEmail(email){
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}
//USUARIO: 1 NUMERO MINIMO NO ESPACIOS
function CheckUserFormat(){
    const username=document.getElementById('user-input').value;
    const usernamein=document.getElementById('user-input');
    var nospaces=username.indexOf(' ') === -1;
    var number=/\d/.test(username);

    if(nospaces && number){
        formbtn.disabled=false;
        usernamein.classList.add('border-success', 'focus-ring-success');
        usernamein.classList.remove('border-danger', 'focus-ring-danger');
        
    }else{
        formbtn.disabled=true;
        usernamein.classList.add('border-danger', 'focus-ring-danger');
        usernamein.classList.remove('border-success', 'focus-ring-success');
    }
    
}
//CONTRASEÑA
function CheckPassword(){
    const passvalue=document.getElementById('pass-input').value;
    const inputpass1=document.getElementById('pass-input');
    const bar=document.getElementById('pass-bar');
    const text0=document.getElementById('no-spaces');

    if (/\s/.test(passvalue)) {
        text0.style.display="flex";
        return;
    }else{
        text0.style.display="none";
    }

    let strength='weak';

    if (passvalue.length > 8 && /[A-Z]/.test(passvalue) && /[0-9]/.test(passvalue)) {
        strength = 'strong';
    } else if (passvalue.length > 5) {
        strength = 'medium';
    }

    if(strength==='strong'){
        bar.style.backgroundColor="#1EDF00";
        inputpass1.classList.add('focus-ring-success','border-success');
        inputpass1.classList.remove('focus-ring-danger', 'border-danger');
        inputpass1.classList.remove('focus-ring-warning', 'border-warning');
        formbtn.disabled=false;
        
    }
    if(strength==='medium'){
        bar.style.backgroundColor="#F7EC13";
        inputpass1.classList.add('focus-ring-warning', 'border-warning');
        inputpass1.classList.remove('focus-ring-success', 'border-success');
        inputpass1.classList.remove('focus-ring-danger', 'border-danger');
        formbtn.disabled=false;
    }
        if(strength==='weak'){
        bar.style.backgroundColor="#FF1700";
        inputpass1.classList.add('focus-ring-danger','border-danger');
        inputpass1.classList.remove('focus-ring-success', 'border-success');
        inputpass1.classList.remove('focus-ring-warning', 'border-warning');
        formbtn.disabled=true;
    }
}
//COINCIDENCIA CONTRASEÑA
function ConfirmPassword(){

    const pass1=document.getElementById('pass-input').value;
    const pass2=document.getElementById('pass-input2').value;
    const inputpass2=document.getElementById('pass-input2');
    const text1=document.getElementById('pass-confirm');


    if(pass2!==''){

        if(pass1!==pass2){
            text1.style.display="flex";
            inputpass2.classList.add('focus-ring-danger', 'border-danger');
            inputpass2.classList.remove('focus-ring-success', 'border-success');
            formbtn.disabled=true;
        }else{
            text1.style.display="none";
            inputpass2.classList.add('focus-ring-success','border-success');
            inputpass2.classList.remove('focus-ring-danger', 'border-danger');
            formbtn.disabled=false;
        }

    }

}
//NOMBRE
function NameCheck(){
    const name=document.getElementById('name-input').value;
    const nameinput=document.getElementById('name-input');

    var nospaces=name.indexOf(' ') === -1;

    if(nospaces){
        formbtn.disabled=false;
        nameinput.classList.add('focus-ring-success', 'border-success');
        nameinput.classList.remove('focus-ring-danger', 'border-danger');

    }else{
        nameinput.classList.add('focus-ring-danger','border-danger');
        nameinput.classList.remove('focus-ring-success', 'border-success');
        formbtn.disabled=true;
    }

}
//APELLIDO PATERNO
function FirstCheck(){
    const fname=document.getElementById('fname-input').value;
    const fnameinput=document.getElementById('fname-input');

    var nospaces=fname.indexOf(' ') === -1;

    if(nospaces){
        formbtn.disabled=false;
        fnameinput.classList.add('focus-ring-success', 'border-success');
        fnameinput.classList.remove('focus-ring-danger', 'border-danger');

    }else{
        fnameinput.classList.add('focus-ring-danger','border-danger');
        fnameinput.classList.remove('focus-ring-success', 'border-success');
        formbtn.disabled=true;
    }

}
//APELLIDO MATERNO
function LastCheck(){
    const lname=document.getElementById('lname-input').value;
    const lnameinput=document.getElementById('lname-input');

    var nospaces=lname.indexOf(' ') === -1;

    if(nospaces){
        formbtn.disabled=false;
        lnameinput.classList.add('focus-ring-success', 'border-success');
        lnameinput.classList.remove('focus-ring-danger', 'border-danger');

    }else{
        lnameinput.classList.add('focus-ring-danger','border-danger');
        lnameinput.classList.remove('focus-ring-success', 'border-success');
        formbtn.disabled=true;
    }

}
//CALENDARIO
document.addEventListener('DOMContentLoaded', () => {
    const datePicker = document.getElementById('date-input');
    const today = new Date().toISOString().split('T')[0];
    datePicker.setAttribute('max', today);
});

