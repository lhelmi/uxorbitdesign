<?php $this->load->view('lms/default-app/_layouts/header'); ?>
<?php $this->load->view('lms/default-app/_layouts/nav'); ?>

<div class="container u-mv-small margin-bottom-26-menu margin-top">

	<div class="row">

		<?php if (!empty($courses['data'])) : ?>

			<div class="col-lg-12 col-md-12">

				<div class="u-mb-small u-pv-small u-border-bottom">
					<div class="row col-lg">
						<div class="col-lg">
							<h3 class="h3 font-color-hitam">
								Katalog Kelas
							</h3>
							<p class="font-color-hitam2">Pilih dan pelajari semua kelas yang tersedia</p>
						</div>
						<div class="justify-content-end">
							<a class="btn btn-primary-orbit h4" href="<?php echo base_url('courses-filter') ?>">
								Filter Kelas
							</a>
						</div>
					</div>
				</div>

				<div class="row">
					<?php foreach ($courses['data'] as $post) : ?>

						<div class="col-sm-12 col-lg-4">

							<article class="c-event u-p-zero">
								<div class="c-event__img u-m-zero" data-mh="imaged">
									<a title="<?php echo $post['title'] ?>" class="u-color-primary" href="<?php echo $post['url'] ?>">
										<img width="100%" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 3 2'%3E%3C/svg%3E" data-src="<?php echo $post['image']['thumbnail'] ?>" alt="<?php echo $post['title'] ?>">
									</a>

									<span class="c-event__status btn-light">
										<a class='u-text-dark' href="<?php echo $post['sub_category']['url'] ?>" title="<?php echo $post['sub_category']['name'] ?>">
											<?php echo $post['sub_category']['name'] ?>
										</a>
									</span>
								</div>
								<div class="c-event__meta u-ph-small u-pt-xsmall" data-mh="heading">
									<a title="<?php echo $post['title'] ?>" class="u-color-primary u-h4 u-text-bold font-color-hitam" href="<?php echo $post['url'] ?>">
										<?php echo $post['title'] ?>
									</a>
								</div>
								<div class="c-event__meta u-ph-small u-pt-xsmall">
									<div class="o-media">
										<div class="o-media__img u-mr-xsmall">
											<div class="c-avatar c-avatar--xsmall">
												<img class="c-avatar__img" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 3 2'%3E%3C/svg%3E" data-src="<?php echo $post['author']['photo'] ?>" alt="<?php echo $post['author']['name'] ?>">
											</div>
										</div>
										<div class="o-media__body font-color-hitam">
											<?php echo $post['author']['name'] ?>
											<small class="u-block u-text-mute font-color-hitam2">
												<?php echo $post['author']['headline'] ?>
											</small>
										</div>
									</div>
									<div class="u-ml-auto">
										<div class='rating-stars u-flex u-justify-between u-pt-xsmall'>
											<ul>
												<?php
												for ($i = 0; $i < 5; $i++) {

													if ($i < $post['rating']) {
														echo "
														<li class='star selected'>
															<i class='fa fa-star fa-fw'></i>
														</li>";
													} else {
														echo "
														<li class='star'>
															<i class='fa fa-star fa-fw'></i>
														</li>";
													}
												}
												?>
											</ul>
										</div>
									</div>
								</div>
								<div class="c-event__meta u-ph-small u-pt-xsmall margin-bottom-26">
									<?php if (empty($post['price'])) : ?>
										<span class="btn btn-gratis">
											<?php echo $this->lang->line('free') ?>
										</span>
									<?php endif ?>

									<?php if (!empty($post['price'])) : ?>
										<span class="btn btn-harga">
											<?php if (!empty($post['discount'])) : ?>
												<s class="u-text-xsmall u-mr-xsmall"><?php echo $post['price'] ?></s>
												<?php echo $post['price_total'] ?>
											<?php endif ?>
											<?php if (empty($post['discount'])) : ?>
												<?php echo $post['price_total'] ?>
											<?php endif ?>
										</span>
									<?php endif ?>

								</div>
							</article>

						</div>

					<?php endforeach ?>

					<div class="col-12">
						<?php $this->load->view('lms/default-app/_layouts/pagination'); ?>
					</div>
				</div>

			</div>

		<?php else : ?><div class="col-sm-12 col-lg-12">
				<div class="c-card u-p-medium u-pv-xlarge" data-mh="landing-cards">

					<div class="u-text-center u-justify-between">
						<div class="c-avatar c-avatar--large u-mb-small u-inline-flex">
							<img class="c-avatar__img" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 3 2'%3E%3C/svg%3E" data-src="<?php echo base_url('storage/assets/lms/default-app/img/logo-square.png') ?>" alt="<?php echo $this->lang->line('courses_not_found') ?>">
						</div>

						<p class="u-h5">Kelas Tidak Ditemukan.</p>

					</div>

				</div>
			</div>
		<?php endif ?>

	</div><!-- // .row -->

</div><!-- // .container -->

<?php $this->load->view('lms/default-app/courses/part/nav-bottom'); ?>
<?php $this->load->view('lms/default-app/_layouts/footer'); ?>