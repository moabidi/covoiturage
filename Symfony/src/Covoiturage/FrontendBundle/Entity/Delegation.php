<?php

namespace Covoiturage\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Delegation
 *
 * @ORM\Table(name="delegation")
 * @ORM\Entity
 */
class Delegation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=200, nullable=false)
     */
    private $name;

    /**
     * @var \Gouvernorat
     *
     * @ORM\ManyToOne(targetEntity="Gouvernorat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_gouvernorat", referencedColumnName="id")
     * })
     */
    private $idGouvernorat;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Delegation
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set idGouvernorat
     *
     * @param \Covoiturage\FrontendBundle\Entity\Gouvernorat $idGouvernorat
     * @return Delegation
     */
    public function setIdGouvernorat(\Covoiturage\FrontendBundle\Entity\Gouvernorat $idGouvernorat = null)
    {
        $this->idGouvernorat = $idGouvernorat;
    
        return $this;
    }

    /**
     * Get idGouvernorat
     *
     * @return \Covoiturage\FrontendBundle\Entity\Gouvernorat 
     */
    public function getIdGouvernorat()
    {
        return $this->idGouvernorat;
    }
}