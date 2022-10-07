<script>
export default {
    props: {
        product: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            
        }
    },
}
</script>

<template>
    <li class="product-card flex flex-col px-1 w-1/2 md:w-1/3 xl:w-1/4 2xl:w-1/5">
        <div class="product-card__image w-full overflow-hidden">
            <img :src="product.thumbnail.image_url" alt="" class="aspect-square object-cover w-full">
        </div>
        <div class="product-card__content">
            <h3 class="product-card__title">{{ product.name }}</h3>
            <p class="product-card__price">{{ Number(product.price).toLocaleString() }} VNĐ</p>
            <nuxt-link :to="`/product/${product.product_id}`" class="product-card__link">View Detail</nuxt-link>
        </div>
    </li>
</template>

<style lang="less" scoped>

</style>