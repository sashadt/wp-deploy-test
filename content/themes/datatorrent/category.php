<?php get_header(); ?>
    <div class="main-section">
        <section class="hero homepage-hero">
            <div class="row">
                <div class="medium-6 columns">
                    <!-- Download Header Title -->
                    <?php echo do_shortcode( '[contentblock id=14]' ); ?> 
                </div>
            </div>
        </section>
        <div class="path-shortcuts">
            <div class="row">
                <div class="small-12 columns">
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
                    	} ?>
                	</div>
            	</div>
            </section>
            <!-- Breadcrum ends -->
            <section class="content-section">
                <div class="row">
                    <div class="medium-9 columns">
                        <div class="blog-posts">
                           <?php while (have_posts()) : the_post(); ?>
                                <div class="blog-post-item">
                                    <div class="row">
                                        <div class="medium-4 columns">
                        					<?php if ( has_post_thumbnail() ) { ?>
            								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="featured-image-link" >
            									<?php
            										the_post_thumbnail(array(640,480));
            									?>
            								</a>
            								<?php } ?>
                                        </div>
                                        <div class="medium-8 columns">
                                            <p class="blog-post-date"><?php the_time('j F Y'); ?> | By : <?php the_author(); ?></p>
                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <?php echo wp_trim_words( get_the_content(), 60 ); ?><a class="read-more" href="<?php the_permalink(); ?>">Read more &raquo;</a>
                                            <ul class="inline-list tags-list">
                                                <?php
                                                    $categories = get_the_category();
                                                    $output = '';
                                                    if($categories){
                                                    	foreach($categories as $category) {
                                                    		$output .= '<li><a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '"><span class="secondary label">'.$category->cat_name.'</span></a></li>';
                                                    	}
                                                    echo trim($output);
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <div class="medium-3 columns">
                        <?php if ( is_active_sidebar( 'postpage' ) ) : ?>
                        <div id="primary-sidebar" class="side-nav widget-area" role="complementary">
                        <?php dynamic_sidebar( 'postpage' ); ?>
                        </div><!-- #primary-sidebar -->
                        <?php endif; ?>    
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