import {rollupOptions} from './tools/rollup_options.js.js';
import {uglify} from 'rollup-plugin-uglify';

export default [
  rollupOptions({}),
  rollupOptions({suffix: '.min', extraPlugins: [uglify()]}),
];
