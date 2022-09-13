<template>
    <section>
        <div class="container">

            <div class="d-flex">
                <div class="row row-cols-3">
                    <div class="col mt-5" v-for="post in posts" :key="post.id">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{post.title}}</h5>
                                <p class="card-text">{{shortenPostContent(post.content)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <nav class="mt-5">
                <ul class="pagination">
                    <li :class="{'disabled' : currentPage === 1}" class="page-item mr-3"><a @click.prevent="getPostsFromApi(currentPage - 1)" class="page-link" href="#">Previous</a></li>
                    <li :class="{'disabled' : currentPage === lastPage}" class="page-item"><a @click.prevent="getPostsFromApi(currentPage + 1)" class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Posts',

    data() {
        return {
            posts: [],
            currentPage: 1,
            lastPage: null
        }
    },

    methods: {
        shortenPostContent(content) {
            if(content.length > 100) {
                return content.slice(0, 100) + '...';
            }

            return content;
        },
        getPostsFromApi(pageNumber){
            axios.get('http://127.0.0.1:8000/api/posts?page=' + pageNumber)
            .then((response) => {
            this.posts = response.data.results.data;
            this.currentPage = response.data.results.current_page;
            this.lastPage = response.data.results.last_page;
            });
        }
    },

    mounted() {
        this.getPostsFromApi(1)
    }
}
</script>