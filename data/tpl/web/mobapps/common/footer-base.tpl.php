<?php defined('IN_IA') or exit('Access Denied');?><script type="text/javascript">
		require(['bootstrap']);
		$('.js-clip').each(function(){
			util.clip(this, $(this).attr('data-url'));
		});
	</script>
<!--main content end-->
</section>
<script src="./themes/mobapps/static/js/jquery.nicescroll.js" type="text/javascript"></script>
<script type="text/javascript">
    //    sidebar toggle
        $(function() {
            function responsiveView() {
                var wSize = $(window).width();
                if (wSize <= 768) {
                    $('#container').addClass('sidebar-close');
                    $('#sidebar > ul').hide();
					$('#submemu').hide();
                }
    
                if (wSize > 768) {
                    $('#container').removeClass('sidebar-close');
                    $('#sidebar > ul').show();
					$('#submemu').show();
                }
            }
            $(window).on('load', responsiveView);
            $(window).on('resize', responsiveView);
        });
    
        $('.icon-reorder').click(function () {
            if ($('#sidebar > ul').is(":visible") === true) {
                $('#main-content').css({
                    'margin-left': '0px'
                });
				$('.subcontentwarp').css({
                    'width': '100%'
                });
                $('#sidebar').css({
                    'margin-left': '-120px'
                });
                $('#sidebar > ul').hide();
				$('#submemu').hide();
                $("#container").addClass("sidebar-closed");
            } else {
                $('#main-content').css({
                    'margin-left': '120px'
                });
				$('.subcontentwarp').removeAttr("style");
                $('#sidebar > ul').show();
				$('#submemu').show();
                $('#sidebar').css({
                    'margin-left': '0'
                });
                $("#container").removeClass("sidebar-closed");
            }
        });
    
    // custom scrollbar
    $("html").niceScroll({styler:"fb",cursorcolor:"#e8403f", cursorwidth: '6', cursorborderradius: '10px',autohidemode: false, background: '#404040', cursorborder: '0', zindex: '1000'});
	
	var h = document.documentElement.clientHeight;
	$("#container").css('min-height',h-30);	
	$(window).resize(function() {
		var h = document.documentElement.clientHeight;
		$("#container").css('min-height',h-30);
	});
	
    </script>
</body>
</html>
