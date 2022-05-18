<?php

	$share_html = boldthemes_get_share_html( get_permalink(), 'pf', 'small' );

	$dash = BoldThemesFrameworkTemplate::$pf_use_dash ? 'top' : '';
	
	echo '<article class="btPostSingleItemStandard btPostListStandard gutter ' . esc_attr( implode( ' ', get_post_class( BoldThemesFrameworkTemplate::$class_array ) ) ) . '">';
		echo '<div class="port">';
			echo '<div class="btArticleContentHolder">';
		
								
				if ( BoldThemesFrameworkTemplate::$media_html != '' ) {
					echo '<div class="btArticleMedia">';
					echo ' ' . BoldThemesFrameworkTemplate::$media_html;
					echo '</div><!-- /btArticleMedia -->';
				}

				echo '<div class="btArticleHeadline">';
				echo boldthemes_get_heading_html(
					array(
						'superheadline' => BoldThemesFrameworkTemplate::$categories_html,
						'headline' 		=> get_the_title(),
						'subheadline' 	=> '',
						'url' 			=> get_permalink(),
						'size' 			=> 'normal',
						'html_tag' 		=> 'h2',
						'dash' 			=> $dash,
						'el_style' 		=> '',
						'el_class' 		=> ''
					)									 
				);
				echo '</div><!-- /btArticleHeadline -->';

				echo '<div class="btArticleContent">' . BoldThemesFrameworkTemplate::$content_final_html . '</div>';
					
				echo '<div class="btArticleShareEtc">';

					if ( $share_html != '') echo '<div class="btShareColumn"><div class="btInnerShare">' . wp_kses( $share_html, 'share' ) . '<span class="btShareText">' . esc_html__( 'Share', 'nifty' ) . '</span></div></div><!-- /btShareColumn -->';
					
					echo '<div class="btReadMoreColumn">';
						$continue_icon = !is_rtl() ? 'pe-7s_e685' : 'pe-7s_e687';
						$continue_icon_position = ! is_rtl() ?  'right' : 'left';
						echo boldthemes_get_button_html(
							array (
								'icon' 			=> $continue_icon,
								'url' 			=> get_permalink(),
								'text' 			=> esc_html__( 'READ MORE', 'nifty' ),
								'style' 		=> 'clean',
								'size' 			=> 'small',
								'icon_position' => $continue_icon_position 
							) 
						);
					echo '</div><!-- /btReadMoreColumn -->';
					
				echo '</div><!-- /btArticleShareEtc -->';
				
			echo '</div><!-- /btArticleContentHolder -->' ;
		echo '</div><!-- /port -->';	
	echo '</article>';

?>