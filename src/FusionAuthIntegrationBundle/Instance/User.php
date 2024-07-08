<?php
/**
 * @author Onur Kudret
 * @version 1.0.0
 */

namespace FusionAuthIntegrationBundle\Instance;

use FusionAuthIntegrationBundle\Instance\User\Data\Data;
use FusionAuthIntegrationBundle\Instance\User\Membership;
use FusionAuthIntegrationBundle\Instance\User\TwoFactor;
use FusionAuthIntegrationBundle\Utils\Serializable\Serializable;


/**
 * @User Instant of User
 * Represent a user in the system.
 * @implements Serializable
 */
class User extends Serializable
{
    /**
     * @var ?string
     * The id to use for the new User. If not specified a secure random UUID will be generated.
     * You must specify either the email or the username or both for the User.
     * Either of these values may be used to uniquely identify the User and may be used to authenticate the User.
     * These fields are marked as optional below, but you must specify at least one of them.
     */
    protected ?string $userId = null;

    /**
     * @var ?string
     * The username of the User.
     * The username is stored and returned as a case-sensitive value, however a username is considered unique regardless of the case.
     * BoB is considered equal to BoB so either version of this username can be used whenever providing it as input to an API.
     * If username is not provided, then the email will be required.
     */
    protected ?string $username = null;

    /**
     * @var ?string Represents the status of the username.
     */
    protected ?string $usernameStatus = null;

    /**
     * @var ?string
     * The User’s plain text password.
     * This password will be hashed and the provided value will never be stored and cannot be retrieved.
     * This field is optional only if sendSetPasswordEmail is set to true.
     * By default, sendSetPasswordEmail is false, and then this field will be required.
     */
    protected ?string $password = null;

    /**
     * @var ?string
     * The first name of the User.
     */
    protected ?string $firstName = null;

    /**
     * @var ?string The user's last name.
     * The User’s last name.
     */
    protected ?string $lastName = null;

    /**
     * @var ?string
     * The User’s middle name.
     */
    protected ?string $middleName = null;

    /**
     * @var ?string
     * The User’s full name as a separate field that is calculated from firstName and lastName .
     */
    protected ?string $fullName = null;

    /**
     * @var ?string
     * The URL that points to an image file that is the User’s profile image.
     */
    protected ?string $imageUrl = null;

    /**
     * @var ?Data
     * An object that can hold any information about a User that should be persisted.
     * Please review the limits on data field types as you plan for and build your custom data schema.
     */
    protected ?Data $data = null;

    /**
     * @var string|null
     * The User’s email address. An email address is a unique in FusionAuth and stored in lower case.
     * If email is not provided, then the username will be required.
     */
    protected ?string $email = null;

    /**
     * @var ?string
     * ISO-8601 formatted date of the User’s birthdate such as YYYY-MM-DD.
     */
    protected ?string $birthDate = null;

    /**
     * @var ?string
     * The method for encrypting the User’s password. The following encryptors are provided with FusionAuth:
     * salted-md5
     * salted-sha256
     * salted-hmac-sha256
     * salted-pbkdf2-hmac-sha256
     * salted-pbkdf2-hmac-sha256-512 Available since 1.34.0
     * bcrypt
     * phpass-md5 Available since 1.45.0
     * phpass-sha512 Available since 1.45.0
     * You can also create your own password encryptor. See the Custom Password Hashing section for more information.
     * @see {salted-md5} https://fusionauth.io/docs/extend/code/password-hashes/custom-password-hashing
     * @see {salted-sha256} https://fusionauth.io/docs/reference/password-hashes#salted-md5
     * @see {salted-hmac-sha256} https://fusionauth.io/docs/reference/password-hashes#salted-sha-256
     * @see {salted-pbkdf2-hmac-sha256} https://fusionauth.io/docs/reference/password-hashes#salted-hmac-sha-256
     * @see {salted-pbkdf2-hmac-sha256} https://fusionauth.io/docs/reference/password-hashes#salted-pbkdf2-hmac-sha-256
     * @see {salted-pbkdf2-hmac-sha256-512} https://fusionauth.io/docs/reference/password-hashes#salted-pbkdf2-hmac-sha-256
     * @see {bcrypt} https://fusionauth.io/docs/reference/password-hashes#salted-bcrypt
     * @see {phpass-md5} https://fusionauth.io/docs/reference/password-hashes#phpass-md5
     * @see {phpass-sha512} https://fusionauth.io/docs/reference/password-hashes#phpass-sha-512
     */
    protected ?string $encryptionScheme = null;

