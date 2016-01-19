<?php

namespace BooksApi\BookBundle\Repositories;

use BooksApi\BookBundle\Entity\BooksEntity;
use Doctrine\ORM\EntityManager;

class CreateBookRepository
{
    public $em;

    public $book;

    public function __construct(
        EntityManager $entityManager
    ){
        $this->em = $entityManager;
    }

    public function createBook()
    {
        $this->book = new BooksEntity();
        $this->book->setTitle('Tomazi in da Jungle');
        $this->book->setPrice('19.99');
        $this->book->setDescription('Lorem ipsum dolor');

        $this->em->persist($this->book);
        $this->em->flush();
    }

}