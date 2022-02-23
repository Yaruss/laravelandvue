<template>
    <div class="mt-4">
        Теги:
        <a :href="tag.url" class="badge bg-danger" v-for="tag in tags">{{tag.label}}</a>
    </div>
</template>

<script>
    export default {
        computed: {
            tags() {
                return this.$store.state.article.tags;
            }
        },
        mounted() {
            console.log('Component Tag mounted.');
        }
    }
</script>