    /**
     * @var ?int
     * The expiration instant of the User’s account. An expired user is not permitted to log in.
     * @see https://fusionauth.io/docs/reference/data-types#instants
     */
    protected ?int $expiry = null;

    /**
     * @var ?string
     * The factor used by the password encryption scheme.
     * If not provided, the PasswordEncryptor provides a default value.
     * Generally this will be used as an iteration count to generate the hash.
     * The actual use of this value is up to the PasswordEncryptor implementation.
     */
    protected ?string $factor = null;

    /**
     * @var Membership[]|null
     * The list of memberships for the User.
     */
    protected ?array $memberships = null;

    /**
     * @var ?string
     * The User’s mobile phone number.
     * This is useful is you will be sending push notifications or SMS messages to the User.
     */
    protected ?string $mobilePhone = null;

    /**
     * @var ?string
     * The email address of the user’s parent or guardian.
     * This field is used to allow a child user to identify their parent so FusionAuth can make a request to the parent to confirm the parent relationship.
     * Family configuration must be enabled in the tenant Family configuration and the corresponding family email templates must be configured for FusionAuth to notify the parent during user creation.
     */
    protected ?string $parentEmail = null;

    /**
     * @var ?string
     * Indicates that the User’s password needs to be changed during their next login attempt.
     */
    protected ?string $passwordChangeRequired = null;

    /**
     * @var ?array
     * An array of locale strings that give, in order, the User’s preferred languages.
     * These are important for email templates and other localizable text.
     * The maximum number of allowed preferred languages is 20.
     * See Locales.
     * @see {Locales} https://fusionauth.io/docs/reference/data-types#locales
     */
    protected ?array $preferredLanguages = null;

    /**
     * @var ?string
     * The User’s preferred timezone.
     * The string must be in an IANA time zone format. For example:
     * America/Denver or US/Mountain
     * @see {iana-timezone-format} https://www.iana.org/time-zones
     */
    protected ?string $timezone = null;

    /**
     * @var TwoFactor | null Two-factor authentication configuration.
     */
    protected ?TwoFactor $twoFactor = null;

    /**
     * @var ?string
     * The User’s preferred delivery for verification codes during a two-factor login request.
     * The possible values are:
     * None
     * TextMessage
     * When using TextMessage the User will also need a valid mobilePhone.
     * @deprecated Removed in 1.26.0
     */
    protected ?string $twoFactorDelivery = null;

    /**
     * @var ?bool
     * Determines if the User has two-factor authentication enabled for their account or not.
     * See the Enable Two Factor and Disable Two Factor APIs as an alternative to performing this action using the User API.
     * @deprecated Removed in 1.26.0
     */
    protected ?bool $twoFactorEnabled = null;

    /**
     * @var ?string
     * The Base64 encoded secret used to generate Two Factor verification codes.
     * You may optionally use value provided in the secret field returned by the Two Factor Secret API instead of generating this value yourself.
     * Unless you are using TextMessage as your delivery type, ensure you are able to share the secret with the User before enabling Two-Factor authentication.
     * Beginning in version 1.17.0, if you do create a User with TextMessage set as the twoFactorDelivery type, and you omit this value, the secret will be generated for you.
     * The secret can be generated because it is not necessary to share the secret with the User for this delivery method.
     * When using None as the twoFactorDelivery this value will be required.
     * @see {Two Factor Secret} https://fusionauth.io/docs/apis/two-factor#generate-a-secret
     * @deprecated Removed in 1.26.0
     */
    protected ?string $twoFactorSecret = null;

