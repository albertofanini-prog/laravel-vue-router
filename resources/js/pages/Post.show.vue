<template>
    <div class="py-10">
        <!-- {{$route.params.slug}}
        <h1 v-if="post">
            {{ post.title }}
        </h1> -->
        <div class="max-w-sm w-full lg:max-w-full lg:flex">
            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('/img/card-left.jpg')" title="Woman holding a mug">
            </div>
            <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">
                    <p class="text-sm text-gray-600 flex items-center mb-2">
                        <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                        </svg>
                        
                    </p>
                    <div class="text-gray-900 font-bold text-xl mb-2">
                        <h1 class="text-2xl">
                            Titolo: {{ post.title }}
                        </h1>
                    </div>
                    <p class="text-gray-700 text-md" v-if="post.category">
                        Categoria: {{ post.category.name }}    
                    </p>
                </div>
                <div class="flex items-center">
                    <img class="w-10 h-10 rounded-full mr-4" src="https://picsum.photos/450/250" alt="Avatar of Jonathan Reinink">
                    <div class="text-sm">
                        <p class="text-gray-900 leading-none">Jonathan Reinink</p>
                        <ul class="flex gap-2 items-center">
                            <li class="bg-purple-200 text-purple-900 rounded-full px-3 py-1 text-sm font-semibold after:content-['-']" v-for="tag in post.tag" :key="tag.id">
                                {{tag.name}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            post: null,
            loading: true
        }
    },
    methods:{
        //funzione che si occupa di fare la chiamata
        fetchPost(){
            //chiamata axios in get
                //route contiene slug
            axios.get(`/api/posts/${this.$route.params.slug}`)

            //recuperare la risposta
            .then( res => {
                const { post } = res.data
                this.post = post

                //se arriva post
                this.loading = false
            })

            .catch( err => {
                console.warn( err )
            })
        }
    },
    // mounted(){
    //     // console.log(this.$route)
    // },
    //fare chiamata al server per recuperare post con slug corrispondente
    beforeMount(){

        // //chiamata axios in get
        //     //route contiene slug
        // axios.get(`/api/posts/${this.$route.params.slug}`)

        // //recuperare la risposta
        // .then( res => {
        //     const { post } = res.data
        //     this.post = post
        // })

        // .catch( err => {
        //     console.warn( err )
        // })

        //invocare la funzione in methods
        this.fetchPost()
    }
}
</script>

<style>

</style>