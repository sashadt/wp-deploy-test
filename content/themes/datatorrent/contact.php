<?php 
/**
 * Template Name: Contact Template
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
get_header(); ?>
<div class="main-section">
    <section class="hero contact-hero">
        <div class="row">
            <div class="small-12 columns">
                <!-- Contact Header Title-->
                <?php echo do_shortcode( '[contentblock id=10]' ); ?> 
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
                <?php if(have_rows('contact_details')){ ?>
                    <?php while(have_rows('contact_details')) : the_row(); ?>
                        <div class="medium-4 columns">
                            <h4><?php the_sub_field('country_name'); ?></h4>
                            <div class="map-container">
                                <?php the_sub_field('address'); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>                
                <?php } ?>
                <div class="medium-4 columns">
                    <h4>Contact Us</h4>
                    <script src="//app-ab06.marketo.com/js/forms2/js/forms2.js"></script>
                    <form id="mktoForm_1102" class=""></form>
                    <script>MktoForms2.loadForm("//app-ab06.marketo.com", "661-RYF-836", 1102);</script>
                    <!-- Contact Support-->
                    <?php echo do_shortcode( '[contentblock id=13]' ); ?> 
                </div>
            </div>
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