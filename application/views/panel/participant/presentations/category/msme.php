<div class="row py-3">
	<div class="col-12 grid-margin stretch-card">
		<div class="card input-group-card">
			<div class="card-body">
				<div class="row g-2 g-md-3">
					<div class="col-xl-3 col-lg-4 col-12">
						<div class="col-12">
							<div class="">
								<label for="" class="form-label">Photographs or Videos of products/services offered</label>
								<input type="file" accept="application/pdf" name="doc3" class="dropify" data-default-file="<?= $application_temp['id_255403'] ?>" data-max-file-size="2M" data-allowed-file-extensions="pdf" />
								<span class="form-text">(PDF of Maximum Size 2MB)</span>
							</div>
						</div>
					</div>
					<div class="col-xl-9 col-lg-8 col-12">
						<div class="row g-2 g-md-3">
							<div class="col-xl-6 col-lg-6 col-12">
								<div class="">
									<label for="" class="form-label">Name of the Participating Entity</label>
									<input required type="text" name="organization[name]" class="form-control">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-12">
								<div class="">
									<label for="" class="form-label">Name of the Applicant (MD/CEO/Founder or equivalent)</label>
									<input required type="text" name="name" class="form-control">
								</div>
							</div>
							<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
								<div class="">
									<label for="" class="form-label">Designation</label>
									<input required type="text" name="designation" class="form-control">
								</div>
							</div>
							<div class="col-xxl-3 col-xl-4 col-12">
								<div class="">
									<label for="" class="form-label">Type of Business</label>
									<select required name="organization[business]" id="" class="form-select">
										<option value="">Select Business Type</option>
										<option value="Manufacturing">Manufacturing</option>
										<option value="Service">Service</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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

	$("input[type='file']").each(function(index, element) {
		if ($(element).attr("data-default-file") == "" || $(element).attr("data-default-file") == null) {
			$(element).prop("required", true);
			console.log("Absent");

		} else {
			$(element).prop("required", false);
			console.log("Present");
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
