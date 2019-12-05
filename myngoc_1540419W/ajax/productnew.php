<?php

error_reporting(0);
session_start();
$session = session_id();

@define('_template', '../templates/');


@define('_source', '../sources/');
@define('_lib', '../libraries/');



include_once _lib . "config.php";

//Lưu ngôn ngữ chọn vào $_SESSION
$lang_arr = array("vi", "en", "cn", "ge");
if (isset($_GET['lang']) == true) {
    if (in_array($_GET['lang'], $lang_arr) == true) {
        $lang = $_GET['lang'];
        $_SESSION['lang'] = $lang;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
if (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} else {

    $lang = $config["lang_default"];
}

require_once _source . "lang_$lang.php";

include_once _lib . "constant.php";
include_once _lib . "functions.php";
include_once _lib . "functions_giohang.php";
include_once _lib . "library.php";
include_once _lib . "class.database.php";
include_once _lib . "file_requick.php";
include_once _source . "counter.php";
include_once _source . "useronline.php";

$d = new database($config['database']);
$id=magic_quote($_GET['id']);
  $d->reset();
  $sql="select ten_$lang,tenkhongdau_$lang,id,photo,mota_$lang,ngaytao from #_news where hienthi=1 and com='news' and tinnoibat>0 and id_list='".$id."' order by stt asc ";
  $d->query($sql);
  $truyenthong=$d->result_array();
  

?>
	
   
	<div id="bx-pagerdv">
                            <?php 
							
							for ($i =0; $i < count($truyenthong); $i++) { ?>
							<div>
                                <a href="<?= $truyenthong[$i]['tenkhongdau_' . $lang] ?>" title="<?= $truyenthong[$i]['ten_' . $lang] ?>">
                                    <div class="list_tin_nb">
                                        <img src="thumb/170x165/1/<?= _upload_news_l . $truyenthong[$i]["photo"] ?>" alt="<?= $truyenthong[$i]['ten_' . $lang] ?>" > 
                                        <h3><?= $truyenthong[$i]['ten_' . $lang] ?></h3>
                                        <p><?= catchuoi($truyenthong[$i]['mota_' . $lang], 80) ?></p>
										<div class="clear">
										</div>
                                    </div>
                                </a>
								</div>
                            <?php } ?>
							</div>
	
	
	