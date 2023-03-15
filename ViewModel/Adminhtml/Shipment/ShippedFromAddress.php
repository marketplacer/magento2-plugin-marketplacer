<?php
declare(strict_types=1);

namespace Marketplacer\Marketplacer\ViewModel\Adminhtml\Shipment;

use Magento\Framework\Escaper;
use Magento\Framework\Registry;
use Magento\InventoryApi\Api\SourceRepositoryInterface;
use Magento\Sales\Model\Order\Shipment;
use Marketplacer\Base\ViewModel\BaseViewModel;
use Marketplacer\Marketplacer\Api\ShippedFromAddressInterface;

class ShippedFromAddress extends BaseViewModel
{
    /**
     * @param SourceRepositoryInterface $sourceRepository
     * @param Registry $registry
     * @param Escaper $escaper
     * @param array $data
     */
    public function __construct(
        private SourceRepositoryInterface $sourceRepository,
        private Registry $registry,
        Escaper $escaper,
        array $data = []
    ) {
        parent::__construct($escaper, $data);
    }

    /**
     * Retrieve shipment model instance
     *
     * @return Shipment
     */
    public function getShipment(): Shipment
    {
        return $this->registry->registry('current_shipment');
    }

    public function getShippedFromAddress(): ?ShippedFromAddressInterface
    {
        /** @var \Magento\Sales\Api\Data\ShipmentExtension $extensionAttributes */
        $extensionAttributes = $this->getShipment()->getExtensionAttributes();

        return $extensionAttributes?->getMarketplacerShippedFromAddress();
    }

    /**
     * Retrieve source code from shipment
     *
     * @return null|string
     */
    public function getSourceCode()
    {
        $shipment = $this->getShipment();
        $extensionAttributes = $shipment->getExtensionAttributes();
        if ($sourceCode = $extensionAttributes->getSourceCode()) {
            return $sourceCode;
        }
        return null;
    }

    /**
     * Get source name by code
     *
     * @param $sourceCode
     * @return mixed
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getSourceName(string $sourceCode): string
    {
        return $this->sourceRepository->get($sourceCode)->getName();
    }
}
