import './bootstrap';

import ReactDOM from "react-dom/client";
import Login from './Components/Login';
import Main from './Components/Main';
import { BrowserRouter } from "react-router-dom";
import { AuthProvider } from './Components/AuthContext';

ReactDOM.createRoot(document.getElementById('app')).render(
    <BrowserRouter>
      <AuthProvider>
        <Main />
      </AuthProvider>
    </BrowserRouter>
  );
