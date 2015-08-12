<?php
/**
* The main template file. Includes the loop.
*
*
* @package Customizr
* @since Customizr 1.0
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
</div>

<?php get_footer(); ?>

