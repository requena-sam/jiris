<?php
function dd(mixed $var): void
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die();
}

function view(string $path, array $data): void
{
    extract($data);
    $fragements = explode(".", $path);
    require base_path("/resources/views/{$fragements[0]}/{$fragements[1]}.view.php");
}

function base_path(string $path): string
{
    return BASE_PATH . $path;
}