import Vue from 'vue'
import Vuex from 'vuex'
import Axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        status: '',
        token: localStorage.getItem('token') || '',
        user: {}
    },
    mutations: {
        auth_request(state) {
            state.status = 'loading'
        },
        auth_success(state, token, user) {
            state.status = 'success'
            state.token = token
            state.user = user
        },
        auth_error(state) {
            state.status = 'error'
        },
        logout(state) {
            state.status = ''
            state.token = ''
        },
    },
    actions: {
        login({
            commit
        }, user) {
            return new Promise((resolve, reject) => {
                commit('auth_request')
                Axios({
                        url: 'http://api.cooklog.local/api/user/login',
                        data: user,
                        method: 'POST'
                    })
                    .then(resp => {
                        const token = resp.data.access_token
                        localStorage.setItem('token', token)
                        Axios.defaults.headers.common['Authorization'] = token
                        Axios({
                                url: 'http://api.cooklog.local/api/user/profil',
                                method: 'GET'
                            })
                            .then(resp => {
                                user = resp.data;
                                resolve(resp);
                            })
                            .catch(err => {
                                commit('auth_error', err)
                                reject(err)
                            })
                        commit('auth_success', token, user)
                        resolve(resp)
                    })
                    .catch(err => {
                        commit('auth_error')
                        localStorage.removeItem('token')
                        reject(err)
                    })
            })
        },
        register({
            commit
        }, user) {
            return new Promise((resolve, reject) => {
                commit('auth_request')
                Axios({
                        url: 'http://api.cooklog.local/api/user/register',
                        data: user,
                        method: 'POST'
                    })
                    .then(resp => {
                        const token = resp.data.access_token;
                        localStorage.setItem('token', token);
                        Axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                        Axios({
                                url: 'http://api.cooklog.local/api/user/profil',
                                method: 'GET'
                            })
                            .then(resp => {
                                user = resp.data;
                                resolve(resp);
                            })
                            .catch(err => {
                                commit('auth_error', err)
                                reject(err)
                            })
                        commit('auth_success', token, user)
                        resolve(resp)
                    })
                    .catch(err => {
                        commit('auth_error', err)
                        localStorage.removeItem('token')
                        reject(err)
                    })
            })
        },
        logout({
            commit
        }) {
            return new Promise((resolve, reject) => {
                commit('logout')
                localStorage.removeItem('token')
                delete Axios.defaults.headers.common['Authorization']
                resolve()
            })
        }
    },
    getters: {
        isLoggedIn: state => !!state.token,
        authStatus: state => state.status,
    }
})