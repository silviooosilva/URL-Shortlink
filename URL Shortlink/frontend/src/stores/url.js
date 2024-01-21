import { defineStore } from 'pinia'
import axios from 'axios'
import { ref } from 'vue'

export const urlApiStore = defineStore('url', () => {
    let error = ref('')
    let response = ref({})
    let allUrl = ref([])
    let url = ref({})

    async function getAllUrl() {
        const token = JSON.parse(localStorage.getItem('token'))
        let urls = []
        if(token) {
            const config = {
                headers:{
                    'Authorization': `Bearer ${token.access_token}`
                }
            }
            await axios.get("http://localhost:8000/api/getAllUrl", config)
            .then((res) => {
                urls = JSON.parse(JSON.stringify(res.data))
            })
            .catch((e) => {
                error = 'Erro: ', e
            })
        }
        allUrl.value = urls
    }
    async function getShortUrl(string) {
        const token = JSON.parse(localStorage.getItem('token'))
        let data = []
        if(token) {
            const config = {
                headers:{
                    'Authorization': `Bearer ${token.access_token}`
                }
            }
            await axios.post("http://localhost:8000/api/url", {
                data: string
            }, config)
            .then((res) => {
                data = JSON.parse(JSON.stringify(res.data))
            })
            .catch((e) => {
                error = 'Erro: ', e
            })
        }
        response.value = data
    }

    async function deleteUrl(id) {
        const token = JSON.parse(localStorage.getItem('token'))
        let data = []
        if(token) {
            const config = {
                headers:{
                    'Authorization': `Bearer ${token.access_token}`
                }
            }
            await axios.post("https://localhost:8000/api/deleteUrl", {
                id: id
            }, config)
            .then((res) => {
                alert(JSON.parse(JSON.stringify(res.data.message)))
                location.reload()
            })
            .catch((e) => {
                error = 'Erro: ', e
            })
        }
        response.value = data
    }

    async function getUrl(id) {
        const token = JSON.parse(localStorage.getItem('token'))
        let data = []
        if(token) {
            const config = {
                headers:{
                    'Authorization': `Bearer ${token.access_token}`
                }
            }
            await axios.get(`http://localhost:8000/api/getUrl?id=${id}`, config)
            .then((res) => {
                data = JSON.parse(JSON.stringify(res.data))
            })
            .catch((e) => {
                error = 'Erro: ', e
            })
        }
        url.value = data
    }
    return { getUrl , getAllUrl , getShortUrl , deleteUrl , response , allUrl , error , url }
})
