<?= form_open_multipart('api/v2/awards/nomination/single/new', ['id' => 'form_option_05']) ?>
<input type="hidden" name="category_id" value="<?= $category_id ?>">
<input type="hidden" name="application_id" value="<?= $application_id ?? null ?>">
<input type="hidden" name="utm" value="<?= $utm ?>">
<input type="hidden" name="agent_id" value="<?= $agent_id ?>">
<input type="hidden" name="stage" value="<?= $stage ?>">
<input type="hidden" name="referrer" value="<?= $referrer ?>">

<!-- 
	74525 doc1
	74526 doc2
	74527 doc3
	74528 doc4
-->

<div class="mb-3">
	<fieldset class="mb-3">
		<legend class="card-title mb-3">
			<h5>Upload Files</h5>
		</legend>
		<div class="">
			<div class="bg-light p-3 mb-2">
				<h5>Instructions</h5>
				<ul class="">
					<li>Open the PDF Properties and check for PDF version < version 5 (1.4)</li>
					<li>Open the unsupported PDF file with Chrome</li>
					<li>Right Click and Print</li>
					<li>Change destination as [Save as PDF]</li>
					<li>This exported PDF file is compatible to upload.</li>
				</ul>
			</div>
		</div>
		<div class="row g-3 mb-3">
			<div class="col-xl-3 col-lg-4 col-md-6 col-12">
				<div class="">
					<label for="" class="form-label">MSME certificate</label>
					<input type="file" accept="application/pdf" name="doc1" class="dropify" data-default-file="<?= $application['id_74525'] ?>" data-max-file-size="250K" data-allowed-file-extensions="pdf" />
					<span class="form-text">document supporting received from Ministry of MSME, Govt. of India</span>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6 col-12">
				<div class="">
					<label for="" class="form-label">Company Incorporation Certificate</label>
					<input type="file" accept="application/pdf" name="doc2" class="dropify" data-default-file="<?= $application['id_74526'] ?>" data-max-file-size="250K" data-allowed-file-extensions="pdf" />
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6 col-12">
				<div class="">
					<label for="" class="form-label">Work Experience Letter</label>
					<input type="file" accept="application/pdf" name="doc3" class="dropify" data-default-file="<?= $application['id_74527'] ?>" data-max-file-size="250K" data-allowed-file-extensions="pdf" />
					<span class="form-text">as on March 31, 2023</span>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6 col-12">
				<div class="">
					<label for="" class="form-label">Any other Collaterals</label>
					<input type="file" accept="application/pdf" name="doc4" class="dropify" data-default-file="<?= $application['id_74528'] ?>" data-max-file-size="250K" data-allowed-file-extensions="pdf" />
					<span class="form-text">(Awards / Articles / Certificates, etc.) in a Single PDF</span>
				</div>
			</div>
		</div>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.worker.min.js"></script>

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
			/* PDF.js - Run PDF Version Check */
			$('.dropify').each((index, elem) => {
				$(elem).on('change', function(event) {
					// Access the selected file directly from the event object
					const file = event.target.files[0];

					// Check if a file is actually selected
					if (!file) {
						console.warn('No file selected for dropify element:', this);
						return; // Exit the function if no file is selected
					}

					// Create a new FileReader object for each file
					const reader = new FileReader();

					reader.onload = (event) => {
						const arrayBuffer = event.target.result;
						console.log('ArrayBuffer:', arrayBuffer);

						// Assuming you have pdfjsLib loaded:
						pdfjsLib.getDocument(arrayBuffer).promise.then((pdfDoc) => {
							pdfDoc.getMetadata().then((metadata) => {
								console.log('Metadata:', metadata.info.PDFFormatVersion);
								if (metadata.info.PDFFormatVersion > "1.7") {
									alert('PDF Version not Supported!');
								}
							});
						}).catch((error) => {
							console.error('Error getting PDF version:', error);
						});
					};

					// Read the file as an ArrayBuffer
					reader.readAsArrayBuffer(file);
				});
			});
		</script>
	</fieldset>
</div>
<div class="row g-3">
	<div class="col-md-auto">
		<a href="<?= base_url('dashboard/application/' . $application_id . '?stage=' . $stage - 1) ?>" class="btn btn-outline-secondary">Back</a>
	</div>
	<div class="col-md-auto">
		<button type="submit" class="btn btn-primary">Save and Next</button>
	</div>
	<div class="col-md-auto">
		<button type="reset" class="btn btn-outline-secondary">Reset This Section</button>
	</div>
</div>
<?= form_close() ?>
