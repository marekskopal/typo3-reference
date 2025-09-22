<?php

declare(strict_types=1);

namespace MarekSkopal\MsReference\Domain\Model;

use Stringable;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Param extends AbstractEntity implements Stringable
{
    protected string $title = '';

    protected string $class = '';

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getClass(): string
    {
        return $this->class;
    }

    public function setClass(string $class): void
    {
        $this->class = $class;
    }
}
