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
	$sql_dmsp="select ten_vi as ten,tenkhongdau_$lang as tenkhongdau,id from #_city_item where hienthi =1 and id_cat=".$id." order by stt asc";
	$d->query($sql_dmsp);
	$dmsp_left=$d->result_array();

	

?>

    	<option value=""><?=_phuong?></option>
	<?php
        foreach($dmsp_left as $k=>$dmsp_left_item){
    ?>
        <option value="<?=$dmsp_left_item['id']?>" title="<?=$dmsp_left_item['ten']?>"><?=$dmsp_left_item['ten']?></option>
    <?php   
        }
    ?>
