<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserSkill
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="UserSkillRepository")
 * 
 */
class UserSkill {

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
     * @ORM\Column(name="value", type="integer")
     */
    private $value;

    /**
     * @var User
     * 
     * @ORM\ManyToOne(targetEntity="User", inversedBy="userSkills")
     */
    private $user;

    /**
     * @var Skill
     * 
     * @ORM\ManyToOne(targetEntity="Skill", inversedBy="userSkills")
     */
    private $skill;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set value
     *
     * @param integer $value
     * @return UserSkill
     */
    public function setValue($value) {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * Set user
     *
     * @param User $user
     * @return UserSkill
     */
    public function setUser(User $user = null) {
        $this->user = $user;
        $user->addUserSkill($this);
        return $this;
    }

    /**
     * Get user
     *
     * @return User 
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set skill
     *
     * @param Skill $skill
     * @return UserSkill
     */
    public function setSkill(Skill $skill = null) {
        $this->skill = $skill;
        $skill->addUserSkill($this);
        return $this;
    }

    /**
     *  
     * Get skill
     *
     * @return Skill 
     */
    public function getSkill() {
        return $this->skill;
    }

}
