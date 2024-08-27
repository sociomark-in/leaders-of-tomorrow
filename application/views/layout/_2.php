<?php $this->load->view('components/theme/partials/_partners'); ?>
<!-- partial:partials/_footer.html -->
<?php $this->load->view('components/theme/partials/_footer'); ?>
<!-- partial -->

</div>
</div>

<?php $this->load->view('components/theme/partials/widget/_scrollto_top') ?>
<?php $this->load->view('components/theme/partials/_js') ?>

<?php
if ($this->session->userdata('first_user')) :
?>

<?php endif ?>

</body>

</html>
