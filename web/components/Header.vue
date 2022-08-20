<script>
export default {
    name: 'Header',
    data() {
        return {
            form: this.$form.createForm(this, { name: 'search' }),
        }
    },
    methods: {
        handleSearch(e) {
            this.form.validateFields((err, values) => {
                if (!err) {
                    console.log('Received values of form: ', values)
                }
            })
        },
    },
}
</script>

<template>
    <div
        id="__header"
        class="relative"
    >
        <div class="__header__top py-1 flex gap-8 justify-end w-full bg-black px-16">
            <NuxtLink
                to="/cart"
                class="flex items-center gap-2 hover:text-rose cursor-pointer"
            >
                <a-icon type="container" />
                <span>Track your order</span>
            </NuxtLink>
            <NuxtLink
                to="/login"
                class="flex items-center gap-2 hover:text-rose cursor-pointer"
            >
                <a-icon type="shop" />
                <span>Stores</span>
            </NuxtLink>
            <NuxtLink
                to="/login"
                class="flex items-center gap-2 hover:text-rose cursor-pointer"
            >
                <a-icon type="user" />
                <span>Login</span>
            </NuxtLink>
            <NuxtLink
                to="/login"
                class="flex items-center gap-2 hover:text-rose cursor-pointer"
            >
                <a-icon type="shopping-cart" />
                <span>Cart</span>
            </NuxtLink>
        </div>
        <div class="__header__navbar flex py-6 px-12 w-full items-center">
            <div class="logo w-[200px] text-right">
                <h1 class="font-black text-3xl">LOGO</h1>
            </div>
            <div class="__header__navbar__menu flex-1 tracking-wider flex gap-5 uppercase font-bold text-lg justify-center items-center">
                <NuxtLink
                    to="/product"
                    class="text-white hover:text-love"
                >
                    All Products
                </NuxtLink>
                <div class="font-thin select-none opacity-50">|</div>
                <NuxtLink
                    to="/product?category=keyboard"
                    class="text-white hover:text-love"
                >
                    Keyboards
                </NuxtLink>
                <div class="font-thin select-none opacity-50">|</div>
                <NuxtLink
                    to="/product?category=switch"
                    class="text-white hover:text-love"
                >
                    Switches
                </NuxtLink>
                <div class="font-thin select-none opacity-50">|</div>
                <NuxtLink
                    to="/product?category=keycap"
                    class="text-white hover:text-love"
                >
                    Keycaps
                </NuxtLink>
            </div>
            <div class="search w-[200px] flex items-center">
                <a-form
                    :form="form"
                    @submit.prevent="handleSearch"
                >
                    <a-form-item>
                        <a-input
                            v-decorator="['search']"
                            placeholder="Search"
                        >
                            <template #prefix>
                                <a-icon type="search" />
                            </template>
                        </a-input>
                    </a-form-item>
                </a-form>
            </div>
        </div>
    </div>
</template>

<style lang="less" scoped>
.ant-row.ant-form-item {
    margin-bottom: 0;
}
</style>