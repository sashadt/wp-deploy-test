<?php get_header(); ?>
<div class="main-section">
    <section class="hero homepage-hero">
        <div class="row">
            <div class="medium-6 columns">
                <!-- Download Header Title-->
                <?php echo do_shortcode( '[contentblock id=14]' ); ?> 
            </div>
        </div>
    </section>
    <div class="path-shortcuts">
        <div class="row">
            <div class="small-12 columns">
                 <?php 
                    $aboutusmenu = array(
                        'theme_location'  => 'dt_about-us-menu',
                        'menu'            => 'About Us Menu', 
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
                    echo str_replace( $find, $replace, wp_nav_menu($aboutusmenu) );
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
                        <!-- Career Content -->
                        <?php echo do_shortcode( '[contentblock id=15]' ); ?> 
                        <?php
                        
                            $countries = get_field_object('country');
                            $departments = get_field_object('stream');
           
                        foreach($countries['choices'] as $country_name => $country_label ) {
                                if($previous_country != $country_label){ // ahow unique country 
                                    echo "<h3>Current Open Positions in ".$country_label."</h3>";
                                 }
                               foreach( $departments['choices'] as $department_name => $department_label){ 
                                    $queryPost = Array( 
                                                          'post_type' => 'careers', 
                                                          'posts_per_page' => '5',
                                                          'order' => 'ASC',
                                                          'meta_query' =>array(
                                                                        'relation' => 'AND', 
                                                                        array( 
                                                                             'key'   => 'country',
                                    	                                    'value'  => $country_name,
                                    	                                   'compare' => '='
                                    			                          ),
                                    			                          array( 
                                    	            	                    'key' => 'stream',
                                    	                                   'value' => $department_name,
                                    	                                   'compare' => '='
                                    			                          )
                                    			                     ) 
                                                          );
                                        query_posts($queryPost);
        				                echo"<ul>";
                                        while (have_posts()) : the_post(); 
                                             if($previous_department != $department_label){ // show unique department 
                                                 echo "<h4>".$department_label."</h4>";
                                                }
                                           
                                              echo "<li><a href=\"".get_the_permalink()."\" target=\"_blank\">";
                                                    the_title();
                                              echo "</a></li>";
                                                $previous_department = $department_label;
                                        endwhile;  
                                        echo"</ul>"; 
                                    } // endforeach loop for departments
                            $previous_country = $country_label; 
                           } // endforeach loop for country    
        				?> 
        				<?php if(function_exists('wp_paginate')) {
        				    wp_paginate();
        				} ?>
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