<!doctype html>
<html class="no-js" lang="en">
    <head>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700' rel='stylesheet' type='text/css'>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php wp_title(''); ?></title>
        <?php wp_head(); ?>
    </head>
    <?php $postid = get_the_ID(); ?>
    <body <?php body_class(); ?> 
        <?php 
            if(get_field('header_image',$postid) != "") { ?>
                style="background:#1e1135 url('<?php the_field('header_image',$postid) ?>') no-repeat center top;" 
            <?php } else if(is_archive($postid)) { if(is_post_type_archive('events')) { ?>
                style="background:#1e1135 url('<?php echo get_template_directory_uri(); ?>/img/eventpage_bg.jpg') no-repeat center top;"
            <?php } else if(is_post_type_archive('resources')) { ?>
                style="background:#1e1135 url('<?php echo get_template_directory_uri(); ?>/img/resourcespage_bg.jpg') no-repeat center top;"
        <?php } else { echo 'id=defaulttopbg'; } } else { echo 'id=defaulttopbg'; } ?> >
    <div class="off-canvas-wrap" data-offcanvas>
        <div class="inner-wrap">
            <header class="header-main">
                <nav class="nav-secondary tab-bar">
                    <div class="row">
                        <div class="small-3 columns">
                            <a class="left-off-canvas-toggle menu-icon hide-for-medium-up" href="#"><span></span></a>
                        </div>
                        <div class="small-9 columns show-for-medium-up">
                            <!-- Top Menu -->
                            <ul class="inline-list right">
                                <li><a href="https://www.facebook.com/Datatorrent" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/datatorrent" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/malhar-inc-" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="https://www.youtube.com/user/DataTorrent" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="https://plus.google.com/101326210913592217809/about" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="/about-us/">About Us</a></li>
                                <li><a href="/contact/">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <nav class="nav-main">
                    <div class="row">
                        <div class="small-9 medium-3 large-2 columns">
                            <!-- logo -->
                            <?php echo do_shortcode( '[contentblock id=1]' ); ?>
                        </div>
                        <div class="small-1 medium-9 columns show-for-medium-up align-right">
                            <?php 
                                $mainmenu = array(
                                    'theme_location'  => 'dt_main-menu',
                                    'menu'            => '', 
                                    'container'       => 'div', 
                                    'container_class' => '', 
                                    //'container_id'    => 'MainMenu',
                                    'menu_class'      => 'inline-list', 
                                    //'menu_id'         => '',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_page_menu',
                                    'before'          => '',
                                    'after'           => '',
                                    'link_before'     => '',
                                    'link_after'      => '',
                                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'depth'           => 0,
                                    'walker'      => ''//new SH_Last_Walker()
                                );
                                wp_nav_menu( $mainmenu );
                            ?>
                        </div>
                        <div class="medium-2 small-3 columns show-for-large-up">
                            <!-- Download -->
                            <?php echo do_shortcode( '[contentblock id=3]' ); ?> 
                        </div>
                    </div>
                </nav>
            </header>
            <aside class="left-off-canvas-menu">
                <a href="/download/" class="small primary expand button">Download</a>
                <ul class="off-canvas-list">
                    <li><a href="/">DataTorrent Home</a></li>
                    <li class="has-submenu"><a href="#">Product</a>
                        <?php 
                            $productsmenu = array(
                                'theme_location'  => 'dt_product-menu',
                                'menu'            => 'Product Menu', 
                                'container'       => '', 
                                'container_class' => '', 
                                //'container_id'    => 'MainMenu',
                                'menu_class'      => 'left-submenu', 
                                //'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'items_wrap'      => '<ul id="%1$s" class="%2$s"><li class="back"><a href="#">Back</a></li>%3$s</ul>',
                                'depth'           => 0,
                                'walker'      => ''//new SH_Last_Walker()
                            );
                            wp_nav_menu( $productsmenu );
                        ?>
                    </li>
                    <li><a href="/business-benefits/solutions/">Solutions</a></li>
                    <li class="has-submenu"><a href="#">Resources</a>
                        <?php 
                            $resourcemenu = array(
                                'theme_location'  => 'dt_resource-menu',
                                'menu'            => 'Resource Menu', 
                                'container'       => '', 
                                'container_class' => '', 
                                //'container_id'    => 'MainMenu',
                                'menu_class'      => 'left-submenu', 
                                //'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'items_wrap'      => '<ul id="%1$s" class="%2$s"><li class="back"><a href="#">Back</a></li>%3$s</ul>',
                                'depth'           => 0,
                                'walker'      => ''//new SH_Last_Walker()
                            );
                            wp_nav_menu( $resourcemenu );
                        ?>
                    </li>
                    <li class="has-submenu"><a href="#">Events</a>
                         <?php 
                            $eventsmenu = array(
                                'theme_location'  => 'dt_events-menu',
                                'menu'            => 'Events Menu', 
                                'container'       => '', 
                                'container_class' => '', 
                                //'container_id'    => 'MainMenu',
                                'menu_class'      => 'left-submenu', 
                                //'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'items_wrap'      => '<ul id="%1$s" class="%2$s"><li class="back"><a href="#">Back</a></li>%3$s</ul>',
                                'depth'           => 0,
                                'walker'      => ''//new SH_Last_Walker()
                            );
                            wp_nav_menu( $eventsmenu );
                        ?>
                    </li>
                    <li><a href="/blog/">Blog</a></li>
                    <li><a href="/project-apex/">Project Apex</a></li>
                    <li class="has-submenu"><a href="#">About Us</a>
                        <?php 
                            $aboutusmenu = array(
                                'theme_location'  => 'dt_about-us-menu',
                                'menu'            => 'About Us Menu', 
                                'container'       => '', 
                                'container_class' => '', 
                                //'container_id'    => 'MainMenu',
                                'menu_class'      => 'left-submenu', 
                                //'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'items_wrap'      => '<ul id="%1$s" class="%2$s"><li class="back"><a href="#">Back</a></li>%3$s</ul>',
                                'depth'           => 0,
                                'walker'      => ''//new SH_Last_Walker()
                            );
                            wp_nav_menu( $aboutusmenu );
                        ?>
                    </li>
                    <li><a href="/contact/">Contact</a></li>
                </ul>
                <p class="copyright">&copy; 2015 DataTorrent</p>
            </aside>
            