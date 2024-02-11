<?php

namespace App\Entity;

use App\Repository\CharityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharityRepository::class)]
class Charity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 255)]
    private ?string $id_charity = null;

    #[ORM\Column(length: 255)]
    private ?string $amount_donated = null;

    #[ORM\Column(length: 255)]
    private ?string $total_of_donation = null;

    #[ORM\Column(length: 255)]
    private ?string $last_date = null;

    #[ORM\Column(length: 255)]
    private ?string $name_of_charity = null;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getIdCharity(): ?string
    {
        return $this->id_charity;
    }

    public function setIdCharity(string $id_charity): static
    {
        $this->id_charity = $id_charity;

        return $this;
    }

    public function getAmountDonated(): ?string
    {
        return $this->amount_donated;
    }

    public function setAmountDonated(string $amount_donated): static
    {
        $this->amount_donated = $amount_donated;

        return $this;
    }

    public function getTotalOfDonation(): ?string
    {
        return $this->total_of_donation;
    }

    public function setTotalOfDonation(string $total_of_donation): static
    {
        $this->total_of_donation = $total_of_donation;

        return $this;
    }

    public function getLastDate(): ?string
    {
        return $this->last_date;
    }

    public function setLastDate(string $last_date): static
    {
        $this->last_date = $last_date;

        return $this;
    }

    public function getNameOfCharity(): ?string
    {
        return $this->name_of_charity;
    }

    public function setNameOfCharity(string $name_of_charity): static
    {
        $this->name_of_charity = $name_of_charity;

        return $this;
    }
}
