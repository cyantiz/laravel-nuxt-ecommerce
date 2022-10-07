<script>
import { InputNumber, Icon } from 'ant-design-vue'
export default {
    components: {
        InputNumber, Icon, 
    },
    props: {
        item: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
        }
    },
    methods: {
        handleLove() {
            // 
        },
        handleDelete() {
            // 
        }
    }
}
</script>

<template>
    <div class="product w-full mb-2">
        <div class="product__wrapper flex">
            <div class="product__left thumbnail-wrapper w-[120px] min-w-[120px] lg:w-[160px] aspect-square overflow-hidden">
                <img class="w-full h-full object-cover" :src="item.thumbnail.image_url" alt="#">
            </div>
            <div class="product__center flex-1 pl-5 flex flex-col">
                <div class="product__name font-medium text-xl">{{item.name}}</div>
                <div class="product__price text-lg">
                    Price: {{ Number(item.price).toLocaleString() }} VNĐ
                </div>
                <div class="product__quantity flex gap-2 items-center mt-auto">
                    <span class="text-lg">Quantity: </span> 
                    <InputNumber :min="1" :max="item.in_stock" />
                </div>
            </div>
            <div class="product__right w-[180px] flex flex-col items-end justify-between">
                <div class="product__total-price text-lg font-bold">
                    {{ Number(item.price * item.quantity).toLocaleString() }} VNĐ
                </div>
                <div class="product__buttons flex gap-3">
                    <div class="product__button--love bg-love bg-opacity-30 cursor-pointer text-white p-3 w-full flex items-center justify-center">
                        <Icon
                            type="heart"
                            class="text-lg leading-[1]"
                        />
                    </div>
                    <div class="product__button--delete bg-pine bg-opacity-30 cursor-pointer text-white p-3 w-full flex items-center justify-center">
                        <Icon
                            type="delete"
                            class="text-lg leading-[1]"
                        />  
                    </div>
                </div>
            </div>
        </div>
        <div v-if="item.quantity > item.in_stock" class="product__notification bg-love bg-opacity-40 py-2 my-2 w-full text-center">
            There is only {{ item.in_stock }} stock left of this product, please change the quantity
        </div>
        <div class="divider w-full h-[2px] my-5 invert"></div> 
    </div>
</template>

<style lang="less" scoped>
.product {
    &__notification {
        border: 1px solid rgb(235 111 146);
    }
    &__button--love {
        border: 1px solid rgb(235 111 146);
    }
    &__button--delete {
        border: 1px solid rgb(49 116 143);

    }
}
</style>