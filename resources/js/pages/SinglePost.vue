<template>
    <div class="container">
        <div v-if="post">
            <h1 class="mt-5 mb-5">{{post.title}}</h1>
            <p>{{post.content}}</p>
        </div>

        <div v-if="post.category" class="mt-5">
            Category: {{post.category.name}}
        </div>

        <div class="mt-1" v-if="post.tags.length > 0">
            <span class="btn btn-primary mr-3" v-for="tag, index in post.tags" :key="index">
                {{tag.name}}
            </span>
        </div>
    </div>
</template>

<script>
export default {
    name: 'SinglePost',
    data() {
        return {
            post: null
        }
    },
    mounted() {
        axios.get('http://127.0.0.1:8000/api/posts/' + this.$route.params.slug)
        .then((response) => {
            this.post = response.data.results;
        });
    }
}
</script>