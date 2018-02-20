<?php

namespace KeurGuiImmoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bien
 *
 * @ORM\Table(name="bien")
 * @ORM\Entity(repositoryClass="KeurGuiImmoBundle\Repository\BienRepository")
 */
class Bien
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
     * @ORM\Column(name="nomBien", type="string", length=40)
     */
    private $nomBien;

    /**
     * @var bool
     *
     * @ORM\Column(name="etatBien", type="boolean")
     */
    private $etatBien;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionBien", type="string", length=255)
     */
    private $descriptionBien;

    /**
     * @var integer
     *
     * @ORM\Column(name="prixLocation", type="integer")
     */
    private $prixLocation;


     /**
     * @ORM\ManyToOne(targetEntity="KeurGuiImmoBundle\Entity\Localite")
     * @ORM\JoinColumn(name="idLocalite", referencedColumnName="id")
     */
    private $localite;

    /**
     * @ORM\ManyToOne(targetEntity="KeurGuiImmoBundle\Entity\TypeBien")
     * @ORM\JoinColumn(name="idTypeBien", referencedColumnName="id")
     */
    private $typeBien;

     /**
     * @ORM\OneToMany(targetEntity="KeurGuiImmoBundle\Entity\Image", mappedBy="Bien")
     */
    private $imagesBien;

  
     /**
     * @ORM\OneToMany(targetEntity="KeurGuiImmoBundle\Entity\Reservation", mappedBy="Bien")
     */
    private $reservation;


     /**
     * @ORM\OneToMany(targetEntity="KeurGuiImmoBundle\Entity\BienPhotos", mappedBy="Bien")
     */
    private $photos;




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
     * Set nomBien
     *
     * @param string $nomBien
     *
     * @return Bien
     */
    public function setNomBien($nomBien)
    {
        $this->nomBien = $nomBien;

        return $this;
    }

    /**
     * Get nomBien
     *
     * @return string
     */
    public function getNomBien()
    {
        return $this->nomBien;
    }

    /**
     * Set etatBien
     *
     * @param boolean $etatBien
     *
     * @return Bien
     */
    public function setEtatBien($etatBien)
    {
        $this->etatBien = $etatBien;

        return $this;
    }

    /**
     * Get etatBien
     *
     * @return bool
     */
    public function getEtatBien()
    {
        return $this->etatBien;
    }

    /**
     * Set descriptionBien
     *
     * @param string $descriptionBien
     *
     * @return Bien
     */
    public function setDescriptionBien($descriptionBien)
    {
        $this->descriptionBien = $descriptionBien;

        return $this;
    }

    /**
     * Get descriptionBien
     *
     * @return string
     */
    public function getDescriptionBien()
    {
        return $this->descriptionBien;
    }

    /**
     * Set prixLoction
     *
     * @param integer $prixLoction
     *
     * @return Bien
     */
    public function setPrixLocation($prixLocation)
    {
        $this->prixLocation = $prixLocation;

        return $this;
    }

    /**
     * Get prixLoction
     *
     * @return integer
     */
    public function getPrixLocation()
    {
        return $this->prixLocation;
    }

    /**
     * Set localite
     *
     * @param \KeurGuiImmoBundle\Entity\Localite $localite
     *
     * @return Bien
     */
    public function setLocalite(\KeurGuiImmoBundle\Entity\Localite $localite = null)
    {
        $this->Localite = $localite;

        return $this;
    }

    /**
     * Get localite
     *
     * @return \KeurGuiImmoBundle\Entity\Localite
     */
    public function getLocalite()
    {
        return $this->Localite;
    }

    /**
     * Get typeBien
     *
     * @return \KeurGuiImmoBundle\Entity\TypeBien
     */
    public function getTypeBien()
    {
        return $this->typeBien;
    }

    /**
     * Get localite
     *
     * @return \KeurGuiImmoBundle\Entity\TypeBien $typeBien
     */
    public function setTypeBien($typeBien)
    {
        $this->typeBien = $typeBien;
        return $this;
    }

    /**
     * Get imagesBien
     *
     * @return \KeurGuiImmoBundle\Entity\Image
     */
    public function getImagesBien()
    {
        return $this->ImagesBien;
    }

    /**
     * Get localite
     *
     * @return \KeurGuiImmoBundle\Entity\TypeBien $typeBien
     */
    public function setImagesBien($imagesBien)
    {
        $this->imagesBien = $imagesBien;
        return $this;
    }
}
