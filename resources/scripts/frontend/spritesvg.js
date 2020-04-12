const icons = require.context('@images/sprite-svg', true, /\.svg$/);

icons.keys().forEach(filename => icons(filename));
