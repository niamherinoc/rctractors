<?php
/*
Template Name: Page Template
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
                    <span class="trail-end">
                        <?php if(empty( $post->post_parent )) { ?>
                        <?php echo get_the_title( $post->ID ); ?>
                        <?php } else { ?>
                        <a href="<?php echo get_post_permalink($post->post_parent); ?>"><?php echo get_the_title( $post->post_parent ); ?></a>
                        <?php } ?>
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

            <?php
            global $wp_query;

            $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");

            if($children){?>

            <div class="span3 left">
                <div id="left" >
                    <ul>
                        <?php echo $children; ?>
                    </ul>

                </div><!-- #left or #right-->
            </div><!--.tc-sidebar -->

            <div id="content" class="span6 article-container tc-gallery-style">   

                <?php  } else { ?>

                <div id="content" class="span9 article-container tc-gallery-style">   

                    <?php } ?>            

                    <article class="row-fluid">
                        <?php if ( have_posts() ) : ?>

                        <?php while ( have_posts() ) :

                        the_post(); ?>

                        <header class="entry-header">
                            <h1 class="entry-title "><?php the_title(); ?></h1>
                        </header>


                        <div class="entry-content">
                            <?php the_content(); ?>

                            <hr class="featurette-divider __before_content">


                            <?php if ("Allow ads" == get_field('ads_checkbox')[0]) { ?>   


                            <?php


                            global $wp_query;

                            $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");

                            if($children){?>

                            <div class = "small-ad-center">            
                                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                <!-- RC Tractor Guy Ad Small -->
                                <ins class="adsbygoogle"
                                style="display:inline-block;width:468px;height:15px"
                                data-ad-client="ca-pub-5213339202168178"
                                data-ad-slot="9143331948"></ins>
                                <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>

                            </div> 
                            <?php  } else { ?>

                            <div class = "ad-center">
                                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                <!-- RC Tractor Guy Website Ad 1 -->
                                <ins class="adsbygoogle"
                                style="display:inline-block;width:728px;height:15px"
                                data-ad-client="ca-pub-5213339202168178"
                                data-ad-slot="1721567141"></ins>
                                <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div>

                            <?php } ?>


                            <?php } ?>

                            <hr class="featurette-divider __before_content">


                            <?php if( have_rows('content_boxes') ): ?>

                            <?php while( have_rows('content_boxes') ): the_row(); 

                                            // vars
                            $title = get_sub_field('title');
                            $image = get_sub_field('image');
                            $content = get_sub_field('content');
                            $link = get_sub_field('link');

                            ?>



                            <?php if($image) { ?>
                            <div class="row-fluid">
                                <div class="span7">

                                    <?php if( $title ): ?>
                                    <h2><?php echo $title; ?></h2>
                                <?php endif; ?>

                                <?php echo $content; ?>

                                <?php if( $link ): ?>
                                <a href="<?php echo $link; ?>">Read more...</a>
                            <?php endif; ?>


                        </div>

                        <div class="span5">

                            <?php if( $link ): ?>
                            <a href="<?php echo $link; ?>">
                            <?php endif; ?>

                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />

                            <?php if( $link ): ?>
                        </a>
                    <?php endif; ?>

                </div>
            </div>
            <?php }  else { ?>
            <div class="row-fluid">
                <div class="span12">

                    <?php if( $title ): ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>

                <?php echo $content; ?>


                <?php if( $link ): ?>
                <a href="<?php echo $link; ?>">Read more...</a>
            <?php endif; ?>

        </div>
    </div>
    <?php } ?>


    <hr class="featurette-divider __before_content">

<?php endwhile; ?>
<?php endif; ?>
</div>

<?php endwhile; ?>
<?php endif; ?>

<?php if ("Allow ads" == get_field('ads_checkbox')[0]) { ?>   

<?php
global $wp_query;

$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");

if($children){?>

<div class = "small-ad-center">            
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- RC Tractor Guy Ad Small -->
    <ins class="adsbygoogle"
    style="display:inline-block;width:468px;height:15px"
    data-ad-client="ca-pub-5213339202168178"
    data-ad-slot="9143331948"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>

</div> 
<?php  } else { ?>

<div class = "ad-center">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- RC Tractor Guy Website Ad 1 -->
    <ins class="adsbygoogle"
    style="display:inline-block;width:728px;height:15px"
    data-ad-client="ca-pub-5213339202168178"
    data-ad-slot="1721567141"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <div>

        <?php } ?>


        <?php } ?>

    </article>

</div>


<?php do_action( '__after_article_container' ); ##hook of left sidebar ?>

</div><!--.row -->

</div><!-- .container role: main -->

<?php do_action( '__after_main_container' ); ?>

</div><!--#main-wrapper"-->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>