<?php

	$share_html = boldthemes_get_share_html( get_permalink(), 'blog', 'small' );

	$meta_html = '';
	if ( BoldThemesFrameworkTemplate::$blog_author || BoldThemesFrameworkTemplate::$blog_date || BoldThemesFrameworkTemplate::$show_comments_number ) {
		$meta_html .= '';
		if ( BoldThemesFrameworkTemplate::$categories_html && ! BoldThemesFrameworkTemplate::$blog_side_info ) $meta_html .= boldthemes_get_post_categories();
		if ( BoldThemesFrameworkTemplate::$blog_date && ! BoldThemesFrameworkTemplate::$blog_side_info ) $meta_html .= boldthemes_get_post_date(); 
		if ( BoldThemesFrameworkTemplate::$blog_author && ! BoldThemesFrameworkTemplate::$blog_side_info ) $meta_html .= boldthemes_get_post_author();
		if ( BoldThemesFrameworkTemplate::$show_comments_number ) {
			if ( $meta_html != '' ) {
				$meta_html .= boldthemes_get_post_comments();
			}
		}
	}
			
	echo '<article class="btPostSingleItemStandard gutter ' . esc_attr( implode( ' ', get_post_class( BoldThemesFrameworkTemplate::$class_array ) ) ) . '">';
		echo '<div class="port">';
			echo '<div class="btPostContentHolder">';
						
				if ( boldthemes_get_option( 'hide_headline' ) ) {

					$excerpt = boldthemes_get_the_excerpt( get_the_ID() );
					
					echo '<div class="btArticleHeadline">' . boldthemes_get_heading_html (
						array (
							'superheadline' 	=> $meta_html,
							'headline' 			=> get_the_title(),
							'subheadline' 		=> $excerpt,
							'size' 				=> 'large',
							'html_tag' 			=> 'h1',
							'dash' 				=> BoldThemesFrameworkTemplate::$dash
						)
					);
					echo '</div><!-- /btArticleHeadline -->';
				}
					

				if ( BoldThemesFrameworkTemplate::$media_html != '' ) {
					echo '<div class="btArticleMedia">' . BoldThemesFrameworkTemplate::$media_html . '</div><!-- /btArticleMedia -->';
				}

				$extra_class = '';
				
				if ( BoldThemesFrameworkTemplate::$post_format == 'link' && BoldThemesFrameworkTemplate::$media_html == '' ) {
					$extra_class = ' btLinkOrQuote';
				}

				echo '<div class="btArticleContent ' . esc_attr( $extra_class ) . '">' . BoldThemesFrameworkTemplate::$content_html . '</div>';

				global $multipage;
				if ( $multipage ) { 
					echo '<div class="bt-link-pages">';
						wp_link_pages( array( 
							'before'      => '<ul>' . esc_html__( 'Pages:', 'nifty' ),
							'separator'   => '<li>',
							'after'       => '</ul>'
						));
					echo '</div><!-- /bt-link-pages -->';
				}
				
				
				if ( ( BoldThemesFrameworkTemplate::$tags_html != '' ) || ( $share_html != '' ) ) {
					echo '<div class="btArticleShareEtc">';
						
						if ( BoldThemesFrameworkTemplate::$tags_html != '' ) {
							echo '<div class="btTagsColumn">';
								echo wp_kses( BoldThemesFrameworkTemplate::$tags_html, 'tags' );
							echo '</div><!-- /btTagsColumn -->';
						}
						
						if ( $share_html != '') {
							echo '<div class="btShareColumn"><span class="btShareText btLeftAlign">' . esc_html__( 'Share', 'nifty' ) . '</span><div class="btInnerShare">' . wp_kses( $share_html, 'share' ) . '</div></div><!-- /btShareColumn -->';
						}

					echo '</div><!-- /btArticleShareEtc -->';
				}
				
			echo '</div><!-- /btPostContentHolder -->' ;
		echo '</div><!-- /port -->';		
	echo '</article>';

?>