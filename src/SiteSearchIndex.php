<?php

namespace rias\scout;

use craft\elements\db\ElementQuery;
use craft\elements\Entry;
use yii\base\BaseObject;

/**
 * @property-read ElementQuery $criteria
 */
class SiteSearchIndex extends BaseObject
{
    /** @var string */
    public $indexName;

    /** @var IndexSettings */
    public $indexSettings;

    /** @var string */
    public $elementType = Entry::class;

    /** @var callable|string|array|\League\Fractal\TransformerAbstract */
    public $transformer;

    /** @var array */
    public $splitElementsOn = [];

    /** @var bool */
    public $replicaIndex = false;

    /** @var callable|ElementQuery */
    private $_criteria;

    public function __construct(string $indexName, $config = [])
    {
        parent::__construct($config);

        $this->indexName = $indexName;
    }

    public static function create(string $indexName): self
    {
        return new self($indexName);
    }


    public function splitElementsOn(array $splitElementsOn): self
    {
        $this->splitElementsOn = $splitElementsOn;

        return $this;
    }


    public function indexSettings(IndexSettings $indexSettings): self
    {
        $this->indexSettings = $indexSettings;

        return $this;
    }

    /**
     * @param bool $replicaIndex Whether to mark this index as a replica index and skip syncing.
     * @return $this
     */
    public function replicaIndex(bool $replicaIndex): self
    {
        $this->replicaIndex = $replicaIndex;

        return $this;
    }
}
