import React, { useState } from 'react';
import { useAuth } from './AuthContext';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';

const Login = () => {
  const { setToken } = useAuth();
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const navigate = useNavigate();

  const handleLogin = async () => {
    try {
      const response = await axios.post('http://localhost/ProyePet/public/api/login', {
        email,
        password,
      });

      const token = response.data.token;

      // Almacena el token utilizando el contexto
      setToken(token);

      // Utiliza navigate para redirigir al usuario a la página de CrudBra
      navigate('/ProyePet/public/ListCards');  // Ajusta la ruta según la estructura de tus rutas

      // Imprime el token en la consola
      console.log('Token almacenado:', token);
    } catch (error) {
      console.error('Error de autenticación', error);
      // Manejar el error de autenticación según sea necesario
    }
  };

  return (
    <div>
      <input
        type="email"
        placeholder="Correo electrónico"
        value={email}
        onChange={(e) => setEmail(e.target.value)}
      />
      <input
        type="password"
        placeholder="Contraseña"
        value={password}
        onChange={(e) => setPassword(e.target.value)}
      />
      <button onClick={handleLogin}>Iniciar sesión</button>
    </div>
  );
};

export default Login;
