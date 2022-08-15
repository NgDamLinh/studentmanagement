<?php

namespace App\Entity;

use App\Repository\ClassRoomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassRoomRepository::class)]
class ClassRoom
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Student::class, inversedBy: 'classRooms')]
    private Collection $classNum;

    public function __construct()
    {
        $this->classNum = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
