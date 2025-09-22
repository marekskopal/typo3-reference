<?php

declare(strict_types=1);

namespace MarekSkopal\Reference\Controller;

use MarekSkopal\Reference\Domain\Repository\ClientRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ClientController extends ActionController
{
    public function __construct(private readonly ClientRepository $clientRepository,)
    {
    }

    public function listAction(): ResponseInterface
    {
        /**
         * @var array{
         *     listClients?: string,
         *     listLimit?: int|string
         * } $settings
         */
        $settings = $this->settings;

        $listClients = $settings['listClients'] ?? '';
        if ($listClients !== '') {
            $clientsUids = array_map(
                fn(string $item): int => (int) $item,
                GeneralUtility::trimExplode(',', $listClients),
            );
            $clients = $this->clientRepository->findClientsByUids($clientsUids);
        } else {
            $limit = isset($settings['listLimit']) && (int) $settings['listLimit'] > 0
                ? (int) $settings['listLimit']
                : null;
            $clients = $this->clientRepository->findClients($limit);
        }

        $this->view->assign('clients', $clients);

        return $this->htmlResponse();
    }
}
