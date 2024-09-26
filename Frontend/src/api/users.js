export const fetchAuths = async () => {
  try {
    const response = await fetch('http://127.0.0.1:8000/api/Admin/Account/list');
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return await response.json();
  } catch (error) {
    console.error('There was a problem with the fetch operation:', error);
    throw error;
  }
};
export const createUser = async (userData) => {
  try {
    const response = await fetch('http://127.0.0.1:8000/api/Admin/Account/Create', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(userData),
    });
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return await response.json();
  } catch (error) {
    console.error('There was a problem with the create operation:', error);
    throw error;
  }
};
// In your api/users.js
export const fetchAuthById = async (id) => {
  try {
    const response = await fetch(`http://127.0.0.1:8000/api/Admin/Account/${id}`);
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return await response.json();
  } catch (error) {
    console.error('There was a problem with the fetch operation:', error);
    throw error;
  }
};
export const updateUser = async (id, userData) => {
  const response = await fetch(`http://127.0.0.1:8000/api/Admin/Account/${id}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(userData),
  });

  if (!response.ok) {
    throw new Error('Network response was not ok');
  }

  return await response.json();
};


export const editAuth = async (id, authData) => {
  try {
    const response = await fetch(`http://127.0.0.1:8000/api/Admin/Account/${id}`, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(authData),
    });

    if (!response.ok) {
      throw new Error('Network response was not ok');
    }

    return await response.json();
  } catch (error) {
    console.error('There was a problem with the edit operation:', error);
    throw error;
  }
};

export const deleteAuth = async (id) => {
  try {
    const response = await fetch(`http://127.0.0.1:8000/api/Admin/Account/Delete/${id}`, {
      method: 'DELETE',
    });

    if (!response.ok) {
      throw new Error('Network response was not ok');
    }

    return await response.json();
  } catch (error) {
    console.error('There was a problem with the delete operation:', error);
    throw error;
  }
};
