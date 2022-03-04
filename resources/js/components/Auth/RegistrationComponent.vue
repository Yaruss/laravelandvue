<template>
    <form @submit.prevent="submit_form()" v-if="!registrationSuccess">
        <div class="mb-3">
            <label for="registrationName" class="form-label">Имя</label>
            <input type="text" class="form-control" id="registrationName" v-model="name">
            <div class="alert alert-warning" role="alert" v-if="errorsMessage.name">
                {{errorsMessage.name[0]}}
            </div>
        </div>
        <div class="mb-3">
            <label for="registrationEmail" class="form-label">Email</label>
            <input type="text" class="form-control" id="registrationEmail" v-model="email">
            <div class="alert alert-warning" role="alert" v-if="errorsMessage.email">
                {{errorsMessage.email[0]}}
            </div>
        </div>
        <div class="mb-3">
            <label for="registrationPassword" class="form-label">Пароль</label>
            <input type="text" class="form-control" id="registrationPassword" v-model="password">
            <div class="alert alert-warning" role="alert" v-if="errorsMessage.password">
                {{errorsMessage.password[0]}}
            </div>
        </div>
        <button class="btn btn-success" type="submit">Отправить</button>
    </form>
</template>

<script>
    export default {
        data() {
            return{
                name: '',
                email: '',
                password: ''
            }
        },
        computed: {
            registrationSuccess() {
                return this.$store.state.registrationSuccess;
            },
            errorsMessage() {
                return this.$store.state.errors;
            }
        },
        methods: {
            submit_form() {
                this.$store.dispatch('addUser', {
                    name: this.name,
                    email: this.email,
                    password: this.password
                });
            }
        },
        mounted() {
            console.log('Component Registration mounted.');
        }
    }
</script>
