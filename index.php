<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регулярные выражения</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php require_once 'MyFileManager.php'; ?>

<?php

    /** @var MyFileManager $manager */
    $manager = new MyFileManager();

    if(!empty($_GET['sort']) && $_GET['sort'] === 'true') {
        $files = $manager->filter();
    } else {
        $files = $manager->all();
    }

?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Список файлов</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="/" method="get">
                <input type="hidden" name="sort" value="true">
                <div class="form-group">
                    <label for="sort">Имена которых состоят из цифр и букв латинского алфавита.</label>
                </div>
                <input type="submit" class="btn btn-primary" id="sort" value="Отсортировать">
                <a href="/" class="btn btn-danger">Отменить</a>
            </form>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <ul class="list-group">
                <?php foreach ($files as $file): ?>
                    <li class="list-group-item">
                        <?php echo $file; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

</body>
</html>