<?php

namespace KeurGuiImmoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contrat
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="KeurGuiImmoBundle\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="idReservation", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \Date
     *
     * @ORM\Column(name="dateReservation", type="date")
     */
    private $dateReservation;

    /**
     * @var string
     *
     * @ORM\Column(name="etatReservation", type="string", length=20)
     */
    private $etat;

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
     * @param \Date $dateReservation
     *
     * @return Reservation
     */
    public function setDateReservation($dateReservation)
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    /**
     * Get dateReservation
     *
     * @return \Date
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

    /**
     * Set caution
     *
     * @param integer $caution
     *
     * @return Reservation

    public function setCaution($caution)
    {
        $this->caution = $caution;

        return $this;
    }

    /**
     * Get caution
     *
     * @return integer

    public function getCaution()
    {
        return $this->caution;
    }*/
}
