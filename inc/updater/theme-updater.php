<?php

add_filter(
    'pre_set_site_transient_update_themes',
    'wpt_check_theme_update'
);

function wpt_check_theme_update($transient)
{
    if (empty($transient->checked)) {
        return $transient;
    }

    $response = wp_remote_get(
        'https://update.codzbee.com/updates/theme/update.json'
    );

    if (is_wp_error($response)) {
        return $transient;
    }

    $remote = json_decode(
        wp_remote_retrieve_body($response)
    );

    $theme = wp_get_theme();

    if (
        version_compare(
            $theme->get('Version'),
            $remote->version,
            '<'
        )
    ) {

        $transient->response['wp-travel-theme'] = [
            'theme'       => 'wp-travel-theme',
            'new_version' => $remote->version,
            'package'     => $remote->download_url,
            'url'         => $remote->details_url,
        ];

    }

    return $transient;
}