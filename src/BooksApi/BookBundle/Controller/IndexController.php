<?php

namespace BooksApi\BookBundle\Controller;

use BooksApi\BookBundle\Factory\CreateBookFactory;
use BooksApi\BookBundle\Factory\FetchBookFactory;
use BooksApi\BookBundle\Factory\UpdateBookFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{
    /**
     * @var CreateBookFactory
     */
    public $create;

    /**
     * @var FetchBookFactory
     */
    public $fetch;

    /**
     * @var UpdateBookFactory
     */
    public $update;

    /**
     * @param CreateBookFactory $createBookFactory
     * @param FetchBookFactory $fetchBookFactory
     * @param UpdateBookFactory $updateBookFactory
     */
    public function __construct(
        CreateBookFactory $createBookFactory,
        FetchBookFactory $fetchBookFactory,
        UpdateBookFactory $updateBookFactory
    ){
        $this->create = $createBookFactory;
        $this->fetch = $fetchBookFactory;
        $this->update = $updateBookFactory;
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

    public function updateAction(Request $request)
    {
        return new JsonResponse($this->update->build($request));
    }
}
