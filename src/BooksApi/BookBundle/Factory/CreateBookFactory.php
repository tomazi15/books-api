<?php

namespace BooksApi\BookBundle\Factory;

use BooksApi\BookBundle\Repositories\CreateBookRepository;
use Symfony\Component\HttpFoundation\Request;
use BooksApi\BookBundle\Response\Response;

class CreateBookFactory
{
    /**
     * @var CreateBookRepository
     */
    public $repo;

    /**
     * @var bool
     */
    public $createBook;

    /**
     * @param CreateBookRepository $createBookRepository
     */
    public function __construct(
        CreateBookRepository $createBookRepository
    ){
        $this->repo = $createBookRepository;
    }

    /**
     * @param Request $request
     * @return Response
     * @throws \Doctrine\ORM\Query\QueryException
     */
    public function build(Request $request)
    {

        $title = $request->get('title');
        $price = $request->get('price');
        $description = $request->get('description');

        $this->createBook = $this->repo->createBook(
            $title,
            $price,
            $description
        );

        if($this->createBook)
        {
            return new Response(
                true,
                'New Book Sucesfully Stored'

            );
        } else {
            return new Response (
                false,
                'Could Not Store New Book'
            );
        }
    }
}