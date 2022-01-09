<?php
get_header();
?>
<main>
	<div class="container">
		<section class="contact-form">
			<div class="container container--narrow">
				<div class="row">
					<div class="col col--left">
						<h1 class="contact-form__title">Have any questions?</h1>
						<p class="contact-form__description">Fill out the form and we’ll be in touch as soon as possible!</p>
					</div>
					<div class="col col--right">
						<div class="side-img">
							<figure>
								<img src="<?= get_template_directory_uri(); ?>/assets/images/side-image.webp" alt="Decorative image">
							</figure>
						</div>
					</div>
				</div>
				<div class="contact-form__form-block">
					<form method="POST" id="contact-form">
						<div class="row">
							<div class="contact-form__input-block">
								<label for="first-name">First name</label>
								<input type="text" name="first-name" placeholder="Clue text">
							</div>
							<div class="contact-form__input-block">
								<label for="last-name">Last name</label>
								<input type="text" name="last-name" placeholder="Clue text">
							</div>
						</div>
						<div class="row">
							<div class="contact-form__input-block">
								<label for="phone-number">Phone number</label>
								<input type="text" name="phone-number" placeholder="Clue text">
							</div>
							<div class="contact-form__input-block">
								<label for="email">Email</label>
								<input type="text" name="email" placeholder="Clue text">
							</div>
						</div>
						<div class="row">
							<div class="contact-form__input-block contact-form__input-block--full-width">
								<label for="message">Message</label>
								<textarea type="text" name="message" placeholder="Clue text"></textarea>
							</div>
						</div>
						<div class="row row--content-center">
							<button type="submit" class="primary-button" id="contact-btn">Contact me</button>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>
</main>
<?php
get_footer();
?>
