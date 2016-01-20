<?php

namespace BooksApi\BookBundle\Repositories;

use BooksApi\BookBundle\Entity\BooksEntity;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\QueryException;

/**
 * Class CreateBookRepository
 * @package BooksApi\BookBundle\Repositories
 */
class CreateBookRepository
{
    /**
     * @var EntityManager
     */
    public $em;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(
        EntityManager $entityManager
    ){
        $this->em = $entityManager;
    }

    /**
     * @param $title
     * @param $price
     * @param $description
     * @throws QueryException
     */
    public function createBook($title, $price, $description)
    {
        $book = new BooksEntity();
        $book->setTitle($title);
        $book->setPrice($price);
        $book->setDescription($description);

        try {
            $this->em->persist($book);
            $this->em->flush();

            return true;
        } catch (\Exception $ex) {
            throw new QueryException('003', 502);
        }
    }
}