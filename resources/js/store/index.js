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
        like: true,
        commentSuccess: false,
        errors: []
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
        },
        addComment(context, payload) {
            axios.post('/api/article-add-comment', {subject: payload.subject, body: payload.body, article_id: payload.article_id}).then(() => {
                context.commit("SET_COMMENT_SUCCESS", !context.state.commentSuccess);
                context.dispatch('getArticleData', context.state.slug);
            }).catch((error) => {
                console.log('Error /api/article-add-comment');
                if(error.response.status === 422){
                    console.log(error.response.data.errors);
                    context.commit("SET_COMMENT_ERROR", error.response.data.errors);
                }
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
        },
        SET_COMMENT_SUCCESS(state, payload){
            return state.commentSuccess = payload;
        },
        SET_COMMENT_ERROR(state, payload){
            return state.errors = payload;
        }
    }
});
