<div class="session-modal">
        <div class="modal fade modal-popup" id="popup-my-res" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="f">
            <div class="modal-dialog modal-lg" >
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i class="fa fa-times"></i>
					</button>
                    <div class="modal-body">
                        <div class="text-center">
                           <h4>Đăng ký khóa học</h4>
                        </div>
						<div class="newsletter wow flipInX">
				
                <form action="#" method="post" id="subscribe_form" name="subscribe-form">
				<div class="row pd0 mg0 ">
				
			
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pd5">
			
				<input type="text" name="first_name" id="first_name" placeholder="<?= _nameError ?>....." onfocus="if (this.value == '<?= _nameError ?>.....')
						this.value = ''" class="form_newsletter">
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pd5">	
					<input type="email" name="email_newsletter" id="email_newsletter" class="form_newsletter" placeholder="<?= _emailError ?>....." onfocus="if (this.value == '<?= _emailError ?>.....')
						this.value = ''" class="form_newsletter">
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pd5">	
					<input type="text" name="phone_newsletter" id="phone_newsletter" placeholder="<?= _phoneError ?>....." onfocus="if (this.value == '<?= _phoneError ?>.....')
						this.value = ''" class="form_newsletter">
				</div>
				
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">	
					<input type="text" name="diachi_newsletter" id="diachi_newsletter" placeholder="<?= _addressError ?>....." onfocus="if (this.value == '<?= _addressError ?>.....')
						this.value = ''" class="form_newsletter">
				</div>
				
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pd5">
			
				<input type="text" name="khoahoc_name" id="khoahoc_name" placeholder="Tên khóa học....."  class="form_newsletter">
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pd5">	
					<input type="text" name="thoigianbd" id="thoigianbd" placeholder="Thời gian bắt đầu"  class="form_newsletter" >
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pd5">	
					<input type="text" name="thoigiankt" id="thoigiankt" placeholder="Thời gian kết thúc"  class="form_newsletter">
				</div>
				
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
					
						
						<textarea placeholder="Nội dung ..." name="noidung_newsletter" rows="4" col="50" id="noidung_newsletter" class="form_newsletter"></textarea>
				</div>
				
				
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text_center pd5">
                    <input type="submit" value="<?=_dangky?>" name="subscribe-go" id="send_email_newsletter" class="button send_email_newsletter">
				</div>	
				</div>				
		
				
				</div>	
                </form>

                <div class="clear"></div>

             <script type="text/javascript">
                    $(document).ready(function (e) {
						$('#thoigianbd').datepicker({
						  setDate: new Date(),
						  format: 'dd/mm/yyyy',
						  todayHighlight: true,
						  autoclose: true,
						  startDate: '-0m',
						  minDate: 0,
						  onSelect: function(text, dt) {
							$('#thoigiankt').datepicker('option', 'minDate', text);
						  }
						});

						$('#thoigiankt').datepicker({
						  //setDate: new Date(),
						  format: 'dd/mm/yyyy',
						  todayHighlight: true,
						  autoclose: true,
						  startDate: '+1d',
						  minDate: 0,

						});
			
			
        
	
                        $('#send_email_newsletter').click(function () {
							
							var opt = $('#opt');
							
                            var el = $('#email_newsletter');
                            var sex = $('#phone_newsletter');
                            var first_name = $('#first_name');
                            var last_name = $('#last_name');
							var noidung_newsletter = $('#noidung_newsletter');
							
							var diachi_newsletter = $('#diachi_newsletter');
							var khoahoc_name = $('#khoahoc_name');
							var thoigianbd = $('#thoigianbd');
							var thoigiankt = $('#thoigiankt');
							
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
                            } 
							if (khoahoc_name.val() == '') {
                                khoahoc_name.focus();
                                alert('Vui lòng nhập tên khóa học');
                                return false;
                            }
							if (thoigianbd.val() == '') {
                                thoigianbd.focus();
                                alert('Vui lòng chọn thời gian bắt đầu');
                                return false;
                            }if (thoigiankt.val() == '') {
                                thoigiankt.val() == ''.focus();
                                alert('Vui lòng chọn thời gian kết thúc');
                                return false;
                            }
						
						
							else {
								
							grecaptcha.ready(function() {
							grecaptcha.execute('<?=$config_site?>', {action: 'newsletter'}).then(function(token) {
								// add token to form
							$('#subscribe_form').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
								
								$.ajax({
								type: 'POST',
								url: 'ajax/newsletter.php',
								data: 'email=' + el.val() + '&sex=' + sex.val() + '&first_name=' + first_name.val() + '&last_name=' + last_name.val() +'&diachi_newsletter=' + diachi_newsletter.val() + '&noidung=' + noidung_newsletter.val() + '&khoahoc_name=' + khoahoc_name.val() + '&thoigianbd=' + thoigianbd.val() + '&thoigiankt=' + thoigiankt.val() + '&token=' + token,
								success: function (result) {
									if(result==0){
			
											swal({
											  title: "Vượt quá số lần gửi mail. Vui lòng thực hiện lại sau vài phút!",
											  text: "",type: 'error',
											  icon: "error"
											}, function(value){
											  window.location.reload(true); 
											});	
									}else{
										if(result==1){
										
											
											swal({
											  title: "<?=_emailnaydaduocdangky?>!",
											  text: "",type: 'success',
											  icon: "success"
											}, function(value){
											  window.location.reload(true); 
											});	
											
										}else if(result==2){
									
											swal({
											  title: "<?=_bandangkythanhcong?>!",
											  text: "",type: 'success',
											  icon: "success"
											}, function(value){
											  window.location.reload(true); 
											});							
	
									
										}else if(result==3){
									
											swal({
											  title: "<?=_vuilongquaylaisau?>!",
											  text: "",type: 'success',
											  icon: "success"
											}, function(value){
											  window.location.reload(true); 
											});	
											
										}
										
									}
									
								}
								});
								
							});
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
        </div>
    </div>
	 