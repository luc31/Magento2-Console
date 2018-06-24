<?php

namespace Canonge\Consolemodule\Service;

Class Files
{


    public function getComposer(array $name)
    {
        return "
{
    \"name\": \"{$name[0]}/{$name[1]}\",
    \"description\": \"TP1 customer\",
    \"type\": \"magento2-module\",
    \"version\": \"1.0.0\",
    \"license\": [
    \"OSL-3.0\",
    \"AFL-3.0\"
    ],
    \"autoload\": {
        \"files\": [ \"registration.php\" ],
        \"psr-4\": {
      \"{$name[0]}\\\{$name[1]}\\\\\": \"\"
    }
}
}";

    }

    public function getRegistration(array $name)
    {


        return "
    <?php
    \Magento\Framework\Component\ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::MODULE,
    '{$name[0]}_{$name[1]}',
    __DIR__
    );
    ";

    }

    public function getModule(array $name)
    {

        $sring  =  "<?xml version=\"1.0\"?>".PHP_EOL;
        $sring .= "<config xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:noNamespaceSchemaLocation=\"urn:magento:framework:Module/etc/module.xsd\">".PHP_EOL;
        $sring .= "    <module name=\"{$name[0]}_{$name[1]}\" setup_version=\"1.0.0\">".PHP_EOL;
        $sring .= "    </module>".PHP_EOL;
        $sring .= "</config>".PHP_EOL;

        return  $sring;
    }






}