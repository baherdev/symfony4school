<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DefaultController extends AbstractController
{

  /**
   * @Route("/{teacher}", name="index", defaults={"teacher"="Teacher"}, requirements={"teacher"="[a-zA-Z]+"})
   */

	public function index($teacher, Request $request, SessionInterface $session){

    $session->set('user_connexion','connected');

    $teacher_conntected = $request->query->get('connected');

    $this->addFlash(
      'user_connected',
      'The teacher '.$teacher.' is connected to his interface'

    );


    if ($request->isMethod('Post')) {

      echo 'method post';

    }

    $first_name = $request->request->get('first_name');

    $host = $request->headers->get('host');

    echo $host;

    $departement = array('1'=>'IT','2'=>'Electro','3'=>'Mecanique' );



    $name = $teacher;    
    return $this->render('administration/index.html.twig', [
      'name' => $name,
      'departement' =>$departement,
      'teacher_connected' => $teacher_conntected,
    ]);
	}
}