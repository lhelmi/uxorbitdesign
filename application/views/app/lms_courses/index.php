<?php $this->load->view('app/_layouts/header'); ?>
<?php $this->load->view('app/_layouts/sidebar'); ?>
<?php $this->load->view('app/_layouts/toolbar'); ?>
<?php $this->load->view('app/_layouts/content'); ?>

<div class="col-12 u-mv-small">

    <div class="c-card c-card--responsive h-100vh u-p-zero">
        <div class="c-card__header c-card__header--transparent o-line">
            <a class="btn btn-primary" href="<?php echo base_url('app/lms_courses/create') ?>">
                <i class="fa fa-plus"></i> Buat Kelas Baru
            </a>
            <button data-title="are you sure ?" data-text="to post selected item" title="Post Multiple" value="post" class="c-btn--custom c-btn--small c-btn c-btn--info u-ml-auto u-mr-xsmall action-multiple btn-opsi">
                <i class="fa fa-clipboard"></i> Post Multiple
            </button>
            <button data-title="are you sure ?" data-text="to draft selected item" title="Simpan di Draft Multiple" value="draft" class="c-btn--custom c-btn--small c-btn c-btn--fancy u-mr-xsmall action-multiple btn-opsi">
                <i class="fa fa-reply"></i> Simpan di Draft
            </button>
            <button data-title="are you sure ?" data-text="to delete selected item" title="Hapus Multiple" value="delete" class="c-btn--custom c-btn--small c-btn c-btn--danger action-multiple btn-opsi">
                <i class="fa fa-trash"></i> Hapus
            </button>
        </div>
        <div class="c-card__body">

            <?php $this->load->view('app/_layouts/alert'); ?>

            <form id='form-multiple' action="<?php echo base_url('app/lms_courses/process_multiple') ?>" method="post">

                <div class="c-table-responsive">
                    <table data-mysearch="Search..." data-myorder='1' data-myurl="<?php echo base_url('app/lms_courses/datatables') ?>" class="table table-striped" id="table">
                        <caption class="c-table__title cst-table">
                        </caption>

                        <thead class="c-table__head c-table__head--slim">
                            <tr class="c-table__row">
                                <th class="c-table__cell c-table__cell--head text-center no-sort all">
                                    <div class="c-choice c-choice--checkbox">
                                        <input class="c-choice__input" id="checkbox-all" name="select_all" type="checkbox">
                                        <label class="c-choice__label" for="checkbox-all"></label>
                                    </div>
                                </th>
                                <th class="c-table__cell c-table__cell--head none">id</th>
                                <th class="c-table__cell c-table__cell--head all">Judul Kelas</th>
                                <th class="c-table__cell c-table__cell--head all u-text-center">Kategori</th>
                                <th class="c-table__cell c-table__cell--head all">Mentor</th>
                                <th class="c-table__cell c-table__cell--head none">Waktu</th>
                                <th class="c-table__cell c-table__cell--head none">update</th>
                                <th class="c-table__cell c-table__cell--head no-sort all u-text-center">Lihat Kelas</th>
                                <th class="c-table__cell c-table__cell--head no-sort all u-text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

            </form>

        </div>
    </div>
</div>

<?php $this->load->view('app/_layouts/footer'); ?>