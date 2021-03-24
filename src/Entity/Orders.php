<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\OneToMany(targetEntity=Realestate::class, mappedBy="orders")
     */
    private $realestate_id;

    public function __construct()
    {
        $this->realestate_id = new ArrayCollection();
    }

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
    /**
     * @return Collection|Realestate[]
     */
    public function getRealestateId(): Collection
    {
        return $this->realestate_id;
    }

    public function addRealestateId(Realestate $realestateId): self
    {
        if (!$this->realestate_id->contains($realestateId)) {
            $this->realestate_id[] = $realestateId;
            $realestateId->setOrders($this);
        }

        return $this;
    }

    public function removeRealestateId(Realestate $realestateId): self
    {
        if ($this->realestate_id->removeElement($realestateId)) {
            // set the owning side to null (unless already changed)
            if ($realestateId->getOrders() === $this) {
                $realestateId->setOrders(null);
            }
        }

        return $this;
    }
}
