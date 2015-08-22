<!-- FOOTER -->
<footer id="footer" class="">
	<div class="colophon">
		<div class="container">
			<div class="row-fluid footer-links">
				<div class="span12">
	                  <?php
	                    wp_nav_menu(
	                      array(
	                        'menu' => 'top-links'
	                        )
	                    );

	                ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span4 social-block pull-left">
					<span class="tc-footer-social-links-wrapper">
						<a class="social-icon icon-twitter" href="https://twitter.com/RCTractors" title="Follow me on Twitter" target="_blank"></a>
						<a class="social-icon icon-facebook" href="https://www.facebook.com/RcTractorsAndConstructionVehicles" title="Follow me on Facebook" target="_blank"></a>
						<a class="social-icon icon-google" href="https://plus.google.com/+RCTractorGuy/posts" title="Follow me on Google+" target="_blank"></a>
						<a class="social-icon icon-youtube" href="https://www.youtube.com/c/RCTractorGuy" title="Follow me on Youtube" target="_blank"></a>
					</span>
				</div>
				<div class="span4 credits">
					<p>© 2015 
						<a href="http://www.rctractorguy.com" title="RC Tractors" rel="bookmark">RC Tractors</a> 
						<br/>Website by Niamherinoc 
					</p>
				</div>
				<div class="span4 backtop">
					<p class="pull-right">
						<a class="back-to-top" href="#">Back to top</a>
					</p>
				</div>                   
			</div><!-- .row-fluid -->
		</div><!-- .container -->
	</div><!-- .colophon -->
</footer>

</div><!-- .site -->

<?php wp_footer(); ?>




</body>
</html>
