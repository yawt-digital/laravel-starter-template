const config = {
  extends: ["@commitlint/config-conventional"],
  rules: {
    // "references-empty": [2, "never"],
    "subject-case": [0],
  },
  parserPreset: {
    parserOpts: {
      //   issuePrefixes: [":issue-prefix"],
    },
  },
};

export default config;
