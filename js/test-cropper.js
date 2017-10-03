//test-cropper

var cropper = require('cropperjs');

var image = document.getElementById('test');

var cropper = new Cropper(image,
    {
        aspectRatio:16/9,
        crop: function (e) {
            console.log(e.detail.x);
            console.log(e.detail.y);
            console.log(e.detail.width);
            console.log(e.detail.height);
            console.log(e.detail.rotate);
            console.log(e.detail.scaleX);
            console.log(e.detail.scaleY);
        }
    });

alert("get ok?");
print('xkcj ns ');