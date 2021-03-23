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


<article>
	<?php the_post_thumbnail('thumbnail'); ?>
	<p><?php echo $tPropriete['sigle'] . " - " . $tPropriete['typeCours'] . " - " . $tPropriete['nbHeure']; ?></p>
	<a href="<?php echo get_permalink(); ?>"><?php echo $tPropriete['titre']; ?></a>
	<p>Session : <?php echo $tPropriete['session']; ?></p>
</article>

