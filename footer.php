<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->
</div>
<div id="pagetop"></div>
<footer id="footer" role="contentinfo">
    &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
    <?php _e('由 <a href="http://www.typecho.org">Typecho</a> 强力驱动'); ?>.<a class="blog_icp" href=http://www.miibeian.gov.cn><?php $this->options->icp() ?></a>
</footer><!-- end #footer -->
<?php $this->footer(); ?>
<?php $this->options->Tongji() ?>
<script src="https://apps.bdimg.com/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<?php if ($this->is('index')): ?>
<script src="<?php $this->options->themeUrl('spark.js'); ?>"></script>
<?php endif; ?>
<script>
(function(_global) {
	$(window).scroll(function(){
		var s=$(window).scrollTop();
		if(s>60){
			$("#pagetop").show();
		}else{
			$("#pagetop").hide();
		}
    });
	$("#pagetop").on('click',function(){
		$('html, body').animate({scrollTop: 0}, 300);
	});
    $('#mobile_menu_open').click(function(){
		$('.mobile_nav_body').fadeIn();
		$('.wikimoe_overlay_black').fadeIn();
	});
	$('#mobile_menu_close').click(function(){
		$('.mobile_nav_body').fadeOut();
		$('.wikimoe_overlay_black').fadeOut();
	});
	$('.wikimoe_overlay_black').click(function(){
		$('.mobile_nav_body').fadeOut();
		$('.wikimoe_overlay_black').fadeOut();
	});
	var home_el = $('.home_goddesses');
    $(window).load(function(){
		$('#loading-wrapper').hide();
		if(home_el.length>0){
			$('.home_goddesses').fadeIn(500);
		}
	});
	if(home_el.length>0){
		$(document).on('mousemove', function(e) {
			var offsetX = e.clientX / window.innerWidth;
			var _left = -40 * offsetX;
			var w = ($(window).width()-1239)/2;
			$('.home_goddesses').css('background-position',w+_left*0.6+'px'+' top');
		});
	}
	if(home_el.length>0){
		$('.page-navigator').on('click','a',function(){
			var href_ = $(this).attr('href');
			$('.page-navigator').fadeOut(200);
			$('.blog_page_loading').fadeIn(200);
			jQuery.ajax({
				type: 'GET',
				url: href_+'?load_type=ajax',
				success: function(res) {
					console.log(res);
					$('#index_blog_content').empty().append(res);
					var page_info_ = $('#index_blog_content').find('.page-navigator').html();
					$('#index_blog_content').find('.page-navigator').remove();
					$('.page-navigator').empty().append(page_info_);
					$('.page-navigator').fadeIn(200);
					$('html, body').animate({scrollTop: ($('#index_blog_content').offset().top)-80}, 300);
					$('.blog_page_loading').fadeOut(200);
				},
				error:function(){
					$('.page-navigator').fadeIn(200);
					$('.blog_page_loading').fadeOut(200);
					alert('获取信息失败');
				}
			});
			return false;
		});
	}
})(this);
</script>
</body>
</html>
