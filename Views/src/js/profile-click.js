document.getElementById('input-npfp').addEventListener('change', function(event){

    const file=event.target.files[0];
    if(file){
        const preview=document.getElementById('img-preview');
        preview.src=URL.createObjectURL(file);
    }
});