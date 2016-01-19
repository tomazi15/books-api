<?php

namespace BooksApi\BookBundle\Controller;

use BooksApi\BookBundle\Factory\CreateBookFactory;
use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\HttpFoundation\Request;

class IndexController
{
    /**
     * @var CreateBookFactory
     */
    public $build;

    /**
     * @param CreateBookFactory $createBookFactory
     */
    public function __construct(
        CreateBookFactory $createBookFactory
    ){
        $this->build = $createBookFactory;
    }

    /**
     * @return JsonResponse
     */
    public function createAction()
    {
        $this->build->build();
        return new Response('Hey am Here');
    }
}
