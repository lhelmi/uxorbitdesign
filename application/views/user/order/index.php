<?php $this->load->view('lms/default-app/_layouts/header'); ?>
<?php $this->load->view('lms/default-app/_layouts/nav'); ?>

<div class="container u-mv-medium h-100vh" style="margin-top: 130px !important;">

	<div class="row">

		<?php $this->load->view('user/_layouts/nav'); ?>

		<div class="col-xl-9">

			<h2 class="u-h3 u-mb-small"><?php echo $this->lang->line('my_order') ?></h2>

			<?php if (!empty($order['data'])) : ?>
				<div class="c-card u-p-small u-mb-xsmall table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">Kode Pembelian</th>
								<th scope="col">Kelas</th>
								<th scope="col">Tanggal Pembelian</th>
								<th scope="col">Jumlah Bayar</th>
								<th scope="col">Status</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($order['data'] as $post) : ?>
								<tr>
									<th scope="row"><?php echo $post['id']; ?></th>
									<td><?php echo $post['title'] ?></td>
									<td><?php echo $post['time'] ?></td>
									<td><?php echo $post['amount'] ?></td>
									<td><?php if ($post['status'] == 'Pending' and $post['type'] == 'Manual') : ?>
											<a href='<?php echo base_url('payment/confirmation/' . $post['id']) ?>' class="c-btn c-btn--warning c-btn--custom c-btn--small">
												<?php echo $this->lang->line('payment_confirmation') ?>
											</a>
										<?php endif ?>

										<?php if ($post['status'] == 'Pending' and $post['type'] != 'Manual') : ?>
											<button data-lang='<?php echo ($site['language'] == 'indonesia') ? 'id' : 'en' ?>' data-token="<?php echo $post['token'] ?>" class="c-btn c-btn--warning c-btn--custom c-btn--small btn-check-payment">
												<?php echo $this->lang->line('wait_payment') ?>
											</button>
										<?php endif ?>

										<?php if ($post['status'] == 'Checking') : ?>
											<a href='<?php echo base_url('payment/waiting-confirmation/' . $post['id']) ?>' class="c-btn c-btn--fancy c-btn--custom c-btn--small">
												<?php echo $this->lang->line('wait_confirmation') ?>
											</a>
										<?php endif ?>

										<?php if ($post['status'] == 'Purchased') : ?>
											<span class="c-badge c-badge--success c-badge--small">
												<?php echo $this->lang->line('purchased') ?>
											</span>
										<?php endif ?>

										<?php if ($post['status'] == 'Failed') : ?>
											<span class="c-badge c-badge--danger c-badge--small">
												<?php echo $this->lang->line('failed_payment') ?>
											</span>
										<?php endif ?>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>

				<?php if (empty($this->input->get('showall')) and $order['pagination']['total_rows'] > $order['pagination']['per_page']) : ?>
					<div class="u-mv-medium row">
						<div class="col-6">
							<?php $this->load->view('lms/default-app/_layouts/pagination', ['courses' => $order]); ?>
						</div>
						<div class="col-6 o-line">
							<a class="u-ml-auto c-btn c-btn--custom c-btn--info" href="<?php echo base_url('user/order?showall=true') ?>">
								<?php echo $this->lang->line('show_all') ?>
							</a>
						</div>

					</div>
				<?php endif ?>

			<?php endif ?>

			<?php if (empty($order['data'])) : ?>
				<div class="c-card u-p-small">

					<div class="u-text-center u-justify-between u-pv-medium">
						<p class="u-h5"><?php echo $this->lang->line('user_order_not_found') ?></p>
					</div>

				</div>
			<?php endif ?>
		</div>

	</div>

</div><!-- // .row -->

</div><!-- // .container -->

<?php $this->load->view('lms/default-app/courses/part/nav-bottom'); ?>

<?php $this->load->view('lms/default-app/_layouts/footer'); ?>