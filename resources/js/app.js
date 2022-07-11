import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
global.$ = global.jQuery = require('jquery');
