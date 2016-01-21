<?php

namespace BooksApi\BookBundle\Response;

/**
 * Class FetchBookResponse
 * @package BooksApi\BookBundle\Response
 */
class FetchBookResponse
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var integer
     */
    public $price;

    /**
     * @var string
     */
    public $description;

    /**
     * @param $title
     * @param $price
     * @param $description
     */
    public function __construct($title, $price, $description)
    {
        $this->title = $title;
        $this->price = $price;
        $this->description = $description;
    }
}