<template>
    <form @submit.prevent="submit_form()" v-if="!commentSuccess">
        <div class="mb-3">
            <label for="commentSubject" class="form-label">Тема комментария</label>
            <input type="text" class="form-control" id="commentSubject" v-model="subject">
            <div class="alert alert-warning" role="alert" v-if="errorsMessage.subject">
                {{errorsMessage.subject[0]}}
            </div>
        </div>
        <div class="mb-3">
            <label for="commentBody" class="form-label">Комментарий</label>
            <textarea class="form-control" id="commentBody" rows="3" v-model="body"></textarea>
            <div class="alert alert-warning" role="alert" v-if="errorsMessage.body">
                {{errorsMessage.body[0]}}
            </div>
        </div>
        <button class="btn btn-success" type="submit">Отправить</button>
    </form>
    <div class="alert alert-success" v-else>Комментарий успешно отправлен!</div>
</template>

<script>
    export default {
        data() {
            return{
                subject: '',
                body: ''
            }
        },
        computed: {
            commentSuccess() {
                return this.$store.state.commentSuccess;
            },
            errorsMessage() {
                return this.$store.state.errors;
            }
        },
        methods: {
            submit_form() {
                this.$store.dispatch('addComment', {
                    subject: this.subject,
                    body: this.body,
                    article_id: this.$store.state.article.id
                });
            }
        },
        mounted() {
            console.log('Component CommentForm mounted.');
        }
    }
</script>
