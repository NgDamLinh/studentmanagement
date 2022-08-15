<?php

namespace App\Entity;

use App\Repository\SemesterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SemesterRepository::class)]
class Semester
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $semeterNum = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSemeterNum(): ?int
    {
        return $this->semeterNum;
    }

    public function setSemeterNum(int $semeterNum): self
    {
        $this->semeterNum = $semeterNum;

        return $this;
    }
}
