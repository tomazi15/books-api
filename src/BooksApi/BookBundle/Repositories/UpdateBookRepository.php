<?php

namespace BooksApi\BookBundle\Repositories;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\QueryException;

class UpdateBookRepository
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

    public function updateBook($id, $update)
    {

        $book = $this->em->getRepository('BooksApiBookBundle:BooksEntity')
            ->find($id);

        if ($book)
        {
            try {
                $book->setTitle($update);
                $this->em->flush();
            } catch (\Exception $em) {
                throw new QueryException('003', 502);
            }

            return $book;
        } else {
            return false;
        }
    }
} 