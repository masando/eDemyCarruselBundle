<?php

namespace eDemy\CarruselBundle\Controller;

use eDemy\MainBundle\Controller\BaseController;
use eDemy\MainBundle\Event\ContentEvent;

class CarruselController extends BaseController
{
    public static function getSubscribedEvents()
    {
        return self::getSubscriptions('carrusel', ['carrusel']);
    }

    public function onFrontpage(ContentEvent $event)
    {
        //$this->get('edemy.meta')->setTitlePrefix("Carrusel");
        $w = (int) str_replace("px", "", $this->getParam('#slider width'));
        $h = (int) str_replace("px", "", $this->getParam('#slider height'));
        $carrusel = $this->getRepository($event->getRoute())->findFirstPublished();
        $this->addEventModule($event, 'flexslider.html.twig', array(
            //'form' => $form->createView(),
            'entity' => $carrusel[0],
            'width' => $w,
            'height' => $h,
        ));
    }
}
