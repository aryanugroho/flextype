<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

use Thunder\Shortcode\Shortcode\ShortcodeInterface;

if ($flextype->container('registry')->get('flextype.settings.shortcode.shortcodes.registry.enabled')) {

    // Shortcode: [registry_get name="item-name" default="default-value"]
    $flextype['shortcode']->addHandler('registry_get', function (ShortcodeInterface $s) use ($flextype) {
        return $flextype['registry']->get($s->getParameter('name'), $s->getParameter('default'));
    });
}
