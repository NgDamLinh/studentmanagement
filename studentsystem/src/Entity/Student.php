<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(nullable: true)]
    private ?int $phoneNum = null;

    #[ORM\ManyToMany(targetEntity: Subject::class, mappedBy: 'classNum')]
    private Collection $subjects;

    #[ORM\OneToMany(mappedBy: 'majorName', targetEntity: Major::class)]
    private Collection $majors;

    #[ORM\ManyToMany(targetEntity: ClassRoom::class, mappedBy: 'classNum')]
    private Collection $classRooms;

    public function __construct()
    {
        $this->subjects = new ArrayCollection();
        $this->majors = new ArrayCollection();
        $this->classRooms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNum(): ?int
    {
        return $this->phoneNum;
    }

    public function setPhoneNum(?int $phoneNum): self
    {
        $this->phoneNum = $phoneNum;

        return $this;
    }

    /**
     * @return Collection<int, Subject>
     */
    public function getSubjects(): Collection
    {
        return $this->subjects;
    }

    public function addSubject(Subject $subject): self
    {
        if (!$this->subjects->contains($subject)) {
            $this->subjects->add($subject);
            $subject->addClassNum($this);
        }

        return $this;
    }

    public function removeSubject(Subject $subject): self
    {
        if ($this->subjects->removeElement($subject)) {
            $subject->removeClassNum($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Major>
     */
    public function getMajors(): Collection
    {
        return $this->majors;
    }

    public function addMajor(Major $major): self
    {
        if (!$this->majors->contains($major)) {
            $this->majors->add($major);
            $major->setMajorName($this);
        }

        return $this;
    }

    public function removeMajor(Major $major): self
    {
        if ($this->majors->removeElement($major)) {
            // set the owning side to null (unless already changed)
            if ($major->getMajorName() === $this) {
                $major->setMajorName(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ClassRoom>
     */
    public function getClassRooms(): Collection
    {
        return $this->classRooms;
    }

    public function addClassRoom(ClassRoom $classRoom): self
    {
        if (!$this->classRooms->contains($classRoom)) {
            $this->classRooms->add($classRoom);
            $classRoom->addClassNum($this);
        }

        return $this;
    }

    public function removeClassRoom(ClassRoom $classRoom): self
    {
        if ($this->classRooms->removeElement($classRoom)) {
            $classRoom->removeClassNum($this);
        }

        return $this;
    }
}
