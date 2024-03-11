<?php

namespace nsdpb3\File;

use Exception;

class FileFacade implements FileInterface
{
    /**
     * Путь к директории где будет расположенн файл
     * @var string
     */
    private string $uploadDir;
    /**
     * Максимальный размер файла
     * @var int
     */
    const MAX_SIZE_FILE = 500000;
    /**
     * Текст если файл был загружен
     * @var string
     */
    const TEXT_SUCCESS_UPLOAD = "Файл успешно загружен";
    /**
     * Текст если файл не был загружен
     * @var string
     */
    const TEXT_FAILED_UPLOAD = "Произошла ошибка при загрузке файла";

    public function __construct(string $uploadDir)
    {
        $this->uploadDir = $uploadDir;
    }

    public function uploadFile(array $file): void
    {
        // Путь для загрузки файла
        $uploadFile = $this->uploadDir . basename($file['name']);

        // Вызов операций загрузки, проверки размера и типа файла, перемещения и обработки
        if ($this->checkFile($file) && $this->moveFileInDir($file, $uploadFile)) {
            echo "<div class='circle green'></div> " . self::TEXT_SUCCESS_UPLOAD . ".";
            $this->processFile($uploadFile);
        } else {
            echo "<div class='circle red'></div> " . self::TEXT_FAILED_UPLOAD . ".";
        }
    }
    /**
     * Проверяет файл на его размер и расширение
     * @throws \Exception
     * @return mixed
     */
    private function checkFile(array $file): bool
    {
        $fileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if ($file['size'] > self::MAX_SIZE_FILE) {
            return false;
        } elseif ($fileType !== 'txt'){
            return false;
        }
        return true;
    }
    /**
     * Помещает файл в заданную директорию
     * @param array $file
     * @param mixed $destination
     * @return bool
     */
    private function moveFileInDir(array $file, $destination): bool
    {
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Выводит текст файла построчно и длину каждой строки
     * @param string $file
     * @return void
     */
    private function processFile(string $file): void
    {
        $lines = file($file);
        foreach ($lines as $line) {
            preg_match_all("/\d/", $line, $matches);
            echo "<br>$line = " . count($matches[0]);
        }
    }
}
