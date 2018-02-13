<?php

namespace KeurGuiImmoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contrat
 *
 * @ORM\Table(name="contrat")
 * @ORM\Entity(repositoryClass="KeurGuiImmoBundle\Repository\ContratRepository")
 */
class Reservation
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
     * @ORM\Column(name="dateReservation", type="datetime")
     */
    private $dateReservation;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=20)
     */
    private $etat;

    /**
     * @ORM\OneToOne(targetEntity="KeurGuiImmoBundle\Entity\TypeBien")
     * @ORM\JoinColumn(name="idTypeBien", referencedColumnName="id")
     */
    private $typeBien;

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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateReservation
     *
     * @param \DateTime $dateReservation
     *
     * @return Contrat
     */
    public function setDateReservation($dateReservation)
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    /**
     * Get dateReservation
     *
     * @return \DateTime
     */
    public function getDateReservation()
    {
        return $this->dateReservation;
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
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set typeBien
     *
     * @param \KeurGuiImmoBundle\Entity\TypeBien $typeBien
     *
     * @return Reservation
     */
    public function setTypeBien(\KeurGuiImmoBundle\Entity\TypeBien $typeBien = null)
    {
        $this->typeBien = $typeBien;

        return $this;
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
     * Set bien
     *
     * @param \KeurGuiImmoBundle\Entity\Bien $bien
     *
     * @return Reservation
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
     * @return Reservation
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
