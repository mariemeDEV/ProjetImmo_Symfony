<?php

namespace KeurGuiImmoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BienPhotos
 *
 * @ORM\Table(name="bien_photos")
 * @ORM\Entity(repositoryClass="KeurGuiImmoBundle\Repository\BienPhotosRepository")
 */
class BienPhotos
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
     * @ORM\ManyToOne(targetEntity="KeurGuiImmoBundle\Entity\Bien")
     * @ORM\JoinColumn(name="idBien", referencedColumnName="id")
     */
    private $bien;

      /**
     * @ORM\ManyToOne(targetEntity="KeurGuiImmoBundle\Entity\Image")
     * @ORM\JoinColumn(name="idImage", referencedColumnName="id")
     */
    private $image;


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
     * Set bien
     *
     * @param \KeurGuiImmoBundle\Entity\Bien $bien
     *
     * @return BienPhotos
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
     * Set image
     *
     * @param \KeurGuiImmoBundle\Entity\Image $image
     *
     * @return BienPhotos
     */
    public function setImage(\KeurGuiImmoBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \KeurGuiImmoBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }
}
