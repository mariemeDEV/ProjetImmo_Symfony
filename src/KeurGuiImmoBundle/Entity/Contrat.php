<?php

namespace KeurGuiImmoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contrat
 *
 * @ORM\Table(name="contrat")
 * @ORM\Entity(repositoryClass="KeurGuiImmoBundle\Repository\ContratRepository")
 */
class Contrat
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateContrat", type="datetime")
     */
    private $dateContrat;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string")
     */
    private $etat;

    /**
     * @var integer
     *
     * @ORM\Column(name="caution", type="integer")
     */
    private $caution;

    /**
     * @var integer
     *
     * @ORM\Column(name="duree", type="integer")
     */
    private $duree;

    /**
     * @ORM\ManyToOne(targetEntity="KeurGuiImmoBundle\Entity\Bien")
     * @ORM\JoinColumn(name="idBien", referencedColumnName="id")
     */
    private $bien;
    
    /**
     * @ORM\ManyToOne(targetEntity="KeurGuiImmoBundle\Entity\Client")
     * @ORM\JoinColumn(name="idClient", referencedColumnName="id")
     */
    private $client;

    /**
     * @ORM\OneToMany(targetEntity="KeurGuiImmoBundle\Entity\Paiement", mappedBy="Contrat")
     */
    private $paiement;


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
     * Set dateContrat
     *
     * @param \DateTime $dateContrat
     *
     * @return Contrat
     */
    public function setDateContrat($dateContrat)
    {
        $this->dateContrat = $dateContrat;

        return $this;
    }

    /**
     * Get dateContrat
     *
     * @return \DateTime
     */
    public function getDateContrat()
    {
        return $this->dateContrat;
    }

    /**
     * Set caution
     *
     * @param integer $caution
     *
     * @return Contrat
     */
    public function setCaution($caution)
    {
        $this->caution = $caution;

        return $this;
    }

    /**
     * Get caution
     *
     * @return integer
     */
    public function getCaution()
    {
        return $this->caution;
    }


    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Contrat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getetat()
    {
        return $this->etat;
    }


    /**
     * Set idBien
     *
     * @param integer $idBien
     *
     * @return Contrat
     */
    public function setIdBien($idBien)
    {
        $this->idBien = $idBien;

        return $this;
    }

    /**
     * Get idBien
     *
     * @return int
     */
    public function getIdBien()
    {
        return $this->idBien;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     *
     * @return Contrat
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return integer
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set bien
     *
     * @param \KeurGuiImmoBundle\Entity\Bien $bien
     *
     * @return Contrat
     */
    public function setBien(\KeurGuiImmoBundle\Entity\Bien $bien = null)
    {
        $this->bien = $bien;

        return $this;
    }

    /**
     * Get bien
     *
     * @return \KeurGuiImmoBundle\Entity\Bien
     */
    public function getBien()
    {
        return $this->bien;
    }

    /**
     * Set client
     *
     * @param \KeurGuiImmoBundle\Entity\Client $client
     *
     * @return Contrat
     */
    public function setClient(\KeurGuiImmoBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \KeurGuiImmoBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }
}
