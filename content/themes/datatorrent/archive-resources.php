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
                    $resourcemenu = array(
                        'theme_location'  => 'dt_resource-menu',
                        'menu'            => 'Resource Menu', 
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
                    echo str_replace( $find, $replace, wp_nav_menu($resourcemenu) );
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
                        <?php
        					$queryPost = Array(
                                'post_type' => array( 'resources' ),
                        		'posts_per_page' => -1,
                        		'meta_query' => array(
                                		'relation'		=> 'AND',
											array(
												'key'     => 'resource_type',
												'value'   => 'datasheet',
												'compare' => '=',
											),
											array(
                                    			'key'	  	=> 'to_be_featured',
                                    			'value'	  	=> '1',
                                    			'compare' 	=> 'LIKE',
                                    		),
										),
                            	'orderby'	=> 'date',
                            	'order'     => 'DESC'
        					);
        					query_posts($queryPost);
        				?>
        				<?php while (have_posts()) : the_post(); ?>
                        <div class="blog-post-item">
                            <div class="row">
                                <?php if(get_field('image') != ""){ ?>
                                    <div class="medium-4 columns">
                                        <a href="<?php the_field('cta_link'); ?>" target="<?php the_field('target_type'); ?>"><img src="<?php the_field('image'); ?>"></a>
                                    </div>
                                    <div class="medium-8 columns">
                                        <h3>Datasheet</h3>
                                        <p class="blog-post-date"><?php the_time('j F Y'); ?></p>
                                        <h4><a href="<?php the_field('cta_link'); ?>" target="<?php the_field('target_type'); ?>"><?php the_title(); ?></a></h4>
                                        <?php the_content(); ?>
                                        <?php if(get_field('cta_text') != "") { ?><a class="read-more" href="<?php the_field('cta_link'); ?>" target="<?php the_field('target_type'); ?>"><?php the_field('cta_text'); ?> &raquo;</a><?php } ?>
                                    </div>
                                <?php } else { ?>
                                    <div class="medium-12 columns">
                                        <h3>Datasheet</h3>
                                        <p class="blog-post-date"><?php the_time('j F Y'); ?></p>
                                        <h4><a href="<?php the_field('cta_link'); ?>" target="<?php the_field('target_type'); ?>"><?php the_title(); ?></a></h4>
                                        <?php the_content(); ?>
                                        <?php if(get_field('cta_text') != "") { ?><a class="read-more" href="<?php the_field('cta_link'); ?>" target="<?php the_field('target_type'); ?>"><?php the_field('cta_text'); ?> &raquo;</a><?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="blog-posts">
                        <?php
        					$queryPost = Array(
                                'post_type' => array( 'resources' ),
                        		'posts_per_page' => -1,
                        		'meta_query' => array(
                                		'relation'		=> 'AND',
											array(
												'key'     => 'resource_type',
												'value'   => 'webinar',
												'compare' => '=',
											),
											array(
                                    			'key'	  	=> 'to_be_featured',
                                    			'value'	  	=> '1',
                                    			'compare' 	=> 'LIKE',
                                    		),
										),
                            	'orderby'	=> 'date',
                            	'order'     => 'DESC'
        					);
        					query_posts($queryPost);
        				?>
        				<?php while (have_posts()) : the_post(); ?>
                        <div class="blog-post-item">
                            <div class="row">
                                <?php if(get_field('image') != ""){ ?>
                                    <div class="medium-4 columns">
                                        <a href="<?php the_field('cta_link'); ?>" target="<?php the_field('target_type'); ?>"><img src="<?php the_field('image'); ?>"></a>
                                    </div>
                                    <div class="medium-8 columns">
                                        <h3>Webinar</h3>
                                        <p class="blog-post-date"><?php the_time('j F Y'); ?></p>
                                        <h4><a href="<?php the_field('cta_link'); ?>" target="<?php the_field('target_type'); ?>"><?php the_title(); ?></a></h4>
                                        <?php the_content(); ?>
                                        <?php if(get_field('cta_text') != "") { ?><a class="read-more" href="<?php the_field('cta_link'); ?>" target="<?php the_field('target_type'); ?>"><?php the_field('cta_text'); ?> &raquo;</a><?php } ?>
                                    </div>
                                <?php } else { ?>
                                    <div class="medium-12 columns">
                                        <h3>Webinar</h3>
                                        <p class="blog-post-date"><?php the_time('j F Y'); ?></p>
                                        <h4><a href="<?php the_field('cta_link'); ?>" target="<?php the_field('target_type'); ?>"><?php the_title(); ?></a></h4>
                                        <?php the_content(); ?>
                                        <?php if(get_field('cta_text') != "") { ?><a class="read-more" href="<?php the_field('cta_link'); ?>" target="<?php the_field('target_type'); ?>"><?php the_field('cta_text'); ?> &raquo;</a><?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="blog-posts">
                        <?php
        					$queryPost = Array(
                                'post_type' => array( 'resources' ),
                        		'posts_per_page' => -1,
                        		'meta_query' => array(
                                		'relation'		=> 'AND',
											array(
												'key'     => 'resource_type',
												'value'   => 'whitepapers ',
												'compare' => '=',
											),
											array(
                                    			'key'	  	=> 'to_be_featured',
                                    			'value'	  	=> '1',
                                    			'compare' 	=> 'LIKE',
                                    		),
										),
                            	'orderby'	=> 'date',
                            	'order'     => 'DESC'
        					);
        					query_posts($queryPost);
        				?>
        				<?php while (have_posts()) : the_post(); ?>
                        <div class="blog-post-item">
                            <div class="row">
                                <?php if(get_field('image') != ""){ ?>
                                    <div class="medium-4 columns">
                                        <a href="<?php the_field('cta_link'); ?>" target="<?php the_field('target_type'); ?>"><img src="<?php the_field('image'); ?>"></a>
                                    </div>
                                    <div class="medium-8 columns">
                                        <h3>White Papers</h3>
                                        <p class="blog-post-date"><?php the_time('j F Y'); ?></p>
                                        <h4><a href="<?php the_field('cta_link'); ?>" target="<?php the_field('target_type'); ?>"><?php the_title(); ?></a></h4>
                                        <?php the_content(); ?>
                                        <?php if(get_field('cta_text') != "") { ?><a class="read-more" href="<?php the_field('cta_link'); ?>" target="<?php the_field('target_type'); ?>"><?php the_field('cta_text'); ?> &raquo;</a><?php } ?>
                                    </div>
                                <?php } else { ?>
                                    <div class="medium-12 columns">
                                        <h3>White Papers</h3>
                                        <p class="blog-post-date"><?php the_time('j F Y'); ?></p>
                                        <h4><a href="<?php the_field('cta_link'); ?>" target="<?php the_field('target_type'); ?>"><?php the_title(); ?></a></h4>
                                        <?php the_content(); ?>
                                        <?php if(get_field('cta_text') != "") { ?><a class="read-more" href="<?php the_field('cta_link'); ?>" target="<?php the_field('target_type'); ?>"><?php the_field('cta_text'); ?> &raquo;</a><?php } ?>
                                    </div>
                                <?php } ?> 
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="blog-posts">
                        <?php
        					$queryPost = Array(
                                'post_type' => array( 'resources' ),
                        		'posts_per_page' => -1,
                        		'meta_query' => array(
                        		    'relation'		=> 'AND',
											array(
												'key'     => 'resource_type',
												'value'   => 'solutiondemos',
												'compare' => '=',
											),
											array(
                                    			'key'	  	=> 'to_be_featured',
                                    			'value'	  	=> '1',
                                    			'compare' 	=> 'LIKE',
                                    		),
										),
                            	'orderby'	=> 'date',
                            	'order'     => 'DESC'
        					);
        					query_posts($queryPost);
        				?>
        				<?php while (have_posts()) : the_post(); ?>
                        <div class="blog-post-item">
                            <div class="row">
                                <?php if(get_field('image') != ""){ ?>
                                    <div class="medium-4 columns">
                                        <a href="<?php the_field('cta_link'); ?>" target="<?php the_field('target_type'); ?>"><img src="<?php the_field('image'); ?>"></a>
                                    </div>
                                    <div class="medium-8 columns">
                                        <h3>Solution Demos</h3>
                                        <p class="blog-post-date"><?php the_time('j F Y'); ?></p>
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h4></a>
                                        <?php the_content(); ?>
                                        <?php if(get_field('cta_text') != "") { ?><a class="read-more" href="<?php the_field('cta_link'); ?>" target="<?php the_field('target_type'); ?>"><?php the_field('cta_text'); ?> &raquo;</a><?php } ?>
                                    </div>
                                <?php } else { ?>
                                    <div class="medium-12 columns">
                                        <h3>Solution Demos</h3>
                                        <p class="blog-post-date"><?php the_time('j F Y'); ?></p>
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h4></a>
                                        <?php the_content(); ?>
                                        <?php if(get_field('cta_text') != "") { ?><a class="read-more" href="<?php the_field('cta_link'); ?>" target="<?php the_field('target_type'); ?>"><?php the_field('cta_text'); ?> &raquo;</a><?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php endwhile; ?>
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