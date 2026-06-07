<?php

use App\Models\User;
use BradyRenting\FilamentPasswordless\Mail\MagicLinkVerification;

return [
    /**
     * The authentication model to use.
     */
    'model' => User::class,

    /**
     * Here you can specify how long the magic link should be valid for (in minutes).
     */
    'magic_link_expiry' => 5,

    /**
     * The mailable that will be used to send the magic link verification email.
     */
    'mailable_for_magic_link' => MagicLinkVerification::class,
];
