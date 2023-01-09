/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import router from "./router";
const app = createApp({});


import CreateComponent from './components/employees/create.vue';
import EditComponent from './components/employees/edit.vue';
import IndexComponent from './components/employees/index.vue';

app.component('create_component', CreateComponent);
app.component('edit_component', EditComponent);
app.component('index_component', IndexComponent);

app.use(router).mount('#app');
