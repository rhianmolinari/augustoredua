<?php
/**
 * @package WordPress
 * @subpackage Augusto_Rédua
 * @since Augusto Rédua 1.0
 */
?>

<footer class="space-top space-bottom black-bg" data-0-start="background-position:0 -1000px;" data-100-end="background-position:0px 0px;">
	<div class="container">
		<div class="row">
			<?php $query= new WP_Query( 'pagename=contato' );
			while ( $query->have_posts() ) : $query->the_post(); ?>
			<div class="col-md-12">
				<h1 class="text-center"><?php the_title(); ?></h1>
			</div>
			<div class="col-md-4">
				<div class="entry-content">
				<?php the_content(); ?>
				</div>
			</div>
			<?php endwhile; wp_reset_postdata(); ?>
			<div>
				<form method="post" accept-charset="utf-8" role="form">
					<div class="col-md-4">
						<input name="nome" class="form-group form-control" type="text" placeholder="Nome" required>
						<input name="email" class="form-group form-control" type="email" placeholder="E-mail" required>
						<div class="alert alert-warning" style="display:block;"><span class="glyphicon glyphicon-ban-circle"></span> Em breve funcionando!</div>
						<div class="alert alert-success" style="display:none;"><span class="glyphicon glyphicon-ok"></span> Seu e-mail foi enviado com sucesso!</div>
					</div>
					<div class="col-md-4">
						<textarea name="mensagem" class="form-group form-control" placeholder="Mensagem" rows="3" required></textarea>
						<button class="pull-right btn" type="submit">Enviar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</footer>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/less-1.7.0.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/carousel.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/transition.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/skrollr.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.fittext.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/main.js" type="text/javascript"></script>

<?php wp_footer(); ?>
</body>
</html>