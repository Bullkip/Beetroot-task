<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Beetroot_test-task
 */

?>

<footer class="footer">
    <div class="footer-container main-container">
        <nav class="footer-menus">
            <?php
					// menu beetroot 
					$menu_footer_1_id = 3;
					$menu_footer_1 = wp_get_nav_menu_object( $menu_footer_1_id ); 
					wp_nav_menu(
						array(
							'theme_location' => 'menu-footer_1',
							'menu_id'        => 'footer-beetroot',
							'container'       => '',
							'container_class' => 'footer__navigation-wrap',
							'items_wrap'      => '<ul id="%1$s" class="footer-navigation-menu"><li class="footer-navigation-menu__item footer-navigation-menu__item-head">'.$menu_footer_1->name.'</li>%3$s</ul>',
						)
					);
					 // menu company 
					$menu_footer_2_id = 4;
					$menu_footer_2 = wp_get_nav_menu_object( $menu_footer_2_id ); 
					wp_nav_menu(
						array(
							'theme_location' => 'menu-footer_2',
							'menu_id'        => 'footer-company',
							'container'       => '',
							'container_class' => 'footer__navigation-wrap',
							'items_wrap'      => '<ul id="%1$s" class="footer-navigation-menu"><li class="footer-navigation-menu__item footer-navigation-menu__item-head">'.$menu_footer_2->name.'</li>%3$s</ul>',
						)
					);
                   
				 //  menu info 
				
				wp_nav_menu(
					array(
						'theme_location' => 'menu-footer_3',
						'menu_id'        => 'footer-pages',
						'container'       => '',
						'container_class' => 'footer__navigation-wrap',
						'items_wrap'      => '<ul id="%1$s" class="footer-navigation-menu"><li class="footer-navigation-menu__item footer-navigation-menu__item-head"></li>%3$s</ul>',
					)
				);
					?>

        </nav>
        <div class="footer-media">
            <ul class="footer-socials">
                
        
                <?php 

                        while( have_rows('social_network','socials') ): the_row(); 

                        $link = get_sub_field('link');
		                $name = get_sub_field('name');
		                $icon = get_sub_field('icon');
		                $custom_name = get_sub_field('custom_name');
		                $icon_type = get_sub_field('icon_type');
		                $icon_item = get_sub_field('icon_galery');
		                $icon_url = get_sub_field('icon_url');


							if ($icon == 'library') {
								echo '<li class="footer-socials__item '.$name.'">
                                        <a href="'.$link.'">
                                            <svg width="46px" height="45px">
                                                <use href="#'.$name.'"></use>
                                            </svg>
                                        </a>
                                    </li>';
							} else {
								if ($icon_type == 'galery') {
									echo '<li class="footer-socials__item footer-socials__item--custom">
                                        <a href="'.$link.'">
										<img src="'.$icon_item.'" alt="'.$custom_name.'">
                                        </a>
                                    </li>';
								} else {
									echo '<li class="footer-socials__item footer-socials__item--custom">
                                        <a href="'.$link.'">
										<img src="'.$icon_url.'" alt="'.$custom_name.'">
                                        </a>
                                    </li>';
								}
								

							}

                                

                        endwhile;     
                            
                        
                ?>

            </ul>
            <div class="footer-subscribe">
                <?php echo do_shortcode( '[contact-form-7 id="34" title="Subscribe form"]' ) ?>
            </div>
        </div>
    </div>
</footer>
<?php get_template_part( 'template-parts/content-tag-icons'); ?>
<?php wp_footer(); ?>

</body>




</html>