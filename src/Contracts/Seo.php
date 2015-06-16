<?php

namespace Werxe\Seo\Contracts;

interface Seo
{
    /**
     * Returns the entity that belongs to this seo entry.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function entity();
}
