<?php

namespace App\Personnel\Domain\Entity;

use App\Repository\Personnel\Domain\Entity\EmployeeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeeRepository::class)]
class Employee
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
    private ?string $department = null;

    #[ORM\Column(nullable: true)]
    private ?float $salary = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $hireDate = null;

    #[ORM\OneToMany(mappedBy: 'employee', targetEntity: Payroll::class)]
    private Collection $payrolls;

    #[ORM\OneToMany(mappedBy: 'employee', targetEntity: Bonus::class)]
    private Collection $bonuses;

    #[ORM\OneToMany(mappedBy: 'attendees', targetEntity: CompanyEvent::class)]
    private Collection $companyEvents;

    public function __construct()
    {
        $this->payrolls = new ArrayCollection();
        $this->bonuses = new ArrayCollection();
        $this->companyEvents = new ArrayCollection();
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

    public function getDepartment(): ?string
    {
        return $this->department;
    }

    public function setDepartment(?string $department): static
    {
        $this->department = $department;

        return $this;
    }

    public function getSalary(): ?float
    {
        return $this->salary;
    }

    public function setSalary(?float $salary): static
    {
        $this->salary = $salary;

        return $this;
    }

    public function getHireDate(): ?\DateTimeInterface
    {
        return $this->hireDate;
    }

    public function setHireDate(?\DateTimeInterface $hireDate): static
    {
        $this->hireDate = $hireDate;

        return $this;
    }

    /**
     * @return Collection<int, Payroll>
     */
    public function getPayrolls(): Collection
    {
        return $this->payrolls;
    }

    public function addPayroll(Payroll $payroll): static
    {
        if (!$this->payrolls->contains($payroll)) {
            $this->payrolls->add($payroll);
            $payroll->setEmployee($this);
        }

        return $this;
    }

    public function removePayroll(Payroll $payroll): static
    {
        if ($this->payrolls->removeElement($payroll)) {
            // set the owning side to null (unless already changed)
            if ($payroll->getEmployee() === $this) {
                $payroll->setEmployee(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Bonus>
     */
    public function getBonuses(): Collection
    {
        return $this->bonuses;
    }

    public function addBonus(Bonus $bonus): static
    {
        if (!$this->bonuses->contains($bonus)) {
            $this->bonuses->add($bonus);
            $bonus->setEmployee($this);
        }

        return $this;
    }

    public function removeBonus(Bonus $bonus): static
    {
        if ($this->bonuses->removeElement($bonus)) {
            // set the owning side to null (unless already changed)
            if ($bonus->getEmployee() === $this) {
                $bonus->setEmployee(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CompanyEvent>
     */
    public function getCompanyEvents(): Collection
    {
        return $this->companyEvents;
    }

    public function addCompanyEvent(CompanyEvent $companyEvent): static
    {
        if (!$this->companyEvents->contains($companyEvent)) {
            $this->companyEvents->add($companyEvent);
            $companyEvent->setAttendees($this);
        }

        return $this;
    }

    public function removeCompanyEvent(CompanyEvent $companyEvent): static
    {
        if ($this->companyEvents->removeElement($companyEvent)) {
            // set the owning side to null (unless already changed)
            if ($companyEvent->getAttendees() === $this) {
                $companyEvent->setAttendees(null);
            }
        }

        return $this;
    }
}
