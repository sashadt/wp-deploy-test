<?php
/**
 * Template Name: Webinars Template
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
?>
<?php get_header(); ?>
    <div class="main-section">
        <section class="hero homepage-hero">
            <div class="row">
                <div class="small-12 columns">
                    <!-- Blog Header Title -->
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
            <?php 
                $event1 = date('Ymd');
                $queryPost = Array(
                    'post_type' => array( 'events' ),
            		'posts_per_page' => -1,
            		'meta_query' => array(
            		                'relation' => 'AND',
									 array(
											'key'     => 'event_date',
											'value'   => $event1,
											'compare' => '>',
										),
									array(
										'key'     => 'event_type',
										'value'   => 'webinars',
										'compare' => '=',
									),
								),
            		'meta_key'	=> 'event_date',
                	'orderby'	=> 'meta_value_num',
                	'order'		=> 'ASC',
                	'paged' =>$paged
                );
                query_posts($queryPost);
            ?>
            <section class="events-content">
                <div class="row">
                    <div class="small-12 columns">
                        <?php if(have_posts()) { ?>
                            <ul id="latest_events" class="medium-block-grid-4">
                                <?php while (have_posts()) : the_post(); ?>
                                    <li class="main-events-list-item">
                                        <div class="event-image">
                                            <a href="<?php the_field('register_cta_link'); ?>" target="_blank"><img src="<?php the_field('event_image'); ?>" alt="<?php the_field('event_image_alt_text'); ?>"></a>
                                        </div>
                                        <h5 class="event-title"><a href="<?php the_field('register_cta_link'); ?>" target="_blank"><?php the_title(); ?></a></h5>
                                        <p class="event-date">
                                             <?php $date = DateTime::createFromFormat('Ymd', get_field('event_date'));
                                                    echo $date->format('F j, Y'); ?>
                                        </p>
                                        <p class="event-description"><?php the_content(); ?></p>
                                        <a href="<?php the_field('register_cta_link'); ?>" target="_blank">Keep reading &raquo;</a>
                                    </li>
                                <?php endwhile; ?>
                                <?php if(function_exists('wp_paginate')) {
                				    wp_paginate();
                				} ?>
                            </ul>
                        <?php } else { ?>
                            <div style="min-height: 300px;"><h2>There are no upcoming webinars right now.</h2></div>
                        <?php } ?>
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