<template>
    <div class="container">
        <h1>Our latest posts</h1>
        
        <Posts />
    </div>
</template>

<script>
import Posts from '../components/Posts.vue'
export default {
    name: 'BlogPage',
    components: {
        Posts
    }
}
</script>