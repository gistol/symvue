<?php

namespace App\Controller;

use App\Server\URLBuilder;
use Symfony\Component\Cache\Simple\PhpFilesCache;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("api/", name="api")
 */
class ApiController extends MyController
{
    /**
     * @Route("album/{album_name}/{size}", name="_album")
     *
     * @param URLBuilder $photos
     * @param string     $album_name
     * @param string     $size
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function jsonAlbum(URLBuilder $URLBuilder, string $album_name, $size = null)
    {
        try {
            $cache = new PhpFilesCache('album', 86400, $this->getParameter('app.storage_dir').'api');

            if (!$cache->has('json.album.'.$album_name.$size)) {
                $URLBuilder->getAlbum($album_name, 'photos', $size);

                $cache->set('json.album.'.$album_name.$size, $URLBuilder->album);
            }

            return $this->json($cache->get('json.album.'.$album_name.$size));
        } catch (\Exception $e) {
            return $this->json(['album' => $e->getMessage()]);
        }
    }
}
