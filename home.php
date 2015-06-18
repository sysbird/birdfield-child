<?php
/*
The home template file.
*/
get_header(); ?>

<div id="content">
	<?php $birdfarm_header_image = get_header_image(); ?>
	<?php if( ! is_paged() && ! empty( $birdfarm_header_image ) ): ?>
		<section id="wall">
			<div class="headerimage">
				<img src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" >
			</div>
			<?php dynamic_sidebar( 'widget-area-header' ); ?>
		</section>
	<?php endif; ?>

	<section id="blog">
		<div class="container">
			<ul class="article">
			<?php while ( have_posts() ) : the_post(); ?>

				<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<a href="<?php echo get_post_meta( $post->ID, 'link', true ) ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'birdfield' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
				<?php if( has_post_thumbnail() ): ?>
					<div class="entry-eyecatch">
						<?php the_post_thumbnail( 'large' ); ?>
					</div>
				<?php endif; ?>

				<header class="entry-header">
					<h3 class="entry-title"><?php the_title(); ?></h3>
					<?php the_content(); ?>
				</header>
				</a>
				</li>

			<?php endwhile; ?>
			</ul>
		</div>
	</section>

	<section id="contribution">
		<div class="container">

			<?php
			$myposts = get_posts(array(
				'post_type' => 'page',
				'name' => 'contribution',
				'posts_per_page' => '1',
			));
			?>
			<?php
				foreach( $myposts as $post ):
					setup_postdata( $post );
			?>
				<div class="page">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php the_content(); ?>
					<div class="more"><a href="<?php the_permalink(); ?>"><?php _e( 'Continue reading', 'birdfield' ); ?></a></a>
				</div>
			<?php endforeach;
			wp_reset_postdata(); ?>

		</div>
	</section>

</div>

<?php get_footer(); ?>
