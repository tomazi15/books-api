<?php

namespace BooksApi\BookBundle\Repositories;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\QueryException;

use Snc\RedisBundle\Doctrine\Cache\RedisCache;
use Predis\Client;

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

        $predis = new RedisCache();
        $predis->setRedis(new Client);
        $cacheId = 'FetchBook' . '-' . $id;
        $cacheLifetime = 3600;

        $book = $this->em->getRepository('BooksApiBookBundle:BooksEntity')
            ->createQueryBuilder('book')
            ->where('book.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->setResultCacheDriver($predis)
            ->setResultCacheLifetime($cacheLifetime)
            ->setResultCacheId($cacheId);
        $result = $book->getSingleResult();

        return $result;

//        try {
//            $book = $this->em->getRepository('BooksApiBookBundle:BooksEntity')
//                ->find($id);
//
//        } catch (\Exception $ex) {
//            $this->em->close();
//            throw new QueryException('003', 502);
//        }
//
//        return $book;
    }
}