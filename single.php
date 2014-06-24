<?php

//* This file handles single entries.

//* Force full-width-content layout setting
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

//* Add site title
add_action('genesis_site_title', 'alfa_site_title');
function alfa_site_title() {
    echo'<h6 class="header-entry-title">' . get_the_title() . '</h6>';
}

//* Add toggle icons
if(comments_open()) {
    add_action('genesis_header', 'alfa_toggle_comments', 13);
    function alfa_toggle_comments() {
        $comments = get_comments_number( '', '1', '%');
        echo '
        <div class="toggle-icons toggle-comments">
            <span class="dashicons dashicons-admin-comments"></span>
            <span class="menu-toggle">' . $comments . '</span>
        </div>';
    }
}

//* Restructure comments
remove_action( 'genesis_comment_form', 'genesis_do_comment_form' );

add_action('genesis_before_comments', 'alfa_comments_open', 5);
add_action('genesis_before_comments', 'genesis_do_comment_form', 15 );
add_action('genesis_after_comments', 'alfa_comments_close' );

function alfa_comments_open() {
    echo'<div class="comments-wrap"><div class="dashicons dashicons-no-alt"></div>';
}

function alfa_comments_close() {
    echo'</div>';
}

genesis();
