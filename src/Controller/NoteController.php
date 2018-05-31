<?php 
 
namespace App\Controller; 
 
use Symfony\Component\Routing\Annotation\Route; 
use Symfony\Bundle\FrameworkBundle\Controller\Controller; 
use App\Service\Message; 
 
class NoteController extends Controller 
{ 
    /** 
     * @Route("/note/add", name="add_note") 
     */ 
    public function add(Message $message) 
    { 
        $student_note = $message->noteMessage('20','Hamilton'); 
        $this->addFlash('New note', $student_note); 
         
        return $this->render('note/index.html.twig', [ 
            'controller_name' => 'NoteController', 
        ]); 
    } 
} 