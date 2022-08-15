<?php

namespace App\Entity;

use App\Repository\MajorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MajorRepository::class)]
class Major
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'majors')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Student $majorName = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMajorName(): ?Student
    {
        return $this->majorName;
    }

    public function setMajorName(?Student $majorName): self
    {
        $this->majorName = $majorName;

        return $this;
    }
}
