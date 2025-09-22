<?php

declare(strict_types=1);

namespace MarekSkopal\MsReference\Domain\Repository;

use MarekSkopal\MsReference\Domain\Model\Client;
use TYPO3\CMS\Extbase\Persistence\Generic\Query;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/** @extends Repository<Client> */
class ClientRepository extends Repository
{
    protected $defaultOrderings = [
        'sorting' => QueryInterface::ORDER_ASCENDING,
    ];

    /** @return QueryResultInterface<int, Client> */
    public function findClients(?int $limit = 0, ?int $offset = 0): QueryResultInterface
    {
        $query = $this->createQuery();

        if (is_int($limit) && $limit > 0) {
            $query->setLimit($limit);
        }

        if (is_int($offset) && $offset > 0) {
            $query->setOffset($offset);
        }

        return $query->execute();
    }

    /**
     * @param list<int> $clientUids
     * @return QueryResultInterface<int, Client>
     */
    public function findClientsByUids(array $clientUids): QueryResultInterface
    {
        $sql = 'SELECT * FROM tx_odreference_domain_model_client
                WHERE uid IN (' . implode(',', $clientUids) . ')
                ORDER BY FIELD(uid,' . implode(',', $clientUids) . ')';

        /** @var Query<Client> $query */
        $query = $this->createQuery();
        $query->statement($sql);

        return $query->execute();
    }
}
