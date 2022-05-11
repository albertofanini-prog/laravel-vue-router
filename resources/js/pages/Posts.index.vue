<template>
    <div>
        <div class="container">
            <h1 class="text-4xl py-5">
                Ultimi post
            </h1>
        </div>
        <div class="container grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
            <PostCard v-for="post in posts" :key="post.id" :post="post"/>
        </div>
        <div class="container py-6">
            <ul class="pagination flex justify-center gap-4 items-center">
                <!-- 
                collegare funzione con @click e passare parametro n
                assegnare colore active con :class
                assegnare id selettore pagine
                assegnare chiave per selezionare pagina
                -->
                <li
                @click="fetchPosts(n)"
                :class="[currentPage === n ? 'bg-orange-400' : 'bg-black/30', 'dot cursor-pointer rounded-full h-10 w-10 flex items-center justify-center text-sm text-white']" 
                v-for="n in lastPage" 
                :key="n"
                >
                    {{n}}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import PostCard from '../components/PostCard.vue' //uscire da views/andare in components/prendere componente

export default {
    components:{
        PostCard
    },
    data(){
        return{
            posts: [],
            //assegnare ultima pagina di default
            lastPage: 0,
            //assegnare prima pagina di default
            currentPage: 1,
        }
    },
    methods: {
        //passare parametro prima pagina di default
        fetchPosts(page = 1){
            //axios.get
            //chiamata axios
            //recuperare i post
                //passare il parametro page per buttons currentPage, nextPage
            axios.get('/api/posts',{
                params:{
                    page: page
                }
            })
            .then(res=>{
                // console.log(res.data.posts)
                //recuperare proprietà (array) posts in res.data
                const {posts} = res.data
                //salvare i dati, la prima pagina e l'ultima
                const {data, last_page, current_page} = posts

                //salvare i posts
                // this.posts = posts.data o
                //assegnare a this.post i data
                this.posts = data
    
                //assegnare lastPage
                this.lastPage = last_page

                //assegnare currentPage
                this.currentPage = current_page
            })
            .catch(err=>{
                console.warn(err)
            })
        }
    },
    mounted(){
        this.fetchPosts();
    }
}
</script>

<style lang="scss" scoped>

</style>