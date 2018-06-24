<?php


namespace Canonge\Consolemodule\Service;


interface FileInterface extends FolderInterface
{
    public function read(String $path);

    public function write(String $path,String $text);

}