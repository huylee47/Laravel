import apiClient from './api.js';

export const fetchProducts = async () => {
    try {
        const response = await apiClient.get('api/product/list');
        return response.data;
    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
        throw error;
    }
};

export const createProduct = async (ProductData) => {
    try {
        const response = await apiClient.post('api/product/create', ProductData);
        return response.data;
    } catch (error) {
        console.error('There was a problem with the create operation:', error);
        throw error;
    }
};

export const fetchProductById = async (id) => {
    try {
        const response = await apiClient.get(`api/product/${id}`);
        return response.data;
    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
        throw error;
    }
};

export const updateProduct = async (id, ProductData) => {
    try {
        const response = await apiClient.put(`api/product/${id}`, ProductData);
        return response.data;
    } catch (error) {
        console.error('There was a problem with the update operation:', error);
        throw error;
    }
};

export const editProduct = async (id, ProductData) => {
    try {
        const response = await apiClient.put(`api/product/${id}`, ProductData);
        return response.data;
    } catch (error) {
        console.error('There was a problem with the edit operation:', error);
        throw error;
    }
};

export const deleteProduct = async (id) => {
    try {
        const response = await apiClient.delete(`api/product/${id}`);
        return response.data;
    } catch (error) {
        console.error('There was a problem with the delete operation:', error);
        throw error;
    }
};