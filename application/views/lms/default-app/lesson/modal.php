<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formforum" action="<?= site_url('lms/Lesson/insert'); ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Diskusi Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                            <label for="exampleFormControlInput1">Puliskan pertanyaan singkat Anda di sini.</label>
                            <input type="text" name="title" id="title" class="form-control" id="exampleFormControlInput1" placeholder="Tuliskan pertanyaan singkat Anda di sini.">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Uraian Pertanyaan</label>
                        <textarea name="description" id="description" class="form-control" id="exampleFormControlInput1" placeholder="Uraikan pertanyaan Anda lebih jelas pada bagian ini"></textarea>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="validationCustom01">Section</label>
                            <select class="custom-select" id="tb_lms_courses_section_id">
                                <option value="">Pilih Section</option>
                                <?php
                                $number_section = 1;
                                foreach ($courses['all_data'] as $courses_data) { ?>
                                    <?php if (!empty($courses_data)) { ?>
                                        <option data-id="<?= $courses_data['id_section'] ?>"  value="<?php echo $courses_data['id_section'] ?>"><?php echo $courses_data['title_section'] ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="validationCustom01">Lesson</label>
                            <select class="custom-select" id="tb_lms_courses_lesson_id">
                                <option id="blankc" value="">Pilih Lesson</option>
                                
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Buat Diskusi</button>
                </div>
            </form>
        </div>
    </div>
</div>