<section class="content-blank pt-4">
    <div class="container mb-4">
        <div class="row mb-5">
            <div class="col-12 col-lg-8">
                <!-- <div class="pict-featured-album p-relative mb-4">
                    <video controls="" width="100%" height="360px" name="media" controlslist="nodownload" __idm_id__="637922305">
                        <source src="https://cdnls.ams3.digitaloceanspaces.com/course/1%20-%20Eksplorasi%20Audiens%20Pembicara%20Terkenal.mp4" type="video/mp4">
                    </video>
                </div> -->

                <h4 class="h4 u-text-bold font-color-hitam">Tentang Kelas</h4>
                <hr class="hr-custom">

                <?php if (!empty($courses['description'])) : ?>
                    <div class="info-kelas-play mt-3 font-weight-light p-line-height">
                        <?php echo $courses['description']; ?>
                    </div>
                <?php endif ?>
                <?php if (empty($courses['description'])) : ?>
                    <div class="c-alert u-bg-secondary u-text-dark">
                        <?php echo $this->lang->line('no_description') ?>
                    </div>
                <?php endif ?>
            </div>

            <div class="col-12 col-lg-4 d-none d-lg-block">
                <div class="card card-slick-custom static-sticky-class">
                    <div class="block-over-img">
                        <img class="card-img-top w-100" src="<?php echo $courses['image']['thumbnail'] ?>" alt="<?php echo $courses['title'] ?>" height="200">
                    </div>
                    <div class="card-body p-3">
                        <div class="d-flex flex-wrap align-items-center">
                            <?php if ($courses['user_courses']) : ?>
                                <div class="c-state-card__icon bg-primary-orbit" style="width: 30px;height: 30px;">
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="c-state-card__content font-color-primary u-text-bold">
                                    <?php echo $this->lang->line('hasben_owned') ?>
                                </div>
                            <?php endif ?>
                            <?php if (empty($courses['user_courses'])) : ?>

                                <?php if (empty($courses['price'])) : ?>

                                    <div class="c-state-card__icon bg-primary" style="width: 30px;height: 30px;">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="c-state-card__content">
                                        <h4 class="font-600 mb-0 mr-2 u-text-bold form-color-biru2">
                                            <?php echo $this->lang->line('free') ?>
                                        </h4>
                                    </div>
                                <?php endif ?>
                                <?php if (!empty($courses['price'])) : ?>
                                    <div class="c-state-card__icon c-state-card__icon--info u-bg-success" style="width: 30px;height: 30px;">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="c-state-card__content">
                                        <h4 class="font-600 mb-0 mr-2 u-text-bold font-color-primary">
                                            <?php if (!empty($courses['discount'])) : ?>
                                                <s class="u-text-xsmall u-block"><?php echo $courses['price'] ?></s>
                                                <?php echo $courses['price_total'] ?>
                                            <?php endif ?>
                                            <?php if (empty($courses['discount'])) : ?>
                                                <?php echo $courses['price_total'] ?>
                                            <?php endif ?>
                                        </h4>
                                    </div>
                                <?php endif ?>
                            <?php endif ?>
                        </div>

                        <!-- <p class="text-default font-400 mb-0">Per member</p> -->
                        <hr>
                        <?php if ($this->session->userdata('user')) : ?>

                            <?php if (!empty($courses['first_lesson'])) : ?>

                                <?php if ($courses['user_courses']) : ?>
                                    <a class="btn btn-primary-orbit w-100" href="<?php echo $courses['first_lesson'] ?>">
                                        <i class="fa fa-send-o u-mr-xsmall"></i><?php echo $this->lang->line('learn_now') ?>
                                    </a>
                                <?php endif ?>

                                <?php if (empty($courses['user_courses'])) : ?>

                                    <?php if (empty($courses['price'])) : ?>
                                        <button id="bclick" data-id='<?php echo base64_encode($courses['id']) ?>' class="btn btn-primary-orbit w-100">
                                            <i class="fa fa-plus u-mr-xsmall"></i><?php echo $this->lang->line('add_to_my_courses') ?>
                                        </button>
                                    <?php endif ?>
                                    <?php if (!empty($courses['price'])) : ?>
                                        <a class="btn btn-primary-orbit w-100" href='<?php echo base_url('payment/order/' . $courses['slug']) ?>'>
                                            <i class="fa fa-shopping-cart u-mr-xsmall"></i><?php echo $this->lang->line('buy') ?>
                                        </a>

                                    <?php endif ?>

                                <?php endif ?>
                            <?php endif ?>

                            <?php if (empty($courses['first_lesson'])) : ?>
                                <button class="c-btn c-btn--custom" disabled="">
                                    <i class="fa fa-send-o u-mr-xsmall"></i><?php echo $this->lang->line('no_lesson') ?>
                                </button>
                            <?php endif ?>

                        <?php endif ?>

                        <?php if (empty($this->session->userdata('user'))) : ?>

                            <?php if (!empty($courses['first_lesson'])) : ?>

                                <?php if (empty($courses['price'])) : ?>
                                    <?php if ($site['lms_free_courses_readable'] == 'Yes') : ?>
                                        <a class="btn btn-primary-orbit w-100" href="<?php echo $courses['first_lesson'] ?>">
                                            <i class="fa fa-send-o u-mr-xsmall"></i><?php echo $this->lang->line('learn_now') ?>
                                        </a>
                                    <?php endif ?>
                                    <?php if ($site['lms_free_courses_readable'] == 'No') : ?>
                                        <a class="btn btn-primary-orbit w-100" href="<?php echo base_url('auth?redirect=' . urlencode($courses['url'])) ?>">
                                            <i class="fa fa-send-o u-mr-xsmall"></i><?php echo $this->lang->line('learn_now') ?>
                                        </a>
                                    <?php endif ?>
                                <?php endif ?>
                                <?php if (!empty($courses['price'])) : ?>
                                    <a class="btn btn-primary-orbit w-100" href="<?php echo base_url('auth?redirect=' . urlencode(base_url('payment/order/' . $courses['slug']))) ?>">
                                        <i class="fa fa-shopping-cart u-mr-xsmall"></i><?php echo $this->lang->line('buy') ?>
                                    </a>
                                <?php endif ?>
                            <?php endif ?>

                            <?php if (empty($courses['first_lesson'])) : ?>
                                <button class="c-btn c-btn--custom" disabled="">
                                    <i class="fa fa-send-o u-mr-xsmall"></i><?php echo $this->lang->line('no_lesson') ?>
                                </button>
                            <?php endif ?>

                        <?php endif ?>
                        <p class="btn btn-red w-100 mb-1 mt-2">Semua kelas bisa diakses seumur hidup.</p>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<nav class="d-block d-lg-none bottom-stiky-class fixed-bottom">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex flex-wrap align-items-center">
                <div class="mr-4"><img class="img-module-bottom img-fluid" src="<?php echo $courses['image']['thumbnail'] ?>" alt="<?php echo $courses['title'] ?>"></div>
                <div>
                    <div class="font-title text-primary font-400 fs-15">
                        <?php if ($courses['user_courses']) : ?>
                            <div class="c-state-card__icon bg-primary-orbit" style="width: 30px;height: 30px;">
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="c-state-card__content font-color-primary u-text-bold">
                                <?php echo $this->lang->line('hasben_owned') ?>
                            </div>
                        <?php endif ?>
                        <?php if (empty($courses['user_courses'])) : ?>

                            <?php if (empty($courses['price'])) : ?>

                                <div class="c-state-card__icon bg-primary" style="width: 30px;height: 30px;">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="c-state-card__content">
                                    <h4 class="font-600 mb-0 mr-2 u-text-bold form-color-biru2">
                                        <?php echo $this->lang->line('free') ?>
                                    </h4>
                                </div>
                            <?php endif ?>
                            <?php if (!empty($courses['price'])) : ?>
                                <div class="c-state-card__content">
                                    <h4 class="font-600 mb-0 mr-2 u-text-bold font-color-primary">
                                        <?php if (!empty($courses['discount'])) : ?>
                                            <s class="u-text-xsmall u-block"><?php echo $courses['price'] ?></s>
                                            <?php echo $courses['price_total'] ?>
                                        <?php endif ?>
                                    </h4>
                                    <h4>
                                        <?php if (empty($courses['discount'])) : ?>
                                            <?php echo $courses['price_total'] ?>
                                        <?php endif ?>
                                    </h4>
                                </div>
                            <?php endif ?>
                        <?php endif ?>
                    </div>
                    <!-- <div class="font-desc text-secondary font-400 fs-10 mb-0"><del>Rp.250.000</del></div> -->
                </div>

            </div>
            <?php if ($this->session->userdata('user')) : ?>

                <?php if (!empty($courses['first_lesson'])) : ?>

                    <?php if ($courses['user_courses']) : ?>
                        <a class="btn btn-primary-orbit" href="<?php echo $courses['first_lesson'] ?>">
                            <i class="fa fa-send-o u-mr-xsmall"></i><?php echo $this->lang->line('learn_now') ?>
                        </a>
                    <?php endif ?>

                    <?php if (empty($courses['user_courses'])) : ?>

                        <?php if (empty($courses['price'])) : ?>

                            <!-- <button id="bngst" data-redirect='<?php //echo current_url() 
                                                                    ?>' data-id='<?php //echo $courses['id'] 
                                                                                    ?>' class="btn btn-primary-orbit w-100" data-action="<?php //echo base_url('user/courses/add_courses/') 
                                                                                                                                                                    ?>">
                                <i class="fa fa-plus u-mr-xsmall"></i><?php //echo $this->lang->line('add_to_my_courses') 
                                                                        ?>
                            </button> -->
                            <button id="bngst" data-id='<?php echo base64_encode($courses['id']); ?>' class="btn btn-primary-orbit w-100">
                                <i class="fa fa-plus u-mr-xsmall"></i><?php echo $this->lang->line('add_to_my_courses') ?>
                            </button>
                        <?php endif ?>
                        <?php if (!empty($courses['price'])) : ?>
                            <a class="btn btn-primary-orbit" href='<?php echo base_url('payment/order/' . $courses['slug']) ?>'>
                                <i class="fa fa-shopping-cart u-mr-xsmall"></i><?php echo $this->lang->line('buy') ?>
                            </a>

                        <?php endif ?>

                    <?php endif ?>
                <?php endif ?>

                <?php if (empty($courses['first_lesson'])) : ?>
                    <button class="c-btn c-btn--custom" disabled="">
                        <i class="fa fa-send-o u-mr-xsmall"></i><?php echo $this->lang->line('no_lesson') ?>
                    </button>
                <?php endif ?>

            <?php endif ?>

            <?php if (empty($this->session->userdata('user'))) : ?>

                <?php if (!empty($courses['first_lesson'])) : ?>

                    <?php if (empty($courses['price'])) : ?>
                        <?php if ($site['lms_free_courses_readable'] == 'Yes') : ?>
                            <a class="btn btn-primary-orbit" href="<?php echo $courses['first_lesson'] ?>">
                                <i class="fa fa-send-o u-mr-xsmall"></i><?php echo $this->lang->line('learn_now') ?>
                            </a>
                        <?php endif ?>
                        <?php if ($site['lms_free_courses_readable'] == 'No') : ?>
                            <a class="btn btn-primary-orbit" href="<?php echo base_url('auth?redirect=' . urlencode($courses['url'])) ?>">
                                <i class="fa fa-send-o u-mr-xsmall"></i><?php echo $this->lang->line('learn_now') ?>
                            </a>
                        <?php endif ?>
                    <?php endif ?>
                    <?php if (!empty($courses['price'])) : ?>
                        <a class="btn btn-primary-orbit" href="<?php echo base_url('auth?redirect=' . urlencode(base_url('payment/order/' . $courses['slug']))) ?>">
                            <i class="fa fa-shopping-cart u-mr-xsmall"></i><?php echo $this->lang->line('buy') ?>
                        </a>
                    <?php endif ?>
                <?php endif ?>

                <?php if (empty($courses['first_lesson'])) : ?>
                    <button class="c-btn c-btn--custom" disabled="">
                        <i class="fa fa-send-o u-mr-xsmall"></i><?php echo $this->lang->line('no_lesson') ?>
                    </button>
                <?php endif ?>

            <?php endif ?>
        </div>
    </div>
</nav>