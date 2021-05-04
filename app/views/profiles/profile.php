<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="form-group user-avatar">
                                <img href="<?php echo URLROOT; ?>/profiles/upload/" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                            </div>
                            <h5 class="user-name"><?php echo $data['username'] ?></h5>
                            <h6 class="user-email"><?php echo $data['email'] ?></h6>
                        </div>
                        <div class="about">
                            <h5>About</h5>
                            <div class="form-group">
                                <textarea style="overflow:auto;resize:none" class="form-control" readonly="readonly"><?php echo $data['about'] ?></textarea>
                            </div>
                            <div class="custom-control custom-switch">
                                <input <?php if (isset($_SESSION['user_theme'])) echo 'checked'; ?> type="checkbox" class="custom-control-input" id="">
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
                                <input readonly="readonly" type="text" class="form-control" id="username" value="<?php echo $data['username'] ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="eMail">Email<sup>*</sup></label>
                                <input readonly="readonly" type="email" class="form-control" id="email" value="<?php echo $data['email'] ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <input readonly="readonly" type="text" class="form-control" id="fullName" placeholder="No Full Name" value="<?php echo $data['fullName'] ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input readonly="readonly" type="text" class="form-control" id="phone" placeholder="No Phone Number" value="<?php echo $data['phone'] ?>">
                            </div>
                        </div>

                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mt-3 mb-2 text-primary">Address</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="county">County</label>
                                <input readonly="readonly" type="name" class="form-control" id="street" placeholder="No Street" value="<?php echo $data['county'] ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input readonly="readonly" type="name" class="form-control" id="city" placeholder="No City" value="<?php echo $data['city'] ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="state">State</label>
                                <input readonly="readonly" type="text" class="form-control" id="state" placeholder="No State" value="<?php echo $data['state'] ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="zip">Zip Code</label>
                                <input readonly="readonly" type="text" class="form-control" id="zip" placeholder="No Zip Code" value="<?php echo $data['zip'] ?>">
                            </div>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data['id']) : ?>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <a role="button" href="<?php echo URLROOT; ?>/profiles/edit/<?php echo $data['username']; ?>" class="btn btn-dark">Edit</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php';
