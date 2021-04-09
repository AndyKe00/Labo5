<?php
/**
 * Template part pour afficher les blocs de front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-4w4
 */
global $tPropriete;
?>

<article class="sliderConteneur">
	<div class="slide">
		<?php the_post_thumbnail('thumbnail'); ?>
			<div class="slide_info">
				<p><?php echo $tPropriete['sigle'] . " - " . $tPropriete['typeCours'] . " - " . $tPropriete['nbHeure']; ?></p>
				<a href="<?php echo get_permalink(); ?>"><?php echo $tPropriete['titre']; ?></a>
				<p>Session : <?php echo $tPropriete['session']; ?></p>
			</div>
	</div>
</article>
