<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
header('Content-type:text/html;charset=utf-8');

$filename = $_FILES['filename'];
$type = $_POST['type'];

function generate_image($image_path, $image_type, $gen_image_path) {
    $response =  exec('python ./image_process/process.py ./images/'.$image_path.' '.$image_type.' ./images/'.$gen_image_path, $output,$return_var);
}

function randomkeys($length) {
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';    
    //字符池
    $key = '';
    for($i=0; $i<$length; $i++){
        $key .= $pattern{mt_rand(0,50)};    //生成php随机数
    }
    return $key;
}

$random_name = randomkeys(10);
$image_path = $random_name.'.png';
$gen_image_path = $random_name.'gen.png';

move_uploaded_file($filename['tmp_name'],'./images/'.$image_path);

generate_image($image_path, $type, $gen_image_path);

exit(json_encode(['status'=>1,'msg'=>'头像上传成功','gen_image'=>'http://localhost/HustAvatar/images/'.$gen_image_path]));

?>