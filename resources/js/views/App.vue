<template>
    <div class="app bg-green-100">
        <header>
            <nav class="container">
                <ul class="pagination flex justify-center gap-4 items-center">
                    <li class="flex items-center justify-center text-md bg-blue-300 rounded-full my-6 p-1">Home</li>
                    <li class="flex items-center justify-center text-md bg-blue-300 rounded-full my-6 p-1">Posts</li>
                    <li class="flex items-center justify-center text-md bg-blue-300 rounded-full my-6 p-1">Categories</li>
                </ul>
            </nav>
        </header>
        <PostsGrid/>
        <footer>
            <div class="container py-5">
                &copy; Boolpress 2022
            </div>
        </footer>
    </div>
</template>

<script>
    import PostsGrid from '../components/Posts.index.vue'

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