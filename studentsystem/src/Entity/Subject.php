<?php

namespace App\Entity;

use App\Repository\SubjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubjectRepository::class)]
class Subject
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $subjectName = null;

    #[ORM\ManyToMany(targetEntity: Student::class, inversedBy: 'subjects')]
    private Collection $classNum;

    public function __construct()
    {
        $this->classNum = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubjectName(): ?string
    {
        return $this->subjectName;
    }

    public function setSubjectName(string $subjectName): self
    {
        $this->subjectName = $subjectName;

        return $this;
    }

    /**
     * @return Collection<int, Student>
     */
    public function getClassNum(): Collection
    {
        return $this->classNum;
    }

    public function addClassNum(Student $classNum): self
    {
        if (!$this->classNum->contains($classNum)) {
            $this->classNum->add($classNum);
        }

        return $this;
    }

    public function removeClassNum(Student $classNum): self
    {
        $this->classNum->removeElement($classNum);

        return $this;
    }
}
