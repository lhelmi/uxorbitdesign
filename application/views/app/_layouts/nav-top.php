<!-- <h2 class="c-navbar__title u-mr-auto"></h2> -->
<a class="btn c-btn--small u-mr-auto btn-gratis c-btn--small" href="<?php echo base_url() ?>" target='_blank'>
	<i class="fa fa-link" aria-hidden="true"></i> Lihat Website
</a>

<h2 class="c-navbar__title u-mr-auto font-color-hitam text-bold"><?php echo $title ?></h2>

<div class="c-dropdown dropdown">
	<a class="c-avatar c-avatar--xsmall has-dropdown dropdown-toggle" href="#" id="dropdwonMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<img class="c-avatar__img" src="<?php echo (!empty($this->session->userdata('app_photo')) ?  base_url('storage/uploads/user/photo/' . $this->session->userdata('app_photo')) : base_url('storage/uploads/user/photo/default.png')) ?>" alt="<?php echo $this->session->userdata('app_pusername') ?>">
		<p><?= $this->session->userdata('grade'); ?></p>
	</a>

	<div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdwonMenuAvatar">
		<a class="c-dropdown__item dropdown-item" href="<?php echo base_url('app/user_setting') ?>">
			<i class="fas fa-fw fa-user u-mr-xsmall"></i>
			Profil
		</a>
		<a class="c-dropdown__item dropdown-item" href="<?php echo base_url('auth/process_logout') ?>">
			<i class="fa fa-arrow-right u-mr-xsmall"></i>
			Logout
		</a>
	</div>
</div>