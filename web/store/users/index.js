import Cookie from 'js-cookie';
import { message } from 'ant-design-vue'
import { login, logout } from '@/utils/api'
export const state = () => ({
    user: null,
}) 

export const mutations = {
    SET_USER: (state, account) => {
        state.user = account;
    },
}

export const actions = {
    async login({ commit, $axios }, account ) {
        // accounts: {email, password}
        try {
            const { data } = await login(account);
            console.log(data);
            Cookie.set('access_token', data.access_token)
            commit('SET_USER', { email: data.user.email, role: data.user.role });
            if (data.user.role === 1) {
                location.href = '/admin';
                location.reload();
            }
            else {
                this.app.router.push('/')
                location.reload();
            }
        }
        catch (err) {
            console.log(err);
            if(err.response.status === 401) {
                message.error("Wrong email or password");
            }
            // this.$message.error(err.response.data.message);
        }
    },
    async logout({ commit, $axios }) {
        try {
            await logout();
            localStorage.clear()
            Cookie.remove('access_token');
            commit('SET_USER', null);
            location.href = '/';
            location.reload();
        }
        catch (err) {
            console.log(err);
            
        }
    },
}