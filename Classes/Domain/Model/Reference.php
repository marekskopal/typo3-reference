<?php

declare(strict_types=1);

namespace MarekSkopal\MsReference\Domain\Model;

use DateTime;
use Stringable;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Reference extends AbstractEntity implements Stringable
{
    protected string $title = '';

    protected string $subtitle = '';

    protected string $navtitle = '';

    protected bool $important = false;

    protected string $url = '';

    /** @var ObjectStorage<ParamValue> */
    #[Lazy()]
    protected ObjectStorage $paramValues;

    /** @var ObjectStorage<FileReference> */
    #[Lazy()]
    protected ObjectStorage $images;

    /** @var ObjectStorage<FileReference> */
    #[Lazy()]
    protected ObjectStorage $files;

    protected ?DateTime $realizationDate = null;

    protected float $gpsLatitude = 0.0;

    protected float $gpsLongitude = 0.0;

    protected string $perex = '';

    protected string $text = '';

    protected string $street = '';

    protected string $city = '';

    protected string $zip = '';

    /** @var ObjectStorage<Category> */
    #[Lazy()]
    protected ObjectStorage $categories;

    protected string $metaKeywords = '';

    protected string $metaDescription = '';

    protected bool $currentProject = false;

    /** @var ObjectStorage<Reference> */
    #[Lazy()]
    protected ObjectStorage $similarReferences;

    /** @var ObjectStorage<Client> */
    #[Lazy()]
    protected ObjectStorage $clients;

    protected int $sorting = 0;

    public function __construct()
    {
        $this->initializeObject();
    }

    public function initializeObject(): void
    {
        $this->paramValues = new ObjectStorage();
        $this->images = new ObjectStorage();
        $this->files = new ObjectStorage();
        $this->categories = new ObjectStorage();
        $this->similarReferences = new ObjectStorage();
        $this->clients = new ObjectStorage();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getSubtitle(): string
    {
        return $this->subtitle;
    }

    public function setSubtitle(string $subtitle): void
    {
        $this->subtitle = $subtitle;
    }

    public function getNavtitle(): string
    {
        return $this->navtitle;
    }

    public function setNavtitle(string $navtitle): void
    {
        $this->navtitle = $navtitle;
    }

    public function getImportant(): bool
    {
        return $this->important;
    }

    public function setImportant(bool $important): void
    {
        $this->important = $important;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function addParamValue(ParamValue $paramValue): void
    {
        $this->paramValues->attach($paramValue);
    }

    public function removeParamValue(ParamValue $paramValue): void
    {
        $this->paramValues->detach($paramValue);
    }

    /** @return ObjectStorage<ParamValue> */
    public function getParamValues(): ObjectStorage
    {
        return $this->paramValues;
    }

    /** @param ObjectStorage<ParamValue> $paramValues */
    public function setParamValues(ObjectStorage $paramValues): void
    {
        $this->paramValues = $paramValues;
    }

    /** @return ObjectStorage<FileReference> */
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

    /** @return ObjectStorage<FileReference> */
    public function getFiles(): ObjectStorage
    {
        return $this->files;
    }

    /** @param ObjectStorage<FileReference> $files */
    public function setFiles(ObjectStorage $files): void
    {
        $this->files = $files;
    }

    public function getRealizationDate(): ?DateTime
    {
        return $this->realizationDate;
    }

    public function setRealizationDate(?DateTime $realizationDate): void
    {
        $this->realizationDate = $realizationDate;
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

    public function getShowLocation(): bool
    {
        return $this->gpsLatitude > 0.0 && $this->gpsLongitude > 0.0;
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

    public function addCategory(Category $category): void
    {
        $this->categories->attach($category);
    }

    public function removeCategory(Category $category): void
    {
        $this->categories->detach($category);
    }

    /** @return ObjectStorage<Category> */
    public function getCategories(): ObjectStorage
    {
        return $this->categories;
    }

    public function hasCategory(Category $category): bool
    {
        return $this->categories->offsetExists($category);
    }

    /** @param ObjectStorage<Category> $category */
    public function setCategories(ObjectStorage $category): void
    {
        $this->categories = $category;
    }

    public function getMetaKeywords(): string
    {
        return $this->metaKeywords;
    }

    public function setMetaKeywords(string $metaKeywords): void
    {
        $this->metaKeywords = $metaKeywords;
    }

    public function getMetaDescription(): string
    {
        return $this->metaDescription;
    }

    public function setMetaDescription(string $metaDescription): void
    {
        $this->metaDescription = $metaDescription;
    }

    public function getCurrentProject(): bool
    {
        return $this->currentProject;
    }

    public function setCurrentProject(bool $currentProject): void
    {
        $this->currentProject = $currentProject;
    }

    public function addSimilarReference(Reference $similarReference): void
    {
        $this->similarReferences->attach($similarReference);
    }

    public function removeSimilarReference(Reference $similarReference): void
    {
        $this->similarReferences->detach($similarReference);
    }

    /** @return ObjectStorage<Reference> */
    public function getSimilarReferences(): ObjectStorage
    {
        return $this->similarReferences;
    }

    /** @param ObjectStorage<Reference> $similarReferences */
    public function setSimilarReferences(ObjectStorage $similarReferences): void
    {
        $this->similarReferences = $similarReferences;
    }

    /** @return ObjectStorage<Client> $clients */
    public function getClients(): ObjectStorage
    {
        return $this->clients;
    }

    /** @param ObjectStorage<Client> $clients */
    public function setClients(ObjectStorage $clients): void
    {
        $this->clients = $clients;
    }

    public function getSorting(): int
    {
        return $this->sorting;
    }

    public function setSorting(int $sorting): void
    {
        $this->sorting = $sorting;
    }
}
