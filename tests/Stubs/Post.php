<?php

/**
 * Part of the Laravel Seo package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Laravel Seo
 * @version    1.0.1
 * @author     Werxe LTD
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011-2015, Werxe LTD
 * @link       http://werxe.com
 */

namespace Werxe\LaravelSeo\Tests\Stubs;

use Werxe\LaravelSeo\Entities\Seo;
use Illuminate\Database\Eloquent\Model;
use Werxe\LaravelSeo\Traits\SeoableTrait;

class Post extends Model
{
    use SeoableTrait;

    protected $fillable = [ 'title' ];

    public function seo()
    {
        return $this->morphOne(Seo::class, 'entity');
    }
}
