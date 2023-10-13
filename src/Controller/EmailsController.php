<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/emails')]
class EmailsController extends AbstractController
{
    #[Route('/', name: 'app_emails')]
    public function index(): Response
    {
        return $this->render('emails/confirmation.html.twig', [
            'controller_name' => 'EmailsController',
        ]);
    }
}
