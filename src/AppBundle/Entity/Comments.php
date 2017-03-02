<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * comments
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\commentsRepository")
 */
class Comments
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int $userId
     *
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Users")
     */
    private $userId;

    /**
     * @var int $artId
     *
     * @ORM\JoinColumn(name="art_id", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Arts")
     */
    private $artId;

    /**
     * @var string
     *
     * @ORM\Column(name="at_comment", type="string", length=255)
     */
    private $artComment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="comment_date", type="datetime")
     */
    private $commentDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="comment_delete", type="datetime")
     */
    private $commentDelete;
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return comments
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set artId
     *
     * @param integer $artId
     *
     * @return comments
     */
    public function setArtId($artId)
    {
        $this->artId = $artId;

        return $this;
    }

    /**
     * Get artId
     *
     * @return int
     */
    public function getArtId()
    {
        return $this->artId;
    }

    /**
     * Set atComment
     *
     * @param string $atComment
     *
     * @return comments
     */
    public function setArtComment($atComment)
    {
        $this->atComment = $artComment;

        return $this;
    }

    /**
     * Get atComment
     *
     * @return string
     */
    public function getArtComment()
    {
        return $this->artComment;
    }

    /**
     * Set commentDate
     *
     * @param \DateTime $commentDate
     *
     * @return comments
     */
    public function setCommentDate($commentDate)
    {
        $this->commentDate = $commentDate;

        return $this;
    }

    /**
     * Get commentDate
     *
     * @return \DateTime
     */
    public function getCommentDate()
    {
        return $this->commentDate;
    }

    /**
     * Set commentDelete
     *
     * @param \DateTime $commentDelete
     *
     * @return Comments
     */
    public function setCommentDelete($commentDelete)
    {
        $this->commentDelete = $commentDelete;

        return $this;
    }

    /**
     * Get commentDelete
     *
     * @return \DateTime
     */
    public function getCommentDelete()
    {
        return $this->commentDelete;
    }
}
