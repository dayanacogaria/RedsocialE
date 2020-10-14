


$(document).ready(function() {
    $("#input-b9").fileinput({
        showPreview: false,
        showUpload: false,
        elErrorContainer: '#kartik-file-errors',
        allowedFileExtensions: ["jpg", "png", "gif"]
        //uploadUrl: '/site/file-upload-single'
    });
});


$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})


document.getElementById('input-b9').addEventListener('change',()=>{
    let x = document.getElementById('input-b9').value;
    if (x!= undefined || x!= ''){
        x.disabled = true;
       
    }else{
        return;
    }
})


__Remove = (obj)=>{
   let element=  obj.parentNode.parentElement.parentElement;
    element.parentNode.removeChild(element);
    document.getElementById('__alert').style.display= '';
    setTimeout(() => {
        document.getElementById('__alert').style.display= 'none';
    }, 1000);
}
