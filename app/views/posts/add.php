<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-arrow-left"></i> Back</a>
<div class="card card-body bg-light mt-5">
    <h2>Add Post</h2>
    <form action="<?php echo URLROOT; ?>/posts/add" method="post">

        <div class="form-group">
            <label for="topic">Choose a topic to post to:</label>
            <br>
            <select id="topicInput" name="topic" id="topic">
                <option value="userSubmitted">User-Submitted Data</option>
                <option value="RegionDisc">Regional Discussion</option>
                <option value="CapSol">CAP Solutions</option>
                <option value="CommCoB">Community Co-Benefits</option>
                <option value="other">Other</option>
            </select>
            <br>
            <br>
            <br>
            <label for="title">Title: <sup>*</sup></label>
            <!-- if name_err then put red box around form input with BS class is-invalid -->
            <input type="text" name="title" class="form-control form-control-lg 
            <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>"> <!-- Keeps data persisting -->
            <!-- Display the error -->
            <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
        </div>

        <div class="form-group">
            <label for="body">Body: <sup>*</sup></label>
            <!-- if name_err then put red box around form input with BS class is-invalid -->
            <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea> <!-- Keeps data persisting -->
            <!-- Display the error -->
            <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
        </div>
        <input type="submit" class="btn btn-success" value="Submit">
    </form>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>