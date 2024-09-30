import axios from '../axios';

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
    }
};

export function isAuthenticated() {
    const token = localStorage.getItem('token');
    return !!token;
}
