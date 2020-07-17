<?php $this->load->view('app/_layouts/header'); ?>
<?php $this->load->view('app/_layouts/sidebar'); ?>
<?php $this->load->view('app/_layouts/content'); ?>

<div class="col-12 u-mv-small">

    <div class="c-card c-card--responsive h-100vh u-p-zero">
        <div class="c-card__header c-card__header--transparent o-line">
        </div>
        <div class="c-card__body">

            <?php $this->load->view('app/_layouts/alert'); ?>
            
            <div class="table-responsive">
                <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">id</th>
                            <th class="text-center">Instruktur</th>
                            <th class="text-center">Bank</th>
                            <th class="text-center">Tanggal Permintaan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i =1; foreach ($div as $km) : ?>
                            <tr id="<?= $km['permintaan_id']; ?>" <?= $km['sudah_dibaca'] > 0 ? "" : "class='table-warning'" ?> >
                                <td class="text-center"><?= $i++ ?></td>
                                <td class="text-center"><?= $km['id'] ?></td>
                                <td class="text-center"><?= $km['username'] ?></td>
                                <td class="text-center"><?= $km['token'] ?></td>
                                <td class="text-center"><?= $km['tgl_permintaan'] ?></td>
                                <td class="text-center">
                                    <?php
                                        if(!empty($km['bukti_tf'])){
                                    ?>
                                        <button type="button" id="modaldetail" data-toggle="modal" data-target="#responsive-modal" class="btn btn-success waves-effect waves-light m-r-10" data-id="<?= $km['permintaan_id']; ?>" data-user="<?= $km['id_courses_user']; ?>">
                                            <i class="fa fa-check m-r-5"></i>
                                            <span>Sudah Transfer</span>
                                        </button>
                                    <?php }else{ ?>
                                        <button type="button" id="modaldetail" data-toggle="modal" data-target="#responsive-modal" class="btn btn-warning waves-effect waves-light m-r-10" data-id="<?= $km['permintaan_id']; ?>" data-user="<?= $km['id_courses_user']; ?>">
                                            <i class="fa fa-plus m-r-5"></i>
                                            <span>Belum Transfer</span>
                                        </button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>        
                </table>
            </div>

        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="responsive-modal"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form id="frmidx" action="" enctype="multipart/form-data" method="POST">
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
                <div class="transfer_detail" style="margin-bottom: 30px;">
                    <div class="row">
                        <div class="col">
                            <input type="text" disabled class="form-control" placeholder="Jumlah Transfer">
                        </div>
                        <div class="col">
                            <input type="text" disabled class="form-control" name="jumlah_transfer" id="jumlah_transfer">
                        </div>
                    </div>
                </div>
                
                <div class="form-group" id="divbayar"></div>
                <div class="form-group" id="form_img"></div>
                <div class="form-group" id="contact"></div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Bukti Transfer:</label>
                    <input type="file" name="bukti_transfer" id="bukti_transfer" class="form-control">
                </div>
                <span class="text-danger" id="error-img"></span>
                
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" id="submit" class="btn btn-success waves-effect waves-light">
                    <i class="fa fa-check"></i>
                    <span>Kirim</span>
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
  </div>
</div>
<?php $this->load->view('app/user_invoice/form'); ?>

<?php $this->load->view('app/_layouts/footer'); ?>