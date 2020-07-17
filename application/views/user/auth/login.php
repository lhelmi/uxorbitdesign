<?php $this->load->view('app/_layouts/header'); ?>

<div class="o-page__card">
    <div class="o-page__card mb-3">
        <div class="c-card u-mb-xsmall card-uxorbit">
            <header class="c-card__header u-pt-large card-header-orbit">
                <a class="mb-5" href="<?php echo base_url() ?>">
                    <img src="<?php echo base_url('storage/assets/lms/default-app/img/logo for web.png') ?>" alt="<?php echo $site['title'] ?>" class="mb-5" width="70">
                </a>
                <h2 class="h2 font-weight-bold font-color-black mb-3">Yuk Update Skill UI/UX Kamu</h2>
                <h5 class="h5">Silahkan login dulu</h5>
            </header>

            <form class="c-card__body using-captcha user card-padding-top" action="<?php echo base_url('auth/process') ?>" method="POST">

                <?php $this->load->view('app/_layouts/alert'); ?>

                <div class="form-group">
                    <label for="exampleFormControlInput1">
                        <?php echo $this->lang->line('email') ?>
                    </label>
                    <input required="" id="exampleFormControlInput1" autofocus="" name="email" class="c-input form-control form-size" type="email" placeholder="<?php echo $this->lang->line('email') ?>">
                    <?php echo form_error('email'); ?>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput2"><?php echo $this->lang->line('password') ?></label>
                    <input required="" id="exampleFormControlInput2" name='password' class="c-input form-control form-size" type="password" placeholder="<?php echo $this->lang->line('password') ?>">
                    <?php echo form_error('password'); ?>
                </div>

                <?php if (!empty($this->input->get('redirect'))) : ?>
                    <input type="hidden" name="redirect" value="<?php echo strip_tags($this->input->get('redirect')) ?>">
                <?php endif ?>

                <input type="hidden" name="csrf_code" value="<?php echo $this->session->userdata('csrf_code') ?>">
                <button class="btn btn-primary btn-block btn-background-color-primary" type="submit">
                    MASUK
                </button>
                <a class="btn btn-primary btn-block btn-background-color-abu" title='<?php echo $this->lang->line('register') ?>' href="<?php echo base_url('auth/register') ?>">
                    <i class="fa fa-user-plus u-mr-xsmall" aria-hidden="true"></i> <?php echo $this->lang->line('register') ?>
                </a>

            </form>
        </div>

    </div>

</div>

<?php $this->load->view('lms/default-app/_layouts/footer'); ?>