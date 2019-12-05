<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="myModalqick" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class=" modal-dialog" role="document">
    <div class="modal-content">
		  <div class="modal-header">
			<?=_bangdutinhchiphi?>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			
		  </div>
		<div class="modal-body">
        
		</div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $("#myModalqick").on("show.bs.modal", function(e) {
        var link = $(e.relatedTarget);
		$(".loading-cart").fadeIn();
	
		$(this).find(".modal-body").load(link.attr("href")); 	
        setTimeout(function(){ $(".loading-cart").fadeOut(); },1000);
    });
   
  });
</script>