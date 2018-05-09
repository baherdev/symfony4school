<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GradeController extends AbstractController
{

  public function detail($section, $grade)
  {
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