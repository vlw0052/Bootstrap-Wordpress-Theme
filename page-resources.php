<?php 
/**
 * Template Name: Resources Page
 * 
 */

$thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID) );


get_header(); ?>

<?php if( has_post_thumbnail()) { ?>

<section class="feature-image" style="background: url('<?= $thumbnail_url; ?>') no-repeat; background-size: cover; "data-type="background data-speed=2">
	<h1 class="page-title"><?php the_title();?></h1>
</section>


<?php } else { ?>

<section class="feature-image feature-image-default" data-type="background data-speed=2">
	<h1 class="page-title"><?php the_title();?></h1>
</section>

<?php } ?>
<!-- MAIN CONTENT-RESOURCES ###########################-->

<div class="container">
	<div class="row" id="primary">
		<div id="content" class="col-sm-12">
			<section class="main-content">
				<?php while(have_posts()) : the_post(); ?>
				<?php  the_content(); ?>
			<?php endwhile; ?>

			<hr>
			<?php $loop = new WP_Query(array( 'post_type' => 'resource', 'orderby' => 'post_id', 'order' => 'ASC')); ?>


			<div class="resource-row clearfix">
			<?php while($loop->have_posts()) : $loop->the_post(); ?>

			<?php 
				$resource = array(
					'img' => get_field('resource_image'),
					'url' => get_field('resource_url'),
					'btn_text' => get_field('button_text')
				);

			 ?>

				<div class="resource">
					<img src="<?= $resource['img']['url']; ?>" alt="<?= $resource['img']['alt']; ?>">

					<h3><a href="<?= $resource['url'];?>"><?php the_title();?></a></h3>
					<?php the_content(); ?>
					<a href="<?= $resource['url'];?>" class="btn btn-success"><?= $resource['btn_text']; ?></a>
				</div> <!--/ resource -->
			
			<?php			endwhile; 
			wp_reset_query();
			?>

			</div> <!--/ resource-row -->


		</section><!--/ main-content -->
	</div> <!--/ content -->

</div> <!--/ row -->

</div> <!--/ container -->





<?php get_footer(); ?>