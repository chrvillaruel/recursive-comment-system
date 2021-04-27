import axios from 'axios'

const API_URL = 'http://127.0.0.1:8000/api'

// can also create an axios instance specifically for the backend API
const api = axios.create({
    baseURL: API_URL,
    withCredentials: false,
    headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json',
    },
})

export { api }
