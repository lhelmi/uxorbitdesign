<?php $this->load->view('app/_layouts/header'); ?>
<?php $this->load->view('app/_layouts/sidebar'); ?>

<?php $this->load->view('app/_layouts/alert'); ?>

<div class="table-responsive">
    <table id="tblforum" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Nama Kelas</th>
                <th class="text-center">Nama Member</th>
                <th class="text-center">Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($div as $km) : ?>
                <tr>
                    <td class="text-center"><?= $i++ ?></td>
                    <td class="text-center"><?= $km['courses_title'] ?></td>
                    <td class="text-center"><?= $km['username'] ?></td>
                    <td class="text-center"><?= $km['date'] ?></td>
                    <td>
                        <a class="c-btn--custom c-btn--small c-btn c-btn--info" href="<?= base_url('app/user_forum/detail/' . $km['id']) ?>">
                            <i class="fa fa-eye"></i> Lihat Forum
                        </a>
                        <button data-id="<?= $km['id'] ?>" class="c-btn--custom c-btn--small c-btn c-btn--danger action-delete" id="forum_delete" type="button"><i class="fa fa-trash"></i> Hapus </button>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div>
</div>
</div>

<?php $this->load->view('app/_layouts/footer'); ?>