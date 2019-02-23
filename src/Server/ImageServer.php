<?php

namespace App\Server;

use App\Filesystem\CloudFilesystem;
use App\Filesystem\LocalFilesystem;
use League\Glide\ServerFactory;
use League\Glide\Responses\SymfonyResponseFactory;

class ImageServer
{
    public $server;

    private $presets = [
        'small' => [
            'w' => 350,
        ],
        'medium' => [
            'w' => 800,
        ],
        'large' => [
            'w' => 2560,
        ],
    ];

    public function __construct(CloudFilesystem $cloud, LocalFilesystem $local)
    {
        $this->server = ServerFactory::create([
            'source' => $cloud,
            'cache' => $local,
            'driver' => 'imagick',
            'presets' => $this->presets,
            'max_image_size' => 2560 * 1400,
            'response' => new SymfonyResponseFactory(),
        ]);
    }
}
