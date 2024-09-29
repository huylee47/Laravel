import apiClient from './api.js';

export const fetchBlogs = async () => {
    try {
        const response = await apiClient.get('api/blog/list');
        return response.data;
    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
        throw error;
    }
};

export const createBlog = async (BlogData) => {
    try {
        const response = await apiClient.post('api/blog/create', BlogData);
        return response.data;
    } catch (error) {
        console.error('There was a problem with the create operation:', error);
        throw error;
    }
};

export const fetchBlogById = async (id) => {
    try {
        const response = await apiClient.get(`api/blog/${id}`);
        return response.data;
    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
        throw error;
    }
};

export const updateBlog = async (id, BlogData) => {
    try {
        const response = await apiClient.put(`api/blog/${id}`, BlogData);
        return response.data;
    } catch (error) {
        console.error('There was a problem with the update operation:', error);
        throw error;
    }
};

export const editBlog = async (id, BlogData) => {
    try {
        const response = await apiClient.put(`api/blog/${id}`, BlogData);
        return response.data;
    } catch (error) {
        console.error('There was a problem with the edit operation:', error);
        throw error;
    }
};

export const deleteBlog = async (id) => {
    try {
        const response = await apiClient.delete(`api/blog/${id}`);
        return response.data;
    } catch (error) {
        console.error('There was a problem with the delete operation:', error);
        throw error;
    }
};