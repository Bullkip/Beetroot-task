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
					// menu beetroot header
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
					 // menu company header
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
                   
				 //  menu info header
				$menu_footer_3_id = 5;
				$nav_menu = wp_get_nav_menu_object( $menu_ID );
				wp_nav_menu(
					array(
						'theme_location' => 'menu-footer_3',
						'menu_id'        => 'footer-pages',
						'container'       => '',
						'container_class' => 'footer__navigation-wrap',
						'items_wrap'      => '<ul id="%1$s" class="footer-navigation-menu"><li class="footer-navigation-menu__item footer-navigation-menu__item-head">'.$menu_footer_3->name.'</li>%3$s</ul>',
					)
				);
					?>

        </nav>
        <div class="footer-media">
            <ul class="footer-socials">
                <li class="footer-socials__item">
                    <a href="https://www.facebook.com/beetrootukraine/">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" width="46px" height="45px">
                            <path fill-rule="evenodd" opacity="0.302" fill="rgb(255, 255, 255)"
                                d="M22.989,-0.000 C12.813,0.128 0.494,6.042 0.093,21.854 C-0.309,37.666 10.665,45.117 23.792,44.994 C24.301,44.989 23.060,44.975 23.558,44.951 C36.425,44.334 45.539,37.295 45.079,21.083 C44.697,7.643 33.550,0.579 22.905,0.032 C22.350,0.004 23.540,-0.007 22.989,-0.000 Z" />
                            <path fill-rule="evenodd" fill="rgb(61, 57, 53)"
                                d="M24.581,33.187 L24.581,23.951 L27.727,23.951 L28.198,20.351 L24.581,20.351 L24.581,18.052 C24.581,17.010 24.874,16.300 26.391,16.300 L28.325,16.299 L28.325,13.079 C27.990,13.035 26.842,12.937 25.507,12.937 C22.718,12.937 20.808,14.615 20.808,17.696 L20.808,20.351 L17.654,20.351 L17.654,23.951 L20.808,23.951 L20.808,33.187 L24.581,33.187 Z" />
                        </svg>
                    </a>
                </li>
                <li class="footer-socials__item">
                    <a href="https://twitter.com/beetroot_se">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" width="46px" height="45px">
                            <path fill-rule="evenodd" opacity="0.302" fill="rgb(255, 255, 255)"
                                d="M22.973,-0.000 C12.797,0.128 0.479,6.042 0.077,21.854 C-0.325,37.666 10.649,45.117 23.777,44.994 C24.285,44.989 23.045,44.975 23.543,44.951 C36.410,44.334 45.523,37.295 45.063,21.083 C44.681,7.643 33.535,0.579 22.889,0.032 C22.334,0.004 23.524,-0.007 22.973,-0.000 Z" />
                            <path fill-rule="evenodd" fill="rgb(61, 57, 53)"
                                d="M32.934,17.369 C32.248,17.681 31.670,17.691 31.056,17.383 C31.847,16.900 31.883,16.561 32.169,15.649 C31.429,16.097 30.608,16.422 29.736,16.597 C29.039,15.840 28.043,15.365 26.942,15.365 C24.826,15.365 23.111,17.113 23.111,19.267 C23.111,19.572 23.145,19.870 23.210,20.156 C20.027,19.994 17.204,18.440 15.315,16.080 C14.985,16.655 14.797,17.326 14.797,18.041 C14.797,19.395 15.474,20.589 16.500,21.288 C15.872,21.268 15.282,21.093 14.766,20.800 C14.765,20.817 14.765,20.832 14.765,20.850 C14.765,22.740 16.086,24.316 17.839,24.675 C17.277,24.830 16.686,24.855 16.108,24.743 C16.596,26.292 18.011,27.420 19.687,27.452 C18.047,28.760 16.015,29.305 14.015,29.066 C15.711,30.173 17.723,30.819 19.887,30.819 C26.932,30.819 30.785,24.874 30.785,19.719 C30.785,19.549 30.782,19.381 30.774,19.214 C31.522,18.665 32.421,18.152 32.934,17.369 Z" />
                        </svg>
                    </a></li>
                <li class="footer-socials__item">
                    <a href="https://www.linkedin.com/company/beetroot-se/">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" width="46px" height="45px">
                            <path fill-rule="evenodd" opacity="0.302" fill="rgb(255, 255, 255)"
                                d="M23.817,-0.000 C13.641,0.128 1.322,6.042 0.921,21.854 C0.519,37.666 11.493,45.117 24.620,44.994 C25.129,44.989 23.888,44.975 24.386,44.951 C37.253,44.334 46.367,37.295 45.907,21.083 C45.525,7.643 34.378,0.579 23.733,0.032 C23.178,0.004 24.368,-0.007 23.817,-0.000 Z" />
                            <path fill-rule="evenodd" fill="rgb(61, 57, 53)"
                                d="M28.830,30.935 L28.830,24.842 C28.830,23.312 28.288,22.268 26.934,22.268 C25.901,22.268 25.285,22.972 25.015,23.652 C24.916,23.895 24.891,24.235 24.891,24.575 L24.891,30.935 L21.150,30.935 C21.150,30.935 21.199,20.616 21.150,19.547 L24.891,19.547 L24.891,21.161 C24.884,21.173 24.874,21.186 24.866,21.198 L24.891,21.198 L24.891,21.161 C25.388,20.385 26.276,19.279 28.263,19.279 C30.725,19.279 32.571,20.907 32.571,24.405 L32.571,30.935 L28.830,30.935 ZM17.208,17.992 L17.184,17.992 C15.928,17.992 15.116,17.117 15.116,16.024 C15.116,14.907 15.953,14.056 17.233,14.056 C18.513,14.056 19.301,14.907 19.325,16.024 C19.325,17.117 18.513,17.992 17.208,17.992 ZM19.079,30.935 L15.338,30.935 L15.338,19.547 L19.079,19.547 L19.079,30.935 Z" />
                        </svg>
                    </a></li>
                <li class="footer-socials__item"><a href="https://www.instagram.com/beetroot.se/">
                    <svg xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" width="46px" height="45px">
                            <path fill-rule="evenodd" opacity="0.302" fill="rgb(255, 255, 255)"
                                d="M23.801,-0.000 C13.625,0.128 1.307,6.042 0.905,21.854 C0.503,37.666 11.477,45.117 24.605,44.994 C25.113,44.989 23.873,44.975 24.371,44.951 C37.237,44.334 46.351,37.295 45.891,21.083 C45.509,7.643 34.363,0.579 23.717,0.032 C23.162,0.004 24.352,-0.007 23.801,-0.000 Z" />
                            <path fill-rule="evenodd" fill="rgb(61, 57, 53)"
                                d="M33.750,27.072 C33.699,28.179 33.523,28.936 33.266,29.598 C33.000,30.282 32.644,30.863 32.066,31.441 C31.487,32.020 30.907,32.375 30.223,32.641 C29.561,32.898 28.804,33.074 27.697,33.125 C26.587,33.176 26.232,33.187 23.406,33.187 C20.580,33.187 20.226,33.176 19.116,33.125 C18.008,33.074 17.252,32.898 16.590,32.641 C15.905,32.375 15.325,32.020 14.747,31.441 C14.168,30.863 13.812,30.282 13.546,29.598 C13.289,28.936 13.113,28.179 13.063,27.072 C13.012,25.962 13.000,25.608 13.000,22.781 C13.000,19.955 13.012,19.601 13.063,18.491 C13.113,17.383 13.289,16.627 13.546,15.964 C13.812,15.280 14.168,14.700 14.747,14.121 C15.325,13.543 15.905,13.187 16.590,12.921 C17.252,12.664 18.008,12.488 19.116,12.437 C20.226,12.387 20.580,12.375 23.406,12.375 C26.232,12.375 26.587,12.387 27.697,12.437 C28.804,12.488 29.561,12.664 30.223,12.921 C30.907,13.187 31.487,13.543 32.066,14.121 C32.644,14.700 33.000,15.280 33.266,15.964 C33.523,16.627 33.699,17.383 33.750,18.491 C33.801,19.601 33.812,19.955 33.812,22.781 C33.812,25.608 33.801,25.962 33.750,27.072 ZM31.877,18.576 C31.831,17.561 31.661,17.011 31.519,16.644 C31.330,16.158 31.104,15.812 30.740,15.447 C30.376,15.083 30.029,14.857 29.544,14.669 C29.177,14.526 28.626,14.357 27.611,14.311 C26.514,14.261 26.185,14.250 23.406,14.250 C20.628,14.250 20.299,14.261 19.201,14.311 C18.187,14.357 17.636,14.526 17.269,14.669 C16.783,14.857 16.437,15.083 16.072,15.447 C15.708,15.812 15.483,16.158 15.294,16.644 C15.152,17.011 14.982,17.561 14.936,18.576 C14.886,19.674 14.875,20.003 14.875,22.781 C14.875,25.560 14.886,25.889 14.936,26.986 C14.982,28.001 15.152,28.552 15.294,28.918 C15.483,29.404 15.708,29.751 16.072,30.115 C16.437,30.479 16.783,30.705 17.269,30.894 C17.636,31.036 18.187,31.206 19.201,31.252 C20.298,31.302 20.627,31.312 23.406,31.312 C26.185,31.312 26.514,31.302 27.611,31.252 C28.626,31.206 29.177,31.036 29.544,30.894 C30.029,30.705 30.376,30.479 30.740,30.115 C31.104,29.751 31.330,29.404 31.519,28.918 C31.661,28.552 31.831,28.001 31.877,26.986 C31.927,25.889 31.938,25.560 31.938,22.781 C31.938,20.003 31.927,19.674 31.877,18.576 ZM28.961,18.475 C28.272,18.475 27.712,17.916 27.712,17.226 C27.712,16.537 28.272,15.977 28.961,15.977 C29.651,15.977 30.210,16.537 30.210,17.226 C30.210,17.916 29.651,18.475 28.961,18.475 ZM23.406,28.125 C20.455,28.125 18.063,25.732 18.063,22.781 C18.063,19.830 20.455,17.437 23.406,17.437 C26.358,17.437 28.750,19.830 28.750,22.781 C28.750,25.732 26.358,28.125 23.406,28.125 ZM23.406,19.312 C21.490,19.312 19.937,20.865 19.937,22.781 C19.937,24.697 21.490,26.250 23.406,26.250 C25.322,26.250 26.875,24.697 26.875,22.781 C26.875,20.865 25.322,19.312 23.406,19.312 Z" />
                        </svg>
                </a></li>
            </ul>
            <div class="footer-subscribe">
				<?php echo do_shortcode( '[contact-form-7 id="5" title="Subscribe form"]' ) ?>
			</div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

</body>




</html>


