<?php $this->load->view('lms/default-app/_layouts/header'); ?>

<?php $this->load->view('lms/default-app/lesson/part/nav'); ?>


<div class="row">

<div class="col-12 col-xl-9 col-lg-8 col-md-12 u-p-zero">

	

		<div class="c-stage__header cursor-default u-ph-small">
			<div class="col-12 col-xl-8">
				<h1 class="u-text-bold u-h4 u-mb-zero" style="cursor: default;">
					<?= $courses['lesson_detail']['title']; ?>
				</h1>
			</div>
		</div>

		<div class="u-flex u-align-items-center">
			<div class="<?php echo ($courses['lesson_detail']['type'] == 'Video') ? 'col-12 u-p-small' : 'col-12 col-xl-7 offset-xl-2 ' ?>">

				<style>
					.video {
						position: relative;
					}

					.video iframe {
						position: absolute;
						top: 0;
						left: 0;
						width: 100%;
						height: 100%;
						min-height: calc(100vh - 11rem);
					}
				</style>

				<?php if (!empty($courses['lesson_detail'])) : ?>
					<div class="<?php echo ($courses['lesson_detail']['type'] == 'Video') ? 'u-p-zero post-body video' : 'u-pv-medium u-ph-small post-body' ?>">
						<?php echo $courses['lesson_detail']['content'] ?>
					</div>
				<?php endif ?>
				<?php if ($courses['lesson_detail']['type'] == 'Quiz') { ?>
					<form action="<?= site_url('lms/Forum/addquiz') ?>" method="POST" enctype="multipart/form-data" id="formuploadq">
					<input type="hidden" name="id_lesson" id="id_lesson" value="<?= $courses['lesson_detail']['id'] ?>">
					<input type="hidden" name="id_courses" id="id_courses" value="<?= $courses['lesson_detail']['id_courses'] ?>">
					
					<?php if($get_submisi){ ?>
					<?php if($get_submisi['id'] !== ""){ ?>
						<input type="hidden" name="id" id="id" value="<?= $get_submisi['id'] ?>">
					<?php } ?>
					<?php if($get_submisi['description'] !== ""){ ?>
						<div class="form-group">
							<textarea disabled class="form-control" name="description" id="description" cols="30" rows="10">
								<?= $get_submisi['description'] ?>
							</textarea>
						</div>
					<?php } ?>
					<?php } ?>
					<div id="this_file">
						<small id="passwordHelpBlock" class="form-text text-muted">File yang diperbolehkan adalah .zip dan .rar</small>
						<div class="custom-file" style="margin-bottom: 20px;">
							<input type="file" class="custom-file-input" name="file" id="validatedCustomFile" required>
							<label class="custom-file-label" id="labelfile" for="validatedCustomFile">Choose file...</label>
							<small id="file_error" class="form-text text-muted"></small>
						</div>
						<!-- <div class="form-group">
							<textarea disabled name="description" class="form-control" id="description" cols="30" rows="10" placeholder="Description"></textarea>
						</div> -->
						<div class="form-group">
								<button type="submit" name="kirimsubmisi" id="kirimsubmisi" class="btn btn-success">
									<i class="fa fa-send"></i> Kirim
								</button>
							</div>
						</div>

					</form>

				<?php } ?>
				<?php  if($is_lulus == false){ ?>
				<?php $no=1; if ($courses['lesson_detail']['type'] == 'PG') { ?>
					<div class="flash-data" data-flash = "<?= $this->session->flashdata('message') ?>"></div>
					<form action="<?= site_url('lms/Forum/checkingpg') ?>" method="POST" enctype="multipart/form-data" id="forumpg">
					<input type="hidden" name="section" value="<?= $section ?>">
					<input type="hidden" name="id_lesson" id="id_lesson" value="<?= $courses['lesson_detail']['id'] ?>">
					<input type="hidden" name="id_courses" id="id_courses" value="<?= $courses['lesson_detail']['id_courses'] ?>">					
					<input type="hidden" name="url" id="url" value="<?= $courses['url_lesson'].'/'. $section .'/'.$courses['lesson_detail']['id'] ?>">
					<?php foreach ($get_pertanyaan as $key => $value) {?>
						<div>
							<label for=""><?= $no++. '. '; ?><?= $value['pertanyaan'] ?></label>
							<?php foreach ($get_jawaban as $kk => $vv) {?>
								<?php if($value['idpertanyaan'] == $vv['id_pertanyaan']){ ?>
									<input type="hidden" value="<?= $vv['id_pertanyaan'] ?>" name="kk[]">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="<?= "jawaban".$key ?>" id="<?= $vv['id_pertanyaan'] ?>" value="a">
										<label class="form-check-label" for="<?= $vv['id_pertanyaan'] ?>">
										a. <?= $vv['jawabana'] ?>
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="<?= "jawaban".$key ?>" id="<?= $vv['id_pertanyaan'] ?>" value="b">
										<label class="form-check-label" for="<?= $vv['id_pertanyaan'] ?>">
										b. <?= $vv['jawabanb'] ?>
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="<?= "jawaban".$key ?>" id="<?= $vv['id_pertanyaan'] ?>" value="c">
										<label class="form-check-label" for="<?= $vv['id_pertanyaan'] ?>">
										c. <?= $vv['jawabanc'] ?>
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="<?= "jawaban".$key ?>" id="<?= $vv['id_pertanyaan'] ?>" value="d">
										<label class="form-check-label" for="<?= $vv['id_pertanyaan'] ?>">
										d. <?= $vv['jawaband'] ?>
										</label>
									</div>
								<?php } ?>	
							<?php } ?>
						</div>
					<?php } ?>
						<?php if($is_lulus == false){ ?>
							<div class="form-group mt-3">
								<button type="submit" name="kirimpg" id="kirimpg" class="btn btn-success">
									<i class="fa fa-send"></i> Kirim
								</button>
							</div>
						<?php } ?>
					</form>
				<?php } ?>
				<?php }else{ ?>
					<h2>Anda sudah Lulus</h2>
				<?php } ?>
			</div>
		</div>

