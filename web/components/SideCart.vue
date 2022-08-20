<script>
export default {
    name: 'SideCart',
    data() {
        return {
            isShow: false,
            cart: {
                items: [
                    {
                        id: 1,
                        name: 'Product 1',
                        thumbnail:
                            'https://photo2.tinhte.vn/data/attachment-files/2022/08/6073609_image.png',
                        price: 100000,
                        quantity: 1,
                    },
                    {
                        id: 2,
                        name: 'Product 2 with a really long name to check if responsive works well as i expect',
                        thumbnail:
                            'https://photo2.tinhte.vn/data/attachment-files/2022/08/6073609_image.png',
                        price: 200000,
                        quantity: 2,
                    },
                    {
                        id: 3,
                        name: 'Product 3',
                        thumbnail:
                            'https://photo2.tinhte.vn/data/attachment-files/2022/08/6073609_image.png',
                        price: 300000,
                        quantity: 3,
                    },
                    {
                        id: 4,
                        name: 'Product 4',
                        thumbnail:
                            'https://photo2.tinhte.vn/data/attachment-files/2022/08/6073609_image.png',
                        price: 400000,
                        quantity: 4,
                    },
                    {
                        id: 5,
                        name: 'Product 5',
                        thumbnail:
                            'https://photo2.tinhte.vn/data/attachment-files/2022/08/6073609_image.png',
                        price: 500000,
                        quantity: 5,
                    },
                ],
            },
        }
    },
    computed: {
        total() {
            return this.cart.items.reduce((total, item) => {
                return total + item.price * item.quantity
            }, 0)
        },
    },
    methods: {
        toggleSideCart() {
            this.isShow = !this.isShow
        },
    },
}
</script>

<template>
    <div
        class="side-cart fixed top-56 right-0 hidden lg:flex"
        :class="isShow ? 'side-cart--show-cart' : 'side-cart--hide-cart'"
    >
        <div class="side-cart__cart overflow-hidden">
            <div class="bg-white text-black flex flex-col">
                <div class="cart__title px-[15px] py-[10px] uppercase font-bold flex justify-between">
                    <span>
                        Cart ({{cart.items.length}})
                    </span>
                    <span class="caret"></span>

                </div>
                <div class="cart__divider h-[3px] bg-black self-center"></div>
                <ul class="cart__items px-[15px] py-[10px] flex flex-col max-h-[312px] overflow-y-scroll">
                    <li
                        v-for="item in cart.items"
                        :key="item.id"
                        class="list-none"
                    >
                        <div class="flex">
                            <img
                                :src="item.thumbnail"
                                alt="#"
                                class="item-thumbnail w-20 h-20 object-cover mr-[10px]"
                            />
                            <div class="item-info w-[180px] h-[80px] flex flex-col justify-between">
                                <div class="name font-bold text-base leading-[1.1] text-2-line">{{item.name}}</div>
                                <div class="text-[12px] leading-[1.1]">
                                    <div class="price w-full flex justify-between">
                                        <span class="current-price font-bold">{{Number(item.price).toLocaleString()}} VNĐ</span>
                                        <span class="price-before-sale line-through ">{{Number(1000000).toLocaleString()}}</span>
                                    </div>
                                    <div class="quantity flex w-full justify-between">
                                        <span>Quantity</span>
                                        <span>{{item.quantity}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="divider w-full h-[2px] mt-[14px] mb-[10px]"></div>
                    </li>
                </ul>
                <div class="cart__divider h-[3px] bg-black self-center"></div>
                <div class="cart__total flex justify-between px-[15px] py-[5px] font-bold text-base">
                    <div>Total:</div>
                    <div class="text-love">{{total.toLocaleString()}} VNĐ</div>
                </div>
                <div class="cart__pay-btn-container px-[15px] py-[5px]"></div>
                <div class="px-[15px] pt-[5px] pb-[10px]">
                    <a-button
                        class="uppercase font-bold"
                        type="primary"
                        size="large"
                        block
                    >Checkout</a-button>
                </div>
            </div>
        </div>
        <div
            class="side-cart__trigger-btn cursor-pointer w-10 h-[80px] bg-rose text-black flex flex-col items-center justify-center gap-2"
            @click="toggleSideCart"
        >
            <div class="order-count text-center text-md font-bold">{{cart.items.length}}</div>
            <a-icon
                type="shopping-cart"
                class="text-lg"
            />
        </div>
    </div>
</template>

<style lang="less" scoped>
.side-cart {
    &__cart {
        height: 472px;
        transition: height ease 0.35s;
    }
    &--show-cart > &__cart {
    }
    &--hide-cart > &__cart {
        height: 0px;
        user-select: none;
        pointer-events: none;
    }
}
.cart__divider {
    width: calc(100% - 30px);
}
.divider {
    background: url('~/assets/images/bg_divider.png') repeat-x 7px;
}
.text-2-line {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

.caret {
    content: '';
    display: block;
    width: 0;
    height: 0;
    border-width: 6px 6px;
    border-style: solid;
    border-color: transparent;
    border-bottom-color: transparent;
    border-bottom-color: rgb(235, 188, 186);
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg) translateY(15px);
}
</style>