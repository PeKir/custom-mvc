<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin Panel</a>
            </li>
            <li class="breadcrumb-item active"><?php echo $title?></li>
        </ol>
        <!-- Icon Cards-->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <?php if (isset($message)) : ?>
                        <p class="<?php echo $messageClass?>"><?php echo $message?></p>
                    <?php endif; ?>
                    <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                    <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                    <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                    <form name="createNewPost" id="createNewPost" method="post" >
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Title</label>
                                <input type="text" class="form-control" placeholder="Title" id="title" name="title" required data-validation-required-message="Please enter title.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Machine name</label>
                                <input type="text" class="form-control" placeholder="Machine name" id="machine_name" name="machine_name" required data-validation-required-message="Please enter machine name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Text</label>
                                <textarea rows="5" class="form-control" placeholder="Text" id="froala-editor" name="text" required data-validation-required-message="Please enter text."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm" id="sendMessageButton">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
    </div>