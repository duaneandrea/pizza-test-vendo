<?php

namespace App\Kitchen\Domain\Entity;

use App\Repository\Kitchen\Domain\Entity\KitchenStaffRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KitchenStaffRepository::class)]
class KitchenStaff
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phoneNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $position = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $shiftSchedule = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $skills = null;

    #[ORM\OneToMany(mappedBy: 'personResponsible', targetEntity: KitchenEvent::class)]
    private Collection $kitchenEvents;

    public function __construct()
    {
        $this->kitchenEvents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getShiftSchedule(): ?string
    {
        return $this->shiftSchedule;
    }

    public function setShiftSchedule(?string $shiftSchedule): static
    {
        $this->shiftSchedule = $shiftSchedule;

        return $this;
    }

    public function getSkills(): ?string
    {
        return $this->skills;
    }

    public function setSkills(?string $skills): static
    {
        $this->skills = $skills;

        return $this;
    }

    /**
     * @return Collection<int, KitchenEvent>
     */
    public function getKitchenEvents(): Collection
    {
        return $this->kitchenEvents;
    }

    public function addKitchenEvent(KitchenEvent $kitchenEvent): static
    {
        if (!$this->kitchenEvents->contains($kitchenEvent)) {
            $this->kitchenEvents->add($kitchenEvent);
            $kitchenEvent->setPersonResponsible($this);
        }

        return $this;
    }

    public function removeKitchenEvent(KitchenEvent $kitchenEvent): static
    {
        if ($this->kitchenEvents->removeElement($kitchenEvent)) {
            // set the owning side to null (unless already changed)
            if ($kitchenEvent->getPersonResponsible() === $this) {
                $kitchenEvent->setPersonResponsible(null);
            }
        }

        return $this;
    }
}
