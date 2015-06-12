<?php

namespace eDemy\CarruselBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;
use eDemy\MainBundle\Entity\BaseEntity;

/**
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="eDemy\CarruselBundle\Entity\CarruselRepository")
 */
class Carrusel extends BaseEntity
{
    public function __construct($em)
    {
        parent::__construct($em);
        $this->imagenes = new ArrayCollection();
    }

    public function __toString()
    {
        return (string)$this->getId();
    }
    
    /**
     * @ORM\OneToMany(targetEntity="eDemy\CarruselBundle\Entity\Imagen", mappedBy="carrusel", cascade={"persist","remove"})
     */
    protected $imagenes;


    public function getImagenes()
    {
        return $this->imagenes;
    }

    public function addImagen(Imagen $imagen)
    {
        $imagen->setCarrusel($this);
        $this->imagenes->add($imagen);
    }

    public function removeImagen(Imagen $imagen)
    {
        $this->imagenes->removeElement($imagen);
        $this->getEntityManager()->remove($imagen);
    }
    
    public function showImagenesInPanel() 
    {
        return true;
    }

    public function showImagenesInForm() 
    {
        return true;
    }
}
