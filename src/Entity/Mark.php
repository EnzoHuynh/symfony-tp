<?php

namespace App\Entity;

use App\Entity\Traits\DeletedTrait;
use App\Entity\Traits\TimestampableTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MarkRepository")
 */
class Mark
{
    use TimestampableTrait;
    use DeletedTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $upvote;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="marks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Proposition", inversedBy="marks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Proposition_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUpvote(): ?int
    {
        return $this->upvote;
    }

    public function setUpvote(int $upvote): self
    {
        $this->upvote = $upvote;

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
