<?php

header('Content-type:text/html;charset=utf-8');
//$base64_image_content = $_FILES['filename'];

// 用于测试,

$base64_image_content = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAAEsCAYAAAB5fY51AAAgAElEQVR4XuydB5xkR3H/azbnvaC7k045RySCJBBJIoggwIAR2UYII2OMjUwUGAw2YPIfjI0MItskAQbZCCPAYAEiCqGAhHIOJ+l0YcPk+P98q7ve1LybvZ057d7d4i0+fE77et6bnt/7dXV1dXVVptFoNKSNcLlarUqtXtd/kUa9IQMD/TLQ3y+Znp5wLd5eLJakVqtJRjJSrVVlbGxU23t7e/UzhWJRKuWqjIwOS39fX/KNtJXLFSmXy3pv/2C/tvX19Ulv/I52/Vu+tozAHxICjJ1KpSpDQ4N/SD9rwX9LplarNeqNhtQqUSllRKq1mtRrNUEX9ff3qYJCenp6JNODWsno3yiyXC6v/8214ZFhyefyMjY+qorKpFQuSyFfVCXW19e8Xq/XJZvPS6YhMjQ0pPf09IRne0Gp0cfwPaEfy7J4CDBJLU8Wi4fv8pN3HIHM1unpRp8qgKgoMiJ9vb3S198nfb1NSyh8RUOVGAqkVCpJqVRWRYMMDg6o8sIy8rNEtVqT2dlZGR8f0zbuZTZBstm8fhcKTp+uDw/fVBcsr7LOOvp3o578yhUTEzv+i5fvnBeBqZkZ6c0ETozHdzPvTcsf2GEEiqVSWLVkMvr/ZZkbgWWFtcyObRBYVlg7lxTLCqtzvDO1er2BTt+eZmfphlQrVV0uYlmxtBsZGU6WfpVyRVj6cY0lW61qVlROhoeHZSD6piqViuTzBX0e1hmWmQkvDj+XSqYh/X390tvbo9/h+7c8C3X+gnfkk7oEr9fVEh4YaL6fHXnW8j3zI4B/l5VITyYjo6Mj89/wf/gTmbmc7hAWH1WlWlVFhfRkemRgcEBwsI+NjbT4qWamZ2VoeFAJDuGz0bfFkm94OCwbeSaz9+hweCk48FE+XGc5WavXZHQktAV/1u7tq6pXqlLL5qVeKEpxwwPa7+y1N0vuptuluOF+KT8wLbVCgdlA2/pGRqR/zQoZ2nutjB60n4wfe7gM7rVHwHZgQHrHhqUn+gv/D3Nyzp+extuw5oY03mCNtMMbrJVjuwnejBfdfKpUZGhw93C6gzXi+e25TZvnt+c2bZ7fxm3l+YPkd6ZUKjd0FzAunVEe9ToA1iWT6VFf1lB8wSgQ/EpYQhPj4/";
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