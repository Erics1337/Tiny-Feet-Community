<?php 
// View for the index method
// This file structure workflow is the same for any other functionality you would like to add to the page
?>
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>Posts</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary float-right">
            <i class="fa fa-pencil"></i> Add Post
        </a>
    </div>
</div>
<?php foreach($data['posts'] as $post) : ?>
<!-- Bootstrap card class and margainBottom-3 to separate them -->
<div class="card card-body mb-3">
    <h4 class="card-title"><?php echo $post->title; ?></h4>
    <!-- p-2 allows padding all around -->
    <div class="bg-light p-2 mb-3">
        Written by <?php echo $post->name; ?> on <?php echo $post->postCreated; ?>
    </div>
    <p class="card-text"><?php echo $post->body; ?></p>
    <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-dark">More</a>
</div>
<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>