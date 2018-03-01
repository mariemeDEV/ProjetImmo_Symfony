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
     * @ORM\Column(name="etatBien", type="integer")
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
     * @ORM\OneToMany(targetEntity="KeurGuiImmoBundle\Entity\Image", mappedBy="bien")
     */
    private $imagesBien;


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
     * @param integer $etatBien
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
     * @return integer
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
    public function setLocalite($localite)
    {
        $this->localite = $localite;

        return $this;
    }

    /**
     * Get localite
     *
     * @return \KeurGuiImmoBundle\Entity\Localite
     */
    public function getLocalite()
    {
        return $this->localite;
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

    public function __construct()
    {
        //par defaut l'attribut images est une collection d'objets
        $this->imagesBien = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * setImagesBien
     *
     * @param /keur_gui_immo/KeurGuiImmoBundle/Entity/Image $imagesBien
     *
     * @return Bien
     */
    public function setImagesBien($imagesBien)
    {
        $this->imagesBien[] = $imagesBien;
        return $this;
    }

    /**
     * getImageBien
     *
     * @return \Doctrine\Common\Collections\Collection
     */
     public function getImagesBien(){
         return $this->imagesBien;
     }

}
