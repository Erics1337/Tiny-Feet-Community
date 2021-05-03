<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-arrow-left"></i> Back</a>
<br>
<br>
<div class="card gedf-card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <div class="mr-2">
                    <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                </div>
                <div class="ml-2">
                    <div class="h5 m-0">@<?php echo $data['user']['username']; ?> </div>
                    <div class="h7 text-muted"><?php echo $data['user']['fullName']; ?></div>
                </div>
            </div>
            <div>
                <?php if ($data['post']['user_id'] == $_SESSION['user_id']) : ?>
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-h"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                            <div class="h6 dropdown-header">Configuration</div>
                            <a class="dropdown-item" href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']['id']; ?>">edit</a>
                            <form id="deleteForm" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']['id']; ?>" method="post">
                                <a class="dropdown-item" onclick="document.getElementById('deleteForm').submit();">delete</a>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="card-body">
        <a class="card-link" href="<?php echo URLROOT; ?>/posts/show/<?php echo $data['post']['postId']; ?>">
            <h2 class="card-title"><?php echo $data['post']['title']; ?></h2>
        </a>
        <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($data['post']['postCreated'], true) ?></div>
        <p class="card-text">
            <?php echo $data['post']['body']; ?>
        </p>
    </div>
    <div class="card-footer">
        <!-- <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
        <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a> -->
        <a href="https://www.facebook.com/sharer.php?u=<?php echo URLROOT; ?>/posts/show/<?php echo $post['postId']; ?>" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
        <?php if ($data['post']['user_id'] == $_SESSION['user_id']) : ?>

            <form class="card-link float-right" style="display: inline;" id="deleteForm" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']['postId']; ?>" method="post">
                <a href="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']['id']; ?>" class="card-link float-right" onclick="document.getElementById('deleteForm').submit();"><i class="fa fa-trash-alt"></i> Delete</a>
            </form>
            <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']['id']; ?>" class="card-link float-right"><i class="fa fa-edit"></i> Edit</a>

        <?php endif; ?>

    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>