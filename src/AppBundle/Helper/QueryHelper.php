<?php

namespace AppBundle\Helper;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\Container;

/**
 * Description of QueryController
 *
 * @author Neva
 */
class QueryHelper extends Controller {
    
    private $container;
    
    public function __construct() {
        $this->container=$c;
    }

    public function findAllArtsAction () {
        $arts = $this->getDoctrine()
                ->getRepository('AppBundle:Arts')
                ->findAll();
        return $arts;
    }
    
    public function findLastThreeArtsAction () {
        $queryThree = $this->getDoctrine()->getManager()
                ->createQuery(
                "SELECT a 
                FROM AppBundle\Entity\Arts a
                ORDER BY a.artDate DESC");     
               $queryThree ->setMaxResults(3);
               $lastThree = $queryThree->getResult();
        return $lastThree;
    }
    
    public function findLastSixArtsAction () {
        $querySix = $this->getDoctrine()->getManager()
                ->createQuery(
                "SELECT a 
                FROM AppBundle\Entity\Arts a
                ORDER BY a.artDate DESC");     
                $querySix ->setMaxResults(6);
                $lastSix = $querySix->getResult();
        return $lastSix;
    }
    public function findLastFourCommentsAction () {
     $queryComments = $this->getDoctrine()->getManager()
                ->createQuery(
                "SELECT c, u, a 
                FROM AppBundle\Entity\Comments c
                JOIN c.userId u
                JOIN c.artId a
                ORDER BY c.commentDate DESC");     
                $queryComments ->setMaxResults(4);
                $comments = $queryComments->getResult();
        //select * from comments LEFT JOIN users on comments.user_id=users.id left join arts on comments.art_id=arts.id
                return $comments;
    }   
    }
