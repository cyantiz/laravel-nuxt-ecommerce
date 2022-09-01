<script>

import {Form, Button, Input, Icon } from 'ant-design-vue';

const FormItem = Form.Item;

export default {
    components:{Form, Button, Input, Icon, FormItem},
    layout: 'auth',
    data() {
        return {
            form: this.$form.createForm(this, { name: 'login' }),
        }
    },
    created() {
        console.log(this.$store.state)
    },
    methods: {
        handleLogin(e) {
            e.preventDefault()
            this.form.validateFields((err, values) => {
                // values should be {email: 'xxx', password: 'xxx'}
                if (!err) {
                    this.$store.dispatch('users/login', values); 
                }
            })
        },
    },

}
</script>

<template>
    <div id="login">
        <h1 class="title font-bold text-3xl mb-16">Login</h1>
        <Form
            layout="vertical"
            :form="form"
            @submit.prevent="handleLogin"
        >
            <FormItem>
                <Input
                    v-decorator="[
                        'email',
                        {
                            rules: [
                                {
                                    required: true,
                                    message: 'Please input your email!',
                                },

                                //validate type email on losing input
                                // {
                                //     type: 'email',
                                //     message: 'The input is not valid E-mail!',                                
                                // },
                            ],
                        },
                    ]"
                    placeholder="Email"
                    size="large"
                >
                    <template #prefix> <Icon type="mail" /> </template
                ></Input>
            </FormItem>

            <FormItem>
                <Input
                    v-decorator="[
                        'password',
                        {
                            rules: [
                                {
                                    required: true,
                                    message: 'Please input your password!',
                                },
                            ],
                        },
                    ]"
                    type="password"
                    placeholder="Password"
                    size="large"

                >
                    <template #prefix> <Icon type="lock" /> </template
                ></Input>
            </FormItem>

            <div class="forgot-password mb-2">
                <NuxtLink
                    to="#"
                    class="flex items-center justify-end group gap-0 -mr-[12px]"
                >
                    <span class="transition-all">
                        Forgot password?
                    </span>
                    <Icon
                        type="swap-right"
                        class="
                            opacity-0
                            -translate-x-5
                            group-hover:translate-x-1 group-hover:opacity-100
                            transition-all
                        "
                    />
                </NuxtLink>
            </div>
            <FormItem>
                <Button size="large" class="font-bold" type="primary" html-type="submit"  block>
                    Login
                </Button>
            </FormItem>
        </Form>

        <div class="suggest-create-account flex flex-col mt-20">
            <span class="text-center text-[16px] mb-2">Don't have an account?</span>

            <NuxtLink to="/register" class="h-10 font-bold w-full max-w-[336px] bg-black flex justify-center items-center text-[16px] cursor-pointer hover:bg-white hover:text-[#2a273f] transition-all duration-300" >
                Create account
            </NuxtLink>
        </div>
        
    </div>
</template>

<style lang="less" scoped>
</style>