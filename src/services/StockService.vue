import axios from 'axios'

const apiClient = axios.create({
  baseURL: 'http://site.url/api',
  withCredentials: false,
  headers: {
    Accept: 'application/json',
    'Content-type': 'application/json'
  }
})

apiClient.defaults.headers.common['Authorization'] = AUTH_TOKEN;

export default {
  getStockLists() {
    return apiClient.get('/stocklist/')
  },
  getStockList(id) {
    return apiClient.get('/stocklist/' + id)
  }
}