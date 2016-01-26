<?php
namespace BooksApi\BookBundle\Repositories;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\QueryException;

class FetchAllBooksRepository {

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

    public function allBooks()
    {
        try {
            $book = $this->em->getRepository('BooksApiBookBundle:BooksEntity')
                ->findAll();
        } catch (\Exception $ex) {
            $this->em->close();
            throw new QueryException('003', 502);
        }

        return $book;
    }
} 