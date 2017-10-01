//　点击图片hidden->visible
function PrintPreview(num) {
    document.getElementById('preview').style.visibility='visible';
    if(num === 0) {
        document.getElementById('imgpreview').src = "img/model00.png";
    } else if(num === 1){
        document.getElementById('imgpreview').src = "img/model01.png";
    } else if(num === 2){
        document.getElementById('imgpreview').src = "img/model02.png";
    }
}