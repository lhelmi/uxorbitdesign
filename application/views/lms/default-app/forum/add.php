<?php $this->load->view('lms/default-app/_layouts/header'); ?>
<?php $this->load->view('lms/default-app/_layouts/nav'); ?>
    <div class="container u-mv-medium h-100vh margin-bottom-26-menu" style="margin-top: 130px !important;">
        <div class="row">
            <div class="container-fluid">
                <div class="row">
                    <form id="formforum" action="<?= site_url('lms/Forum/insert'); ?>" method="POST">
                        <input type="hidden" value="<?= $id_courses ?>" name="id_courses" id="id_courses">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pertanyaan</label>
                            <small id="passwordHelpBlock" class="form-text text-muted">Tuliskan pertanyaan singkat Anda di sini.</small>
                            <input type="text" class="form-control" id="title" name="title" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Uraian Pertanyaan</label>
                            <small id="passwordHelpBlock" class="form-text text-muted">Uraikan pertanyaan Anda lebih panjang dan jelas pada bagian
                                ini. Anda dapat menambahkan potongan kode, gambar atau video untuk memperjelas
                                pertanyaan.</small>
                            <input type="text" class="form-control" id="description" name="description" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Section</label>
                            <small id="passwordHelpBlock" class="form-text text-muted">Pilih modul yang sesuai dengan pertanyaan yang Anda ajukan.</small>
                            <select class="form-control" id="tb_lms_courses_section_id" name="tb_lms_courses_section_id">
                                <option value=''>Pilih Section</option>
                                <?php foreach ($get_section as $key => $value) { ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['title'] ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lesson</label>
                            <select class="form-control" id="tb_lms_courses_lesson_id" name="tb_lms_courses_lesson_id">
                                <option id='blankc' value=''>Pilih Lesson</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div><!-- // .container -->        

        </div><!-- // .row -->
</div><!-- // .container -->
<?php $this->load->view('lms/default-app/courses/part/nav-bottom'); ?>
<?php $this->load->view('lms/default-app/_layouts/footer-forum'); ?>
<?php $this->load->view('lms/default-app/_layouts/footer'); ?>
