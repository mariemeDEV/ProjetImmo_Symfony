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
     * @ORM\Column(name="image", type="string", nullable=true)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="KeurGuiImmoBundle\Entity\Bien", inversedBy="image")
     */
    private $bien;

     /**
     * @ORM\OneToMany(targetEntity="KeurGuiImmoBundle\Entity\BienPhotos", mappedBy="image")
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
     * set bien
     *
     * @param keur_gui_immo/KeurGuiImmoBundle/Entity/Bien
     *
     * @return Image
     */
    public function setBien($bien)
    {
        $this->bien = $bien;
        return $this;
    }

    /**
     *
     * get bien
     *
     * @return Bien
     */
    public function getBien()
    {
        return $this->bien;
    }


    /**
     * set photos
     *
     * @param keur_gui_immo/KeurGuiImmoBundle/Entity/BienPhotos
     *
     * @return Image
     */
    public function setPhotos($photos)
    {
        $this->bien = $photos;
        return $this;
    }

    /**
     *
     * get photos
     *
     * @return BienPhotos
     */
    public function getPhotos()
    {
        return $this->photos;
    }

}


