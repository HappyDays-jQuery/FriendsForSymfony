<?php

namespace Acme\StoreBundle\Controller;

use Acme\StoreBundle\Entity\Category;
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
        $category = new Category();
        $category->setName('Main Products');

        $product = new Product();
        $product->setName('Foo');
        $product->setPrice(19.99);
        $product->setDescription('Lorem ipsum dolor');
        // この商品をカテゴリに関連付ける
        $product->setCategory($category);

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($category);
        $em->persist($product);
        $em->flush();

        return new Response(
            'Created product id: '.$product->getId().' and category id: '.$category->getId()
        );
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

    /**
     * @Route("/store/product/{id}/update")
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $product = $em->getRepository('AcmeStoreBundle:Product')->find($id);

        if (!$product) {
            throw $this->createNotFoundException('No product found for id ' . $id);
        }

        $product->setName('New product name!');
        $em->flush();

        return $this->redirect($this->generateUrl('homepage'));
    }
}
