<?php

namespace BooksApi\BookBundle\Response;

class Response
{

    /**
     * @var boolean
     */
    public $success;

    /**
     * @var string
     */
    public $message;

    public function __construct($success, $message)
    {
            $this->success = $success;
            $this->message = $message;
    }
}

