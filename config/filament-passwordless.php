<?php

return [
    /**
     * The authentication model to use.
     */
    'model' => \App\Models\User::class,

    /**
     * Here you can specify how long the magic link should be valid for (in minutes).
     */
    'magic_link_expiry' => 5,

    /**
     * The mailable that will be used to send the magic link verification email.
     */
    'mailable_for_magic_link' => \BradyRenting\FilamentPasswordless\Mail\MagicLinkVerification::class,
];
