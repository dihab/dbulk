<?php




function dbulk_edit_products_page_html(){
?>

<section class="dbulk_edit_products_page">

    <div class="edit_products_table_container">
        <table class="edit_products_table">
            <tr class="heading_row">
                <th class="col_head_id col-head w5"><?php esc_html_e('ID','dbulk'); ?></th>
                <th class="col_head_img col-head w7"><?php esc_html_e('IMAGE','dbulk'); ?></th>
                <th class="col_head_sku col-head w7"><?php esc_html_e('SKU','dbulk'); ?></th>
                <th class="col_head_title col-head w15"><?php esc_html_e('TITLE','dbulk'); ?></th>
                <th class="col_head_type col-head w5"><?php esc_html_e('TYPE','dbulk'); ?></th>
                <th class="col_head_short_desc col-head w7"><?php esc_html_e('SHORT__DESC','dbulk'); ?></th>
                <th class="col_head_description col-head w7"><?php esc_html_e('DESCRIPTION','dbulk'); ?></th>
                <th class="col_head_tag col-head w7"><?php esc_html_e('TAGS','dbulk'); ?></th>
                <th class="col_head_category col-head w7"><?php esc_html_e('CATEGORY','dbulk'); ?></th>
                <th class="col_head_publish_date col-head w7"><?php esc_html_e('PUBLISH DATE','dbulk'); ?></th>
                <th class="col_head_status col-head w5"><?php esc_html_e('STATUS','dbulk'); ?></th>
                <th class="col_head_galley col-head w5"><?php esc_html_e('GALLERY','dbulk'); ?></th>
                <th class="col_head_url col-head w7"><?php esc_html_e('PRODUCT__URL','dbulk'); ?></th>
                <th class="col_head_featured col-head w5"><?php esc_html_e('FEATURED','dbulk'); ?></th>
                <th class="col_head_reg_price col-head w5"><?php esc_html_e('REGULAR_PRICE','dbulk'); ?></th>
                <th class="col_head_sale_price col-head w5"><?php esc_html_e('SALE_PRICE','dbulk'); ?></th>
                <th class="col_head_sale_form col-head w5"><?php esc_html_e('SALE FORM','dbulk'); ?></th>
                <th class="col_head_sale_to col-head w5"><?php esc_html_e('SALE TO','dbulk'); ?></th>
                <th class="col_head_stock col-head w5"><?php esc_html_e('TOTAL_STOCK','dbulk'); ?></th>
            </tr>

            <!--start php loop of products  -->
            <?php
                    /// Get all product type
                    $product_types = wc_get_product_types();
                    $product_statuses = get_post_statuses();
                    //print_r($product_statuses);
                    

                    $args = [
                   // 'status' => array( 'draft', 'pending', 'private', 'publish' ),  
                    //'type' => array_merge( array_keys( wc_get_product_types() ) ),  
                    //'parent' => null,  
                    //'sku' => '',  
                   // 'category' => array(),  
                    //'tag' => array(),  
                    'limit' => get_option( 'posts_per_page' ),  
                    //'offset' => null,  
                    //'page' => 1,  
                   // 'include' => array(),  
                    //'exclude' => array(),  
                    'orderby' => 'date',  
                    'order' => 'DESC',  
                    'return' => 'objects',  
                    'paginate' => false,  
                    'shipping_class' => array(), 
                    ]; 
                    $products = wc_get_products($args); 

                    foreach($products as $product){
                     ?>
                        <tr>
                            <td class="td_id center">
                                <?php esc_html_e($product->get_id(),'dbulk'); ?>
                            </td>
                            <td class="td_img">
                                <img src="<?php echo wp_get_attachment_image_url($product->get_image_id()); ?>" alt="">
                            </td>
                            <td class="td_sku">
                                <input type="text" name="" id="" value="32155">
                            </td>
                            <td class="td_title">
                                <input type="text" name="" id="" value="<?php echo $product->get_name(); ?>">
                            </td>
                            <td class="td_type">
                                <select name="<?php $product->get_id() ?>" id="">
                                    <?php 
                                        foreach($product_types as $value=>$type){
                                            ?>
                                            <option value="<?php esc_attr_e($value, 'dbulk' )?>" <?php echo $value ==$product->get_type()?'selected':" " ?> >
                                            <?php esc_html_e($type,"dbulk")  ?>
                                            </option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </td>
                            <td class="td_short_desc"><span class="center"><?php esc_html_e('short desc','dbulk'); ?></span></td>
                            <td class="td_desc"><span class="center"><?php esc_html_e('description','dbulk'); ?></span></td>
                            <td class="td_tag"><span class="center"><?php esc_html_e('TAGS','dbulk'); ?></span></td>
                            <td class="td_category"><span class="center"><?php esc_html_e('Category','dbulk'); ?></span></td>

                            <td class="td_publish_date">
                                <span class="center">
                                <input type="date" name="" id="" value="<?php echo date( 'Y-m-d', strtotime( $product->get_date_created() )) ?>">
                                </span>
                            </td>

                            <td class="td_status">
                                <select name="" id="">
                                    <?php
                                        foreach($product_statuses as $value=>$status)
                                        {
                                            ?>
                                            <option value="<?php echo $product->get_status(); ?>" 
                                                <?php echo $product->get_status()==$value?'selected':" "; ?> >
                                                <?php _e($status,'dbilk'); ?>
                                            </option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </td>

                            <td class="td_gallery">
                                <span class="center">
                                    <?php esc_html_e('GALLERY','dbulk'); ?>
                                </span>
                            </td>

                            <td class="td_url">
                                <span class="center">
                                    <input type="url" name="" id="" value="<?php echo esc_url_raw(get_permalink( $product->get_id() )) ?>">
                                 </span>
                            </td>

                            <td class="td_featured">
                                <span class="center">
                                <input type="checkbox" name="" id="" <?php echo $product->get_featured()==1?'checked':""; ?>>
                                </span>
                            </td>

                            <td class="td_regular_price"><span class="center"><input type="number" name="" id="" value="<?php echo $product->get_regular_price() ?>"></span></td>

                            <td class="td_sale_price">
                                <span class="center">
                                <input type="number" name="" id="" value="<?php echo $product->get_sale_price(); ?>">
                                </span>
                            </td>

                            <td class="td_sale_form"><span class="center"><input type="date" name="" id="" value="<?php echo date( 'Y-m-d', strtotime( $product->get_date_on_sale_from())) ?>"></span></td>

                            <td class="td_sale_to"><span class="center"><input type="date" name="" id="" value="<?php echo date( 'Y-m-d', strtotime($product->get_date_on_sale_to())) ?>"></span></td>
                            <td class="td_stock_amount"><span class="center"><input type="number" name="" id="" value="<?php echo $product->get_stock_quantity(); ?>"></span></td>
                            
                        </tr>
                     
                     <?php

                    }
            ?>
           
           
        </table>
    </div>

</section>





<?php
}



?>