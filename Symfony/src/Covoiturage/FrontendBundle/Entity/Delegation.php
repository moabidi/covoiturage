<?php

namespace Covoiturage\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Delegation
 *
 * @ORM\Entity
 */
class Delegation extends Localite
{

    public function __construct($type = "Delegation")
    {
        $this->setType($type);
    }

}