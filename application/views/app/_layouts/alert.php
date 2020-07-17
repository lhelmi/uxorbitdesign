<?php
if ($this->session->flashdata('message')) {
  if ($this->session->flashdata('message') == TRUE) {
?>

    <!-- alert-automatic -->
    <div class="alert <?php echo $this->session->flashdata('message_type') ?>" role="alert">
      <?php echo $this->session->flashdata('message_text') ?>
    </div>

<?php
  }
}
?>