<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comments;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CommentsController extends Controller {

    /**
     * @Route("/add_reply", name="Add reply")
     */
    public function addReply(Request $request) {
       
        
    return $this->render('arts/details.html.twig', [
                    'form' => $form->createView()
        ]);
    }

}