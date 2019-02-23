<?php

namespace App\Controller;

use App\Server\ImageServer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use League\Glide\Signatures\SignatureFactory;
use League\Glide\Signatures\SignatureException;

/**
 * @Route("img/", name="photo")
 */
class ImageController extends MyController
{
    /**
     * @Route("{album}/{id}", name="_load")
     *
     * @param ImageServer $image
     * @param Request     $request
     * @param string      $album
     * @param mixed       $id
     *
     * @return Response
     */
    public function loadImage(ImageServer $image, Request $request, $album, $id)
    {
        try {
            $signkey = getenv('IMG_KEY');
            SignatureFactory::create($signkey)->validateRequest($request->getPathInfo(), $request->query->all());

            return $image->server->getImageResponse(join('/', [$album, $id]), ['p' => $request->query->get('p')]);
        } catch (SignatureException $e) {
            return new Response('Signature error', 500);
        } catch (\Exception $e) {
            return new Response('Can\'t load album', 500);
        }
    }
}
