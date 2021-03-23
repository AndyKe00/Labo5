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
			<div>1</div>
			<div>2</div>
			<div>3</div>
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
				$titre_grand = get_the_title();
				$session = substr($titre_grand, 4, 1);
				$nbHeure = substr($titre_grand, -4, 3);
				$titre = substr($titre_grand, 8, -6);
				$sigle = substr($titre_grand, 0, 7);
				$typeCours = get_field('type_de_cours');

				if ($precedent != $typeCours) :?>
				<?php if ($precedent != "XXXXX"): ?>
				</section>
				<?php endif ?>

				<h2><?php echo $typeCours; ?></h2>

				<section class="<?php echo $typeCours; ?>">

				<?php endif ?>

				<article>
					<p>
						<p><?php echo $sigle . " - " . $typeCours . " - " . $nbHeure; ?></p>
						<a href="<?:php echo get_permalink(); ?>"><?php echo $titre; ?></a>
						<p>Session : <?php echo $session; ?></p>
					</p>
				</article>
			<?php
				$precedent = $typeCours; 
				endwhile;?>
			</section>
		<?php endif; ?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
