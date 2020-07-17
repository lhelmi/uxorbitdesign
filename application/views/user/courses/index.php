<?php $this->load->view('lms/default-app/_layouts/header'); ?>
<?php $this->load->view('lms/default-app/_layouts/nav'); ?>

<div class="container u-mv-medium h-100vh margin-bottom-26-menu" style="margin-top: 130px !important;">

	<div class="row">

		<?php $this->load->view('user/_layouts/nav'); ?>

		<div class="col-xl-9">

			<h5 class="h5 font-color-hitam">Progres Kelas</h5>

			<?php if (!empty($courses['data'])) : ?>
				<?php foreach ($courses['data'] as $post) : ?>
					<div class="c-card u-p-small u-mb-xsmall">
						<div class="row">

							<div class="col-md-4">
								<div class="card">
									<a title="<?php echo $post['title'] ?>" class="u-color-primary" href="<?php echo $post['url'] ?>">
										<img class="card-img-top" width="200" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 3 2'%3E%3C/svg%3E" data-src="<?php echo $post['image']['thumbnail'] ?>" alt="<?php echo $post['title'] ?>">
									</a>
								</div>
							</div>

							<div class="col-md-8">
								<div class="u-mv-small">
									<?php if ($post['status'] != 'Draft') : ?>
										<a title="<?php echo $post['title'] ?>" class="h5 font-color-hitam u-text-bold" href="<?php echo $post['url'] ?>">
											<?php echo $post['title'] ?>
										</a>
									<?php endif ?>
								</div>

								<?php if ($post['status'] == 'Draft') : ?>
									<div class="u-color-primary u-text-bold">
										<?php echo $post['title'] ?>
										<span class="c-badge c-badge--warning c-badge--small u-ml-xsmall">
											<?php echo $this->lang->line('courses_closed') ?>
										</span>
									</div>
								<?php endif ?>

								<div class="row">
									<div class="u-mv-small col-2">
										<p class="u-bg-secondary u-color-primary c-badge">
											<?php echo $post['sub_category']['name'] ?>
										</p>
									</div>
									
									<?php if($post['count_lesson_user'] == $post['count_lesson']){ ?>
										<div class="u-align-items-center u-mv-small col-4">
											<a class="btn btn-primary-orbit" target="_blank" href="<?= site_url('user/courses/certificate/'. $post['id']); ?>">
												<i class="fa fa-file-o u-mr-xsmall"></i>Sertifikat
											</a>
										</div>
									<?php } ?>

									<div class="u-align-items-center u-mv-small col-4">
										<a title="<?php echo $post['title'] ?>" class="btn btn-primary-orbit" href="<?php echo $post['first_lesson'] ?>">
											<i class="fa fa-send-o u-mr-xsmall"></i><?php echo $this->lang->line('learn_now') ?>
										</a>
									</div>
								</div>

								<div class="col-12 u-mv-small order-lg-3">
									<p>
										Progress Belajar Kamu : <?php echo $post['user_lesson_progress'] ?>
										(<?php echo $post['count_lesson_user'] . '/' . $post['count_lesson'] ?>)
									</p>
									<div class="progress">
										<div class="progress-bar" style="width:<?php echo $post['user_lesson_progress'] ?>;"><?php echo $post['user_lesson_progress'] ?></div>
									</div>
								</div>

							</div>

						</div>
					</div>
				<?php endforeach ?>

				<?php if (empty($this->input->get('showall')) and $courses['pagination']['total_rows'] > $courses['pagination']['per_page']) : ?>
					<div class="u-mv-medium row">
						<div class="col-6">
							<?php $this->load->view('lms/default-app/_layouts/pagination'); ?>
						</div>
						<div class="col-6 o-line">
							<a class="u-ml-auto c-btn c-btn--custom c-btn--info" href="<?php echo base_url('user/courses?showall=true') ?>">
								<?php echo $this->lang->line('show_all') ?>
							</a>
						</div>

					</div>
				<?php endif ?>

			<?php endif ?>

			<?php if (empty($courses['data'])) : ?>
				<div class="c-card u-p-small">

					<div class="u-text-center u-justify-between u-pv-medium">
						<p class="u-h5"><?php echo $this->lang->line('user_courses_not_found') ?></p>
					</div>

				</div>
			<?php endif ?>
		</div>

	</div>

</div><!-- // .row -->

</div><!-- // .container -->

<?php $this->load->view('lms/default-app/courses/part/nav-bottom'); ?>

<?php $this->load->view('lms/default-app/_layouts/footer'); ?>
<script>
	var message = '<?= $this->session->flashdata('Tutup') ?>';
	if (message !== '') {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: message,
		});
	}
</script>