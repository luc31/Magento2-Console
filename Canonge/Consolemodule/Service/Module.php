<?php


namespace Canonge\Consolemodule\Service;


use Psr\Log\LoggerInterface;

class Module
{
    protected $_folder;

    protected $_file;

    protected $_logger;

    public function __construct(Folder $folder, File $file,
        LoggerInterface $logger
    ) {
        $this->_file = $file;
        $this->_folder = $folder;
        $this->_logger = $logger;

    }

    public function createModule(String $moduleName)
    {
        $this->_logger->alert("Loulou");
        $this->_folder->createFolder($moduleName);
        $this->_file->createFile($moduleName);

    }

}