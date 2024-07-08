<?php

namespace FusionAuthIntegrationBundle\Service;

use Symfony\Component\Yaml\Yaml;

class FusionAuthService
{
    private ?string $yamlFile = null;
    private ?array $configuration = null;
    private ?string $API_KEY = null;
    private ?string $CLIENT_ID = null;
    private ?string $CLIENT_SECRET = null;

    public function __construct(string $yamlFilePath = null)
    {
        // Set default YAML file path if none provided
        $this->yamlFile = $yamlFilePath ?? __DIR__ . '/../../config/packages/fusion_auth.yaml';
        $this->loadConfiguration();
    }

    private function loadConfiguration(): void
    {
        if (file_exists($this->yamlFile)) {
            $this->configuration = Yaml::parseFile($this->yamlFile);

            $this->API_KEY = $this->configuration['API_KEY'] ?? null;
            $this->CLIENT_ID = $this->configuration['CLIENT_ID'] ?? null;
            $this->CLIENT_SECRET = $this->configuration['CLIENT_SECRET'] ?? null;
        } else {
            // Load default configuration if YAML file does not exist
            $defaultYamlFile = __DIR__ . '/../../Resources/config/fusion_auth.default.yaml';
            if (file_exists($defaultYamlFile)) {
                $this->configuration = Yaml::parseFile($defaultYamlFile);
                $this->API_KEY = $this->configuration['API_KEY'] ?? null;
                $this->CLIENT_ID = $this->configuration['CLIENT_ID'] ?? null;
                $this->CLIENT_SECRET = $this->configuration['CLIENT_SECRET'] ?? null;
            } else {
                throw new \Exception('YAML file does not exist: ' . $this->yamlFile);
            }
        }
    }

    /**
     * Retrieve the parsed YAML configuration.
     *
     * @return array|null The configuration array, or null if not parsed.
     */
    public function getConfiguration(): ?array
    {
        return $this->configuration;
    }

    /**
     * Retrieve the API Key from the configuration.
     *
     * @return string|null The API Key, or null if not set.
     */
    public function getAPIKey(): ?string
    {
        return $this->API_KEY;
    }

    /**
     * Retrieve the Client ID from the configuration.
     *
     * @return string|null The Client ID, or null if not set.
     */
    public function getClientId(): ?string
    {
        return $this->CLIENT_ID;
    }

    /**
     * Retrieve the Client Secret from the configuration.
     *
     * @return string|null The Client Secret, or null if not set.
     */
    public function getClientSecret(): ?string
    {
        return $this->CLIENT_SECRET;
    }
}
