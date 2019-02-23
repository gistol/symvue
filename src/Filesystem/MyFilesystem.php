<?php

namespace App\Filesystem;

use League\Flysystem\Filesystem;
use Doctrine\Common\Collections\ArrayCollection;

abstract class MyFilesystem extends Filesystem
{
    public $dir_name;
    public $dir_type;
    public $dir_contents;

    public function setDir(string $name, $type=null)
    {
        $this->dir_name = $name;
        $this->dir_type = $type;
    }

    public function listDirContents()
    {
        $fetch_dir = $this->listContents($this->dir_name, true);

        if ($fetch_dir == []) {
            throw new \Exception('Directory not found');
        }

        $fetch_dir = new ArrayCollection($fetch_dir);

        $dir_files = $fetch_dir->filter(function ($k) {
            return 'dir' != $k['type'];
        });

        $contents = [];

        foreach ($dir_files as $files) {
            if (isset($this->dir_type)) {
                $pic_types = ['jpg', 'jpeg', 'gif', 'png'];

                foreach ($pic_types as $p) {
                    if ($files['extension'] == $p) {
                        $contents[$files['basename']] = $files;
                    }
                }
            } else {
                $contents[$files['basename']] = $files;
            }
        }

        $this->dir_contents = $contents;
    }
}
