<style>
    #back-top{
        width: 40px;height: 42px;
        background: url('images/icon_top.png')no-repeat top left;background-size:cover;
        position: fixed;
        bottom: 15px;right: 10px;
		cursor:pointer;z-index:9;
    }
</style>

<script>
 $(document).ready(function() {
           
          $(window).scroll(function() {
            if($(window).scrollTop() != 0) {
                $('#back-top').fadeIn();
            } else {
                $('#back-top').fadeOut();
            }
          });
          $('#back-top').click(function() {
            $('html, body').animate({scrollTop:0},500);
          });
        });
</script>
<p id="back-top" style="display: none;"> <a href="javascript:void(0)" title="Quay về trang chủ"><span></span></a> </p>  



