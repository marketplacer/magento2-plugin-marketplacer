<?php
declare(strict_types=1);

namespace Marketplacer\Marketplacer\Api;

interface ShippedFromAddressRepositoryInterface
{
    /**
     * Loads a sshipping address
     *
     * @param int $id
     * @return \Marketplacer\Marketplacer\Api\ShippedFromAddressInterface
     */
    public function getByParentId(int $id): \Marketplacer\Marketplacer\Api\ShippedFromAddressInterface;

    /**
     * Performs persist operations for a specified shipping address.
     *
     * @param \Marketplacer\Marketplacer\Api\ShippedFromAddressInterface $entity
     * @return \Marketplacer\Marketplacer\Api\ShippedFromAddressInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(\Marketplacer\Marketplacer\Api\ShippedFromAddressInterface $entity):
    \Marketplacer\Marketplacer\Api\ShippedFromAddressInterface;
}
