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
			$chaine_bouton_radio = '';
			while ( have_posts() ) :
				the_post();
				convertir_tableau($tPropriete);

				if ($precedent != $tPropriete['typeCours']) :?>
				<?php if ($precedent != "XXXXX"): ?>
				</section>
					<?php if ($precedent == "Web") : ?>
					<div class="conteneurBtns">
					<?php echo $chaine_bouton_radio; ?>
					</div>

				<?php endif; ?>
				<?php endif; ?>

				<h2><?php echo $tPropriete['typeCours']; ?></h2>

				<section <?php echo ($tPropriete['typeCours'] == 'Web' ? 'class="carrousel-2"':'class="bloc"'); ?> id="animations">
				
				<?php endif ?>
				
					<?php if ($tPropriete['typeCours'] == "Web") :
					get_template_part('template-parts/content', 'carrousel');
					$chaine_bouton_radio .= '<label class="radio" for="un">
					<input type="radio" name="radio" id="un" checked>
					</label>';

					else :
					get_template_part('template-parts/content', 'bloc');

					endif;
				$precedent = $tPropriete['typeCours']; 
				endwhile;?>
			</section>
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
