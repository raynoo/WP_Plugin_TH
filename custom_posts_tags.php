<?php

// initialize custom post types and taxonomy
add_action( 'init', 'custom_post_types' );
add_action( 'init', 'custom_taxonomy' );

function custom_post_types() {
  register_post_type( 'article',
    array(
      'labels' => array(
        'name' => __( 'Articles' ),
        'singular_name' => __( 'Article' )
      ),
    'public' => true,
    'show_in_menu' => false,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
    )
  );

  register_post_type( 'author',
    array(
      'labels' => array(
        'name' => __( 'Authors' ),
        'singular_name' => __( 'Author' )
      ),
    'public' => true,
    'show_in_menu' => false,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
    )
  );

  register_post_type( 'blog',
    array(
      'labels' => array(
        'name' => __( 'Blogs' ),
        'singular_name' => __( 'Blog' )
      ),
    'public' => true,
    'show_in_menu' => false,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
    )
  );

  register_post_type( 'forum',
    array(
      'labels' => array(
        'name' => __( 'Forums' ),
        'singular_name' => __( 'Forum' )
      ),
    'public' => true,
    'show_in_menu' => false,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
    )
  );

  register_post_type( 'humor',
    array(
      'labels' => array(
        'name' => __( 'Humors' ),
        'singular_name' => __( 'Humor' )
      ),
    'public' => true,
    'show_in_menu' => false,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
    )
  );

  register_post_type( 'infographic',
    array(
      'labels' => array(
        'name' => __( 'Infographics' ),
        'singular_name' => __( 'Infographic' )
      ),
    'public' => true,
    'show_in_menu' => false,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
    )
  );

  register_post_type( 'newsletter',
    array(
      'labels' => array(
        'name' => __( 'Newsletters' ),
        'singular_name' => __( 'Newsletter' )
      ),
    'public' => true,
    'show_in_menu' => false,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
    )
  );

  register_post_type( 'press_release',
    array(
      'labels' => array(
        'name' => __( 'Press Releases' ),
        'singular_name' => __( 'Press Release' )
      ),
    'public' => true,
    'show_in_menu' => false,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
    )
  );

  register_post_type( 'printable',
    array(
      'labels' => array(
        'name' => __( 'Printables' ),
        'singular_name' => __( 'Printable' )
      ),
    'public' => true,
    'show_in_menu' => false,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
    )
  );

  register_post_type( 'recommendation',
    array(
      'labels' => array(
        'name' => __( 'Recommendations' ),
        'singular_name' => __( 'Recommendation' )
      ),
    'public' => true,
    'show_in_menu' => false,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
    )
  );

  register_post_type( 'review',
    array(
      'labels' => array(
        'name' => __( 'Reviews' ),
        'singular_name' => __( 'Review' )
      ),
    'public' => true,
    'show_in_menu' => false,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
    )
  );

}

function custom_taxonomy() {
  register_taxonomy(
    'Forums',
    array('forum'),
    array(
      'label' => __('Forums'),
      'show_admin_column' => true,
      'hierarchical' => true
    )
  );

  register_taxonomy(
    'Humor',
    array('humor'),
    array(
      'label' => __('Humor'),
      'show_admin_column' => true,
      'hierarchical' => true
    )
  );

  register_taxonomy(
    'Lists',
    array('article'),
    array(
      'label' => __('Lists'),
      'show_admin_column' => true,
      'hierarchical' => true
    )
  );

  register_taxonomy(
    'Reviews',
    array('review'),
    array(
      'label' => __('Reviews'),
      'show_admin_column' => true,
      'hierarchical' => true
    )
  );

  register_taxonomy(
    'Seasonal',
    array('article'),
    array(
      'label' => __('Seasonal'),
      'show_admin_column' => true,
      'hierarchical' => true
    )
  );

  register_taxonomy(
    'Tags',
    array('article'),
    array(
      'label' => __('Tags'),
      'show_admin_column' => true,
      'hierarchical' => true
    )
  );

  register_taxonomy(
    'Topics',
    array('article'),
    array(
      'label' => __('Topics'),
      'show_admin_column' => true,
      'hierarchical' => true
    )
  );
}

// modify article admin page
add_filter('manage_edit-article_sortable_columns', 'columns_head_sort_articles', 10);
// add_action('manage_article_posts_custom_column', 'columns_content_only_articles', 10, 2);
 
function columns_head_sort_articles($sortable_columns) {
  $sortable_columns['tags'] = 'Tags';
  return $sortable_columns;
}


// functions to handle the column
function columns_head_only_articles($defaults) {
    $defaults['tags'] = 'Tags';
    return $defaults;
}
function columns_content_only_articles($column_name, $post_ID) {
    if ($column_name == 'tags') {
      $tags = get_the_terms( $post_ID, 'Tags' );
      echo implode(', ', $tags);
    }
}

?>