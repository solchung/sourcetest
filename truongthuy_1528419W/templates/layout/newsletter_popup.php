<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="myModalnewsletter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class=" modal-dialog" role="document">
    <div class="modal-content">
		  <div class="modal-header">
			<?=_dangkynhantin?>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			
		  </div>
		<div class="modal-body">
        	<div class="newsletter ">
				
                <form action="#" method="post" id="subscribe_form" name="subscribe-form">
			
				
                    <input type="text" name="first_name" id="first_name" placeholder="<?= _nameError ?>....." onfocus="if (this.value == '<?= _nameError ?>.....')
                        this.value = ''" class="form_newsletter">

					<input type="email" name="email_newsletter" id="email_newsletter" class="form_newsletter" placeholder="<?= _emailError ?>....." onfocus="if (this.value == '<?= _emailError ?>.....')
                        this.value = ''" class="form_newsletter">
					
					<textarea placeholder="<?= _noidung ?>" name="noidung_newsletter" id="noidung_newsletter" class="form_newsletter" rows="5" col="50" id="noidung" style="height:80px;"></textarea>

					<div class="clearfix">
						<input type="submit" value="Gửi" name="subscribe-go" id="send_email_newsletter" class="button">
					</div>	
			
                </form>

                <div class="clear"></div>

                <script type="text/javascript">
                    $(document).ready(function (e) {
                        $('#send_email_newsletter').click(function () {
							
							var opt = $('#opt');
							
                            var el = $('#email_newsletter');
                            var sex = $('#phone_newsletter');
                            var first_name = $('#first_name');
                            var last_name = $('#last_name');
							var noidung_newsletter = $('#noidung_newsletter');
							
							var diachi_newsletter = $('#diachi_newsletter');
							var tieude_newsletter = $('#tieude_newsletter');
							
                            var emailRegExp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$/;
							if (first_name.val() == '') {
                                first_name.focus();
                                alert('<?= _nameError ?>');
                                return false;
                            }
                            if (el.val() == '') {
                                el.focus();
                                alert('<?= _emailError ?>');
                                return false;
                            }
						
                            if (!emailRegExp.test(el.val())) {
                                el.focus();
                                alert('<?= _emailError1 ?>');
                            } else {
								
								swal({
								  title: "<?=_xacnhanma?>",
								  text: "<?=$number1?> <?=$pt?> <?=$number2?> =",
								  type: "input",
								  showCancelButton: true,
								  closeOnConfirm: false,
								  animation: "slide-from-top",
								  inputPlaceholder: "<?=_nhapmacapcha?>"
								  }, function (inputValue) {
								  if (inputValue === false) return false;
								  if (inputValue === "") {
									swal.showInputError("<?=_bancannhapmavao?>");
									return false
								  }
								  if( inputValue === opt.val() ){
								 
								   $.ajax({
                                    type: 'POST',
                                    url: 'ajax/newsletter.php',
                                    data: 'email=' + el.val() + '&sex=' + sex.val() + '&first_name=' + first_name.val() + '&last_name=' + last_name.val() + '&noidung=' + noidung_newsletter.val()+ '&diachi=' + diachi_newsletter.val()+ '&tieude=' + tieude_newsletter.val(),
                                    success: function (result) {
                                    
										 swal(result+"!", "", "success");
                                    }
									});
									
								  }else{
									swal.showInputError("<?=_ketquasai?>");
									 return false
								  }
								
								});
								
								
                               
                            }
                            return false;
                        });
                    });
                </script>


            </div>
		</div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $("#myModalnewsletter").on("show.bs.modal", function(e) {
        var link = $(e.relatedTarget);
		$(".loading-cart").fadeIn();
	
		$(this).find(".modal-body").load(link.attr("href")); 	
        setTimeout(function(){ $(".loading-cart").fadeOut(); },1000);
    });
   
  });
</script>