<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Psr\Log\LoggerInterface;

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
