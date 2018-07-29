<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection; 
use Doctrine\Common\Collections\Collection; 
use Doctrine\ORM\Mapping as ORM; 
/** 
 * @ORM\Entity(repositoryClass="App\Repository\CourseRepository") 
 */ 
class Course{
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
   * @ORM\OneToMany(targetEntity="App\Entity\Note", mappedBy="course") 
   */ 
  private $notes; 

  /** 
   * @ORM\ManyToMany(targetEntity="App\Entity\Grade", mappedBy="course") 
   */ 
  private $grades; 
 
  public function __construct() 
  { 
      $this->notes = new ArrayCollection(); 
      $this->grades = new ArrayCollection(); 
  } 
  public function getId(){
    return $this->id;
  }

  public function setId($id){
    $this->id = $id;
    return $this;
  }

  public function getTitle(){
    return $this->title;
  }

  public function setTitle($title){
    $this->title = $title;
    return $this;
  }
  /** 
   * @return Collection|Note[] 
   */ 
  public function getNotes(): Collection 
  { 
      return $this->notes; 
  } 
 
  public function addNote(Note $note): self 
  { 
      if (!$this->notes->contains($note)) { 
          $this->notes[] = $note; 
          $note->setCourse($this); 
      } 
      return $this; 
  } 
 
  public function removeNote(Note $note): self 
  { 
      if ($this->notes->contains($note)) { 
          $this->notes->removeElement($note); 
          // set the owning side to null (unless already changed) 
          if ($note->getCourse() === $this) { 
              $note->setCourse(null); 
          } 
      } 
      return $this; 
  } 
 
  /** 
   * @return Collection|Grade[] 
   */ 
  public function getGrades(): Collection 
  { 
      return $this->grades; 
  } 
 
  public function addGrade(Grade $grade): self 
  { 
      if (!$this->grades->contains($grade)) { 
          $this->grades[] = $grade; 
          $grade->addCourse($this); 
      } 
 
      return $this; 
  } 
 
  public function removeGrade(Grade $grade): self 
  { 
      if ($this->grades->contains($grade)) { 
          $this->grades->removeElement($grade); 
          $grade->removeCourse($this); 
      } 
 
      return $this; 
  } 
}