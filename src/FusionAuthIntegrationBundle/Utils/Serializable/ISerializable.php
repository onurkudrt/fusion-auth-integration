<?php
/**
 * @author Onur KUDRET
 * @version 1.0.0
 */

namespace FusionAuthIntegrationBundle\Utils\Serializable;

/**
 * Interface ISerializable
 *
 * This interface defines methods that should be implemented by classes
 * that need to support serialization to JSON and associative array formats.
 *
 * @package Utils\Serializable
 */
interface ISerializable
{
    /**
     * Converts the object into a JSON string.
     *
     * This method should convert the object and its properties into a simple PHP array
     * and then encode this array into a JSON string using PHP's built-in json_encode function.
     *
     * @return string JSON string representation of the object
     */
    public function serializeJSON(): string;

    /**
     * Converts the object into an associative array.
     *
     * This method should convert the object and its properties into an associative array.
     * The array should represent the internal state of the object in a structured format.
     *
     * @return array Associative array representation of the object
     */
    public function serialize(): array;
}
