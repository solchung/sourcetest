<div class="toolbar">
	<ul>
		<li>
			<a target="_blank" id="goidien" href="tel:<?= $row_setting["hotline"] ?>" title="title">
				<i class="fas fa-phone-volume element-animation"></i>
				<span>Gọi điện</span>
			</a>
		</li>
	
		<li>
			<a target="_blank" id="chatzalo" href="https://zalo.me/<?= $row_setting["zalo"] ?>" title="title">
				<img src="images/icon-t3.png" alt="images">
				<span>zalo</span>
			</a>
		</li>
		<li>
						<a target="_blank" id="chatfb" href="https://www.messenger.com/t/<?= get_name_face($row_setting["fanpage"]) ?>" title="title">
				<i class="fab fa-facebook-messenger "></i>
				<span>facebook</span>
			</a>
		</li>
		<li>
			<a target="_blank" id="sms" href="<?= $row_setting["skype"] ?>" title="title">
				<i class="fas fa-map-marked-alt"></i>
				<span>Map</span>
			</a>
		</li>
	</ul>
</div>


<div class="phone-info"><span><a href="tel:<?=$row_setting["hotline"]?>"><div class="title hidden-xs">Hotline 24/7</div><div class="number hidden-xs"><?=$row_setting["hotline"]?></div></a></span></div>

