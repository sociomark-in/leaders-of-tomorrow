<fieldset class="mb-3">
	<legend class="card-title mb-0">
		<h5>Upload Files</h5>
	</legend>
	<div class="row g-3 mb-3">
		<div class="col-xl-3 col-lg-4 col-md-6 col-12">
			<div class="">
				<label for="" class="form-label">MSME certificate</label>
				<input type="file" accept="application/pdf" name="doc1" class="dropify" data-default-file="" data-max-file-size="250K" data-allowed-file-extensions="pdf" />
				<span class="form-text">document supporting received from Ministry of MSME, Govt. of India</span>
			</div>
		</div>
		<div class="col-xl-3 col-lg-4 col-md-6 col-12">
			<div class="">
				<label for="" class="form-label">Company Incorporation Certificate</label>
				<input type="file" accept="application/pdf" name="doc2" class="dropify" data-default-file="" data-max-file-size="250K" data-allowed-file-extensions="pdf" />
			</div>
		</div>
		<div class="col-xl-3 col-lg-4 col-md-6 col-12">
			<div class="">
				<label for="" class="form-label">Work Experience Letter</label>
				<input type="file" accept="application/pdf" name="doc3" class="dropify" data-default-file="" data-max-file-size="250K" data-allowed-file-extensions="pdf" />
				<span class="form-text">as on March 31, 2023</span>
			</div>
		</div>
		<div class="col-xl-3 col-lg-4 col-md-6 col-12">
			<div class="">
				<label for="" class="form-label">Any other Collaterals</label>
				<input type="file" accept="application/pdf" name="doc4" class="dropify" data-default-file="" data-max-file-size="250K" data-allowed-file-extensions="pdf" />
				<span class="form-text">(Awards / Articles / Certificates, etc.) in a Single PDF</span>
			</div>
		</div>
	</div>
	<div class="">
		<div class="bg-light p-3">
			<h5>Instructions</h5>
			<ul class="">
				<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa iusto minima debitis necessitatibus, ratione facilis tenetur quos voluptatem tempora nobis.</li>
				<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa iusto minima debitis necessitatibus, ratione facilis tenetur quos voluptatem tempora nobis.</li>
				<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa iusto minima debitis necessitatibus, ratione facilis tenetur quos voluptatem tempora nobis.</li>
				<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa iusto minima debitis necessitatibus, ratione facilis tenetur quos voluptatem tempora nobis.</li>
			</ul>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="<?= base_url("assets/css/") ?>dropify-custom.min.css">
	<script>
		$('.dropify').dropify({
			error: {
				'fileSize': 'The file size is too big ({{ value }} max).',
				'minWidth': 'The image width is too small ({{ value }}}px min).',
				'maxWidth': 'The image width is too big ({{ value }}}px max).',
				'minHeight': 'The image height is too small ({{ value }}}px min).',
				'maxHeight': 'The image height is too big ({{ value }}px max).',
				'imageFormat': 'The image format is not allowed ({{ value }} only).'
			}
		});
	</script>
</fieldset>
