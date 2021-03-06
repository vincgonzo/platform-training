<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlatformTrainingSessionRepository")
 */
class PlatformTrainingSession
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *      min=2,
     *      max=8
     * )
     */
    private $duration;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $trainer;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User")
     * @Assert\Count(
     *      min=0,
     *      max=2
     * )
     */
    private $subscribers_trainee;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbr_subscribe;

    public function __construct()
    {
        $this->subscribers_trainee = new ArrayCollection();
        $this->date = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getTrainer(): ? User
    {
        return $this->trainer;
    }

    public function setTrainer(?User $trainer): self
    {
        $this->trainer = $trainer;

        return $this;
    }

    /**
     * @return Collection|PlatformUser[]
     */
    public function getSubscribersTrainee(): Collection
    {
        return $this->subscribers_trainee;
    }

    public function addSubscribersTrainee(User $subscribersTrainee): self
    {
        if (!$this->subscribers_trainee->contains($subscribersTrainee)) {
            $this->subscribers_trainee[] = $subscribersTrainee;
        }

        return $this;
    }

    public function removeSubscribersTrainee(User $subscribersTrainee): self
    {
        if ($this->subscribers_trainee->contains($subscribersTrainee)) {
            $this->subscribers_trainee->removeElement($subscribersTrainee);
        }

        return $this;
    }

    public function getNbrSubscribe(): ?int
    {
        return $this->nbr_subscribe;
    }

    public function setNbrSubscribe(?int $nbr_subscribe): self
    {
        $this->nbr_subscribe = $nbr_subscribe;

        return $this;
    }
}
