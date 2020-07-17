<?php $this->load->view('app/_layouts/header'); ?>
<?php $this->load->view('app/_layouts/sidebar'); ?>
<?php $this->load->view('app/_layouts/toolbar'); ?>
<?php $this->load->view('app/_layouts/content'); ?>

<div class="col-12 u-mv-small">

    <div class="c-card h-100vh u-p-zero">
        <div class="c-card__header c-card__header--transparent o-line">
            <a class="btn btn-primary-orbit c-btn--small" href="<?php echo base_url('app/lms_category/create') ?>">
                <i class="fa fa-plus u-text-xsmall"></i> Tambah Kategori
            </a>
        </div>
        <div class="c-card__body row">

            <div class="col-12">
                <?php $this->load->view('app/_layouts/alert'); ?>
            </div>

            <?php
            if ($category) {
                foreach ($category as $data) {
            ?>

                    <div class="col-12 col-xl-4">
                        <div class="c-graph-card">
                            <div class="c-graph-card__content u-flex u-justify-between u-align-items-center u-ph-small u-pv-small">
                                <h5 class="h5 font-color-hitam u-text-bold">
                                    <?php echo $data['name'] ?>
                                </h5>
                                <div>
                                    <a href="<?php echo base_url('app/lms_category/update/' . $data['id']) ?>" class="btn btn-edit c-btn--small">
                                        <i class="fa fa-edit u-text-xsmall"></i> Edit
                                    </a>
                                    <?php if (empty($data['sub_category'])) : ?>
                                        <button data-title="Serius nih ?" data-text="Beneran mau menghapus <?php echo $data['name'] ?> kategori" class="btn btn-danger-orbit single-action" data-id="$1" data-href="<?php echo base_url('app/lms_category/delete/' . $data['id']) ?>" type="button">
                                            <i class="fa fa-trash u-text-xsmall"></i> Hapus
                                        </button>
                                    <?php endif ?>
                                </div>
                            </div>


                            <div class="c-graph-card__footer u-p-zero" style="max-height: 200px;overflow-y: auto">
                                <?php
                                if (!empty($data['sub_category'])) {
                                    foreach ($data['sub_category'] as $sub_category) {
                                ?>
                                        <div class="u-flex u-justify-between u-align-items-center u-border-bottom u-ph-small u-pv-xsmall">

                                            <span class="u-text-small u-color-primary">
                                                <a class="u-text-dark font-color-hitam2" target='_blank' href="<?php echo $sub_category['url'] ?>">
                                                    <?php echo $sub_category['name'] ?>
                                                </a>
                                            </span>

                                            <div class="u-text-right u-color-primary">
                                                <a href="<?php echo base_url('app/lms_category/update/' . $sub_category['id']) ?>" class="btn btn-edit c-btn--small">
                                                    <i class="fa fa-edit u-text-xsmall"></i> Edit
                                                </a>
                                                <button data-title="Serius nih ?" data-text="Beneran mau menghapus <?php echo $sub_category['name'] ?> kategori" class="btn btn-danger-orbit single-action" data-id="$1" data-href="<?php echo base_url('app/lms_category/delete/' . $sub_category['id']) ?>" type="button">
                                                    <i class="fa fa-trash u-text-xsmall"></i> Hapus
                                                </button>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                                <?php if (empty($data['sub_category'])) : ?>
                                    <div class="u-flex u-justify-between u-align-items-center u-border-bottom u-ph-small u-pv-xsmall">

                                        <span class="u-text-small font-color-hitam2">
                                            Tidak ada sub kategori.
                                        </span>
                                    </div>
                                <?php endif ?>
                            </div><!-- // .c-graph-card__footer -->

                        </div>
                    </div>

                <?php
                }
            } else {
                ?>

                <div class="col-12 ">
                    <div class="alert alert-info" role="alert">
                        Tidak ada kategori.
                    </div>
                </div>

            <?php
            }
            ?>

        </div>
    </div>
</div>

<?php $this->load->view('app/_layouts/footer'); ?>