<template>
    <div class="max-w-sm rounded overflow-hidden shadow-lg border-black">
        <img class="w-full" src="https://picsum.photos/450/250" alt="Sunset in the mountains">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">
                {{post.title}}
            </div>
            <p class="text-gray-700 text-base" v-if="post.category">
            {{post.category.name}}
            </p>
        </div>
        <div class="px-6 pt-4 pb-2">
            <span class="inline-block bg-purple-200 text-purple-900 rounded-full px-3 py-1 text-sm font-semibold mr-2 mb-2" v-for="tag in post.tags" :key="tag.id">{{tag.name}}</span>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        post: {
            type: Object,
            required: false
        }
    }
}
</script>

<style lang="scss" scoped>

</style>