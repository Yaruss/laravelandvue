require('./bootstrap');

window.Vue = require('vue').default;

import { createApp } from 'vue'

import store from './store'

const app = createApp({});

app.component('example-component', require('./components/ExampleComponent.vue').default);
app.use(store);
app.mount('#app');

/*
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.use(store);
Vue.mount('#app');

//*
const app = new Vue({
    store,
    el: '#app',
});
//*/
console.log(0);

console.log(store);
console.log(app);

console.log(1);
