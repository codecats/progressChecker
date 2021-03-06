<?php

namespace CodeCats\PanelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * Progress
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CodeCats\PanelBundle\Entity\ProgressRepository")
 */
class Progress implements \JsonSerializable
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description = null;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="started", type="datetime")
     */
    private $started;

    /**
     * @ORM\Column(name="startedTime", type="time")
     */
    private $startedTime;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="ended", type="datetime")
     */
    private $ended;

    /**
     * @ORM\Column(name="endedTime", type="time")
     */
    private $endedTime;
    /**
     * @ORM\ManyToOne(targetEntity="CodeCats\PanelBundle\Entity\Category", inversedBy="progresses")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="CodeCats\PanelBundle\Entity\User", inversedBy="progresses")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="CodeCats\PanelBundle\Entity\Project", inversedBy="progresses")
     *
     */
    private $project;

    public function __construct()
    {
        $this->setStarted(new DateTime());
        $this->setEnded(new DateTime());
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
     * @return Progress
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
     * Set description
     *
     * @param string $description
     * @return Progress
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    public function setStarted($date)
    {
        $this->started = $date;
    }

    public function getStarted()
    {
        return $this->started;
    }

    public function setEnded($date)
    {
        $this->ended = $date;
    }

    public function getEnded()
    {
        return $this->ended;
    }
    public function setStartedTime($startedTime)
    {
        $this->startedTime = $startedTime;
    }

    public function getStartedTime()
    {
        return $this->startedTime;
    }
    public function setEndedTime($endedTime)
    {
        $this->endedTime = $endedTime;
    }

    public function getEndedTime()
    {
        return $this->endedTime;
    }

    public function setCategory(Category $category)
    {
        $this->category = $category;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setProject(Project $project)
    {
        $this->project = $project;
    }

    public function getProject()
    {
        return $this->project;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        $pattern = 'Y-m-d';

        return array(
            'id'            => $this->getId(),
            'title'         => $this->getTitle(),
            'description'   => $this->getDescription(),
            'started'       => $this->getStarted()->format($pattern),
            'startedTime'   => $this->getStartedTime()->format('H:i'),
            'ended'         => $this->getEnded()->format($pattern),
            'endedTime'     => $this->getEndedTime()->format('H:i'),
            'category'      => $this->getCategory(),
            'user'          => $this->getUser(),
            'project'       => $this->getProject()
        );
    }
}
