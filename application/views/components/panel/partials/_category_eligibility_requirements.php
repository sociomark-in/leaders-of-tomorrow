<div class="modal fade" id="eligibilityModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="staticBackdropLabel">Eligibility Criteria and Pre-requisites</h1>

				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<h3 class="text-primary mb-3">Eligibility Criteria</h3>
				<div class="mb-3">
					<h5 class="text-primary">Academic:</h5>
					<ul>
						<li>
							Bachelor's degree in [Relevant Field: e.g., Computer Science, Engineering, Mathematics] or equivalent from a recognized university.
						</li>
						<li>
							Minimum cumulative GPA of [Specific Value: e.g., 3.0] on a 4.0 scale.
						</li>
					</ul>
				</div>
				<div class="">
					<h5 class="text-primary">Work Experience:</h5>
					<ul>
						<li>
							[Optional] Minimum [Number] years of relevant professional experience in [Industry/Domain: e.g., Software Development, Data Science].
						</li>
					</ul>
				</div>
				<div class="">
					<h5 class="text-primary">English Proficiency:</h5>
					<ul>
						<li>
							Demonstration of English proficiency through [Specify Method: e.g., TOEFL, IELTS, or equivalent test] with minimum scores of [Specify Scores].
						</li>
						<li>
							Alternatively, applicants whose native language is English may be exempt from this requirement.
						</li>
					</ul>
				</div>
				<hr class="mb-3">
				<h3 class="text-primary mb-3">Document Prerequisites</h3>
				<div class="">
					<h5 class="text-primary">Official Transcripts:</h5>
					<ul>
						<li>
							Transcripts from all previously attended institutions, including high school (if applicable).
						</li>
						<li>
							Transcripts must be official and submitted directly from the issuing institution or through a recognized credential evaluation service.
						</li>
					</ul>
				</div>
				<div class="">
					<h5 class="text-primary">Statement of Purpose:</h5>
					<ul>
						<li>
							A personal statement outlining the applicant's academic and professional goals, reasons for applying to the program, and how their experiences align with the program's objectives.
						</li>
					</ul>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Understood</button>
			</div>
		</div>
	</div>
</div>

<script>
	let modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('eligibilityModal')) // Returns a Bootstrap modal instance
	// Show or hide:
	modal.show();
</script>
