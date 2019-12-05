<div class="container pd0" >
<div class="row pd0 mg0">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  pd0 ">

        <?php
        $d->reset();
        $sql_product = "SELECT count(*) as num, tag FROM table_tag where   com='product' GROUP BY tag ORDER BY num DESC limit 0,20";
        $d->query($sql_product);
        $tags = $d->result_array();

        if (count($tags) > 0) {
            ?>       

            <div class="ct-tags clearfix">
              <span class="title-tag"><i class="fa fa-tags" aria-hidden="true"></i>Tags: </span>

    <?php
    $query = "SELECT count(*) as num, tag FROM table_tag where  com='product' GROUP BY tag ORDER BY num DESC limit 0,20";
    $result = mysql_query($query);
    
	while ($taginfo = mysql_fetch_row($result)) {
        $numtags = $taginfo[0];
        $tagname = $taginfo[1] . "";
        $tagname_phay = $taginfo[1] . " , ";
        $tagurl = $tagname;
        $tagsize = 11 + intval($numtags / 2);
        if ($tagsize > 24)
            $tagsize = 24;
        echo "<a href=\"tag.html/tag=$tagurl/\"><span  style=\"font-size:" . $tagsize . "pt;\">$tagname_phay</span></a> ";
    }
    ?>

            </div><!--end ct-tags-->

        <?php } ?>


    </div><!--end ds-tag-->
</div>
</div>