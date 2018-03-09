<?php
namespace Rawilum;

/**
 * This file is part of the Rawilum.
 *
 * (c) Romanenko Sergey / Awilum <awilum@msn.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class Themes
{
    /**
     * @var Rawilum
     */
    protected $rawilum;

    /**
     * __construct
     */
    public function __construct(Rawilum $c)
    {
        $this->rawilum = $c;
    }

    public function getTemplate($template_name)
    {
        $template_ext = '.php';

        $page = $this->rawilum['pages']->page;

        include THEMES_PATH . '/' . $this->rawilum['config']->get('site.theme') . '/' . $template_name . $template_ext;
    }

}
