<template>
    <li class="nav-item" v-if="!loginSuccess">
        <a class="nav-link active" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#login">Вход</a>
    </li>

    <div class="modal" tabindex="-1" id="login">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Вход</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <form @submit.prevent="submit_form()" v-if="!loginSuccess">
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="alert alert-warning" role="alert" v-if="errorsMessage.user">
                                {{errorsMessage.user[0]}}
                            </div>
                            <label for="registrationName" class="form-label">Имя</label>
                            <input type="text" class="form-control" id="registrationName" v-model="name">
                            <div class="alert alert-warning" role="alert" v-if="errorsMessage.name">
                                {{errorsMessage.name[0]}}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="registrationPassword" class="form-label">Пароль</label>
                            <input type="text" class="form-control" id="registrationPassword" v-model="password">
                            <div class="alert alert-warning" role="alert" v-if="errorsMessage.password">
                                {{errorsMessage.password[0]}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit">Отправить</button>
                    </div>
                </form>
                <div class="modal-body" v-if="loginSuccess">
                    <div class="alert alert-success" role="alert">
                        Вход выполнен успешно.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return{
                name: '',
                password: ''
            }
        },
        computed: {
            loginSuccess() {
                return this.$store.state.loginSuccess;
            },
            errorsMessage() {
                return this.$store.state.errors;
            }
        },
        methods: {
            submit_form() {
                this.$store.dispatch('loginUser', {
                    name: this.name,
                    password: this.password
                });
            }
        },
        mounted() {
            console.log('Component Login mounted.');
        }
    }
</script>
