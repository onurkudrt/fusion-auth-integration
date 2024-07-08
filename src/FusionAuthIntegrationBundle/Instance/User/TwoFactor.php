<?php
/**
 * Class TwoFactor
 * This class maintains a set of two-factor authentication methods.
 *
 * @package Instant\User
 * @author Onur Kudret
 * @version 1.0.0
 */
namespace FusionAuthIntegrationBundle\Instance\User;

use FusionAuthIntegrationBundle\Instance\User\TwoFactor\Method;
use FusionAuthIntegrationBundle\Utils\Serializable\Serializable;

/**
 * @TwoFactor Instance of TwoFactor
 * @implements Serializable
 */
class TwoFactor extends Serializable
{
    /**
     * @var Method[]|null $methods
     * Holds an array of TwoFactorMethod objects or null if no methods are available
     */
    protected ?array $methods = null;

    /**
     * Get Methods
     *
     * @return Method[]|null Returns the stored array of TwoFactorMethod objects or null if no methods are available
     */
    public function getMethods(): ?array
    {
        return $this->methods;
    }

    /**
     * Add Method
     *
     * @param Method|null $method The method object to be added
     * @return $this Returns the original object for chainable calls
     */
    public function addMethod(?Method $method): static
    {
        if(
            ($this->methods || $this->methods = [])
            &&
            (
                $method !== null
                &&
                in_array($method, $this->methods)
            )
        )
            return $this;
        $this->methods[] = $method;
        return $this;
    }

    /**
     * Remove Method
     *
     * @param Method|null $method The method object to be removed
     * @return $this Returns the original object for chainable calls
     */
    public function removeMethod(?Method $method): static
    {
        if($method != null && in_array($method, $this->methods))
        {
            foreach (array_keys($this->methods) as $key)
            {
                if ($this->methods[$key] == $method)
                {
                    unset($this->methods[$key]);
                }
            }
            // Re-index array keys
            $this->methods = array_values($this->methods);
        }
        return $this;
    }
}