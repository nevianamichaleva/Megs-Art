<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Arts;
use AppBundle\Entity\Comments;
use AppBundle\Entity\Users;
use AppBundle\Form\ArtType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AdminController extends Controller
{
    /**
     * @Route("/administration/paintings", name="Administration paintings")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function listAction()
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        $arts = $this->getDoctrine()
                ->getRepository('AppBundle:Arts')
                ->findAll();
        $pageTitle='Paintings list';
        $pageDesc='List of all paintings';
        return $this->render('admin/list.html.twig', [
                    'arts' => $arts,
                    'pageTitle'=>$pageTitle,
                    'pageDesc'=>$pageDesc,
        ]);
    }
    
    /**
     * @Route("/administration/create", name="Create painting")
     * @Security("has_role('ROLE_ADMIN')")
     * @Method({"GET", "POST"})
     */
    public function createAction(Request $request) {
        
        $art = new Arts;
        $form = $this->createForm(ArtType::class, $art);
               /* ->add('saveAndCreateNew', SubmitType::class);*/

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
             
            //Get Data
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
            $art->setArtTitleimage($fileTitleimage);
            $art->setArtImage($fileImage);
            $art->setArtDate($now);

            $em = $this->getDoctrine()->getManager();
            $em->persist($art);
            $em->flush();
            $this->addFlash('success', 'Картината е добавена!');
            /*if ($form->get('saveAndCreateNew')->isClicked()) {
                return $this->redirectToRoute('Create painting');
            }*/
            return $this->redirectToRoute('Gallery');
        }
        $pageTitle='Create new painting';
        $pageDesc='Please fill out required fields';
        $page = 'Create';
        return $this->render('arts/create.html.twig', [
                    'form' => $form->createView(),
                    'pageTitle'=> $pageTitle,
                    'pageDesc'=> $pageDesc,
                    'page'=>$page
        ]);
    }

    /**
     * @Route("/administration/delete/{id}", name="Delete painting")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function deleteAction(Arts $art, Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $id = $art->getId();
        $queryComments = $entityManager
                ->createQuery(
                "SELECT c, u, a 
                FROM AppBundle\Entity\Comments c
                JOIN c.userId u
                JOIN c.artId a
                WHERE c.artId = $id"); 
 
        $commentsById = $queryComments->getResult();
                
        $entityManager->remove($art);
        if ($commentsById) {
            $entityManager->remove($commentsById);
        }
        $entityManager->flush();
        $this->addFlash('success', 'Картината и коментарите към нея са изтрити');

        return $this->redirectToRoute('Gallery');
    }

    /**
     * @Route("administration/edit/{id}", requirements={"id": "\d+"}, name="Edit painting")
     * @Security("has_role('ROLE_ADMIN')")
     * @Method({"GET", "POST"})
     */
    public function editAction(Arts $art, Request $request) {
        //dump($art); exit;
        $entityManager = $this->getDoctrine()->getManager();

        $form = $this->createForm(ArtType::class, $art);
        $artTitleimage =  $art->getArtTitleimage();
        $artImage = $art->getArtImage();
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          
        if ($form['artTitleimage']->getData()!=null) {
            $first = $art->getArtTitleimage();
            $artTitleimage = md5(uniqid()) . '.' . $first->guessExtension();  
            $first->move(
                    $this->getParameter('artImages_directory'), $artTitleimage
            );
            
        } 
        
        if ($form['artImage']->getData()!=null){
            $second = $art->getArtImage();
            $artImage = md5(uniqid()) . '.' . $second->guessExtension();
            $second->move(
                    $this->getParameter('artImages_directory'), $artImage
            );
             
        } 
        
            $art->setArtTitleimage($artTitleimage);
           $art->setArtImage($artImage);
            $entityManager->flush();

            $this->addFlash('success', 'Картината е редактирана');

            return $this->redirectToRoute('Edit painting', ['id' => $art->getId()]);
        }
        $pageTitle='Edit painting';
        $pageDesc='Just change the fields for editing';
        $page = 'Edit';
        return $this->render('arts/create.html.twig', [
            'art' => $art,
            'form' => $form->createView(),
            'pageTitle'=>$pageTitle,
            'pageDesc'=>$pageDesc,
            'page'=> $page
        ]);
    }
    
     /**
     * @Route("/administration/users", name="Administration users")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function listUsersAction()
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        $users = $this->getDoctrine()
                ->getRepository('AppBundle:Users')
                ->findAll();
        $pageTitle='Users list';
        $pageDesc='List of all registered users';
        return $this->render('admin/users.html.twig', [
                    'users' => $users,
                    'pageTitle'=>$pageTitle,
                    'pageDesc'=>$pageDesc,
        ]);
    }
    
    /**
     * @Route("/administration/comments", name="Administration comments")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function listCommentsAction()
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        $comments = $this->getDoctrine()
                ->getRepository('AppBundle:Comments')
                ->findAll();
        $pageTitle='Comments list';
        $pageDesc='List of all comments';
        return $this->render('admin/comments.html.twig', [
                    'comments' => $comments,
                    'pageTitle'=>$pageTitle,
                    'pageDesc'=>$pageDesc,
        ]);
    }
    
    /**
     * @Route("/administration/comments/delete/{id}", name="Delete comment")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function deleteCommentAction(Comments $comment, Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
                
        $entityManager->remove($comment);
        $entityManager->flush();
        $this->addFlash('success', 'Коментарът е изтрит');

        return $this->redirectToRoute('Administration comments');
    }
    
    /**
     * @Route("/administration/users/delete/{id}", name="Delete user")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function deleteUserAction(Users $user, Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
                
        $entityManager->remove($user);
        $entityManager->flush();
        $this->addFlash('success', 'Потребителят е изтрит');

        return $this->redirectToRoute('Administration users');
    }
}
