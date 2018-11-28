<?php

namespace App\Entity;

use App\Entity\Traits\DeletedTrait;
use App\Entity\Traits\TimestampableTrait;
use App\Entity\Traits\PublishedTrait;
use App\Entity\Traits\ArchivedTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FaqRepository")
 */
class Faq
{
    use TimestampableTrait;
    use DeletedTrait;
    use PublishedTrait;
    use ArchivedTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     * @Assert\NotNull()
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotNull()
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="faqs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User_id;

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

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->User_id;
    }

    public function setUserId(?User $User_idUser): self
    {
        $this->User_id = $User_idUser;

        return $this;
    }
}
