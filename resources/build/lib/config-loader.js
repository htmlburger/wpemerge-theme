/**
 * The external dependencies.
 */
const fs = require('fs');
const loaderUtils = require('loader-utils');

/**
 * Flatten variables from config.json, prefixing the variables names with dasherized parent names.
 *
 * @param {object} variables
 * @param {string|undefined} prefix
 * @returns {object}
 */
const flattenVariables = (variables, prefix) => {
  prefix = typeof prefix !== 'undefined' ? prefix + '-' : '';
  let flattenned = {};

  for (let name in variables) {
    let value = variables[name];

    if (typeof value === 'string') {
      flattenned[prefix + name] = value;
      continue;
    }

    if (typeof value === 'object' && value.constructor === Object) {
      flattenned = Object.assign(flattenned, flattenVariables(value, prefix + name));
      continue;
    }
  }

  return flattenned;
};

/**
 * Return SCSS output based on config.
 *
 * @param {object} config
 * @returns {string}
 */
const getSass = (config) => {
  const sass = ['/**', '* Config.', '*', '* This is an automatically generated file - DO NOT edit manually.', '*/', ''];
  const sassVariables = flattenVariables(config.variables);

  for (let name in sassVariables) {
    let value = sassVariables[name];
    sass.push(`$${name}: ${value};`);
  }

  return sass.join('\n');
};

/**
 * Config loader.
 *
 * @param rawConfig
 * @returns {string}
 */
module.exports = function(rawConfig) {
  const options = loaderUtils.getOptions(this);
  const config = JSON.parse(rawConfig);

  if (typeof options.sassOutput !== 'undefined') {
    fs.writeFileSync(options.sassOutput, getSass(config));
  }

  return rawConfig;
};
