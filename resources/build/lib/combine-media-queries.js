/**
 * The external dependencies.
 */
const postcss = require('postcss');

/**
 * Combine @media rules at the end of the file.
 */
module.exports = function () {
  return {
    postcssPlugin: 'wpemerge-combine-media-queries',
    Once(root) {
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
    },
  };
};
module.exports.postcss = true;
