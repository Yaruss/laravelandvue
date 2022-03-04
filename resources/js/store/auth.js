//import Vue from 'vue'

import { createStore } from 'vuex'

export default createStore({
    state: {
        registrationSuccess: false,
        errors: []
    },
    actions: {
        addUser(context, payload) {
            axios.post('/api/registration', {name: payload.name, email: payload.email, password: payload.password}).then(() => {
                context.commit("SET_REGISTRATION_SUCCESS", !context.state.registrationSuccess);
            }).catch((error) => {
                if(error.response.status === 422){
                    context.commit("SET_REGISTRATION_ERROR", error.response.data.errors);
                }
            });
        }
    },
    getters: {
    },
    mutations: {
        SET_REGISTRATION_ERROR(state, payload){
            return state.errors = payload;
        },
        SET_REGISTRATION_SUCCESS(state, payload){
            return state.registrationSuccess = payload;
        },

    }
});
