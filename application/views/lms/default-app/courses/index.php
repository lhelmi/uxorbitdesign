<?php $this->load->view('lms/default-app/_layouts/header'); ?>
<?php $this->load->view('lms/default-app/_layouts/nav'); ?>

<?php $this->load->view('lms/default-app/courses/part/heading'); ?>
<?php $this->load->view('lms/default-app/courses/part/description'); ?>
<?php $this->load->view('lms/default-app/courses/part/material'); ?>
<?php $this->load->view('lms/default-app/courses/part/faq'); ?>
<?php $this->load->view('lms/default-app/courses/part/review'); ?>
<?php $this->load->view('lms/default-app/courses/part/related'); ?>

<?php $this->load->view('lms/default-app/courses/part/nav-bottom'); ?>

<?php $this->load->view('lms/default-app/_layouts/footer-widget'); ?>
<?php $this->load->view('lms/default-app/_layouts/footer'); ?>

<script>

$("#bclick").click(function() {
            const id = $(this).data('id');
            const rederect = '<?= $courses['first_lesson'] ?>';
            $.ajax({
                url: '<?= base_url('user/Courses/add_courses'); ?>',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    console.log('ok');
                    window.location.href = rederect;
                },
                error: function(data) {
                    alert(data);
                }
            });
        });
</script>