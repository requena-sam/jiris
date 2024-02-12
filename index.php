<?php
$jiris = [
    ['id' => '1', 'name' => 'Projets Web 2025', 'date' => ''],
    ['id' => '2', 'name' => 'Design Web 2024', 'date' => ''],
    ['id' => '3', 'name' => 'Projets Web 2024', 'date' => ''],
    ['id' => '4', 'name' => 'Design Web 2023', 'date' => ''],
];
//Filtrages des Jiris globaux en fonction de la date
$upcoming_jiris = [$jiris[0], $jiris[1],];
$passed_jiris = [$jiris[2], $jiris[3]];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="flex flex-col-reverse gap-4 container mx-auto">
    <main class="flex flex-col gap-4">
        <h1>Les Jiris</h1>
        <section>
            <h2>Jiris à venir</h2>
            <?php if (count($upcoming_jiris) > 0): ?>
                <ol>
                    <?php foreach ($upcoming_jiris as $jiri): ?>
                        <li><a class="text-blue-500 underline" href="/jiris/<?= $jiri['id'] ?>"><?= $jiri['name'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ol>
            <?php else: ?>
                <p> Il n'y a pas de jir archivé</p>
            <?php endif ?>
        </section>
        <section>
            <h2>Jiris passés</h2>
            <?php if (count($passed_jiris) > 0): ?>
                <ol>
                    <?php foreach ($passed_jiris as $jiri): ?>
                        <li><a class="text-blue-500 underline" href="/jiris/<?= $jiri['id'] ?>"><?= $jiri['name'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ol>
            <?php else: ?>
                <p> Il n'y a pas de jir archivé</p>
            <?php endif ?>
        </section>
    </main>
    <nav>
        <h2 class="sr-only">Menu Principale</h2>
        <ul class="flex gap-4">
            <li><a href="/jiris">Jiris</a></li>
            <li><a href="/contacts">Contacts</a></li>
            <li><a href="/projets">Projets</a></li>
        </ul>
    </nav>
</div>
</body>
</html>