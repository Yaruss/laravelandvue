<template>
    <div class="container pb-5 mt-5">
        <div class="showing" v-for="comment in comments">
            <div class="toast-header">
                <img src="https://via.placeholder.com/50/5F113B/FFFFFF/?text=User" class="rounded me-2" alt="User">
                <strong class="me-auto">{{comment.subject}}</strong>
                <small class="text-muted">{{comment.created_at}}</small>
            </div>
            <div class="toast-body">
                {{comment.body}}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        computed: {
            comments() {
                return this.$store.state.article.comments;
            }
        },
        mounted() {
            console.log('Component Comment mounted.');
        }
    }
</script>
