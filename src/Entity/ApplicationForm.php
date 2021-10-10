<?php

namespace App\Entity;

use App\Repository\ApplicationFormRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
/**
 * @ORM\Entity(repositoryClass=ApplicationFormRepository::class)
 * @ApiResource()
 */
class ApplicationForm
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $appdate;

    /**
     * @ORM\Column(type="integer")
     */
    private $app_status;

    /**
     * @ORM\OneToOne(targetEntity=Order::class, inversedBy="application_form_id", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $orders;

    /**
     * @ORM\OneToMany(targetEntity=ObjectInAppForm::class, mappedBy="applicationForm", orphanRemoval=true)
     */
    private $object_in_app_form;

    public function __construct()
    {
        $this->object_in_app_form = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAppdate(): ?\DateTimeInterface
    {
        return $this->appdate;
    }

    public function setAppdate(\DateTimeInterface $appdate): self
    {
        $this->appdate = $appdate;

        return $this;
    }

    public function getAppStatus(): ?int
    {
        return $this->app_status;
    }

    public function setAppStatus(int $app_status): self
    {
        $this->app_status = $app_status;

        return $this;
    }

    public function getOrders(): ?Order
    {
        return $this->orders;
    }

    public function setOrders(Order $orders): self
    {
        $this->orders = $orders;

        return $this;
    }

    /**
     * @return Collection|ObjectInAppForm[]
     */
    public function getObjectInAppForm(): Collection
    {
        return $this->object_in_app_form;
    }

    public function addObjectInAppForm(ObjectInAppForm $objectInAppForm): self
    {
        if (!$this->object_in_app_form->contains($objectInAppForm)) {
            $this->object_in_app_form[] = $objectInAppForm;
            $objectInAppForm->setApplicationForm($this);
        }

        return $this;
    }

    public function removeObjectInAppForm(ObjectInAppForm $objectInAppForm): self
    {
        if ($this->object_in_app_form->removeElement($objectInAppForm)) {
            // set the owning side to null (unless already changed)
            if ($objectInAppForm->getApplicationForm() === $this) {
                $objectInAppForm->setApplicationForm(null);
            }
        }

        return $this;
    }
}
