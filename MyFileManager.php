<?php

/**
 * Class MyFileManager Файловый менеджер.
 *
 * @author A. Suvorkin
 */
class MyFileManager
{
    /**
     * Проверка расширения файла.
     *
     * @param $file
     * @return bool
     */
    private function checkExtension($file)
    {
        $info = pathinfo($file);

        if($info['extension'] === 'ixt') {
            return true;
        }

        return false;
    }

    /**
     * Проверка имени файла.
     *
     * @param $file
     * @return bool
     */
    private function checkName($file)
    {
        if(preg_match('/([A-z])+([1-9])/', $file)) {
            return true;
        }

        return false;
    }

    /**
     * Сортировка файлов.
     *
     * @return array
     */
    public function sort()
    {
        $files = $this->all();
        $sortFiles = [];

        foreach ($files as $file) {
            if($this->checkExtension($file) && $this->checkName($file)) {
                $sortFiles[] = $file;
            }
        }

        return $sortFiles;
    }


    /**
     * Все файлы
     *
     * @return array
     */
    public function all()
    {
        $directory = './datafiles';
        $files = scandir($directory);

        return $files;
    }
}