<?php

namespace Ocus\LaravelLaunchDarkly\Integrations\Implementations;

use Illuminate\Support\Collection;
use LaunchDarkly\FeatureRequester;
use LaunchDarkly\Impl\Model\FeatureFlag;
use LaunchDarkly\Impl\Model\Segment;

class InMemoryDataFeatureRequester implements FeatureRequester
{
    /**
     * @var Collection
     */
    private Collection $flags;

    /**
     * @var Collection
     */
    private Collection $segments;

    public function __construct()
    {
        $this->flags = new Collection();
        $this->segments = new Collection();
    }

    /**
     * @param string $key
     *
     * @return FeatureFlag|null
     */
    public function getFeature(string $key): ?FeatureFlag
    {
        return $this->flags->get($key);
    }

    /**
     * @param string $key
     *
     * @return Segment|null
     */
    public function getSegment(string $key): ?Segment
    {
        return $this->segments->get('key');
    }

    /**
     * @return array|null
     */
    public function getAllFeatures(): ?array
    {
        return $this->flags->toArray();
    }

    /**
     * @param array $flag
     */
    public function addFlag(array $flag): void
    {
        $flag = FeatureFlag::decode($flag);
        $this->flags->put($flag->getKey(), $flag);
    }

    /**
     * @param string $key
     *
     * @param mixed $value
     */
    public function addFlagValue(string $key, $value): void
    {
        $flag = FeatureFlag::decode(array(
            "key" => $key,
            "version" => 1,
            "on" => false,
            "prerequisites" => array(),
            "salt" => "",
            "targets" => array(),
            "rules" => array(),
            "fallthrough" => array(),
            "offVariation" => 0,
            "variations" => array($value),
            "deleted" => false,
            "trackEvents" => false,
            "clientSide" => false
        ));

        $this->flags->put($flag->getKey(), $flag);
    }

    /**
     * @param array $segment
     */
    public function addSegment(array $segment): void
    {
        $segment = Segment::decode($segment);
        $this->segments->put($segment->getKey(), $segment);
    }
}
