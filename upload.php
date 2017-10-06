<?php

header('Content-type:text/html;charset=utf-8');
$base64_image_content = $_FILES['filename'];

// 用于测试,
//保存base64字符串为图片

//匹配出图片的格式
if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)) {
	$type     = $result[2];
	$new_file = "./userimg/tmp.{$type}";
	if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))) {
		echo 'path:'.$new_file;
	}
}

?>