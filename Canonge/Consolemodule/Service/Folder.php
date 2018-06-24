<?php


namespace Canonge\Consolemodule\Service;

use function explode;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem\Io\File;
class Folder
{
    protected $_directoryList;
    protected  $_file;

    public function __construct(DirectoryList $directoryList, File $file)
    {
        $this->_directoryList =$directoryList;
        $this->_file = $file;
    }

    public function createFolder($moduleName){
        $tmp = explode('_', $moduleName);
        $filePath = "/code/$tmp[0]/$tmp[1]/etc/";
        $pdfPath = $this->_directoryList->getPath('app').$filePath;
        if (!is_dir($pdfPath)) {
            $ioAdapter = $this->_file;
            $ioAdapter->mkdir($pdfPath, 0775);
        }
    }
}