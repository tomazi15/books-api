<?php

namespace BooksApi\BookBundle\Repositories;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\QueryException;

class FetchBookRepository
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
     * @param $id
     * @return null|object
     * @throws QueryException
     */
    public function fetchBook($id)
    {
        try {
            $book = $this->em->getRepository('BooksApiBookBundle:BooksEntity')
                ->find($id);
        } catch (\Exception $ex) {
            $this->em->close();
            throw new QueryException('003', 502);
        }

        return $book;
    }
}