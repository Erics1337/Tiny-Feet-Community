<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">
	<form method="post">
		<div class="row gutters">
			<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
				<div class="card h-100">
					<div class="card-body">
						<div class="account-settings">
							<div class="user-profile">
								<div class="user-avatar">
									<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="User Profile Pic">
								</div>
								<h5 class="user-name"><?php echo $data['username'] ?></h5>
								<h6 class="user-email"><?php echo $data['email'] ?></h6>
							</div>
							<div class="about">
								<h5>About</h5>
								<div class="form-group user-profile">
									<textarea name="about" placeholder="I'm really cool and care about the environment!" style="overflow:auto;resize:none" rows="5" class="form-control"><?php echo $data['user']['about'] ?></textarea>
								</div>
								<div class="custom-control custom-switch">
									<input name="theme" <?php if (isset($_SESSION['user_theme'])) echo 'checked'; ?> type="checkbox" class="custom-control-input" id="customSwitch1">
									<label class="custom-control-label" for="customSwitch1"><?php echo isset($_SESSION['user_theme']) ? 'Dark Theme' : 'Light Theme' ?> </label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
				<div class="card h-100">
					<div class="card-body">
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<h6 class="mb-2 text-primary">Personal Details</h6>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="username">Username<sup>*</sup></label>
									<input required type="text" placeholder="Username Required" class="form-control 
								<?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" name="username" value="<?php echo $data['username'] ?>">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="email">Email<sup>*</sup></label>
									<input required type="email" placeholder="Email Required" class="form-control 
								<?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" name="email" value="<?php echo $data['email'] ?>">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="fullName">Full Name</label>
									<input type="text" class="form-control" name="fullName" placeholder="No Full Name" value="<?php echo $data['fullName'] ?>">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="phone">Phone</label>
									<input type="text" class="form-control" name="phone" placeholder="No Phone Number" value="<?php echo $data['phone'] ?>">
								</div>
							</div>

						</div>
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<h6 class="mt-3 mb-2 text-primary">Address</h6>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="street">County</label>
									<input type="text" class="form-control" name="county" placeholder="No County" value="<?php echo $data['county'] ?>">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="city">City</label>
									<input type="text" class="form-control" name="city" placeholder="No City" value="<?php echo $data['city'] ?>">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="state">State</label>
									<input type="text" class="form-control" name="state" placeholder="No State" value="<?php echo $data['state'] ?>">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="zip">Zip Code</label>
									<input type="number" step="00000" class="form-control" name="zip" placeholder="No Zip Code" value="<?php echo $data['zip'] ?>">
								</div>
							</div>
						</div>
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="text-right">
									<a href="<?php echo URLROOT; ?>/profiles/user/<?php echo $data['username']; ?>" id="cancelButton" name="cancelButton" class="btn btn-secondary">Cancel</a>
									<input type="submit" id="submit" name="submit" value="Update" class="btn btn-primary"></input>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>