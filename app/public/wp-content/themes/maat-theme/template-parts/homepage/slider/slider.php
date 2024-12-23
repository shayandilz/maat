<div class="swiper home-swiper" data-aos="fade-in" data-aos-delay="200">
    <div class="swiper-wrapper">
		<?php $slider = get_field( 'slider' );
		if ( $slider ):
			foreach (
				$slider

				as $slide
			) :
				$show = $slide['show'];
				$type = $slide['type'];
				if ( $show ) : ?>
                    <div class="swiper-slide <?php echo ( $type == 'svg' ) ? 'bg-white' : ''; ?>">
						<?php if ( $slide['link'] ): ?>
                        <a target="_blank" href="<?= $slide['link']['url']; ?>">
							<?php endif;
							if ( $type == 'img' ) {
								$img = $slide['img']; ?>
                                <img class="img-fluid" src="<?= esc_url( $img['url'] ); ?>"
                                     alt="<?= esc_attr( $img['alt'] ); ?>"/>
							<?php }
							if ( $type == 'svg' ) {
								echo $slide['svg'];
							}
							?>
							<?php if ( $slide['link'] ): ?>
                        </a>
					<?php
					endif; ?>
                    </div>
				<?php
				endif;
			endforeach;
		endif; ?>
    </div>
</div>