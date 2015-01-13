<?php
//$fileinfo = $_FILES['myFile'];
function uploadFile($fileinfo,$allowExt=array('jpeg','jpg','png','gif'),
                    $maxSize = 2097152,$uploadPath = 'uploads',$flag=true)
{
    if (! is_array($allowExt)) {
        exit("系统错误");
    }
    if ($fileinfo['error'] > 0) {
        switch ($fileinfo['error']) {
            case 1:
                $mes = "上传文件过大";
                break;
            case 2:
                $mes = "超过了表单MAX_FILE_SIZE限制的大小";
                break;
            case 3:
                $mes = "文件部分被上传";
                break;
            case 4:
                $mes = "没有选择上传文件";
                break;
            case 6:
                $mes = "没有找到临时目录";
                break;
            case 7:
            case 8:
                $mes = "系统错误";
                break;
        }
        exit($mes);
    }
    $ext = pathinfo($fileinfo['name'], PATHINFO_EXTENSION);
//     $allowExt = array(
//         'jpeg',
//         'jpg',
//         'png',
//         'gif'
//     );
    if (! in_array($ext, $allowExt)) {
        exit('非法文件类型');
    }
//     $maxSize = 2097152; // 2M
    if ($fileinfo['size'] > $maxSize) {
        exit('上传文件过大');
    }

    if (! is_uploaded_file($fileinfo)) {
        exit('文件不是通过HTTP POST上传');
    }
    if($fileinfo){
        if (getimagesize($fileinfo['tmp_name'])){
            exit('不是真实的图片');
        }
    }

    $uniName = md5(uniqid(microtime(true), true));
    if (! file_exists($uploadPath)) {
        mkdir($uploadPath, 0777, true);
        chmod($uploadPath, 0777);
    }
    $destination = $uploadPath . '/' . $uniName;
    if (! @move_uploaded_file($fileinfo['tmp_name'], $destination)) {
        exit('文件移动失败');
    }
    return $destination;

}