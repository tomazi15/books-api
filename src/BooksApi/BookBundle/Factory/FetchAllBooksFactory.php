<?php
namespace BooksApi\BookBundle\Factory;

use BooksApi\BookBundle\Repositories\FetchAllBooksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BooksApi\BookBundle\Response\FetchAllBooksResponse;
use BooksApi\BookBundle\Response\Response;

class FetchAllBooksFactory extends Controller implements FactoryInterface
{

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
        $response = $this->formatBooks($allBooks);

        if ($allBooks)
        {
            return new FetchAllBooksResponse
            (
                $response
            );
        } else if (empty($fetchBook)) {
            return new Response
            (
                false,
                'Could not find requested Book'
            );
        }

    }

    public function formatBooks(array $books)
    {
        $result = array();
        foreach ($books as $book)
        {
            $result[] = $book;
        }
        return $result;
    }
} 