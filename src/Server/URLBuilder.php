<?php

namespace App\Server;

use App\Filesystem\CloudFilesystem;
use League\Glide\Urls\UrlBuilderFactory;

class URLBuilder
{
    private $cloud;
    private $urlBuilder;
    public $album = [];
    private $presets = ['small', 'medium', 'large'];

    public function __construct(CloudFilesystem $cloud)
    {
        $this->cloud = $cloud;

        $signkey = getenv('IMG_KEY');

        $this->urlBuilder = UrlBuilderFactory::create('/img/', $signkey);
    }

    public function getAlbum($album_name, $type, $size): bool
    {
        $this->cloud->setDir($album_name, $type);

        $this->cloud->listDirContents();

        $this->albumDisplay($size);

        return true;
    }

    public function albumDisplay($size): bool
    {
        if ('all' != $size && !is_null($size)) {
            foreach ($this->cloud->dir_contents as $r) {
                $path = $this->urlBuilder->getUrl(join('/', [$this->cloud->dir_name, $r['basename']]), ['p' => $size]);

                $this->album['album'][] = ['name' => $r['basename'],
                    'path' => [$size => $path], ];
            }
        } else {
            foreach ($this->cloud->dir_contents as $r) {
                $arr = ['name' => $r['basename'],
                    'path' => [], ];

                foreach ($this->presets as $p) {
                    $path = $this->urlBuilder->getUrl(join('/', [$this->cloud->dir_name, $r['basename']]), ['p' => $p]);

                    $arr['path'][$p] = $path;
                }

                $this->album['album'][] = $arr;
            }
        }

        return true;
    }
}
