<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GenderTypeRepository")
 */
class GenderType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $title_gender;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $gender_code;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleGender(): ?string
    {
        return $this->title_gender;
    }

    public function setTitleGender(string $title_gender): self
    {
        $this->title_gender = $title_gender;

        return $this;
    }

    public function getGenderCode(): ?string
    {
        return $this->gender_code;
    }

    public function setGenderCode(string $gender_code): self
    {
        $this->gender_code = $gender_code;

        return $this;
    }
    /**
     * Magic method 
     * 
     */
    public function __toString(){
        // to show the name of the Category in the select
        return $this->title_gender;
        // to show the id of the Category in the select
        // return $this->id;
    }
}
