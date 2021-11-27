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
    <article class="job">
        <header class="job__header">
            <div class="main-container main-container--job">
                <h1 class="job__title--head">
                    <? the_title(); ?>
                </h1>
                <p class="job__short-description"><?php the_field('job_post_shrt_descr')?></p>
                <div class="job__header-menu">
                    <a href="#" class="job__header-btn"><?php _e('Apply now'); ?></a>
                    <div class="job__locations">
                    <?php  
                        $term_list = wp_get_post_terms( $post->ID, $direction_check, array('fields' => 'names') );
                        foreach( $term_list as $term ){
                        echo "<span class='job__location'>{$term} <i>&nbsp;& &nbsp;</i></span>";   
                        }
                    ?>
                    </div>
                    <div class="job__tags">
                    <?php
                        $tags_list = wp_get_post_terms( $post->ID, 'tags' );
                        foreach( $tags_list as $tag){
                        echo "<div class='job__tag {$tag->name}'>
                                <svg class='job__icon' >
                                <use href='#{$tag->name}'></use>
                                </svg>
                                </div>";   
                            }
                    ?>
                    </div>
                    <div class="job__company-logo">
                    <?
                        $company_logo = get_field('company_logo');
                        $result_logo = $company_logo ? "<img src='{$company_logo}' alt='' class='filter__item-logo'>" : "";
                            echo $result_logo 

                    ?>
                    </div>
                </div>
            </div>
        </header>
        <div class="job__content">
            <div class="main-container main-container--job">
                <p class="job__secondary-description"><?php the_field('job_post_secondary_descr')?></p>
                <?php if (have_rows('job_post_responsebilities')): ?>
                <div class="job__responsibility job__advantages">
                    <h3 class="job__title"><?php _e('Responsibilities'); ?></h3>
                    <ul class="job__advantages-list">
                        <?php
                            while( have_rows('job_post_responsebilities') ): the_row();
                            $responsibility = get_sub_field('job_post_responsibility');
                            echo "<li class='job__advantage'>$responsibility</li>";
                            endwhile;
                        ?>
                    </ul>
                </div>
                <?php endif ?>
                <?php if (have_rows('job_post_search')): ?>
                <div class="job__looking-for job__advantages">
                    <h3 class="job__title"><?php _e('What we’re looking for'); ?></h3>
                    <ul class="job__advantages-list">
                        <?php
                            while( have_rows('job_post_search') ): the_row();
                            $search = get_sub_field('job_post_search_item');
                            echo "<li class='job__advantage'>$search</li>";
                                endwhile;
                        ?>
                    </ul>
                </div>
                <?php endif ?>
                <?php if (have_rows('job_post_bonus')): ?>
                <div class="job__bonus job__advantages">
                    <h3 class="job__title"><?php _e('Bonus'); ?></h3>
                    <ul class="job__advantages-list">
                        <?php
                            while( have_rows('job_post_bonus') ): the_row();
                            $bonus = get_sub_field('job_post_bonus_item');
                            echo "<li class='job__advantage'>$bonus</li>";
                            endwhile;
                        ?>
                    </ul>
                </div>
                <?php endif ?>
            </div>


        </div>
        <footer class="job__footer">
            <div class="benefits">
                <div class="main-container main-container--job">
                    <h3 class="job__title"><?php _e('Benefits'); ?></h3>
                    <div class="benefits__grid">
                        <?php
                            while( have_rows('benefits','vacancy_settings') ): the_row();
                            $benefit = get_sub_field('benefit_text');
                            $benefit_icon = get_sub_field('benefit_icon');
                            echo "<div class='benefit'>
                                        <svg >
                                            <use  width='60px' height='50px' href='#$benefit_icon'></use>
                                        </svg>
                                        <span>$benefit</span>
                                  </div>";
                            endwhile;
                        ?>
                    </div>
                </div>
            </div>
            <div class="main-container main-container--job">
                <div class="apply-form">
                    <h2 class="job__title--form"><?php _e('Apply for this position'); ?></h2>
                    <div class="apply-form__container">
                        <?php echo do_shortcode( get_field('job_apply_form','vacancy_settings') ) ?>
                    </div>
                </div>

            </div>
            <div class="socials">
                <div class="main-container main-container--job">
                    <div class="socials__content">
                        <h3 class="socials__title job__title--socials">
                            <?_e('Know someone who might be interested?') ?>
                        </h3>
                        <div class="socials__icons">
                            <?php
                            while( have_rows('socials','vacancy_settings') ): the_row();
                            $social__select = get_sub_field('socials_select');   
                            $social_link = get_sub_field('social_link');     
                            $social_icon = get_sub_field('social_icon');
                            $social_path = get_sub_field('social_path');
                            $social_local = get_sub_field('social_local');
                            $social_remote = get_sub_field('social_remote');

                            $custom_icon = $social_path == 'local' ? $social_local : $social_remote ;

                            if ($social__select == "icon"){
                                
                            echo "<a href='$social_link' class='socials__icon'>
                                        <svg>
                                            <use  width='100%' height='100%' href='#$social_icon'></use>
                                        </svg>
                                  </a>";
                            } else {
                              
                                
                            echo "<a href='$social_link' class='socials__icon socials__icon--custom'>
                                        <img src='$custom_icon'  class='social__img'>
                                   
                                  </a>";
                            }

                            endwhile;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        </div>
    </article>
</main>