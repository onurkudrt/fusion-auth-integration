<?php
/**
 * Class Data
 *
 * This class represents the data part of a user’s information in FusionAuth.
 * Currently, it only contains an email field.
 * @author Onur Kudret
 * @version 1.0.0
 */
namespace FusionAuthIntegrationBundle\Instance\User\Data;
use FusionAuthIntegrationBundle\Utils\Serializable\Serializable;

/**
 * @Data Instance of Data
 * @implements Serializable
 */
class Data extends Serializable
{
    /**
     * @var string|null
     * This field will be used as the email address if no user.email field is found.
     * This field may be modified by advanced registration forms or the API.
     * Setting this value to another account’s email address allows that account to, in some cases, access information about this user.
     * If user richard has a user.data.email with a value of dinesh@fusionauth.io, whoever controls dinesh@fusionauth.io has elevated access to the richard account. That user can now reset the password on the richard account, for example. This functionality may be useful in certain scenarios, such as when accounts must share an email address. Think through the security ramifications before using this feature.
     * This feature was removed in version 1.26.0 and added back in 1.27.2.
     */
    protected ?string $email = null;

    /**
     * Get Email
     *
     * @return string|null Returns the email value from the data object.
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set Email
     *
     * @param string|null $email Email value to be set for the data object.
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }
}