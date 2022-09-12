<template>
    <section>
        <div class="container">
            <h1 class="mt-5 mb-5">Our latest posts</h1>

            <div class="d-flex">
                <div class="row row-cols-3">
                    <div class="col mt-5" v-for="post in posts" :key="post.id">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{post.title}}</h5>
                                <p class="card-text">{{shortenPostContent(post.content)}}</p>
                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Posts',
    data() {
        return {
            posts: [

            ]
        }
    },
    methods: {
        shortenPostContent(content) {
            if(content.length > 100) {
                return content.slice(0, 100) + '...';
            }

            return content;
        },
        getPostsFromApi(){
            axios.get('http://127.0.0.1:8000/api/posts')
            .then((response) => {
            this.posts = response.data.results;
            });
        }
    },
    mounted() {
        this.getPostsFromApi()
    }
}
</script>