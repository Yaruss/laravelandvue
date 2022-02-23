require('./bootstrap');

window.Vue = require('vue').default;

import { createApp } from 'vue'

import store from './store'

const app = createApp({
    created() {
        this.$store.dispatch('getArticleData');
    }
});

//app.component('example-component', require('./components/ExampleComponent.vue').default);
app.component('state-component', require('./components/StateComponent.vue').default);
app.component('comment-component', require('./components/CommentComponent.vue').default);
app.component('tag-component', require('./components/TagComponent.vue').default);

app.use(store);
app.mount('#app');



