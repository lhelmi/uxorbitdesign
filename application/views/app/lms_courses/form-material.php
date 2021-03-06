<div class="c-stage u-mb-zero">

    <div class="c-stage__header cursor-default o-media u-justify-start <?php echo ($this->input->get('editsection') == 'false') ? 'u-hidden' : '' ?>">
        <div class="o-media">
            <div class="c-stage__icon o-media__img">
                <i class="fa fa-book"></i>
            </div>
            <div class="c-stage__header-title o-media__body">
                <h6 class="u-mb-zero">Silabus</h6>
            </div>
        </div>
        <div class="u-ml-auto o-line">
            <button type="button" data-modaltitle='Create Section' class="c-btn c-btn--fancy c-btn--custom u-mr-xsmall button-section-create" data-toggle="modal" data-target="#modal-section">
                Tambahkan Section
            </button>
        </div>
    </div>

    <div class="c-stage__panel u-p-medium <?php echo ($this->input->get('editsection') == 'false') ? 'u-hidden' : '' ?>">

        <?php if (empty($section)) : ?>
            <div class="c-alert c-alert--info">
                Belum ada kelas section. Tambahkan terlebih dahulu
            </div>
        <?php endif ?>

        <?php if (!empty($section)) : ?>
            <?php
            $no_section = 1;
            foreach ($section as $section_data) : ?>

                <?php
                $lesson = $this->M_LMS_Courses->data_lesson($section_data['id']);
                ?>
                <div class="c-stage u-mb-medium">

                    <div class="c-stage__header o-media u-justify-start cursor-default bg-primary-orbit-hitam">
                        <div class="c-stage__header-title o-media__body">
                            <h6 class="u-mb-zero u-color-white">Section <?php echo $no_section++; ?> : <?php echo $section_data['title'] ?></h6>
                        </div>
                        <div class="u-ml-auto o-line">
                            <a class="c-btn--custom c-btn c-btn--success u-mr-xsmall" href="<?php echo base_url('app/lms_courses/create_lesson/' . $section_data['id']) ?>">
                                Tambahkan Lesson
                            </a>
                            <button type="button" class="c-btn c-btn--info c-btn--custom u-mr-xsmall button-section-update" data-id='<?php echo $section_data['id'] ?>' data-modaltitle='Update Section' data-title='<?php echo $section_data['title'] ?>' data-toggle="modal" data-target="#modal-section">
                                <i class="fa fa-edit"></i> Edit
                            </button>
                            <button data-title="Beneran kamu ?" data-text="mau hapus section : <?php echo $section_data['title'] ?>" class="c-btn--custom c-btn--small c-btn c-btn--danger single-action" data-id="$1" data-href="<?php echo base_url('app/lms_courses/process_section_delete/' . $section_data['id']) ?>" type="button"><i class="fa fa-trash"></i> Hapus </button>
                        </div>
                    </div>

                    <?php if (empty($lesson)) : ?>
                        <div class="c-stage__panel u-p-xsmall">
                            <div class="c-alert c-alert--success">
                                Tambahkan lesson dulu.
                            </div>
                        </div>
                    <?php endif ?>

                    <?php if (!empty($lesson)) : ?>
                        <div class="c-stage__panel u-p-xsmall">
                            <?php
                            $no_lesson = 1;
                            foreach ($lesson as $lesson_data) : ?>
                                <div class="c-stage__header o-media u-justify-start u-border-top u-border-left u-border-right u-mb-xsmall cursor-default">
                                    <div class="c-stage__header-title o-media__body">
                                        <h6 class="u-mb-zero">
                                            Lesson <?php echo $no_lesson++ ?> : <?php echo $lesson_data['title'] ?>
                                        </h6>
                                    </div>
                                    <div class="u-ml-auto o-line">
                                        <a class="c-btn--custom c-btn c-btn--info u-mr-xsmall" href="<?php echo base_url('app/lms_courses/update_lesson/' . $section_data['id'] . '/' . $lesson_data['id']) ?>">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <button data-title="Beneran kamu ?" data-text="mau hapus lesson : <?php echo $lesson_data['title'] ?>" class="c-btn--custom c-btn--small c-btn c-btn--danger single-action" data-id="$1" data-href="<?php echo base_url('app/lms_courses/process_lesson_delete/' . $lesson_data['id']) ?>" type="button"><i class="fa fa-trash"></i> Hapus </button>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>
                </div>
            <?php endforeach ?>
        <?php endif ?>

    </div>

</div>