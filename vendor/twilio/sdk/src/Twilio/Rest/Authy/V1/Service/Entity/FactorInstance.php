<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Authy\V1\Service\Entity;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Rest\Authy\V1\Service\Entity\Factor\ChallengeList;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $sid
 * @property string $accountSid
 * @property string $serviceSid
 * @property string $entitySid
 * @property string $identity
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $friendlyName
 * @property string $status
 * @property string $factorType
 * @property array $config
 * @property string $url
 * @property array $links
 */
class FactorInstance extends InstanceResource {
    protected $_challenges;

    /**
     * Initialize the FactorInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid Service Sid.
     * @param string $identity Unique identity of the Entity
     * @param string $sid A string that uniquely identifies this Factor.
     */
    public function __construct(Version $version, array $payload, string $serviceSid, string $identity, string $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'sid' => Values::array_get($payload, 'sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'serviceSid' => Values::array_get($payload, 'service_sid'),
            'entitySid' => Values::array_get($payload, 'entity_sid'),
            'identity' => Values::array_get($payload, 'identity'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'status' => Values::array_get($payload, 'status'),
            'factorType' => Values::array_get($payload, 'factor_type'),
            'config' => Values::array_get($payload, 'config'),
            'url' => Values::array_get($payload, 'url'),
            'links' => Values::array_get($payload, 'links'),
        ];

        $this->solution = [
            'serviceSid' => $serviceSid,
            'identity' => $identity,
            'sid' => $sid ?: $this->properties['sid'],
        ];
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return FactorContext Context for this FactorInstance
     */
    protected function proxy(): FactorContext {
        if (!$this->context) {
            $this->context = new FactorContext(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['identity'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Delete the FactorInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool {
        return $this->proxy()->delete();
    }

    /**
     * Fetch the FactorInstance
     *
     * @return FactorInstance Fetched FactorInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): FactorInstance {
        return $this->proxy()->fetch();
    }

    /**
     * Update the FactorInstance
     *
     * @param array|Options $options Optional Arguments
     * @return FactorInstance Updated FactorInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []): FactorInstance {
        return $this->proxy()->update($options);
    }

    /**
     * Access the challenges
     */
    protected function getChallenges(): ChallengeList {
        return $this->proxy()->challenges;
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name) {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Authy.V1.FactorInstance ' . \implode(' ', $context) . ']';
    }
}