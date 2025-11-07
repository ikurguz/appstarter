<div class="card" style="width: 18rem;">
  <img src="https://lipsum.app/640x480/" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title"><?= $post['title'] ?></h5>
    <p class="card-text"> <?= $post['excerpt'] ?></p>
    <a href="<?= base_url("/blog/{$post['id']}") ?>" class="btn btn-primary">Подробнее</a>
    <div class="float-end">
      <a href="<?= route_to('blog_edit', $post['id']) ?>" class="link-primary">edit</a>
      <a href="<?= route_to('blog_delete', $post['id']) ?>" class="link-danger">delete</a>
    </div>
  </div>
</div>