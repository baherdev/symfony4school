<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;



class DefaultController extends AbstractController
{

  /**
   * @Route("/{teacher}", name="index", defaults={"teacher"="Teacher"}, requirements={"teacher"="[a-zA-Z]+"})
   */

	public function index($teacher){

    $departement = array('1'=>'IT','2'=>'Electro','3'=>'Mecanique' );

    $teacher_conntected = TRUE;

    $name = $teacher;    
    return $this->render('administration/index.html.twig', [
      'name' => $name,
      'departement' =>$departement,
      'teacher_connected' => $teacher_conntected,
    ]);
	}
}