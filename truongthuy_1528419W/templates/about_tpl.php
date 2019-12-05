
<div class="row pd0 mg0">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="title_right wow zoomInUp"><h2><?= $title_tcat ?></h2></div>
    </div>
</div>
<div class="row pd0 mg0 ">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="box_content wow fadeInLeftBig">
            <div class="content_text">
                 <?= $noidung_info ?>    
                <div class="clear"></div>
                 <div class="attr-content-social">
            <?php $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
            <p class="attr-left"><?= _chiase ?>:</p>
            <p class="attr-right">
                <a class="tooltip_a share-icon share-facebook" target="_blank" href="http://www.facebook.com/sharer.php?u=<?= $url ?>" title="Facebook"></a>
<!--                <a class="tooltip_a share-icon share-zing" target="_blank" href="http://link.apps.zing.vn/share?u=<?= $url ?>" title="Zing me"></a>-->
                <a class="tooltip_a share-icon share-twitter" target="_blank" href="http://twitter.com/share?url=<?= $url ?>&amp;text=<?= $product_detail["ten"] ?>" title="Twitter"></a>
                <a class="tooltip_a share-icon share-googleplus" target="_blank" href="https://plus.google.com/share?url=<?= $url ?>" title="Google Plus"></a>
                <a class="tooltip_a share-icon share-linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?= $url ?>" title="LinkedIn"></a>
                <a class="tooltip_a share-icon share-email" target="_blank" href="mailto:?Subject=<?= _share ?><?= $product_detail["ten"] ?>&amp;Body=<?= $product_detail["ten"] ?><?= $url ?>" title="Email"></a>
            </p>
        </div><!--end attr-content-->
            </div>
                
        </div>
    </div>
</div>
