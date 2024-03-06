<?php

namespace App\Entity;

use App\Repository\CharityRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\BlobType;
use Doctrine\ORM\Mapping as ORM;
use PhpParser\Node\Expr\Cast\Double;
use PhpParser\Node\Expr\Cast\String_;
use Symfony\Component\Validator\Constraints\Date;


#[ORM\Entity(repositoryClass: CharityRepository::class)]
class Charity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;




    #[ORM\Column(length: 255)]
    private ?string $name_of_charity;

    #[ORM\Column]
    private ?float $amount_donated;

    #[ORM\Column]
    private ?float $total_of_donation;

    #[ORM\Column]
    private ?DateTime $last_date;



    #[ORM\Column(length: 255)]
    private ?string $picture = null;

    #[ORM\ManyToMany(targetEntity: Donation::class, inversedBy: 'charities')]
    private Collection $donation;

    #[ORM\Column(length: 255)]
    private ?string $location = null;

    #[ORM\Column(length: 255)]
    private ?string $search_keyword = null;

    public function __construct()
    {
        $this->donation = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmountDonated(): ?float
    {
        return $this->amount_donated;
    }

    public function setAmountDonated(float $amount_donated): static
    {
        $this->amount_donated = $amount_donated;
        return $this;
    }

    public function getTotalOfDonation(): ?float
    {
        return $this->total_of_donation;
    }

    public function setTotalOfDonation(float $total_of_donation): static
    {
        $this->total_of_donation = $total_of_donation;
        return $this;
    }

    public function getLastDate(): ?DateTime
    {
        return $this->last_date;
    }

    public function setLastDate(DateTime $last_date): static
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

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): static
    {
        $this->picture = $picture;
        return $this;
    }
    public function __toString()
    {
        return $this->name_of_charity;
    }

    /**
     * @return Collection<int, Donation>
     */
    public function getDonation(): Collection
    {
        return $this->donation;
    }

    public function addDonation(Donation $donation): static
    {
        if (!$this->donation->contains($donation)) {
            $this->donation->add($donation);
        }

        return $this;
    }

    public function removeDonation(Donation $donation): static
    {
        $this->donation->removeElement($donation);

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getSearchKeyword(): ?string
    {
        return $this->search_keyword;
    }

    public function setSearchKeyword(string $search_keyword): static
    {
        $this->search_keyword = $search_keyword;

        return $this;
    }
}