    /**
     * Get User ID
     *
     * @return string|null Returns the ID of the User.
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * Set User ID
     *
     * @param string|null $userId The ID to be set for the User.
     * @return $this
     */
    public function setUserId(?string $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get the User's username
     *
     * @return string|null Returns the username of the User.
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Set the User's username
     *
     * @param string|null $username The username to be set for the User.
     * @return $this
     */
    public function setUsername(?string $username): static
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the status of the User's username
     *
     * @return string|null Returns the status of the User's username.
     */
    public function getUsernameStatus(): ?string
    {
        return $this->usernameStatus;
    }

    /**
     * Set the status of the User's username
     *
     * @param string|null $usernameStatus The status of username to be set for the User.
     * @return $this
     */
    public function setUsernameStatus(?string $usernameStatus): static
    {
        $this->usernameStatus = $usernameStatus;

        return $this;
    }

    /**
     * Get the User's password
     *
     * @return string|null Returns the User's password.
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Set the User's password
     *
     * @param string|null $password The password to be set for the User.
     * @return $this
     */
    public function setPassword(?string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the User's first name
     *
     * @return string|null Returns the User's first name.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Set the User's first name
     *
     * @param string|null $firstName The first name to be set for the User.
     * @return $this
     */
    public function setFirstName(?string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the User's last name
     *
     * @return string|null Returns the User's last name.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Set the User's last name
     *
     * @param string|null $lastName The last name to be set for the User.
     * @return $this
     */
    public function setLastName(?string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the User's middle name
     *
     * @return string|null Returns the User's middle name.
     */
    public function getMiddleName(): ?string
    {
        return $this->middleName;
    }

    /**
     * Set the User's middle name
     *
     * @param string|null $middleName The middle name to be set for the User.
     * @return $this
     */
    public function setMiddleName(?string $middleName): static
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * Get the User's full name
     *
     * @return string|null Returns the User's full name.
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * Set the User's full name
     *
     * @param string|null $fullName The full name to be set for the User.
     * @return $this
     */
    public function setFullName(?string $fullName): static
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get the URL of the User's profile image
     *
     * @return string|null Returns the URL of the User's profile image.
     */
    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    /**
     * Set the URL of the User's profile image
     *
     * @param string|null $imageUrl The URL of the profile image to be set for the User.
     * @return $this
     */
    public function setImageUrl(?string $imageUrl): static
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Get the additional data object associated with the User
     *
     * @return Data|null Returns the Data object associated with the User.
     */
    public function getData(): ?Data
    {
        return $this->data;
    }

    /**
     * Set the additional data object associated with the User
     *
     * @param Data|null $data The Data object to be associated with the User.
     * @return $this
     */
    public function setData(?Data $data): static
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the User's email address
     *
     * @return string|null Returns the User's email address.
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the User's email address
     *
     * @param string|null $email The email address to be set for the User.
     * @return $this
     */
    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the User's birth date
     *
     * @return string|null Returns the User's birth date.
     */
    public function getBirthDate(): ?string
    {
        return $this->birthDate;
    }

    /**
     * Set the User's birthdate
     *
     * @param string|null $birthDate The birthdate to be set for the User.
     * @return $this
     */
    public function setBirthDate(?string $birthDate): static
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get the encryption scheme used for the User's password
     *
     * @return string|null Returns the encryption scheme used for the User's password.
     */
    public function getEncryptionScheme(): ?string
    {
        return $this->encryptionScheme;
    }

    /**
     * Set the encryption scheme used for the User's password
     *
     * @param string|null $encryptionScheme The encryption scheme to be set for the User's password.
     * @return $this
     */
    public function setEncryptionScheme(?string $encryptionScheme): static
    {
        $this->encryptionScheme = $encryptionScheme;

        return $this;
    }

    /**
     * Get the expiration instant of the User's account
     *
     * @return int|null Returns the expiration instant of the User's account.
     */
    public function getExpiry(): ?int
    {
        return $this->expiry;
    }

    /**
     * Set the expiration instant of the User's account
     *
     * @param int|null $expiry The expiration instant to be set for the User's account.
     * @return $this
     */
    public function setExpiry(?int $expiry): static
    {
        $this->expiry = $expiry;

        return $this;
    }

    /**
     * Get the factor used by the password encryption scheme
     *
     * @return string|null Returns the factor used by the password encryption scheme.
     */
    public function getFactor(): ?string
    {
        return $this->factor;
    }

    /**
     * Set the factor used by the password encryption scheme
     *
     * @param string|null $factor The factor to be set for the password encryption scheme.
     * @return $this
     */
    public function setFactor(?string $factor): static
    {
        $this->factor = $factor;

        return $this;
    }

    /**
     * Get the list of memberships for the User
     *
     * @return Membership[]|null Returns the list of memberships for the User.
     */
    public function getMemberships(): ?array
    {
        return $this->memberships;
    }

    /**
     * Set the list of memberships for the User
     *
     * @param Membership[]|null $memberships The list of memberships to be set for the User.
     * @return $this
     */
    public function setMemberships(?array $memberships): static
    {
        $this->memberships = $memberships;

        return $this;
    }

    /**
     * Get the User's mobile phone number
     *
     * @return string|null Returns the User's mobile phone number.
     */
    public function getMobilePhone(): ?string
    {
        return $this->mobilePhone;
    }

    /**
     * Set the User's mobile phone number
     *
     * @param string|null $mobilePhone The mobile phone number to be set for the User.
     * @return $this
     */
    public function setMobilePhone(?string $mobilePhone): static
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    /**
     * Get the email address of the user’s parent or guardian
     *
     * @return string|null Returns the parent email address of the User.
     */
    public function getParentEmail(): ?string
    {
        return $this->parentEmail;
    }

    /**
     * Set the email address of the user’s parent or guardian
     *
     * @param string|null $parentEmail The parent email address to be set for the User.
     * @return $this
     */
    public function setParentEmail(?string $parentEmail): static
    {
        $this->parentEmail = $parentEmail;

        return $this;
    }

    /**
     * Get whether the User's password change is required
     *
     * @return string|null Returns the status indicating if password change is required.
     */
    public function getPasswordChangeRequired(): ?string
    {
        return $this->passwordChangeRequired;
    }

    /**
     * Set whether the User’s password needs to be changed during their next login attempt.
     *
     * @param string|null $passwordChangeRequired Indicates if the password change is required.
     * @return $this
     */
    public function setPasswordChangeRequired(?string $passwordChangeRequired): static
    {
        $this->passwordChangeRequired = $passwordChangeRequired;

        return $this;
    }

    /**
     * Get the User’s preferred languages for localizable text.
     *
     * @return array|null Returns an array of preferred languages.
     */
    public function getPreferredLanguages(): ?array
    {
        return $this->preferredLanguages;
    }

    /**
     * Set the User’s preferred languages for localizable text.
     *
     * @param array|null $preferredLanguages An array of preferred languages to be set.
     * @return $this
     */
    public function setPreferredLanguages(?array $preferredLanguages): static
    {
        $this->preferredLanguages = $preferredLanguages;

        return $this;
    }

    /**
     * Get the User’s preferred timezone.
     *
     * @return string|null Returns the preferred timezone.
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * Set the User’s preferred timezone.
     *
     * @param string|null $timezone The preferred timezone to be set.
     * @return $this
     */
    public function setTimezone(?string $timezone): static
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * Get the User's two-factor authentication configuration.
     *
     * @return TwoFactor|null Returns the two-factor authentication configuration.
     */
    public function getTwoFactor (): ?TwoFactor
    {
        return $this->twoFactor;
    }

    /**
     * Set the User's two-factor authentication configuration.
     *
     * @param TwoFactor|null $twoFactor The two-factor authentication configuration to be set.
     * @return $this
     */
    public function setTwoFactor($twoFactor): static
    {
        $this->twoFactor = $twoFactor;

        return $this;
    }

    /**
     * Get the User's preferred delivery for verification codes during a two-factor login request.
     * The possible values are:
     * None
     * TextMessage
     * When using TextMessage the User will also need a valid mobilePhone.
     *
     * @return string|null Returns the preferred delivery method.
     * @deprecated Removed in 1.26.0
     */
    public function getTwoFactorDelivery(): ?string
    {
        return $this->twoFactorDelivery;
    }

    /**
     * Set the User's preferred delivery for verification codes during a two-factor login request.
     *
     * @param string|null $twoFactorDelivery The preferred delivery method to be set.
     * @return $this
     * @deprecated Removed in 1.26.0
     */
    public function setTwoFactorDelivery(?string $twoFactorDelivery): static
    {
        $this->twoFactorDelivery = $twoFactorDelivery;

        return $this;
    }

    /**
     * Get whether two-factor authentication is enabled for the User's account or not.
     *
     * @return bool|null Returns true if two-factor authentication is enabled, false otherwise.
     * @deprecated Removed in 1.26.0
     */
    public function isTwoFactorEnabled(): ?bool
    {
        return $this->twoFactorEnabled;
    }

    /**
     * Set whether two-factor authentication is enabled for the User's account or not.
     *
     * @param bool|null $twoFactorEnabled True to enable two-factor authentication, false to disable.
     * @return $this
     * @deprecated Removed in 1.26.0
     */
    public function setTwoFactorEnabled(?bool $twoFactorEnabled): static
    {
        $this->twoFactorEnabled = $twoFactorEnabled;

        return $this;
    }

    /**
     * Get the Base64 encoded secret used to generate Two Factor verification codes.
     *
     * @return string|null Returns the Base64 encoded secret.
     * @deprecated Removed in 1.26.0
     */
    public function getTwoFactorSecret(): ?string
    {
        return $this->twoFactorSecret;
    }

    /**
     * Set the Base64 encoded secret used to generate Two Factor verification codes.
     *
     * @param string|null $twoFactorSecret The Base64 encoded secret to be set.
     * @return $this
     * @deprecated Removed in 1.26.0
     */
    public function setTwoFactorSecret(?string $twoFactorSecret): static
    {
        $this->twoFactorSecret = $twoFactorSecret;

        return $this;
    }
}