<?php


namespace Canonge\Consolemodule\Service;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem\Io\File as FileC;
use Canonge\Consolemodule\Service\Files;

class File
{

    protected $_directoryList;
    protected  $_file;
    protected $_content;


    public function __construct(
        DirectoryList $directoryList,
        FileC $file,
        Files $content
        )
    {
        $this->_directoryList =$directoryList;
        $this->_file = $file;
        $this->_content = $content;

    }

    public function createFile($moduleName){
        $tmp = explode('_', $moduleName);
        $filePath = "/code/$tmp[0]/$tmp[1]/";
        $filePathModule = "/code/$tmp[0]/$tmp[1]/etc/";
        $pdfPath = $this->_directoryList->getPath('app').$filePath;
        $pdfPathModule = $this->_directoryList->getPath('app').$filePathModule;
        $fileModule = "module.xml";
        $fileRegistration = "registration.php";
        $fileComposer = "composer.json";
        $ioAdapter = $this->_file;
        $ioAdapter->open(array('path'=>$pdfPath));
        $ioAdapter->write($fileRegistration, $this->_content->getRegistration($tmp), 0666);
        $ioAdapter->write($fileComposer, $this->_content->getComposer($tmp), 0666);
        $ioAdapter->close();
        $ioAdapter->open(array('path'=>$pdfPathModule));
        $ioAdapter->write($fileModule, $this->_content->getModule($tmp), 0666);
        $ioAdapter->close();
    }


}