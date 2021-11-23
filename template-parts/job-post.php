<?php
/**
 * Template part for displaying job post.
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
<main>
    <article class="post">
        <header class="post__header">
            <div class="main-container main-container--onlypost">
                <h1 class="post__title">
                    <? the_title(); ?>
                </h1>
                <p class="post__short-description"><?php the_field('job_post_shrt_descr')?></p>
                <div class="post__header-menu">
                    <a href="#" class="post__header-btn"><?php _e('Apply now'); ?></a>
                    <div class="post__locations">
                        <?php  
                    $term_list = wp_get_post_terms( $post->ID, $direction_check, array('fields' => 'names') );
                    foreach( $term_list as $term ){
                    echo "<span class='post__location'>{$term} <i>&nbsp;& &nbsp;</i></span>";   
                    }
                ?>
                    </div>
                    <div class="post__tags">
                        <?php
                    $tags_list = wp_get_post_terms( $post->ID, 'tags' );
                    foreach( $tags_list as $tag){
                            echo "<div class='post__tag {$tag->name}'>
                                <svg class='post__icon' >
                                <use href='#{$tag->name}'></use>
                                </svg>
                                </div>";   
                                }
                                ?>
                    </div>
                    <div class="post__company-logo">
                        <?
                                 $company_logo = get_field('company_logo');
                                    $result_logo = $company_logo ? "<img src='{$company_logo}' alt='' class='filter__item-logo'>" : "";
                                     echo $result_logo 

                                     ?>
                    </div>
                </div>
            </div>
        </header>
        <div class="post__content">
             <div class="main-container main-container--onlypost">
                            </div>
        </div>
        <footer class="post__footer">
             <div class="main-container main-container--onlypost">
                            </div>
        </footer>
        </div>
    </article>
</main>