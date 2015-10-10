<?php

/**
 * Single Forum
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); ?>

<div id="main-wrapper" class="container">

	<div class="tc-hot-crumble container" role="navigation">
		<div class="row">
			<div class="span12">
				<div class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb">
					<span class="trail-begin">
						<a href="http://www.rctractorguy.com/forum">Forum</a>
					</span>

                    <?php if(!empty($post->post_parent )) { ?>
                        <span class="sep">»</span>
                        <span class="trail-end">
                            <?php echo get_the_title( $post->ID ); ?>
                        </span>
                    <?php } ?>
				</div>
			</div>
		</div>
	</div>

	<div class="container" role="main">
		<div class="row column-content-wrapper">
			<div id="content" class="span12 article-container tc-gallery-style">   


				<article class="row-fluid">
					
					<?php do_action( 'bbp_before_main_content' ); ?>

					<?php do_action( 'bbp_template_notices' ); ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php if ( bbp_user_can_view_forum() ) : ?>

							<div id="forum-<?php bbp_forum_id(); ?>" class="bbp-forum-content">
								<h1 class="entry-title"><?php bbp_forum_title(); ?></h1>
								<div class="entry-content">

									<?php bbp_get_template_part( 'content', 'single-forum' ); ?>

								</div>
							</div><!-- #forum-<?php bbp_forum_id(); ?> -->

						<?php else : // Forum exists, user no access ?>

							<?php bbp_get_template_part( 'feedback', 'no-access' ); ?>

						<?php endif; ?>

					<?php endwhile; ?>

				</article>
			</div>
		</div>
	</div>
</div>

<?php //do_action( 'bbp_after_main_content' ); ?>

<?php get_footer(); ?>
