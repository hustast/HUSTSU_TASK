
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<title>华中大头像生成器</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="Keywords" content="华中科技大学校徽头像、华中科技校徽头像、华科校徽头像、华中大校徽头像、华科大校徽头像">
	<meta name="Description" content="华中科技大学校徽头像">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
	<!-- bootstrap -->
	<link rel="shortcut icon" href="https://raw.githubusercontent.com/hustast/HustAvatar/master/img/hustico.ico" type="image/x-icon">
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
	</script>
	<link rel="stylesheet" href="cropperjs/cropper.min.css">
    <link rel="stylesheet" type="text/css" href="css/media.css">
</head>
<body>
	<div class="loading">
		<div class="pic">
			<i></i>
			<i></i>
			<i></i>
			<i></i>
			<i></i>
		</div>
	</div>

	<div class="container-fluid" >
	    <!-- 头部模板展示 	 -->
	    <div class="row">
		    <div class="header-box">
				<img class = "col-xs-6" src="img/header.jpg" alt="">
			</div>
		</div>
				<!-- choose 选择模板-->
				<div class="row" >
	                <div class="heading text-center ">
	                    <h4 class="heading-title" style="">请选择你的模板</h3>
	                </div>
            	</div>

					<div class="model" id="model">
                        <button id="Button" onclick="PrintPreview(0)" type="button" class="col-xs-6 btn btn-model" style="background-image: url('img/model00.png');"></button>

	                <button id="Button" onclick="PrintPreview(1)" type="button" class="col-xs-6 btn btn-model" style="background-image: url('img/model01.png');"></button>
	            	</div>

            	<!-- 预览区域　-->
 <div class="row prev-div" style="visibility: hidden;" id="preview">
                    <div class="col-xs-5 chooseimg">
                        <label class="btn btn-r" for="inputImage" title="选择图片" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                            <input onclick="transclass()" type="file" id="inputImage" class="hidden js-uploadfile" />
                            <span>选择图片</span>
                        </label>
                        <br />
                        <button type="button" id="generateImage" class="btn btn-r js-ok">生成头像</button>
                    </div>

                    <div class="img-group col-xs-7" >
                        <!-- 产生前 -->
                        <div class="imgPreview" >
                            <img id="imgpreview" style="background-color: #fff;border: 1px solid rgb(174, 10, 42); ">
                        </div>
                    </div>
                </div>
    </div>
               <!-- 剪裁区 -->
               <div class="row" id="cutter">
                        <div class="container js-container">
                            <img class="js-image" src="">
                        </div>
                </div>
                        <!--产生后-->
            
			<!-- <div style="display: flex;justify-content:center;">
                <div class="js-result"></div>

			</div> -->

<!--	<div class="bottom-image">-->
<!--		<img src="img/foot.png" alt="" >-->
<!--	</div>-->

	<div class="footer-div">
	    <p class="footer">2018 © Powered by HUSTSU && 电信学院科协技术部</p>
	</div>


	<!-- js -->

	<script src="js/jquery-1.10.1.min.js"></script>
    <script src="js/cropper.min.js"></script>
    <script src="js/cropper.smallScreen.js"></script>
	<script type="text/javascript" src="http://libs.baidu.com/jquery/1.9.1/jquery.js"></script>
</body>
</html>
