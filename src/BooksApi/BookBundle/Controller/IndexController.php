<?php

namespace BooksApi\BookBundle\Controller;

use BooksApi\BookBundle\Factory\CreateBookFactory;
use BooksApi\BookBundle\Factory\FetchBookFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{
    /**
     * @var CreateBookFactory
     */
    public $create;

    /**
     * @var
     */
    public $fetch;

    /**
     * @param CreateBookFactory $createBookFactory
     * @param FetchBookFactory $fetchBookFactory
     */
    public function __construct(
        CreateBookFactory $createBookFactory,
        FetchBookFactory $fetchBookFactory
    ){
        $this->create = $createBookFactory;
        $this->fetch = $fetchBookFactory;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function createAction(Request $request)
    {
        return new JsonResponse($this->create->build($request));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function fetchAction(Request $request)
    {
        return new JsonResponse($this->fetch->build($request));
    }
}
