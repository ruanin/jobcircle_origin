<?php include 'header.php'; ?>
<?php include 'navigation.php'; ?>

<div class="header-page-title">
			<div class="container">
				<h1>Sign Up</h1>

				<ul class="breadcrumbs">
					<li><a href="#">Home</a></li>
					<li><a href="#">Sign Up</a></li>
				</ul>
			</div>
		</div>
	</header> <!-- end #header -->

	<div id="page-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 page-content">
					<ul class="form-steps four clearfix">
						<li class="completed">Step 1</li>
						<li class="active">Step 2</li>
						<li>Step 3</li>
						<li>Step 4</li>
					</ul>

					<div class="white-container sign-up-form">
						<div>
							<h2>1. Fill in your profile</h2>

							<section>
								<h6 class="bottom-line">You are:</h6>

								<div class="radio-inline">
									<label><input type="radio"> Employee</label>
								</div>

								<div class="radio-inline">
									<label><input type="radio"> Recruiter</label>
								</div>
							</section>

							<section>
								<h6 class="bottom-line">Personal Info:</h6>

								<h6 class="label">Name</h6>

								<div class="row">
									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="Name">
									</div>

									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="Surname">
									</div>
								</div>

								<h6 class="label">Date of Birth</h6>

								<div class="row">
									<div class="col-sm-12">
										<input type="text" class="month-input" placeholder="MM">
										<input type="text" class="day-input" placeholder="DD">
										<input type="text" class="year-input" placeholder="YYYY">
									</div>
								</div>

								<h6 class="label">Phone</h6>

								<div class="row">
									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="Mobile">
									</div>

									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="Work">
									</div>

									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="Fax">
									</div>
								</div>

								<h6 class="label">Address</h6>

								<div class="row">
									<div class="col-sm-6">
										<input type="text" class="form-control" placeholder="Address 1">
									</div>

									<div class="col-sm-6">
										<input type="text" class="form-control" placeholder="Address 2">
									</div>
								</div>

								<div class="row">
									<div class="col-sm-3">
										<select>
											<option value="">Country</option>
											<option value="">1</option>
											<option value="">2</option>
											<option value="">3</option>
											<option value="">4</option>
											<option value="">5</option>
										</select>
									</div>

									<div class="col-sm-3">
										<select>
											<option value="">State/Province</option>
											<option value="">1</option>
											<option value="">2</option>
											<option value="">3</option>
											<option value="">4</option>
											<option value="">5</option>
										</select>
									</div>

									<div class="col-sm-3">
										<input type="text" class="form-control" placeholder="City">
									</div>

									<div class="col-sm-3">
										<input type="text" class="form-control" placeholder="ZIP Code">
									</div>
								</div>
							</section>

							<section>
								<h6 class="bottom-line">Expected Salary:</h6>

								<div class="row">
									<div class="col-sm-12">
										<div class="range-slider clearfix">
											<div class="slider" data-min="100" data-max="100000" data-current-min="500" data-current-max="50000"></div>
											<div class="first-value">$ <span>500</span></div>
											<div class="last-value">$ <span>50000</span></div>
										</div>
									</div>
								</div>
							</section>

							<section>
								<h6 class="bottom-line">Set Password:</h6>

								<div class="row">
									<div class="col-sm-4">
										<input type="password" class="form-control" placeholder="Password">
									</div>

									<div class="col-sm-4">
										<input type="password" class="form-control" placeholder="Repeat Password">
									</div>
								</div>
							</section>
						</div>

						<hr class="mt60">

						<div class="clearfix">
							<a href="#" class="btn btn-default btn-large pull-right">Continue to Step 2</a>
						</div>
					</div>
				</div> <!-- end .page-content -->
			</div>
		</div> <!-- end .container -->
	</div> <!-- end #page-content -->
<?php include 'footer.php'; ?>
