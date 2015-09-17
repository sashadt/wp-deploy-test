<?php get_header(); ?>
<div class="main-section">
    <section class="hero homepage-hero">
        <div class="row">
            <div class="small-12 columns">
                <!-- Events Header Title -->
                <?php echo do_shortcode( '[contentblock id=7]' ); ?> 
            </div>
        </div>
    </section>
    <div class="path-shortcuts">
        <div class="row">
            <div class="small-12 columns">
                <?php 
                    $eventsmenu = array(
                        'theme_location'  => 'dt_events-menu',
                        'menu'            => 'Events Menu', 
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
                    echo str_replace( $find, $replace, wp_nav_menu($eventsmenu) );
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
                                    <img src="<?php the_field('event_image'); ?>" alt="<?php the_field('event_image_alt_text'); ?>">
                                    <h5 class="event-title"><?php the_title(); ?></h5>
                                    <p class="event-date">
                                        <?php $date = DateTime::createFromFormat('Ymd', get_field('event_date'));
                                                echo $date->format('F j, Y'); ?></p>
                                    <p class="event-description"><?php the_content(); ?></p>
                                    <p class="event-description"><?php the_content(); ?></p>
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