<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Api
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Api\V2010\Account\Call;

use Twilio\Exceptions\TwilioException;
use Twilio\Values;
use Twilio\Version;
use Twilio\InstanceContext;


class SiprecContext extends InstanceContext
    {
    /**
     * Initialize the SiprecContext
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid The SID of the [Account](https://www.twilio.com/docs/iam/api/account) that created this Siprec resource.
     * @param string $callSid The SID of the [Call](https://www.twilio.com/docs/voice/api/call-resource) the Siprec resource is associated with.
     * @param string $sid The SID of the Siprec resource, or the `name` used when creating the resource
     */
    public function __construct(
        Version $version,
        $accountSid,
        $callSid,
        $sid
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        'accountSid' =>
            $accountSid,
        'callSid' =>
            $callSid,
        'sid' =>
            $sid,
        ];

        $this->uri = '/Accounts/' . \rawurlencode($accountSid)
        .'/Calls/' . \rawurlencode($callSid)
        .'/Siprec/' . \rawurlencode($sid)
        .'.json';
    }

    /**
     * Update the SiprecInstance
     *
     * @param string $status
     * @return SiprecInstance Updated SiprecInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(string $status): SiprecInstance
    {

        $data = Values::of([
            'Status' =>
                $status,
        ]);

        $payload = $this->version->update('POST', $this->uri, [], $data);

        return new SiprecInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['callSid'],
            $this->solution['sid']
        );
    }


    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Api.V2010.SiprecContext ' . \implode(' ', $context) . ']';
    }
}