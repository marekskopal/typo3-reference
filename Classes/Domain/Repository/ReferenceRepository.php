<?php

declare(strict_types=1);

namespace MarekSkopal\Reference\Domain\Repository;

use MarekSkopal\Reference\Domain\Model\Reference;
use TYPO3\CMS\Extbase\Persistence\Generic\Query;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/** @extends Repository<Reference> */
class ReferenceRepository extends Repository
{
    protected $defaultOrderings = [
        'realization_date' => QueryInterface::ORDER_DESCENDING,
    ];

    /**
     * @param list<int> $categoryUids
     * @return QueryResultInterface<int, Reference>
     */
    public function findReferences(
        array $categoryUids = [],
        int $limit = 0,
        int $offset = 0,
        string $sortingField = 'realization_date',
        string $sortingDirection = 'desc',
        bool $prependImportant = false,
    ): QueryResultInterface {
        $query = $this->createQuery();
        if (count($categoryUids) > 0) {
            $query->matching(
                $query->in('category.uid', $categoryUids),
            );
        }

        if ($limit > 0) {
            $query->setLimit($limit);
        }

        if ($offset > 0) {
            $query->setOffset($offset);
        }

        $orderings = [];
        if ($sortingDirection === 'desc') {
            if ($prependImportant) {
                $orderings['important'] = QueryInterface::ORDER_DESCENDING;
            }
            $orderings[$sortingField] = QueryInterface::ORDER_DESCENDING;
        } else {
            if ($prependImportant) {
                $orderings['important'] = QueryInterface::ORDER_DESCENDING;
            }
            $orderings[$sortingField] = QueryInterface::ORDER_ASCENDING;
        }
        $query->setOrderings($orderings);

        return $query->execute();
    }

    /**
     * @param list<int> $referenceUids
     * @return QueryResultInterface<int, Reference>
     */
    public function findReferencesByUids(
        array $referenceUids,
        string $sortingField = 'realization_date',
        string $sortingDirection = 'desc',
    ): QueryResultInterface {
        $sql = 'SELECT *
                FROM tx_odreference_domain_model_reference
                WHERE uid IN (' . implode(',', $referenceUids) . ')
                ORDER BY ';

        if ($sortingField === 'custom') {
            $sql .= 'FIELD(uid,' . implode(',', $referenceUids) . ')';
        } else {
            $sql .= $sortingField . ' ';
            if ($sortingDirection === 'desc') {
                $sql .= 'DESC';
            } else {
                $sql .= 'ASC';
            }
        }

        /** @var Query<Reference> $query */
        $query = $this->createQuery();
        $query->statement($sql);

        return $query->execute();
    }

    public function findPreviousReference(int $referenceSorting): ?Reference
    {
        $query = $this->createQuery();
        $query->lessThan('sorting', $referenceSorting);
        $query->setLimit(1);

        return $query->execute()->getFirst();
    }

    public function findNextReference(int $referenceSorting): ?Reference
    {
        $query = $this->createQuery();
        $query->greaterThan('sorting', $referenceSorting);
        $query->setLimit(1);

        return $query->execute()->getFirst();
    }
}
