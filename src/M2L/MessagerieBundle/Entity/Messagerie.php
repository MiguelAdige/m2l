<?php

namespace M2L\MessagerieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Messagerie
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Messagerie
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
     * @var string
     *
     * @ORM\Column(name="expediteur", type="string")
     */
    private $expediteur;

    /**
     * @var string
     *
     * @ORM\Column(name="destinataire", type="string")
     * @Assert\NotBlank()
     */
    private $destinataire;

    /**
     * @var string
     *
     * @ORM\Column(name="msg", type="text")
     * @Assert\NotBlank()
     */
    private $msg;

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
     * @var string
     *
     * @ORM\Column(name="expedie", type="string")
     */
    private $expedie;


    public function __construct()
    {
        $this->date = new \DateTime();
        $this->lu = false;
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
     * Set expediteur
     *
     * @param integer $expediteur
     * @return Messagerie
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
     * @return Messagerie
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
     * Set msg
     *
     * @param string $msg
     * @return Messagerie
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    
        return $this;
    }

    /**
     * Get msg
     *
     * @return string 
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Messagerie
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *s
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
     * @return Messagerie
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

    /**
     * Set expedie_par
     *
     * @param \string $expedie
     * @return Messagerie
     */
    public function setExpedie($expedie)
    {
        $this->expedie = $expedie;
    
        return $this;
    }

    /**
     * Get expedie_par
     *
     * @return \string 
     */
    public function getExpedie()
    {
        return $this->expedie;
    }
}
