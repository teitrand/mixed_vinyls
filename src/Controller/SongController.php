<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController {
	#[Route('/api/songs/{id<\d+>}', methods: ['GET'])]
	public function getSong(int $id, LoggerInterface $logger): Response{
		// TODO Query the database
		
		$song = [
			'id' => $id,
			'name' => 'Waterfalls',
			'url' => 'https://symfonycast.s3.amazonaws.com/sample.mp3',
		];
		
		$logger->info('Returning API responses for {{song}}', [
			'song' => $id
		]);
		//return new JsonResponse($song);
		return $this->json($song);
	}
}
