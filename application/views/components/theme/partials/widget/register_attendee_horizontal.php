<?= form_open('api/v2/rsvp/register', ['id' => $id]) ?>
<input type="hidden" name="event_city" value="<?= $city['name'] ?>">
<div class="row g-3">
	<div class="col-lg-6 col-12">
		<div class="">
			<label for="" class="form-label">Name</label>
			<input type="text" name="name" class="form-control" required>
		</div>
	</div>
	<div class="col-lg-6 col-12">
		<div class="">
			<label for="" class="form-label">Email</label>
			<input type="email" name="email" class="form-control" required>
		</div>
	</div>
	<div class="col-lg-6 col-12">
		<div class="">
			<label for="" class="form-label">Contact Number</label>
			<input type="text" maxlength="10" minlength="10" name="contact" class="form-control" required>
		</div>
	</div>
	<div class="col-lg-6 col-12">
		<div class="">
			<div class="mb-2 form-check">
				<input type="checkbox" name="whatsapp_consent" class="form-check-input">
				<label class="form-check-label" for="exampleCheck1">WhatsApp Consent</label>
			</div>
			<input type="text" maxlength="10" minlength="10" name="whatsapp" class="form-control d-none">
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$('input[name=whatsapp_consent]').on("click", () => {
				$('input[name=whatsapp]').toggleClass('d-none');
			})
		})
	</script>
	<div class="col-lg-6 col-12">
		<div class="">
			<label for="" class="form-label">Organization</label>
			<input type="text" name="organization[name]" class="form-control" minlength="5" required>
		</div>
	</div>
	<div class="col-lg-6 col-12">
		<div class="">
			<label for="" class="form-label">Designation</label>
			<input type="text" name="organization[designation]" class="form-control" minlength="5" required>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-12">
		<div class="">
			<label for="" class="form-label">No. Of. Employees</label>
			<select name="organization[size]" id="" class="form-select" required>
				<option value="">Select</option>
				<option value="1-50">1-50</option>
				<option value="51-250">51-250</option>
				<option value="251-1000">251-1000</option>
				<option value="1001-5000">1001-5000</option>
				<option value="5000+1">5000 and above</option>
			</select>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-12">
		<div class="">
			<label for="" class="form-label">Department / Area of Work</label>
			<select name="organization[department]" id="" class="form-select" required>
				<option value="">Select</option>
				<option value="Marketing">Marketing</option>
				<option value="Operations">Operations</option>
				<option value="Finance">Finance</option>
				<option value="HR">HR</option>
				<option value="Founder / CEO">Founder / CEO</option>
				<option value="Other">Other</option>
			</select>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-12">
		<div class="">
			<label for="" class="form-label">Organization Turnover</label>
			<select name="organization[turnover]" id="" class="form-select" required>
				<option value="">Select</option>
				<option value="Below 50 Cr">Below 50 Cr.</option>
				<option value="50 Cr - 100 Cr">50 Cr. - 100 Cr.</option>
				<option value="100 Cr - 250 Cr">100 Cr. - 250 Cr.</option>
				<option value="250 Cr - 500 Cr">250 Cr. - 500 Cr.</option>
				<option value="500 Cr - 1000 Cr">500 Cr - 1000 Cr.</option>
				<option value="1000 Cr+">1000+ Cr.</option>
			</select>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-12">
		<div class="">
			<label for="" class="form-label">Industry</label>
			<select name="organization[industry]" id="" class="form-select" required>
				<option value="">Select</option>
				<option value="Textile">Textile</option>
				<option value="Jems and Jewellery">Jems and Jewellery</option>
				<option value="Pharmaceutical">Pharmaceutical</option>
				<option value="Information &amp; Technology">Information &amp; Technology</option>
				<option value="Semiconductor">Semiconductor</option>
				<option value="Real Estate and Construction">Real Estate and Construction</option>
				<option value="Education and Electrical Equipment">Education and Electrical Equipment</option>
				<option value="Manufacturing">Manufacturing</option>
				<option value="BFSI">BFSI</option>
				<option value="Gaming">Gaming</option>
				<option value="Fintech">Fintech</option>
				<option value="Food &amp; Beverages">Food &amp; Beverages</option>
				<option value="Oil &amp; Gas">Oil &amp; Gas</option>
				<option value="Automotive and Auto Components">Automotive and Auto Components</option>
				<option value="FMCG">FMCG</option>
				<option value="Aerospace and Defence">Aerospace and Defence</option>
				<option value="Services">Services</option>
				<option value="Other">Other</option>
			</select>
			</select>
		</div>
	</div>
	<div class="col-12">
		<div class="">
			<label for="" class="form-label">What are you expecting from this event?</label>
			<textarea name="message" minlength="50" id="" rows="5" class="form-control" required></textarea>
		</div>
	</div>
	<div class="col-12">
		<div class="mb-3 form-check">
			<input type="checkbox" name="consent" required class="form-check-input">
			<label class="form-check-label" for="exampleCheck1">By submitting this form, you agree to share your contact details with the partners of the event</label>
		</div>
	</div>
	<div class="col-12">
		<button type="submit" class="btn btn-red">Register</button>
		<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	</div>
</div>
<?= form_close() ?>
<script>
	$.validator.addMethod("emailregex", function(value, element) {
		return this.optional(element) || /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/i.test(value);
	})
	$.validator.addMethod("letters", function(value, element) {
		return this.optional(element) || /^[a-zA-Z\s']*$/i.test(value);
	});
	$.validator.addMethod("numbers", function(value, element) {
		return this.optional(element) || /^[0-9]*$/i.test(value);
	});
	$('#<?= $id ?>').validate({
		rules: {
			name: {
				letters: true,
			},
			email: {
				emailregex: true
			},
			contact: {
				numbers: true
			}
		},
		messages: {
			email: {
				emailregex: 'Please enter a valid email address'
			},
			name: {
				letters: 'Please enter a valid name',
			},
			contact: {
				numbers: 'Please enter a valid contact number'
			}
		}
	})
</script>
