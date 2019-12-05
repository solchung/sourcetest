<?php
	error_reporting(0);
	session_start();
	$session=session_id();
	
	@define ( '_template' , '../templates/');
	@define ( '_source' , '../sources/');
	@define ( '_lib' , '../libraries/');
	@define ( _upload_folder , '../media/upload/' );
	
	//Lưu ngôn ngữ chọn vào $_SESSION
	$lang_arr=array("vi","en","ge");
	if (isset($_GET['lang']) == true){
        if (in_array($_GET['lang'], $lang_arr)==true){
            $lang = $_GET['lang'];
            $_SESSION['lang']=$lang;
		  header('Location: '.$_SERVER['HTTP_REFERER']);
        } 
	}
    if(isset($_SESSION['lang'])){
        $lang= $_SESSION['lang'];
    }else{
        $lang="vi";
    }
	require_once _source."lang_$lang.php";	
	include_once _lib."config.php";
    include_once _lib."constant.php";
    include_once _lib."functions.php";
    include_once _lib."class.database.php";
	
	$d = new database($config['database']);
	
	@$id = $_GET['id'];
		
	$d->reset();
	$sql_video = "select * from #_video where id='".$id."' and com='video' order by id desc";
	$d->query($sql_video);
	$row_videeo = $d->result_array();
	

?>

<?php
  $url = $row_videeo[0]["link"];
  preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $matches);

  
?>


<iframe width="100%" height="390" src="https://www.youtube.com/embed/<?=$matches[1]?>" frameborder="0" allowfullscreen></iframe>