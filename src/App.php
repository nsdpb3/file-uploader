<?php

namespace nsdpb3;

require_once '../vendor/autoload.php';

use nsdpb3\File\FileFacade;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Создание экземпляра класса FileFacade
    $fileFacade = new FileFacade(__DIR__ . '/../files/');
    // Загрузка файла
    $fileFacade->uploadFile($_FILES['file']);
} else {
    echo 'Данных нет';
}
