<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Arts;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

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
               $queryThree ->setMaxResults(3);
               $lastThree = $queryThree->getResult();
        $querySix = $this->getDoctrine()->getManager()
                ->createQuery(
                "SELECT a 
                FROM AppBundle\Entity\Arts a
                ORDER BY a.artDate DESC");     
                $querySix ->setMaxResults(6);
                $lastSix = $querySix->getResult();
        /*$queryComments = $this->getDoctrine()->getManager()
                ->createQuery(
                "SELECT c, u, a 
                FROM AppBundle\Entity\Comments c
                JOIN c.userId u
                JOIN c.artId a
                ORDER BY c.commentDate DESC");     
                $queryComments ->setMaxResults(4);
                $comments = $queryComments->getResult();*/
        //select * from comments LEFT JOIN users on comments.user_id=users.id left join arts on comments.art_id=arts.id
        return $this->render('arts/home.html.twig', [
                    'arts' => $arts,
                    'lastThree' => $lastThree ,
                    'lastSix' => $lastSix,
                    /*'comments' =>$comments*/
        ]);
    }
    
    /**
     * @Route("/create", name="Create")
     */
    public function createAction(Request $request) {
        $art = new Arts;
        $form = $this->createFormBuilder($art)
                ->add('artTitle', TextType::class)
                ->add('artDescription', TextareaType::class)
                ->add('artSize', TextType::class)
                ->add('artCanvas', TextType::class)
                ->add('artPaint', TextType::class)
                ->add('artPrice', TextType::class)
                ->add('artTitleimage', FileType::class)
                ->add('artImage', FileType::class)
                ->add('save', SubmitType::class, ['label' => 'Запис'])
                ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //Get Data
            $artTitle = $form['artTitle']->getData();
            $artDescription = $form['artDescription']->getData();
            $artSize = $form['artSize']->getData();
            $artCanvas = $form['artCanvas']->getData();
            $artPaint = $form['artPaint']->getData();
            $artPrice = $form['artPrice']->getData();
            $artTitleimage = $art->getArtTitleimage();
            //echo '<pre>', print_r($artTitleimage, 1), '</pre>';
            $artImage = $art->getArtImage();
            //echo '<pre>', print_r($artImage, 1), '</pre>';

            $now = new\DateTime('now');
            $fileTitleimage = md5(uniqid()) . '.' . $artTitleimage->guessExtension();
            $fileImage = md5(uniqid()) . '.' . $artImage->guessExtension();

            // Move the file to the directory where brochures are stored
            $artTitleimage->move(
                    $this->getParameter('artImages_directory'), $fileTitleimage
            );
            $artImage->move(
                    $this->getParameter('artImages_directory'), $fileImage
            );

            //Set Data
            $art->setArtTitle($artTitle);
            $art->setArtDescription($artDescription);
            $art->setArtSize($artSize);
            $art->setArtCanvas($artCanvas);
            $art->setArtPaint($artPaint);
            $art->setArtPrice($artPrice);
            $art->setArtTitleimage($fileTitleimage);
            $art->setArtImage($fileImage);
            $art->setArtDate($now);

            $em = $this->getDoctrine()->getManager();

            $em->persist($art);
            $em->flush();

            $this->addFlash(
                    'notice', 'Картината е добавена!'
            );
            return $this->redirectToRoute('art_list');
        }
        return $this->render('arts/create.html.twig', [
                    'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}", name="Delete")
     */
    public function deleteAction($id, Request $request) {
        // replace this example code with whatever you need
        return $this->render('arts/delete.html.twig');
    }

    /**
     * @Route("/edit/{id}", name="Edit")
     */
    public function editAction($id, Request $request) {
        // replace this example code with whatever you need
        return $this->render('arts/edit.html.twig');
    }
    
    /**
     * @Route("/contact", name="Contact us")
     * @Route("/contact/{id}", name="Send buy message")
     */
    public function contactAction($id=null) {
        // replace this example code with whatever you need
        return $this->render('common/contact.html.twig',
                [
                    'id'=>$id
                ]);
    }
    /**
     * @Route("/about", name="About")
     */
    public function aboutAction() {
        // replace this example code with whatever you need
        return $this->render('common/about.html.twig');
    }
    /**
     * @Route("/gallery", name="Gallery")
     */
    public function listAction() {
        $arts = $this->getDoctrine()
        ->getRepository('AppBundle:Arts')
                ->findAll();
        $pageTitle='Gallery';
        $pageDesc='Here you can see my paintings';
        $router='details';
        
        return $this->render('arts/gallery.html.twig',[
            'arts'=>$arts,
            'pageTitle'=>$pageTitle,
            'pageDesc'=>$pageDesc,
            'router'=>$router
        ]);
    }
    /**
     * @Route("/paintings", name="Paintings for sale")
     */
    public function paintingsForSaleAction() {
        $artsForSale = $this->getDoctrine()
        ->getRepository('AppBundle:Arts')
                ->findBy(['artCategory'=>'Paintings for sale']);
        $pageTitle='Paintings for sale';
        $pageDesc='Here you can see my paintings for sale';
        $router='contact';
        
        return $this->render('arts/gallery.html.twig',[
            'arts'=>$artsForSale,
            'pageTitle'=>$pageTitle,
            'pageDesc'=>$pageDesc,
            'router'=>$router
        ]);
    }
    /**
     * @Route("/details/{id}", name="Details")
     */
    public function detailsAction($id) {
        $artById = $this->getDoctrine()
                ->getRepository('AppBundle:Arts')
                ->findOneBy(['id'=>$id]);
        
        $queryComments = $this->getDoctrine()->getManager()
                ->createQuery(
                "SELECT c, u, a 
                FROM AppBundle\Entity\Comments c
                JOIN c.userId u
                JOIN c.artId a
                WHERE c.artId = $id"); 
 
                $commentsById = $queryComments->getResult();
                $count = count($commentsById);
                 
        return $this->render('arts/details.html.twig',[
                'art'=> $artById,
                'comments'=>$commentsById,
                'count'=>$count
                    ]);
    }
    
    public function _findArtsAction()
{
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
public function _rightSideAction()
{
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