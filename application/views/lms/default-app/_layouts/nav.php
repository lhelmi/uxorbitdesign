 <header class="bg-primary-color">
     <div class="container">
         <nav class="navbar navbar-expand-lg navbar-light bg-primary-color fixed-top">

             <div class="container">
                 <a class="navbar-brand" href="<?php echo base_url() ?>" title='<?php echo $site['title'] ?>'>
                     <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 3 2'%3E%3C/svg%3E" data-src="<?php echo base_url('storage/assets/lms/default-app/img/logo for web warna4.png') ?>" alt="<?php echo $site['title'] ?>" style="width: 50px;">
                 </a>
                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                 </button>

                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav mr-auto">
                         <li class="nav-item">
                             <a class="nav-link font-color-white" href="<?php echo base_url() ?>">Katalog Kelas</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link font-color-white" href="https://uxorbitdesign.com">Home</a>
                         </li>
                     </ul>
                     <form class="form-inline my-2 my-lg-0" action="<?php echo base_url('courses-filter') ?>" method="GET">
                         <input onclick="this.select()" value='<?php echo (!empty($this->input->get('q')) ? $this->input->get('q') : '') ?>' class="form-control mr-sm-2" type="text" name="q" placeholder="Cari Kelas...">
                     </form>
                     <ul class="navbar-nav nav justify-content-end display-menu-user">
                         <li class="nav-item margin-left-30">
                             <?php $this->load->view('lms/default-app/_layouts/nav-user'); ?>
                         </li>
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

         </nav>
     </div>
 </header>