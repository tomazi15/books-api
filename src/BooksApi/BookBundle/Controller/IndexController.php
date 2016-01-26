<?php

namespace BooksApi\BookBundle\Controller;

use BooksApi\BookBundle\Factory\CreateBookFactory;
use BooksApi\BookBundle\Factory\FetchBookFactory;
use BooksApi\BookBundle\Factory\UpdateBookFactory;
use BooksApi\BookBundle\Factory\DeleteBookFactory;
use BooksApi\BookBundle\Factory\FetchAllBooksFactory;
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
     * @var DeleteBookFactory
     */
    public $delete;

    /**
     * @var FetchAllBooksFactory
     */
    public $all;

    /**
     * @param CreateBookFactory $createBookFactory
     * @param FetchBookFactory $fetchBookFactory
     * @param UpdateBookFactory $updateBookFactory
     * @param DeleteBookFactory $deleteBookFactory
     * @param FetchAllBooksFactory $fetchAllBooksFactory
     */
    public function __construct(
        CreateBookFactory $createBookFactory,
        FetchBookFactory $fetchBookFactory,
        UpdateBookFactory $updateBookFactory,
        DeleteBookFactory $deleteBookFactory,
        FetchAllBooksFactory $fetchAllBooksFactory
    ){
        $this->create = $createBookFactory;
        $this->fetch = $fetchBookFactory;
        $this->update = $updateBookFactory;
        $this->delete = $deleteBookFactory;
        $this->all =$fetchAllBooksFactory;
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

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function updateAction(Request $request)
    {
        return new JsonResponse($this->update->build($request));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteAction(Request $request)
    {
        return new JsonResponse($this->delete->build($request));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function allAction(Request $request)
    {
        return new JsonResponse($this->all->build($request));
    }
}