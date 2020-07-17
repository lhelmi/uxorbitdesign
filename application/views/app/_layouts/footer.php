</div><!-- // .row -->

</div><!-- // .container -->

</main><!-- // .o-page__content -->


<!-- Template JS File -->
<script src="<?php echo base_url('storage/assets/app/js/all-modules.js') ?>"></script>
<script src="<?php echo base_url('storage/assets/app/js/main.min.js') ?>"></script>
<script src="<?php echo base_url('storage/assets/app/js/custom.js') ?>"></script>
<script src="<?php echo base_url('storage/assets/app/js/all.js') ?>"></script>
<script src="<?php echo base_url('storage/assets/app/js/fontawesome.js') ?>"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>


<?php $this->load->view('app/_layouts/plugins'); ?>

</body>

</html>

<script>
$(document).ready(function () {
    $('#myTable').DataTable();
    $('#tblforum').DataTable();
});
    
    $('#tabelindex').on('click', '#edit-confirm', function(){
        const id = $(this).data('identity');
        $('#conform').attr('action', "<?= base_url('app/setting_payment/contupdate') ?>");
        $.ajax({
            url:'<?= base_url('app/setting_payment/getconfirm'); ?>',
            data:{id : id},
            method: 'post',
            dataType:'json',
            success: function(data){
                console.log(data.medium);
                $('#id').val(data.id);
                $('#medium').val(data.medium);
                $('#description').val(data.description);
            },
            error : function(data){
                console.log(data);
            }
        });
    });

    $('#btncont').on('click', function(){
        $('#conform').attr('action', "<?= base_url('app/setting_payment/confirmation_create') ?>");
        $('#id').val('');
        $('#medium').val('');
        $('#description').val('');
    });
    
    $('#tambahmodal').on('click', function(){
        $('#transform').attr('action', "<?= base_url('app/setting_payment/create') ?>");
        $('#id').val('');
        $('#type').val('');
        $('#account_number').val('');
        $('#receiver').val('');
    });
    
    $("#account_number").on("keypress keyup blur",function (event) {    
       $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });


    $('#tabeltrans').on('click', '#btnedit-trans', function(){
        const id = $(this).data('identity');
        $('#transform').attr('action', "<?= base_url('app/setting_payment/update') ?>");
        $('#id').val(id);
        console.log(id);
        $.ajax({
            url:'<?= base_url('app/setting_payment/get_trans'); ?>',
            data:{id : id},
            method: 'post',
            dataType:'json',
            success: function(data){
                console.log(data.account_number);
                $('#id').val(data.id);
                $('#type').val(data.type);
                $('#account_number').val(data.account_number);
                $('#receiver').val(data.receiver);
            },
            error : function(data){
                console.log(data);
            }
        });
    });
    
    $('#conform').on('submit', function(event){
            event.preventDefault();
            var me = $(this);
            var id = $('#id').val();
            var medium = $('#medium').val();
            var description = $('#description').val();
            $.ajax({
                url: me.attr('action'),
                type: 'post',
                data:{
                    id : id,
                    medium : medium,
                    description : description,
                },
                dataType:'json',
                success: function(response){
                    if (200) {
                        window.location.href = '';
                    }else{
                        $.each(response.messages, function(key, value){
                            var element = $('#' + key);
                            $(element).closest('.form-control')
                            .removeClass('is-invalid')
                            .addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
                            .find('.text-danger')
                            .remove();

                            $(element).closest('.form-group').find('.text-danger').remove();
                            $(element).after(value);
                        });
                    }
                },
                error : function(response){
                    console.log(response);
                }
            });
        
        });
        
    $('#transform').on('submit', function(event){
            event.preventDefault();
            var me = $(this);
            var id = $('#id').val();
            var type = $('#type').val();
            var account_number = $('#account_number').val();
            var receiver = $('#receiver').val();
            $.ajax({
                url: me.attr('action'),
                type: 'post',
                data:{
                    id : id,
                    receiver : receiver,
                    account_number : account_number,
                    type : type,
                },
                dataType:'json',
                success: function(response){
                    if (200) {
                        window.location.href = '';
                    }else{
                        $.each(response.messages, function(key, value){
                            var element = $('#' + key);
                            $(element).closest('.form-control')
                            .removeClass('is-invalid')
                            .addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
                            .find('.text-danger')
                            .remove();

                            $(element).closest('.form-group').find('.text-danger').remove();
                            $(element).after(value);
                        });
                    }
                },
                error : function(response){
                    console.log(response);
                }
            });
        
        });

        $('#tabelindex').on('click', '#btnhapus-cont', function(){
        const id = $(this).data('identity');
        
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
                    url:'<?= base_url('app/setting_payment/cont_delete'); ?>',
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

    $('#tabeltrans').on('click', '#btnhapus-trans', function(){
        const id = $(this).data('identity');
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
                    url:'<?= base_url('app/setting_payment/delete'); ?>',
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
    
    $('#myTable').on('click', '#modaldetail', function(){
        $('.modal-content form').attr('action', "<?= base_url('app/User_tfrequest/add') ?>");
        $('.modal-title').html(' Detail Transfer ');
        $('.modal-footer button[type=submit] ').html('Simpan')
        
        $('.form-group').find('.text-danger').remove();
        $('.form-control').removeClass('has-error has-feedback').find('.text-danger').remove();
        const id = $(this).data('id');
        const user = $(this).data('user');
        // var i = parseInt(1);
        $.ajax({
            url:'<?= base_url('app/User_tfrequest/get_id'); ?>',
            data:{id : id, user : user},
            method: 'post',
            dataType:'json',
            success: function(data){
                $('#id').val(data.idx[0].permintaan_id);
                // console.log(data.idx);
                // $('#user').val(data.bank.type);
                // console.log(data.bank);
                if(data.idx[0].is_read == '1'){
                    $('#'+data.idx[0].permintaan_id).removeClass("table-warning");
                    $('#dividnotif').find("#notif_request").remove();
                    if(data.notif > 0){
                        $('#dividnotif').append("<span class='btn btn-warning btn-circle btn-sm' id='notif_request' style='margin-left: 10px;'><div class='ini_notif'>"+ data.notif +"</div></div>");
                    }
                }
                
                let i = 1;
                $('#divbayar').append("<div class='bayar'>");
                $('#form_img').append("<div class='tf'>");
                $('#contact').append("<div class='contact'>");
                $('.bayar').append("<table class='table' id='table_bank'><thead class='thead-dark'><tr><th scope='col'>#</th><th scope='col'>Payment ID</th><th scope='col'>Amount</th></tr></thead><tbody id='table_bayar'></tbody></table>");

                if(data.bank[0]){
                    $('.tf').append("<table class='table' id='table_bank'><thead class='thead-dark'><tr><th scope='col'>#</th><th scope='col'>Account number</th><th scope='col'>Bank type</th><th scope='col'>Receiver</th></tr></thead><tbody id='table_tf'></tbody></table>");
                }
                
                if(data.contact[0]){
                    $('.contact').append("<table class='table' id='table_contact'><thead class='thead-dark'><tr><th scope='col'>#</th><th scope='col'>Media</th><th scope='col'>Deskripsi</th></tr></thead><tbody id='table_ct'></tbody></table>");
                }
                var total = 0;
                for (let index = 0; index < data.idx.length; index++) {
                    // console.log(data.bank[index]);
                    // $('#form_img').append($('<input type=text />').val(data.bank[index].type));
                    
                    $('#table_bayar').append("<tr><th>"+ i++  +"</th><td>" + data.idx[index].id_lms_user_payment + "</td><td id='bayar"+ index +" '>" + data.idx[index].bayar + "</td></tr>");
                    total += parseFloat(data.idx[index].bayar);
                }
                $('#jumlah_diterima').val(total*0.6);
                $('#jumlah_transfer').val(total*0.4);

                for (let index = 0; index < data.bank.length; index++) {
                    // console.log(data.bank[index]);
                    // $('#form_img').append($('<input type=text />').val(data.bank[index].type));
                    $('#table_tf').append("<tr><th>"+ i++  +"</th><td>" + data.bank[index].account_number + "</td><td>" + data.bank[index].type + "</td><td>" + data.bank[index].receiver + "</td></tr>");   
                }
                
                for (let index = 0; index < data.bank.length; index++) {
                    // console.log(data.bank[index]);
                    // $('#form_img').append($('<input type=text />').val(data.bank[index].type));
                    $('#table_ct').append("<tr><th>"+ i++  +"</th><td>" + data.contact[index].medium + "</td><td>" + data.contact[index].description + "</td></tr>");   
                }
                
                if(data.idx[0].bukti != ""){
                    $('.tf').append($('<img style="margin-left : 110px;" id="img_val" hight="320px" width="220px" />').attr('src', '../storage/uploads/user/transfer/' + data.idx[0].bukti_transfer));
                }
            },
            error : function(data){
                console.log(data);
            }
        });
    });

    $('#responsive-modal').on('hidden.bs.modal', function (e) {
        $('#id').val('');
        $(".bayar").remove();
        $(".tf").remove();
        $(".contact").remove();
        $("#form_img img:last-child").remove();
    });

    $('#frmidx').on('submit', function(event){
        event.preventDefault();
        var me = $(this);
        $.ajax({
            url: me.attr('action'),
            type: 'post',
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
                     
            dataType:'json',
            success: function(response){
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

    $('#usermyTable').on('click', '#usermodaldetail', function(){
        $('.modal-content form').attr('action', "");
        $('.modal-title').html(' Detail Transfer ');
        $('.tgl_permintaan').remove();
        
        $('.form-group').find('.text-danger').remove();
        $('.form-control').removeClass('has-error has-feedback').find('.text-danger').remove();
        const id = $(this).data('id');
        const user = $(this).data('user');
        console.log(id);
        console.log(user);
        // var i = parseInt(1);
        $.ajax({
            url:'<?= base_url('app/user_invoice_history/user_get_id'); ?>',
            data:{id : id, user : user},
            method: 'post',
            dataType:'json',
            success: function(data){
                $('.wow').remove();
                $('.bayar').remove();
                $('#tarik').prop('disabled', false);
                $("#tarik #btnkirim").text("Kirim");
                $('#id').val(data.idx[0].id);
                if(data.idx[0].tgl_permintaan !== "0000-00-00 00:00:00"){
                    $('#tarik').prop('disabled', true);
                    $("#tarik #btnkirim").text("Menunggu Konfirmasi");
                    $('.transfer_detail').append("<div class='tgl_permintaan'>");
                    $('.tgl_permintaan').append('<div class="row" style="margin-top : 10px"><div class="col"><input type="text" disabled class="form-control" placeholder="Tanggal Permintaan"></div><div class="col"><input type="text" value="' + data.idx[0].tgl_permintaan + '" disabled class="form-control" name="jumlah_diterima" id="jumlah_diterima"></div></div>');
                    $('#tgl_permintaan').val(data.idx[0].tgl_permintaan);
                }
                $('#divbayar').append("<div class='bayar'>");
                $('.bayar').append("<table class='table' id='table_bank'><thead class='thead-dark'><tr><th scope='col'>#</th><th scope='col'>Payment ID</th><th scope='col'>Amount</th></tr></thead><tbody id='table_bayar'></tbody></table>");
                var total = 0;
                let i = 1;
                for (let index = 0; index < data.idx.length; index++) {
                    // console.log(data.bank[index]);
                    // $('#form_img').append($('<input type=text />').val(data.bank[index].type));
                    
                    $('#table_bayar').append("<tr><th>"+ i++  +"</th><td>" + data.idx[index].id_lms_user_payment + "</td><td id='bayar"+ index +" '>" + data.idx[index].bayar + "</td></tr>");
                    total += parseFloat(data.idx[index].bayar);
                }
                $('#jumlah_diterima').val(total*0.4);
                
                $('#form_img').append("<div class='wow'>");
                if(data.idx[0].bukti != ""){
                    $('.wow').append($("<label for='recipient-name' id='labelbuktitf' class='control-label'>Bukti Transfer:</label>"));
                    $('#labelbuktitf').append($('<img style="margin-left : 110px;" id="img_val" hight="320px" width="220px" />').attr('src', '../../storage/uploads/user/transfer/' + data.idx[0].bukti_transfer));
                    $('#tarik').prop('disabled', true);
                    $("#tarik #btnkirim").text("Lunas");
                }
            },
            error : function(data){
                console.log(data);
            }
        });
    });

    $('#usermyTable').on('click', '#belumtarik', function(){
        $('.modal-content form').attr('action', "");
        $('.modal-title').html(' Detail Transfer ');
        $('.tgl_permintaan').remove();
        
        $('.form-group').find('.text-danger').remove();
        $('.form-control').removeClass('has-error has-feedback').find('.text-danger').remove();
        const id = $(this).data('id');
        const user = $(this).data('user');
        console.log(id);
        console.log(user);
        // var i = parseInt(1);
        $.ajax({
            url:'<?= base_url('app/user_invoice_history/belum_tarik'); ?>',
            data:{id : id, user : user},
            method: 'post',
            dataType:'json',
            success: function(data){
                $('#tarik').prop('disabled', false);
                $("#tarik #btnkirim").text("Kirim");
                $('#id').val(data.idx.id);
                $('#jumlah_diterima').val(data.idx.amount * 0.4);
            },
            error : function(data){
                console.log(data);
            }
        });
    });

    $('#tarik').on('click', function(){
        var id = $("#id").val();
        Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Akan Menarik Semua Invoice!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText : 'Tidak',
        confirmButtonText: 'Tarik!'
        }).then((result) => {
        if (result.value) {
            $.ajax({
                    url:'<?= base_url('app/user_invoice_history/tarik'); ?>',
                    data:{id : id},
                    method: 'post',
                    dataType:'json',
                    success: function(data){
                        Swal.fire({
                            icon: 'success',
                            title: 'Permintaan Anda Sudah Dikirim',
                            showConfirmButton: false,
                            timer: 1500
                            
                        }).then((result) => {
                        /* Read more about handling dismissals below */
                            window.location.href =  '';
                            
                        })
                        
                    },
                    error:function(data){
                        alert('error')
                    }
                });
        }
        })
        
    });

    $('#tariksemua').on('click', function(){
        const id = <?= $this->session->userdata('id') ?>;
        Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Akan Menarik Semua Invoice!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText : 'Tidak',
        confirmButtonText: 'Tarik!'
        }).then((result) => {
        if (result.value) {
            $.ajax({
                    url:'<?= base_url('app/user_invoice_history/test'); ?>',
                    data:{id : id},
                    method: 'post',
                    dataType:'json',
                    success: function(data){
                        Swal.fire({
                            icon: 'success',
                            title: 'Permintaan Anda Sudah Dikirim',
                            showConfirmButton: false,
                            timer: 1500
                            
                        }).then((result) => {
                        /* Read more about handling dismissals below */
                            window.location.href =  '';
                        })
                        
                    },
                    error:function(data){
                        console.log(data);
                    }
                });
        }
        })
        
    });

    $('#balas').on('submit', function(event){
            event.preventDefault();
            var comment = $('#comment').val();
            var id = $('#id').val();
            // console.log(comment);
            // console.log(id);
            var me = $(this);
            $.ajax({
                url: me.attr('action'),
                type: 'post',
                data:{
                    comment : comment,
                    id : id,
                },
                dataType:'json',
                success: function(response){
                    if (response.success == true) {
                        // console.log(response.redirect);
                        window.location.href = response.redirect;
                    }else{
                        $.each(response.messages, function(key, value){
                            var element = $('#' + key);
                            $(element).closest('.form-control')
                            .removeClass('is-invalid')
                            .addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
                            .find('.text-danger')
                            .remove();

                            $(element).closest('.form-group').find('.text-danger').remove();
                            $(element).after(value);
                        });
                    }
                },
                error : function(response){
                    console.log(response);
                }
            });
        
        });
        
        $('#tblforum').on('click', '#forum_delete', function(){
        const id = $(this).data('id');
        Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Akan Menghapus Forum ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText : 'Tidak',
        confirmButtonText: 'Hapus!'
        }).then((result) => {
        if (result.value) {
            $.ajax({
                    url:'<?= base_url('app/user_forum/delete'); ?>',
                    data:{id : id},
                    method: 'post',
                    dataType:'json',
                    success: function(data){
                        Swal.fire({
                            icon: 'success',
                            title: 'Permintaan Anda Sudah Dikirim',
                            showConfirmButton: false,
                            timer: 1500
                            
                        }).then((result) => {
                        /* Read more about handling dismissals below */
                            window.location.href =  '';
                            
                        })
                        
                    },
                    error:function(data){
                        console.log(data);
                    }
                });
        }
        })
        
    });

    $('#tblsubmisi').on('click', '#detail_submisi', function(){
        const id = $(this).data('id');
        const courses_id = $(this).data('courses_id');
        $('#courses_id').val(courses_id);
        
        $.ajax({
            url:'<?= base_url('app/user_submisi/get_id'); ?>',
            data:{id : id},
            method: 'post',
            dataType:'json',
            success: function(data){
                $('#id').val(data.id);
                $('#description').text(data.description);
                $('#id_lms_courses_lesson').val(data.id_lms_courses_lesson);
                $('#id_user').val(data.id_user);
                $('#file').val(data.file);
                $('#downloadf').attr('href', "<?= base_url('app/user_submisi/download/') ?>" + data.file);
                if(data.is_read == '1'){
                    $('#bandage'+data.id).remove();
                }
                var id_kursus = $('#courses_id').val();
                var id_member = data.id_user;
                var id_lesson = data.id_lms_courses_lesson;
                $.ajax({
                    url:'<?= base_url('app/user_submisi/is_lulus'); ?>',
                    data:{
                        id_member : id_member,
                        id_kursus : id_kursus,
                        id_lesson : id_lesson
                    },
                    method: 'post',
                    dataType:'json',
                    success: function(data){
                        if(data.status == true){
                            $('#status').prop('disabled', true);
                            $("#status #spanstatus").text("Lulus");
                            $("#iconstatus").removeClass("fa fa-info");
                            $("#iconstatus").addClass("fa fa-check");
                        }else{
                            $('#status').prop('disabled', false);
                            $("#status #spanstatus").text("Luluskan");
                            $("#iconstatus").removeClass("fa fa-check");
                            $("#iconstatus").addClass("fa fa-info");
                        }
                    },
                    error : function(data){
                        console.log(data);
                    }
                });
            },
            error : function(data){
                console.log(data);
            }
        });
    });

    $('#status').on('click', function(){
        var id_user = $('#id_user').val();
        var id_courses = $('#courses_id').val();
        var id_lesson = $('#id_lms_courses_lesson').val();
        
        Swal.fire({
        title: 'Apakah Anda Yakin?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText : 'Tidak',
        confirmButtonText: 'Ya!'
        }).then((result) => {
        if (result.value) {
            $.ajax({
                url:'<?= base_url('app/user_submisi/process_lesson'); ?>',
                data:{
                    id_user : id_user,
                    id_courses : id_courses,
                    id_lesson : id_lesson,
                },
                method: 'post',
                dataType:'json',
                success: function(data){
                    Swal.fire({
                        icon: 'success',
                        title: 'Data sudah diubah',
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

    
        $('#frmsubmisi').on('submit', function(event){
            event.preventDefault();
            var me = $(this);
            $.ajax({
                url: me.attr('action'),
                type: 'post',
                data:new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                dataType:'json',
                success: function(response){
                    if (response.success == true) {
                        // console.log();
                        window.location.href = response.redirect;
                    }else{
                        $.each(response.messages, function(key, value){
                            var element = $('#' + key);
                            $(element).closest('.form-control')
                            .removeClass('is-invalid')
                            .addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
                            .find('.text-danger')
                            .remove();

                            $(element).closest('.form-group').find('.text-danger').remove();
                            $(element).after(value);
                        });
                    }
                },
                error : function(response){
                    console.log(response);
                }
            });
        
        });

        function showImage(input) { 
         if (input.files && input.files[0]) { 
         var reader = new FileReader(); 
         reader.onload = function (e) { 
            $('#preview-image').attr('src', e.target.result); 
         }
         reader.readAsDataURL(input.files[0]); 
      } 
  } 

    // $("#tb_lms_courses_lesson_id").chained("#tb_lms_courses_section_id"); // disini kita hubungkan kota dengan provinsi
    // $("#kecamatan").chained("#kota"); // disini kita hubungkan kecamatan dengan kota

</script>