<?php $this->load->view('lms/default-app/_layouts/header'); ?>
<?php $this->load->view('lms/default-app/_layouts/nav'); ?>

<div class="container u-mv-medium h-100vh margin-bottom-26-menu" style="margin-top: 130px !important;">
    <a href="<?= site_url('add-Forum/'. $id_courses); ?>" class="btn btn-primary" role="button" aria-pressed="true" style="margin-top : 30px; margin-left : 25px; margin-bottom : 15px;">Buat Diskusi Baru</a>
    <?php foreach ($get_qna as $key => $value) { ?>
    <div class="container-fluid mt-100">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="media flex-wrap w-100 align-items-center">
                            <img height="50px" width="70px" src="<?= base_url('storage/uploads/user/photo/' . $value['foto']) ?>" alt="">
                            <div class="media-body ml-3">
                                <a href="<?= base_url('pertanyaan/'. $value['id'].'/'. $id_courses) ?>" data-abc="true">
                                    <?= $value['title'] ?>
                                </a>
                                <div class="text-muted small">
                                <?= $value['username'] ?>
                                <?php
                                    $datetime1 = new DateTime($value['date']);
                                    $datetime2 = new DateTime(date("Y-m-d"));
                                    $interval = $datetime1->diff($datetime2);
                                    if($interval->format('%R%a days') == 0) {
                                        echo "today";
                                    }else{
                                        echo $interval->format('%R%a days');
                                    }
                                ?>
                                <!-- 13 days ago -->
                            </div>
                            </div>
                            <div class="text-muted small ml-3">
                                <div>
                                    Member since
                                    <strong><?=  date("d-m-Y", strtotime($value['daftar'])) ?></strong>
                                </div>
                                <!-- <div>
                                    <strong>100</strong> posts
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p> 
                            <?= $value['description'] ?>
                        </p>
                    </div>
                    <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
                        <div class="px-4 pt-3">
                            <?php
                                $lower = strtolower($value['courses_title']);
                                $e_type = str_replace(' ', '-', $lower);
                            ?>
                            <a href="<?= site_url('courses-lesson/'.$e_type.'/'. $value['tb_lms_courses_section_id'] .'/'.$value['tb_lms_courses_lesson_id']) ?>" class="badge badge-primary" role="button" aria-pressed="true">
                                <?= $value['section_title'] ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <?php } ?>
</div><!-- // .container -->

<?php $this->load->view('lms/default-app/courses/part/nav-bottom'); ?>

<?php $this->load->view('lms/default-app/_layouts/footer'); ?>