<?php

namespace KeurGuiImmoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * typeBien
 *
 * @ORM\Table(name="type_bien")
 * @ORM\Entity(repositoryClass="KeurGuiImmoBundle\Repository\typeBienRepository")
 */
class typeBien
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
     * @ORM\Column(name="libelleTypeBien", type="string", length=255)
     */
    private $libelleTypeBien;

     /**
     * @ORM\OneToMany(targetEntity="KeurGuiImmoBundle\Entity\Bien", mappedBy="typeBien")
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
     * Set libelleTypeBien
     *
     * @param string $libelleTypeBien
     *
     * @return typeBien
     */
    public function setLibelleTypeBien($libelleTypeBien)
    {
        $this->libelleTypeBien = $libelleTypeBien;

        return $this;
    }

    /**
     * Get libelleTypeBien
     *
     * @return string
     */
    public function getLibelleTypeBien()
    {
        return $this->libelleTypeBien;
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
     * @return typeBien
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
