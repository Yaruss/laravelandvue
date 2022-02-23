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
        }
    },
    actions: {
        getArticleData(context, payload){
            axios.get('/api/article-json?p').then((response)=>{
                context.commit('SET_ARTICLE', response.data.data);
            }).catch(()=>{
                console.log('Error /api/article-json');
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
        }
    }
});
