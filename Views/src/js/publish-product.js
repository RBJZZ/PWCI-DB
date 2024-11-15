


document.addEventListener("DOMContentLoaded", function() {
    const quotableSwitch = document.getElementById("quotable");
    const productPrice = document.getElementById("product-price");
    const priceinput = document.getElementById('product-price');

    function togglePriceInput() {
        if (quotableSwitch.checked) {
            productPrice.disabled = true;
            productPrice.value = ''; 
            priceinput.classList.remove('focus-ring-danger', 'border-danger');
            priceinput.classList.remove('focus-ring-success', 'border-success');
            formbtn.disabled = false;
        } else {
            productPrice.disabled = false;
        }
    }

    
    quotableSwitch.addEventListener("change", togglePriceInput);

    togglePriceInput();

});


document.getElementById('thumbnail-upload').addEventListener('change', function(event){

    const file=event.target.files[0];
    if(file){
        const preview=document.getElementById('tmb-preview');
        preview.src=URL.createObjectURL(file);
    }
});


document.getElementById("multiple-pic-input").addEventListener("change", function(event) {
    const files = event.target.files;
    
    for (let i = 0; i < 4; i++) {
        const preview = document.getElementById(`preview${i + 1}`);
        
        if (files[i]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            
            reader.readAsDataURL(files[i]);
        } else {

            preview.src = './src/src/img-placeholder.png';
        }
    }
});


function checkName(){
    const namevalue=document.getElementById('product-name').value;
    const nameinput=document.getElementById('product-name');
    const formbtn=document.getElementById('register-product');
    const maxLength = 50;
    const validPattern = /^[a-zA-Z0-9\s-]+$/;

    if (namevalue.length<5 || namevalue.length > maxLength || !validPattern.test(namevalue)) {
        
        nameinput.classList.add('focus-ring-danger', 'border-danger');
        nameinput.classList.remove('focus-ring-success', 'border-success');
        formbtn.disabled = true;
        
        return false;

    }else if(namevalue.length>0 && namevalue.length>5 && validPattern.test(namevalue)){

        nameinput.classList.add('focus-ring-success','border-success');
        nameinput.classList.remove('focus-ring-danger','border-danger');
        formbtn.disabled=false;

        return true;
    }


}


function checkDesc() {
    const descvalue = document.getElementById('product-desc').value;
    const descinput = document.getElementById('product-desc'); 
    const formbtn = document.getElementById('register-product');
    const validPattern = /^[a-zA-Z0-9.,() ]*$/;

   
    if (descvalue.length<10 || !validPattern.test(descvalue)) {
        descinput.classList.add('focus-ring-danger', 'border-danger');
        descinput.classList.remove('focus-ring-success', 'border-success');
        formbtn.disabled = true;
        return false;
    }else{
        descinput.classList.add('focus-ring-success', 'border-success');
        descinput.classList.remove('focus-ring-danger', 'border-danger');
        formbtn.disabled = false; 
        return true;
    }
}


function checkPrice() {
    const pricevalue = document.getElementById('product-price').value; 
    const priceinput = document.getElementById('product-price');
    const formbtn = document.getElementById('register-product'); 
    const quotableSwitch = document.getElementById("quotable");

    const validPattern = /^[0-9]+(\.[0-9]{1,2})?$/;


        if (!validPattern.test(pricevalue)) {
            priceinput.classList.add('focus-ring-danger', 'border-danger');
            priceinput.classList.remove('focus-ring-success', 'border-success');
            formbtn.disabled = true; 

            return false;
            
        }else{
    
            priceinput.classList.add('focus-ring-success', 'border-success');
            priceinput.classList.remove('focus-ring-danger', 'border-danger');
            formbtn.disabled = false;

            return true;
    
        }
    
    

 
}


function checkStock(){
    const stockvalue=document.getElementById('product-stock').value;
    const stockinput=document.getElementById('product-stock');
    const formbtn=document.getElementsByName('register-product');

    const validPattern = /^[0-9]+$/;

    if(!validPattern.test(stockvalue)){
        stockinput.classList.add('focus-ring-danger', 'border-danger');
        stockinput.classList.remove('focus-ring-success', 'border-success');
        formbtn.disabled = true; 
        return false;
    }else{
        stockinput.classList.add('focus-ring-success', 'border-success');
        stockinput.classList.remove('focus-ring-danger', 'border-danger');
        formbtn.disabled = true; 
        return true;
    }
}


function checkURL(){
        const linkvalue = document.getElementById('product-video').value;
        const linkinput = document.getElementById('product-video');
        const formbtn = document.getElementById('register-product');
    
        const validPattern = /^(https?:\/\/)?(www\.)?([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}(\/[a-zA-Z0-9-._~:/?#[\]@!$&'()*+,;=%]*)?$/;

        if (!validPattern.test(linkvalue)) {
            linkinput.classList.add('focus-ring-danger', 'border-danger');
            linkinput.classList.remove('focus-ring-success', 'border-success');
            formbtn.disabled = true; 
            return false;
        }else{

            linkinput.classList.add('focus-ring-success', 'border-success');
            linkinput.classList.remove('focus-ring-danger', 'border-danger');
            formbtn.disabled = false;
            return true;
        }
}

function addCategory() {
    const formData = new FormData(document.getElementById('categoryForm'));
    
    fetch('../Controllers/CategoryController.php?action=registro', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(result => {
        if (result.includes("Categoría registrada exitosamente")) {
            alert(result);
            updateCategories();
            document.getElementById('categoryForm').reset();
            
        } else {
            alert("Error: " + result);
        }
    })
    .catch(error => console.error('Error:', error));
}

function updateCategories() {
    fetch('../Controllers/CategoryController.php?action=getCategories')
    .then(response => response.json())
    .then(categories => {
        const select = document.getElementById('category-select');
        select.innerHTML = '<option selected disabled>Categoría</option>';
        
        categories.forEach(category => {
            const option = document.createElement('option');
            option.value = category.cat_ID;
            option.textContent = category.cat_name;
            select.appendChild(option);
        });
        
        if ($('.select2').data('select2')) {
            $('#category-select').select2();
        }
    })
    .catch(error => console.error('Error al actualizar las categorías:', error));
}

function SetCheck(){
    
}