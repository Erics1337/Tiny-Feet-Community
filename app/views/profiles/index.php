<?php
// View for the index method of the Profiles class
?>
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>List of Users</h1>
    </div>
</div>

<div class="container mt-3 mb-4">
    <div class="col-lg-9 mt-4 mt-lg-0">
        <div class="row">
            <div class="col-md-12">
                <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
                    <table class="table manage-candidates-top mb-0">
                        <thead>
                            <tr>
                                <th>Community Member</th>
                                <th class="text-center">Status</th>
                                <th class="action text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['users'] as $user) : ?>

                                <tr class="candidates-list">
                                    <td class="title">
                                        <div class="thumb">
                                            <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                                        </div>
                                        <div class="candidate-list-details">
                                            <div class="candidate-list-info">
                                                <div class="candidate-list-title">
                                                    <h5 class="mb-0"><a href="<?php echo URLROOT; ?>/profiles/user/<?php echo $user['username']; ?>">
                                                            <?php echo $user['username']; ?></a></h5>
                                                    <div class="h6 text-muted"><?php echo $user['fullName']; ?></div>
                                                    <?php if(isset($user['city']) && isset($user['state']) && isset($user['zip'])) : ?>
                                                    <div class="h6 text-muted "><?php echo $user['city'] . ", " . $user['state'] . " " . $user['zip']; ?></div>
                                                    <?php endif; ?>

                                                    <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> Member since <?php echo $user['created_at'] ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="candidate-list-favourite-time text-center">
                                        <a class="candidate-list-favourite order-2 text-danger" href="#"><i class="fas fa-heart"></i></a>
                                        <span class="candidate-list-time order-1">Shortlisted</span>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled mb-0 d-flex justify-content-end">
                                            <li><a href="#" class="text-primary" data-toggle="tooltip" title="" data-original-title="view"><i class="far fa-eye"></i></a></li>
                                            <li><a href="#" class="text-info" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a></li>
                                            <li><a href="#" class="text-danger" data-toggle="tooltip" title="" data-original-title="Delete"><i class="far fa-trash-alt"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- <div class="text-center mt-3 mt-sm-3">
                        <ul class="pagination justify-content-center mb-0">
                            <li class="page-item disabled"> <span class="page-link">Prev</span> </li>
                            <li class="page-item active" aria-current="page"><span class="page-link">1 </span> <span class="sr-only">(current)</span></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">25</a></li>
                            <li class="page-item"> <a class="page-link" href="#">Next</a> </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>