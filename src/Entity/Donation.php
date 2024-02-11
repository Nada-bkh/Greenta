<?php

namespace App\Entity;

use App\Repository\DonationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DonationRepository::class)]
class Donation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $id_donation = null;

    #[ORM\Column(length: 255)]
    private ?string $id_charity = null;


    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    private ?string $date = null;

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

    public function getIdDonation(): ?string
    {
        return $this->id_donation;
    }

    public function setIdDonation(string $id_donation): static
    {
        $this->id_donation = $id_donation;

        return $this;
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

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): static
    {
        $this->date = $date;

        return $this;
    }
}
