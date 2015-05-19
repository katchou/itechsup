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
class UniteEnseignement
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
     * @var integer
     *
     * @ORM\Column(name="credit_ECTS", type="integer")
     */
    private $creditECTS;

    /**
     * @ORM\ManyToOne(targetEntity="UniteValeur", inversedBy="ues")
     * @ORM\JoinColumn(name="uv_id", referencedColumnName="id")
     */
    protected $uv;

    /**
     * @ORM\OneToMany(targetEntity="ItemEnseignement", mappedBy="ue")
     */
    protected $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();
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
     * Set uv
     *
     * @param \ItechSup\Bundle\ReferentielBundle\Entity\UniteValeur $uv
     * @return UniteEnseignement
     */
    public function setUv(\ItechSup\Bundle\ReferentielBundle\Entity\UniteValeur $uv = null)
    {
        $this->uv = $uv;

        return $this;
    }

    /**
     * Get uv
     *
     * @return \ItechSup\Bundle\ReferentielBundle\Entity\UniteValeur 
     */
    public function getUv()
    {
        return $this->uv;
    }

    /**
     * Add items
     *
     * @param \ItechSup\Bundle\ReferentielBundle\Entity\ItemEnseignement $items
     * @return UniteEnseignement
     */
    public function addItem(\ItechSup\Bundle\ReferentielBundle\Entity\ItemEnseignement $items)
    {
        $this->items[] = $items;

        return $this;
    }

    /**
     * Remove items
     *
     * @param \ItechSup\Bundle\ReferentielBundle\Entity\ItemEnseignement $items
     */
    public function removeItem(\ItechSup\Bundle\ReferentielBundle\Entity\ItemEnseignement $items)
    {
        $this->items->removeElement($items);
    }

    /**
     * Get items
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getItems()
    {
        return $this->items;
    }
}
