<?php

namespace eDemy\CarruselBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;
use eDemy\MainBundle\Entity\BaseImagen;

/**
 * @ORM\Table("CarruselImagen")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity
 */
class Imagen extends BaseImagen
{
    public function __construct($em = null)
    {
        parent::__construct($em);
    }

    /**
     * @ORM\ManyToOne(targetEntity="eDemy\CarruselBundle\Entity\Carrusel", inversedBy="imagenes")
     */
    protected $carrusel;

    public function setCarrusel($carrusel)
    {
        $this->carrusel = $carrusel;

        return $this;
    }

    public function getCarrusel()
    {
        return $this->carrusel;
    }

    protected $webpath;
    
    public function showWebpathInForm()
    {
        return true;
    }
}
