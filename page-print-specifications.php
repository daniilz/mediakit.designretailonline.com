<?php
/*
Template Name: Print Specifications Template
*/
?>

<?php get_header(); ?>



<div class="main-container" id="page-print-specs-rates">

    <div class="main wrapper clearfix">

        <div id="contentwrapper">

            <article>

                <section> 

                    <div id="content">
                          <div id="content-header">  
                            <h1><?php the_title(); ?></h1>
                            <?php
                                $size_requirements = get_field('size_requirements');
                            ?> 
                          </div>                       
                    </div> 
          
                    <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); ?>
                        <div id="content-image">

                          <?php if ( has_post_thumbnail() ) {
                            the_post_thumbnail();
                          } 
                          ?> 
                          <a href="<?php the_field('featured_image_link'); ?>" target="_blank"><?php the_field('featured_image_link_text'); ?></a> 

                        </div> 
                        <h3><?=the_field('table_header');?></h3>
                        <div class="table">   
                            <table cellspacing="0" cellpadding="0" border="0" align="left">
                            <thead>
                                <tr class="header-row">
                                    <th><strong><?=the_field('column_1_title');?></strong></th>
                                    <th><strong><?=the_field('column_2_title');?></strong></th>
                                    <th><strong><?=the_field('column_3_title');?></strong></th>
                                    <th colspan="3"><strong><?=the_field('column_4_title');?></strong></th>
                                </tr>
                            </thead>
                            <tbody>               
                                <?php
                                $posttype = get_field('row_type_name'); 

                                $bottom_content_left = get_field('bottom_content_left');
                                $bottom_content_right = get_field('bottom_content_right');
                                if(!empty($size_requirements)) {
                                    foreach($size_requirements as $size_requirement) {
                                ?>
                                    <tr>
                                        <td><?=$size_requirement['ad_size']; ?></td>
                                        <td><?=$size_requirement['non_bleed_width_x_depth']; ?></td>
                                        <td><?=$size_requirement['trim_width_x_depth']; ?></td>
                                        <td><?=$size_requirement['bleed_width_x_depth']; ?></td>                   
                                    </tr>   
                                <?php  
                                    }    
                                }                                        
                                ?>
                           </tbody>
                        </table> 
                    </div>      

                    <?php endwhile; ?>
               
                        <?php endif; ?>
                        <div class="table-footer">     
                            <div class="bottom-content">
                                <div class="bottom-content-left">
                                    <?=$bottom_content_left;?>
                                </div>
                                <div class="bottom-content-right">
                                    <?=$bottom_content_right;?>
                                </div>      
                            </div>
                        </div> 

                    </section>

            </article>
            </div>
        </div>

    </div>

<?php get_footer(); ?>