# Theme\Avatar

This class (it's actually a facade) provides tools to work with custom user avatars.

## Theme\Avatar::setDefault( $attachment_id )

Registers an attachment as the default avatar for users on the site.

## Theme\Avatar::addUserMetaKey( $user_meta_key )

Registers a user meta key as a possible avatar for users.
When an avatar is fetched, it will check all registered user meta keys for a valid attachment id value and will use that as the avatar for the user - this way you can provide users with the ability to upload a custom avatar instead of relying on Gravatars or custom plugins for this functionality.

## Theme\Avatar::removeUserMetaKey( $user_meta_key )

Unregisters a user meta key as a possible avatar for users.