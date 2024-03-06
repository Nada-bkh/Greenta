<?php

namespace App\Entity;

use App\Repository\DonationRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Float_;
use PhpParser\Node\Expr\Cast\Double;
use Symfony\Component\Validator\Constraints\Date;

#[ORM\Entity(repositoryClass: DonationRepository::class)]
class Donation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;






    #[ORM\Column(length: 255)]
    private ?string $address;

    #[ORM\Column]
    private ?DateTime $date;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column]
    private ?int $phoneNumber;

    #[ORM\Column]
    private ?float $amount;

    #[ORM\ManyToMany(targetEntity: Charity::class, mappedBy: 'donation')]
    private Collection $charities;
    /** @var string|null */
    public $email;

    /** @var string|null */
    public $captcha;

    public function __construct()
    {
        $this->charities = new ArrayCollection();
    }





    public function getId(): ?int
    {
        return $this->id;
    }




    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getDate(): ?DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPhoneNumber(): ?int
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(int $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getCharity(): Collection
    {
        return $this->charities;
    }

    public function setCharity(Charity $charity): static
    {
        $this->charities = $charity;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): static
    {
        $this->amount = $amount;

        return $this;
    }
    public function __toString()
    {
        return $this->charities;
    }

    /**
     * @return Collection<int, Charity>
     */
    public function getCharities(): Collection
    {
        return $this->charities;
    }

    public function addCharity(Charity $charity): static
    {
        if (!$this->charities->contains($charity)) {
            $this->charities->add($charity);
            $charity->addDonation($this);
        }

        return $this;
    }

    public function removeCharity(Charity $charity): static
    {
        if ($this->charities->removeElement($charity)) {
            $charity->removeDonation($this);
        }

        return $this;
    }
}
