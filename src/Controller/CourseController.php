<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CourseController extends Controller
{
    /**
     * @Route("/course", name="course")
     */
    public function index()
    {
        return $this->render('course/index.html.twig', [
            'controller_name' => 'CourseController',
        ]);
    }
}
