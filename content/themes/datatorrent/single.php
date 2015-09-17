<?php get_header(); ?>
<div class="main-section">
    <section class="hero blog-hero">
        <div class="row">
            <div class="small-12 columns">
                <!-- Blog Header Title -->
                <?php echo do_shortcode( '[contentblock id=6]' ); ?>             
            </div>
        </div>
    </section>
    <div class="main-content">
        <section class="content-section">
            <div class="row">
                <div class="medium-9 columns">
                    <div class="blog-posts">
        				<?php while (have_posts()) : the_post(); ?>
                        <div class="blog-post-item">
                            <div class="row">
                                <div class="medium-12 columns">
                                    <h1><?php the_title(); ?></h1>
                                    <p class="blog-post-date"><?php the_date(); ?> | By : <?php the_author(); ?></p>
                                    <?php the_content(); ?>
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
                                <div id="comment">
                                    <?php comments_template( '', true ); ?>
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
