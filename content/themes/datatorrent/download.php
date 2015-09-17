<?php 
/**
* Template Name: Download Template
*
* Selectable from a dropdown menu on the edit page screen.
*/
get_header();
?>
<div class="main-section">
    <section class="hero download-hero">
        <div class="row">
            <div class="small-12 columns">
                <!-- Download Header Title-->
                <?php the_field('header_title'); ?>
            </div>
        </div>
    </section>
    <section class="nav-onpage">
        <div class="row">
            <div class="small-12 columns">
                <ul>
                    <?php while(have_rows('tab_menu')) : the_row(); ?>
                        <li><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('title'); ?></a></li>
                    <?php endwhile; ?>
                </ul>
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
        <section class="download-content">
            <?php if(get_field('download_heading') != "" ) { ?>
            <div class="row">
                <div class="small-12 columns">
                    <!-- Download Content-->
                    <?php the_field('download_heading'); ?> 
                </div>
            </div>
            <?php } ?>
            <?php if(have_rows('edition_block')){ ?>
                <div class="row">
                    <?php while(have_rows('edition_block')) : the_row(); ?>
                        <div class="medium-6 columns">
                            <img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('image_alt_text'); ?>">
                            <h3><?php the_sub_field('title'); ?></h3>
                            <p><?php the_sub_field('description'); ?></p>
                                <?php if(have_rows('content')){ ?>
                                    <?php while(have_rows('content')) : the_row(); ?>
                                        <h4><?php the_sub_field('heading'); ?></h4>
                                        <?php the_sub_field('description'); ?>
                                    <?php endwhile; ?>
                                <?php } ?>
                            <a href="<?php the_sub_field('download_cta_link'); ?>" class="primary button"><?php the_sub_field('download_cta_text'); ?></a>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php } ?>
        </section>
    </div>
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