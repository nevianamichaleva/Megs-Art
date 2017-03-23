<?php

namespace AppBundle\Controller;

use AppBundle\Form\UsersType;
use AppBundle\Entity\Users;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller {

    /**
     * @Route("/register", name="Registration")
     */
    public function registerAction(Request $request) {
        // 1) build the form
        $user = new Users();
        $form = $this->createForm(UsersType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password 
            $password = $this->get('security.password_encoder')
                    ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            //set user role=user
            $user->setUserRole('ROLE_USER');

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'You have successfully registered!');

            return $this->redirectToRoute('Login');
        }
        $pageTitle = 'User registration';
        $pageDesc = 'Please register by filling out required fields';
        return $this->render(
                        'registration/register.html.twig', array('form' => $form->createView(),
                    'pageTitle' => $pageTitle,
                    'pageDesc' => $pageDesc)
        );
    }

}
