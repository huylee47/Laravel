export const fetchDashboards = async () => {
    try {
        const response = await fetch('http://127.0.0.1:8000/api/Admin/Dashboard/list');
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
        throw error;
    }
};