<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
	public function index(){

    $departement = array('1'=>'IT','2'=>'Electro','3'=>'Mecanique' );

    $teacher_conntected = FALSE;

    $name = 'Smith';
		return $this->render('administration/index.html.twig', [
      'name' => $name,
      'departement' =>$departement,
      'teacher_connected' => $teacher_conntected,
    ]);
	}
}