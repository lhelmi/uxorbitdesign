<?php $this->load->view('app/_layouts/header'); ?>
<?php $this->load->view('app/_layouts/sidebar'); ?>

<div class="c-toolbar u-justify-center u-mb-small">
    <div class="col-12 col-lg-10 col-xl-8">
        <div class="row">
            <div class="col-6 col-md-6 c-toolbar__state">
                <h4 class="c-toolbar__state-number"><?= $transfer_statistic['total_amount']  ?></h4>
                <span class="c-toolbar__state-title">Total Amount</span>
                <div>
                    <?php if ($tarik_semua) { ?>
                        <button type="button" id="tariksemua" data-id="<?= $this->session->userdata('id') ?>" class="btn btn-info waves-effect waves-light m-r-10">
                            <i class="fa fa-info m-r-5"></i>
                            <span>Tarik Semua</span>
                        </button>
                    <?php } ?>
                </div>
            </div>
            <div class="col-6 col-md-6 c-toolbar__state">
                <h4 class="c-toolbar__state-number"><?= $transfer_statistic['total_invoice']  ?></h4>
                <span class="c-toolbar__state-title">Total Invoice</span>
            </div>
        </div><!-- // .row -->
    </div><!-- // -->
</div>
<?php $this->load->view('app/_layouts/alert'); ?>

<div class="table-responsive">
    <table id="usermyTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Kode Pembayaran</th>
                <th class="text-center">Nama Member</th>
                <th class="text-center">Transaksi</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;foreach ($div as $km) {  ?>
                <tr id="">
                <!-- <tr id="<?= $km['id']; ?>" <? // echo $km['is_read'] > 0 ? "" : "class='table-warning'" ?>> -->
                    <td class="text-center"><?= $i++ ?></td>
                    <td class="text-center"><?= $km['id'] ?></td>
                    <td class="text-center"><?= $km['username'] ?></td>
                    <td class="text-center"><?= $km['token'] ?></td>
                    
                    <td class="text-center">
                        <?php $xxo = $this->M_User_Transfer->get_tb_tarik_list($km['id']); ?>
                        <?php if($xxo){ ?>
                            <?php foreach ($xxo as $key => $value) { ?>
                                <?php if($value['status_penarikan'] == '1' && $value['bukti_transfer'] <> '') { ?>
                                        <button type="button" id="usermodaldetail" data-toggle="modal" data-target="#responsive-modal" class="btn btn-success waves-effect waves-light m-r-10" data-id="<?= $value['permintaan_id']; ?>" data-user="<?= $km['id_courses_user']; ?>">
                                            <i class="fa fa-check m-r-5"></i>
                                            <span>Sudah Transfer</span>
                                        </button>
                                    <?php }elseif($value['status_penarikan'] == '1' && $value['bukti_transfer'] == '') { ?>
                                        <button type="button" id="usermodaldetail" data-toggle="modal" data-target="#responsive-modal" class="btn btn-warning waves-effect waves-light m-r-10" data-id="<?= $value['permintaan_id']; ?>" data-user="<?= $km['id_courses_user']; ?>">
                                            <i class="fa fa-check m-r-5"></i>
                                            <span>Permintaan Sudah Terkirim</span>
                                        </button>
                                    <?php } ?>
                            <?php } ?>
                        <?php }else{ ?>
                            <button type="button" id="belumtarik" data-toggle="modal" data-target="#responsive-modal" class="btn btn-info waves-effect waves-light m-r-10" data-id="<?= $km['id']; ?>" data-user="<?= $km['id_courses_user']; ?>">
                                <i class="fa fa-info m-r-5"></i>
                                <span>Detail</span>
                            </button>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div class="modal" id="responsive-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="frmidx" action="anjing" enctype="multipart/form-data" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="transfer_detail" style="margin-bottom: 30px;">
                        <div class="row">
                            <div class="col">
                                <input type="text" disabled class="form-control" placeholder="Jumlah Yang Didapat">
                            </div>
                            <div class="col">
                                <input type="text" disabled class="form-control" name="jumlah_diterima" id="jumlah_diterima">
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="divbayar"></div>
                    <div class="form-group" id="form_img"></div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" name="tarik" id="tarik" class="btn btn-success waves-effect waves-light">
                        <i class="fa fa-check"></i>
                        <span id="btnkirim">Kirim</span>
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('app/user_invoice/form'); ?>

<?php $this->load->view('app/_layouts/footer'); ?>