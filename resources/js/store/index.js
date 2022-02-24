//import Vue from 'vue'

import { createStore } from 'vuex'

export default createStore({
    state: {
        article: {
            comments: [],
            tags: [],
            statistic: {
                likes: 0,
                views: 0
            }
        },
        slug: '',
        like: true
    },
    actions: {
        getArticleData(context, payload){
            axios.get('/api/article-json', {params: {slug:payload}}).then((response)=>{
                context.commit('SET_ARTICLE', response.data.data);
            }).catch(()=>{
                console.log('Error /api/article-json');
            });
        },
        viewsIncrement(context, payload){
            setTimeout(() => {
                axios.put('/api/article-views-increment', {slug: payload}).then((response) => {
                    context.commit('SET_ARTICLE', response.data.data);
                }).catch(() => {
                    console.log('Error /api/article-views-increment');
                });
            }, 5000);
        },
        addLike(context, payload){
            axios.put('/api/article-likes-increment', {slug: payload.slug, increment:payload.increment}).then((response) => {
                context.commit('SET_ARTICLE', response.data.data);
                context.commit('SET_LIKE', !context.state.like);
            }).catch(() => {
                console.log('Error /api/article-like-increment');
            });
        }
    },
    getters: {
        articleViews(state) {
            return state.article.statistic.views;
        },
        articleLikes(state) {
            return state.article.statistic.likes;
        }
    },
    mutations: {
        SET_ARTICLE(state, payload){
            return state.article = payload;
        },
        SET_SLUG(state, payload){
            return state.slug = payload;
        },
        SET_LIKE(state, payload){
            return state.like = payload;
        }
    }
});
