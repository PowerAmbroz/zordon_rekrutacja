<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdersRepository::class)
 */
class Orders
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $assignee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $inspectionDate;

    /**
     * @ORM\OneToOne(targetEntity=Realestate::class, cascade={"persist", "remove"})
     */
    private $realEstate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAssignee(): ?string
    {
        return $this->assignee;
    }

    public function setAssignee(string $assignee): self
    {
        $this->assignee = $assignee;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getInspectionDate(): ?string
    {
        return $this->inspectionDate;
    }

    public function setInspectionDate(string $inspectionDate): self
    {
        $this->inspectionDate = $inspectionDate;

        return $this;
    }

    public function getRealEstate(): ?Realestate
    {
        return $this->realEstate;
    }

    public function setRealEstate(?Realestate $realEstate): self
    {
        $this->realEstate = $realEstate;

        return $this;
    }
}
