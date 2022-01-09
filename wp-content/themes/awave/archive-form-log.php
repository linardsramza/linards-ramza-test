<?php
get_header();
global $wp_query;
?>
<main>
	<div class="container">
		<section class="submissions">
			<div class="container container--extra-narrow">
				<h1 class="submissions__title">Submissions</h1>
				<p class="submissions__description">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p>
				<div class="submissions__block">
					<?php while ( have_posts() ) : the_post();
						$phone_number = get_field("phone_number");
						$email = get_field("email");
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
				<?php if($wp_query->max_num_pages > 1): ?>
					<div class="row row--content-center">
						<a href="#" class="primary-button" id="show-more-posts">Show more</a>
						<p id="loading-text" style="display: none;">Loading...</p>
					</div>
				<?php endif; ?>
			</div>
		</section>
	</div>
</main>
<?php
get_footer();
?>
