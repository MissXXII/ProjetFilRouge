<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stage
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Stage
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="volume", type="integer")
     */
    private $volume;

	/**
	 *
	 * @var project
	 * @ORM\ManyToOne(targetEntity="Project", inversedBy="stages")
	 */
	private $project;
	
	/**
	 *
	 * @var boolean
	 * @ORM\Column(name="status", type="boolean")
	 */
	private $status;
	
	public function __construct() {
		$this->status = false;
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
     * Set title
     *
     * @param string $title
     * @return stage
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set volume
     *
     * @param integer $volume
     * @return stage
     */
    public function setVolume($volume) {
		if ($volume < 0) {
			$volume = abs($volume);
		}
        $this->volume = $volume;
        return $this;
    }

    /**
     * Get volume
     *
     * @return integer 
     */
    public function getVolume()
    {
        return $this->volume;
    }

	public function getProjectRelativeVolume() {
		$this->getProject()->getTotalStageVolume();
		
		return $this->volume/$this->getProject()->getTotalStageVolume()*100;
	}
	
    /**
     * Set project
     *
     * @param \AppBundle\Entity\Project $project
     * @return Stage
     */
    public function setProject(\AppBundle\Entity\Project $project = null) {
        $this->project = $project;
        return $this;
    }

    /**
     * Get project
     *
     * @return \AppBundle\Entity\Project 
     */
    public function getProject() {
        return $this->project;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Stage
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus() {
        return $this->status;
    }
}