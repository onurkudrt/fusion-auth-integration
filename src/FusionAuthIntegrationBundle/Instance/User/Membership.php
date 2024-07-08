<?php
/**
 * @author Onur Kudret
 * @version 1.0.0
 */
namespace FusionAuthIntegrationBundle\Instance\User;

use FusionAuthIntegrationBundle\Utils\Serializable\Serializable;

/**
 * @Membership Instance of Membership
 * @implements Serializable
 */
class Membership extends Serializable
{
    /**
     * @var object|null
     * An object that can hold any information about the User for this membership that should be persisted.
     */
    protected ?object $data = null;

    /**
     * @var string
     * @required
     * The id of the Group of this membership.
     */
    protected string $groupId;

    /**
     * @var string|null
     * The unique id of this membership. If not specified a secure random UUID will be generated.
     * Defaults to secure random UUID
     */
    protected ?string $id = null;

    /**
     * Get Data
     *
     * @return string|null Returns the data object of the membership
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * Set Data
     *
     * @param ?object $data Data to be set for the membership
     * @return $this Returns the membership object for chainable calls
     */
    public function setData(?object $data): static
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get Group ID
     *
     * @return string|null Returns the groupId of the membership
     */
    public function getGroupId(): ?string
    {
        return $this->groupId;
    }

    /**
     * Set Group ID
     *
     * @param string|null $groupId GroupId to be set for the membership
     * @return $this Returns the membership object for chainable calls
     */
    public function setGroupId(?string $groupId): static
    {
        $this->groupId = $groupId;

        return $this;
    }

    /**
     * Get ID
     *
     * @return string|null Returns the ID of the membership
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Set ID
     *
     * @param string|null $id ID to be set for the membership
     * @return $this Returns the membership object for chainable calls
     */
    public function setId(?string $id): static
    {
        $this->id = $id;

        return $this;
    }


}