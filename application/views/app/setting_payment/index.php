<?php $this->load->view('app/_layouts/header'); ?>
<?php $this->load->view('app/_layouts/sidebar'); ?>
<?php $this->load->view('app/_layouts/content'); ?>

<div class="col-12 u-mv-small">
	<form action="<?php echo base_url('app/setting_payment/process_setting') ?>" class="row" method="post" enctype="multipart/form-data">

		<div class="col-12 col-xl-8 col-lg-10 col-md-12 offset-xl-2 offset-lg-1">

			<?php $this->load->view('app/_layouts/alert'); ?>

			<div class="c-card c-card--responsive u-p-zero">
				<div class="c-card__header o-line">
					<h5 class="c-card__title">
						<?php echo $title; ?>
					</h5>
					<?php if ($this->session->userdata('app_grade') == 'App') : ?>
						<button class="c-btn c-btn--info u-ml-auto u-mr-small c-btn--custom" type="submit">
							<i class="fa fa-save" aria-hidden="true"></i>
						</button>
					<?php endif ?>
				</div>
				<div class="c-card__body u-p-zero u-pt-small">

					<?php
						// if ($this->session->userdata('app_grade') == 'App') :
					?>
					<?php
						// $this->load->view('app/setting_payment/form-setting'); 
					?>
					<?php
					// endif 
					?>

					<div class="row">

						<div class="col-12">

							<!-- start -->
							<div class="c-stage u-m-zero u-border-bottom-zero type-manual">

								<div class="c-stage__header o-media u-justify-start cursor-default">
									<div class="c-stage__icon o-media__img">
										<i class="fa fa-info"></i>
									</div>
									<div class="c-stage__header-title o-media__body">
										<?php if ($this->session->userdata('app_grade') == 'Instructor') {  ?>
											<h6 class="u-mb-zero">Akun Bank</h6>
										<?php } else { ?>
											<h6 class="u-mb-zero">Transaksi</h6>
										<?php } ?>
									</div>
									<div class="u-ml-auto o-line">
										<button type="button" id="tambahmodal" class="c-btn c-btn--success c-btn--custom u-mr-xsmall button-payment-transaction-create" data-toggle="modal" data-target="#form-transaction">
											<i class="fa fa-plus"></i> Tambahkan Akun Bank
										</button>
									</div>
								</div>

								<div class="c-stage__panel u-p-medium">

									<div class="c-table-responsive">
										<table id="tabeltrans" class="table table-striped" style="display: table">
											<thead class="c-table__head c-table__head--slim">
												<tr class="c-table__row">
													<th class="c-table__cell c-table__cell--head">Nama Bank</th>
													<th class="c-table__cell c-table__cell--head">Nomor Rekening</th>
													<th class="c-table__cell c-table__cell--head">Nama Penerima</th>
													<th class="c-table__cell c-table__cell--head">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php if (!empty($databank)) : ?>
													<?php foreach ($databank as $transaction) : ?>
														<tr class="c-table__row">
															<th class="c-table__cell">
																<?php echo $transaction['type'] ?>
															</th>
															<th class="c-table__cell">
																<?php echo $transaction['account_number'] ?>
															</th>
															<th class="c-table__cell">
																<?php echo $transaction['receiver'] ?>
															</th>
															<th class="c-table__cell" style="width: 10%">
																<button type="button" id="btnedit-trans" data-identity="<?= $transaction['id'] ?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#form-transaction">
																	<i class="fa fa-edit"></i> Edit
																</button>
																<button id="btnhapus-trans" data-identity="<?= $transaction['id'] ?>" class="btn btn-danger btn-sm" type="button">
																	<i class="fa fa-trash"></i> Hapus
																</button>
															</th>
														</tr>
													<?php endforeach ?>
												<?php endif ?>

											</tbody>
										</table>
									</div>

								</div>

							</div>
							<!-- end -->


							<!-- start -->
							<div class="c-stage u-m-zero u-border-top-zero type-manual" style='<?php echo ($site['payment_method'] == 'Manual') ? '' : 'display:none'; ?>'>

								<div class="c-stage__header o-media u-justify-start cursor-default">
									<div class="c-stage__icon o-media__img">
										<i class="fa fa-info"></i>
									</div>
									<div class="c-stage__header-title o-media__body">
										<h6 class="u-mb-zero">Konfirmasi</h6>
									</div>
									<div class="u-ml-auto o-line">
										<button type="button" id="btncont" class="c-btn c-btn--success c-btn--custom u-mr-xsmall button-payment-confirmation-create" data-toggle="modal" data-target="#form-confirmation">
											<i class="fa fa-plus"></i> Tambahkan Konfirmasi
										</button>
									</div>
								</div>

								<div class="c-stage__panel u-p-medium">

									<div class="c-table-responsive">
										<table class="c-table c-table--highlight" id="tabelindex" style="display: table">
											<thead class="c-table__head c-table__head--slim">
												<tr class="c-table__row">
													<th class="c-table__cell c-table__cell--head">Konfirmasi Melalui</th>
													<th class="c-table__cell c-table__cell--head">Data</th>
													<th class="c-table__cell c-table__cell--head">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php if ($get_confirm_id) : ?>
													<?php foreach ($get_confirm_id as $confirmation) : ?>
														<tr class="c-table__row">
															<th class="c-table__cell">
																<?php echo $confirmation['medium'] ?>
															</th>
															<th class="c-table__cell">
																<?php echo $confirmation['description'] ?>
															</th>
															<th class="c-table__cell" style="width: 10%">
																<button id="edit-confirm" data-identity='<?php echo $confirmation['id'] ?>' type="button" class="c-btn c-btn--small c-btn--info c-btn--custom button-payment-confirmation" data-toggle="modal" data-target="#form-confirmation">
																	<i class="fa fa-edit"></i> Edit
																</button>
																<button id="btnhapus-cont" data-identity="<?= $confirmation['id'] ?>" class="btn btn-danger btn-sm" type="button">
																	<i class="fa fa-trash"></i> Hapus
																</button>
															</th>
														</tr>
													<?php endforeach ?>
												<?php endif ?>
												
											</tbody>
										</table>
									</div>

								</div>

							</div>
							<!-- end -->

						</div>

					</div>
				</div>
			</div>

		</div>

	</form>

</div>

<?php $this->load->view('app/setting_payment/form-confirmation'); ?>
<?php $this->load->view('app/setting_payment/form-transaction'); ?>

<?php $this->load->view('app/_layouts/footer'); ?>