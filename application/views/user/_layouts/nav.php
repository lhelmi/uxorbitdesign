<div class="col-xl-3 u-hidden-down@desktop">
	<aside class="c-menu u-mb-small">

		<div class="u-hidden-down@desktop">
			<h5 class="h5 font-color-hitam">Menu Utama</h5>
			<div class="row">
				<div class="col-12">
					<div class="list-group" id="list-tab" role="tablist">
						<a class="list-group-item list-group-item-action font-color-hitam2 <?php echo ($this->uri->segment(2) == 'profile') ? 'active-orbit' : '' ?>" href="<?php echo base_url('user/profile') ?>">
							<i class="fa fa-user u-mr-xsmall"></i>Profil Saya
						</a>
						<a class="list-group-item list-group-item-action font-color-hitam2 <?php echo ($this->uri->segment(2) == 'courses') ? 'active-orbit' : '' ?>" href="<?php echo base_url('user/courses') ?>">
							<i class="fa fa-book u-mr-xsmall <?php echo ($this->uri->segment(2) == 'courses') ? '' : '' ?>"></i>
							Kelas Saya
						</a>
						<a class="list-group-item list-group-item-action font-color-hitam2 <?php echo ($this->uri->segment(2) == 'order') ? 'active-orbit' : '' ?>" href="<?php echo base_url('user/order') ?>">
							<i class="fa fa-shopping-cart u-mr-xsmall"></i>
							Pembelian
						</a>
					</div>
				</div>
			</div>
		</div>

		<!-- <div class="u-hidden-up@desktop">		

			<h4 class="u-h4">Menu</h4>

			<select id="selectmenu" class="select2">
				<option value=""></option>

				<option <?php echo ($this->uri->segment(2) == 'profile') ? 'selected' : '' ?> value="<?php echo base_url('user/profile') ?>">
					<i class="fa fa-user u-mr-xsmall"></i><?php echo $this->lang->line('my_profile') ?>
				</option>


				<option <?php echo ($this->uri->segment(2) == 'courses') ? 'selected' : '' ?> value="<?php echo base_url('user/courses') ?>">
					<i class="fa fa-book u-mr-xsmall"></i><?php echo $this->lang->line('my_courses') ?>
				</option>


				<option <?php echo ($this->uri->segment(2) == 'order') ? 'selected' : '' ?> value="<?php echo base_url('user/order') ?>">
					<i class="fa fa-shopping-cart u-mr-xsmall"></i><?php echo $this->lang->line('my_order') ?>
				</option>

			</select>
		</div> -->
	</aside>
</div>