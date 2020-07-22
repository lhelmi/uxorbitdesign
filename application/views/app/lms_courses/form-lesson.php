<?php $this->load->view('app/_layouts/header'); ?>
<?php $this->load->view('app/_layouts/sidebar'); ?>
<?php $this->load->view('app/_layouts/content'); ?>

<div class="col-12 col-xl-8 offset-xl-2 u-mv-small">

    <form action="<?php echo base_url('app/lms_courses/process_lesson') ?>" method="post" enctype="multipart/form-data">

        <?php $this->load->view('app/_layouts/alert'); ?>

        <div class="c-stage u-mb-zero">

            <div class="c-stage__header o-media u-justify-start">
                <div class="c-stage__header-title o-media__body">
                    <?php if (!empty($lesson)) : ?>
                        <input name="id" type="hidden" value="<?php echo $lesson['id'] ?>">
                    <?php endif ?>
                    <input type="hidden" name="id_courses" value="<?php echo $data['courses_id']; ?>">
                    <input type="hidden" name="id_section" value="<?php echo $data['section_id']; ?>">
                    <button type="submit" class="btn btn-primary-orbit">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </div>

            <div class="c-stage__panel u-p-zero">

                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="c-field u-ph-medium u-pv-small">
                            <label class="c-field__label">Masukan judul : </label>
                            <input autofocus="" required class="form-control" name="title" type="text" placeholder="judul lesson" value="<?php echo (!empty($lesson['title']) ? $lesson['title'] : '') ?>">
                        </div>
                    </div>

                    <div class="col-12 col-lg-12">
                        <div class="c-field u-ph-medium u-pv-small u-mb-small">
                            <label class="c-field__label">Pilih tipe lesson : </label>

                            <select required name="type" id="type" class="form-control">
                                <option <?php echo (!empty($lesson['type']) and $lesson['type'] == 'Text') ? 'selected' : ''; ?> value="Text">Text</option>
                                <option <?php echo (!empty($lesson['type']) and $lesson['type'] == 'Video') ? 'selected' : ''; ?> value="Video">Video</option>
                                <option <?php echo (!empty($lesson['type']) and $lesson['type'] == 'Image') ? 'selected' : ''; ?> value="Image">Image</option>
                                <option <?php echo (!empty($lesson['type']) and $lesson['type'] == 'Quiz') ? 'selected' : ''; ?> value="Quiz">Submisi</option>
                                <option <?php echo (!empty($lesson['type']) and $lesson['type'] == 'PG') ? 'selected' : ''; ?> value="PG">Quiz</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-lg-12 content">
                        <div id="isicontent">
                            <div class="c-field">
                                <textarea required class="editor" name="content">
                                    <?php echo (!empty($lesson['content']) ? $lesson['content'] : '') ?>
                                </textarea>
                            </div>
                        </div>
                        
                    </div>
                    <?php if(!empty($lesson['type']) and $lesson['type'] == 'PG'){ ?>
                        <?php $no = 1; foreach ($get_pertanyaan as $key => $value) { ?>
                            <?php foreach ($get_jawaban as $kk => $vv) { ?>
                                <?php if($value['idpertanyaan'] == $vv['id_pertanyaan']){ ?>
                                    <div id="listpertanyaan" class='c-field u-ph-medium u-pv-small u-mb-small wek'>
                                        <div>
                                            pertanyaan <?= $no++; ?>
                                            <button type="button" data-loop="<?= $kk ?>" id="pertanyaanedit" data-id="<?= $vv['id_pertanyaan'] ?>" class="btn btn-primary btn-sm ml-3">
                                                <i class="fa fa-edit"></i> Ubah
                                            </button>
                                            <button type="button" data-loop="<?= $kk ?>" id="pertanyaanhapus" data-id="<?= $vv['id_pertanyaan'] ?>" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                            <hr>
                                        </div>
                                        <div class='col-10'>
                                            <input autofocus='' required class='form-control mb-3' id="<?= 'ubahpertanyaan'.$kk ?>" name='pertanyaan[]' type='text' value="<?= $value['pertanyaan'] ?>">
                                        </div>
                                        
                                        <div class='col-10'>
                                            <input autofocus='' placeholder='Jawaban A' required class='form-control mb-3' id="<?= 'ubahjawabana'.$kk ?>" name='jawabana[]' type='text' value="<?= $vv['jawabana'] ?>">
                                        </div>
                                        
                                        <div class='col-10'>
                                            <input autofocus='' placeholder='Jawaban B' required class='form-control mb-3' id="<?= 'ubahjawabanb'.$kk ?>" name='jawabanb[]' type='text' value="<?= $vv['jawabanb'] ?>">
                                        </div>
                                        <div class='col-10'>
                                            <input autofocus='' placeholder='Jawaban C' required class='form-control mb-3' id="<?= 'ubahjawabanc'.$kk ?>" name='jawabanc[]' type='text' value="<?= $vv['jawabanc'] ?>">
                                        </div>
                                        <div class='col-10'>
                                            <input autofocus='' placeholder='Jawaban D' required class='form-control mb-3' id="<?= 'ubahjawaband'.$kk ?>" name='jawaband[]' type='text' value="<?= $vv['jawaband'] ?>">
                                        </div>

                                        <div class='col-10'>
                                            <select name='is_true' required class='form-control mb-3' id='<?= 'ubahis_true'.$kk ?>'>
                                                <option value=''>Kunci Jawaban</option>
                                                <option <?php echo (!empty($vv['is_true']) and $vv['is_true'] == 'a') ? 'selected' : ''; ?> value="a">A</option>
                                                <option <?php echo (!empty($vv['is_true']) and $vv['is_true'] == 'b') ? 'selected' : ''; ?> value="b">B</option>
                                                <option <?php echo (!empty($vv['is_true']) and $vv['is_true'] == 'c') ? 'selected' : ''; ?> value="c">C</option>
                                                <option <?php echo (!empty($vv['is_true']) and $vv['is_true'] == 'd') ? 'selected' : ''; ?> value="d">D</option>
                                            </select>
                                        </div>
                                            
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                    <div class="col-12 col-lg-12" id="jumlah">
                        
                    </div>
                    <div class='col-12 col-lg-12 quiz'>
                    
                    </div>
                    

                </div>
            </div>
        </div>

    </form>

</div>

<?php $this->load->view('app/_layouts/modal_filemanager'); ?>
<?php $this->load->view('app/_layouts/footer'); ?>
<script>
    var courses_id = <?= $data['courses_id']; ?>;
    var section_id = <?= $data['section_id']; ?>;
    $('#type').on('change', function() {
        console.log('change');
        var x = $('#type').val();
        var nomer = 1;
        if(x == 'PG' ){
            // $('#isicontent').remove();
            $('.jumlahinput').remove();
            $('#jumlah').append("<div class='c-field u-ph-medium u-pv-small u-mb-small jumlahinput'><div class='row mb-3'><div class='col-10'><input autofocus='' required class='form-control mb-3' id='quiz1' name='quiz1' type='number'></div><div class='col-2'><button type='button' id='jumlahquiz' class='btn btn-primary'><i class='fa fa-check'></i> Ok</button></div></div></div>");
            $('#jumlahquiz').on('click', function(event){
                var jumlahquiz = $('#quiz1').val();
                for (let index = 0; index < jumlahquiz; index++) {
                    $('.quiz').append("<div class='c-field u-ph-medium u-pv-small u-mb-small listt'><div>Pertanyaan Baru "+ nomer++ + "<hr></div><div class='col-10'><input autofocus='' required class='form-control mb-3' name='pertanyaan[]' type='text'></div><div class='col-10'><input autofocus='' placeholder='Jawaban A' required class='form-control mb-3' name='jawabana[]' type='text'></div><div class='col-10'><input autofocus='' placeholder='Jawaban B' required class='form-control mb-3' name='jawabanb[]' type='text'></div><div class='col-10'><input autofocus='' placeholder='Jawaban C' required class='form-control mb-3' name='jawabanc[]' type='text'></div><div class='col-10'><input autofocus='' placeholder='Jawaban D' required class='form-control mb-3' name='jawaband[]' type='text'></div><div class='col-10'><select name='is_true[]' required class='form-control mb-3' id='is_true[]'><option value=''>Kunci Jawaban</option><option value='a'>A</option><option value='b'>B</option><option value='c'>C</option><option value='d'>D</option></select></div></div>");
                    $('.quiz').append("<input type='hidden' name='idpertanyaan[]' value= '"+ courses_id + section_id + index +"' >");
                    
                    
                    // $('#is_truea'+index).change(function(){
                    //     if (this.value == '0' || this.value == '') {
                    //         $(this).val('1');
                    //         $('#is_trueb'+index).val('0');
                    //         $('#is_trueb'+index).prop('checked', false);
                    //     }
                    // });
                    // $('#is_trueb'+index).change(function(){
                    //     if (this.value == '0' || this.value == '') {
                    //         $(this).val('1');
                    //         $('#is_truea'+index).val('0');
                    //         $('#is_truea'+index).prop('checked', false);
                    //     }
                    // });
                }
            });
            
            
        }else{
            $('.jumlahinput').remove();
            $('.listt').remove();
        }
    });

    $('.wek').on('click', '#pertanyaanhapus', function(){
        const id = $(this).data('id');
        
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Akan Menghapus Data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText : 'Tidak',
            confirmButtonText: 'Hapus!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url:'<?= base_url('app/lms_courses/pertanyaanhapus'); ?>',
                    data:{id : id},
                    method: 'post',
                    dataType:'json',
                    success: function(data){
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil Menghapus Data',
                            showConfirmButton: false,
                            timer: 1500
                            
                        }).then((result) => {
                        /* Read more about handling dismissals below */
                            window.location.href =  '';
                            
                        })
                    },
                    error : function(data){
                        console.log(data);
                    }
                });
            }
        })
    });
    
    $('.wek').on('click', '#pertanyaanedit', function(){
        const id = $(this).data('id');
        const loop = $(this).data('loop');
        var pertanyaan = $('#ubahpertanyaan'+loop).val();
        var is_true = $('#ubahis_true'+loop).val();
        var jawabana = $('#ubahjawabana'+loop).val();
        var jawabanb = $('#ubahjawabanb'+loop).val();
        var jawabanc = $('#ubahjawabanc'+loop).val();
        var jawaband = $('#ubahjawaband'+loop).val();
        console.log(id);
        console.log(loop);
        $.ajax({
            url: '<?= base_url('app/lms_courses/pertanyaanedit'); ?>',
            type: 'post',
            data:{
                id : id,
                pertanyaan : pertanyaan,
                is_true : is_true,
                jawabana : jawabana,
                jawabanb : jawabanb,
                jawabanc :jawabanc,
                jawaband :jawaband,
            },
            // processData:false,
            // contentType:false,
            // cache:false,
            // async:false,
                     
            dataType:'json',
            success: function(response){
                // console.log(response);
                if (response.success == true) {
                    console.log(response);
                    window.location.href = ''
                }else{
                    $("#error-img").text("Gambar harus diisi");
                }
            },
            error : function(response){
                console.log(response);
            }
        });


    });
</script>
