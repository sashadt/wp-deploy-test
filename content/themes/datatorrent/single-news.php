<?php get_header(); ?>
<div class="main-section">
    <section class="hero homepage-hero">
        <div class="row">
            <div class="small-12 columns">
                <!-- Download Header Title-->
                <?php echo do_shortcode( '[contentblock id=14]' ); ?> 
            </div>
        </div>
    </section>
    <div class="path-shortcuts">
        <div class="row">
            <div class="small-12 columns">
                 <?php 
                    $aboutusmenu = array(
                        'theme_location'  => 'dt_about-us-menu',
                        'menu'            => 'About Us Menu', 
                        'container'       => '', 
                        'container_class' => '', 
                        //'container_id'    => 'MainMenu',
                        'menu_class'      => '', 
                        //'menu_id'         => '',
                        'echo'            => false,
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<dl>%3$s</dl>',
                        'depth'           => 0,
                        'walker'      => ''//new SH_Last_Walker()
                    );
                    $find = array('><a','li');
                    $replace = array('><a','dd');
                    echo str_replace( $find, $replace, wp_nav_menu($aboutusmenu) );
                ?>
            </div>
        </div>
    </div>
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
                        <div class="blog-post-item">
                            <div class="row">
                                <div class="medium-12 columns">
                                    <p class="blog-post-date"><?php the_time('j F Y'); ?> | <?php the_field('news_source'); ?></p>
                                    <h4><?php the_title(); ?></h4>
                                    <?php the_content(); ?><a class="read-more" href="<?php the_field('news_source_url'); ?>" target="_blank">Read more &raquo;</a>
                                </div>
                            </div>
                        </div>
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