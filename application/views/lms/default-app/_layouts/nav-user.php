<?php if ($this->session->userdata('user')) : ?>
    <div class="dropdown">
        <a class="c-avatar c-avatar--xsmall has-dropdown dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="c-avatar__img" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 3 2'%3E%3C/svg%3E" data-src="<?php echo (!empty($this->session->userdata('photo')) ?  base_url('storage/uploads/user/photo/' . $this->session->userdata('photo')) : base_url('storage/uploads/user/photo/default.png')) ?>" alt="<?php echo $this->session->userdata('username') ?>">
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item font-color-hitam" href="<?php echo base_url('user/profile') ?>">
                <i class="fa fa-user u-mr-xsmall"></i>
                Profil Saya
            </a>
            <a class="dropdown-item font-color-hitam" href="<?php echo base_url('user/courses') ?>">
                <i class="fa fa-book u-mr-xsmall <?php echo ($this->uri->segment(2) == 'courses') ? '' : '' ?>"></i>
                Kelas Saya
            </a>
            <a class="dropdown-item font-color-hitam" href="<?php echo base_url('user/order') ?>">
                <i class="fa fa-shopping-cart u-mr-xsmall"></i>
                Pembelian
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item font-color-hitam" href="<?php echo base_url('auth/process_logout') ?>">
                <i class="fa fa-sign-out u-mr-xsmall"></i>
                Keluar
            </a>
        </div>
    </div>
<?php endif ?>