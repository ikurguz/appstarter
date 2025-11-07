<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= isset($title) ? esc($title) . ' - Мой сайт' : 'Мой сайт' ?>
    </title>

    <!-- Общие стили для всего сайта -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background: #f4f4f4;
        }

        .header {
            background: #2c3e50;
            color: white;
            padding: 1rem 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .nav {
            display: flex;
            gap: 20px;
        }

        .nav a {
            color: white;
            text-decoration: none;
            padding: 5px 10px;
        }

        .nav a:hover {
            background: #34495e;
            border-radius: 3px;
        }

        .main-content {
            background: white;
            padding: 30px;
            margin: 20px 0;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .footer {
            background: #34495e;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 30px;
        }
    </style>

    <!-- Дополнительные CSS/JS для конкретной страницы -->
    <?= $this->renderSection('head_assets') ?>
</head>

<body>
    <!-- Шапка сайта (общая для всех страниц) -->
    <header class="header">
        <?= $this->include('incs/menu') ?>
    </header>

    <!-- Основное содержимое (меняется на каждой странице) -->
    <main class="container">
        <div class="main-content">
            <?= $this->renderSection('content') ?>
        </div>
    </main>

    <!-- Подвал сайта (общий для всех страниц) -->
    <footer class="footer">
        <div class="container">
            <p>&copy; <?= date('Y') ?> Мой сайт. Все права защищены.</p>
            <?= $this->renderSection('footer_content') ?>
        </div>
    </footer>

    <!-- Дополнительные JS скрипты -->
    <?= $this->renderSection('scripts') ?>
</body>

</html>