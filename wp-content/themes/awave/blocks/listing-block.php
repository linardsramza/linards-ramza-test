<?php
$the_query = new WP_Query([
	'post_type' => 'form-log',
]);
// var_dump($the_query);
?>
<section class="submissions">
	<div class="container container--extra-narrow">
		<h1 class="submissions__title">Submissions ACF</h1>
		<p class="submissions__description">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p>
		<div class="submissions__block">
			<?php while ( $the_query->have_posts() ) : $the_query->the_post();
				$phone_number = get_field("phone_number", get_the_id());
				$email = get_field("email", get_the_id());
			?>
				<div class="form-entry">
					<h2 class="form-entry__title"><?php the_title(); ?></h2>
					<p class="form-entry__info"><span class="contact-link"><a href="tel:<?= str_replace(' ', '', $phone_number); ?>"><?= $phone_number; ?></a></span><span class="separator"> | </span><span class="contact-link"><a href="mailto:<?= $email; ?>"><?= $email; ?></a></span></p>
					<div class="form-entry__content">
						<?php the_content(); ?>
					</div>
					<hr>
				</div>
			<?php endwhile; ?>
		</div>
		<?php if($the_query->max_num_pages > 1): ?>
			<div class="row row--content-center">
				<a href="#" class="primary-button" id="show-more-posts-acf">Show more</a>
				<p id="loading-text" style="display: none;">Loading...</p>
			</div>
		<?php endif; ?>
	</div>
</section>