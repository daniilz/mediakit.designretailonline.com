<?php

/*

Template Name: Editorial Calendar Template

*/

?>

<?php get_header(); ?>
     
<div class="main-container page-editorial-cal">
    <div class="main wrapper clearfix">
        <div id="contentwrapper">
            <div class="content-right">
                  <div class="pdfs-container">
                      <span class="pdf-link"><a href="<?=the_field('pdf_1_link');?>" target="_blank"><img src="/wp-content/themes/drmk/images/PDFlogo.png" alt="pdf" class="PDF_LogoLink"><?=the_field('pdf_1_title');?></a></span>
                  </div>
            </div> 
            <article>
                <section>
                    <div class="table-header">
                        <span class="title"><h3><? the_field('page_title'); ?></h3></span>                     
                    </div>            
                    <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); 
                        $print_highlights = get_field('editorial_calendar');
                        $object = get_field_object('editorial_calendar');
                    ?>
                    <div class="table">     
                    <table cellspacing="0" cellpadding="0" border="0" align="left">
                        <thead>
                            <tr class="header-row">
                                <th><strong><?php echo $object['sub_fields'][0]['label'] ?></strong></th>
                                <th><strong><?php echo $object['sub_fields'][1]['label'] ?></strong></th>
                                <th><strong><?php echo $object['sub_fields'][2]['label'] ?></strong></th>
                                <th><strong><?php echo $object['sub_fields'][3]['label'] ?></strong></th>
                                <th><strong><?php echo $object['sub_fields'][4]['label'] ?></strong></th>
                                <th><strong><?php echo $object['sub_fields'][5]['label'] ?></strong></th>
                                <th><strong>Rotating Departments</strong></th>
                                <th><strong><?php echo $object['sub_fields'][6]['label'] ?></strong></th>                                
                                <th><strong><?php echo $object['sub_fields'][7]['label'] ?></strong></th>
                            </tr>
                        </thead>
                        <tbody>       
                            <?php                                                  
                            if(!empty($print_highlights)) {
                                $count = 0;
                                foreach($print_highlights as $print_highlight) { 
                            ?>
                                <tr>
                                    <td><strong><?=$print_highlight['month']; ?></strong></td>
                                    <td><?=$print_highlight['ad_close']; ?></td>
                                    <td><?=$print_highlight['materials_due']; ?></td>
                                    <td><?=$print_highlight['issue_highlights']; ?></td>
                                    <td><?=$print_highlight['columns']; ?></td>     
                                    <td><?=$print_highlight['product_coverage']; ?></td>
                                    <?php if ($count == 0) { ?> 
                                    <td rowspan="11" style="background-color: #ebebeb; width:12%;vertical-align: top;"><? the_field('rotating_departments'); ?></td>
                                    <?php } ?>
                                    <td><?=$print_highlight['bonus_distribution']; ?></td> 
                                    <td><? if($print_highlight['sales_advantage']==1) { ?> &#10003; <?  } else { echo ""; } ?></td>        
                                </tr>   
                            <?php
                                    $count++;  
                                }    
                            }                                        
                            ?>                                          
                       </tbody>
                    </table>
                    </div>  
                    <?php if(get_field('note')) { ?> 
                        <div class="note">
                            <span><? the_field('note'); ?></span>
                        </div><br />
                    <? } ?>  
                    <?php if(get_field('pdf_title_1')) { ?>   
                        <div class="table-footer">
                            <span class="pdf-link"><a href="<?=the_field('pdf_2_link');?>" target="_blank"><img src="/wp-content/themes/drmk/images/PDFlogo.png" alt="pdf" class="PDF_LogoLink"><?=the_field('pdf_2_title');?></a></span>
                        </div><br />
                    <? } ?>    
      
                    <?php endwhile; ?>
                <?php endif; ?>
                </section>
            </article>
        </div>
    </div>
</div>

<?php get_footer(); ?>