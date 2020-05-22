const icons = require.context('@images/sprite-svg', true, /\.svg$/);

// Automatically load all SVG files in the sprite-svg directory.
icons.keys().forEach(icons);
