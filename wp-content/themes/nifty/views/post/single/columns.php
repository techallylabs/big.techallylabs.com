<?php
	
	$share_html = boldthemes_get_share_html( get_permalink(), 'blog', 'small' );

	$meta_html = '';
	if ( BoldThemesFrameworkTemplate::$blog_date || BoldThemesFrameworkTemplate::$show_comments_number ) {
		$meta_html .= '';
		if ( BoldThemesFrameworkTemplate::$categories_html && ! BoldThemesFrameworkTemplate::$blog_side_info ) $meta_html .= boldthemes_get_post_categories();
		if ( BoldThemesFrameworkTemplate::$blog_date && ! BoldThemesFrameworkTemplate::$blog_side_info ) $meta_html .= boldthemes_get_post_date(); 
		
		if ( BoldThemesFrameworkTemplate::$show_comments_number ) {
			if ( $meta_html != '' ) {
				$meta_html .= boldthemes_get_post_comments();
			}
		}
	}

	$author_html = '';
	if ( BoldThemesFrameworkTemplate::$blog_author ) {
		$author_html .= '';
		if ( BoldThemesFrameworkTemplate::$blog_author && ! BoldThemesFrameworkTemplate::$blog_side_info ) $author_html .= boldthemes_get_post_author();
		
	}
	
	echo '<article class="btPostSingleItemColumns gutter ' . esc_attr( implode( ' ', get_post_class(BoldThemesFrameworkTemplate::$class_array ) ) ) . '">';
		echo '<div class="port">';
			echo '<div class="btArticleContentHolder">';
	
				if ( BoldThemesFrameworkTemplate::$media_html != '' ) {
					echo '<div class="btArticleMedia">' . BoldThemesFrameworkTemplate::$media_html . '</div><!-- /btArticleMedia -->';
				}

				echo '<div class="btArticleTextContent">';
					
					if ( boldthemes_get_option( 'hide_headline' ) ) {
						echo '<div class="btArticleHeadline">';
							echo boldthemes_get_heading_html (
								array (
									'superheadline' 	=> $meta_html,
									'headline' 			=> get_the_title(),
									'subheadline' 		=> $author_html,
									'size' 				=> 'normal',
									'dash' 				=> BoldThemesFrameworkTemplate::$dash
								)
							);
						echo '</div><!-- /btArticleHeadline -->' ;
					}
				
					$extra_class = '';

					echo '<div class="btArticleContent ">' . BoldThemesFrameworkTemplate::$content_html . '</div>';
				
					if ( ( BoldThemesFrameworkTemplate::$tags_html != '' ) || ( $share_html != '' ) ) {
						echo '<div class="btArticleShareEtc">';
							
							if ( BoldThemesFrameworkTemplate::$tags_html != '' ) {
								echo '<div class="btTagsColumn">';
									echo wp_kses( BoldThemesFrameworkTemplate::$tags_html, 'tags' );
								echo '</div><!-- /btTagsColumn -->';
							}
							
							if ( $share_html != '') echo '<div class="btShareColumn"><div class="btInnerShare">' . wp_kses( $share_html, 'share' ) . '<span class="btShareText">' . esc_html__( 'Share', 'nifty' ) . '</span></div></div><!-- /btShareColumn -->';
							
						echo '</div><!-- /btArticleShareEtc -->';
					}
				
					global $multipage;
					if ( $multipage ) { 
						echo '<div class="bt-clear btSeparator bottomSmallSpaced noBorder"><hr></div>';
						wp_link_pages( array ( 
							'before'      => '<ul>' . esc_html__( 'Pages:', 'nifty' ),
							'separator'   => '<li>',
							'after'       => '</ul>'
						));	
					}

				echo '</div><!-- /btArticleTextContent -->' ;

			echo '</div><!-- /btArticleContentHolder -->' ;
		echo '</div><!-- /port -->';		
	echo '</article>';
?>