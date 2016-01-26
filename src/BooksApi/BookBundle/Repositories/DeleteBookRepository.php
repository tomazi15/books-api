<?php
namespace BooksApi\BookBundle\Repositories;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\QueryException;

class DeleteBookRepository {

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
     * @return bool|null|object
     * @throws QueryException
     */
    public function deleteBook($id)
    {
        $book = $this->em->getRepository('BooksApiBookBundle:BooksEntity')
            ->find($id);



        if ($book) {
            try {
                $this->em->remove($book);
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