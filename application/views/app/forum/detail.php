<?php $this->load->view('app/_layouts/header'); ?>
<?php $this->load->view('app/_layouts/sidebar'); ?>

<?php $this->load->view('app/_layouts/alert'); ?>
            
<div class="container u-mv-medium h-100vh margin-bottom-26-menu" style="margin-top: 30px !important;">
<div class="container-fluid mt-100">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="media flex-wrap w-100 align-items-center">
                            <img height="50px" width="70px" src="<?= base_url('storage/uploads/user/photo/' . $get_byid['foto']) ?>" alt="">
                            <div class="media-body ml-3">
                                <a href="<?= base_url('pertanyaan/'. $get_byid['id']) ?>" data-abc="true">
                                    <?= $get_byid['title'] ?>
                                </a>
                                <div class="text-muted small">
                                    <?= $get_byid['username'] ?>
                                    <?php
                                        $datetime1 = new DateTime($get_byid['date']);
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
                                    <strong><?=  date("d-m-Y", strtotime($get_byid['daftar'])) ?></strong>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p> 
                            <?= $get_byid['description'] ?>
                        </p>
                        <?php
                            $lower = strtolower($get_byid['courses_title']);
                            $e_type = str_replace(' ', '-', $lower);
                        ?>
                        <a href="<?= site_url('courses-lesson/'.$e_type.'/'. $get_byid['tb_lms_courses_section_id'] .'/'.$get_byid['tb_lms_courses_lesson_id']) ?>" class="btn btn-primary" role="button" aria-pressed="true">
                            <?= $get_byid['section_title'] ?>
                        </a>
                    </div>
                    <!-- <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
                        <div class="px-4 pt-3">
                            <button type="button" id="modalbalas" class="btn btn-success" data-toggle="modal" data-target="#balas" data-whatever="@getbootstrap">Balas</button>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <form id="balas" action="<?= site_url('app/user_forum/add_comment'); ?>" method="POST">
        <input type="hidden" value="<?= $id ?>" name="id" id="id">
        <div class="form-group">
            <label for="message-text" class="col-form-label">Komentar:</label>
            <textarea class="form-control" id="comment" name="comment" placeholder="Ikut Diskusi"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Balasan</button>
    </form>
    <hr>
    <?php
        if(count($get_comment) == 0){
            echo "<h3>Belum Ada Balasan</h3>";    
        }else{
            echo "<h3>Balasan Terbaru</h3>";
            foreach ($get_comment as $kk => $vv) { 
    ?>
        <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="media flex-wrap w-100 align-items-center">
                            <img height="50px" width="70px" src="<?= base_url('storage/uploads/user/photo/' . $vv['foto']) ?>" alt="">
                            <div class="media-body ml-3">
                                <?= $vv['username'] ?>
                                <?= $vv['user_id'] ?>
                                <div class="text-muted small">
                                    
                                    <?php
                                        $datetime1 = new DateTime($vv['date']);
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
                                    <strong><?=  date("d-m-Y", strtotime($vv['daftar'])) ?></strong>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p> 
                            <?= $vv['comment'] ?>
                        </p>
                        
                    </div>
                    <!-- <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
                        <div class="px-4 pt-3">
                            <button type="button" id="modalbalas" class="btn btn-success" data-toggle="modal" data-target="#balas" data-whatever="@getbootstrap">Balas</button>
                        </div>
                    </div> -->
                </div>
            </div>
    <?php } } ?>
</div><!-- // .container -->            


<?php $this->load->view('app/_layouts/footer'); ?>