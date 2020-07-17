<!-- Template JS File -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('storage/assets/app/js/all-modules.js') ?>"></script>
<script src="<?php echo base_url('storage/assets/app/js/main.min.js') ?>"></script>
<script src="<?php echo base_url('storage/assets/app/js/custom.js') ?>"></script>

<script src="<?php echo base_url('storage/assets/lms/default-app/js/custom.js') ?>"></script>

<?php $this->load->view('lms/default-app/_layouts/plugins'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tblforum').DataTable();
        if($("#uncheck").attr("disabled")){
            $('#this_file').remove();
        }
    } );
    
    $(document).ready(function() {
        $("#ShowMenuMobile").click(function() {
            $("#mySidenav").addClass("show")
        });

         $("#CloseMenuMobile").click(function() {
            $("#mySidenav").removeClass("show")
        });
    });
    
    $('#validatedCustomFile').on('change', function(){
        var namefilex = $('#validatedCustomFile').val().replace(/C:\\fakepath\\/i, '');
        $('#labelfile').text(namefilex);
    });
    
    $('#formuploadq').on('submit', function(event){
        event.preventDefault();
        var me = $(this);
        // console.log(me);
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
                Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Mengirim Berkas',
                        showConfirmButton: false,
                        timer: 1500
                        
                    }).then((result) => {
                    /* Read more about handling dismissals below */
                        window.location.href =  '';
                    })
            },
            error : function(response){
                console.log(response);
            }
        });
    
    });
    $("#ggmild").on('shown', function() {
        console.log('okk')
    });
</script>
</body>

</html>