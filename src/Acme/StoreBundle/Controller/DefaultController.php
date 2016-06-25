<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Acme\StoreBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/store")
     */
    public function indexAction()
    {
        return $this->render('AcmeStoreBundle:Default:index.html.twig');
    }

    /**
     * @Route("/store/create")
     */
    public function createAction()
    {
        $product = new Product();
        $product->setName('A Foo Bar');
        $product->setPrice('19.99');
        $product->setDescription('Lorem ipsum dolor');

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($product);
        $em->flush();

        return new Response('Created product id ' . $product->getId());
    }

    /**
     * @Route("/store/product/{id}")
     * @param integer $id
     */
    public function showAction($id)
    {
        $product = $this->getDoctrine()
            ->getRepository('AcmeStoreBundle:Product')
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException('No product found for id ' . $id);
        }

        /*
        // プライマリーキー(通常は"id")でクエリ
        $product = $repository->find($id);

        // あるカラム値に基づいて find する、動的なメソッド名
        $product = $repository->findOneById($id);
        $product = $repository->findOneByName('foo');

        // *すべて* の商品を find
        $products = $repository->findAll();

        // 任意のカラム値に基づく、商品群の find
        $products = $repository->findByPrice(19.99);

        // name と price の両方にマッチする1つの商品を取得するクエリ
        $product = $repository->findOneBy(array('name' => 'foo', 'price' => 19.99));

        // name にマッチするすべての商品を price 順で取得するクエリ
        $product = $repository->findBy(
            array('name' => 'foo'),
            array('price' => 'ASC')
        );
        */
        // do something, like pass the $product object into a template
    }
}
