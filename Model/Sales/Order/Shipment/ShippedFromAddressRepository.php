<?php
declare(strict_types=1);

namespace Marketplacer\Marketplacer\Model\Sales\Order\Shipment;

use Magento\Framework\Exception\CouldNotSaveException;
use Marketplacer\Marketplacer\Api\ShippedFromAddressInterface;
use Marketplacer\Marketplacer\Api\ShippedFromAddressInterfaceFactory;
use Marketplacer\Marketplacer\Api\ShippedFromAddressRepositoryInterface;
use Marketplacer\Marketplacer\Model\ResourceModel\Sales\Order\Shipment\ShippedFromAddress;

class ShippedFromAddressRepository implements ShippedFromAddressRepositoryInterface
{
    /**
     * @param ShippedFromAddress $resourceShippedFromAddress
     */
    public function __construct(
        private ShippedFromAddress                 $resourceShippedFromAddress,
        private ShippedFromAddressInterfaceFactory $shippedFromAddressInterfaceFactory
    ) {
    }



    public function getByParentId(int $id): ShippedFromAddressInterface
    {
        $shippedFromAddress = $this->shippedFromAddressInterfaceFactory->create();
        $this->resourceShippedFromAddress->load($shippedFromAddress, $id, 'parent_id');
        return $shippedFromAddress;
    }

    /**
     * Performs persist operations for a specified shipped from address.
     *
     * @param ShippedFromAddressInterface $entity
     * @return ShippedFromAddressInterface
     * @throws CouldNotSaveException
     */
    public function save(ShippedFromAddressInterface $entity): ShippedFromAddressInterface
    {
        try {
            $this->resourceShippedFromAddress->save($entity);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__('Could not save the shipped from address.'), $e);
        }
        return $entity;
    }
}
