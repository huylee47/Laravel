import apiClient from './api.js';

export const fetchUsers = async () => {
    try {
        const response = await apiClient.get('api/Admin/Account/list');
        return response.data;
    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
        throw error;
    }
};

export const createUser = async (userData) => {
    try {
        const response = await apiClient.post('api/Admin/Account/Create', userData);
        return response.data;
    } catch (error) {
        console.error('There was a problem with the create operation:', error);
        throw error;
    }
};

export const fetchUserById = async (id) => {
    try {
        const response = await apiClient.get(`api/Admin/Account/${id}`);
        return response.data;
    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
        throw error;
    }
};

export const updateUser = async (id, userData) => {
    try {
        const response = await apiClient.put(`api/Admin/Account/${id}`, userData);
        return response.data;
    } catch (error) {
        console.error('There was a problem with the update operation:', error);
        throw error;
    }
};

export const editUser = async (id, UserData) => {
    try {
        const response = await apiClient.put(`api/Admin/Account/${id}`, UserData);
        return response.data;
    } catch (error) {
        console.error('There was a problem with the edit operation:', error);
        throw error;
    }
};

export const deleteUser = async (id) => {
    try {
        const response = await apiClient.delete(`api/Admin/Account/${id}`);
        return response.data;
    } catch (error) {
        console.error('There was a problem with the delete operation:', error);
        throw error;
    }
};