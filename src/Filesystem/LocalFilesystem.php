<?php

namespace App\Filesystem;

use League\Flysystem\Adapter\Local;

class LocalFilesystem extends MyFilesystem
{
    public function __construct($appStorage)
    {
        parent::__construct(new Local($appStorage.'img/'));
    }
}
