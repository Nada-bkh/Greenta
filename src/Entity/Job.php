<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Util\ClassUtils;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: JobRepository::class)]
class Job
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "The  title field cannot be blank.")]
    #[Assert\Length(
        min: 20,
        max: 255,
        minMessage: "The  job's title must be at least {{ limit }} characters long.",
        maxMessage: "The   job's title cannot be longer than {{ limit }} characters."
    )]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "The  Role field cannot be blank.")]
    #[Assert\Length(
        min: 100,
        max: 255,
        minMessage: "The  job's Role must be at least {{ limit }} characters long.",
        maxMessage: "The   job's Role cannot be longer than {{ limit }} characters."
    )]
    private ?string $role = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "The  Organisation field cannot be blank.")]
    #[Assert\Length(
        min: 3,
        max: 255,
        minMessage: "The  Organisation name  must be at least {{ limit }} characters long.",
        maxMessage: "The   Organisation name cannot be longer than {{ limit }} characters."
    )]
    private ?string $org_name = null;

    #[ORM\Column(length: 255)]
    private ?string $start_date = null;

    #[ORM\OneToMany(targetEntity: Application::class, mappedBy: 'jobid')]
    private Collection $applications;

    public function __construct()
    {
        $this->applications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getOrgName(): ?string
    {
        return $this->org_name;
    }

    public function setOrgName(string $org_name): static
    {
        $this->org_name = $org_name;

        return $this;
    }

    public function getStartDate(): ?string
    {
        return $this->start_date;
    }

    public function setStartDate(string $start_date): static
    {
        $this->start_date = $start_date;

        return $this;
    }

    /**
     * @return Collection<int, Application>
     */
    public function getApplications(): Collection
    {
        return $this->applications;
    }

    public function addApplication(Application $application): static
    {
        if (!$this->applications->contains($application)) {
            $this->applications->add($application);
            $application->setJobid($this);
        }

        return $this;
    }

    public function removeApplication(Application $application): static
    {
        if ($this->applications->removeElement($application)) {
            // set the owning side to null (unless already changed)
            if ($application->getJobid() === $this) {
                $application->setJobid(null);
            }
        }

        return $this;
    }
}
