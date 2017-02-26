<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Arts
 *
 * @ORM\Table(name="arts")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArtsRepository")
 */
class Arts
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
     * @var string
     *
     * @ORM\Column(name="art_title", type="string", length=80)
     */
    private $artTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="art_description", type="string", length=255)
     */
    private $artDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="art_size", type="string", length=50)
     */
    private $artSize;

    /**
     * @var string
     *
     * @ORM\Column(name="at_canvas", type="string", length=50)
     */
    private $artCanvas;

    /**
     * @var string
     *
     * @ORM\Column(name="art_paint", type="string", length=50)
     */
    private $artPaint;

    /**
     * @var float
     *
     * @ORM\Column(name="art_price", type="float")
     */
    private $artPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="art_titleimage", type="string", length=255)
     */
    private $artTitleimage;

    /**
     * @var string
     *
     * @ORM\Column(name="art_image", type="string", length=255)
     */
    private $artImage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="art_date", type="datetime")
     */
    private $artDate;


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
     * Set artTitle
     *
     * @param string $artTitle
     *
     * @return Arts
     */
    public function setArtTitle($artTitle)
    {
        $this->artTitle = $artTitle;

        return $this;
    }

    /**
     * Get artTitle
     *
     * @return string
     */
    public function getArtTitle()
    {
        return $this->artTitle;
    }

    /**
     * Set artDescription
     *
     * @param string $artDescription
     *
     * @return Arts
     */
    public function setArtDescription($artDescription)
    {
        $this->artDescription = $artDescription;

        return $this;
    }

    /**
     * Get artDescription
     *
     * @return string
     */
    public function getArtDescription()
    {
        return $this->artDescription;
    }

    /**
     * Set artSize
     *
     * @param string $artSize
     *
     * @return Arts
     */
    public function setArtSize($artSize)
    {
        $this->artSize = $artSize;

        return $this;
    }

    /**
     * Get artSize
     *
     * @return string
     */
    public function getArtSize()
    {
        return $this->artSize;
    }

    /**
     * Set artCanvas
     *
     * @param string $artCanvas
     *
     * @return Arts
     */
    public function setArtCanvas($artCanvas)
    {
        $this->artCanvas = $artCanvas;

        return $this;
    }

    /**
     * Get artCanvas
     *
     * @return string
     */
    public function getArtCanvas()
    {
        return $this->artCanvas;
    }

    /**
     * Set artPaint
     *
     * @param string $artPaint
     *
     * @return Arts
     */
    public function setArtPaint($artPaint)
    {
        $this->artPaint = $artPaint;

        return $this;
    }

    /**
     * Get artPaint
     *
     * @return string
     */
    public function getArtPaint()
    {
        return $this->artPaint;
    }

    /**
     * Set artPrice
     *
     * @param float $artPrice
     *
     * @return Arts
     */
    public function setArtPrice($artPrice)
    {
        $this->artPrice = $artPrice;

        return $this;
    }

    /**
     * Get artPrice
     *
     * @return float
     */
    public function getArtPrice()
    {
        return $this->artPrice;
    }

    /**
     * Set artTitleimage
     *
     * @param string $artTitleimage
     *
     * @return Arts
     */
    public function setArtTitleimage($artTitleimage)
    {
        $this->artTitleimage = $artTitleimage;

        return $this;
    }

    /**
     * Get artTitleimage
     *
     * @return string
     */
    public function getArtTitleimage()
    {
        return $this->artTitleimage;
    }

    /**
     * Set artImage
     *
     * @param string $artImage
     *
     * @return Arts
     */
    public function setArtImage($artImage)
    {
        $this->artImage = $artImage;

        return $this;
    }

    /**
     * Get artImage
     *
     * @return string
     */
    public function getArtImage()
    {
        return $this->artImage;
    }

    /**
     * Set artDate
     *
     * @param \DateTime $artDate
     *
     * @return Arts
     */
    public function setArtDate($artDate)
    {
        $this->artDate = $artDate;

        return $this;
    }

    /**
     * Get artDate
     *
     * @return \DateTime
     */
    public function getArtDate()
    {
        return $this->artDate;
    }
}

