<?php

namespace App\Controller;

use App\Entity\Grade;
use App\Form\GradeType;
use Symfony\Component\HttpFoundation\Response; 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class GradeController extends AbstractController
{

  public function detail($section, $grade, SessionInterface $session)
  {

    $user_connexion = $session->get('user_connexion');

    var_dump($user_connexion);


    if ($section=='it' && $grade==4){
      $url = $this->generateUrl(
          'index',
          array('teacher'=>'Hamilton')
        );
      return $this->redirect($url);
    }
    else {
      return new Response('This is the '.$grade. ' grade of the section: '.$section); 
    }
  }

  /**
     * Matches /add_grade exactly
     *
     * @Route("/add_grade", name="grade_add")
  */
  public function addGrade(Request $request)
  {
      
  $grade = new Grade();
    $form   = $this->get('form.factory')->create(GradeType::class, $grade);

    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($grade);
      $em->flush();

      $request->getSession()->getFlashBag()->add('notice', 'New Grade added.');

      return $this->redirectToRoute('grade/formGrade.html.twig');
    }

    return $this->render('grade/formGrade.html.twig', array(
      'form' => $form->createView(),
    ));
  }

}