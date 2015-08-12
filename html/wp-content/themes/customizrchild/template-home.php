<?php
/*
Template Name: Homepage Template
*/

get_header(); ?>

<ul class="bxslider">
    <?php

    // check if the repeater field has rows of data
    if( have_rows('slider') ):

        // loop through the rows of data
        while ( have_rows('slider') ) : the_row();

            $image = get_sub_field('image');
            $title = get_sub_field('title');
            $subtitle = get_sub_field('subtitle');
            $link = get_sub_field('page_link');

        ?>
        <li>
            <img src="<?php echo $image['url']; ?>" />
            <div class="carousel-caption">
                <h2><?php echo $title; ?></h2> 
                <p class="lead"><?php echo $subtitle; ?></p> 
                <a class="btn btn-large btn-primary" href="<?php echo $link; ?>" target="_self">Read more</a>
            </div>
        </li>

    <?php 
    endwhile;


    endif;

    ?>
</ul>



<div id="main-wrapper" class="container">

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- RC Tractor Guy Website Ad 1 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:15px"
     data-ad-client="ca-pub-5213339202168178"
     data-ad-slot="1721567141"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


    <div class="container marketing">
        <div class="row widget-area" role="complementary">

            <?php 
// query
            $args = array(
                'post_type' => 'page',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'featured', 
                        'value' => '"featured"', 
                        'compare' => 'LIKE'
                        )
                    )
                );

// The Query
            query_posts( $args );

// The Loop
            while ( have_posts() ) : the_post(); ?>
            <div class="span4 fp-one">
                <div class="widget-front">
                    <div class="thumb-wrapper ">
                        <a class="round-div" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a>
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <h2><?php the_title(); ?></h2>
                    <p class="fp-text-one"></p>
                    <a class="btn btn-primary fp-button" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read more »</a>
                </div><!-- /.widget-front -->

            </div>
        <?php  endwhile;

// Reset Query
        wp_reset_query(); ?>
    </div>

    <hr class="featurette-divider __before_main_container">
    
    <div class="row">
        <div class="span1">
            <?php echo do_shortcode('[aps-counter]'); ?>
        </div>
        <div class="span11">
            <h2>Hot Forum Topics</h2>

            <?php echo do_shortcode('[bbp-topic-index]'); ?>
            <?php /*$args = array(
                'post_type' => 'topic',
                'orderby' => 'date',
                'order' => 'DESC'
            );

            $postslist = get_posts( $args ); 
            $lastElement = end($postslist);

            foreach ( $postslist as $post ) : setup_postdata( $post ); ?>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                <?php if($post != $lastElement) { ?>
                |

                <?php }

                endforeach; */
             ?>
        </div>
    </div>
</div>

<hr class="featurette-divider __before_main_container">

<div class="container" role="main">
    <div class="row column-content-wrapper">

        <div id="content" class="span12 article-container tc-post-list-grid tc-grid-shadow tc-grid-border tc-gallery-style">

            <h2>Latest Blog Posts</h2>
            <section class="row-fluid grid-cols-3">      

                <?php 
// query
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    );

// The Query
                query_posts( $args );

// The Loop
                while ( have_posts() ) : the_post(); ?>

                <article class="tc-grid span4 post">
                    <section class="tc-grid-post">
                        <figure class="tc-grid-figure no-thumb" style="line-height: 227px; height: 227px;">
                            <div class="tc-grid-icon format-icon"></div>               
                            <figcaption class="tc-grid-excerpt">
                                <div class="entry-summary">
                                    <div class="tc-g-cont"><?php echo the_excerpt(); ?></div>             
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

            <?php  endwhile;

// Reset Query
            wp_reset_query(); ?>


            <hr class="featurette-divider __after_article">
        </section><!--end section.row-fluid-->

        <hr class="featurette-divider post-list-grid">

    </div><!--.article-container -->

</div><!--.row -->
</div>

</div><!--#main-wrapper"-->

<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('.bxslider').bxSlider({
        auto: true
    });
});
</script>

<?php get_footer(); ?>

