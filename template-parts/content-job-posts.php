<?php
/**
 * Template part for displaying blog posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Beetroot_test-task
 */

?>


<? $vacancy_direction = get_field('direction_of_vacancy');
    $direction_check = $vacancy_direction == 'Beetroot SE' ? 'offices' :  'academies';
    $tags_list = wp_get_post_terms( $post->ID, 'tags' , array('fields' => 'slugs') );
    $tags_list_string = implode(" ",$tags_list); 

                             ?>

<article class="filter__item <? echo " $direction_check $tags_list_string" ?>">
    <div class="filter__item-head ">
        <h3 class="filter__item-caption">
            <? the_title() ?>
        </h3>
        <?
                                    $hot_badge = get_field('hot_deal_label');
                                    $result_hot =  $hot_badge ? "<div class='filter__item-hot'>Hot</div>" : "";
                                    
                                    $company_logo = get_field('company_logo');
                                    $result_logo = $company_logo ? "<img src='{$company_logo}' alt='' class='filter__item-logo'>" : "";
                                     echo $result_hot,$result_logo
                                      ?>

    </div>
    <div class="filter__item-body">
        <p class="filter__item-description">
            <? the_field('vacancy_description') ?>
        </p>
    </div>
    <div class="filter__item-footer">
        <a href="<? the_permalink() ?>" class="filter__item-arrow-link">
            <?=  _e('Details','mydomain'); ?>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="29px"
                height="6px">
                <path fill-rule="evenodd" fill="rgb(188, 32, 75)"
                    d="M23.991,4.112 C22.990,4.380 20.070,5.210 19.823,5.064 C19.676,4.977 19.591,4.065 19.569,3.071 C17.500,3.093 13.275,3.139 10.365,3.185 C9.159,3.205 7.801,3.308 6.398,3.310 C4.596,3.313 2.734,3.456 1.019,3.456 C1.015,3.456 1.011,3.456 1.007,3.456 C0.736,3.456 0.514,3.143 0.508,2.876 C0.501,2.605 0.719,2.329 0.995,2.323 C2.721,2.283 4.589,2.255 6.396,2.252 C7.794,2.249 9.147,2.235 10.349,2.215 C13.265,2.168 17.501,2.118 19.567,2.094 C19.584,1.239 19.651,0.508 19.767,0.417 C19.931,0.288 22.754,0.913 23.663,1.092 C24.573,1.270 29.000,2.281 29.000,2.538 C29.000,2.827 24.992,3.845 23.991,4.112 Z" />
            </svg>
        </a>
        <div class="filter__item-department-tag">
            <?  $department_list = wp_get_post_terms( $post->ID, 'department' );
                foreach( $department_list as $department){
                echo  "<span class='filter__item-tag'>{$department->name}</span>";
                } 

                                   ?>
        </div>
        <div class="filter__item-location">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="11px"
                height="16px">
                <path fill-rule="evenodd" fill="rgb(224, 98, 135)"
                    d="M6.773,14.916 C6.533,15.304 6.632,15.154 6.405,15.530 C6.302,15.700 6.110,15.781 5.927,15.750 C5.870,15.740 5.814,15.719 5.762,15.687 C5.640,15.611 5.567,15.488 5.546,15.356 C5.370,15.245 5.198,14.838 5.109,14.667 C4.895,14.259 4.670,13.841 4.441,13.416 C2.856,10.476 0.802,8.680 0.948,5.279 C1.007,3.887 1.566,2.660 2.519,1.824 C3.436,1.020 4.654,0.650 5.949,0.782 C8.703,1.063 10.639,3.446 10.555,6.450 C10.454,10.073 8.620,11.926 6.773,14.916 ZM6.144,1.764 C6.049,1.747 5.953,1.734 5.855,1.724 C4.819,1.619 3.851,1.908 3.131,2.540 C2.374,3.203 1.930,4.191 1.882,5.320 C1.747,8.458 3.735,10.131 5.261,12.962 C5.493,13.391 5.719,13.812 5.935,14.223 C5.965,14.280 5.982,14.341 5.988,14.402 C7.769,11.517 9.527,9.785 9.621,6.424 C9.687,4.038 8.241,2.126 6.144,1.764 ZM6.978,6.984 C6.625,7.239 6.112,7.324 5.546,7.226 C5.466,7.213 5.385,7.195 5.303,7.174 C4.737,7.028 4.033,6.663 3.754,6.079 C3.496,5.540 3.587,4.940 4.004,4.436 C4.561,3.762 5.556,3.393 6.270,3.595 C6.732,3.727 7.039,4.082 7.112,4.570 C7.131,4.698 7.101,4.822 7.036,4.923 C7.307,5.298 7.507,5.716 7.473,6.138 C7.454,6.374 7.353,6.712 6.978,6.984 ZM5.544,4.752 C5.503,4.710 5.465,4.672 5.430,4.636 C5.188,4.725 4.938,4.880 4.769,5.084 C4.526,5.378 4.617,5.568 4.652,5.640 C4.737,5.819 5.081,6.074 5.550,6.195 C5.958,6.301 6.269,6.255 6.397,6.162 C6.475,6.106 6.477,6.073 6.479,6.057 C6.506,5.721 5.807,5.017 5.544,4.752 Z" />
            </svg>
            <div class="filter__item-location-tags filter__item-tags">
                <?php  
                $term_list = wp_get_post_terms( $post->ID, $direction_check, array('fields' => 'names') );

                foreach( $term_list as $term ){
                echo "<span class='filter__item-location-tag filter__item-tag'>{$term}<i>,&nbsp;</i></span>";   
                }
                ?>
            </div>
        </div>
        <div class="filter__item-tags">
            <?
            $tags_list = wp_get_post_terms( $post->ID, 'tags' );
                foreach( $tags_list as $tag){
                    echo "<div class='filter__item-tag' data-tag='{$tag->name}'>
                            <span>{$tag->name}<i>,&nbsp;</i></span>
                            <svg class='filter__item-tag-icon' >
                            <use href='#{$tag->name}'  ></use>
                            </svg>
                            </div>";   
                }

                
                    ?>

        </div>
        <div class="filter__item-logo--footer">
            <?
            $company_logo = get_field('company_logo');
            $result_logo = $company_logo ? "<img src='{$company_logo}' alt='' class='filter__item-logo'>" : "";
                echo $result_logo 

                ?>
        </div>
    </div>


</article>