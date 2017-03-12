<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Arts;
use AppBundle\Entity\Comments;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ArtsController extends Controller {

    /**
     * @Route("/", name="Home")
     */
    public function homeAction() {
        $arts = $this->getDoctrine()
                ->getRepository('AppBundle:Arts')
                ->findAll();
        $queryThree = $this->getDoctrine()->getManager()
                ->createQuery(
                "SELECT a 
                FROM AppBundle\Entity\Arts a
                ORDER BY a.artDate DESC");
        $queryThree->setMaxResults(3);
        $lastThree = $queryThree->getResult();
        $querySix = $this->getDoctrine()->getManager()
                ->createQuery(
                "SELECT a 
                FROM AppBundle\Entity\Arts a
                ORDER BY a.artDate DESC");
        $querySix->setMaxResults(6);
        $lastSix = $querySix->getResult();

        return $this->render('arts/home.html.twig', [
                    'arts' => $arts,
                    'lastThree' => $lastThree,
                    'lastSix' => $lastSix,
        ]);
    }

    /**
     * @Route("/contact", name="Contact us")
     * @Route("/contact/{id}", name="Send buy message")
     */
    public function contactAction($id = null) {
        // replace this example code with whatever you need
        return $this->render('common/contact.html.twig', [
                    'id' => $id
        ]);
    }

    /**
     * @Route("/about", name="About")
     */
    public function aboutAction() {
        $pageTitle = 'About';
        $pageDesc = 'Megs Art - Miglena Stoyanova\'s place for art';

        return $this->render('common/about.html.twig', [
                    'pageTitle' => $pageTitle,
                    'pageDesc' => $pageDesc,
        ]);
    }

    /**
     * @Route("/gallery", name="Gallery")
     */
    public function listAction() {
        $arts = $this->getDoctrine()
                ->getRepository('AppBundle:Arts')
                ->findBy(
                array(), array('id' => 'DESC')
        );
        $pageTitle = 'Gallery';
        $pageDesc = 'Here you can see my paintings';
        $router = 'details';

        return $this->render('arts/gallery.html.twig', [
                    'arts' => $arts,
                    'pageTitle' => $pageTitle,
                    'pageDesc' => $pageDesc,
                    'router' => $router
        ]);
    }

    /**
     * @Route("/paintings", name="Paintings for sale")
     */
    public function paintingsForSaleAction() {
        $artsForSale = $this->getDoctrine()
                ->getRepository('AppBundle:Arts')
                ->findBy(
                ['artCategory' => 'Paintings for sale'], array('id' => 'DESC')
        );
        $pageTitle = 'Paintings for sale';
        $pageDesc = 'Here you can see my paintings for sale';
        $router = 'contact';

        return $this->render('arts/forsale.html.twig', [
                    'arts' => $artsForSale,
                    'pageTitle' => $pageTitle,
                    'pageDesc' => $pageDesc,
                    'router' => $router
        ]);
    }

    /**
     * @Route("/details/{id}", name="Details")
     */
    public function detailsAction($id, Request $request) {
        $artById = $this->getDoctrine()
                ->getRepository('AppBundle:Arts')
                ->findOneBy(['id' => $id]);

        $queryComments = $this->getDoctrine()->getManager()
                ->createQuery(
                "SELECT c, u, a 
                FROM AppBundle\Entity\Comments c
                JOIN c.userId u
                JOIN c.artId a
                WHERE c.artId = $id");

        $commentsById = $queryComments->getResult();
        $count = count($commentsById);
        //Add comment
        $comment = new Comments();
        $form = $this->createFormBuilder($comment)
                ->add('artComment', TextareaType::class, array(
                    'attr' => array(
                        'placeholder' => 'Place your comment here',
                        'rows' => '5',
                        'cols' => '20'
                    ),
                    'label' => false,))
                ->add('save', SubmitType::class, ['label' => 'Post'])
                ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //Get Data
            $artComment = $form['artComment']->getData();
            $now = new\DateTime('now');
            $userId = $this->get('security.token_storage')->getToken()->getUser();

            //Set Data
            $comment->setArtComment($artComment);
            $comment->setCommentDate($now);
            $comment->setArtId($artById);
            $comment->setUserId($userId);

            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirect($request->getUri());
        }
        return $this->render('arts/details.html.twig', [
                    'art' => $artById,
                    'comments' => $commentsById,
                    'count' => $count,
                    'form' => $form->createView()
        ]);
    }

    public function _findArtsAction() {
        $em = $this->getDoctrine()->getManager();

        $arts = $em->getRepository('AppBundle:Arts')
                ->getArts();
        $comments = $em->getRepository('AppBundle:Comments')
                ->getComments();

        return $this->render('Form/_footer.html.twig', array(
                    'arts' => $arts,
                    'comments' => $comments,
        ));
    }

    public function _rightSideAction() {
        $em = $this->getDoctrine()->getManager();

        $arts = $em->getRepository('AppBundle:Arts')
                ->getArts();
        $comments = $em->getRepository('AppBundle:Comments')
                ->getComments();

        return $this->render('Form/_rightSide.html.twig', array(
                    'arts' => $arts,
                    'comments' => $comments,
        ));
    }

}
