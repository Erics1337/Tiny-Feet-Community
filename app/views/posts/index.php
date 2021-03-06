<?php
// View for the index method of the Posts class
?>
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>


<div class="container">
<div class="main-body p-0">

            <div class="inner-main-header">
                <h3>Posts</h3>
                <!-- <select class="custom-select custom-select-sm w-auto mr-1">
                    <option selected="">Latest</option>
                    <option value="1">Popular</option>
                    <option value="3">Solved</option>
                    <option value="3">Unsolved</option>
                    <option value="3">No Replies Yet</option>
                </select>
                <span class="input-icon input-icon-sm ml-auto w-auto">
                    <input type="text" class="form-control form-control-sm bg-gray-200 border-gray-200 shadow-none mb-4 mt-4" placeholder="Search forum" />
                </span> -->
            </div>
            <!-- /Inner main header -->
    <div class="inner-wrapper">

    
        <!-- Inner sidebar -->
        <div class="inner-sidebar">
            <!-- Inner sidebar header -->
            <div class="inner-sidebar-header justify-content-center">
            <!-- <button class="btn btn-primary has-icon btn-block" type="button" data-toggle="modal" data-target="#threadModal"> -->

                <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary has-icon btn-block">
                    <span style="font-weight: bold;">+ </span>
                    NEW DISCUSSION
                </a>
            </div>
            <!-- /Inner sidebar header -->

            <!-- Inner sidebar body -->
            <div class="inner-sidebar-body p-0">
                <div class="p-3 h-100" data-simplebar="init">
                    <div class="simplebar-wrapper" style="margin: -16px;">
                        <div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" style="height: 100%;">
                                    <div class="simplebar-content" style="padding: 16px;">
                                        <nav class="nav nav-pills nav-gap-y-1 flex-column">
                                            <a href="<?php echo URLROOT; ?>/posts/topic/all" class="nav-link nav-link-faded has-icon <?php if($data['topic'] == 'all') echo 'active'; ?>">
                                            All Topics</a>
                                            <a href="<?php echo URLROOT; ?>/posts/topic/userSubmitted" class="nav-link nav-link-faded has-icon <?php if($data['topic'] == 'userSubmitted') echo 'active'; ?>">
                                            User-Submitted Data</a>
                                            <a href="<?php echo URLROOT; ?>/posts/topic/RegionDisc" class="nav-link nav-link-faded has-icon <?php if($data['topic'] == 'RegionDisc') echo 'active'; ?>">
                                            Regional Discussion</a>
                                            <a href="<?php echo URLROOT; ?>/posts/topic/CapSol" class="nav-link nav-link-faded has-icon <?php if($data['topic'] == 'CapSol') echo 'active'; ?>">
                                            CAP Solutions</a>
                                            <a href="<?php echo URLROOT; ?>/posts/topic/CommCoB" class="nav-link nav-link-faded has-icon <?php if($data['topic'] == 'CommCoB') echo 'active'; ?>">
                                            Community Co-Benefits</a>
                                            <a href="<?php echo URLROOT; ?>/posts/topic/other" class="nav-link nav-link-faded has-icon <?php if($data['topic'] == 'other') echo 'active'; ?>">
                                            Other</a>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Inner sidebar body -->
        </div>
        <!-- /Inner sidebar -->

        <!-- Inner main -->
        <div class="inner-main">


            <!-- Inner main body -->

            <!-- Forum List -->

            <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">
            <?php foreach ($data['posts'] as $post) : ?>

                <div class="card mb-2 <?php echo $post['topic']. " post" ?>">
                    <div class="card-body p-2 p-sm-3">
                        <div class="media forum-item">
                            <a href="<?php echo URLROOT; ?>/profiles/user/<?php echo $_SESSION['user_username'] ?>">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="mr-3 rounded-circle" width="50" alt="User" />
                            </a>
                            <div class="media-body">
                            <!-- <h6><a href="" data-toggle="collapse" data-target=".forum-content" class="text-body"></a></h6> THIS IS HOW YOU USE THE COLLAPSE-->
                                <h6><a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post['postId']; ?>" class="text-body"><?php echo $post['title']; ?></a></h6>
                                <p class="text-secondary">
                                <?php echo substr($post['body'], 0, 240)." ......."; ?>
                            </p>
                                <p class="text-muted">Posted by <a href="<?php echo URLROOT; ?>/profiles/user/<?php echo $_SESSION['user_username'] ?>"><?php echo $post['username']; ?></a> 
                                <span class="float-right"><i class="fa fa-clock-o"></i>
                                <span class="text-secondary font-weight-bold"><?php echo time_elapsed_string($post['postCreated']) ?></span></p>
                            </span>
                            </div>
                            <!-- <div class="text-muted small text-center align-self-center">
                                <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 19</span>
                                <span><i class="far fa-comment ml-2"></i> 3</span>
                            </div> -->
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>


                <!-- <ul class="pagination pagination-sm pagination-circle justify-content-center mb-0">
                    <li class="page-item disabled">
                        <span class="page-link has-icon"><i class="material-icons">chevron_left</i></span>
                    </li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
                    <li class="page-item active"><span class="page-link">2</span></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                    <li class="page-item">
                        <a class="page-link has-icon" href="javascript:void(0)"><i class="material-icons">chevron_right</i></a>
                    </li>
                </ul> -->
            </div>
            <!-- /Forum List -->

            <!-- Forum Replies-->
            <!-- <div class="inner-main-body p-2 p-sm-3 collapse forum-content">
                <a href="#" class="btn btn-light btn-sm mb-3 has-icon" data-toggle="collapse" data-target=".forum-content"><i class="fa fa-arrow-left mr-2"></i>Back</a>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="media forum-item">
                            <a href="javascript:void(0)" class="card-link">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" width="50" alt="User" />
                                <small class="d-block text-center text-muted">Newbie</small>
                            </a>
                            <div class="media-body ml-3">
                                <a href="javascript:void(0)" class="text-secondary">Mokrani</a>
                                <small class="text-muted ml-2">1 hour ago</small>
                                <h5 class="mt-1">Realtime fetching data</h5>
                                <div class="mt-3 font-size-sm">
                                    <p>Hellooo :)</p>
                                    <p>
                                        I'm newbie with laravel and i want to fetch data from database in realtime for my dashboard anaytics and i found a solution with ajax but it dosen't work if any one have a simple solution it will be
                                        helpful
                                    </p>
                                    <p>Thank</p>
                                </div>
                            </div>
                            <div class="text-muted small text-center">
                                <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 19</span>
                                <span><i class="far fa-comment ml-2"></i> 3</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="media forum-item">
                            <a href="javascript:void(0)" class="card-link">
                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle" width="50" alt="User" />
                                <small class="d-block text-center text-muted">Pro</small>
                            </a>
                            <div class="media-body ml-3">
                                <a href="javascript:void(0)" class="text-secondary">drewdan</a>
                                <small class="text-muted ml-2">1 hour ago</small>
                                <div class="mt-3 font-size-sm">
                                    <p>What exactly doesn't work with your ajax calls?</p>
                                    <p>Also, WebSockets are a great solution for realtime data on a dashboard. Laravel offers this out of the box using broadcasting</p>
                                </div>
                                <button class="btn btn-xs text-muted has-icon"><i class="fa fa-heart" aria-hidden="true"></i>1</button>
                                <a href="javascript:void(0)" class="text-muted small">Reply</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- /Forum Replies -->

            <!-- /Inner main body -->
        </div>
        <!-- /Inner main -->
    </div>

    <!-- New Thread Modal -->
    <!-- <div class="modal fade" id="threadModal" tabindex="-1" role="dialog" aria-labelledby="threadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header d-flex align-items-center bg-primary text-white">
                        <h6 class="modal-title mb-0" id="threadModalLabel">New Discussion</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">??</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="threadTitle">Title</label>
                            <input type="text" class="form-control" id="threadTitle" placeholder="Enter title" autofocus="" />
                        </div>
                        <label for="threadBody">Body</label>
                        <textarea rows="5" class="form-control summernote" id="threadBody" placeholder="Enter post body text" ></textarea>

                        <div class="custom-file form-control-sm mt-3" style="max-width: 300px;">
                            <input type="file" class="custom-file-input" id="customFile" multiple="" />
                            <label class="custom-file-label" for="customFile">Attachment</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>