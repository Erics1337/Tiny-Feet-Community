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
                            <h5 class="user-name"><?php echo $data['user']->username ?></h5>
                            <h6 class="user-email"><?php echo $data['user']->email ?></h6>
                        </div>
                        <div class="about">
                            <h5>About</h5>
                            <div class="form-group">
                                <textarea style="overflow:auto;resize:none" rows="10" cols="5" class="form-control" readonly="readonly"><?php echo $data['user']->email ?></textarea>
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
                                <label for="fullName">Full Name</label>
                                <input readonly="readonly" type="text" class="form-control" id="fullName" placeholder="No full name" value="<?php echo $data['user']->fullname ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="eMail">Email</label>
                                <input readonly="readonly" type="email" class="form-control" id="eMail" placeholder="No email" value="<?php echo $data['user']->email ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input readonly="readonly" type="text" class="form-control" id="phone" placeholder="No phone number" value="<?php echo $data['user']->phone ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">Website URL</label>
                                <input readonly="readonly" type="url" class="form-control" id="website" placeholder="No Website url" value="<?php echo $data['user']->weburl ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mt-3 mb-2 text-primary">Address</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="Street">Street</label>
                                <input readonly="readonly" type="name" class="form-control" id="Street" placeholder="No Street" value="<?php echo $data['user']->street ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="ciTy">City</label>
                                <input readonly="readonly" type="name" class="form-control" id="city" placeholder="No City" value="<?php echo $data['user']->city ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="sTate">State</label>
                                <input readonly="readonly" type="text" class="form-control" id="state" placeholder="No State" value="<?php echo $data['user']->state ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="zIp">Zip Code</label>
                                <input readonly="readonly" type="text" class="form-control" id="zip" placeholder="No Code" value="<?php echo $data['user']->zip ?>">
                            </div>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data['user']->user_id) : ?>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <form action="<?php echo URLROOT; ?>/profiles/edit/<?php echo $data['user']->username ?>">
                                        <input type="submit" class="btn btn-secondary" value="Edit" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>