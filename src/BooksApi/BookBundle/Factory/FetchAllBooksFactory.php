<?php
namespace BooksApi\BookBundle\Factory;

use BooksApi\BookBundle\Repositories\FetchAllBooksRepository;
use Symfony\Component\HttpFoundation\Request;
use BooksApi\BookBundle\Response\FetchBookResponse;
use BooksApi\BookBundle\Response\Response;

class FetchAllBooksFactory implements FactoryInterface{

    /**
     * @var FetchAllBooksRepository
     */
    public $repo;

    /**
     * @param FetchAllBooksRepository $fetchAllBooksRepository
     */
    public function __construct(
        FetchAllBooksRepository $fetchAllBooksRepository
    ){
        $this->repo = $fetchAllBooksRepository;
    }

    /**
     * @param Request $request
     * @return FetchBookResponse|Response
     * @throws \Doctrine\ORM\Query\QueryException
     */
    public function build(Request $request)
    {
        $allBooks = $this->repo->allBooks();

        var_dump($allBooks);die();

        if ($allBooks)
        {
            return new FetchBookResponse(
                $allBooks->title,
                $allBooks->price,
                $allBooks->description
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