<?php

namespace nsdpb3\File;

interface FileInterface
{
    /**
     * Загружает файл в директорию
     * @param array $file Файл
     * @return void
     */
    public function uploadFile(array $file): void;
}
