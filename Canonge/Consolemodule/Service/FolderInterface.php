<?php

namespace Canonge\Consolemodule\Service;

interface FolderInterface
{
    public function create(String $name, String $path);

    public function delete(String $path);

    public function rename(String $newName, String $path);
}