<?php

namespace App\Entity;

use App\Repository\GradeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GradeRepository::class)]
class Grade
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Grade = null;

    #[ORM\Column]
    private ?float $GPA = null;

    #[ORM\Column(length: 255)]
    private ?string $TOP = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGrade(): ?string
    {
        return $this->Grade;
    }

    public function setGrade(string $Grade): self
    {
        $this->Grade = $Grade;

        return $this;
    }

    public function getGPA(): ?float
    {
        return $this->GPA;
    }

    public function setGPA(float $GPA): self
    {
        $this->GPA = $GPA;

        return $this;
    }

    public function getTOP(): ?string
    {
        return $this->TOP;
    }

    public function setTOP(string $TOP): self
    {
        $this->TOP = $TOP;

        return $this;
    }
}
