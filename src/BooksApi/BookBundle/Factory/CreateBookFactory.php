<?php

namespace BooksApi\BookBundle\Factory;

use BooksApi\BookBundle\Repositories\CreateBookRepository;
use Symfony\Component\HttpFoundation\Request;

class CreateBookFactory
{
    public $repo;

    public function __construct(
        CreateBookRepository $createBookRepository
    ){
        $this->repo = $createBookRepository;
    }

    public function build(Request $request)
    {



        $reault = $this->repo->createBook(
            $request->get('title'),
            $request->get('price'),
            $request->get('')
        );

    }

}