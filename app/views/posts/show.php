<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<br>
<h1><?php echo $data['post']->title; ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
    Written by <?php echo $data['user']->name; ?> on <?php echo $data['post']->created_at; ?>
</div>
<p><?php echo $data['post']->body; ?></p>

<!-- We want to have the logged in user be able to edit their post so we check if the post user_id is equal to the session user_id -->
<!-- And all the code in between the ternery if statement is run (adds "edit" and "delete" buttons), otherwise nothing is run -->
<?php if($data['post']->user_id == $_SESSION['user_id']) : ?>
<hr>
<a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-dark">Edit</a>

    <form class="float-right" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger">
    </form>
<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>