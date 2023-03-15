<?php
declare(strict_types=1);

namespace Marketplacer\Marketplacer\Plugin\Sales\Order;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Sales\Api\Data\ShipmentExtensionInterface;
use Magento\Sales\Api\ShipmentRepositoryInterface;
use Magento\Sales\Api\Data\ShipmentInterface;
use Marketplacer\Marketplacer\Api\ShippedFromAddressInterface;
use Marketplacer\Marketplacer\Api\ShippedFromAddressInterfaceFactory;
use Marketplacer\Marketplacer\Api\ShippedFromAddressRepositoryInterface;

class ShipmentRepositoryPlugin
{
    public function __construct(
        private ShippedFromAddressInterfaceFactory $fromAddressFactory,
        private ShippedFromAddressRepositoryInterface $fromAddressRepository,
        private DataObjectHelper $dataObjectHelper
    ) {
    }

    public function afterGet(ShipmentRepositoryInterface $subject, ShipmentInterface $shipment): ShipmentInterface
    {
        /** @var \Magento\Sales\Api\Data\ShipmentExtension $extensionAttributes */
        $shippedFromAddress = $this->fromAddressRepository->getByParentId((int)$shipment->getEntityId());
        if ($extensionAttributes = $shipment->getExtensionAttributes()) {
            $extensionAttributes->setMarketplacerShippedFromAddress($shippedFromAddress);
            $shipment->setExtensionAttributes($extensionAttributes);
        }

        return $shipment;
    }

    /**
     *
     *
     * @param ShipmentRepositoryInterface $subject
     * @param ShipmentInterface $shipment
     * @return ShipmentInterface
     * @throws CouldNotSaveException
     */
    public function afterSave(ShipmentRepositoryInterface $subject, ShipmentInterface $shipment): ShipmentInterface
    {
        /** @var \Magento\Sales\Api\Data\ShipmentExtension $extensionAttributes */
        $extensionAttributes = $shipment->getExtensionAttributes();
        /** @var ?array $shippedFromAddressData */
        if ($shippedFromAddressData = $extensionAttributes?->getMarketplacerShippedFromAddress()) {

            $shippedFromAddress = $this->fromAddressFactory->create();
            $this->dataObjectHelper->populateWithArray(
                $shippedFromAddress,
                $shippedFromAddressData,
                ShippedFromAddressInterface::class
            );
            $shippedFromAddress->setShipment($shipment);
            $this->fromAddressRepository->save($shippedFromAddress);
        }

        return $shipment;
    }
}
