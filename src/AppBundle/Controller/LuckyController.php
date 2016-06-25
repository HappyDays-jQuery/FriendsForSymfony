<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number/")
     * @return Response
     */
    public function numberAction()
    {
        $number = rand(0, 100);

        $html = $this->container->get('templating')->render(
            'lucky/number.html.twig',
            ['luckyNumberList' => $number]
        );

        return new Response($html);
    }

    /**
     * @Route("/lucky/number/{count}")
     * @param integer $count
     * @return Response
     */
    public function numberCountAction($count)
    {
        $numbers = [];
        for ($i = 0; $i < $count; $i++) {
            $numbers[] = rand(0, 100);
        }
        $numbersList = implode(', ', $numbers);
        $html = $this->container->get('templating')->render(
            'lucky/number.html.twig',
            ['luckyNumberList' => $numbersList]
        );

        return new Response($html);
    }

    /**
     * @Route("/api/lucky/number")
     */
    public function apiNumberAction()
    {
        $data = ['lucky_number' => rand(0, 100)];

        return new JsonResponse($data);
    }
}
