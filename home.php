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
        <section class="search-main">
            <!-- <div class="search-main-wrap"> -->
            <form class="search-main-wrap" role="search" method="get" id="searchform"
                action="<?php bloginfo('siteurl'); ?>">

                <div class="search-main__input-wrap">
                    <input type="text" id="search-input" class="search-main__input" placeholder="Search job openings">
                    <div class="search-main__input-del"></div>

                </div>
                <!-- <form class="search-main__input-wrap" role="search" method="get" id="searchform"
                    action="<?php bloginfo('siteurl'); ?>">

                    <label class="screen-reader-text" for="search-input">Search for:</label>
                    <input type="text" value="" name="search-input" id="searchyy" class="search-main__input"
                        placeholder="Search job openings" />
                    <input type="submit" id="searchsubmit" value="Search" />
                    <div class="search-main__input-del"></div>

                </form> -->
                <div class="search-main__dropdown-wrap">
                    <button class="search-main__dropdown-btn dropdown-department-btn" data-title="All Departments">All Departments</button>
                    <div class="search-main__dropdown-list-wrap dropdown-location-btn">
                        <ul class="search-main__dropdown-list">
                            <span class="search-main__dropdown-item--head">Departments</span>
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
                                    echo "<li class='search-main__dropdown-item'><input id='{$department->term_id}' type='checkbox' class='search-main__dropdown-checkbox' data-title='{$department->name}' ><label for='{$department->term_id}'>{$department->name}<span>{$department->count}</span></label></li>";
                                }
                            ?>

                            
                        </ul>
                    </div>

                </div>
                <div class="search-main__dropdown-wrap">
                    <button class="search-main__dropdown-btn" data-title="All offices">All offices</button>
                    <div class="search-main__dropdown-list-wrap search-main__dropdown--double-col">
                        <ul class="search-main__dropdown-list">
                            <span class="search-main__dropdown-item--head">Offices</span>
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
                                    echo "<li class='search-main__dropdown-item'><input id='{$office->term_id}' type='checkbox' class='search-main__dropdown-checkbox' data-title='{$office->name}'><label for='{$office->term_id}'>{$office->name}<span>{$office->count}</span></label></li>";
                                }
                                ?>
                                <li class='search-main__dropdown-item'><label class="checkbox-toggle-label"><input  type='checkbox' class="search-main__dropdown-checkbox--toggle"><span class="toggle toggle-select ">Select all</span><span class='toggle toggle-deselect'>Deselect all</span></label></li>
                        </ul>
                        <ul class="search-main__dropdown-list search-main__dropdown-list--academy">
                            <span class="search-main__dropdown-item--head ">Academies</span>
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
                                    echo "<li class='search-main__dropdown-item'><input id='{$academy->term_id}' type='checkbox' class='search-main__dropdown-checkbox' data-title='{$academy->name}'><label for='{$academy->term_id}'>{$academy->name}<span>{$academy->count}</span></label></li>";
                                }
                                ?>
                                  <li class='search-main__dropdown-item'><label class="checkbox-toggle-label"><input  type='checkbox' class="search-main__dropdown-checkbox--toggle"><span class="toggle toggle-select ">Select all</span><span class='toggle toggle-deselect'>Deselect all</span></label></li>
                        </ul>
                    </div>
                </div>
                <input type="hidden" name="action" value="myfilter">
            </form>
            <!-- </div> -->
            <div class="search-main__results">

            </div>
        </section>
        <section class="contact-us"></section>
    </div>
</main>

<? get_footer() ?>