<script>
import { Button } from 'ant-design-vue'

export default {
    components: {
        Button,
    },
    layout: 'default',
    data() {
        return {
        }
    },
    computed: {
        cart() {
            return this.$store.state.cart
        },
    },
    created() {
    },
}
</script>

<template>
    <div id="cart-page" class="flex flex-col xl:flex-row">
        <div class="cart-page__products flex-1">
            <div class="cart-page__products__suggest w-full">
                <div class="h-[150px] w-full">suggest </div>
            </div>
            <div class="cart__products__title font-bold text-xl uppercase my-4 px-4 py-2 bg-rose bg-opacity-50">
                Your cart
            </div>
            <div class="cart__products__list">
                <CartProductItem v-for="item in cart.items" :key="item.id" :item="item" />
            </div>
            <div class="cart__products__buttons">
                <Button class="cart__products__button--delete-all" size="large">
                    Delete all
                </Button>
            </div>
        </div>
        <div class="cart-page__order-checkout w-[400px]">
            checkout 
        </div>
    </div>
</template>

<style lang="less" scoped>
</style>