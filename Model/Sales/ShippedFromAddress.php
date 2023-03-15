<?php
declare(strict_types=1);

namespace Marketplacer\Marketplacer\Model\Sales;

use Magento\Framework\Model\AbstractExtensibleModel;
use Magento\Sales\Model\Order\Shipment;
use Marketplacer\Marketplacer\Api\ShippedFromAddressInterface;
use Marketplacer\Marketplacer\Model\ResourceModel\Sales\Order\Shipment\ShippedFromAddress as ShippedFromAddressResource;

class ShippedFromAddress extends AbstractExtensibleModel implements ShippedFromAddressInterface
{
    /**
     * @var ?Shipment
     */
    private ?Shipment $shipment = null;


    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ShippedFromAddressResource::class);
    }

    /**
     * Gets the parent ID for the shipped from address.
     *
     * @return ?int Parent ID.
     */
    public function getParentId(): ?int
    {
        return $this->hasData(self::PARENT_ID) ? (int)$this->getData(self::PARENT_ID) : null;
    }

    /**
     * Sets the parent ID for the shipped from address.
     *
     * @param int $id
     * @return $this
     */
    public function setParentId(int $id): self
    {
        return $this->setData(self::PARENT_ID, $id);
    }

    /**
     * Declare Shipment instance
     *
     * @param Shipment $shipment
     * @return $this
     */
    public function setShipment(Shipment $shipment): self
    {
        $this->shipment = $shipment;
        return $this;
    }

    /**
     * Retrieve Shipment instance
     *
     * @return Shipment
     */
    public function getShipment(): Shipment
    {
        return $this->shipment;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress(): string
    {
        return (string)$this->_getData(self::ADDRESS);
    }

    /**
     * Set address
     *
     * @param string $value
     * @return $this
     */
    public function setAddress(string $value): self
    {
        return $this->setData(self::ADDRESS, $value);
    }

    /**
     * Get a subaddress
     *
     * @return string
     */
    public function getSubaddress(): string
    {
        return (string)$this->_getData(self::SUBADDRESS);
    }

    /**
     * Set a subaddress
     *
     * @param string $value
     * @return $this
     */
    public function setSubaddress(string $value): self
    {
        return $this->setData(self::SUBADDRESS, $value);
    }

    /**
     * Get a city
     *
     * @return string
     */
    public function getCity(): string
    {
        return (string)$this->_getData(self::CITY);
    }

    /**
     * Set a city
     *
     * @param string $value
     * @return $this
     */
    public function setCity(string $value): self
    {
        return $this->setData(self::CITY, $value);
    }

    /**
     * Get a short state
     *
     * @return string
     */
    public function getStateShort(): string
    {
        return (string)$this->_getData(self::STATE_SHORT);
    }

    /**
     * Set a short state
     *
     * @param string $value
     * @return $this
     */
    public function setStateShort(string $value): self
    {
        return $this->setData(self::STATE_SHORT, $value);
    }

    /**
     * Get the name of the country
     *
     * @return string
     */
    public function getCountryName(): string
    {
        return (string)$this->_getData(self::COUNTRY_NAME);
    }

    /**
     * Set the name of the country
     *
     * @param string $value
     * @return $this
     */
    public function setCountryName(string $value): self
    {
        return $this->setData(self::COUNTRY_NAME, $value);
    }

    /**
     * Get a postal code
     *
     * @return string
     */
    public function getPostcode(): string
    {
        return (string)$this->_getData(self::POSTCODE);
    }

    /**
     * Set a postal code
     *
     * @param string $value
     * @return $this
     */
    public function setPostcode(string $value): self
    {
        return $this->setData(self::POSTCODE, $value);
    }

    /**
     * Retrieve existing extension attributes object or create a new one
     *
     * @return \Marketplacer\Marketplacer\Api\ShippedFromAddressExtensionInterface|null
     */
    public function getExtensionAttributes()
    : ?\Marketplacer\Marketplacer\Api\ShippedFromAddressExtensionInterface
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object
     *
     * @param \Marketplacer\Marketplacer\Api\ShippedFromAddressExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Marketplacer\Marketplacer\Api\ShippedFromAddressExtensionInterface $extensionAttributes
    ): self {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
