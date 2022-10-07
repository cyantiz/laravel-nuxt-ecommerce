/* eslint-disable dot-notation */
import axios from 'axios';
import Cookie from "js-cookie"

axios.defaults.baseURL = process.env.apiBaseUrl;
if (Cookie.get('access_token')) {
    axios.defaults.headers.common['Authorization'] = 'Bearer ' + Cookie.get('access_token');
}
axios.defaults.headers.post['Content-Type'] = 'application/json';
axios.defaults.headers.post['Accept'] = 'application/json';
axios.defaults.headers.post['Access-Control-Allow-Origin'] = '*';
axios.defaults.headers.post['X-Requested-With'] = 'XMLHttpRequest';

/* eslint-disable require-await */
export async function getAllProduct() {
    try {
        return axios.get('/product/');
    } catch (err) {
        console.log(err);
        alert("Error when fetching products");
    }
}

export async function getProduct(id) {
    try {
        return axios.get(`/product/${id}`);
    } catch (err) {
        console.log(err);
        alert("Error when fetching product");
    }
}

export async function login(account) {
    try {
        // accounts: {email, password}
        return axios.post('/auth/login', account);
    } catch (err) {
        console.log(err);
        throw err;
    }
}

export async function logout() {
    try {
        return axios.post('/auth/logout');
    } catch (err) {
        console.log(err);
        throw err;
    }
}

export async function getCart() { 
    try {
        return axios.get('/customer/cart');
    } catch (err) {
        console.log(err);
        throw err;
    }
}