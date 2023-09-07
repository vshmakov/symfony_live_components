<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class TaskController extends AbstractController
{
    #[Route('/task', name: 'tasks')]
    public function index(): Response
    {
        return $this->render('task/index.html.twig');
    }
}
