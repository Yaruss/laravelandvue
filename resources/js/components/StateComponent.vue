<template>
    <div class="mt-3">
        <span @click="addLike()" :class="isLike ? 'bg-danger' : 'bg-primary'" class="badge">{{likesNumber}} <i class="bi bi-hand-thumbs-up"></i></span>
        <span class="badge bg-primary" >{{viewsNumber}} <i class="bi bi-eye"></i></span>
    </div>
</template>

<script>
    export default {
        computed: {
            isLike() {
                return this.$store.state.like;
            },
            viewsNumber() {
                return this.$store.getters.articleViews;
            },
            likesNumber() {
                return this.$store.getters.articleLikes;
            }
        },
        methods:{
            addLike(){
                this.$store.dispatch('addLike', {
                    slug: this.$store.state.slug,
                    increment: this.isLike
                });
            }
        },
        mounted() {
            console.log('Component State mounted.');
        }
    }
</script>
