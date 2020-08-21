<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

use Flextype\Component\Filesystem\Filesystem;

if ($flextype->container('registry')->get('flextype.settings.entries.fields.created_at.enabled')) {
    $flextype->container('emitter')->addListener('onEntryAfterInitialized', static function () use ($flextype) : void {
        $flextype->container('entries')->entry['created_at'] = isset($flextype->container('entries')->entry['created_at']) ?
                                        (int) strtotime($flextype->container('entries')->entry['created_at']) :
                                        (int) Filesystem::getTimestamp($flextype->container('entries')->getFileLocation($flextype->container('entries')->entry_id));
    });

    $flextype->container('emitter')->addListener('onEntryCreate', static function () use ($flextype) : void {
        if (isset($flextype->container('entries')->entry_create_data['created_at'])) {
            $flextype->container('entries')->entry_create_data['created_at'] = $flextype->container('entries')->entry_create_data['created_at'];
        } else {
            $flextype->container('entries')->entry_create_data['created_at'] = date($flextype->container('registry')->get('flextype.settings.date_format'), time());
        }
    });
}