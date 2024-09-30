import axios from '../axios';
import apiClient from './api.js';

export const fetchProfile = async () => {
    try {
        const response = await apiClient.get('api/user/profile');
        return response.data;
    } catch (error) {
        console.error('Đã xảy ra sự cố với thao tác tìm nạp:', error);
        throw error;
    }
};

export const authService = {
    login(username, password) {
        if (!username || !password) {
            return Promise.reject('Vui lòng điền vào cả hai trường.');
        }
        return axios.post('http://127.0.0.1:8000/api/Auth/login', {
            username,
            password,
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        })
            .then(response => {
                const { token, role } = response.data;
                localStorage.setItem('token', token);
                localStorage.setItem('user', JSON.stringify({ role }));
                return response;
            });
    },
};

export function isAuthenticated() {
    const token = localStorage.getItem('token');
    return !!token;
}
