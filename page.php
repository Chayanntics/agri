		<!--**********************************
            Header start
        ***********************************-->
		<?php include 'layout/header.php'; ?>

		<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

		<!--**********************************
            Sidebar start
        ***********************************-->
		<?php include 'layout/sidebar.php'; ?>

		<!--**********************************
            Sidebar end
        ***********************************-->

		<!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">

			<div class="page-titles">
				<ol class="breadcrumb">
					<li>
						<h5 class="bc-title">Products</h5>
					</li>
				</ol>
			</div>
			<div class="container-fluid">
				<div class="row">
					
					<div class="d-flex justify-content-between align-items-center mb-3">
						<h5 class="mb-0">Realtime Price</h5>
					</div>
					<?php for($i = 0; $i < 12; $i++){ ?>
					<div class="col-xl-3 col-sm-6">
						<div class="card box-hover">
							<div class="card-header">
								<h5 class="mb-0"># <?= $i ?> . Product Name</h5>
							</div>
							<div class="card-body">
								<div class="products style-1">
									<img style="width: 40px; height: 40px" src="data:image/jpeg;base64,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" class="avatar avatar-lg rounded-circle" alt="">
									<div>
										<h6>Product Price</h6>
										<span>Sub Details</span>
									</div>
								</div>
								<p class="my-3">Lorem Ipsum is simply dummy text of the printing and typesetting
									industry. Lorem Ipsum has been the industry's standard dummy text.</p>
								<div>
								</div>
								<div class="progress mt-4">
									<div class="progress-bar bg-purple"
										style="width:60%; height:5px; border-radius:4px;" role="progressbar"></div>
								</div>
							</div>
							<div class="card-footer d-flex justify-content-between flex-wrap">
								<div class="due-progress">
									<p class="mb-0 text-secondary">Modified <span class="text-purple">: 2023-06-02</span></p>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>

			</div>
		</div>

		<!--**********************************
            Content body end
        ***********************************-->

		<div class="offcanvas offcanvas-end customeoff" tabindex="-1" id="offcanvasExample1">
			<div class="offcanvas-header">
				<h5 class="modal-title" id="#gridSystemModal1">Add New Task</h5>
				<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
					<i class="fa-solid fa-xmark"></i>
				</button>
			</div>
			<div class="offcanvas-body">
				<div class="container-fluid">
					<form>
						<div class="row">
							<div class="col-xl-6 mb-3">
								<label for="exampleFormControlInputfirst" class="form-label">Title<span
										class="text-danger">*</span></label>
								<input type="text" class="form-control" id="exampleFormControlInputfirst"
									placeholder="Title">
							</div>
							<div class="col-xl-6 mb-3">
								<label class="form-label">Project<span class="text-danger">*</span></label>
								<select class="default-select form-control">
									<option data-display="Select">Project</option>
									<option value="html">Salesmate</option>
									<option value="css">ActiveCampaign</option>
									<option value="javascript">Insightly</option>
								</select>
							</div>
							<div class="col-xl-6 mb-3">
								<label for="exampleFormControlInputthree" class="form-label">Start Date<span
										class="text-danger">*</span></label>
								<input type="date" class="form-control" id="exampleFormControlInputthree">
							</div>
							<div class="col-xl-6 mb-3">
								<label for="exampleFormControlInputfour" class="form-label">End Date<span
										class="text-danger">*</span></label>
								<input type="date" class="form-control" id="exampleFormControlInputfour">
							</div>
							<div class="col-xl-6 mb-3">
								<label class="form-label">Estimated Hour<span class="text-danger">*</span></label>
								<div class="input-group">
									<input type="text" class="form-control" value="09:30"><span
										class="input-group-text"><i class="fas fa-clock"></i></span>
								</div>
							</div>
							<div class="col-xl-6 mb-3">
								<label class="form-label">Status<span class="text-danger">*</span></label>
								<select class="default-select form-control">
									<option data-display="Select">Status</option>
									<option value="html">In Progess</option>
									<option value="css">Pending</option>
									<option value="javascript">Completed</option>
								</select>
							</div>
							<div class="col-xl-6 mb-3">
								<label class="form-label">priority<span class="text-danger">*</span></label>
								<select class="default-select form-control">
									<option data-display="Select">priority</option>
									<option value="html">Hight</option>
									<option value="css">Medium</option>
									<option value="javascript">Low</option>
								</select>
							</div>
							<div class="col-xl-6 mb-3">
								<label class="form-label">Category<span class="text-danger">*</span></label>
								<select class="default-select form-control">
									<option data-display="Select">Category</option>
									<option value="html">Designing</option>
									<option value="css">Development</option>
									<option value="javascript">react developer</option>
								</select>
							</div>
							<div class="col-xl-6 mb-3">
								<label class="form-label">Permission<span class="text-danger">*</span></label>
								<select class="default-select form-control">
									<option data-display="Select">Permission</option>
									<option value="html">Public</option>
									<option value="css">Private</option>
								</select>
							</div>
							<div class="col-xl-6 mb-3">
								<label class="form-label">Deadline add<span class="text-danger">*</span></label>
								<select class="default-select form-control">
									<option data-display="Select">Deadline</option>
									<option value="html">Yes</option>
									<option value="css">No</option>
								</select>
							</div>
							<div class="col-xl-6 mb-3">
								<label class="form-label">Assigned to<span class="text-danger">*</span></label>
								<select class="default-select form-control">
									<option data-display="Select">Assigned</option>
									<option value="html">Bernard</option>
									<option value="css">Sergey Brin</option>
									<option value="javascript"> Larry Ellison</option>
								</select>
							</div>
							<div class="col-xl-6 mb-3">
								<label class="form-label">Responsible Person<span class="text-danger">*</span></label>
								<input name="tagify" class="form-control py-0 ps-0" value='James, Harry'>

							</div>
							<div class="col-xl-12 mb-3">
								<label class="form-label">Description<span class="text-danger">*</span></label>
								<textarea rows="3" class="form-control"></textarea>
							</div>
							<div class="col-xl-12 mb-3">
								<label class="form-label">Summary<span class="text-danger">*</span></label>
								<textarea rows="3" class="form-control"></textarea>
							</div>

						</div>
						<div>
							<button class="btn btn-primary me-1">Help Desk</button>
							<button class="btn btn-danger light ms-1">Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<?php include 'layout/footer.php'; ?>
		
		<?php include 'layout/foot.php'; ?>