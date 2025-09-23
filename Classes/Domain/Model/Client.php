<?php

declare(strict_types=1);

namespace MarekSkopal\MsReference\Domain\Model;

use Stringable;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Client extends AbstractEntity implements Stringable
{
    protected string $title = '';

    /** @var ObjectStorage<FileReference> */
    #[Lazy()]
    protected ObjectStorage $images;

    protected string $perex = '';

    protected string $text = '';

    protected string $linkExternal = '';

    protected string $class = '';

    protected float $gpsLatitude = 0.0;

    protected float $gpsLongitude = 0.0;

    protected string $street = '';

    protected string $city = '';

    protected string $zip = '';

    /** @var ObjectStorage<Reference> */
    #[Lazy()]
    protected ObjectStorage $references;

    public function __construct()
    {
        $this->initializeObject();
    }

    public function initializeObject(): void
    {
        $this->images = new ObjectStorage();
        $this->references = new ObjectStorage();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /** @return ObjectStorage<FileReference> $images */
    public function getImages(): ObjectStorage
    {
        return $this->images;
    }

    /** @param ObjectStorage<FileReference> $images */
    public function setImages(ObjectStorage $images): void
    {
        $this->images = $images;
    }

    public function getImageMain(): ?FileReference
    {
        $this->images->rewind();
        return $this->images->current();
    }

    public function getPerex(): string
    {
        return $this->perex;
    }

    public function setPerex(string $perex): void
    {
        $this->perex = $perex;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getLinkExternal(): string
    {
        return $this->linkExternal;
    }

    public function setLinkExternal(string $linkExternal): void
    {
        $this->linkExternal = $linkExternal;
    }

    public function getClass(): string
    {
        return $this->class;
    }

    public function setClass(string $class): void
    {
        $this->class = $class;
    }

    public function getGpsLatitude(): float
    {
        return $this->gpsLatitude;
    }

    public function setGpsLatitude(float $gpsLatitude): void
    {
        $this->gpsLatitude = $gpsLatitude;
    }

    public function getGpsLongitude(): float
    {
        return $this->gpsLongitude;
    }

    public function setGpsLongitude(float $gpsLongitude): void
    {
        $this->gpsLongitude = $gpsLongitude;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getZip(): string
    {
        return $this->zip;
    }

    public function setZip(string $zip): void
    {
        $this->zip = $zip;
    }

    /** @return ObjectStorage<Reference> $reference */
    public function getReferences(): ObjectStorage
    {
        return $this->references;
    }

    /**
     * Sets the references
     *
     * @param ObjectStorage<Reference> $reference
     * @return void
     */
    public function setReferences(ObjectStorage $reference): void
    {
        $this->references = $reference;
    }
}
