<?php
namespace BooksApi\BookBundle\Response;

class FetchAllBooksResponse {

    /**
     * @var array
     */
    public $books = array();

    /**
     * @param array $books
     */
    public function __construct(array $books)
    {
        $this->books = $books;
    }

} 