require('./bootstrap');

window.Vue = require('vue').default;

import { createApp } from 'vue'

import store from './store'

const app = createApp({
    created() {
        let url = window.location.pathname;
        let slug = url.substring(url.lastIndexOf('/')+1);
        console.log(slug);
        this.$store.commit('SET_SLUG', slug);
        this.$store.dispatch('getArticleData', slug);
        this.$store.dispatch('viewsIncrement', slug);
    }
});

//app.component('example-component', require('./components/ExampleComponent.vue').default);
app.component('state-component', require('./components/StateComponent.vue').default);
app.component('comment-component', require('./components/CommentComponent.vue').default);
app.component('tag-component', require('./components/TagComponent.vue').default);

app.use(store);
app.mount('#app');



