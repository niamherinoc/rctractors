<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<?php do_action( '__before_body' ); ?>

<body <?php body_class(); ?>>
  <div id="tc-page-wrap" class="">
    <header class="tc-header clearfix row-fluid tc-tagline-on tc-title-logo-on  tc-shrink-on tc-menu-on logo-left" role="banner" style="height: auto; top: 32px;">

      <div class="brand span5 pull-left">
        <a class="site-logo" href="<?php echo get_site_url(); ?>" title="<?php echo get_bloginfo('name'); ?> | <?php echo get_bloginfo('description'); ?>">
          <img src="<?php echo get_site_url(); ?>/wp-content/themes/customizrchild/logorc1.png" alt="Home" width="200" height="100"/>  
          <h1><?php echo get_bloginfo('name'); ?></h1>
          <p><?php echo get_bloginfo('description'); ?></p>     
        </a>
        </div> <!-- brand span3 -->

        <div class="navbar-wrapper clearfix span7 tc-submenu-fade tc-submenu-move tc-open-on-hover pull-menu-right">
          <div class="navbar resp">
            <div class="navbar-inner" role="navigation">
              <div class="row-fluid">
                <div class="top-links span9">
                  <?php
                    wp_nav_menu(
                      array(
                        'menu' => 'top-links',
                        'container' => '',
                        'menu_class' => 'nav tc-hover-menu'
                        )
                      );

                      ?>
                </div>
                <div class="social-block span3">
                  <a class="social-icon icon-twitter" href="https://twitter.com/RCTractors" title="Follow me on Twitter" target="_blank"></a>
                  <a class="social-icon icon-facebook" href="https://www.facebook.com/RcTractorsAndConstructionVehicles" title="Follow me on Facebook" target="_blank"></a>
                  <a class="social-icon icon-google" href="https://plus.google.com/+RCTractorGuy/posts" title="Follow me on Google+" target="_blank"></a>
                  <a class="social-icon icon-youtube" href="https://www.youtube.com/c/RCTractorGuy" title="Follow me on Youtube" target="_blank"></a>
                </div>
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <div class="nav-collapse collapse tc-hover-menu-wrapper">
                  <div class="menu-menu-1-container">

                    <?php
                    wp_nav_menu(
                      array(
                        'menu' => 'Menu 1',
                        'container' => '',
                        'menu_class' => 'nav tc-hover-menu',
                        'menu_id' => 'enu-menu-3'
                        )
                      );

                      ?>
                    </div>
                  </div>
                </div><!-- /.row-fluid -->
              </div><!-- /.navbar-inner -->
            </div><!-- /.navbar resp -->
          </div><!-- /.navbar-wrapper -->

          <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-65472416-1', 'auto');
            ga('send', 'pageview');

          </script>
        </header>

        <div id="tc-reset-margin-top" class="container-fluid" style="margin-top: 135px;"></div> 