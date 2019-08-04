<?php

namespace App\Controller;

use App\Entity\Course;
use App\Form\CourseType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CourseController extends Controller
{
    /**
     * @Route("/course", name="course")
     */
    public function index(LoggerInterface $logger)
    {
       $logger->info('This is a course');
        return $this->render('course/index.html.twig', [
            'controller_name' => 'CourseController',
        ]);
    }
}

      /**
     * Matches /add_course exactly
     *
     * @Route("/add_course", name="course_add")
     */
  public function addCourse(Request $request)
  {

    // On crée un objet Advert
    $course = new Course();

    // On crée le FormBuilder grâce au service form factory
    $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $course);

    // On ajoute les champs de l'entité que l'on veut à notre formulaire
    $formBuilder
      ->add('title',      TextType::class)
      ->add('save',      SubmitType::class)
    ;

    // À partir du formBuilder, on génère le formulaire
    $form = $formBuilder->getForm();

    // afin qu'elle puisse afficher le formulaire toute seule
    return $this->render('course/formCourseAdd.html.twig', array(
      'form' => $form->createView(),
    ));
  }