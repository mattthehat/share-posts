<?php require_once APPROOT . '/views/includes/header.php';?>
            <a href="<?=URLROOT?>/posts" class="btn btn-light"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
            <div class="card card-body bg-light mt-5">
                <h2>Add Post</h2>
                <p>Create a post with this form</p>
                <form action="<?=URLROOT?>/posts/add" method="post">
                    <div class="form-group">
                    <label for="title">Title: <sup>*</sup></label>
                    <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_error'])) ? 'is-invalid' : ''?>" value="<?=$data['title']?>">
                    <span class="invalid-feedback"><?=$data['title_error']?></span>
                    </div>
                    <div class="form-group">
                    <label for="password">Body: <sup>*</sup></label>
                    <textarea name="body" class="form-control <?php echo (!empty($data['body_error'])) ? 'is-invalid' : ''?>"><?=$data['body']?></textarea>
                    <span class="invalid-feedback"><?=$data['body_error']?></span>
                    </div>
                    <div class="row">
                    <div class="col">
                    <input type="submit" value="Add Post" class="btn btn-success btn-block">
                    </div>
                    </div>
                </form>
            </div>
<?php require_once APPROOT . '/views/includes/footer.php';?>


