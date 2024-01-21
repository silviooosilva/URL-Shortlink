import { defineStore } from 'pinia'
import axios from 'axios'
import { ref } from 'vue'

export const userStore = defineStore('users', () => {
    let response = ref({})
    let users = ref({})

    async function getUser(){
        const token = JSON.parse(localStorage.getItem('token'))
        let user = []
        if(token) {
            const config = {
                headers:{
                    'Authorization': `Bearer ${token.access_token}`
                }
            }
            await axios.get('http://localhost:8000/api/getUser',config)
            .then((res) => {
                user = JSON.parse(JSON.stringify(res.data))
            })
            .catch((error) => {
                console.log(`ERRO: ${error}`)
            })
        }
        users.value = user[0]
    }

    async function registerUser(person){
        const data = person

        await axios.post('http://localhost:8000/api/register', data)
        .then((res) => {
            response = JSON.parse(JSON.stringify(res.data))
            location.reload()
            location.href = "/panel"
        })
        .catch((error) => {
            console.log(`ERRO: ${error}`)
        })
    }

    return { registerUser , getUser , response , users }
})
