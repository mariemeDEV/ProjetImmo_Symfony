<?php

namespace KeurGuiImmoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Localite
 *
 * @ORM\Table(name="localite")
 * @ORM\Entity(repositoryClass="KeurGuiImmoBundle\Repository\LocaliteRepository")
 */
class Localite
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelleLocalite", type="string", length=100)
     */
    private $libelleLocalite;


    /**
     * @ORM\OneToMany(targetEntity="KeurGuiImmoBundle\Entity\Bien", mappedBy="localite")
     */
    private $biens;


    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelleLocalite
     *
     * @param string $libelleLocalite
     *
     * @return Localite
     */
    public function setLibelleLocalite($libelleLocalite)
    {
        $this->libelleLocalite = $libelleLocalite;

        return $this;
    }

    /**
     * Get libelleLocalite
     *
     * @return string
     */
    public function getLibelleLocalite()
    {
        return $this->libelleLocalite;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->biens = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add bien
     *
     * @param \KeurGuiImmoBundle\Entity\Bien $bien
     *
     * @return Localite
     */
    public function addBien(\KeurGuiImmoBundle\Entity\Bien $bien)
    {
        $this->biens[] = $bien;

        return $this;
    }

    /**
     * Remove bien
     *
     * @param \KeurGuiImmoBundle\Entity\Bien $bien
     */
    public function removeBien(\KeurGuiImmoBundle\Entity\Bien $bien)
    {
        $this->biens->removeElement($bien);
    }

    /**
     * Get biens
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBiens()
    {
        return $this->biens;
    }
}
