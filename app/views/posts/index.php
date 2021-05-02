<?php
// View for the index method of the Posts class
?>
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>Posts</h1>
    </div>
    <?php if (isset($_SESSION['user_id'])) : ?>
        <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary float-right">
                <i class="fa fa-pencil"></i> Add Post
            </a>
        </div>
    <?php endif; ?>
</div>
<?php foreach ($data['posts'] as $post) : ?>
    <div class="card gedf-card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mr-2">
                        <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                    </div>
                    <div class="ml-2">
                        <div class="h5 m-0">@<?php echo $post['username']; ?> </div>
                        <div class="h7 text-muted"><?php echo $post['fullName']; ?></div>
                    </div>
                </div>
                <div>
                    <?php if ($post['user_id'] == $_SESSION['user_id']) : ?>
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                <div class="h6 dropdown-header">Configuration</div>
                                <a class="dropdown-item" href="<?php echo URLROOT; ?>/posts/edit/<?php echo $post['postId']; ?>">edit</a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="card-body">
            <a class="card-link" href="<?php echo URLROOT; ?>/posts/show/<?php echo $post['postId']; ?>">
                <h2 class="card-title"><?php echo $post['title']; ?></h2>
            </a>
            <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($post['postCreated'], true) ?></div>
            <p class="card-text">
                <?php echo $post['body']; ?>
            </p>
        </div>
        <div class="card-footer">
            <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
            <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
            <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
        </div>
    </div>

<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>