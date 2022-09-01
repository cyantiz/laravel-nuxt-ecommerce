<script>
export default {
    layout: 'default',
    data() {
        return {
        }
    },
    computed: {
        user() {
            return this.$store.state.users.user;
        }
    }
}
</script>

<template>
    <div>
        {{user}}
    </div>
</template>

<style lang="less" scoped>

</style>