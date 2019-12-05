<?php
	$d->reset();
	$sqlm = "select toado,ten_$lang as ten,mota_$lang as mota from #_bando where hienthi=1 and com='bando' order by stt,id desc";
	$d->query($sqlm);
	$chinhanh = $d->result_array();
?>

<div class="carlton_map_weather">
	<?php if(!empty($chinhanh)) { ?>
		<div class="ten_chinhanh">
		<ul>
			<?php foreach ($chinhanh as $key => $value) { ?>
				<li data-tab="<?=$key?>"><?=$value['ten']?></li>
			<?php } ?>
		</ul>
		</div>
		<div class="carlton_map_weather_tab">
			<?php foreach ($chinhanh as $key => $value) { ?>
				<section>
					<?=$value['toado']?>
				</section>
			<?php } ?>
		</div>
	<?php } ?>
</div>

<script>
	$(document).ready(function() {
		$('.carlton_map_weather_tab').find('section').eq(0).show();
		$('.carlton_map_weather ul li').click(function(event) {
			$('.carlton_map_weather ul li').removeClass('act');
			$(this).addClass('act');
			$('.carlton_map_weather_tab').find('section').hide();
			$('.carlton_map_weather_tab').find('section').eq($(this).data('tab')).show();
		});
	});
</script>