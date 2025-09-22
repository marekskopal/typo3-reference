<?php

declare(strict_types=1);

namespace MarekSkopal\MsReference\Domain\Model;

use Stringable;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class ParamValue extends AbstractEntity implements Stringable
{
    #[Lazy()]

    //@phpstan-ignore-next-line property.uninitialized
    protected Param $param;

    protected string $paramValue = '';

    public function getParam(): Param
    {
        return $this->param;
    }

    public function setParam(Param $param): void
    {
        $this->param = $param;
    }

    public function getParamValue(): string
    {
        return $this->paramValue;
    }

    public function getValue(): string
    {
        return $this->paramValue;
    }

    public function setParamValue(string $paramValue): void
    {
        $this->paramValue = $paramValue;
    }
}
