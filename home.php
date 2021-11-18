<?
/**
 * Template Name: Home Page
 * Template Post Type: page
 */

get_header()
?>

<main>
    <div class="main-container">
        <section class="title">
            <h1 class="title__head"><?php the_field('title-head'); ?></h1>
            <p class="title__text"><?php the_field('title-text'); ?></p>
        </section>
        <section class="filter">
            <form class="filter__wrap" role="search" method="GET" id="filterform"
                action="<?php bloginfo('siteurl'); ?>">

                <div class="filter__wrap--input ">
                    <input type="text" id="filter-input" name="filter-input" class="filter__input"
                        placeholder="Search job openings" value="">
                    <div class="filter__input-del"></div>

                </div>
                <div class="filter__wrap--dropdown">
                    <button type="button" class="dropdown__btn dropdown-department-btn"
                        data-title="All Departments"><?=  _e('All
                        departments','mydomain'); ?></button>
                    <div class="dropdown__wrapper dropdown-location-btn">
                        <div class="dropdown__content">
                        <span class="dropdown__item--head "><?=  _e('Departments','mydomain'); ?></span>
                        <ul class="dropdown__items">
                            <?php 
                                $args = [
                                        'taxonomy'      => [ 'department' ], 
                                        'orderby'       => 'id',
                                        'order'         => 'ASC',
                                        'hide_empty'    => false,
                                        'object_ids'    => null,
                                        'fields'        => 'all',
                                        'count'         => true,
                                        'update_term_meta_cache' => true,
                                    ];

                                $departments = get_terms( $args );

                                foreach( $departments as $department ){
                                    echo "<li class='dropdown__item'><input id='department_{$department->term_id}' type='checkbox' name='department_{$department->term_id}' class='dropdown__checkbox' data-title='{$department->name}'  ><label for='department_{$department->term_id}'>{$department->name}<span>{$department->count}</span></label></li>";
                                }
                            ?>
                        </ul>
                        </div>
                        
                    </div>

                </div>
                <div class="filter__wrap--dropdown filter__wrap--dropdown-last">
                    <button type="button" class="dropdown__btn"
                        data-title="All offices"><?=  _e('All locations','mydomain'); ?></button>
                    <div class="dropdown__wrapper dropdown__wrapper--double">
                        <div class="dropdown__content">
                            <span class="dropdown__item--head"><?=  _e('Offices','mydomain'); ?></span>
                            <ul class="dropdown__items">
                                <?php 
                                $args_2 = [
                                            'taxonomy'      => [ 'offices' ], 
                                            'orderby'       => 'id',
                                            'order'         => 'ASC',
                                            'hide_empty'    => false,
                                            'object_ids'    => null,
                                            'fields'        => 'all',
                                            'count'         => true,
                                            'update_term_meta_cache' => true, 
                                        ];

                                $offices = get_terms( $args_2 );

                                foreach( $offices as $office ){
                                    echo "<li class='dropdown__item'><input id='office_{$office->term_id}' name='office_{$office->term_id}' type='checkbox' class='dropdown__checkbox' data-title='{$office->name}'><label for='office_{$office->term_id}'>{$office->name}<span>{$office->count}</span></label></li>";
                                }
                                ?>
                                <li class='dropdown__item'><label class="checkbox-toggle-label"><input
                                            type='checkbox' class="dropdown__checkbox--toggle">
                                        <span class="toggle toggle-select "><?=  _e('Select all','mydomain'); ?></span>
                                        <span
                                            class="toggle toggle-deselect"><?=  _e('Deselect all','mydomain'); ?></span></label>
                                </li>
                            </ul>
                        </div>
                         <div class="dropdown__content dropdown__content--academy">
                             <span class="dropdown__item--head "><?=  _e('Academies','mydomain'); ?></span>
                        <ul class="dropdown__items">
                            <?php 
                                $args_3 = [
                                            'taxonomy'      => [ 'academies' ], 
                                            'orderby'       => 'id',
                                            'order'         => 'ASC',
                                            'hide_empty'    => false,
                                            'object_ids'    => null,
                                            'fields'        => 'all',
                                            'count'         => true,
                                            'update_term_meta_cache' => true, 
                                        ];

                                $academies = get_terms( $args_3 );

                                foreach( $academies as $academy ){
                                    echo "<li class='dropdown__item'><input id='academy_{$academy->term_id}' name='academy_{$academy->term_id}' type='checkbox' class='dropdown__checkbox' data-title='{$academy->name}'><label for='academy_{$academy->term_id}'>{$academy->name}<span>{$academy->count}</span></label></li>";
                                }
                                ?>
                            <li class="dropdown__item"><label class="checkbox-toggle-label"><input
                                        type='checkbox' class="dropdown__checkbox--toggle"><span
                                        class="toggle toggle-select "><?=  _e('Select all','mydomain'); ?></span><span
                                        class='toggle toggle-deselect'><?=  _e('Deselect all','mydomain'); ?></span></label>
                            </li>
                        </ul>
                         </div>       
                        
                    </div>
                </div>
                <button type="submit" id="filter-btn"></button>
                <input type="hidden" name="action" value="myfilter">
            </form>
            <div class="filter__posts">
                <div class="filter__tags">
                    <?php 
                                $args_4 = [
                                        'taxonomy'      => [ 'tags' ], 
                                        'orderby'       => 'id',
                                        'order'         => 'ASC',
                                        'hide_empty'    => false,
                                        'object_ids'    => null,
                                        'fields'        => 'all',
                                        'count'         => true,
                                        'update_term_meta_cache' => true, 
                                    ];

                                $tags = get_terms( $args_4 );

                                foreach( $tags as $tag ){
                                    echo "<button type='button' class='filter__tag filter__tag-btn' data-filter='.{$tag->slug}'> {$tag->name}<span>{$tag->count}</span></button>";
                                }
                            ?>
                    <button type="button" class="filter__tag tag-more"><?=  _e('more','mydomain'); ?></button>

                    <div class="filter__tag-layout-mode">
                        <button type="button"
                            class="filter__tag filter__tag-layout-item filter__tag-layout-item--active grid">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="12px" height="12px">
                                <path fill-rule="evenodd" fill="rgb(188, 32, 75)"
                                    d="M10.686,11.502 L8.212,11.502 C7.509,11.502 6.941,10.915 6.941,10.190 L6.941,8.283 C6.941,7.558 7.509,6.971 8.212,6.971 L10.686,6.971 C11.389,6.971 11.958,7.558 11.958,8.283 L11.958,10.190 C11.958,10.915 11.389,11.502 10.686,11.502 ZM10.686,5.029 L8.212,5.029 C7.509,5.029 6.941,4.442 6.941,3.717 L6.941,1.810 C6.941,1.085 7.509,0.498 8.212,0.498 L10.686,0.498 C11.389,0.498 11.958,1.085 11.958,1.810 L11.958,3.717 C11.958,4.442 11.389,5.029 10.686,5.029 ZM3.788,11.502 L1.314,11.502 C0.611,11.502 0.042,10.915 0.042,10.190 L0.042,8.283 C0.042,7.558 0.611,6.971 1.314,6.971 L3.788,6.971 C4.491,6.971 5.059,7.558 5.059,8.283 L5.059,10.190 C5.059,10.915 4.491,11.502 3.788,11.502 ZM3.788,5.029 L1.314,5.029 C0.611,5.029 0.042,4.442 0.042,3.717 L0.042,1.810 C0.042,1.085 0.611,0.498 1.314,0.498 L3.788,0.498 C4.491,0.498 5.059,1.085 5.059,1.810 L5.059,3.717 C5.059,4.442 4.491,5.029 3.788,5.029 Z" />
                            </svg>
                        </button>
                        <button type="button" class="filter__tag filter__tag-layout-item list">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="14px" height="10px">
                                <path fill-rule="evenodd" opacity="0.702" fill="rgb(61, 57, 53)"
                                    d="M12.871,0.917 C12.870,0.917 12.869,0.917 12.868,0.917 C12.828,0.916 8.924,0.893 7.217,0.925 C6.770,0.933 6.095,0.936 5.357,0.936 C3.468,0.936 1.156,0.917 1.124,0.917 C0.869,0.914 0.664,0.709 0.666,0.458 C0.668,0.208 0.875,0.007 1.128,0.007 C1.130,0.007 1.131,0.007 1.132,0.007 C1.177,0.008 5.620,0.046 7.200,0.016 C8.918,-0.015 12.834,0.007 12.873,0.007 C13.129,0.009 13.334,0.214 13.333,0.465 C13.331,0.715 13.125,0.917 12.871,0.917 ZM6.970,4.519 C8.740,4.576 12.506,4.547 12.544,4.547 C12.545,4.547 12.546,4.547 12.547,4.547 C12.797,4.547 13.000,4.755 13.001,5.013 C13.003,5.272 12.801,5.484 12.550,5.485 C12.532,5.486 11.594,5.493 10.436,5.493 C9.255,5.493 7.844,5.485 6.941,5.457 C5.393,5.408 1.001,5.457 0.957,5.457 C0.719,5.462 0.500,5.252 0.498,4.993 C0.495,4.734 0.696,4.521 0.947,4.518 C1.128,4.516 5.401,4.469 6.970,4.519 ZM1.128,9.071 C1.130,9.071 1.131,9.071 1.132,9.071 C1.177,9.072 5.620,9.110 7.200,9.080 C8.918,9.048 12.834,9.072 12.873,9.071 C13.129,9.073 13.334,9.278 13.333,9.528 C13.331,9.779 13.125,9.980 12.871,9.980 C12.870,9.980 12.869,9.980 12.868,9.980 C12.828,9.980 8.925,9.957 7.217,9.989 C6.772,9.997 6.103,10.000 5.369,10.000 C3.478,10.000 1.157,9.981 1.124,9.980 C0.869,9.978 0.664,9.773 0.666,9.522 C0.668,9.272 0.875,9.071 1.128,9.071 Z" />
                            </svg>
                        </button>
                    </div>

                </div>
                <div class="filter__items  ">
                    <div class=" filter__head-items">
                        <span class="left-col"><i></i><?=  _e('Openings','mydomain'); ?></span>
                        <div class="right-col">
                            <span class="col-department"><?=  _e('Department','mydomain'); ?></span>
                            <span class="col-location"><?=  _e('Location','mydomain'); ?></span>
                            <span class="col-tags"><?=  _e('Tags','mydomain'); ?></span>
                            <span class="col-client"><?=  _e('Client','mydomain'); ?></span>
                        </div>
                    </div>
                    <?
                         // параметры по умолчанию
                        $posts = get_posts( array(
                            'numberposts' => -1,
                            'category'    => 0,
                            'orderby'     => 'date',
                            'order'       => 'ASC',
                            'include'     => array(),
                            'exclude'     => array(),
                            
                            'post_type'   => 'vacancy',
                            'suppress_filters' => true, 
                        ) );

                        foreach( $posts as $post ){
                            setup_postdata($post);
                            get_template_part( 'template-parts/content-job-posts');
                            
                    }

                        wp_reset_postdata(); 
                         ?>
                </div>
            </div>


        </section>
    </div>
    <section class="contact-us main-container">
        <div class="contact-us__wrap">
            <h2 class="contact-us__title"><?php the_field('contact_us_text'); ?></h2>
            <a href="#" class="contact-us__btn"><?php the_field('contact_us_btn') ?></a>
        </div>


    </section>
</main>

<? get_footer() ?>