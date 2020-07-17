<li class="c-sidebar__item">
	<a class="c-sidebar__link <?php if ($this->uri->segment(1) == "app" and empty($this->uri->segment(2)) or $this->uri->segment(2) == 'dashboard') {
									echo "is-active";
								} ?>" href="<?php echo base_url('app/dashboard') ?>">
		<i class="fa fa-fire u-mr-xsmall"></i>Dashboard
	</a>
</li>

<h4 class="c-sidebar__title">Manajemen Kelas</h4>

<li class="c-sidebar__item">
	<a class="c-sidebar__link <?php if ($this->uri->segment(2) == 'lms_courses' or $this->uri->segment(2) == 'lms_courses' and $this->uri->segment(3) == 'create') {
									echo "is-active";
								} ?>" href="<?php echo base_url('app/lms_courses') ?>">
		<i class="fa fa-folder u-mr-xsmall"></i>Kelas
		<?php if($this->M_Dashboard->kelas_verified() > 0 ){ ?>
			<div id="divkelas_verified">
				<span class="btn btn-warning btn-circle btn-sm" id="idkelas_verified" style="margin-left: 10px;">
					<div class="ini_kelas_verified">
						<?= $this->M_Dashboard->kelas_verified(); ?>
					</div>
				</span> 
			</div>
			
		<?php } ?>
	</a>
</li>
<li class="c-sidebar__item">
	<a class="c-sidebar__link <?php if ($this->uri->segment(2) == 'lms_category' or $this->uri->segment(2) == 'lms_category' and $this->uri->segment(3) == 'create') {
									echo "is-active";
								} ?>" href="<?php echo base_url('app/lms_category') ?>">
		<i class="fa fa-folder u-mr-xsmall"></i>Kategori Kelas
	</a>
</li>
<li class="c-sidebar__item">
	<a class="c-sidebar__link <?php if ($this->uri->segment(2) == 'lms_coupon' or $this->uri->segment(2) == 'lms_coupon' and $this->uri->segment(3) == 'create') {
									echo "is-active";
								} ?>" href="<?php echo base_url('app/lms_coupon') ?>">
		<i class="fa fa-folder u-mr-xsmall"></i>Kupon Kelas
	</a>
</li>


<h4 class="c-sidebar__title">User</h4>

<li class="c-sidebar__item">
	<a class="c-sidebar__link <?php if ($this->uri->segment(2) == 'user' or $this->uri->segment(2) == 'user' and $this->uri->segment(3) == 'create') {
									echo "is-active";
								} ?>" href="<?php echo base_url('app/user') ?>">
		<i class="fa fa-user-circle u-mr-xsmall"></i>User
	</a>
</li>

<li class="c-sidebar__item">
	<a class="c-sidebar__link <?php if ($this->uri->segment(2) == 'mentor' or $this->uri->segment(2) == 'mentor' and $this->uri->segment(3) == 'create') {
									echo "is-active";
								} ?>" href="<?php echo base_url('app/mentor') ?>">
		<i class="fa fa-user-circle u-mr-xsmall"></i>Mentor
	</a>
</li>

<?php if ($this->site['payment_method'] == 'Manual') : ?>
	<li class="c-sidebar__item">
		<a class="c-sidebar__link <?php if ($this->uri->segment(2) == 'user_invoice' or $this->uri->segment(2) == 'user_invoice' and $this->uri->segment(3) == 'create') {
										echo "is-active";
									} ?>" href="<?php echo base_url('app/user_invoice') ?>">
			<i class="fa fa-shopping-cart u-mr-xsmall"></i>Invoice
			<?php if($this->M_Dashboard->get_invoice_notif() > 0 ){ ?>
				<div id="dividnotif">
					<span class="btn btn-warning btn-circle btn-sm" id="notif_request" style="margin-left: 10px;">
						<div class="ini_notif">
							<?= $this->M_Dashboard->get_invoice_notif(); ?>
						</div>
					</span> 
				</div>
				
			<?php } ?>
		</a>
	</li>
	<li class="c-sidebar__item">
		<a class="c-sidebar__link <?php if ($this->uri->segment(2) == 'user_invoice_history' or $this->uri->segment(2) == 'user_invoice_history' and $this->uri->segment(3) == 'create') {
										echo "is-active";
									} ?>" href="<?php echo base_url('app/user_invoice_history') ?>">
			<i class="fa fa-history u-mr-xsmall"></i>Invoice History
		</a>
	</li>

	<li class="c-sidebar__item">
		<a class="c-sidebar__link <?php if ($this->uri->segment(2) == 'user_tfrequest' or $this->uri->segment(2) == 'user_tfrequest' and $this->uri->segment(3) == 'create') {
										echo "is-active";
									} ?>" href="<?php echo base_url('app/user_tfrequest') ?>">
			<i class="fa fa-history u-mr-xsmall"></i>Transfer Requests
			<?php if($this->M_Dashboard->get_notif() > 0 ){ ?>
				<div id="dividnotif">
					<span class="btn btn-warning btn-circle btn-sm" id="notif_request" style="margin-left: 10px;">
						<div class="ini_notif">
							<?= $this->M_Dashboard->get_notif(); ?>
						</div>
					</span> 
				</div>
				
			<?php } ?>
		</a>
	</li>
<?php endif ?>

<h4 class="c-sidebar__title">Pengaturan</h4>


<li class="c-sidebar__item">
	<a class="c-sidebar__link <?php if ($this->uri->segment(2) == 'setting_payment' or $this->uri->segment(2) == 'setting_payment' and $this->uri->segment(3) == 'create') {
									echo "is-active";
								} ?>" href="<?php echo base_url('app/setting_payment') ?>">
		<i class="fa fa-credit-card u-mr-xsmall"></i>Payment
	</a>
</li>