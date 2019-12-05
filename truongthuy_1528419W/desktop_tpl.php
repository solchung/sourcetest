<!Doctype html>
<html  xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" lang="vi"><!--<![endif]-->
    <head  prefix="og: http://ogp.me/ns#; dcterms: http://purl.org/dc/terms/#">
        <base href="<?=$http.$config_url?>/" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php
            if (isset($title_bar))
                echo $title_bar;
            else
                echo $row_setting["title_$lang"];
            ?></title>
        <meta name="viewport" content="width=1349, initial-scale=no">
        <meta name="robots" content="index, follow" />


        <meta name="author" content="<?= $row_setting["author_web"] ?>">
        <meta name="keywords" content="<?= $row_setting["keywords_$lang"] ?>" />
        <meta name="description" content="<?= $row_setting["description_$lang"] ?>" />



        <meta http-equiv="Content-Language" content="vi" />
        <meta name="Language" content="vietnamese" />

        <meta property="og:locale" content="vi_VN" />
        <meta property="og:type" content="<?=$type_og?>" />
        <meta property="og:title" content="<?= $title_bar ?>" />
        <meta property="og:image" content="<?= $image ?>" />
        <meta property="article:publisher" content="<?= $row_setting["fanpage"] ?>" />
        <meta property="og:site_name" content="<?= $row_setting["ten_$lang"] ?>"/>
        <meta property="og:url" content="<?= getCurrentPageURL(); ?>" />
        <meta property="og:description" content="<?= $description_web ?>" />

        <meta property="dcterms:title" content="<?= $title_bar ?>" />
        <meta property="dcterms:identifier" content="<?= getCurrentPageURL(); ?>" />
        <meta property="dcterms:description" content="<?= $description_web ?>" />
        <meta property="dcterms:subject" content="<?= $row_setting["keywords_$lang"] ?>" />


        <meta itemprop="name" content="<?= $row_setting["title_$lang"] ?>">
        <meta property="twitter:title" content="<?= $title_bar ?>">
        <meta property="twitter:url" content="<?= getCurrentPageURL(); ?>">
        <meta property="twitter:card" content="summary">    

        <?= $row_setting["geo_meta"]; ?>


        <link rel="canonical" href="<?= getCurrentPageURL(); ?>" />	

        <link rel="shortcut icon" href="<?= _upload_hinhanh_l . $row_setting["favicon"] ?>">


        <?php include _template . "layout/style_web.php"; ?>

       
        <script type="text/javascript" src="js/jquery-1.11.1.min.js" ></script>
		
        
        <?= $row_setting["code_analytics"]; ?>

		<h1 style="display:none;"><?= $row_setting["title_$lang"]; ?></h1>
		<h2 style="display:none;"><?= $row_setting["title_$lang"]; ?></h2>
		<script src="https://www.google.com/recaptcha/api.js?render=<?=$config_site?>"></script>
		<?php if($source=='contact') {?>
		<script>
        grecaptcha.ready(function () {
            grecaptcha.execute('<?=$config_site?>', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
		</script>
		<?php }?>
</head>    

<style type="text/css">
<?php
$d->reset();
$sql_mau = "select * from #_background where com='bg_header' ";
$d->query($sql_mau);
$bg_header_option = $d->fetch_array();
$bg = "";
if ($bg_header_option['chonbg'] == 1)
    $bg.=" url(" . _upload_background_l . $bg_header_option['photo'] . ")";

if ($bg_header_option['repeat1'] == 0)
    $bg.=" repeat";
else if ($bg_header_option['repeat1'] == 1)
    $bg.=" repeat-x";
else if ($bg_header_option['repeat1'] == 2)
    $bg.=" repeat-y";
else if ($bg_header_option['repeat1'] == 3)
    $bg.=" no-repeat";

if ($bg_header_option['vitri'] == 1)
    $bg.=" top";
else if ($bg_header_option['vitri'] == 2)
    $bg.=" right";
else if ($bg_header_option['vitri'] == 3)
    $bg.=" bottom";
else if ($bg_header_option['vitri'] == 4)
    $bg.=" left";
else if ($bg_header_option['vitri'] == 5)
    $bg.=" center";

if ($bg_header_option['vitri1'] == 1)
    $bg.=" top";
else if ($bg_header_option['vitri1'] == 2)
    $bg.=" right";
else if ($bg_header_option['vitri1'] == 3)
    $bg.=" bottom";
else if ($bg_header_option['vitri1'] == 4)
    $bg.=" left";
else if ($bg_header_option['vitri1'] == 5)
    $bg.=" center";

if ($bg_header_option['fixed'] == 1)
    $bg.=" fixed";


$d->reset();
$sql_mau = "select * from #_background where com='bg_footer' ";
$d->query($sql_mau);
$bg_footer_option = $d->fetch_array();
$bg_footer = "";
if ($bg_footer_option['chonbg'] == 1)
    $bg_footer.=" url(" . _upload_background_l . $bg_footer_option['photo'] . ")";

if ($bg_footer_option['repeat1'] == 0)
    $bg_footer.=" repeat";
else if ($bg_footer_option['repeat1'] == 1)
    $bg_footer.=" repeat-x";
else if ($bg_footer_option['repeat1'] == 2)
    $bg_footer.=" repeat-y";
else if ($bg_footer_option['repeat1'] == 3)
    $bg_footer.=" no-repeat";

if ($bg_footer_option['vitri'] == 1)
    $bg_footer.=" top";
else if ($bg_footer_option['vitri'] == 2)
    $bg_footer.=" right";
else if ($bg_footer_option['vitri'] == 3)
    $bg_footer.=" bottom";
else if ($bg_footer_option['vitri'] == 4)
    $bg_footer.=" left";
else if ($bg_footer_option['vitri'] == 5)
    $bg_footer.=" center";

if ($bg_footer_option['vitri1'] == 1)
    $bg_footer.=" top";
else if ($bg_footer_option['vitri1'] == 2)
    $bg_footer.=" right";
else if ($bg_footer_option['vitri1'] == 3)
    $bg_footer.=" bottom";
else if ($bg_footer_option['vitri1'] == 4)
    $bg_footer.=" left";
else if ($bg_footer_option['vitri1'] == 5)
    $bg_footer.=" center";

if ($bg_footer_option['fixed'] == 1)
    $bg_footer.=" fixed";
?>

			
	

</style>	
	
<body >

	<div id="notice_cart"></div>
	<?php if($row_setting["api"]!=""){ ?>
	 <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=<?=$row_setting["api"];?>">
	 </script>
	<?php }?>
        
        
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
	</script>
	
	


    <div class="container_s">
        <div class="container-fluid pd0">
            <div id="main_header_s">

                <div class="row pd0 mg0 ">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
						
                        <div class="">
						<?php include _template . "layout/slideranh.php"; ?>
                        </div>
                    </div>
                </div>

            </div> 
	
            <div id="main_container_s">
					
					<div class="row pd0 mg0 clearfix">						
						<?php if($template=='product_detail') {?>					
							<div class="container ">	
						
							
									<?php include _template . $template . "_tpl.php"; ?>
								
							</div>	
							
						<?php }else if($source=='index' ) {?>   
					
									<?php include _template . $template . "_tpl.php"; ?>
								
																
						<?php } else {?>	
							<div class="container ">	
							
									<?php include _template . $template . "_tpl.php"; ?>
								
							</div>	
							
					    <?php }?> 
						 			
					</div>
		
			
            </div>
		
			<?php if($source=="index"){?>

            <div id="main_other_s">  
					
					
               <?php include _template . "layout/news_video.php"; ?> 
				
            </div>
			<?php }?>

			
            <div id="footer_s" class="clearfix">
                <div class="">
                    <?php include _template . "layout/footer.php"; ?> 
                </div>
            </div>
        </div>
    </div>

	

    <?php include _template . "layout/back-top.php"; ?> 

	
    <?php include _template . "layout/chat.php"; ?> 
	

	
    <?= $row_setting["codechat"]; ?>
	<?php include_once _template.'layout/json_strucdata.php'; ?>
	
     <script type="text/javascript">
            jQuery(document).ready(function () {
				 
                $(window).scroll(function () {
                    if ($(window).scrollTop() > 50) {
                        $('.banner_menu').addClass("menufix");
						$('.phone-info').addClass("fix_phone");
					
                    } else {
                        $('.banner_menu').removeClass("menufix");
						$('.phone-info').removeClass("fix_phone");
                    }
                });
			
            });
    </script>
	
	

	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="js/wow.min.js"></script>
	<!-- <script>              new WOW().init();</script>-->
	<script type="text/javascript" src="js/jquery-migrate-1.2.1.js" ></script>
	<script type="text/javascript" src="js/my_srcipt_gaconit91_full.js" ></script>  
	<script type="text/javascript" src="js/jquery.hoverIntent.minified.js"></script>
	
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/jquery.cycle.all.js"></script>

	<script type="text/javascript" src="js/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
	
	<script type="text/javascript" src="js/ddsmoothmenu.js"></script>

	<script type="text/javascript">
		ddsmoothmenu.init({
			mainmenuid: "smoothmenu1", //Menu DIV id
			orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
			classname: 'ddsmoothmenu', //class added to menu's outer DIV
		   
			contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
			})


	</script>

	<script type="text/javascript" src="js/slick.min.js"></script>
	<script type="text/javascript" src="js/magiczoomplus/magiczoomplus.js"></script>
	<script src="js/sweet/sweetalert.js"></script>



</body>

</html>
