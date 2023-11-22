import Nav from "react-bootstrap/Nav";
import Navbar from "react-bootstrap/Navbar";
import Container from "react-bootstrap/Container";
import { Link, Outlet } from 'react-router-dom'

function Menu() {
    return (
        <>
            <Navbar bg="dark" variant="dark">
                <Container>
                    <Navbar.Brand href="#home">Navbar</Navbar.Brand>
                    <Nav className="me-auto">
                        <Nav.Link as={Link} to="">Home</Nav.Link>
                        <Nav.Link as={Link} to="/ProyePet/public/listcards">List Cards</Nav.Link>
                        <Nav.Link as={Link} to="/ProyePet/public/login">
                  Iniciar Sesion
                </Nav.Link>
                    </Nav>
                </Container>
            </Navbar>
            <section>
                <Container>
                    <Outlet></Outlet>
                </Container>
            </section>
        </>
    );
}

export default Menu;