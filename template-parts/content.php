<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Craig_F
 */

?>

<?php
// Is this the first post of the front page?
$first_post = $wp_query->current_post == 0 && !is_paged() && is_front_page();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		
		<?php if ( has_post_thumbnail() ) { ?>	
		<figure class="featured-image">
				<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<?php the_post_thumbnail() ?>		
				</a>
		</figure>
		<?php }  ?>

		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title index-excerpt"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		if ( has_excerpt( $post->ID) ) {
			echo '<div class="deck">';
			echo '<p>' . get_the_excerpt() . '</p>';
			echo '</div><!-- .deck -->' ;
		}
		if ( 'post' === get_post_type() ) : ?>
		<div class="index-entry-meta">
			<?php craigfern_index_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content index-excerpt">
		<?php
			the_excerpt();
		?>
	</div><!-- .entry-content -->

	<?php echo craigfern_modify_read_more_link(); ?>

</article><!-- #post-## -->
