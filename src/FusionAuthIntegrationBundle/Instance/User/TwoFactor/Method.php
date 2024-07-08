<?php
/**
 * Class Method
 *
 * This class represents the methods used for two-factor authentication.
 * It provides functionalities to work with Authenticator, Email, SMS, and Secret methods.
 *
 * @author  Onur Kudret
 * @version 1.0.0
 */

namespace FusionAuthIntegrationBundle\Instance\User\TwoFactor;

use FusionAuthIntegrationBundle\Utils\Serializable\Serializable;

/**
 * @Method Instance of Method
 * @implements Serializable
 */
class Method extends Serializable
{
    /**
     * @var Authenticator|null
     */
    protected ?Authenticator $authenticator = null;
    /**
     * @var string|null
     * The value of the email address for this method. Only present if user.twoFactor.methods[x].method is email
     */
    protected ?string $email = null;
    /**
     * @var string|null
     * The type of this method. There will also be an object with the same value containing additional information about this method. The possible values are:
     * - authenticator
     * - email
     * - sms
     */
    protected ?string $method = null;
    /**
     * @var string|null
     * The value of the mobile phone for this method. Only present if user.twoFactor.methods[x].method is sms
     */
    protected ?string $mobilePhone = null;
    /**
     * @var string|null
     * A base64 encoded secret.
     * This field is required when method is authenticator
     */
    protected ?string $secret = null;

    /**
     * Get Authenticator
     *
     * @return Authenticator|null Returns the authenticator object.
     */
    public function getAuthenticator(): ?Authenticator
    {
        return $this->authenticator;
    }

    /**
     * Set Authenticator
     *
     * @param Authenticator|null $authenticator Authenticator object to be set.
     * @return $this Returns the original object for chainable calls
     */
    public function setAuthenticator(?Authenticator $authenticator): static
    {
        $this->authenticator = $authenticator;

        return $this;
    }

    /**
     * Get Email
     *
     * @return string|null Returns the email address used for this method.
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set Email
     *
     * @param string|null $email Email address to be set for this method.
     * @return $this Returns the original object for chainable calls
     */
    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get Method
     *
     * @return string|null Returns the type of this method.
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }

    /**
     * Set Method
     *
     * @param string|null $method The type of method to be set.
     * @return $this Returns the original object for chainable calls
     */
    public function setMethod(?string $method): static
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Get Mobile Phone
     *
     * @return string|null Returns the mobile phone number used for this method.
     */
    public function getMobilePhone(): ?string
    {
        return $this->mobilePhone;
    }

    /**
     * Set Mobile Phone
     *
     * @param string|null $mobilePhone Mobile phone number to be set for this method.
     * @return $this Returns the original object for chainable calls
     */
    public function setMobilePhone(?string $mobilePhone): static
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    /**
     * Get Secret
     *
     * @return string|null Returns the base64 encoded secret.
     */
    public function getSecret(): ?string
    {
        return $this->secret;
    }

    /**
     * Set Secret
     *
     * @param string|null $secret Base64 encoded secret to be set.
     */
    public function setSecret(?string $secret): void
    {
        $this->secret = $secret;
    }
}