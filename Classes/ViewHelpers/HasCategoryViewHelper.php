<?php

declare(strict_types=1);

namespace MarekSkopal\MsReference\ViewHelpers;

use MarekSkopal\MsReference\Domain\Model\Category;
use MarekSkopal\MsReference\Domain\Model\Reference;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractConditionViewHelper;

class HasCategoryViewHelper extends AbstractConditionViewHelper
{
    public function initializeArguments(): void
    {
        parent::initializeArguments();

        $this->registerArgument('reference', Reference::class, '');
        $this->registerArgument('category', Category::class, '');
    }

    /**
     * @param array{reference: Reference, category: Category} $arguments
     * @phpstan-ignore-next-line method.childParameterType
     */
    public static function verdict(array $arguments, RenderingContextInterface $renderingContext): bool
    {
        /** @var Reference $reference */
        $reference = $arguments['reference'];
        /** @var Category $category */
        $category = $arguments['category'];

        return $reference->hasCategory($category);
    }
}
