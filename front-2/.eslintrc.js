module.exports = {
  root: true,
  env: {
    node: true,
  },
  extends: [
    "formidable/rules/eslint/best-practices/on",
    "formidable/rules/eslint/es6/on",
    "formidable/rules/eslint/errors/off",
    "formidable/rules/eslint/strict/on",
    "formidable/rules/eslint/node/off",
    "formidable/rules/eslint/style/on",
    "formidable/rules/eslint/variables/on",
    "plugin:vue/essential",
  ],
  parserOptions: {
    // parser: "babel-eslint",
  },
};
