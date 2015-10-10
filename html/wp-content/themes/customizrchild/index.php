<?php
/*
Page Name: Imdex
*/

get_header(); ?>

<div id="main-wrapper" class="container">

    <div class="container" role="main">
        <div class="<?php echo implode(' ', apply_filters( 'tc_column_content_wrapper_classes' , array('row' ,'column-content-wrapper') ) ) ?>">

            <div id="content" class="<?php echo implode(' ', apply_filters( 'tc_article_container_class' , array( TC_utils::tc_get_layout( TC_utils::tc_id() , 'class' ) , 'article-container' ) ) ) ?>">

                <?php do_action ('__before_loop');##hooks the heading of the list of post : archive, search... ?>

                <?php if ( tc__f('__is_no_results') || is_404() ) : ##no search results or 404 cases ?>

                <article <?php tc__f('__article_selectors') ?>>
                    <?php do_action( '__loop' ); ?>
                </article>

            <?php endif; ?>

            <?php if ( have_posts() && ! is_404() ) : ?>
            <?php while ( have_posts() ) : ##all other cases for single and lists: post, custom post type, page, archives, search, 404 ?>
            <?php the_post(); ?>

            <?php do_action ('__before_article') ?>
            <article <?php tc__f('__article_selectors') ?>>
                <?php do_action( '__loop' ); ?>
            </article>
            <?php do_action ('__after_article') ?>

        <?php endwhile; ?>

    <?php endif; ##end if have posts ?>

    <?php do_action ('__after_loop');##hook of the comments and the posts navigation with priorities 10 and 20 ?>

</div><!--.article-container -->

<div class="span3 right tc-sidebar">
 <div id="right" class="widget-area" role="complementary"> 
    <?php get_sidebar( 'blog' ); ?>
</div>
</div>


</div><!--.row -->
</div><!-- .container role: main -->

<?php do_action( '__after_main_container' ); ?>

</div>

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>
