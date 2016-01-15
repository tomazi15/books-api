<?php

namespace BooksApi\BookBundle\Repositories;

class TestRepository
{

    public $test;

    public function test()
    {
        $this->test = "You Injected Me";
        return $this->test;
    }

}