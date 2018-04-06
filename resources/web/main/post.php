<!-- Page Header -->
<header class="masthead" style="background-image: url('/resources/templates/default/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1> <?php echo $post->getTitle()?></h1>
                    <span class="meta">Posted on  <?php echo $post->getDate()?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <?php echo $post->getText()?>
            </div>
        </div>
    </div>
</article>

<?php if ($_SESSION['role'] != 'unauthorized') : ?>
<!-- Add Comment -->
<hr>
<div class="col-lg-4 col-md-10 mx-auto">
    <form name="newComment" id="new_comment" method="post">
        <div class="control-group">
            <div class="form-group floating-label-form-group controls">
                <label>New Comment</label>
                <textarea rows="2" class="form-control" placeholder="New Comment" id="froala-editor" name="text" required data-validation-required-message="Please enter text."></textarea>
                <p class="help-block text-danger"></p>
            </div>
        </div>
        <br>
        <div id="success"></div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Add Comment</button>
        </div>
    </form>
</div>
<?php endif; ?>

<!-- Comments -->
<?php if (! empty($comments)) : ?>
    <hr>
<?php foreach ($comments as $comment) : ?>
        <br>
    <div class="col-lg-4 col-md-10 mx-auto">
        <div class="card">
            <div class="card-body bg-light">
                <h5 class="card-title"><?php echo $comment['user_name']; ?></h5>
                <p class="card-text"><?php echo $comment['text']; ?></p>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $comment['date']; ?></h6>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php endif; ?>