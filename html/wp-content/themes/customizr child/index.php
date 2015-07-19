<?php
/*
Template Name: Custom Page Example
*/
?>
<?php do_action( '__before_main_wrapper' ); ##hook of the header with get_header ?>
<div id="main-wrapper" class="<?php echo implode(' ', apply_filters( 'tc_main_wrapper_classes' , array('container') ) ) ?>">

    <?php do_action( '__before_main_container' ); ##hook of the featured page (priority 10) and breadcrumb (priority 20)...and whatever you need! ?>

    <div class="container" role="main">
        <div class="row column-content-wrapper">

            <?php
            global $wp_query;
            
            if( empty($wp_query->post->post_parent) ) {
                $parent = $wp_query->post->ID;
            } else {
                $parent = $wp_query->post->post_parent;
            } ?>
            
            <?php if(wp_list_pages("title_li=&child_of=$parent&echo=0" )){ ?>
                <div class="span3 left">
                    <div id="left" >
                        <ul>
                            <?php wp_list_pages("title_li=&child_of=$parent" ); ?>
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
                                <h1 class="entry-title "><?php the_title(); ?>
                                    <span class="edit-link btn btn-inverse btn-mini">
                                        <a class="post-edit-link" href="http://192.168.33.21/wp-admin/post.php?post=37&amp;action=edit" title="Edit">Edit</a>
                                    </span>
                                </h1>
                                <hr class="featurette-divider __before_content">
                            </header>

                    
                            <div class="entry-content">

                                <?php the_content(); ?>
                            </div>


                        <?php endwhile; ?>

                    <?php endif; ?>
                    
                </article>
            </div>
           
            <?php do_action( '__after_article_container' ); ##hook of left sidebar ?>                

           

        </div><!--.row -->
    </div><!-- .container role: main -->

    <?php do_action( '__after_main_container' ); ?>

</div><!--#main-wrapper"-->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>