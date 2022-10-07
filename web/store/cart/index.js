import { getCart } from "~/utils/api";

export const state = () => ({
    items: [],
}) 

export const mutations = {
    SET_CART: (state, cart) => {
        state.items = cart;
    },

}

export const actions = {
    async loadCart({ commit, $axios }) {
        try {
            const _cache = JSON.parse(localStorage.getItem('cart'));
            if (_cache && _cache.length !== 0) {
                commit('SET_CART', _cache);
            }
            else {
            const { data } = await getCart();
                commit('SET_CART', data);
                localStorage.setItem('cart', JSON.stringify(data));
            }
        } catch (err) {
            commit('SET_CART', []);
        }
    },
    async addToCart({ commit, $axios }, product) {
        try {
            const { data } = await this.$axios.post('/customer/cart/add-product', product);
            commit('SET_CART', data);
            localStorage.setItem('cart', JSON.stringify(state.cart));
        }
        catch (err) {
            console.log(err);
        }
    },
}