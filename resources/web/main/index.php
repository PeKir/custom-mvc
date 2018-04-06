<!-- Page Header -->
<header class="masthead" style="background-image: url('/resources/templates/default/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</b></span>
                    <span class="subheading"><b><?php echo $title; ?></b></span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php foreach ($posts as $post): ?>
            <div class="post-preview">
                <a href="/post/<?php echo $post['machine_name']?>">
                    <h2 class="post-title">
                    <?php echo $post['title']?>
                    </h2>
                </a>
                <p class="post-meta">Posted on
                    <?php echo $post['date']?>
                </p>
            </div>
            <hr>
            <?php endforeach; ?>

            <!-- Pager -->
            <?php echo $pagination ?>
        </div>
    </div>
</div>

