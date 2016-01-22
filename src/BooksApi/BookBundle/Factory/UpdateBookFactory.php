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

    }
} 