    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script>
        $('#formforum').on('submit', function(event){
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
        
        $('#balas').on('submit', function(event){
            event.preventDefault();
            var comment = $('#comment').val();
            var id = $('#id').val();
            var idless = $('#idless').val();
            console.log(comment);
            var me = $(this);
            $.ajax({
                url: me.attr('action'),
                type: 'post',
                data:{
                    comment : comment,
                    id : id,
                    idless : idless
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

        $('#tb_lms_courses_section_id').on('change', function() {
        const id = $('#tb_lms_courses_section_id option:selected').val();
            $.ajax({
                url:'<?= base_url('lms/Forum/get_lesson'); ?>',
                data:{id : id},
                method: 'post',
                dataType:'json',
                success: function(data){
                    $('#blankc').remove();
                    $('.ajax_option').remove();
                    $('#tb_lms_courses_lesson_id').append("<option id='blankc' value=''>Pilih Lesson</option>");
                    for (let index = 0; index < data.get_lesson.length; index++) {
                        $('#tb_lms_courses_lesson_id').append("<option class='ajax_option' value='" + data.get_lesson[index].id + "' >" + data.get_lesson[index].title + "</option>");
                    }                
                    console.log(data.get_lesson['0'].id);
                },
                error : function(data){
                    console.log(data);
                }
            });
        });
    </script>
</html>

