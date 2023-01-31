<?php

namespace Src\Base;

defined( 'ABSPATH' ) || exit;

class Shortcode
{
    public function register()
    {
      add_shortcode( 'lib_docs', [ $this, 'do_shortcode_output' ] );
    }

    /**
	  * Shortcode HTML
	  */
    function do_shortcode_output()
    {
      $get_parent_cats = array(
          'parent' => '0' //get top level categories only
      ); 
      $all_categories = get_categories( $get_parent_cats );//get parent categories 

      $html = '<ul>';

        foreach( $all_categories as $single_category ){
            //for each category, get the ID
            $catID = $single_category->cat_ID;

            $html .= '<li><a href=" ' . get_category_link( $catID ) . ' ">' . $single_category->name . '</a>'; //category name & link
            $html .= '<ul class="post-title">';

            $query = new \WP_Query( array( 'cat'=> $catID, 'post_type' => 'document', 'posts_per_page'=>10 ) );
            while( $query->have_posts() ):$query->the_post();
              $html .= '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';
            endwhile;
            wp_reset_postdata();

            $html .= '</ul>';
            $get_children_cats = array(
                'child_of' => $catID //get children of this parent using the catID variable from earlier
            );

            $child_cats = get_categories( $get_children_cats );//get children of parent category
            $html .= '<ul class="children">';
                foreach( $child_cats as $child_cat ){
                    //for each child category, get the ID
                    $childID = $child_cat->cat_ID;

                    //for each child category, give us the link and name
                    $html .= '<a href=" ' . get_category_link( $childID ) . ' ">' . $child_cat->name . '</a>';

                      $html .= '<ul class="post-title">';

                    $query = new \WP_Query( array( 'cat'=> $childID,'post_type' => 'document', 'posts_per_page'=>10 ) );
                    while( $query->have_posts() ):$query->the_post();
                      $html .= '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';
                    endwhile;
                    wp_reset_postdata();

                    $html .= '</ul>';

                }
            $html .= '</ul></li>';
        }
      $html .= '</ul>';

      return $html;
    }
}