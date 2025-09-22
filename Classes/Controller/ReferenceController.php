<?php

declare(strict_types=1);

namespace MarekSkopal\MsReference\Controller;

use MarekSkopal\MsReference\Domain\Model\Reference;
use MarekSkopal\MsReference\Domain\Repository\CategoryRepository;
use MarekSkopal\MsReference\Domain\Repository\ReferenceRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ReferenceController extends ActionController
{
    public function __construct(
        private readonly ReferenceRepository $referenceRepository,
        private readonly CategoryRepository $categoryRepository,
    ) {
    }

    public function listAction(?int $category = null): ResponseInterface
    {
        /**
         * @var array{
         *     listCategories?: string,
         *     listLimit?: int|string,
         *     listSortField?: string,
         *     listSortDir?: string,
         *     listSortImportant?: bool|string,
         *     listGroupByCategories?: bool|string,
         *     listReference?: string,
         *     similarAsList?: bool|string,
         *     similarLimit?: int|string
         * } $settings
         */
        $settings = $this->settings;

        $categoryIds = [];

        $listCategories = $settings['listCategories'] ?? '';
        if ($listCategories !== '') {
            $categoryIds = array_map(
                fn(string $item): int => (int) $item,
                GeneralUtility::trimExplode(',', $listCategories),
            );
        }

        if (is_int($category)) {
            $categoryIds[] = $category;
        }

        $sortingField = $settings['listSortField'] ?? '';
        if ($sortingField === '') {
            $sortingField = 'realization_date';
        }

        $sortingDirection = $settings['listSortDir'] ?? '';
        if ($sortingDirection === '') {
            $sortingDirection = 'desc';
        }

        $prependImportant = (bool) ($settings['listSortImportant'] ?? false);

        $referencesUids = [];
        $listReference = $settings['listReference'] ?? '';
        if ($listReference !== '') {
            $referencesUids = array_map(
                fn(string $item): int => (int) $item,
                GeneralUtility::trimExplode(',', $listReference),
            );
        }

        if (count($referencesUids) > 0) {
            $references = $this->referenceRepository->findReferencesByUids($referencesUids, $sortingField, $sortingDirection);
        } else {
            $references = !isset($settings['listLimit']) ? $this->referenceRepository->findReferences(
                $categoryIds,
            ) : $this->referenceRepository->findReferences(
                categoryUids: $categoryIds,
                limit: (int) $settings['listLimit'],
                sortingField: $sortingField,
                sortingDirection: $sortingDirection,
                prependImportant: $prependImportant,
            );
        }

        $this->view->assign('references', $references);

        $listGroupByCategories = (bool) ($settings['listGroupByCategories'] ?? false);
        if ($listGroupByCategories) {
            $categoriesByReferences = [];
            foreach ($references as $reference) {
                foreach ($reference->getCategories() as $referenceCategory) {
                    //@phpstan-ignore-next-line method.internalClass
                    $uid = $referenceCategory->getUid();
                    if ($uid === null) {
                        continue;
                    }

                    if (!isset($categoriesByReferences[$uid])) {
                        $categoriesByReferences[$uid] = [
                            'category' => $referenceCategory,
                            'references' => [],
                        ];
                    }

                    $categoriesByReferences[$uid]['references'][] = $reference;
                }
            }

            $this->view->assign('categoriesByReferences', $categoriesByReferences);
        }

        $countAllReferences = $this->referenceRepository->findReferences(
            categoryUids: $categoryIds,
            sortingField: $sortingField,
            sortingDirection: $sortingDirection,
            prependImportant: $prependImportant,
        )->count();
        $hideLoader = $countAllReferences <= $references->count();
        $this->view->assign('hideLoader', $hideLoader);

        $this->view->assign('categoryIds', $this->categoryRepository->findAll());

        return $this->htmlResponse();
    }

    public function showAction(Reference $reference): ResponseInterface
    {
        /**
         * @var array{
         *     listCategories?: string,
         *     listLimit?: int|string,
         *     listSortField?: string,
         *     listSortDir?: string,
         *     listSortImportant?: bool|string,
         *     listGroupByCategories?: bool|string,
         *     listReference?: string,
         *     similarAsList?: bool|string,
         *     similarLimit?: int|string
         * } $settings
         */
        $settings = $this->settings;

        $this->view->assign('reference', $reference);

        $this->view->assign('previousReference', $this->referenceRepository->findPreviousReference($reference->getSorting()));
        $this->view->assign('nextReference', $this->referenceRepository->findNextReference($reference->getSorting()));

        $this->view->assign('categories', $this->categoryRepository->findAll());

        $similarAsList = (bool) ($settings['similarAsList'] ?? false);
        if ($similarAsList) {
            $limit = 0;

            if (is_numeric($settings['similarLimit'] ?? null)) {
                $limit = (int) $settings['similarLimit'];
            }

            $sortingField = $settings['listSortField'] ?? '';
            if ($sortingField === '') {
                $sortingField = 'realization_date';
            }

            $sortingDirection = $settings['listSortDir'] ?? '';
            if ($sortingDirection === '') {
                $sortingDirection = 'desc';
            }

            $prependImportant = (bool) ($settings['listSortImportant'] ?? false);

            $this->view->assign('similarReferences', $this->referenceRepository->findReferences(
                limit: $limit,
                sortingField: $sortingField,
                sortingDirection: $sortingDirection,
                prependImportant: $prependImportant,
            ));
        } else {
            $this->view->assign('similarReferences', $reference->getSimilarReferences());
        }

        return $this->htmlResponse();
    }
}
