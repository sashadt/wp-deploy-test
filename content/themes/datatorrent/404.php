<?php get_header(); ?>
<div class="main-section">
    <section class="hero homepage-hero">
        <div class="row">
            <div class="medium-6 columns">
                <!-- Download Header Title-->
                <?php echo do_shortcode( '[contentblock id=14]' ); ?> 
            </div>
        </div>
    </section>
    <div class="main-content">
        <!-- Breadcrum begin -->
        <section id="BreadCrumbs">
            <div class="row">
                <div class="small-12 columns">
                    <?php if(function_exists('bcn_display'))
                	{
                	    bcn_display();
                	}?>
            	</div>
        	</div>
        </section>
        <!-- Breadcrum ends -->
        <section class="content-section">
            <div class="row">
                <div class="medium-9 columns">
                    <div class="blog-posts">
                        <h2>404 Error (Page not found)</h2>
                        <p>We are Unable to Locate the Page You Requested.</p>
                        <p>Thank you for your interest in DataTorrent. Unfortunately, the page that you requested has been updated or moved - or doesn't exist. We apologize for the inconvenience.</p>
                        <p>Please try one of the following links below to find what you are looking for.</p>
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
                </div>
                <div class="medium-3 columns">
                </div>
            </div>
        </section>
    </div>
    <section class="callout-demo callout">
        <div class="row">
            <div class="small-12 medium-10 columns">
                <!-- Data Torrent in Action -->
                <?php echo do_shortcode( '[contentblock id=8]' ); ?> 
            </div>
        </div>
    </section>
<?php get_footer(); ?>