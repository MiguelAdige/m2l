<?php

namespace M2L\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * messagerie
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class messagerie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="expediteur", type="integer")
     */
    private $expediteur;

    /**
     * @var integer
     *
     * @ORM\Column(name="destinataire", type="integer")
     */
    private $destinataire;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="msqg", type="text")
     */
    private $msqg;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lu", type="boolean")
     */
    private $lu;


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
     * Set expediteur
     *
     * @param integer $expediteur
     * @return messagerie
     */
    public function setExpediteur($expediteur)
    {
        $this->expediteur = $expediteur;
    
        return $this;
    }

    /**
     * Get expediteur
     *
     * @return integer 
     */
    public function getExpediteur()
    {
        return $this->expediteur;
    }

    /**
     * Set destinataire
     *
     * @param integer $destinataire
     * @return messagerie
     */
    public function setDestinataire($destinataire)
    {
        $this->destinataire = $destinataire;
    
        return $this;
    }

    /**
     * Get destinataire
     *
     * @return integer 
     */
    public function getDestinataire()
    {
        return $this->destinataire;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return messagerie
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set msqg
     *
     * @param string $msqg
     * @return messagerie
     */
    public function setMsqg($msqg)
    {
        $this->msqg = $msqg;
    
        return $this;
    }

    /**
     * Get msqg
     *
     * @return string 
     */
    public function getMsqg()
    {
        return $this->msqg;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return messagerie
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set lu
     *
     * @param boolean $lu
     * @return messagerie
     */
    public function setLu($lu)
    {
        $this->lu = $lu;
    
        return $this;
    }

    /**
     * Get lu
     *
     * @return boolean 
     */
    public function getLu()
    {
        return $this->lu;
    }
}
