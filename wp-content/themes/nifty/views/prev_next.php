<section class="gutter btPrevNextNav">
<div class="port">
<div class="btPrevNextNav">
<?php
	$prev_next_html = '';
	$prev = get_adjacent_post( false, '', true );
	
	$url = '';

	if ( $prev != '' ) { 
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $prev->ID ), 'thumbnail' );
		if ( $thumb ) {
			$url = $thumb[0];
		}
		$style_el = '';

		?>

		<?php if ( $url != '' ) { ?>
		<a href="<?php echo esc_url_raw( get_permalink( $prev ) ); ?>" class="btPrevNext btPrev btWithImage">
			
				<div class="btPrevNextImage" style="background-image:url('<?php echo esc_url_raw( $url ); ?>');"></div>
			

			<div class="btPrevNextItem">
				<div class="btPrevNextDir"><?php echo esc_html__( 'previous', 'nifty' ); ?></div>
				<div class="btPrevNextTitle"><?php echo esc_html( $prev->post_title ); ?></div>
			</div>
		</a>
		<?php } ?>


		<?php if ( $url == '' ) { ?>
		<a href="<?php echo esc_url_raw( get_permalink( $prev ) ); ?>" class="btPrevNext btPrev">
			

			<div class="btPrevNextItem">
				<div class="btPrevNextDir"><?php echo esc_html__( 'previous', 'nifty' ); ?></div>
				<div class="btPrevNextTitle"><?php echo esc_html( $prev->post_title ); ?></div>
			</div>
		</a>
		<?php } ?>

	 <?php } else { ?>
		<span class="btPrevNext btPrev"></span>
	 <?php }
	
	$next = get_adjacent_post( false, '', false );

	if ( $next != '' ) {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'thumbnail' );
		if ( $thumb ) {
			$url = $thumb[0];
		} else {
			$url = '';
		}
		$style_el = '';

		?>


		<?php if ( $url != '' ) { ?>
		<a href="<?php echo esc_url_raw( get_permalink( $next ) ); ?>" class="btPrevNext btNext btWithImage">
				<div class="btPrevNextImage" style="background-image:url('<?php echo esc_url_raw( $url ); ?>');"></div>
			
			<div class="btPrevNextItem">
				<div class="btPrevNextDir"><?php echo esc_html__( 'next', 'nifty' ); ?></div>
				<div class="btPrevNextTitle"><?php echo esc_html( $next->post_title ); ?></div>
			</div>
		</a>
		<?php } ?>


		<?php if ( $url == '' ) { ?>
		<a href="<?php echo esc_url_raw( get_permalink( $next ) ); ?>" class="btPrevNext btNext">
			<div class="btPrevNextItem">
				<div class="btPrevNextDir"><?php echo esc_html__( 'next', 'nifty' ); ?></div>
				<div class="btPrevNextTitle"><?php echo esc_html( $next->post_title ); ?></div>
			</div>
		</a>
		<?php } ?>

		
	<?php } else { ?>
		<span class="btPrevNext btNext"></span>
	<?php } ?>
</div>
</div>
</section>