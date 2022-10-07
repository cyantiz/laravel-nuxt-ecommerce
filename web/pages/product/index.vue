<script>
import { getAllProduct } from '~/utils/api';
import ProductCard from '@/components/organism/ProductCard.vue';

export default {
    components: { ProductCard },
    layout: "default",
    data() {
        return {
            products: []
        };
    },
    async created() {
        const { data } = await getAllProduct();
        this.products = data;
    },
    methods: {},
}
</script>

<template>
    <div>
        <h1>Product</h1>
        <div class="flex flex-col gap-2">
            <div class="filter-bar h-24 w-full px-1">
                <div class="h-full w-full bg-love"></div>
            </div>
            <ul class="list-none flex flex-wrap m-0 p-0">
                <ProductCard v-for="product in products" :key="product.product_id" :product="product" />
            </ul>
        </div>
    </div>
</template>

<style lang="less" scoped>

</style> 