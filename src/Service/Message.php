<?php

namespace App\Service;
use Psr\Log\LoggerInterface;

class Message
{

    private $logger;

    public function __construct(LoggerInterface $logger){

        $this->logger = $logger;

    }
    public function noteMessage($note, $student)
    {
        $messages = 'Hi '.$student.' your note is : '.$note;
        $this->logger->info($messages);
        
        return $messages;
    }
}