const config = {
  extends: ["@commitlint/config-conventional"],
  rules: {
    // "references-empty": [2, "never"],
    "subject-case": [0],
  },
  parserPreset: {
    parserOpts: {
      // TODO: Uncomment this and line 4 to validate issue/ticket numbers
      //   issuePrefixes: ["YWT-"],
    },
  },
};

export default config;
