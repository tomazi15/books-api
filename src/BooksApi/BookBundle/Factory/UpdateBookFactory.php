<?php

namespace BooksApi\BookBundle\Factory;

use BooksApi\BookBundle\Repositories\UpdateBookRepository;
use Symfony\Component\HttpFoundation\Request;
use BooksApi\BookBundle\Response\Response;

class UpdateBookFactory implements FactoryInterface
{
    public $repo;

    public function __construct(
        UpdateBookRepository $updateBookRepository
    ){
        $this->repo = $updateBookRepository;
    }

    public function build(Request $request)
    {
        $id = $request->get('id');
        $update = $request->get('update');

        $updateBook = $this->repo->updateBook($id, $update);

        if ($updateBook)
        {
            return new Response
            (
              true,
              'Book Succesfully Updated'
            );
        } else {
            return new Response
            (
              false,
              'Unable to Update Book'
            );
        }

    }
} 