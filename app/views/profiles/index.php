<?php 
// View for the index method
?>
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>List of Users</h1>
    </div>
</div>
<?php foreach($data['users'] as $user) : ?>
<!-- Bootstrap card class and margainBottom-3 to separate them -->
<div class="card card-body mb-3">
    <h4 class="card-title"><?php echo $user->username; ?></h4>
    <!-- p-2 allows padding all around -->
    <div class="bg-light p-2 mb-3">
        Joined <?php echo $user->created_at; ?>
    </div>
    <div class="bg-light p-2 mb-3">
        Can be contacted through <?php echo $user->email; ?>
    </div>
    <a href="<?php echo URLROOT; ?>/profiles/user/<?php echo $user->username; ?>" class="btn btn-dark"> See More</a>
</div>
<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>