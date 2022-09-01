import jwtDecode from "jwt-decode"
import cookieparser from "cookieparser"
import Cookie from "js-cookie"

export const state = () => ({
    note: '',
})

export const mutations = {

}

export const actions = {
    nuxtServerInit({ commit, dispatch }, context) {
        if (process.server && process.static) return;
        if (!context.req.headers.cookie) return;
        
        const parsed = cookieparser.parse(context.req.headers.cookie);
        const accessTokenCookie = parsed.access_token;

        if (!accessTokenCookie) return;
        
        const decoded = jwtDecode(accessTokenCookie);
        console.log('decoded:', decoded);
        if (decoded.exp * 1000 < Date.now()) {
            Cookie.remove('access_token');
            return;
        } 
        if (decoded) {
            commit('users/SET_USER', {
                email: decoded.sub,
                role: decoded.role
            })
        }
    }
}