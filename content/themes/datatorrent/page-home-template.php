<?php
/**
 * Template Name: Home Page Template
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
?>
<?php get_header(); ?>
    <div class="main-section">
        <section class="hero homepage-hero">
            <div class="row">
                <div class="small-12 columns">
                    <div id="HomeSliderAni" style="overflow: hidden; height: 210px;">
                        <ul id="homeslider">
                            <?php while(have_rows('slider_block')) : the_row(); ?>
                                <li><h2><?php the_sub_field('slider_text'); ?></h2>
                                    <ul class="inline-list">
                                       <?php while(have_rows('cta')) : the_row(); ?>
                                       <li><a href="<?php the_sub_field('cta_link'); ?>" class="<?php the_sub_field('cta_class'); ?> button"><?php the_sub_field('cta_text'); ?></a></li>
                                        <?php endwhile; ?>
                                    </ul>
                                </li>
                                <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <div class="path-shortcuts">
        <?php if(have_rows('tab_menu')) { ?>
            <div class="row">
                <div class="small-12 columns">
                    <dl>
                        <!--<dt>What would you like to do today?</dt>-->
                        <?php while(have_rows('tab_menu')) : the_row(); ?>
                        <dd><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('title'); ?></a></dd>
                        <?php endwhile; ?>
                    </dl>
                </div>
            </div>
        <?php } ?>
        </div>
        <?php if(have_rows('home_page_block')) { ?>
            <div class="main-content">
                <?php while(have_rows('home_page_block')) : the_row(); ?>
                    <?php switch(get_sub_field('block_measure')) { 
                          case 'staticcontentdynamicevent40x60': ?>
                          <!-- Static Content Dynamic Event 40x x 60 -->
                                <section class="featured-events content-section">
                                    <div class="row">
                                        <div class="medium-4 columns">
                                            <?php the_sub_field('left_static_content'); ?>
                                        </div>
                                        <?php 
                                            $queryPost = Array(
                                        	 	'post_type' => array( 'events' ),
                                        	 	'posts_per_page' => 1,
                                                'meta_key'	=> 'event_date',
                                                'orderby'	=> 'meta_value_num',
                                                'order'		=> 'DESC',
                                                'meta_query' => array(
                                                                		array(
                                                                			'key'     => 'to_be_featured',
                                                                			'value'   => 1,
                                                                			'compare' => 'LIKE',
                                                                		),
                                                                	)
                            				);
                            				query_posts($queryPost);
                                        ?>
                                        <div class="medium-8 columns">
                                            <?php if(have_posts()) : the_post(); ?>
                                            <div class="featured-event-item">
                                                <?php $current_date = explode(':',get_field('event_date'));
                                                      $current_date_string = $current_date[1]."/".$current_date[0]."/".$current_date[2];
                                                      $date2 = date("F j, Y", strtotime($current_date_string)); 
                                                ?>
                                                <p class="event-date"><?php echo $date2; ?></p>
                                                <h4><a href=""><?php the_title(); ?></a></h4>
                                                <p class="event-description"><?php the_content(); ?></p>
                                                <div class="row">
                                                    <div class="medium-5 columns">
                                                        <a href="" class="small primary expand button">RSVP for this Event &raquo;</a>
                                                    </div>
                                                    <div class="medium-7 columns">
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
                                            <?php endif; ?>
                                            <?php wp_reset_query(); ?>
                                        </div>
                                    </div>
                                </section>
                        <?php break;
                        case 'staticcontent40x60': ?>
                          <!-- Static Content 40 x 60 -->
                                <section class="featured-events content-section">
                                    <div class="row">
                                        <div class="medium-4 columns">
                                            <?php the_sub_field('left_static_content'); ?>
                                        </div>
                                        <div class="medium-8 columns">
                                            <?php the_sub_field('right_static_content'); ?>
                                        </div>
                                    </div>
                                </section>
                        <?php break;
                        case 'staticthreeiconformat': ?>
                            <!-- Static Three Icon Format -->
                            <section class="dt-for-business content-section <?php the_sub_field('band_color_type'); ?>">
                                <div class="row section-header">
                                    <div class="small-12 columns">
                                        <?php the_sub_field('full_width_static_content'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                <?php while(have_rows('three_icon_block')) : the_row(); ?>
                                    <div class="medium-4 columns">
                                        <div class="<?php the_sub_field('icon_alignment'); ?>">
                                            <img src="<?php the_sub_field('icon_image'); ?>" alt="<?php the_sub_field('image_alt_text'); ?>" class="business-icons"> 
                                        </div>
                                        <h5 class="<?php the_sub_field('icon_alignment'); ?>"><?php the_sub_field('title'); ?></h5>
                                        <?php if(get_sub_field('description') != "") { ?><?php the_sub_field('description'); ?><?php } ?>
                                    </div>
                                <?php endwhile; ?>
                                <?php if(get_sub_field('cta_text') !== "") {  ?>
                                    <div class="small-12 columns align-center">  
                                        <a href="<?php the_sub_field('cta_link'); ?>"><?php the_sub_field('cta_text'); ?> &raquo;</a>
                                    </div>
                                <?php } ?>
                                </div>
                            </section>
                        <?php break; 
                        case 'fullwidthsection': ?>
                            <!-- Full Width Section (dark band) -->
                            <section class="<?php the_sub_field('background_class'); ?> callout">
                            <div class="row">
                                <div class="small-12 medium-10 columns">
                                    <h3><?php the_sub_field('title'); ?></h3>
                                    <p class="lead"><?php the_sub_field('description'); ?></p>
                                    <ul class="inline-list">
                                        <?php while(have_rows('cta')) : the_row(); ?>
                                            <li><a href="<?php the_sub_field('cta_link'); ?>" class="small <?php the_sub_field('cta_class'); ?> button"><?php the_sub_field('cta_text'); ?></a></li>
                                        <?php endwhile; ?>
                                  </ul>
                                </div>
                            </div>
                            </section>
                        <?php break; 
                        case 'blogpost50x50': ?>
                            <!-- Dynamic Blog Post 50 x 50 -->
                            <section class="latest-blog-posts content-section">
                                <div class="row section-header">
                                    <div class="small-12 columns">
                                        <?php the_sub_field('full_width_static_content'); ?>
                                    </div>
                                </div>
                                <?php
                					$queryPost = Array(
                						'posts_per_page' => '2',
                						'post_type' => 'post',
                						'orderby'	=> 'date',
                                    	'order'		=> 'DESC'
                					);
                					query_posts($queryPost);
                				?>
                                <div class="row">
                    				<?php while (have_posts()) : the_post(); ?>
                                    <div class="medium-6 columns">
                                        <p class="blog-post-date"><?php the_time('j F Y'); ?></p>
                                        <h5 class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <p><?php echo wp_trim_words( get_the_content(), 60 ); ?><a class="read-more" href="<?php the_permalink(); ?>">Read more &raquo;</a></p>
                                        <div class="share-links">
                                            <h6>Share On</h6>
                                            <span class='st_twitter_custom' displayText='Tweet'><a href="https://twitter.com/datatorrent" target="_blank">Twitter</a></span>
                                            <span class='st_linkedin_custom' displayText='LinkedIn'><a href="http://www.linkedin.com/company/2660309" target="_blank">LinkedIn</a></span>
                                            <span class='st_facebook_custom' displayText='Facebook'><a href="https://www.facebook.com/Datatorrent" target="_blank">Facebook</a></span>
                                            <span class='st_googleplus_custom' displayText='Google +'><a href="https://plus.google.com/u/0/b/101326210913592217809/101326210913592217809" target="_blank">Google +</a></span>
                                        </div>
                                    </div>
                                    <?php endwhile; ?>
                                    <?php wp_reset_query(); ?>
                                </div>
                            </section>
                        <?php break; 
                        case 'dynamiccontent50x50': ?>
                            <!-- Static Content 50 x 50 -->
                            <section class="content-section <?php the_sub_field('band_color_type'); ?>">
                                <div class="row">
                                    <div class="small-12 columns">
                                        <?php the_sub_field('full_width_static_content'); ?>
                                    </div>
                                    <div class="medium-12 large-6 columns">
                                        <?php the_sub_field('left_static_content'); ?>
                                    </div>
                                    <div class="medium-12 large-6 columns">
                                        <?php the_sub_field('right_static_content'); ?>
                                    </div>
                                </div>
                          </section>
                        <?php break; 
                        case 'dynamiccontentfullwidth': ?>
                            <!-- Static Content Full Width -->
                            <section class="dt-for-business content-section">
                                <div class="row section-header">
                                    <div class="small-12 columns">
                                        <?php the_sub_field('full_width_static_content'); ?>
                                    </div>
                                </div>
                            </section>
                        <?php break; 
                        case 'featuredmodule': ?>
                            <!-- Featured Module -->
                            <section class="dt-for-business content-section <?php the_sub_field('band_color_type'); ?>">
                                <div class="row section-header">
                                    <div class="medium-12 columns">
                                    <?php $title = get_sub_field('title'); ?>
                                    <?php if(have_rows('cta')) { ?>
                                        <div class="medium-8 columns">
                                            <h3><?php echo $title; ?></h3>
                                        </div> 
                                        <div class="medium-4 columns">
                                            <ul class="inline-list">
                                                <?php while(have_rows('cta')) : the_row(); ?>
                                                    <li><a href="<?php the_sub_field('cta_link'); ?>" class="medium <?php the_sub_field('cta_class'); ?> button"><?php the_sub_field('cta_text'); ?></a></li>
                                                <?php endwhile; ?>
                                            </ul>
                                        </div>
                                    <?php } else { ?>
                                        <div class="medium-12 columns"><h3><?php the_sub_field('title'); ?></h3></div> 
                                    <?php } ?>
                                        <div class="medium-12 columns"><?php the_sub_field('top_description'); ?></div>
                                        <?php if(get_sub_field('layout') == "imagelefttextright") { ?>
                                            <div class="medium-3 columns"><div class="featured-icons"><img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('image_alt_text'); ?>"></div></div>
                                            <div class="medium-9 columns"><?php the_sub_field('description'); ?></div>
                                        <?php } else { ?>
                                            <div class="medium-9 columns"><?php the_sub_field('description'); ?></div>
                                            <div class="medium-3 columns"><div class="featured-icons"><img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('image_alt_text'); ?>"></div></div>
                                        <?php } ?>
                                        <div class="medium-12 columns"><?php the_sub_field('bottom_description'); ?></div>
                                    </div>
                                </div>
                            </section>
                        <?php break; ?> 
                    <?php } ?>
                <?php endwhile; ?>
            </div>
        <?php } ?>
        <?php if(get_field('title') != "" ) { ?>
        <section class="<?php the_field('background_class'); ?> callout">
            <div class="row">
                <div class="small-12 medium-10 columns">
                    <h3><?php the_field('title'); ?></h3>
                    <p class="lead"><?php the_field('description'); ?></p>
                    <ul class="inline-list">
                        <?php while(have_rows('cta')) : the_row(); ?>
                            <li><a href="<?php the_sub_field('cta_link'); ?>" class="small <?php the_sub_field('cta_class'); ?> button"><?php the_sub_field('cta_text'); ?></a></li>
                        <?php endwhile; ?>
                  </ul>
                </div>
            </div>
        </section>
        <?php } ?>
<?php get_footer(); ?>