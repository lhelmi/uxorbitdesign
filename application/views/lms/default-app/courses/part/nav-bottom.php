<nav class="navbar navbar-expand-lg desktop-navigation other-navbar p-0 d-block d-xl-none fixed-bottom">
    <div class="container">
        <ul class="menu-mobile-bottom">
            <li>
                <a href="<?php echo base_url() ?>" class="<?php if ($this->uri->segment(2) == '' or $this->uri->segment(2) == '' and $this->uri->segment(3) == 'create') {
                                                                echo "active-menu-nav-bottom";
                                                            } ?>">
                    <div>
                        <i class="fa fa-home"></i>
                    </div>

                    <p class="lh-12 mb-0"><span class="fs-10 font-400">Beranda</span></p>
                </a>
            </li>

            <li>
                <a href="<?php echo base_url('user/courses') ?>" class="<?php if ($this->uri->segment(2) == 'courses' or $this->uri->segment(2) == 'courses' and $this->uri->segment(3) == 'create') {
                                                                            echo "active-menu-nav-bottom";
                                                                        } ?>">
                    <div>
                        <i class="fa fa-book"></i>
                    </div>

                    <p class="lh-12 mb-0"><span class="fs-10 font-400">Kelas Saya</span></p>
                </a>
            </li>

            <li>
                <a href="<?php echo base_url('user/order') ?>" class="<?php if ($this->uri->segment(2) == 'order' or $this->uri->segment(2) == 'order' and $this->uri->segment(3) == 'create') {
                                                                            echo "active-menu-nav-bottom";
                                                                        } ?>">
                    <div>
                        <i class="fa fa-shopping-cart"></i>
                    </div>

                    <p class="lh-12 mb-0"><span class="fs-10 font-400">Pembelian</span></p>
                </a>
            </li>

            <li>
                <a href="javascript:void(0)" id="ShowMenuMobile" class="<?php if ($this->uri->segment(2) == 'profile' or $this->uri->segment(2) == 'profile' and $this->uri->segment(3) == 'create') {
                                                                            echo "active-menu-nav-bottom";
                                                                        } ?>">
                    <div>
                        <i class="fa fa-user"></i>
                    </div>

                    <p class="lh-12 mb-0"><span class="fs-10 font-400">Akun</span></p>
                </a>
            </li>
        </ul>
    </div>
</nav>

<div id="mySidenav" class="sidenav" style="background-color: #4424A7;">
    <div class="container-fluid mr-1 ml-1">
        <div class="closebtn text-gold" id="CloseMenuMobile">
            <svg width="15" height="15" viewBox="0 0 16 16">
                <path fill="#00CC99" fill-rule="evenodd" d="M16 1.622L9.622 8 16 14.378 14.378 16 8 9.622 1.622 16 0 14.378 6.378 8 0 1.622 1.622 0 8 6.378 14.378 0z">
                </path>
            </svg>
        </div>
        <div class="mt-3 mb-3">
            <a class="navbar-brand" href="<?php echo base_url() ?>" title='<?php echo $site['title'] ?>'>
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 3 2'%3E%3C/svg%3E" data-src="<?php echo base_url('storage/assets/lms/default-app/img/logo for web warna4.png') ?>" alt="<?php echo $site['title'] ?>" style="width: 60px;">
            </a>
        </div>
    </div>

    <div class="container-fluid mr-1 ml-1">
        <div id="menu-mobile" class="menu-slinky slinky-menu slinky-theme-default" style="transition-duration: 300ms; height: 265px;">
            <ul class="navbar-nav nav justify-content-end">
                <?php if ($this->session->userdata('user')) : ?>
                    <li class="nav-item margin-left-30">
                        <a href="<?php echo base_url('user/profile') ?>">Edit Profile</a>
                    </li>
                    <li class="nav-item margin-left-30">
                        <a href="<?php echo base_url('auth/process_logout') ?>" class="text-danger"><i class="fa fa-power-off mr-2" aria-hidden="true"></i> Logout</a>
                    </li>
                <?php endif ?>
                <?php if (empty($this->session->userdata('user'))) : ?>
                    <li class="nav-item margin-left-30">
                        <a class="nav-link font-color-white" href="<?php echo base_url('auth/register') ?>" title='<?php echo $this->lang->line('register') ?>'>
                            <?php echo $this->lang->line('register') ?>
                        </a>
                    </li>
                    <li class="nav-item margin-left-30">
                        <a class="btn btn-primary btn-background-color-primary2" type="button" href="<?php echo base_url('auth') ?>" title='<?php echo $this->lang->line('sign_in') ?>'>
                            <?php echo $this->lang->line('sign_in') ?>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</div>