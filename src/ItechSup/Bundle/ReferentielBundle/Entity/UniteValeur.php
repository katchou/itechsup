<?php

namespace ItechSup\Bundle\ReferentielBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * UniteEnseignement
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class UniteValeur
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="UniteEnseignement", mappedBy="uv")
     */
    protected $ues;

    public function __construct()
    {
        $this->ues = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return UniteEnseignement
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
     * Set volumeCours
     *
     * @param integer $volumeCours
     * @return UniteEnseignement
     */
    public function setVolumeCours($volumeCours)
    {
        $this->volumeCours = $volumeCours;

        return $this;
    }

    /**
     * Get volumeCours
     *
     * @return integer
     */
    public function getVolumeCours()
    {
        return $this->volumeCours;
    }

    /**
     * Set volumeTP
     *
     * @param integer $volumeTP
     * @return UniteEnseignement
     */
    public function setVolumeTP($volumeTP)
    {
        $this->volumeTP = $volumeTP;

        return $this;
    }

    /**
     * Get volumeTP
     *
     * @return integer
     */
    public function getVolumeTP()
    {
        return $this->volumeTP;
    }

    /**
     * Set creditECTS
     *
     * @param integer $creditECTS
     * @return UniteEnseignement
     */
    public function setCreditECTS($creditECTS)
    {
        $this->creditECTS = $creditECTS;

        return $this;
    }

    /**
     * Get creditECTS
     *
     * @return integer
     */
    public function getCreditECTS()
    {
        return $this->creditECTS;
    }

    /**
     * Add ues
     *
     * @param \ItechSup\Bundle\ReferentielBundle\Entity\UniteEnseignement $ues
     * @return UniteValeur
     */
    public function addUe(\ItechSup\Bundle\ReferentielBundle\Entity\UniteEnseignement $ues)
    {
        $this->ues[] = $ues;

        return $this;
    }

    /**
     * Remove ues
     *
     * @param \ItechSup\Bundle\ReferentielBundle\Entity\UniteEnseignement $ues
     */
    public function removeUe(\ItechSup\Bundle\ReferentielBundle\Entity\UniteEnseignement $ues)
    {
        $this->ues->removeElement($ues);
    }

    /**
     * Get ues
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUes()
    {
        return $this->ues;
    }
}
