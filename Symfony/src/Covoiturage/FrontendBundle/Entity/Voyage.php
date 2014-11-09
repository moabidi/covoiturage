<?php

namespace Covoiturage\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

// This class represents a Navette
/**
 * Voyage
 *
 * @ORM\Table(name="voyage")
 * @ORM\Entity
 */
class Voyage
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
     * @ORM\Column(name="horaire", type="time", length=16, nullable=true)
     */
    private $horaire;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer", nullable=true)
     */
    private $prix;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_place", type="integer", nullable=true)
     */
    private $nbPlace;

    /**
     * @var integer
     *
     * @ORM\Column(name="frequence", type="string",length=255, nullable=true)
     */
    private $frequence;

    /**
     * @var \Localite
     *
     * @ORM\ManyToOne(targetEntity="Localite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_arrive", referencedColumnName="id")
     * })
     */
    private $idArrive;

    /**
     * @var \Localite
     *
     * @ORM\ManyToOne(targetEntity="Localite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_depart", referencedColumnName="id")
     * })
     */
    private $idDepart;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utilsateur", referencedColumnName="id")
     * })
     */
    private $utilisateur;



    /**
     * @var \Voiture
     *
     * @ORM\ManyToOne(targetEntity="Voiture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_voiture", referencedColumnName="id")
     * })
     */
    private $idVoiture;

    public function __construct()
    {
        $this->horaire = new \Datetime();
    }



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
     * Set horaire
     *
     * @param string $horaire
     * @return Voyage
     */
    public function setHoraire($horaire)
    {
        $this->horaire = $horaire;
    
        return $this;
    }

    /**
     * Get horaire
     *
     * @return string 
     */
    public function getHoraire()
    {
        return $this->horaire;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     * @return Voyage
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    
        return $this;
    }

    /**
     * Get prix
     *
     * @return integer 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set nbPlace
     *
     * @param integer $nbPlace
     * @return Voyage
     */
    public function setNbPlace($nbPlace)
    {
        $this->nbPlace = $nbPlace;
    
        return $this;
    }

    /**
     * Get nbPlace
     *
     * @return integer 
     */
    public function getNbPlace()
    {
        return $this->nbPlace;
    }

    /**
     * Set frequence
     *
     * @param integer $frequence
     * @return Voyage
     */
    public function setFrequence($frequence)
    {
        $this->frequence = $frequence;
    
        return $this;
    }

    /**
     * Get frequence
     *
     * @return integer 
     */
    public function getFrequence()
    {
        return $this->frequence;
    }

    /**
     * Set idArrive
     *
     * @param \Covoiturage\FrontendBundle\Entity\Delegation $idArrive
     * @return Voyage
     */
    public function setIdArrive(\Covoiturage\FrontendBundle\Entity\Delegation $idArrive = null)
    {
        $this->idArrive = $idArrive;
    
        return $this;
    }

    /**
     * Get idArrive
     *
     * @return \Covoiturage\FrontendBundle\Entity\Delegation 
     */
    public function getIdArrive()
    {
        return $this->idArrive;
    }

    /**
     * Set idDepart
     *
     * @param \Covoiturage\FrontendBundle\Entity\Delegation $idDepart
     * @return Voyage
     */
    public function setIdDepart(\Covoiturage\FrontendBundle\Entity\Delegation $idDepart = null)
    {
        $this->idDepart = $idDepart;
    
        return $this;
    }

    /**
     * Get idDepart
     *
     * @return \Covoiturage\FrontendBundle\Entity\Delegation 
     */
    public function getIdDepart()
    {
        return $this->idDepart;
    }

    /**
     * Set idVoiture
     *
     * @param \Covoiturage\FrontendBundle\Entity\Voiture $idVoiture
     * @return Voyage
     */
    public function setIdVoiture(\Covoiturage\FrontendBundle\Entity\Voiture $idVoiture = null)
    {
        $this->idVoiture = $idVoiture;
    
        return $this;
    }

    /**
     * Get idVoiture
     *
     * @return \Covoiturage\FrontendBundle\Entity\Voiture 
     */
    public function getIdVoiture()
    {
        return $this->idVoiture;
    }
}