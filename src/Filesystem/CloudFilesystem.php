<?php

namespace App\Filesystem;

use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;

class CloudFilesystem extends MyFilesystem
{
    public $dir_name;
    public $dir_type;
    public $dir_contents;

    public function __construct()
    {
        $client = S3Client::factory([
            'credentials' => [
                'key' => getenv('AWS_KEY'),
                'secret' => getenv('AWS_SECRET'),
            ],
            'region' => getenv('AWS_REGION'),
            'version' => 'latest',
        ]);

        $bucket = getenv('AWS_BUCKET');

        $adapter = new AwsS3Adapter($client, $bucket);

        parent::__construct($adapter);
    }
}
