/**
 * The external dependencies.
 */
const postcss = require('postcss');

/**
 * Combine @media rules at the end of the file.
 *
 * @param   {Object}   options
 * @returns {Function}
 */
const plugin = () => {
  return (root) => {
    const rules = {};

    root.walkAtRules('media', (rule) => {
      const id = rule.params;

      if (rules[id] === undefined) {
        rules[id] = postcss.atRule({
          name: rule.name,
          params: rule.params,
        });
      }

      rule.nodes.forEach((node) => rules[id].append(node.clone()));

      rule.remove();
    });

    Object.keys(rules).forEach((id) => root.append(rules[id]));
  };
};

module.exports = postcss.plugin('wpemerge-combine-media-queries', plugin);
