<?php

namespace App\Controller;

use App\Entity\Media;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Vich\UploaderBundle\Handler\UploadHandler;

#[AsController]
final class CreateMediaObjectAction extends AbstractController
{
    private UploadHandler $uploadHandler;

    public function __construct(UploadHandler $uploadHandler)
    {
        $this->uploadHandler = $uploadHandler;
    }

    public function __invoke(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $uploadedFile = $request->files->get('file');

        // Rend le champ obligatoire
        if (!$uploadedFile) {
            throw new BadRequestHttpException('"file" is required');
        }

        $media = new Media();
        $media->file = $uploadedFile;

        // Utiliser le gestionnaire de téléchargement pour gérer le fichier
        $this->uploadHandler->upload($media, 'file');

        // Définir la propriété path
        $media->setPath($media->getFilePath());

        $em->persist($media);
        $em->flush();

        return new JsonResponse([
            'status' => 'success',
            'media' => [
                'id' => $media->getId(),
                'path' => $media->getPath(),
            ]
        ], 201);
    }
}