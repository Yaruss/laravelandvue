<template>
    <div class="mt-3">
        <span class="badge bg-primary">{{viewsNumber}} <i class="bi bi-hand-thumbs-up"></i></span>
        <span class="badge bg-danger">{{likesNumber}} <i class="bi bi-eye"></i></span>
    </div>
</template>

<script>
    export default {
        computed: {
            viewsNumber() {
                return this.$store.getters.articleViews;
            },
            likesNumber() {
                return this.$store.getters.articleLikes;
            }
        },
        mounted() {
            console.log('Component State mounted.');
        }
    }
</script>
