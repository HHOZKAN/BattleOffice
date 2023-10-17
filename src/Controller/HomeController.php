<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Country;
use App\Entity\Order;
use App\Form\OrderType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]

    public function orders(Client $client, EntityManagerInterface $entityManagerInterface, Request $request): Response
    {
        // Crée une nouvelle instance d'Order
        $order = new Order();

        $country = new Country();

        $order->setClient($client);
        
        

        // Crée un formulaire basé sur OrderType
        $form = $this->createForm(OrderType::class, $order);

        // Traite la soumission du formulaire
        $form->handleRequest($request);
        // dd($order);

        if ($form->isSubmitted() ) {
            //    $paymentMethod = $order->getPaymentMethod();
            $addressBilling = $order->getAddressBilling();
            
            $addressShipping = $order->getAddressShipping();

            $entityManagerInterface->persist($client);
            $entityManagerInterface->persist($order);
            $entityManagerInterface->flush();
            // dd($entityManagerInterface);

            return $this->redirectToRoute('app_home');
        }
        return $this->render('home/index.html.twig', [
            'order' => $order,
            'form' => $form->createView()
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


}
