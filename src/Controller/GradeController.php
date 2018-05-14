<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response; 
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
}