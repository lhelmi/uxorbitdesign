<?php $this->load->view('app/_layouts/header'); ?>

<div class="o-page__card mb-3" style="margin-top: -100px;">
    <div class="c-card u-mb-xsmall card-uxorbit">
        <header class="c-card__header u-pt-large card-header-orbit">
            <a class="mb-5" href="<?php echo base_url() ?>">
                <img src="<?php echo base_url('storage/assets/lms/default-app/img/logo for web.png') ?>" alt="<?php echo $site['title'] ?>" class="mb-5" width="70">
            </a>
            <h2 class="h2 font-weight-bold font-color-black mb-3">Belajar UI/UX Dengan Ahlinya</h2>
            <h5 class="h5">Silahkan daftar dulu</h5>
        </header>

        <form class="c-card__body using-captcha user card-padding-top" action="<?php echo base_url('auth/register') ?>" method="POST">

            <?php $this->load->view('app/_layouts/alert'); ?>

            <div class="form-group">
                <label for="exampleFormControlInput1">Nama Lengkap</label>
                <input required='' id="exampleFormControlInput1" value="<?php echo set_value('nama_lengkap'); ?>" autofocus="" name='nama_lengkap' class="c-input form-control form-size" type="text" placeholder="Nama Lengkap">
                <?php echo form_error('nama_lengkap', '<small class="c-field__message u-color-danger"><i class="fa fa-times-circle"></i>', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Username</label>
                <input required='' id="exampleFormControlInput1" value="<?php echo set_value('full_name'); ?>" autofocus="" name='full_name' class="c-input form-control form-size" type="text" placeholder="Username">
                <?php echo form_error('full_name', '<small class="c-field__message u-color-danger"><i class="fa fa-times-circle"></i>', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput2">
                    <?php echo $this->lang->line('email') ?>
                </label>
                <input required='' id="exampleFormControlInput2" value="<?php echo set_value('email'); ?>" value="" name="email" class="c-input form-control form-size" type="email" placeholder="<?php echo $this->lang->line('email') ?>">
                <?php echo form_error('email', '<small class="c-field__message u-color-danger"><i class="fa fa-times-circle"></i>', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput4"><?php echo $this->lang->line('password') ?></label>
                <div class="c-field has-addon-right">
                    <input required='' id="exampleFormControlInput4" value="<?php echo set_value('password'); ?>" id='password' name="password" class="c-input form-control form-size" type="password">
                    <button tabindex="-1" type="button" class="c-field__addon" onclick="toggle('password',this)">
                        <i class="fa fa-eye-slash"></i>
                    </button>
                </div>
                <?php echo form_error('password', '<small class="c-field__message u-color-danger"><i class="fa fa-times-circle"></i>', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput5"><?php echo $this->lang->line('password_confirm') ?></label>
                <div class="c-field has-addon-right">
                    <input required='' id="exampleFormControlInput5" value="<?php echo set_value('password_confirm'); ?>" id='password_confirm' name="password_confirm" class="c-input form-control form-size" type="password">
                    <button tabindex="-1" type="button" class="c-field__addon" onclick="toggle('password_confirm',this)">
                        <i class="fa fa-eye-slash"></i>
                    </button>
                </div>
                <?php echo form_error('password_confirm', '<small class="c-field__message u-color-danger"><i class="fa fa-times-circle"></i>', '</small>'); ?>
            </div>

            <?php if ($site['google_recaptcha']['status'] == 'Yes') : ?>
                <div class="g-recaptcha u-mb-medium" data-sitekey="<?php echo $site['google_recaptcha']['site_key'] ?>" data-callback="recaptchaCallback"></div>
            <?php endif ?>

            <input type="hidden" name="csrf_code" value="<?php echo $this->session->userdata('csrf_code') ?>">
            <button class="btn btn-primary btn-block btn-background-color-primary" type="submit">
                DAFTAR
            </button>
            <a class="btn btn-primary btn-block btn-background-color-abu" title='<?php echo $this->lang->line('sign_in') ?>' href="<?php echo base_url('auth') ?>">
                <i class="fa fa-sign-in u-mr-xsmall"></i> <?php echo $this->lang->line('sign_in') ?>
            </a>

        </form>
    </div>


</div>

<?php $this->load->view('lms/default-app/_layouts/footer'); ?>