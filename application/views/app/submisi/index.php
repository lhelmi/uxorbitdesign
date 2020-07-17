<?php $this->load->view('app/_layouts/header'); ?>
<?php $this->load->view('app/_layouts/sidebar'); ?>

            <?php $this->load->view('app/_layouts/alert'); ?>
            
            <div class="table-responsive">
                <table id="tblsubmisi" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">title</th>
                            <th class="text-center">username</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i =1; foreach ($div as $km) : ?>
                            <tr>
                                <td class="text-center"><?= $i++ ?></td>
                                <td class="text-center">
                                    <?= $km['courses_title'] ?>
                                    <?php if($km['is_read'] == 0 ){ ?>
                                        <span id="<?= 'bandage'.$km['id']; ?>" class='badge badge-primary'>Submisi Baru</span>
                                    <?php } ?>
                                </td>
                                <td class="text-center"><?= $km['nama'] ?></td>
                                
                                <td>
                                    <button type="button" data-description="<?= $km['description'] ?>" data-courses_id="<?= $km['courses_id'] ?>" data-id="<?= $km['id'] ?>" id="detail_submisi" data-toggle="modal" data-target="#responsive-modalcenter" class="btn btn-info waves-effect waves-light m-r-10">
                                        <i class="fa fa-info m-r-5"></i>
                                        <span>Detail</span>
                                    </button>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>        
                </table>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="responsive-modalcenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form id="frmsubmisi" enctype="multipart/form-data" method="POST" action="user_submisi/add_description">
            <div class="modal-header">
                <h5 class="modal-title">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="file" id="file">
                <input type="hidden" name="id_lms_courses_lesson" id="id_lms_courses_lesson">
                <input type="hidden" name="id_user" id="id_user">
                <input type="hidden" name="courses_id" id="courses_id">
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Description:</label>
                    <!-- <textarea class="editor" name="description" id="description" cols="30" rows="10"></textarea> -->
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                </div>
            </div>
            
                <div class="modal-footer">
                    <div id="divlulus">
                        <button type="button" name="status" id="status" class="btn btn-success waves-effect waves-light">
                            <i id="iconstatus" class="fa fa-info"></i>
                            <span id="spanstatus">Luluskan</span>
                        </button>
                    </div>
                    <button type="submit" name="submit" id="submit" class="btn btn-success waves-effect waves-light">
                        <i class="fa fa-check"></i>
                        <span>Kirim Deskripsi</span>
                    </button>
                        <a href="<?= base_url('app/user_submisi/download/') ?>" type="button" name="downloadf" id="downloadf" class="btn btn-primary waves-effect waves-light">
                        <i class="fa fa-download"></i>
                        <span>Download File</span>
                    </a>
            </div>
        </form>
    </div>
  </div>
</div>
<?php $this->load->view('app/_layouts/footer'); ?>