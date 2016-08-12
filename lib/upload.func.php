<?php
header("content-type:text/html;charset=utf-8");


function uploadFile($fileInfo,$allowExt=array("gif","jpeg","jpg","png","bmp","txt"),$maxSize=1512000){
	//允许上传的文件扩展名
	// $allowExt=array("gif","jpeg","jpg","png","bmp","txt");
	//上传文件大小
	// $maxSize=1512000;
	$imgFlag=true;
	//判断错误信息
	if($fileInfo['error']==UPLOAD_ERR_OK){
		$ext=getExt($fileInfo['name']);//获取文件扩展名
		$filename=getUniName().".".$ext;
		//限制上传文件类型
		if(!in_array($ext, $allowExt)){
			exit("非法文件类型");
		}
		//限制上传文件大小
		if($fileInfo['size']>$maxSize){
			exit("文件过大");
		}
		//木马检测
		// if($imgFlag){
		// 	//如何验证图片是真真的图片类型
		// 	$info=getimagesize($tmp_name);
		// 	// var_dump($info);
		// 	if(!info){
		// 		exit("不是真正的图片类型");
		// 	}
		// }
		//判断文件是否通过HTTP POST方式上传
		$destination="../uploads/".$filename;
		// var_dump($destination);
		if(is_uploaded_file($fileInfo['tmp_name'])){
			if(move_uploaded_file($fileInfo['tmp_name'], $destination))
			{
				$mes=$destination;
			}
			else{
				$mes="文件移动失败";
			}
		}else{
			$mes="文件不是通过HTTP POST方式上传上来的";
		}
	}else{
		switch($fileInfo['error']){
			case 1:
				$mes="超过了配置文件上传文件的大小";//UPLOAD_ERR_INI_SIZE
				break;
			case 2:
				$mes="超过了表单设置上传文件的大小";			//UPLOAD_ERR_FORM_SIZE
				break;
			case 3:
				$mes="文件部分被上传";//UPLOAD_ERR_PARTIAL
				break;
			case 4:
				$mes="没有文件被上传";//UPLOAD_ERR_NO_FILE
				break;
			case 6:
				$mes="没有找到临时目录";//UPLOAD_ERR_NO_TMP_DIR
				break;
			case 7:
				$mes="文件不可写";//UPLOAD_ERR_CANT_WRITE;
				break;
			case 8:
				$mes="由于PHP的扩展程序中断了文件上传";//UPLOAD_ERR_EXTENSION
				break;
			}
	}
	return $mes;
}

?>


