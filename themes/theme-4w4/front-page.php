<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-4w4
 */

get_header();
?>


		<section class="carrousel">
			<article class="sliderConteneur">
				<div class="slide">
					<img src="http://localhost/wordpress/wp-content/uploads/2021/03/pexels-miguel-a-padrinan-1591060.jpg" alt="Web" loading= "lazy" width="150" height="100">
						<div class="slide_info">
							<p>582-1W1 - Web - 75h</p>
							<a href="http://localhost/wordpress/582-1w1-mise-en-page-web-75h/">Mise en page Web</a>
							<p>Session : 1</p>
						</div>
				</div>
			</article>

			<article class="sliderConteneur">
				<div class="slide">
					<img src="" alt="">
						<div class="slide_info">
							<p>582-1W1 - Web - 75h</p>
							<a href="http://localhost/wordpress/582-1w1-mise-en-page-web-75h/">Mise en page Web</a>
							<p>Session : 1</p>
						</div>
				</div>
			</article>

			<article class="sliderConteneur">
				<div class="slide">
					<img src="" alt="">
						<div class="slide_info">
							<p>582-1W1 - Web - 75h</p>
							<a href="http://localhost/wordpress/582-1w1-mise-en-page-web-75h/">Mise en page Web</a>
							<p>Session : 1</p>
						</div>
				</div>
			</article>

		</section>

		<div class="conteneurBtns">
			<label class="radio" for="un">
				<input type="radio" name="radio" id="un" checked>
			</label>

			<label class="radio" for="deux">
				<input type="radio" name="radio" id="deux">
			</label>

			<label class="radio" for="trois">
				<input type="radio" name="radio" id="trois">
			</label>
		</div>

//////////////////////////// front-page.PHP
	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<section class="liste-cours">

			<?php
			/* Start the Loop */

            $precedent = "XXXXX";
			while ( have_posts() ) :
				the_post();
				convertir_tableau($tPropriete);

				if ($precedent != $tPropriete['typeCours']) :?>
				<?php if ($precedent != "XXXXX"): ?>
				</section>
				
				<?php endif ?>

				<h2><?php echo $tPropriete['typeCours']; ?></h2>

				<section class="<?php echo $tPropriete['typeCours']; ?>">
				
				<?php endif ?>
				
			<?php
				get_template_part('template-parts/content', 'bloc');
				$precedent = $tPropriete['typeCours']; 
				endwhile;?>
			</section>
				<?php rewind_posts(); ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<h3>- <?php echo get_the_title(); ?></h3>
				<?php endwhile; ?>

		<?php endif; ?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

function convertir_tableau(&$tPropriete)
{
	$tPropriete['titre_grand'] = get_the_title();
	$tPropriete['session'] = substr($tPropriete['titre_grand'], 4, 1);
	$tPropriete['nbHeure'] = substr($tPropriete['titre_grand'], -4, 3);
	$tPropriete['titre'] = substr($tPropriete['titre_grand'], 8, -6);
	$tPropriete['sigle'] = substr($tPropriete['titre_grand'], 0, 7);
	$tPropriete['typeCours'] = get_field('type_de_cours');
}
