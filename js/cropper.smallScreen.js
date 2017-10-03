
/*裁剪cropper.js*/
var cropper;
        $(".js-uploadfile").on("change", function () {
            var fr = new FileReader();
            var file = this.files[0];
            if (!/image\/\w+/.test(file.type)) {
                showTips(file.name + "不是图片文件！");
                return false;
            } else if (file.size > 2 * 1024 * 1024) {
                showTips('图片大小不能超过2M');
                return false;
            }
            fr.readAsDataURL(file);
            fr.onload = function () {
                //这里初始化cropper
                console.log(fr);
                $('.js-image').attr('src',fr.result);
                iniCropper()
            };
        });
        
        var croppable = false;
        function iniCropper() {
            var $image = $('.js-image'),
                image = $image[0];            
            cropper = new Cropper(image, {
                dragMode: 'move',
                aspectRatio: 1,
                autoCropArea: 0.65,
                restore: false,
                viewMode: 1,
                guides: false,
                center: false,
                highlight: false,
                cropBoxMovable: true,
                cropBoxResizable: true,
                toggleDragModeOnDblclick: false,
                preview: ".imgPreview",
                ready: function () {
                    croppable = true;
                }
            });
        }


        $('.js-ok').on('click', function () {
            var croppedCanvas;
            var rectCanvas;
            var rectImage;
            if (!croppable) {
                return false;
            }

            var width = 200;
            var length = 200;
            // Crop
            croppedCanvas = cropper.getCroppedCanvas({width: 200, height: 200,});
            //Rect
            rectCanvas = getRectCanvas(croppedCanvas);
            // Show
            rectImage = document.createElement('img');
            rectImage.src = rectCanvas.toDataURL();     
          
            $('.js-result').html('').append(rectImage);
            //var form=document.forms[0];

            //这里连带form里的其他参数也一起提交了,如果不需要提交其他参数可以直接FormData无参数的构造函数
            var formData = new FormData();

            //convertBase64UrlToBlob函数是将base64编码转换为Blob

            //append函数的第一个参数是后台获取数据的参数名,和html标签的input的name属性功能相同
            formData.append("filename", convertBase64UrlToBlob(rectCanvas.toDataURL()));
            //append函数的第一个参数是后台获取数据的参数名,和html标签的input的name属性功能相同



            //ajax 提交form
            return false;//不提交
            $.ajax({
                url: '',
                type: "POST",
                data: formData,
                dataType: "text",
                processData: false,         // 告诉jQuery不要去处理发送的数据  
                contentType: false,        // 告诉jQuery不要去设置Content-Type请求头  
                success: function (res) {
                    var data = JSON.parse(res);
                    if (data.status) {
                        hideLoading();
                        showTips(data.msg);
                        setTimeout(function () {
                            location.href = 'url?t=' + (new Date()).getTime();
                        }, 200);
                    } else {
                        console.log(data);
                    }
                },
                xhr: function () {            //在jquery函数中直接使用ajax的XMLHttpRequest对象  
                    var xhr = new XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = Math.round(evt.loaded * 100 / evt.total);
                            console.log("正在提交..." + percentComplete.toString() + '%');        //在控制台打印上传进度  
                        }
                    }, false);
                    return xhr;
                }
            });
        });
        //绘制矩形canvas
        function getRectCanvas(sourceCanvas) {
            var canvas = document.createElement('canvas');
            var context = canvas.getContext('2d');
            var width = sourceCanvas.width;
            var height = sourceCanvas.height;
            canvas.width = width;
            canvas.height = height;
            context.imageSmoothingEnabled = true;
            context.drawImage(sourceCanvas, 0, 0, width, height);
            context.globalCompositeOperation = 'destination-in';
            context.beginPath();
            context.rect(0, 0, width, height);
            context.fill();
            return canvas;
        }
        /**  
        * 将以base64的图片url数据转换为Blob
        * 用url方式表示的base64图片数据  
        */
        function convertBase64UrlToBlob(urlData) {
            var bytes = window.atob(urlData.split(',')[1]);       //去掉url的头，并转换为byte 
            //处理异常,将ascii码小于0的转换为大于0  
            var ab = new ArrayBuffer(bytes.length);
            var ia = new Uint8Array(ab);
            for (var i = 0; i < bytes.length; i++) {
                ia[i] = bytes.charCodeAt(i);
            }
            return new Blob([ab], { type: 'image/png' });
        }
        //加载进度条
        document.onreadystatechange = function(){

            if(document.readyState == 'complete'){
                $('.loading').fadeOut();
            }
        }
        //照片
        function PrintPreview(num) {
            document.getElementById('preview').style.visibility='visible';
            if(num === 0) {
                document.getElementById('imgpreview').src = "img/model00.png";
            } else if(num === 1){
                document.getElementById('imgpreview').src = "img/model01.png";
            }
         }