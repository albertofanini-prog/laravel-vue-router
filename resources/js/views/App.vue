<template>
    <div class="app bg-green-100">
        <header>
            <nav class="container py-6 flex gap-4 items-center">
                <ul class="contents">

                    <li class="flex items-center justify-center text-md bg-blue-300 rounded-full my-6 p-1">
                        <!-- assegnare to="" contente il path da visitrare, tipo href -->
                        <router-link to="/posts">Posts </router-link>
                    </li>
                    <li class="flex items-center justify-center text-md bg-blue-300 rounded-full my-6 p-1">
                        <!-- fare binding e passare oggetto -->
                        <router-link :to="{ name: 'contact' }">Contact</router-link>
                    </li>

                    <!-- <li class="flex items-center justify-center text-md bg-blue-300 rounded-full my-6 p-1">Home</li>
                    <li class="flex items-center justify-center text-md bg-blue-300 rounded-full my-6 p-1">Posts</li>
                    <li class="flex items-center justify-center text-md bg-blue-300 rounded-full my-6 p-1">Categories</li> -->
                </ul>
            </nav>
        </header>
        <!-- <PostsGrid/> -->

        <!-- contenuto relativo alla rotta da visualizzare -->
        <router-view></router-view>

        <footer>
            <div class="container py-5">
                &copy; Boolpress 2022
            </div>
        </footer>
    </div>
</template>

<script>
    import PostsGrid from '../pages/Posts.index.vue'

    export default{
        components: {
            PostsGrid,
        }
    }
</script>

<style lang="scss" scoped>
.app{
    min-height: 100vh;
}
</style>