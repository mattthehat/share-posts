<?php require_once APPROOT . '/views/includes/header.php';?>
    <div class="row">
      <div class="col-md-6">
        <h1 class="text-white">Posts</h1>
      </div>
      <div class="col-md-6">
        <a href="<?=URLROOT;?>/posts/add" class="btn btn-primary float-right">
          <i class="fas fa-pencil-alt"></i> Add Post
        </a>
      </div>
    </div>
    <?php flash('post_message'); ?>
    <div class="row">
    <?php foreach($data['posts'] as $post) : ?>
      <div class="col-md-12">
        <div class="card mb-3">
          <div class="card-body">
            <h4 class="card-title"><?=$post->title?></h1>
            <div class="bg-light p-2 mb-3">
             Written by <?= $post->name ?> on <?= date_format(date_create($post->postCreated),'d/m/Y | H:m');?>
            </div>
            <p class="card-text"><?=$post->body?></p>
            <a href="<?=URLROOT;?>/posts/show/<?=$post->postId?>" class="btn btn-dark">Read More...</a>
          </div>
        </div>  
      </div>    
      <?php endforeach; ?>
    </div>
<?php require_once APPROOT . '/views/includes/footer.php';?>

