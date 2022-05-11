<template>
    <div class="py-10">
        {{$route.params.slug}}
    </div>
</template>

<script>
export default {
    mounted(){
        console.log(this.$route)
    },
    //fare chiamata al server per recuperare post con slug corrispondente
    beforeMount(){

        //chiamata axios in get
            //route contiene slug
        // axios.get(`/api/posts/${this.$route.params.slug}`)
    }
}
</script>

<style>

</style>