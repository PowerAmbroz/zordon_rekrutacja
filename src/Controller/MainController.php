<?php

namespace App\Controller;

use App\Entity\Orders;
use App\Entity\Realestate;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route ("/post", name="post_data", methods={"POST"})
     * @param Request $request
     * @param Orders $orders
     * @return JsonResponse
     */
    public function postData(Request $request): JsonResponse
    {

        $data = json_decode($request->getContent(), true);

        $emOrders = $this->getDoctrine()->getManager()->getRepository(Orders::class);
        $emRealestate = $this->getDoctrine()->getManager()->getRepository(Realestate::class);

        $orderId = $emOrders->saveOrderData($data);

        $lastOrder = $emOrders->findOneBy(['id'=>$orderId]);

        $emRealestate->saveRealestateData($data, $lastOrder);

        return new JsonResponse(['status' => 'Order Created'], Response::HTTP_CREATED);
    }
}
