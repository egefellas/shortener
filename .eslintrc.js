module.exports = {
    env: {
        browser: true,
        es2021: true
    },
    extends: [
        'plugin:vue/essential',
        'standard'
    ],
    parserOptions: {
        ecmaVersion: 12,
        parser: '@typescript-eslint/parser',
        sourceType: 'module'
    },
    plugins: [
        'vue',
        '@typescript-eslint'
    ],
    rules: {
        'vue/html-indent': ['error', 4],
        'vue/html-closing-bracket-newline': 'off',
        'vue/singleline-html-element-content-newline': 'off',
        'vue/multiline-html-element-content-newline': 'off',
        'vue/html-closing-bracket-spacing': 'off',
        'vue/no-template-shadow': 'off',
        'vue/return-in-computed-property': 'off',
        'vue/no-v-html': 'off',
        'vue/html-self-closing': [
            'error', {
                html: {
                    void: 'any',
                    normal: 'any',
                    component: 'any'
                },
                svg: 'any',
                math: 'any'
            }
        ],
        'vue/max-attributes-per-line': [
            'error',
            {
                singleline: 1,
                multiline: {
                    max: 1,
                    allowFirstLine: false
                }
            }
        ],
        indent: 'off',
        'indent-legacy': ['error', 4, { SwitchCase: 1 }],
        'max-len': [
            'error', 200, {
                ignoreComments: true,
                ignoreTrailingComments: true,
                ignoreUrls: true,
                ignoreTemplateLiterals: true
            }
        ]
    }
}
