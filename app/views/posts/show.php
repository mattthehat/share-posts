<?php require_once APPROOT . '/views/includes/header.php';?>
<a href="<?=URLROOT?>/posts" class="btn btn-light"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
<hr>
<h1 class="text-white"><?=$data['post']->title?></h1>
<div class="bg-secondary text-white p-2 mb-3">
<p class="pull-left">Written by: <?=$data['user']->name;?> On: <?= date_format(date_create($data['post']->created_at) ,'d/m/Y | H:m');?></p>
<hr>
<p><?=$data['post']->body;?></p>
</div>
<?php if($data['post']->user_id == $_SESSION['user_id']) : ?>
  <div class="row">
    <div class="col">
      <a href="<?=URLROOT?>/posts/edit/<?= $data['post']->id; ?>" class="btn btn-primary">Edit?</a>
    </div>
    <div class="col">
    <form action="<?=URLROOT?>/posts/delete/<?= $data['post']->id; ?>" method="post">
    <input type="submit" class="btn btn-danger float-right" value="Delete?">
    </form>
    </div>
  </div>  
<?php endif ?>
<?php require_once APPROOT . '/views/includes/footer.php';?>