<?php
/**
 * @package WordPress
 * @subpackage Augusto_Rédua
 * @since Augusto Rédua 1.0
 */
get_header(); ?>
<section class="featured">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-push-2 col-md-pull-2">
				<img class="img-responsive" src="<?php bloginfo('template_url'); ?>/images/augusto-redua.png">
			</div>
			<div class="tagline text-center col-xs-8 col-sm-8 col-md-5 col-xs-push-4 col-sm-push-4 col-md-push-5 col-md-pull-2" data-0="bottom:110px;" data-500="bottom:310px;">
				<h1>personal trainer</h1>
			</div>
		</div>
	</div>
</section>

<section class="black-bg about" data-0="margin-top:-110px;" data-500="margin-top:-180px;">
	<div class="t-shape"></div>
		<div class="container">
				<div class="row">
					<div class="text-center col-md-12">
					<?php $query = new WP_Query( 'pagename=sobre' );
					while ( $query->have_posts() ) : $query->the_post(); ?>
						<h1><?php the_title(); ?></h1>
						<div class="entry-content">
						<?php the_content(); ?>
						</div>
					<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</div>
		</div>
	<div class="v-shape"></div>
</section>

<section class="space-top space-bottom">
	<div class="container">
		<div class="row">
			<div class="text-center col-md-12">
			<?php $query= new WP_Query( 'pagename=metodo' );
			while ( $query->have_posts() ) : $query->the_post(); ?>
				<h1><?php the_title(); ?></h1>
				<div class="entry-content">
				<?php the_content(); ?>
				</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</section>

<section class="space-bottom">
	<div class="container">
		<div class="row">
			<div class="text-center col-md-12">
			<?php $query= new WP_Query( 'pagename=programa' );
			while ( $query->have_posts() ) : $query->the_post(); ?>
				<h1><?php the_title(); ?></h1>
				<div class="entry-content">
				<?php the_content(); ?>
				</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</section>

<section class="space-top space-bottom testimony">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<?php $query= new WP_Query( 'pagename=clientes' );
			while ( $query->have_posts() ) : $query->the_post(); ?>
				<h1 class="text-center"><?php the_title(); ?></h1>
			<?php endwhile; wp_reset_postdata(); ?>
			</div>

			<div id="carousel-testimony" class="col-xs-10 col-sm-10 col-md-10 col-xs-push-1 col-xs-pull-1 col-sm-push-1 col-sm-pull-1 col-md-push-1 col-md-pull-1 carousel slide" data-ride="carousel">
				<div class="row">
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
					<?php $query= new WP_Query( array(
						'post_type' => 'depoimentos',
						'post_status' => 'publish' )
					); while ( $query->have_posts() ) : $query->the_post(); ?>
						<div class="item <?php if($query->current_post == 1){ echo 'active'; } ?>">
							<div class="col-md-2">
								<?php if ( '' != get_the_post_thumbnail() ) {
								the_post_thumbnail( 'thumbnail_client', array(
									'class' => 'img-circle center-block')
								); }
								?>
							</div>
							<div class="carousel-caption col-md-10">
								<blockquote>
									<p><?php echo get_the_excerpt(); ?> <small><?php the_title(); ?></small></p>
								</blockquote>
							</div>
						</div>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-testimony" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel-testimony" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="space-top space-bottom result">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<?php $query= new WP_Query( 'pagename=resultados' );
			while ( $query->have_posts() ) : $query->the_post(); ?>
				<h1 class="text-center"><?php the_title(); ?></h1>
			<?php endwhile; wp_reset_postdata(); ?>
			</div>
			<div id="carousel-result" class="col-xs-10 col-sm-10 col-md-10 col-xs-push-1 col-xs-pull-1 col-sm-push-1 col-sm-pull-1 col-md-push-1 col-md-pull-1 carousel slide" data-ride="carousel">
				<div class="row">
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
					<?php $query= new WP_Query( array(
						'post_type' => 'resultados',
						'post_status' => 'publish' )
					); while ( $query->have_posts() ) : $query->the_post(); ?>
					<?php $result = array(
						'semanas' => rwmb_meta('rw_semanas', 'type=text'),
						'peso_antes' => rwmb_meta('rw_peso_antes', 'type=text'),
						'gordura_antes' => rwmb_meta('rw_gordura_antes', 'type=text'),
						'peso_depois' => rwmb_meta('rw_peso_depois', 'type=text'),
						'gordura_depois' => rwmb_meta('rw_gordura_depois', 'type=text'),
					);
					$foto_antes = rwmb_meta('rw_foto_antes', 'type=image_advanced&size=result');
					$foto_depois = rwmb_meta('rw_foto_depois', 'type=image_advanced&size=result');
					?>
						<div class="item <?php if($query->current_post == 1){ echo 'active'; } ?>">
							<div class="col-md-8">
								<div class="img-thumbnail">
								<?php if ( !empty( $foto_antes ) && !empty( $foto_depois ) ) {
									foreach($foto_antes as $photo):
										echo "<img src='{$photo['url']}' alt='{$photo['title']}'> ";
									endforeach;
									foreach($foto_depois as $photo):
										echo "<img src='{$photo['url']}' alt='{$photo['title']}'> ";
									endforeach;
								} ?>
								</div>
							</div>
							<div class="carousel-caption col-md-4">
								<h4><?php the_title(); ?><br><small><?php if ( !empty( $result['semanas'] ) ) : { echo $result['semanas']; } endif; ?> semanas</small></h4>
								<hr>
								<b>Antes</b> 
								<span>Peso: <?php if ( !empty( $result['peso_antes'] ) ) : { echo $result['peso_antes']; } endif; ?>kg</span>
								<span>Gordura: <?php if ( !empty( $result['gordura_antes'] ) ) : { echo $result['gordura_antes']; } endif; ?>%</span>
								<br>
								<b>Depois</b>
								<span>Peso: <?php if ( !empty( $result['peso_depois'] ) ) : { echo $result['peso_depois']; } endif; ?>kg</span>
								<span>Gordura: <?php if ( !empty( $result['gordura_depois'] ) ) : { echo $result['gordura_depois']; } endif; ?>%</span>
							</div>
						</div>
						<?php endwhile; wp_reset_postdata();?>
					</div>
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-result" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel-result" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>