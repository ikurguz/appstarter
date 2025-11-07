<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Блог</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= ( base_url() === current_url() ? 'active' : '' ) ?>" aria-current="page" href="<?= base_url() ?>">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ( base_url('blog') === rtrim(current_url(), '/') ? 'active' : '' ) ?>" href="/blog/">Блог</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ( base_url('blog/create') === rtrim(current_url(), '/') ? 'active' : '' ) ?>" href="/blog/create">Добавить запись</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
