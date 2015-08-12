<?php
/*
Template Name: Blog Template
*/

get_header(); ?>


<div id="main-wrapper" class="container">

	<div class="tc-hot-crumble container" role="navigation">
		<div class="row">
			<div class="span12">
				<div class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb">
					<span class="trail-begin">
						<a href="http://www.rctractorguy.com" title="RC Tractors" rel="home" class="trail-begin">Home</a>
					</span>
					<span class="sep">»</span>
					<span class="trail-end"><?php the_title(); ?></span>
				</div>
			</div>
		</div>
	</div>

	<div class="container" role="main">
		<div class="<?php echo implode(' ', apply_filters( 'tc_column_content_wrapper_classes' , array('row' ,'column-content-wrapper') ) ) ?>">

			<div id="content" class="span9 article-container tc-post-list-grid tc-grid-shadow tc-grid-border tc-gallery-style blog-page">

				<header class="entry-header">
					<h1 class="entry-title "><?php the_title(); ?></h1>
					<hr class="featurette-divider __before_content">
				</header>

				<section class="row-fluid grid-cols-3">   

				<?php 
				$args = array(
	              'post_type' => 'post',
	              'orderby'   => 'title',
	              'order'     => 'ASC',
	              'posts_per_page'=> -1
	            );

	            $my_query = new WP_Query($args);

				while ($my_query->have_posts()) : $my_query->the_post(); ?>

					<article class="tc-grid span6">
						<section class="tc-grid-post">
							<figure class="tc-grid-figure no-thumb" style="line-height: 227px; height: 227px;">
								<div class="tc-grid-icon format-icon"></div>               
								<figcaption class="tc-grid-excerpt">
									<div class="entry-summary">
										<div class="tc-g-cont"><?php the_excerpt(); ?></div>              
									</div>
									<a class="tc-grid-bg-link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a>
									<span class="tc-grid-fade_expt"></span>              
								</figcaption>
							</figure>
						</section>        
						<header class="entry-header">
							<?php
							$thetitle = $post->post_title; /* or you can use get_the_title() */
							$getlength = strlen($thetitle);
							$thelength = 40;
							
							?>
							<h2 class="entry-title ">
								<a href="<?php echo the_permalink(); ?>" title="<?php echo the_title(); ?>" rel="bookmark"><?php echo substr($thetitle, 0, $thelength);
							if ($getlength > $thelength) echo "..."; ?></a>
							</h2>        
						</header>
					</article>


				<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>
			</section>



		</div><!--.article-container -->

		<div class="span3 right tc-sidebar">
			<div id="right" class="widget-area" role="complementary">
				<aside id="search-2" class="widget widget_search">
					<form role="search" method="get" id="searchform" class="searchform" action="http://192.168.33.21/">
						<div>
							<label class="screen-reader-text" for="s">Search for:</label>
							<input type="text" value="" name="s" id="s">
							<input type="submit" id="searchsubmit" value="Search">
						</div>
					</form>
				</aside>

				<aside>
					<ul>
						<?php wp_list_categories('orderby=name'); ?> 
					</ul>
				</aside>
			</div>		
		</div>

	</div><!--.row -->

</div><!-- .container role: main -->

<?php do_action( '__after_main_container' ); ?>

</div><!--#main-wrapper"-->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>