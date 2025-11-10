<div class="alert alert-danger my-3" role="alert">
    <ul class="list-unstyled">
        <?php foreach ($errors as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
</div>