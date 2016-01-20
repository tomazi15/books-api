<?php

namespace BooksApi\BookBundle\Controller;

use BooksApi\BookBundle\Factory\CreateBookFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

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
     * @param Request $request
     * @return JsonResponse
     */
    public function createAction(Request $request)
    {
        return new JsonResponse($this->build->build($request));
    }
}
