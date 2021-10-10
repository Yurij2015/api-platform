<?php

namespace App\Entity;

use App\Repository\ObjectInAppFormRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ObjectInAppFormRepository::class)
 */
class ObjectInAppForm
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $product_count;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $service_count;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationForm::class, inversedBy="object_in_app_form")
     * @ORM\JoinColumn(nullable=false)
     */
    private $applicationForm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductCount(): ?int
    {
        return $this->product_count;
    }

    public function setProductCount(?int $product_count): self
    {
        $this->product_count = $product_count;

        return $this;
    }

    public function getServiceCount(): ?int
    {
        return $this->service_count;
    }

    public function setServiceCount(?int $service_count): self
    {
        $this->service_count = $service_count;

        return $this;
    }

    public function getApplicationForm(): ?ApplicationForm
    {
        return $this->applicationForm;
    }

    public function setApplicationForm(?ApplicationForm $applicationForm): self
    {
        $this->applicationForm = $applicationForm;

        return $this;
    }
}
