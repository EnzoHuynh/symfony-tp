<?php

namespace App\Entity;

use App\Entity\Traits\DeletedTrait;
use App\Entity\Traits\TimestampableTrait;
use App\Entity\Traits\PublishedTrait;
use App\Entity\Traits\ArchivedTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 */
class Comment
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
     * @ORM\Column(type="text")
     * @Assert\NotNull()
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Proposition", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Proposition_id;

    public function getId(): ?int
    {
        return $this->id;
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

    public function setUserId(?User $User_id): self
    {
        $this->User_id = $User_id;

        return $this;
    }

    public function getPropositionId(): ?Proposition
    {
        return $this->Proposition_id;
    }

    public function setPropositionId(?Proposition $Proposition_id): self
    {
        $this->Proposition_id = $Proposition_id;

        return $this;
    }
}
