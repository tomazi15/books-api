<?php

namespace BooksApi\BookBundle\Factory;

use BooksApi\BookBundle\Repositories\FetchBookRepository;
use Symfony\Component\HttpFoundation\Request;
use BooksApi\BookBundle\Response\FetchBookResponse;
use BooksApi\BookBundle\Response\Response;


class FetchBookFactory implements FactoryInterface
{
    /**
     * @var FetchBookRepository
     */
    public $repo;

    /**
     * @param FetchBookRepository $fetchBookRepository
     */
    public function __construct(
        FetchBookRepository $fetchBookRepository
    ){
        $this->repo = $fetchBookRepository;
    }

    /**
     * @param Request $request
     * @return FetchBookRepository
     * @throws \Doctrine\ORM\Query\QueryException
     */
    public function build(Request $request)
    {
        $id = $request->get('id');

        $fetchBook = $this->repo->fetchBook($id);

        if ($fetchBook)
        {
            return new FetchBookResponse(
                $fetchBook->title,
                $fetchBook->price,
                $fetchBook->description
            );
        } else if (empty($fetchBook)) {
            return new Response
            (
              false,
              'Could not find requested Book'
            );
        }
    }
}