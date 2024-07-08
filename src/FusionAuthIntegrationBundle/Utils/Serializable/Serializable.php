<?php
/**
 * @author Onur KUDRET
 * @version 1.0.0
 */
namespace FusionAuthIntegrationBundle\Utils\Serializable;

/**
 * Class Serializable
 *
 * This class provides methods to serialize an instance of Serializable into an array or a JSON string.
 * It is designed to be extended by other classes that require custom serialization logic.
 *
 * @package Utils\Serializable
 */
class Serializable implements ISerializable
{

    /**
     * Converts the object into a JSON string.
     *
     * This method first converts the object and its properties into a simple PHP array by calling the serialize method.
     * Then it encodes this array into a JSON string using PHP's built-in json_encode function.
     *
     * @return string JSON string representation of the object
     */
    public function serializeJSON () :string
    {
        return json_encode($this->serialize());
    }

    /**
     * Converts the object into an associative array.
     *
     * This method calls the private serializer method, passing $this as the argument.
     *
     * @return array Associative array representation of the object
     */
    public function serialize (): array
    {
        return $this->serializer($this);
    }

    /**
     * Recursively converts an object or array into an associative array.
     *
     * The method iterates over the properties of an object or elements of an array.
     * If the element is an instance of Serializable, it calls serialize on it.
     * If the element is an array, it recursively calls serializer on it.
     * If the element is a basic data type, it adds it directly to the output array.
     *
     * @param object|array $mixed The object or array to serialize
     * @return array The serialized associative array representation of the input
     */
    private function serializer (object|array $mixed): array
    {
        $serialized = [];
        foreach ($mixed as $key => $value)
        {
            if($value === null)
                continue;
            if($value instanceof Serializable)
                $serialized[$key] = $value->serialize();
            elseif (is_array($value))
                $serialized[$key] = $this->serializer($value);
            else
                $serialized[$key] = $value;
        }
        return $serialized;
    }

}