<style type="text/css">
	.wrap-giohang{
		position:fixed; bottom:180px; right:10px;z-index:9999;
		
	}
	.wrap-yh{ width:370px; position:fixed; top:350px; right:-325px; transition:right 1s; -webkit-transition:right 1s; -moz-transition:right 1s;z-index:999; }
	.wrap-yh:hover{ right:0px;z-index:999;}
	
	.wrap-zalo{ width:45px; position:fixed; top:150px; right:0px; transition:right 1s; -webkit-transition:right 1s; -moz-transition:right 1s;z-index:9999; }
	
	
	.yh-tit{
      width: 46px;
      float: left;
      margin-top: 0px;
	}
	.yh-box{ width:322px; float:left; box-sizing:border-box; -webkit-box-sizing:border-box; -moz-box-sizing:border-box; background:#FFF; min-height:194px; padding:10px;}
	.yh-li{ margin-bottom:5px; font-size:16px; font-weight:bold;}
	.yh-li img{ vertical-align:middle;}
</style>	
<a href="https://zalo.me/<?=$row_setting["zalo"]?>" target="_blank"  title="<?=$row_setting["zalo"]?>">
	<div class="wrap-giohang">		
			<div class="yh-zalo"><img  src="images/i_zalo.png" alt="wechat"/></div>
			</div>		
	</div>
</a>

<div class="js-facebook-messenger-box onApp rotate bottom-right cfm rubberBand animated" data-anim="rubberBand">
  <svg id="fb-msng-icon" data-name="messenger icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30.47 30.66"><path d="M29.56,14.34c-8.41,0-15.23,6.35-15.23,14.19A13.83,13.83,0,0,0,20,39.59V45l5.19-2.86a16.27,16.27,0,0,0,4.37.59c8.41,0,15.23-6.35,15.23-14.19S38,14.34,29.56,14.34Zm1.51,19.11-3.88-4.16-7.57,4.16,8.33-8.89,4,4.16,7.48-4.16Z" transform="translate(-14.32 -14.34)" style="fill:#fff"></path></svg>
  <svg id="close-icon" data-name="close icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39.98 39.99"><path d="M48.88,11.14a3.87,3.87,0,0,0-5.44,0L30,24.58,16.58,11.14a3.84,3.84,0,1,0-5.44,5.44L24.58,30,11.14,43.45a3.87,3.87,0,0,0,0,5.44,3.84,3.84,0,0,0,5.44,0L30,35.45,43.45,48.88a3.84,3.84,0,0,0,5.44,0,3.87,3.87,0,0,0,0-5.44L35.45,30,48.88,16.58A3.87,3.87,0,0,0,48.88,11.14Z" transform="translate(-10.02 -10.02)" style="fill:#fff"></path></svg>
</div>
<div class="js-facebook-messenger-container">
    <div class="js-facebook-messenger-top-header"><span>Chat fanpage</span></div>
    <div class="fb-page" data-tabs="messages" data-href="<?=$row_setting['fanpage']?>" data-width="320" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
</div>
<script>
jQuery(document).ready(function(){jQuery(".js-facebook-messenger-box").on("click",function(){jQuery(".js-facebook-messenger-box, .js-facebook-messenger-container").toggleClass("open"),jQuery(".js-facebook-messenger-tooltip").length&&jQuery(".js-facebook-messenger-tooltip").toggle()}),jQuery(".js-facebook-messenger-box").hasClass("cfm")&&setTimeout(function(){jQuery(".js-facebook-messenger-box").addClass("rubberBand animated")},3500),jQuery(".js-facebook-messenger-tooltip").length&&(jQuery(".js-facebook-messenger-tooltip").hasClass("fixed")?jQuery(".js-facebook-messenger-tooltip").show():jQuery(".js-facebook-messenger-box").on("hover",function(){jQuery(".js-facebook-messenger-tooltip").show()}),jQuery(".js-facebook-messenger-close-tooltip").on("click",function(){jQuery(".js-facebook-messenger-tooltip").addClass("closed")}))});
</script>
<style type="text/css">
.js-facebook-messenger-container.closed,.js-facebook-messenger-tooltip.closed{display:none!important}.js-facebook-messenger-tooltip{bottom:97px;right:97px}.js-facebook-messenger-tooltip{color:#404040;background:#fff}.js-facebook-messenger-box,.js-facebook-messenger-button,.js-facebook-messenger-tooltip{z-index:999}.js-facebook-messenger-tooltip{display:none;position:fixed;text-align:center;border-radius:10px;overflow:hidden;font-size:12px;line-height:1;padding:10px;border:1px solid rgba(0,0,0,0.1);box-shadow:rgba(0,0,0,0.15) 0 2pt 10pt;z-index:1.0E+30}.js-facebook-messenger-close-tooltip{width:10px;height:10px;display:inline-block;cursor:pointer;margin-left:10px}.js-facebook-messenger-box.rubberBand{-webkit-animation-name:rubberBand;animation-name:rubberBand}.js-facebook-messenger-box.animated{-webkit-animation-duration:1s;animation-duration:1s;-webkit-animation-fill-mode:both;animation-fill-mode:both}.js-facebook-messenger-box{bottom:245px;right:0}.js-facebook-messenger-box{background:#1182fc}.js-facebook-messenger-box,.js-facebook-messenger-button,.js-facebook-messenger-tooltip{z-index:999}.js-facebook-messenger-box{width:60px;height:60px;display:block;position:fixed;cursor:pointer;text-align:center;line-height:60px;background:#1182FC;border-radius:100%;overflow:hidden;-webkit-box-shadow:1px 1px 4px 0 rgba(0,0,0,0.3);-moz-box-shadow:1px 1px 4px 0 rgba(0,0,0,0.3);box-shadow:1px 1px 4px 0 rgba(0,0,0,0.3)}.js-facebook-messenger-box.rotate svg#fb-msng-icon{transform:rotate(0deg)}.js-facebook-messenger-box svg#fb-msng-icon{width:30px;height:30px;position:absolute;top:12px;left:12px;opacity:1;overflow:hidden;-webkit-transition:opacity 160ms ease-in-out,transform 160ms ease-in-out;-moz-transition:opacity 160ms ease-in-out,transform 160ms ease-in-out;-o-transition:opacity 160ms ease-in-out,transform 160ms ease-in-out;transition:opacity 160ms ease-in-out,transform 160ms ease-in-out}.js-facebook-messenger-box.rotate svg#close-icon{transform:rotate(-45deg)}.js-facebook-messenger-box svg#close-icon{opacity:0;width:20px;height:20px;position:absolute;top:17px;left:17px;-webkit-transition:opacity 160ms ease-in-out,transform 160ms ease-in-out;-moz-transition:opacity 160ms ease-in-out,transform 160ms ease-in-out;-o-transition:opacity 160ms ease-in-out,transform 160ms ease-in-out;transition:opacity 160ms ease-in-out,transform 160ms ease-in-out}.js-facebook-messenger-container{transform:translateY(50px);bottom:110px;right:65px}.js-facebook-messenger-container,.js-facebook-messenger-container-button{z-index:1000}.js-facebook-messenger-container{position:fixed;opacity:0;border-radius:10px;pointer-events:none;box-shadow:0 1px 6px rgba(0,0,0,0.06),0 2px 32px rgba(0,0,0,0.16);-webkit-transition:transform 160ms ease-in-out,opacity 160ms ease-in-out;-moz-transition:transform 160ms ease-in-out,opacity 160ms ease-in-out;-o-transition:transform 160ms ease-in-out,opacity 160ms ease-in-out;transition:transform 160ms ease-in-out,opacity 160ms ease-in-out}.js-facebook-messenger-top-header{width:300px}.js-facebook-messenger-top-header{color:#fff;background:var(--color_chat)}.js-facebook-messenger-top-header{display:block;position:relative;width:300px;background:#1182FC;color:#fff;text-align:center;line-height:1;padding:10px;font-size:14px;border-top-left-radius:10px;border-top-right-radius:10px}.js-facebook-messenger-container iframe,.js-facebook-messenger-container-button iframe{border-bottom-left-radius:10px;border-bottom-right-radius:10px}.js-facebook-messenger-box,.js-facebook-messenger-button,.js-facebook-messenger-tooltip{z-index:999}.js-facebook-messenger-container,.js-facebook-messenger-container-button{z-index:1000}.js-facebook-messenger-top-header{color:#fff;background:var(--color_chat)}.js-facebook-messenger-box{background:var(--color_chat)}.js-facebook-messenger-top-header{width:300px}.js-facebook-messenger-tooltip{color:#404040;background:#fff}.js-facebook-messenger-box{bottom:70px;right:15px}.js-facebook-messenger-container{transform:translateY(50px);bottom:135px;right:35px}.js-facebook-messenger-container.open{transform:translateY(0px);opacity:1;pointer-events:all}.js-facebook-messenger-tooltip{bottom:97px;right:97px}.js-facebook-messenger-box.open svg#fb-msng-icon{opacity:0}.js-facebook-messenger-box.rotate.open svg#close-icon{transform:rotate(0deg)}.js-facebook-messenger-box.open svg#close-icon{opacity:1}
</style>

<?/**
<link rel="stylesheet" id="messenger-css" href="js/facebook/messenger.css" type="text/css" media="all">
<script src="https://cdn.rawgit.com/admsev/jquery-play-sound/master/jquery.playSound.js"></script>
<script>

	jQuery(document).ready(function(){
		var clickedOnce = false;
		$(".facebook-messenger-avatar").click(function(){
			if(!clickedOnce) {
				clickedOnce = true;
				$.playSound("http://<?=$config_url?>/js/facebook/facebook_messenger");
			}
		})
	});
	
</script> 
<!-- JS BLOCK-->
<div class="drag-wrapper">
   <div data-drag="data-drag" class="thing" style="transform: translate(1190px, 20px);">
      <a class="drag_messenger_button toby_tooltip" title="Chat Facebook" data-toggle="tooltip">
         <div class="circle facebook-messenger-avatar">
            <img class="facebook-messenger-avatar" src="js/facebook/msg-icon.png">
         </div>
      </a>
      <div class="content" style="display: none; max-height: 563px;">
         <div class="inside" id="fbmessenger_content">
            <div class="arrow"></div>
            <div class="fb-page" data-href="<?=$row_setting['fanpage']?>" data-tabs="messages" data-width="310" data-height="270" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?=$row_setting['fanpage']?>" class="fb-xfbml-parse-ignore"><a href="<?=$row_setting['fanpage']?>">Facebook</a></blockquote></div>
         </div>
      </div>
   </div>
   <div class="magnet-zone">
      <div class="magnet"></div>
   </div>
</div>
<div id="messenger_bg"> </div>

<script type="text/javascript" src="js/facebook/popup.js"></script>
<script type="text/javascript" src="js/facebook/jquery.event.move.js"></script>
<script type="text/javascript" src="js/facebook/rebound.min.js"></script>
<script type="text/javascript" src="js/facebook/index.js"></script>

**/?>