<?php

namespace KeurGuiImmoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity(repositoryClass="KeurGuiImmoBundle\Repository\ImageRepository")
 */
class Image
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
     * @ORM\Column(name="image", type="blob", nullable=true)
     */
    private $image;


     /**
     * @ORM\OneToMany(targetEntity="KeurGuiImmoBundle\Entity\BienPhotos", mappedBy="Image")
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
     * Set image
     *
     * @param string $image
     *
     * @return Image
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
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
     * @return Image
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
