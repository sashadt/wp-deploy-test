<?php 
/**
* Template Name: Download2 Template
*
* Selectable from a dropdown menu on the edit page screen.
*/
get_header();
?>
<style>
    .download-choice .inner {
        /*box-shadow: inset 0 1px 8px -4px #463c5d;*/
        /*border: 1px solid rgba(0, 0, 0, 0.1);*/
        /*background-color: #e3e0eb;*/
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 5px;
    }

    .download-choice:last-child .inner {
        border-bottom: none;
        margin-bottom: 40px;
    }

    .download-choice .edition-img {
        width: 17%;
        float: left;
        margin-right: 10px;
    }

    .download-choice .buttons {
        text-align: right;
    }

    .download-choice .details {
        display: none;
        width: 80%;
        margin: 10px auto;
        border-top: 1px dotted #DEDEDE;
    }

    .download-choice .download-button {
        background-color: #DE4488;
    }

    .download-choice .details-button {
        background-color: #9BD634;
    }

    .download-section-header {
        border-bottom: 1px solid #CCC;
        clear: both;
    }

    .clearboth {
        clear: both;
    }

</style>
<script>
    
function showDetails(event, element) {
    event.preventDefault();
    $(element)
        .parent()
        .next('.details')
        .toggle();
}

</script>
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
            
            <?php foreach (array('sandbox', 'platform', 'application') as $download_type) : ?>
            <div class="row">
            <h2 class="download-section-header small-12 columns"><?php echo ucfirst($download_type); ?> Downloads</h2>
                
            <?php if(have_rows($download_type.'_block')){ ?>
                
                    <?php while(have_rows($download_type.'_block')) : the_row(); ?>
                    <div class="download-choice">
                        <div class="inner">
                            <img class="edition-img" src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('image_alt_text'); ?>">
                            <h3><?php the_sub_field('title'); ?></h3>
                            <p><?php the_sub_field('description'); ?></p>
                            <div class="buttons">
                                <a href="#" class="primary button details-button" onclick="showDetails(event, this)">Show Details</a>
                                <a href="<?php the_sub_field('download_cta_link'); ?>" class="primary button download-button"><?php the_sub_field('download_cta_text'); ?></a>    
                            </div>
                            <?php if(have_rows('content')){ ?>
                            <div class="details">
                                <div class="clearboth"></div>
                                <div class="row">
                                <?php while(have_rows('content')) : the_row(); ?>
                                    <div class="medium-6 column">
                                        <h4><?php the_sub_field('heading'); ?></h4>
                                        <?php the_sub_field('description'); ?>
                                    </div>
                                <?php endwhile; ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php endwhile; ?>
                
            <?php } ?>
            </div>
            <?php endforeach; ?>
            

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
