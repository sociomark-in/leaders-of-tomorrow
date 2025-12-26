<!-- partial:partials/_footer.html -->
<?php $this->load->view('components/panel/partials/_footer'); ?>
<!-- partial -->
</div>


<?php $this->load->view('components/panel/partials/_js') ?>

<?php
if ($this->session->userdata('first_user')) :
?>
	
<?php endif ?>

</body>

</html>
