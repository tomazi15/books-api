<?php
namespace BooksApi\BookBundle\Factory;

use Symfony\Component\HttpFoundation\Request;

interface FactoryInterface {

    /**
     * @param Request $request
     */
    public function build(Request $request);

} 