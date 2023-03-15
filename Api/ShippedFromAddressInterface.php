<?php
declare(strict_types=1);

namespace Marketplacer\Marketplacer\Api;

use Magento\Framework\Api\ExtensibleDataInterface;

interface ShippedFromAddressInterface extends ExtensibleDataInterface
{

    public const ADDRESS = 'address';
    public const SUBADDRESS = 'subaddress';
    public const CITY = 'city';
    public const STATE_SHORT = 'state_short';
    public const COUNTRY_NAME = 'country_name';
    public const POSTCODE = 'postcode';
    public const PARENT_ID = 'parent_id';

    /**
     * Gets the parent ID for the shipped from address.
     *
     * @return ?int Parent ID.
     */
    public function getParentId(): ?int;

    /**
     * Sets the parent ID for the shipped from address.
     *
     * @param int $id
     * @return $this
     */
    public function setParentId(int $id): self;

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress(): string;

    /**
     * Set address
     *
     * @param string $value
     * @return $this
     */
    public function setAddress(string $value): self;

    /**
     * Get a subaddress
     *
     * @return string
     */
    public function getSubaddress(): string;

    /**
     * Set a subaddress
     *
     * @param string $value
     * @return $this
     */
    public function setSubaddress(string $value): self;

    /**
     * Get a city
     *
     * @return string
     */
    public function getCity(): string;

    /**
     * Set a city
     *
     * @param string $value
     * @return $this
     */
    public function setCity(string $value): self;

    /**
     * Get a short state
     *
     * @return string
     */
    public function getStateShort(): string;

    /**
     * Set a short state
     *
     * @param string $value
     * @return $this
     */
    public function setStateShort(string $value): self;

    /**
     * Get the name of the country
     *
     * @return string
     */
    public function getCountryName(): string;

    /**
     * Set the name of the country
     *
     * @param string $value
     * @return $this
     */
    public function setCountryName(string $value): self;

    /**
     * Get a postal code
     *
     * @return string
     */
    public function getPostcode(): string;

    /**
     * Set a postal code
     *
     * @param string $value
     * @return $this
     */
    public function setPostcode(string $value): self;

    /**
     * Retrieve existing extension attributes object or create a new one
     *
     * @return \Marketplacer\Marketplacer\Api\ShippedFromAddressExtensionInterface|null
     */
    public function getExtensionAttributes()
    : ?\Marketplacer\Marketplacer\Api\ShippedFromAddressExtensionInterface;

    /**
     * Set an extension attributes object
     *
     * @param \Marketplacer\Marketplacer\Api\ShippedFromAddressExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Marketplacer\Marketplacer\Api\ShippedFromAddressExtensionInterface $extensionAttributes
    ): self;
}
