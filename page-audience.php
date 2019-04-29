<?php

/** 
Template Name: General Template 
**/

?>
<?php get_header();?>
<div id="audience" class="main-container">
    <div class="main wrapper clearfix">
        <div id="contentwrapper">
           <article>
              <section>                    
					    <?php if (have_posts()) : ?>
					    <?php while (have_posts()) : the_post(); ?>       				
                      <div id="content">                      
                        <div id="content-body">  
                             <?php the_field('main_content'); ?>                                                      
                        </div> 
                      </div>           	
					  <?php endwhile; ?>
					<?php endif; ?>
				</section>
  			</article>
  		</div>
	 </div>	
</div>     
<?php get_footer(); ?>