<?php

namespace App\Entity;

use App\Repository\ProprietairesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Collection;

/**
 * @ORM\Entity(repositoryClass=ProprietairesRepository::class)
 */
class Proprietaires
{
    /**

     */
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $prenom;

    /**
     * @ORM\ManyToMany(targetEntity=Chaton::class, mappedBy="proprietaires")
     */
    private $proprietaires;

    public function __construct()
    {
        $this->proprietaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection<int, Chaton>
     */
    public function getProprietaires(): \Doctrine\Common\Collections\Collection
    {
        return $this->proprietaires;
    }

    public function addProprietaire(Chaton $proprietaire): self
    {
        if (!$this->proprietaires->contains($proprietaire)) {
            $this->proprietaires[] = $proprietaire;
            $proprietaire->addProprietaire($this);
        }

        return $this;
    }

    public function removeProprietaire(Chaton $proprietaire): self
    {
        if ($this->proprietaires->removeElement($proprietaire)) {
            $proprietaire->removeProprietaire($this);
        }

        return $this;
    }



}
