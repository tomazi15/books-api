<?php

namespace BooksApi\BookBundle\Factory;

use BooksApi\BookBundle\Repositories\DeleteBookRepository;
use Symfony\Component\HttpFoundation\Request;
use BooksApi\BookBundle\Response\Response;

class DeleteBookFactory {

    public $repo;

    public function __construct(
        DeleteBookRepository $deleteBookRepository
    ){
        $this->repo = $deleteBookRepository;
    }

    public function build(Request $request)
    {
        $id = $request->get('id');

        $deleteBook = $this->repo->deleteBook($id);

        if ($deleteBook)
        {
            return new Response
            (
                true,
                'Book Successfully Deleted'
            );
        } else {
            return new Response
            (
                false,
                'Unable to Delete Book'
            );
        }

    }


} 