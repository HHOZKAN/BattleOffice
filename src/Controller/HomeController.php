<?php

namespace App\Controller;




use App\Entity\Order;
use App\Form\OrderType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/confirmation', name: 'app_confirmation')]
    public function confirmation(): Response
    {
        return $this->render('home/confirmation.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


    #[Route('/emails', name: 'app_emails')]
    public function emails(): Response
    {
        return $this->render('emails/confirmation.html.twig', [
            'controller_name' => 'EmailsController',
        ]);
    }

    public function orders(EntityManager $entityManager, Request $request): Response 
    {
   // Crée une nouvelle instance d'Order
   $order = new Order();

   // Crée un formulaire basé sur OrderType
   $formOrder = $this->createForm(OrderType::class, $order);

   // Traite la soumission du formulaire
   $formOrder->handleRequest($request);

   if ($formOrder->isSubmitted() && $formOrder->isValid()) {
    //    $paymentMethod = $order->getPaymentMethod();
       $client = $order->getClient();
       $addressBilling = $order->getAddressBilling();
       $addressShipping = $order->getAddressShipping();

       $entityManager->persist($order);
       $entityManager->flush();

       return $this->redirectToRoute('app_home');
   }
        return $this->render('home/index.html.twig', [
            'order' => $order,
            'formOrder' => $formOrder
        ]);
}
}