</div>

<div class="col-xl-3 col-lg-4 u-p-zero order-first order-lg-first">

	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="materi-tab" data-toggle="tab" href="#materi" role="tab" aria-controls="home" aria-selected="true">
				<?php echo $this->lang->line('toc') ?>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="forum-tab" data-toggle="tab" href="#forum" role="tab" aria-controls="profile" aria-selected="false">
				forum
			</a>
		</li>
	</ul>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="materi" role="tabpanel" aria-labelledby="materi-tab">
			<article class="c-stage u-mb-zero" style="max-height: calc(100vh - 4.5rem);min-height: calc(100vh - 4.5rem);overflow-y: auto;" id="accordion">
				<?php
				$number_section = 1;
				foreach ($courses['all_data'] as $courses_data) : ?>

					<!-- section -->
					<div class="c-stage__header u-flex u-justify-between u-p-xsmall <?php echo ($courses_data['id_section'] != $this->uri->segment(3)) ? 'collapsed' : 'u-bg-secondary' ?>" data-toggle="collapse" href="#stage-panel-<?php echo $courses_data['id_section'] ?>" aria-expanded="false" aria-controls="stage-panel-<?php echo $courses_data['id_section'] ?>">

						<div class="o-media">
							<div class="c-stage__icon o-media__img">
								<?php echo $number_section++ ?>
							</div>
							<div class="c-stage__header-title o-media__body o-media <?php echo ($courses_data['id_section'] != $this->uri->segment(3)) ? '' : 'u-text-dark' ?>">
								<?php echo $courses_data['title_section'] ?>
							</div>
						</div>
						<div>
							<div class="c-stage__icon o-media__img">
								<i class="fa <?php echo ($courses_data['id_section'] != $this->uri->segment(3)) ? '' : 'u-text-dark' ?>"></i>
							</div>
						</div>

					</div>

					<div data-parent="#accordion" class="c-stage__panel <?php echo ($courses_data['id_section'] != $this->uri->segment(3)) ? 'collapse' : 'collapse show' ?>" id="stage-panel-<?php echo $courses_data['id_section'] ?>">
						<?php
						$number_lesson = 1;
						foreach ($courses_data['lesson'] as $lesson) : ?>
							<?php if (!empty($lesson)) : ?>
								<div class="u-mb-zero o-line c-stage__header u-justify-start u-p-zero" style="<?php echo ($lesson['id'] == $this->uri->segment(4)) ? 'background: #a3d3f7;' : '' ?> position: relative;">
									<a href="<?php echo $lesson['url'] ?>" class='custom u-pv-xsmall u-ph-medium u-width-100'>
										<?php if ($lesson['type'] == 'Text') : ?>
											<i class="fa fa-file-text-o u-mr-xsmall"></i>
										<?php endif ?>
										<?php if ($lesson['type'] == 'Image') : ?>
											<i class="fa fa-picture-o u-mr-xsmall"></i>
										<?php endif ?>
										<?php if ($lesson['type'] == 'Video') : ?>
											<i class="fa fa-youtube-play u-mr-xsmall"></i>
										<?php endif ?>
										<?php if ($lesson['type'] == 'File') : ?>
											<i class="fa fa-zip-o u-mr-xsmall"></i>
										<?php endif ?>
										<?php echo $lesson['title'] ?>
									</a>
									<?php if (!empty($this->session->userdata('user'))) : ?>
										<?php if ($lesson['user_lesson']) : ?>
											<?php if ($lesson['type'] !== 'Quiz' and $lesson['type'] !== 'PG') { ?>
												<button data-id-courses='<?php echo $courses['id'] ?>' data-id-lesson='<?php echo $lesson['id'] ?>' class="c-btn c-btn--primary c-btn--small btn-process-lesson u-ml-auto" data-action="<?php echo base_url('user/courses/process_lesson/') ?>" style='overflow: unset;position: absolute;right: 10px;padding: 2px 4px;'>
													<i class="fa fa-check u-color-success u-m-zero"></i>
												</button>
											<?php } else { ?>
												<button  id="uncheck"  disabled class="c-btn c-btn--primary c-btn--small btn-process-lesson u-ml-auto" style='overflow: unset;position: absolute;right: 10px;padding: 2px 4px;'>
													<i class="fa fa-check u-color-success u-m-zero"></i>
												</button>
											<?php } ?>
										<?php endif ?>
										<?php if (empty($lesson['user_lesson'])) : ?>
											<?php if ($lesson['type'] !== 'Quiz'  and $lesson['type'] !== 'PG') { ?>
												<button data-id-courses='<?php echo $courses['id'] ?>' data-id-lesson='<?php echo $lesson['id'] ?>' class="c-btn c-btn--primary c-btn--small btn-process-lesson u-ml-auto" data-action="<?php echo base_url('user/courses/process_lesson/') ?>" style='overflow: unset;position: absolute;right: 10px;padding: 2px 4px;'>
													<i class="fa fa-check u-color-white u-m-zero"></i>
												</button>
											<?php } ?>

										<?php endif ?>
									<?php endif ?>
								</div>
							<?php endif ?>

							<?php if (empty($lesson)) : ?>
								<div class="u-p-small u-border-radius-10 u-text-white u-bg-primary u-mv-xsmall u-mh-medium">
									<?php echo $this->lang->line('no_material') ?>
								</div>
							<?php endif ?>
						<?php endforeach ?>

					</div>
					<!-- section -->
					<?php endforeach ?>
			</article>
		
		</div>
		<div class="tab-pane fade" id="forum" role="tabpanel" aria-labelledby="forum-tab">
			<a href="<?= site_url('Forum/' . $courses['id']); ?>" class="btn btn-primary" role="button" aria-pressed="true" style="margin-top : 30px; margin-left : 95px;">Lihat Diskusi</a>
			<hr>
			<?php foreach ($this->M_Lesson->get_qnaby_id($courses['id']) as $key => $value) { ?>
				<div class="card" style="margin-bottom: 10px;">
					<div class="card-header">
						<?= $value['username'] ?>
					</div>
					<div class="card-body">
						<p class="card-text">
							<?php
							$x = $value['description'];
							if (strlen($x) > 70) {
								echo $x = substr($x, 0, 65) . '...';
							} else {
								echo $x;
							}

							?>
						</p>
						<a href="<?= site_url('pertanyaan/' . $value['id'] . '/' . $courses['id']) ?>" class="btn btn-primary">Lihat Diskusi</a>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>


</div>

<?php $this->load->view('lms/default-app/lesson/part/review'); ?>
<?php $this->load->view('lms/default-app/_layouts/footer'); ?>
<script>
	 const flashdata = $('.flash-data').data('flash');
    
    if (flashdata) {
		Swal.fire({
			icon: 'warning',
			title: 'Anda belum berhasil lulus kelas ini',
			showConfirmButton: false,
			timer: 2500
		})
    }
</script>