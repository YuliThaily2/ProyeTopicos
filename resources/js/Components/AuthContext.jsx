// AuthContext.js
import { createContext, useContext, useState } from 'react';

const AuthContext = createContext();

export const AuthProvider = ({ children }) => {
  const [authToken, setAuthToken] = useState(null);

  const setToken = (token) => {
    setAuthToken(token);
  };

  const logout = () => {
    setAuthToken(null);
    // Realiza cualquier otra acción necesaria al cerrar sesión
  };

  return (
    <AuthContext.Provider value={{ authToken, setToken, logout }}>
      {children}
    </AuthContext.Provider>
  );
};

export const useAuth = () => {
  return useContext(AuthContext);
};
