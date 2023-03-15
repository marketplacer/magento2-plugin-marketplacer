<?php
declare(strict_types=1);

namespace Marketplacer\Marketplacer\Model\ResourceModel\Sales\Order\Shipment;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ShippedFromAddress extends AbstractDb
{

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init('marketplacer_shipment_from_address', 'entity_id');
    }

    /**
     * Performs validation before save
     *
     * @param \Magento\Framework\Model\AbstractModel $object
     * @return $this
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _beforeSave(\Magento\Framework\Model\AbstractModel $object): self
    {
        /** @var \Marketplacer\Marketplacer\Model\Sales\ShippedFromAddress $object */
        if (!$object->getParentId() && $object->getShipment()) {
            $object->setParentId((int)$object->getShipment()->getId());
        }

        parent::_beforeSave($object);
        /*$errors = $this->validator->validate($object);
        if (!empty($errors)) {
            throw new \Magento\Framework\Exception\LocalizedException(
                __("Cannot save comment:\n%1", implode("\n", $errors))
            );
        }*/

        return $this;
    }
}
