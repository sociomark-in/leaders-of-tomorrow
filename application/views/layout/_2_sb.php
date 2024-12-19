<section class="py-3 py-md-5 bg-white blank-all" id="partners">
	<div class="container">
		<div class="row m-0">
			<div class="col-12">
				<div class="mb-md-4 mb-3 section-title text-center">
					<h2 class=""><span>Our Partners</span></h2>
				</div>
				<div class="row m-0 mb-3 justify-content-center">
					<?php $this->load->view('components/theme/partials/_partners'); ?>
				</div>
			</div>
		</div>
</section>
<!-- partial:partials/_footer.html -->
<?php $this->load->view('components/theme/partials/_footer'); ?>
<!-- partial -->

<?php $this->load->view('components/theme/partials/widget/_scrollto_top') ?>
<?php $this->load->view('components/theme/partials/_js') ?>

<?php
if ($this->session->userdata('first_user')) :
?>

<?php endif ?>

</body>

</html>
