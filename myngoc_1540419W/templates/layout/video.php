<?php

$d->reset();
$sql = "select ten_$lang as ten,tenkhongdau_$lang as tenkhongdau,id,photo,mota_$lang as mota,link from #_video where hienthi=1 and com='video' order by stt asc";
$d->query($sql);
$result_list = $d->result_array();
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
        <div class="video">

		<script type="text/javascript">
            $(window).load(function () {
                $("#listVideo").change(function () {
                    $("#video-iframe").attr("src", "http://www.youtube.com/embed/" + $(this).val());
                });
            });

        </script>
        <div class="ajax_video">
            <iframe width="100%" height="290" id="video-iframe" src="http://www.youtube.com/embed/<?= $result_list[0]['link'] ?>" frameborder="0" allowfullscreen></iframe>
			
			<div class="box_select_video">
            <select  style="width: 100%;height: 30px;" name="listVideo" id="listVideo">
                <?php for ($i = 0; $i < count($result_list); $i++) { ?>
                    <option  value="<?= $result_list[$i]['link'] ?>"><?= $result_list[$i]['ten'] ?></option>
                <?php } ?>  
            </select> 
			</div>
        </div> 
        </div>
    </div><!--------end_video-------->
    

