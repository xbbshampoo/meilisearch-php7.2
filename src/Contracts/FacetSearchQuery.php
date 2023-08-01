<?php

declare(strict_types=1);

namespace Meilisearch\Contracts;

class FacetSearchQuery
{
    /**
     * @var string|null
     */
    private $q = null;

    /**
     * @var string|null
     */
    private $matchingStrategy = null;

    /**
     * @var array|null
     */
    private $filter = null;

    /**
     * @var string|null
     */
    private $facetQuery = null;

    /**
     * @var string|null
     */
    private $facetName = null;

    public function setQuery(string $q): FacetSearchQuery
    {
        $this->q = $q;

        return $this;
    }

    public function setMatchingStrategy(string $matchingStrategy): FacetSearchQuery
    {
        $this->matchingStrategy = $matchingStrategy;

        return $this;
    }

    public function setFilter(array $filter): FacetSearchQuery
    {
        $this->filter = $filter;

        return $this;
    }

    public function setFacetQuery(string $facetQuery): FacetSearchQuery
    {
        $this->facetQuery = $facetQuery;

        return $this;
    }

    public function setFacetName(string $facetName): FacetSearchQuery
    {
        $this->facetName = $facetName;

        return $this;
    }

    public function toArray(): array
    {
        return array_filter([
            'q' => $this->q,
            'matchingStrategy' => $this->matchingStrategy,
            'filter' => $this->filter,
            'facetQuery' => $this->facetQuery,
            'facetName' => $this->facetName,
        ], function ($item) { return null !== $item; });
    }
}
