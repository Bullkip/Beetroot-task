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
            <div class="search-main-wrap">

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
                    <div class="search-main__dropdown-btn">All Departments</div>
                    <div class="search-main__dropdown-list-wrap">
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
                                    echo "<li class='search-main__dropdown-item'>{$department->name}<span>{$department->count}</span></li>";
                                }
                            ?>
                        </ul>
                    </div>

                </div>
                <div class="search-main__dropdown-wrap">
                    <div class="search-main__dropdown-btn">All offices</div>
                    <div class="search-main__dropdown-list-wrap">
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
                                    echo "<li class='search-main__dropdown-item'>{$office->name}<span>{$office->count}</span></li>";
                                }
                                ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="search-main__results">

            </div>
        </section>
        <section class="contact-us"></section>
    </div>
</main>

<? get_footer() ?>