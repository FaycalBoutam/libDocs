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
    function do_shortcode_output( $atts )
    {
      $get_parent_cats = array(
          'parent' => '0'
      ); 
      $all_categories = get_categories( $get_parent_cats );

      $html = '<ul>';

        foreach( $all_categories as $single_category ){
            $catID = $single_category->cat_ID;

            $html .= '<li><a href=" ' . get_category_link( $catID ) . ' ">' . $single_category->name . '</a>'; //category name & link
            $html .= '<ul class="post-title">';

            $query = new \WP_Query( array( 'cat'=> $catID, 'post_type' => 'document', 'posts_per_page'=>10 ) );
            if ( $query->have_posts() ) : 
              while( $query->have_posts() ) : $query->the_post();
                $html .= '<li><a href="'.get_the_permalink().'">'. get_the_title() .'</a></li>';
              endwhile;
            endif;
            
            wp_reset_postdata();

            $html .= '</ul>';
            $get_children_cats = array(
                'child_of' => $catID
            );

            $child_cats = get_categories( $get_children_cats );
            $html .= '<ul class="children">';
                foreach( $child_cats as $child_cat ){
                    $childID = $child_cat->cat_ID;

                    $html .= '<a href=" ' . get_category_link( $childID ) . ' ">' . $child_cat->name . '</a>';
                      $html .= '<ul class="post-title">';

                    $query = new \WP_Query( array( 'cat'=> $childID,'post_type' => 'document', 'posts_per_page'=>10 ) );
                    if ( $query->have_posts() ) : 
                      $html .= '<li>';
                      $html .= '<table id="myTable"><thead><tr>';
                      var_dump( $atts );
                        if ( in_array( 'title', $atts ) ) {
                          $html .= '<th>Title</th>';
                        }
                        if ( in_array( 'content', $atts ) ) {
                          $html .= '<th>Content</th>';
                        }
                        if ( in_array( 'download', $atts ) ) {
                          $html .= '<th>Download</th>';
                        }

                      $html .= '</tr></thead><tbody>';
                          while( $query->have_posts() ):$query->the_post();
                            $html .= '<tr>';  
                            if ( in_array( 'title', $atts ) ) {
                              $html .= '<td>' . get_the_title() . '</td>';
                            }
                            if ( in_array( 'content', $atts ) ) {
                              $html .= '<td>' . get_the_content() . '</td>';
                            }
                            if ( in_array( 'download', $atts ) ) {
                              $upload_field = get_post_meta( get_the_ID(), 'ld_upload_field', true );
                              if ( ! empty( $upload_field ) ) {
                                $html .= '<td>' . esc_html( $upload_field ) . '</td>';
                              } else {
                                $html .= '<td></td>';
                              }
                            }
                            $html .= '</tr>';
                          endwhile;
                      $html .= '</tbody></table>';
                    endif;

                    wp_reset_postdata();
                    
                    $html .= '</li>';

                    $html .= '</ul>';
                }
            $html .= '</ul></li>';
        }
      $html .= '</ul>';

      return $html;
    }
}