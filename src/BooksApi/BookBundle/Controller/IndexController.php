<?php

namespace BooksApi\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BooksApi\BookBundle\Repositories\TestRepository;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    /**
     * @var TestRepository
     */
    public $repo;

    /**
     * @param TestRepository $testRepository
     */
    public function __construct(
        TestRepository $testRepository
    ){
        $this->repo = $testRepository;
    }


    public function testAction()
    {

        return new Response('Hey '. $this->repo->test());

//        return $this->render('BooksApiBookBundle:Default:index.html.twig');
    }
}
