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
             <?php 
                $event1 = date('Ymd');
                $queryPost = Array(
                    'post_type' => array( 'events' ),
                    'posts_per_page' => 1,
                    'meta_key'  => 'event_date',
                    'orderby'   => 'meta_value_num',
                    'order'     => 'ASC',
                    'meta_query' => array(
                                        array(
											'key'     => 'event_date',
											'value'   => $event1,
											'compare' => '>',
										),
                                    )
                );
                query_posts($queryPost);
            ?>
              <section class="featured-event">
                <div class="row">
                    <div class="medium-4 columns">
                        <?php if(have_posts()) : the_post(); ?>
                            <div>
                                <a href="<?php the_field('register_cta_link'); ?>" target="_blank"><img class="event-image" src="<?php the_field('event_image'); ?>" alt="<?php the_field('event_image_alt_text'); ?>"></a>
                            </div>
                    </div>
                    <div class="medium-8 columns">
                        <div class="featured-event-item">
                            <p class="event-date">
                                <?php $date = DateTime::createFromFormat('Ymd', get_field('event_date'));
                                                echo $date->format('F j, Y'); ?>
                            </p>
                            <h4><a href="<?php the_field('register_cta_link'); ?>" target="_blank"><?php the_title(); ?></a></h4>
                            <p class="event-description"><?php the_content(); ?></p>
                            <div class="row">
                                <div class="medium-6 columns">
                                    <a href="<?php the_field('register_cta_link'); ?>" target="_blank" class="small primary expand button"><?php the_field('register_cta_text'); ?></a>
                                </div>
                                <div class="medium-6 columns">
                                    <div class="share-links">
                                        <h6>Share On</h6>
                                        <span class='st_twitter_custom' displayText='Tweet'><a href="https://twitter.com/datatorrent" target="_blank">Twitter</a></span>
                                        <span class='st_linkedin_custom' displayText='LinkedIn'><a href="http://www.linkedin.com/company/2660309" target="_blank">LinkedIn</a></span>
                                        <span class='st_facebook_custom' displayText='Facebook'><a href="https://www.facebook.com/Datatorrent" target="_blank">Facebook</a></span>
                                        <span class='st_googleplus_custom' displayText='Google +'><a href="https://plus.google.com/u/0/b/101326210913592217809/101326210913592217809" target="_blank">Google +</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; 
                    ?>
                </div>
            </section>
            <?php  
                $event1 = date('Ymd');
                $queryPost = Array(
                    'post_type' => array( 'events' ),
                    'posts_per_page' => -1,
                    'meta_key'  => 'event_date',
                    'orderby'   => 'meta_value_num',
                    'order'     => 'ASC',
                    'meta_query' => array(
                                            array(
												'key'     => 'event_date',
												'value'   => $event1,
												'compare' => '>',
											),
                                        ),
                    'post__not_in' => array( $post->ID ),
                    'paged' =>$paged
                );
                 query_posts($queryPost);
            ?>
            <section class="events-content">
                <div class="row">
                    <div class="small-12 columns">
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
                                    <div class="event-description"><?php the_content(); ?></div>
                                    <a href="<?php the_field('register_cta_link'); ?>" target="_blank">Keep reading &raquo;</a>
                                </li>
                            <?php endwhile; ?>
                            <?php if(function_exists('wp_paginate')) {
            				    wp_paginate();
            				} ?>
                        </ul>
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