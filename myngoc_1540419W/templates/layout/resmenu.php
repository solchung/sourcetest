<script>
    $(document).ready(function () {
        //responsive menu
        $menu = $("#main-nav").clone();
        $menu.removeAttr("id");
        $menu.find(".no-index").remove();
        $("#responsive-menu .content").append($menu);
        $menu = $("#responsive-menu .content ul");
        $menu.find("li").each(function () {
            if ($(this).find("ul").length) {
                $(this).addClass("has-child");
                $(this).find("a").first().append("<span class='toggle-menu'></span>");
            }
        });
        $("#responsive-menu .toggle-menu").click(function () {
            if (!$(this).hasClass("active")) {
                $(this).parent().parent().find("ul").first().slideDown();
                $(this).addClass("active");
            } else {
                $(this).parent().parent().find("ul").first().slideUp();
                $(this).removeClass("active");
            }
            return false;
        });
        
        $("#close_rp").click(function () {
            
                $menu.first().slideUp();
                $menu.removeClass("active");
            
            return false;
        });
        
        $("#responsive-menu .title").click(function () {
            $list = $(this).next().find("ul").first();
            console.log($list.is(":visible"));

            if ($list.is(":visible")) {
                $list.slideUp();
            } else {

                $list.slideDown();
            }
        });
        $("#responsive-menu").attr("data-top", $("#responsive-menu").offset().top);
        $(window).scroll(function () {
            $top = $(window).scrollTop();
            $ele = $("#responsive-menu").attr("data-top");
            if ($top > $ele) {
                $("#responsive-menu").css({position: "fixed", left: "0px", top: "0px"});
            } else {
                $("#responsive-menu").css({position: "relative"});
            }

        });
    });
</script>
<style>
    #close_rp{
        float: right;
        cursor: pointer;
        background: black;
        padding: 5px 20px;
        color: white;
    }
</style>
<div id="responsive-menu" data-top="0" style="display: none">
    <div class="title">
        <div class="wrap">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <div class="clearfix"></div>
        </div>
        MENU
    </div>
    <div class="content">
        <ul>

            <li  class="font_custom <?php if ($source == 'index') echo 'active'; ?>"><a href="" class="font_custom <?php if ($source == 'index') echo 'active'; ?>" ><?=_trangchu?></a>              
            </li>
            
            <li class="font_custom <?php if ($_GET['com'] == 'gioi-thieu') echo 'active'; ?>"><a href="gioi-thieu.html" class="font_custom <?php if ($_GET['com'] == 'gioi-thieu') echo 'active'; ?>"><?= _gioithieu ?></a>   
            
            </li>
			
          
           
                        <?php for ($i = 0; $i < count($list_dichvu); $i++) { ?>
                            <li class="font_custom <?php if ($_GET['idl'] == $list_dichvu[$i]['tenkhongdau_' . $lang]) echo 'active'; ?>"><a  href="dich-vu/<?= $list_dichvu[$i]["tenkhongdau_$lang"] ?>" title="<?= $list_dichvu[$i]["ten_$lang"] ?>" class="font_custom <?php if ($_GET['idl'] == $list_dichvu[$i]['tenkhongdau_' . $lang]) echo 'active'; ?>"><?= $list_dichvu[$i]["ten_$lang"] ?></a>  
                                <?php
                                $d->reset();
                                $sql = "select ten_$lang,tenkhongdau_$lang,id from #_news_cat where hienthi=1 and id_list=" . $list_dichvu[$i]["id"] . " and com='dichvu'  order by stt asc";
                                $d->query($sql);
                                $cat_dichvu = $d->result_array();
                                if (count($cat_dichvu) > 0) {
                                    ?>
                                    <ul>
                                        <?php for ($j = 0; $j < count($cat_dichvu); $j++) { ?>
                                            <li><a href="dich-vu/<?= $list_dichvu[$i]["tenkhongdau_$lang"] ?>/<?= $cat_dichvu[$j]["tenkhongdau_$lang"] ?>"><?= $cat_dichvu[$j]["ten_$lang"] ?></a>
                                            
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>

                            </li> 
                            
                        <?php } ?>
                
			
            <li class="font_custom <?php if ($_GET['com'] == 'tin-tuc') echo 'active'; ?>"><a href="tin-tuc.html" class="font_custom <?php if ($_GET['com'] == 'tin-tuc') echo 'active'; ?>"><?=_tintuc?></a>   
            </li>
            
			 <li class="font_custom <?php if ($_GET['com'] == 'phong-thuy') echo 'active'; ?>"><a href="phong-thuy.html" class="font_custom <?php if ($_GET['com'] == 'phong-thuy') echo 'active'; ?>"><?=_phongthuy?></a>   
            </li>
            
			 <li class="font_custom <?php if ($_GET['com'] == 'bang-gia') echo 'active'; ?>"><a href="bang-gia.html" class="font_custom <?php if ($_GET['com'] == 'bang-gia') echo 'active'; ?>"><?=_banggia?></a>   
            </li>
            

            <li class="font_custom <?php if ($_GET['com'] == 'lien-he') echo 'active'; ?>"><a href="lien-he.html" class="font_custom <?php if ($_GET['com'] == 'lien-he') echo 'active'; ?>"><?= _lienhe ?></a></li>
         
        </ul>
    </div>


    <!--search_frm-->
</div>




