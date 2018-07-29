<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection; 
use Doctrine\Common\Collections\Collection; 
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GradeRepository")
 */
class Grade
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="decimal", precision=0)
     */
    private $year;

    /** 
     * @ORM\ManyToMany(targetEntity="App\Entity\Course", inversedBy="grades") 
     */ 
    private $course; 
 
    public function __construct() 
    { 
        $this->course = new ArrayCollection(); 
    } 
    public function getId()
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setYear($year): self
    {
        $this->year = $year;

        return $this;
    }
    
    /** 
    * @return Collection|Course[] 
    */ 
    public function getCourse(): Collection 
    { 
        return $this->course; 
    } 
 
    public function addCourse(Course $course): self 
    { 
        if (!$this->course->contains($course)) { 
            $this->course[] = $course; 
        } 
 
        return $this; 
    } 
 
    public function removeCourse(Course $course): self 
    { 
        if ($this->course->contains($course)) { 
            $this->course->removeElement($course); 
        } 
 
        return $this; 
    } 
}
