<?php
$jiri_insert_statement = $db->prepare('INSERT INTO jiri.jiris(name,starting_at) VALUES (:name, :starting_at)');
$jiris = [
    ['id' => '1', 'name' => 'Projets Web 2025', 'starting_at' => '2024-01-19 08:30:00'],
    ['id' => '2', 'name' => 'Design Web 2024', 'starting_at' => '2024-06-19 08:30:00'],
    ['id' => '3', 'name' => 'Projets Web 2024', 'starting_at' => '2025-01-19 08:30:00'],
    ['id' => '4', 'name' => 'Design Web 2023', 'starting_at' => '2023-06-19 08:30:00'],
];
foreach ($jiris as $jiri) {
    $jiri_insert_statement->bindValue('name', $jiri['name']);
    $jiri_insert_statement->bindValue('starting_at', $jiri['starting_at']);
    $jiri_insert_statement->execute();
}
echo 'Jiri table seeded' . PHP_EOL;