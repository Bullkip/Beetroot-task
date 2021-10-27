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
        <section class="filter-main">
            <!-- <div class="search-main-wrap"> -->
            <form class="filter-main-wrap" role="search" method="get" id="filterform"
                action="<?php bloginfo('siteurl'); ?>">

                <div class="filter-main__input-wrap">
                    <input type="text" id="filter-input" class="filter-main__input" placeholder="Search job openings">
                    <div class="filter-main__input-del"></div>

                </div>
                <!-- <form class="search-main__input-wrap" role="search" method="get" id="searchform"
                    action="<?php bloginfo('siteurl'); ?>">

                    <label class="screen-reader-text" for="search-input">Search for:</label>
                    <input type="text" value="" name="search-input" id="searchyy" class="search-main__input"
                        placeholder="Search job openings" />
                    <input type="submit" id="searchsubmit" value="Search" />
                    <div class="search-main__input-del"></div>

                </form> -->
                <div class="filter-main__dropdown-wrap">
                    <button class="filter-main__dropdown-btn dropdown-department-btn" data-title="All Departments">All
                        Departments</button>
                    <div class="filter-main__dropdown-list-wrap dropdown-location-btn">
                        <ul class="filter-main__dropdown-list">
                            <span class="filter-main__dropdown-item--head">Departments</span>
                            <?php 
                                $args = [
                                        'taxonomy'      => [ 'department' ], // название таксономии с WP 4.5
                                        'orderby'       => 'id',
                                        'order'         => 'ASC',
                                        'hide_empty'    => false,
                                        'object_ids'    => null,
                                        'fields'        => 'all',
                                        'count'         => true,
                                        'update_term_meta_cache' => true, // подгружать метаданные в кэш
                                    ];

                                $departments = get_terms( $args );

                                foreach( $departments as $department ){
                                    echo "<li class='filter-main__dropdown-item'><input id='{$department->term_id}' type='checkbox' class='filter-main__dropdown-checkbox' data-title='{$department->name}' ><label for='{$department->term_id}'>{$department->name}<span>{$department->count}</span></label></li>";
                                }
                            ?>


                        </ul>
                    </div>

                </div>
                <div class="filter-main__dropdown-wrap">
                    <button class="filter-main__dropdown-btn" data-title="All offices">All offices</button>
                    <div class="filter-main__dropdown-list-wrap filter-main__dropdown--double-col">
                        <ul class="filter-main__dropdown-list">
                            <span class="filter-main__dropdown-item--head">Offices</span>
                            <?php 
                                $args_2 = [
                                            'taxonomy'      => [ 'offices' ], // название таксономии с WP 4.5
                                            'orderby'       => 'id',
                                            'order'         => 'ASC',
                                            'hide_empty'    => false,
                                            'object_ids'    => null,
                                            'fields'        => 'all',
                                            'count'         => true,
                                            'update_term_meta_cache' => true, // подгружать метаданные в кэш
                                        ];

                                $offices = get_terms( $args_2 );

                                foreach( $offices as $office ){
                                    echo "<li class='filter-main__dropdown-item'><input id='{$office->term_id}' type='checkbox' class='filter-main__dropdown-checkbox' data-title='{$office->name}'><label for='{$office->term_id}'>{$office->name}<span>{$office->count}</span></label></li>";
                                }
                                ?>
                            <li class='filter-main__dropdown-item'><label class="checkbox-toggle-label"><input
                                        type='checkbox' class="filter-main__dropdown-checkbox--toggle"><span
                                        class="toggle toggle-select ">Select all</span><span
                                        class='toggle toggle-deselect'>Deselect all</span></label></li>
                        </ul>
                        <ul class="filter-main__dropdown-list filter-main__dropdown-list--academy">
                            <span class="filter-main__dropdown-item--head ">Academies</span>
                            <?php 
                                $args_3 = [
                                            'taxonomy'      => [ 'academies' ], // название таксономии с WP 4.5
                                            'orderby'       => 'id',
                                            'order'         => 'ASC',
                                            'hide_empty'    => false,
                                            'object_ids'    => null,
                                            'fields'        => 'all',
                                            'count'         => true,
                                            'update_term_meta_cache' => true, // подгружать метаданные в кэш
                                        ];

                                $academies = get_terms( $args_3 );

                                foreach( $academies as $academy ){
                                    echo "<li class='filter-main__dropdown-item'><input id='{$academy->term_id}' type='checkbox' class='filter-main__dropdown-checkbox' data-title='{$academy->name}'><label for='{$academy->term_id}'>{$academy->name}<span>{$academy->count}</span></label></li>";
                                }
                                ?>
                            <li class='filter-main__dropdown-item'><label class="checkbox-toggle-label"><input
                                        type='checkbox' class="filter-main__dropdown-checkbox--toggle"><span
                                        class="toggle toggle-select ">Select all</span><span
                                        class='toggle toggle-deselect'>Deselect all</span></label></li>
                        </ul>
                    </div>
                </div>
                <input type="hidden" name="action" value="myfilter">
            </form>
            <!-- </div> -->
            <div class="filter-main__posts">
                <div class="filter-main__tags">
                    <?php 
                                $args_4 = [
                                        'taxonomy'      => [ 'tags' ], // название таксономии с WP 4.5
                                        'orderby'       => 'id',
                                        'order'         => 'ASC',
                                        'hide_empty'    => false,
                                        'object_ids'    => null,
                                        'fields'        => 'all',
                                        'count'         => true,
                                        'update_term_meta_cache' => true, // подгружать метаданные в кэш
                                    ];

                                $tags = get_terms( $args_4 );

                                foreach( $tags as $tag ){
                                    echo "<button class='filter-main__tag filter-main__tag-btn'> {$tag->name}<span>{$tag->count}</span></button>";
                                }
                            ?>
                    <button class="filter-main__tag  more">more</button>
                    <button class="filter-main__tag  less">less</button>
                </div>
                <ul class="filter-main__items">
                         <?
                         // параметры по умолчанию
                        $posts = get_posts( array(
                            'numberposts' => -1,
                            'category'    => 0,
                            'orderby'     => 'date',
                            'order'       => 'DESC',
                            'include'     => array(),
                            'exclude'     => array(),
                            'meta_key'    => '',
                            'meta_value'  =>'',
                            'post_type'   => 'vacancy',
                            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                        ) );

                        foreach( $posts as $post ){
                            setup_postdata($post); ?>
                            <li class="filter-main__item">
                            <h3 class="filter-main__item-caption"><? the_title() ?></h3>
                            <p class="filter-main__item-description"><? the_field('vacancy_description') ?></p>
                            </li>
                        <?}

                        wp_reset_postdata(); // сброс
                         ?>       
                            </ul>
            </div>
        </section>
        <section class="contact-us"></section>
    </div>
</main>

<? get_footer() ?>